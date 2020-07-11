<?php

////////////////////////////////////////
// ENQUEUE ALTERATIONS
////////////////////////////////////////

add_action( 'wp_footer', 'deregister_scripts' );

function deregister_scripts(){
	wp_deregister_script( 'wp-embed' );
}



add_action( 'init', 'theme_enqueue_scripts' );

function theme_enqueue_scripts() {

	$script_ver = filemtime( get_template_directory() . '/compiled/js/bundle.js' );

	if(!is_admin()) {
		wp_deregister_script( 'jquery' );

		wp_enqueue_script(
			'ajax-pagination',
			get_template_directory_uri() . '/compiled/js/bundle.js',
			array(),
			$script_ver,
			true
		);

		global $wp_query;
		wp_localize_script( 'ajax-pagination', 'ajaxpagination', array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'query_vars' => json_encode( $wp_query->query )
		));
	}

}


add_action( 'init', 'theme_enqueue_styles' );

function theme_enqueue_styles() {

	$style_ver = filemtime( get_stylesheet_directory() . '/compiled/css/style.css' );

	if(!is_admin()) {

		wp_enqueue_style(
			'theme-styles',
			get_template_directory_uri() . '/compiled/css/style.css',
			array(),
			$style_ver
		);

	}

}


add_action( 'init', 'init_enqueue_component_styles' );

function init_enqueue_component_styles() {
  global $enqued_styles;
  $enqued_styles = array();
}

function enqueue_component_styles($component) {
  global $enqued_styles;

  if(!in_array($component, $enqued_styles)) {
    $enqued_styles[] = $component;
  }
}

function output_enqueued_component_styles() {
  global $enqued_styles;

  if(is_array($enqued_styles) && count($enqued_styles) > 0) {
    $final_component_styles = "";
    $inline_first_style = false;

    foreach ($enqued_styles as $key => $style) {
      if($key === 0 && $inline_first_style) {
        echo '<style>'.file_get_contents(get_template_directory().'/compiled/css/components/'.$style.'.css').'</style>';
      } else {
        if(BUNDLE_COMPONENT_CSS) {
          $component_styles = file_get_contents(get_template_directory().'/compiled/css/components/'.$style.'.css');
          $final_component_styles .= $component_styles;
        } else {
          echo '<link rel="stylesheet" id="theme-styles-css"  href="'.get_template_directory_uri().'/compiled/css/components/'.$style.'.css" type="text/css" media="all" />';
        }
      }
    }

    if(BUNDLE_COMPONENT_CSS && count($enqued_styles) > 1) {
      $page_name = sanitize_title($_SERVER['REQUEST_URI']);
      $file_path = get_template_directory().'/generated-css/'.$page_name.'.css';
      $file_url = get_template_directory_uri().'/generated-css/'.$page_name.'.css';
      $file_create = file_put_contents($file_path, $final_component_styles);
      echo '<link rel="stylesheet" id="theme-styles-css"  href="'.$file_url.'" type="text/css" media="all" />';
    }
  }
}





add_action( 'init', 'init_enqueue_component_scripts' );

function init_enqueue_component_scripts() {
  global $enqued_scripts;
  $enqued_scripts = array();
}

function enqueue_component_scripts($component) {
  global $enqued_scripts;

  if(!in_array($component, $enqued_scripts)) {
    $enqued_scripts[] = $component;
  }
}

function output_enqueued_component_scripts() {
  global $enqued_scripts;

  if(is_array($enqued_scripts) && count($enqued_scripts) > 0) {
    foreach ($enqued_scripts as $key => $script) {
      echo '<script type="module" src="'.get_template_directory_uri().'/compiled/js/modules/'.$script.'.bundle.js"></script>';
      // echo '<script src="'.get_template_directory_uri().'/compiled/js/modules/'.$script.'.bundle.js"></script>';
    }
  }
}