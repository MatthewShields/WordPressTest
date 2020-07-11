<?php

////////////////////////////////////////
// URL STRUCTURE FUNCTIONS
////////////////////////////////////////

/**
* Rename Author page base slug
*/

// add_action('init', 'custom_author_base');

function custom_author_base() {
    global $wp_rewrite;
    $author_slug = 'staff';
    $wp_rewrite->author_base = $author_slug;
}