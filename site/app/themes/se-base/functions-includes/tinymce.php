<?php

////////////////////////////////////////
// TINY MCE FUNCTIONS
////////////////////////////////////////

function fb_mce_editor_buttons( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
add_filter( 'mce_buttons_2', 'fb_mce_editor_buttons' );




// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {
	// Define the style_formats array
	$style_formats = array(

		array(
			'title' => 'Featured Paragraph',
            'selector' => 'p',
			'classes' => 'featured-paragraph'

		),
        array(
            'title' => 'Button',
            'selector' => 'a',
            'classes' => 'btn'
        ),
        array(
            'title' => 'Two Column List',
            'selector' => 'ul',
            'classes' => 'two-column-list'
        ),
        array(
			'title' => 'Reference Num',  
			'inline' => 'sup'
		)

	);

	$init_array['style_formats'] = json_encode( $style_formats );
	return $init_array;
}
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );







function custom_elements_mce_button() {
	// Check if user have permission
	if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
	  return;
	}
	// Check if WYSIWYG is enabled
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
	  add_filter( 'mce_external_plugins', 'custom_elements_tinymce_plugin' );
	  add_filter( 'mce_buttons', 'register_custom_elements_mce_button' );
	}
  }
  add_action('admin_head', 'custom_elements_mce_button');
  
  // Function for new button
  function custom_elements_tinymce_plugin( $plugin_array ) {
	$plugin_array['custom_elements_mce_button'] = get_template_directory_uri() .'/js/admin/form-insertion.js';
	return $plugin_array;
  }
  
  // Register new button in the editor
  function register_custom_elements_mce_button( $buttons ) {
	  array_push( $buttons, 'custom_elements_mce_button' );
	  return $buttons;
  }
  
  
  
  
  function custom_element_shortcode( $atts ) {
	  $a = shortcode_atts( array(
		  'type' => false,
	  ), $atts );
  
	  if($a['type'] && $a['type'] == 'find_flight') {
		  $html_string = '<a href="javascript:void(0)" class="button smooth-scroll-btn" data-target="skyscanner-form" rel="find_flight" data-backup="http://flights.familytraveller.com/">Find a flight</a>';
		  return $html_string;
	  } elseif($a['type'] && $a['type'] == 'find_hotel') {
		  $html_string = '<a href="javascript:void(0)" class="button smooth-scroll-btn" data-target="bookingcom-form" rel="find_hotel" data-backup="http://flights.familytraveller.com/">Find a hotel</a>';
		  return $html_string;
	  } else {
		  return '';
	  }
  }
  
  add_shortcode( 'custom_element', 'custom_element_shortcode' );