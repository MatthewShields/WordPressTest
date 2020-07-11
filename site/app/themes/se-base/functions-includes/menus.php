<?php

////////////////////////////////////////
// MENU REGISTRATIONS 
////////////////////////////////////////

add_action( 'init', 'theme_menus_init' );

function theme_menus_init() {
	register_nav_menu( 'sec-nav', __( 'Secondary Menu', THEME_SLUG ) );
	register_nav_menu( 'header', __( 'Header Menu', THEME_SLUG ) );
	register_nav_menu( 'footer-nav', __( 'Footer Navigation Menu', THEME_SLUG ) );
}



////////////////////////////////////////
// MENU CUSTOMISATIONS 
////////////////////////////////////////

/**
 * Append manual items to menus
 */

 add_filter( 'wp_nav_menu_items', 'add_manual_menu_items', 10, 2 );

function add_manual_menu_items( $items, $args ) {

	$search_link = '/?s=';

    if ($args->theme_location == 'header') {
		$items .= '
			<li class="menu-item-search">
				<a href="'.$search_link.'" class="search-icon">Search</a>
			</li>';
    }
    return $items;
}




add_filter( 'nav_menu_css_class', 'add_parent_url_menu_class', 10, 2 );

function add_parent_url_menu_class( $classes = array(), $item = false ) {
	// Get current URL
	$current_url = current_url();

	// Get homepage URL
	$homepage_url = trailingslashit( get_bloginfo( 'url' ) );

	// Exclude 404 and homepage
	if( is_404() or $item->url == $homepage_url ) return $classes;

	if ( strstr( $current_url, $item->url) ) {
		// Add the 'parent_url' class
		$classes[] = 'current-menu-item';
	}

	return $classes;
}