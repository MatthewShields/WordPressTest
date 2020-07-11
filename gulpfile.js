/**
 * A simple Gulp 4 Starter Kit for modern web development.
 *
 * @package @jr-cologne/create-gulp-starter-kit
 * @author JR Cologne <kontakt@jr-cologne.de>
 * @copyright 2020 JR Cologne
 * @license https://github.com/jr-cologne/gulp-starter-kit/blob/master/LICENSE MIT
 * @version v0.10.12-beta
 * @link https://github.com/jr-cologne/gulp-starter-kit GitHub Repository
 * @link https://www.npmjs.com/package/@jr-cologne/create-gulp-starter-kit npm package site
 *
 * ________________________________________________________________________________
 *
 * gulpfile.js
 *
 * The gulp configuration file.
 *
 */

const theme_name = 'se-base';

const gulp = require('gulp'),
  del = require('del'),
  sourcemaps = require('gulp-sourcemaps'),
  plumber = require('gulp-plumber'),
  autoprefixer = require('gulp-autoprefixer'),
  minifyCss = require('gulp-clean-css'),
  babel = require('gulp-babel'),
  webpack = require('webpack-stream'),
  named = require('vinyl-named'),
  uglify = require('gulp-uglify'),
  terser = require('gulp-terser'),
  concat = require('gulp-concat'),
  glob = require("glob"),
  htmlmin = require('gulp-htmlmin'),
  imagemin = require('gulp-imagemin'),
  browserSync = require('browser-sync').create(),
  postcss = require('gulp-postcss'),
  purgecss = require('gulp-purgecss'),
  rename = require('gulp-rename'),
  sass = require('gulp-sass'),
  twig = require('gulp-twig'),
  fs = require('fs'),
  src_folder = './site/app/themes/'+theme_name+'/',
  src_assets_folder = src_folder + 'assets/',
  dist_folder = './site/app/themes/'+theme_name+'/',
  dist_assets_folder = dist_folder + 'compiled/'

sass.compiler = require('node-sass')

gulp.task('clear', () => del([dist_assets_folder]))

gulp.task('postcss', function () {
  return gulp
    .src([src_folder + 'sass/**/!(_)*.scss'])
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(
      postcss([require('tailwindcss'), require('postcss-object-fit-images')])
    )
    .pipe(
      purgecss({
        content: [
          src_folder + '**/*.php',
          src_folder + 'js/**/*.js',
        ],
        keyframes: true,
        variables: true,
        fontFace: true,
        defaultExtractor: (content) => content.match(/[\w-/:]+(?<!:)/g) || [],
      })
    )
    .pipe(
      autoprefixer({
        grid: true,
      })
    )
    .pipe(minifyCss())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(dist_assets_folder + 'css'))
})

gulp.task('purgecss-rejected', function () {
  return gulp
    .src([src_folder + 'sass/**/!(_)*.scss'])
    .pipe(sass().on('error', sass.logError))
    .pipe(
      postcss([require('tailwindcss'), require('postcss-object-fit-images')])
    )
    .pipe(
      rename({
        suffix: '.rejected',
      })
    )
    .pipe(
      purgecss({
        content: [
          src_folder + '**/*.php',
          src_folder + 'js/**/*.js',
        ],
        keyframes: true,
        variables: true,
        fontFace: true,
        rejected: true,
        defaultExtractor: (content) => content.match(/[\w-/:]+(?<!:)/g) || [],
      })
    )
    .pipe(gulp.dest(dist_assets_folder + 'css'))
})

