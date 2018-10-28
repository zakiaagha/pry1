<?php

// =============================================================================
// Enqueue Styles (Front-end)
// =============================================================================

if ( ! function_exists('getbowtied_styles') ) :
function getbowtied_styles() {	
	wp_enqueue_style('getbowtied-styles', get_template_directory_uri() . '/css/styles.css', array(), getbowtied_theme_version(), 'all');	

	if ( is_child_theme() ):
    	wp_enqueue_style('getbowtied-styles-child', get_stylesheet_directory_uri() . '/style.css', array(), getbowtied_theme_version(), 'all');
    endif;
}
add_action( 'wp_enqueue_scripts', 'getbowtied_styles' );
endif;


// =============================================================================
// Enqueue Styles (Back-end)
// =============================================================================

if ( ! function_exists('getbowtied_admin_styles') ) :
function getbowtied_admin_styles() {
    if ( is_admin() ) {
        
		//wp_enqueue_style("wp-color-picker");
		//wp_enqueue_style("getbowtied_wp_admin", get_template_directory_uri() . "/css/wp-admin.css", false, "1.0", "all");

		if ( GETBOWTIED_VISUAL_COMPOSER_IS_ACTIVE ) { 
			wp_enqueue_style('getbowtied_visual_composer', get_template_directory_uri() .'/css/visual-composer.css', array(), getbowtied_theme_version(), 'all');
		}

    }
}
add_action( 'admin_enqueue_scripts', 'getbowtied_admin_styles' );
endif;


// =============================================================================
// Wp Head Kirki (class-kirki-scripts-loading.php)
// =============================================================================

if ( ! function_exists('getbowtied_wp_head_kirki') ) :
function getbowtied_wp_head_kirki() {
?>
	<style>
		.kirki-customizer-loading-wrapper {
			background-image: none;
		}
	</style>
<?php
}
add_action( 'wp_head', 'getbowtied_wp_head_kirki', 100 );
endif;