<?php

add_action( 'comment_form_before', 'theme_enqueue_comment_scripts' );

function theme_enqueue_comment_scripts() {
	if ( get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
}


add_filter( 'comment_form_default_fields', 'theme_comment_fields' );

function theme_comment_fields( $fields ) {
	unset( $fields['url'] );
	return $fields;
}