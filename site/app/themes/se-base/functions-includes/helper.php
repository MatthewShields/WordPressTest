<?php

////////////////////////////////////////
// HELPER FUNCTIONS
////////////////////////////////////////





////////////////////////////////////////
// URL HELPER FUNCTIONS 
////////////////////////////////////////

/**
 * Construct current page URL string (minus queries etc)
 */
function current_url() {
	$url = (array_key_exists('HTTPS', $_SERVER) && 'on' == $_SERVER['HTTPS'] ) ? 'https://' : 'http://';
	$url .= $_SERVER['SERVER_NAME'];
	$url .= ( '80' == $_SERVER['SERVER_PORT'] ) ? '' : ':' . $_SERVER['SERVER_PORT'];
	$url .= $_SERVER['REQUEST_URI'];

	return trailingslashit( $url );
}





////////////////////////////////////////
// CATEGORY HELPER FUNCTIONS
////////////////////////////////////////

/**
* Returns ID of top-level parent category, or current category if you are viewing a top-level
*
* @param    string      $catid      Category ID to be checked
* @return   string      $catParent  ID of top-level parent category
*/
function get_top_category_id ($catid) {

	while ($catid) {
		$cat = get_category($catid); // get the object for the catid
		$catid = $cat->category_parent; // assign parent ID (if exists) to $catid
		// the while loop will continue whilst there is a $catid
		// when there is no longer a parent $catid will be NULL so we can assign our $catParent
		$catParent = $cat->cat_ID;
	}

	return $catParent;
}


/**
* Remove all but top level categories from URL structure
* Allows for use of multiple nested categories for sorting abilities whilst having one consistent url structure
*
* @param    object      $category      Input of bottom level category object
* @return   object      $category      Output of top level category object to permalink
*/
function remove_child_categories_from_permalinks( $category ) {
    while ( $category->parent ) {
        $category = get_term( $category->parent, 'category' );
    }
    return $category;
}
// add_filter( 'post_link_category', 'remove_child_categories_from_permalinks' );


/**
 * Fetch all post cat IDs
 * Use to fetch the IDs of all cats of a given taxonomy that a post is assigned to
 * (Use case being for related article query using 'category__in')
 *
 * @param int $post_id
 * @param string $tax
 * @return array $cat_ids
 */
function fetch_all_post_cat_ids($post_id, $tax) {
	$cat_ids = array();
	$terms = get_the_terms( $post_id, $tax );
	foreach($terms as $term) {
		$cat_ids[] = $term->term_id;
	}

	return $cat_ids;
}



function get_post_cat_name($post_id) {
	$categories = get_the_category($post_id);

	if(is_array($categories) && count($categories) > 0) {
		$cat_name = $categories[0]->name;
	} else {
		$cat_name = false;
	}

	return $cat_name;
}


/**
 * Custom wp_list_categories where
 *
 * @param [type] $post_type
 * @param string $args
 * @return void
 */
function wp_list_categories_for_post_type($post_type, $args = array()) {
    $exclude = array(1);

    // Check ALL categories for posts of given post type
    foreach (get_categories() as $category) {
        $posts = get_posts(array('post_type' => $post_type, 'category' => $category->cat_ID));

        // If no posts found, ...
        if (empty($posts)) {
            // ...add category to exclude list
            $exclude[] = $category->cat_ID;
		}
    }

    // Set up args
    if (!empty($exclude)) {
        $args['exclude'] = $exclude;
    }

    // List categories
    wp_list_categories($args);
}




function header_title() {
	if(is_home()) {
		$page_for_posts = get_option( 'page_for_posts' );

		if($page_for_posts) {
			$title = get_the_title($page_for_posts);
		} else {
			$title = 'Blog';
		}
	} elseif(is_404()) {
		$settings_title = get_field('404_title', 'option');
		$title = $settings_title ? $settings_title : '404 Page not found';
	} else {
		$title = get_the_title();
	}

	return $title;
}