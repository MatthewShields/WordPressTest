<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
      <meta charset="<?php bloginfo('charset'); ?>">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

      <link rel="dns-prefetch" href="//googletagmanager.com">

      <?php if(GA_ID_NUMBER) : ?>
          <!-- Google Tag Manager -->
          <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
          new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
          j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
          'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
          })(window,document,'script','dataLayer','<?php echo GA_ID_NUMBER; ?>');</script>
          <!-- End Google Tag Manager -->
      <?php endif; ?>

      <?php wp_head(); ?>

      <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
      <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
      <link rel="manifest" href="/site.webmanifest">
      <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#d63a32">
      <meta name="msapplication-TileColor" content="#ffffff">
      <meta name="theme-color" content="#ffffff">

  </head>
  <body <?php body_class(); ?>>

	<?php if(GA_ID_NUMBER) : ?>
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo GA_ID_NUMBER; ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
	<?php endif; ?>

	<a href="#sec-nav" class="skip-link" aria-label="Skip to secondary navigation" tabindex="1">Skip to secondary navigation</a>
	<a href="#main-nav" class="skip-link" aria-label="Skip to main navigation" tabindex="1">Skip to main navigation</a>
	<a href="#page-header" class="skip-link" aria-label="Skip navigation" tabindex="1">Skip navigation</a>
	<a href="#main-content" class="skip-link" aria-label="Skip to main content" tabindex="1">Skip to main content</a>

    <div class="wrapper">

      <div class="header" id="main-header" role="banner">
        <div class="container">
            <div class="col col-xs-1-1 col-md-1-6">
                <div class="brand">
                    <?php
                    $logoURL = get_field('brand_logo', 'options');
                    $logoURL = $logoURL ? $logoURL : get_template_directory_uri().'/assets/images/brand-logo.svg'; ?>
                    <a href="<?=home_url()?>" class="brand__logo">
                        <img src="<?=$logoURL?>" alt="">
                    </a>
                    <div class="hamburger-container">
                        <button aria-label="Toggle mobile menu" class="hamburger" id="menu-toggle">
                            <span class="hamburger-bar"></span>
                        </button>
                    </div>
                </div>
            </div>
            <nav role="navigation" class="header__nav col col-xs-1-1 col-md-5-6">
                <?php if(has_nav_menu('sec-nav')) wp_nav_menu(['theme_location' => 'sec-nav', 'menu_id' => 'sec-nav', 'menu_class' => 'nav-sec']); ?>
                <?php if(has_nav_menu('header')) wp_nav_menu(['theme_location' => 'header', 'menu_id' => 'main-nav', 'menu_class' => 'nav nav--header']); ?>
            </nav>
        </div>
    </div>

    <header class="page-header" id="page-header">
        <div class="container">
            <div class="col col-xs-1-1">
                <?php if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb( '<p class="breadcrumbs">','</p>' );
                } ?>
                <h1 class="page-header__title"><?php echo header_title(); ?></h1>
            </div>
        </div>
    </header>