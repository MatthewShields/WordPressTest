<?php

// function open_wp_query($qry) {
//    if ($qry->is_main_query() && is_category()) {
//      $qry->set('post_type','blog');
//    }
// }
// add_action('pre_get_posts','open_wp_query');



// function custom_post_author_archive($query) {
//     if ($query->is_author) {
//         $query->set( 'post_type', array('blog') );
//         $query->set( 'showposts', -1 );
// 	}
//     remove_action( 'pre_get_posts', 'custom_post_author_archive' );
// }
// add_action('pre_get_posts', 'custom_post_author_archive');



// /**
//  * Customise Query Vars
//  * Use this to alter default query vars such as 'posts_per_page'
//  *
//  * @param object $query
//  */
// function customise_query_vars( $query ) {
//   if ( !is_admin() && $query->is_main_query() && ( is_search() ) ){
//     $query->set( 'posts_per_page', '2000' );
//   }
// }
// add_action( 'pre_get_posts', 'customise_query_vars' , 1 );