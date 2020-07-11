<?php

////////////////////////////////////////
// SETUP FUNCTIONS
////////////////////////////////////////
	// Support
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'index_rel_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	add_filter( 'the_excerpt_rss', 'theme_post_thumbnail_feeds' );
	add_filter( 'the_content_feed', 'theme_post_thumbnail_feeds' );

/**
 * Remove generated version number from Wordpress - security flag
 *
 * @return string Blank version number
 */
remove_action( 'wp_head', 'wp_generator' );


/**
 * Remove adjacent posts tag
 */
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );


/**
 * Remove the display of flagged Wordpress login errors
 *
 * @return void
 */
function no_wordpress_errors(){
  return 'Something is wrong!';
}
add_filter( 'login_errors', 'no_wordpress_errors' );


/**
 * Remove Welcome Panel from Wordpress dashboard
 */
remove_action('welcome_panel', 'wp_welcome_panel');


add_filter( 'body_class', 'theme_body_classes' );

function theme_body_classes( $classes ) {
	if ( is_singular() && !is_home() )
		$classes[] = 'singular';
	return $classes;
}

add_theme_support( 'title-tag' );