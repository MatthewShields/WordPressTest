<?php

add_action( 'after_setup_theme', 'seed_setup' );

function seed_setup() {

	// Definitions
	define( 'THEME_SLUG', get_template() );
	define( 'THEME_LIBRARY', TEMPLATEPATH . '/functions-includes' );
	
	define( 'DATE_FORMAT', 'jS M Y');
	define( 'POSTS_PER_PAGE', 6);
	define( 'BLOG_POSTS_PER_ROW', 3 );

	// Ajax Functions
	require_once( THEME_LIBRARY . '/ajax/load-posts.php' );

	// Function Includes
	require_once( THEME_LIBRARY . '/shortcodes.php' );
	require_once( THEME_LIBRARY . '/images.php' );
	require_once( THEME_LIBRARY . '/acf-setup.php' );
	require_once( THEME_LIBRARY . '/acf-options-pages.php' );
	require_once( THEME_LIBRARY . '/admin.php' );
	require_once( THEME_LIBRARY . '/comments.php' );
	require_once( THEME_LIBRARY . '/content.php' );
	require_once( THEME_LIBRARY . '/enqueue.php' );
	require_once( THEME_LIBRARY . '/helper.php' );
	require_once( THEME_LIBRARY . '/menus.php' );
	require_once( THEME_LIBRARY . '/navigation.php' );
	require_once( THEME_LIBRARY . '/post-types.php' );
	require_once( THEME_LIBRARY . '/query.php' );
	require_once( THEME_LIBRARY . '/search.php' );
	require_once( THEME_LIBRARY . '/security.php' );
	require_once( THEME_LIBRARY . '/setup.php' );
	require_once( THEME_LIBRARY . '/shortcodes.php' );
	require_once( THEME_LIBRARY . '/sidebars.php' );
	require_once( THEME_LIBRARY . '/tinymce.php' );
	require_once( THEME_LIBRARY . '/tracking.php' );
	require_once( THEME_LIBRARY . '/url-structure.php' );
	require_once( THEME_LIBRARY . '/yoast.php' );
	require_once( THEME_LIBRARY . '/sharing.php' );


	if(function_exists('get_field')) {
		define( 'GA_ID_NUMBER', get_field('ga_id_number', 'option') );
	} else {
		define( 'GA_ID_NUMBER', false );
	}
}