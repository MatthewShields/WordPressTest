<?php

add_action( 'wp_ajax_nopriv_ajax_pagination', 'filter_ajax_pagination' );
add_action( 'wp_ajax_ajax_pagination', 'filter_ajax_pagination' );

function filter_ajax_pagination() {
	$query_vars = json_decode( stripslashes( $_POST['query_vars'] ), true );

    $query_vars['paged'] = $_POST['page'];
    $query_vars['post_type'] = $_POST['post_type'];
	$query_vars['post_status'] = 'publish';
	$query_vars['cat'] = $_POST['cat_id'];
	$query_vars['showposts'] = $_POST['ppp'];

	if($query_vars['offset']) {
		$query_vars['offset'] = ($_POST['page'] * $query_vars['showposts']) + POSTS_PER_PAGE;
	}

    $ajax_query = new WP_Query( $query_vars );
	$posts = $ajax_query->posts;
	$html_str = '';

    if( count($ajax_query) > 0 ) {
		foreach ($posts as $key => $post) {
			$html_str .= load_module('post-card', array(
				'image' => get_the_post_thumbnail_url($post->ID, 'post-thumb'),
				'meta' => get_the_date(DATE_FORMAT, $post->ID),
				'category' => get_post_cat_name($post->ID),
				'title' => $post->post_title,
				'link' => get_permalink($post->ID),
				'content' => wpautop($post->post_excerpt)
			), false);
        }
	}

	$data_obj = array(
		'max_pages' => $ajax_query->max_num_pages,
		'html' => $html_str
	);

	$return_obj = json_encode($data_obj);
	echo $return_obj;
    die();
}