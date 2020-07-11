<?php

////////////////////////////////////////
// REGISTRATION 
////////////////////////////////////////

// Ref for dash icons - https://developer.wordpress.org/resource/dashicons/

add_action( 'init', 'theme_post_types_init' );
function theme_post_types_init() {
	
	// register_post_type( 
	// 	'job',
	// 	array(
	// 		'labels' => array(			
	// 			'name' => __( 'Jobs', THEME_SLUG ),
	// 			'singular_name' => __( 'Job', THEME_SLUG ),
	// 			'add_new' => __( 'Add New', THEME_SLUG ),
	// 			'add_new_item' => __( 'Add New Job', THEME_SLUG ),
	// 			'edit' => __( 'Edit', THEME_SLUG ),
	// 			'edit_item' => __( 'Edit Job', THEME_SLUG ),
	// 			'new_item' => __( 'New Job', THEME_SLUG ),
	// 			'view' => __( 'View Job', THEME_SLUG ),
	// 			'view_item' => __( 'View Job', THEME_SLUG ),
	// 			'search_items' => __( 'Search Jobs', THEME_SLUG ),
	// 			'not_found' => __( 'No jobs found', THEME_SLUG ),
	// 			'not_found_in_trash' => __( 'No jobs found in Trash', THEME_SLUG ),
	// 			'parent' => __( 'Parent Job', THEME_SLUG  )				
	// 		),
	// 		'description' => __( 'Jobs are... Jobs.', THEME_SLUG ),
	// 		'public' => true,
	// 		'menu_icon' => 'dashicons-admin-page',
	// 		'supports' => array( 
	// 			'title',
	// 			'editor',
	// 			'excerpt',
	// 			'custom-fields',
	// 			'thumbnail',
	// 			'page-attributes',
	// 			'comments',
	// 			'trackbacks',
	// 			'author',
	// 			'revisions'
	// 		),
	// 		'rewrite' => array(
	//      	'slug' => 'who-we-are/careers',
	//          'with_front' => true
 	//      ),
	// 		'taxonomies' => array('post_tag'),
	// 	)
	// );

}





////////////////////////////////////////
// POST TYPE CUSTOMISATIONS 
////////////////////////////////////////

function tags_support_all() {
	register_taxonomy_for_object_type('post_tag', 'page');
}
add_action('init', 'tags_support_all');





////////////////////////////////////////
// TAXONOMY REGISTRATIONS 
////////////////////////////////////////

add_action( 'init', 'theme_taxonomies_init', 0 );

function theme_taxonomies_init() {

	// register_taxonomy(
	// 	'holiday-type',
	// 	array( 'post' ),
	// 	array(
	// 		'public' => true,
	// 		'hierarchical' => true,
	// 		'labels' => array(
	// 			'name' => __( 'Resource Type', 'seed' ),
	// 			'singular_name' => __( 'Resource Type', 'seed' ),
	// 			'search_items' => __( 'Search Resource Types', 'seed' ),
	// 			'popular_items' => __( 'Popular Resource Types', 'seed' ),
	// 			'all_items' => __( 'All Resource Types', 'seed' ),
	// 			'parent_item' => __( 'Parent Resource Type', 'seed' ),
	// 			'parent_item_colon' => __( 'Parent Resource Type:', 'seed' ),
	// 			'edit_item' => __( 'Edit Resource Type', 'seed' ),
	// 			'update_item' => __( 'Update Resource Type', 'seed' ),
	// 			'add_new_item' => __( 'Add New Resource Type', 'seed' ),
	// 			'new_item_name' => __( 'New Resource Type', 'seed' ),
	// 		),
	// 		'rewrite' => array ('slug'=>'holiday-type')
	// 	)
	// );

}



////////////////////////////////////////
// TERM REGISTRATIONS 
////////////////////////////////////////

// add_action( 'init', 'theme_terms_init' );

function theme_terms_init() {
	// wp_insert_term(
	// 	'Example',
	// 	'taxonomy',
	// 	array(
	// 		'description'=> __( 'This is an example', THEME_SLUG ),
	// 		'slug' => 'example',
	// 		'parent'=> $parent_term_id
	// 	)
	// );
}