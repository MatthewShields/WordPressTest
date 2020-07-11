<?php

////////////////////////////////////////
// YOAST FUNCTIONS
////////////////////////////////////////

/**
* Alter canonical tag created by Yoast
*
* @param    string      $canonical      Default canonical tag
* @return   string      $canonical      New canonical tag
*/

add_filter( 'wpseo_canonical', 'yoast_canonical_alterations' );

function yoast_canonical_alterations( $canonical ) {
	global $post;

	// Disable canonical on search pages
	if( is_search() ) {
		$canonical = false;
	}

	return $canonical;
}