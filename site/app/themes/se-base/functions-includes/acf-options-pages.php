<?php
/**
 * @prettier
 */

////////////////////////////////////////
// ACF OPTIONS PAGES
////////////////////////////////////////

/**
* Create options pages
*/
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Analytics Settings',
		'menu_title'	=> 'Analytics',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> '404 Settings',
		'menu_title'	=> '404',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Page Settings',
		'menu_title'	=> 'Settings',
		'parent_slug'	=> 'edit.php?post_type=page',
	));

}



// Let Options Location be All

add_filter('acf/location/rule_values/options_page', 'acf_location_rules_values_options_page');
function acf_location_rules_values_options_page($choices) {
	$choices['all'] = 'All options pages';
	return $choices;
}
add_filter('acf/location/rule_match/options_page', 'acf_location_rules_match_options_page', 10, 3);
function acf_location_rules_match_options_page($match, $rule, $options) {
	if($rule['param'] == 'options_page' && $rule['value'] == 'all') {
		$match = isset($options['options_page']);
	}
	return $match;
}