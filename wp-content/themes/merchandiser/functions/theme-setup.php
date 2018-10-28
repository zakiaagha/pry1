<?php

/******************************************************************************/
/* Theme Setup ****************************************************************/
/******************************************************************************/

if ( ! function_exists('getbowtied_theme_setup') ) :
function getbowtied_theme_setup() {

	load_theme_textdomain( 'getbowtied', get_template_directory() . '/languages' );
	
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'woocommerce' );

	add_theme_support('html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	));

	add_theme_support( 'woocommerce', array(

	    // Product grid theme settings
	    'product_grid'        => array(
	        'default_rows'    => get_option('woocommerce_catalog_rows', 5),
	        'min_rows'        => 2,
	        'max_rows'        => '',
	        
	        'default_columns' => get_option('woocommerce_catalog_columns', 5),
	        'min_columns'     => 1,
	        'max_columns'     => 6,
	    ),
	) );

	// gutenberg
	add_theme_support( 'align-wide' );

	// Remove Woocommerce Styles
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );

	// Menus
	register_nav_menus( array(
		'primary' 		=> esc_html__('Primary Menu', 'getbowtied'),
		'footer' 		=> esc_html__('Footer Menu', 'getbowtied'),
		'my-account'	=> esc_html__('My Account Menu', 'getbowtied')
	));

}
add_action( 'after_setup_theme', 'getbowtied_theme_setup' );
endif;

if ( ! isset($content_width) ) $content_width = 640; //pixels