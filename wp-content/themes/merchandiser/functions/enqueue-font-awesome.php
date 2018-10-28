<?php

// =============================================================================
// Enqueue Font Awesome
// =============================================================================

if ( ! function_exists('getbowtied_font_awesome') ) :
function getbowtied_font_awesome() {
	wp_enqueue_style( 'getbowtied-font-awesome', get_template_directory_uri() . '/framework/inc/fonts/font-awesome/css/font-awesome.css', array(), NULL );
}
add_action( 'wp_enqueue_scripts', 'getbowtied_font_awesome' );
endif;