gulp.task('js', () => {

  const filesArray = glob.sync(src_folder + 'js/files/**/*.js');
  const modulesArray = glob.sync(src_folder + 'js/modules/**/*.js');

  const filesObject = filesArray.reduce((acc, item) => {
    const n = item.lastIndexOf('/');
    const result = item.substring(n + 1);
    const name = result.replace('.js', '');
    acc['files/'+name] = item;
    return acc;
  }, {});

  const modulesObject = modulesArray.reduce((acc, item) => {
    const n = item.lastIndexOf('/');
    const result = item.substring(n + 1);
    const name = result.replace('.js', '');
    acc['modules/'+name] = item;
    return acc;
  }, {});

  const allJSAssets = {
    ...filesObject,
    ...modulesObject
  };

  return gulp
    .src([src_folder + 'js/files/**/*.js'])
    .pipe(plumber())
    .pipe(named())
    .pipe(
      webpack({
        mode: 'production',
        entry: allJSAssets,
        output: {
          filename: '[name].bundle.js',
        }
      })
    )
    .pipe(sourcemaps.init())
    .pipe(
      babel({
        presets: ['@babel/env'],
      })
    )
    // .pipe(concat('bundle.js'))
    .pipe(uglify())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(dist_assets_folder + 'js'))
    .pipe(browserSync.stream())
})

gulp.task('modern-js', () => {

  const filesArray = glob.sync(src_folder + 'js/files/**/*.js');
  const modulesArray = glob.sync(src_folder + 'js/modules/**/*.js');

  const filesObject = filesArray.reduce((acc, item) => {
    const n = item.lastIndexOf('/');
    const result = item.substring(n + 1);
    const name = result.replace('.js', '');
    acc['files/'+name] = item;
    return acc;
  }, {});

  const modulesObject = modulesArray.reduce((acc, item) => {
    const n = item.lastIndexOf('/');
    const result = item.substring(n + 1);
    const name = result.replace('.js', '');
    acc['modules/'+name] = item;
    return acc;
  }, {});

  const allJSAssets = {
    ...filesObject,
    ...modulesObject
  };

  return gulp
    .src([src_folder + 'js/files/**/*.js', src_folder + 'js/modules/**/*.js'])
    .pipe(plumber())
    // .pipe(named())
    // .pipe(
    //   webpack({
    //     mode: 'production',
    //     entry: allJSAssets,
    //     output: {
    //       filename: '[name].bundle.js',
    //     }
    //   })
    // )
    // .pipe(sourcemaps.init())
    // .pipe(
    //   babel({
    //     presets: ['@babel/env'],
    //   })
    // )
    // .pipe(concat('bundle.js'))
    .pipe(terser({
      ecma: 6,
      keep_fnames: false,
      compress: true,
      mangle: {
        toplevel: true,
      },
    }))
    // .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(dist_assets_folder + 'js/modern'))
    .pipe(browserSync.stream())
})

gulp.task('images', () => {
  return gulp
    .src([src_folder + 'media/images/**/*.+(png|jpg|jpeg|gif|svg|ico)'], {
      since: gulp.lastRun('images'),
    })
    .pipe(plumber())
    .pipe(imagemin())
    .pipe(gulp.dest(dist_assets_folder + 'images'))
    .pipe(browserSync.stream())
})

gulp.task(
  'build',
  gulp.series(
    'clear',
    'postcss',
    'purgecss-rejected',
    'js',
    'modern-js',
    'images'
  )
)

gulp.task(
  'dev',
  gulp.series('images', 'postcss', 'purgecss-rejected', 'js', 'modern-js')
)

gulp.task('watch', () => {
  const watchImages = [
    src_folder + 'media/images/**/*.+(png|jpg|jpeg|gif|svg|ico)',
  ]

  const watch = [
    src_folder + '*.php',
    src_folder + 'modules/**/*.php',
    src_folder + 'functions-includes/**/*.php',
    src_folder + 'sass/**/*.scss',
    src_folder + 'js/**/*.js',
  ]

  gulp.watch(watch, gulp.series('dev')).on('change', browserSync.reload)
  gulp
    .watch(watchImages, gulp.series('images'))
    .on('change', browserSync.reload)
})

gulp.task('default', gulp.series('dev', gulp.parallel('watch')));

gulp.task('build', gulp.series('dev'));
