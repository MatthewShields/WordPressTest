<?php

////////////////////////////////////////
// ACF HELPER FUNCTIONS
////////////////////////////////////////

/**
 * If polylang languages exist pull correct langs version
 * Still use standard get_field('field_name', 'options') in theme
 * Appends lang code automatically
 */

add_filter('acf/validate_post_id', function($post_id) {
	if($post_id == 'options' && function_exists('pll_current_language')) {
		$post_id = 'options_'.pll_current_language();
	}
	return $post_id;
}, 10 , 1);





////////////////////////////////////////
// ACF LOCAL JSON SETUP
////////////////////////////////////////

/**
* Local JSON save setup
*
* @param    string      $path
* @return   string      $path
*/

add_filter('acf/settings/save_json', 'my_acf_json_save_point');

function my_acf_json_save_point( $path ) {
	// Add new custom save path
    $path = get_stylesheet_directory() . '/acf-fields';
	// Return path
    return $path;
}


/**
* Local JSON load setup
*
* @param    array 		$paths
* @return   array       $paths
*/

add_filter('acf/settings/load_json', 'my_acf_json_load_point');

function my_acf_json_load_point( $paths ) {
	// Remove original path
    unset($paths[0]);
	// Add new custom load path
	$paths[] = get_stylesheet_directory() . '/acf-fields';
	// Return new paths
    return $paths;
}




////////////////////////////////////////
// ACF CONFIGURATION
////////////////////////////////////////


/**
* Set ACF API Key to use for GMAP functionality
*/

add_filter('acf/settings/google_api_key', function () {
    return '';
});







////////////////////////////////////////
// ACF FLEXIBLE CONTENT SETUP
////////////////////////////////////////

/**
* Load Flexible Content Loop
*/
function load_flex_loop() {
	include( get_template_directory() . '/page-content.php' );
}


/**
* Load Module
*
* @param    string      $path 		Path to loaded component template
* @param    array       $data 		Data to pass to loaded component template
*/
function load_module($path, $data = null, $echo = true) {

	if($echo === false) {
		ob_start();
	}

	include(get_template_directory() . '/modules/' . $path . '.php' );

	if($echo === false) {
		$html_str = ob_get_clean();

		return $html_str;
	}
}

/**
* Load Page Content
*
* @param    string      $path 		Path to loaded layout template
* @param    array       $data 		Data to pass to loaded layout template
*/
function load_flexible_content($path = 'page-content') {
	include( get_template_directory() . '/' . $path . '.php' );
}






////////////////////////////////////////
// ACF ADMIN SETTINGS
////////////////////////////////////////


add_filter('acf/settings/show_admin', 'display_acf_menu_item');

function display_acf_menu_item( $show ) {

  if(HIDE_ACF_MENU_ITEM === true) {
    return false;
  } else {
    return true;
  }

}