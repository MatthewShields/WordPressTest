<?php

////////////////////////////////////////
// REGISTRATION 
////////////////////////////////////////

function deregister_widgets() {
	wp_unregister_sidebar_widget('WP_Widget_Recent_Comments');
}

add_action( 'widgets_init', 'deregister_widgets', 99999 ); 