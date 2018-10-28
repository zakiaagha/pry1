<?php

//==============================================================================
// Add Lightbox to WP Gallery
//==============================================================================

if ( ! function_exists('getbowtied_remove_recent_comments_style') ) :
function getbowtied_remove_recent_comments_style() {  
	global $wp_widget_factory;  
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );  
}  
add_action( 'widgets_init', 'getbowtied_remove_recent_comments_style' );
endif;