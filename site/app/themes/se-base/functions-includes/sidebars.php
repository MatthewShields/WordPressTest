<?php

////////////////////////////////////////
// MENU REGISTRATIONS 
////////////////////////////////////////

add_action( 'widgets_init', 'theme_sidebars_init' );

function theme_sidebars_init() {
	register_sidebar( array (
		'name' => 'Sidebar: Pages',
		'id' => 'sidebar-pages',
		'description' => __( 'Use this area to display content in the sidebar.', THEME_SLUG ),
		'before_widget' => '<aside id="%1$s" class="sidebar-wgt %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3><div class="wgt-content">',
	) );
	register_sidebar( array (
		'name' => 'Sidebar: Posts',
		'id' => 'sidebar-posts',
		'description' => __( 'Use this area to display content in the sidebar.', THEME_SLUG ),
		'before_widget' => '<aside id="%1$s" class="sidebar-wgt %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3><div class="wgt-content">',
	) );
}