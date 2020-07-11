<?php

////////////////////////////////////////
// POST CONTENT FUNCTIONS
////////////////////////////////////////

remove_filter('the_content', 'wptexturize');



/**
* Limit default excerpt length when pulled from content to custom length
*
* @param    int      $length 	Default excerpt length
* @return   int      $length 	New excerpt length
*/
function custom_excerpt_length( $length ) {
	$length = 20;
	return $length;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


/**
* Remove <p> tags from wrapping around iframes - added by wpautop
*
* @param    string      $content      Inputted content as would be passed to the_content
* @return   string      $content      Outputted content with <p> tags removed from iframes
*/
function filter_ptags_on_iframes($content) {
    $content = preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
    return preg_replace('/<p>\s*(<iframe .*>*.<\/iframe>)\s*<\/p>/iU', '\1', $content);
}
add_filter('the_content', 'filter_ptags_on_iframes');



add_action( 'admin_menu', 'theme_page_excerpt_meta_box' );

function theme_page_excerpt_meta_box() {
	add_meta_box( 'postexcerpt', __( 'Excerpt', THEME_SLUG ), 'post_excerpt_meta_box', 'page', 'normal', 'core' );
}

add_filter( 'excerpt_more', 'theme_excerpt_more' );
function theme_excerpt_more( $more ) {
	return '&hellip;';
}



function reading_time() {
	global $post;
	$content = get_the_content($post->ID );
	$word_count = str_word_count( strip_tags( $content ) );
	$readingtime = ceil($word_count / 200);

	if ($readingtime == 1) {
	  $timer = " minute";
	} else {
	  $timer = " minutes";
	}
	$totalreadingtime = $readingtime . $timer;

	return $totalreadingtime;
}