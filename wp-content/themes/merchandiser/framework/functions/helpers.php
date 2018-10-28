<?php

// -----------------------------------------------------------------------------
// Define Constants
// -----------------------------------------------------------------------------

define( 'GETBOWTIED_WOOCOMMERCE_IS_ACTIVE', 	class_exists( 	'WooCommerce' ) );
define( 'GETBOWTIED_VISUAL_COMPOSER_IS_ACTIVE', defined( 		'WPB_VC_VERSION' ) );
define( 'GETBOWTIED_REV_SLIDER_IS_ACTIVE', 		class_exists( 	'RevSlider' ) );
define( 'GETBOWTIED_WPML_IS_ACTIVE', 			defined( 		'ICL_SITEPRESS_VERSION' ) );
define( 'GETBOWTIED_WISHLIST_IS_ACTIVE', 		class_exists( 	'YITH_WCWL' ) );


// -----------------------------------------------------------------------------
// String to Slug
// -----------------------------------------------------------------------------

if ( ! function_exists( 'getbowtied_string_to_slug' ) ) :
function getbowtied_string_to_slug($str) {
	$str = strtolower(trim($str));
	$str = preg_replace('/[^a-z0-9-]/', '_', $str);
	$str = preg_replace('/-+/', "_", $str);
	return $str;
}
endif;


// -----------------------------------------------------------------------------
// Theme Name
// -----------------------------------------------------------------------------

if ( ! function_exists( 'getbowtied_theme_name' ) ) :
function getbowtied_theme_name() {
	$getbowtied_theme = wp_get_theme();
	return $getbowtied_theme->get('Name');
}
endif;

// -----------------------------------------------------------------------------
// Parent Theme Name
// -----------------------------------------------------------------------------

if ( ! function_exists( 'getbowtied_parent_theme_name' ) ) :
function getbowtied_parent_theme_name()
{
	$theme = wp_get_theme();
	if ($theme->parent()):
		$theme_name = $theme->parent()->get('Name');
	else:
		$theme_name = $theme->get('Name');
	endif;

	return $theme_name;
}
endif;


// -----------------------------------------------------------------------------
// Theme Slug
// -----------------------------------------------------------------------------

if ( ! function_exists( 'getbowtied_theme_slug' ) ) :
function getbowtied_theme_slug() {
	$getbowtied_theme = wp_get_theme();
	return getbowtied_string_to_slug( $getbowtied_theme->get('Name') );
}
endif;


// -----------------------------------------------------------------------------
// Theme Author
// -----------------------------------------------------------------------------

if ( ! function_exists( 'getbowtied_theme_author' ) ) :
function getbowtied_theme_author() {
	$getbowtied_theme = wp_get_theme();
	return $getbowtied_theme->get('Author');
}
endif;


// -----------------------------------------------------------------------------
// Theme Description
// -----------------------------------------------------------------------------

if ( ! function_exists( 'getbowtied_theme_description' ) ) :
function getbowtied_theme_description() {
	$getbowtied_theme = wp_get_theme();
	return $getbowtied_theme->get('Description');
}
endif;


// -----------------------------------------------------------------------------
// Theme Version
// -----------------------------------------------------------------------------

if ( ! function_exists( 'getbowtied_theme_version' ) ) :
function getbowtied_theme_version() {
	$getbowtied_theme = wp_get_theme();
	return $getbowtied_theme->get('Version');
}
endif;


// -----------------------------------------------------------------------------
// Convert hex to rgb
// -----------------------------------------------------------------------------

function getbowtied_hex2rgb($hex) {
	$hex = str_replace("#", "", $hex);
	
	if(strlen($hex) == 3) {
		$r = hexdec(substr($hex,0,1).substr($hex,0,1));
		$g = hexdec(substr($hex,1,1).substr($hex,1,1));
		$b = hexdec(substr($hex,2,1).substr($hex,2,1));
	} else {
		$r = hexdec(substr($hex,0,2));
		$g = hexdec(substr($hex,2,2));
		$b = hexdec(substr($hex,4,2));
	}
	$rgb = array($r, $g, $b);
	return implode(",", $rgb); // returns the rgb values separated by commas
	//return $rgb; // returns an array with the rgb values
}


// -----------------------------------------------------------------------------
// Page ID
// -----------------------------------------------------------------------------

function getbowtied_page_id() {	
	$page_id = "";
	if ( is_single() || is_page() ) {
	    $page_id = get_the_ID();
	} else if ( is_home() ) {
	    $page_id = get_option('page_for_posts');
	}
	return $page_id;
}


// -----------------------------------------------------------------------------
// File Contents
// -----------------------------------------------------------------------------

function getbowtied_get_local_file_contents($file_path) {
    
    $url_get_contents_data = false;

	if (function_exists('ob_start') && function_exists('ob_get_clean') && ($url_get_contents_data == false))
    {
        ob_start();
	    include $file_path;
	    $url_get_contents_data = ob_get_clean();
    }

    /*if (function_exists('file_get_contents') && ($url_get_contents_data == false))
    {
        $url_get_contents_data = file_get_contents($file_path);
    }*/

    /*if (function_exists('fopen') && function_exists('stream_get_contents') && ($url_get_contents_data == false))
    {
        $handle = fopen ($file_path, "r");
        $url_get_contents_data = stream_get_contents($handle);
    }*/

    return $url_get_contents_data;
    
}