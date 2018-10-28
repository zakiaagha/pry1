<?php

global $custom_catalog_mode;

if ( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ):

//==============================================================================
// Define image sizes
//==============================================================================

function getbowtied_woocommerce_image_dimensions() {
	
	global $pagenow;
 
	if ( ! isset( $_GET['activated'] ) || $pagenow != 'themes.php' ) {
		return;
	}
  	$catalog = array(
		'width' 	=> '500',
		'height'	=> '650',
		'crop'		=> 0
	);

	$single = array(
		'width' 	=> '960',
		'height'	=> '1240',
		'crop'		=> 0
	);

	$thumbnail = array(
		'width' 	=> '320',
		'height'	=> '320',
		'crop'		=> 1
	);

	update_option( 'shop_catalog_image_size', $catalog );
	update_option( 'shop_single_image_size', $single );
	update_option( 'shop_thumbnail_image_size', $thumbnail );

}
add_action( 'after_switch_theme', 'getbowtied_woocommerce_image_dimensions', 1 );

//==============================================================================
// Remove PrettyPhoto Default Woocommerce Lightbox
//==============================================================================

function remove_woocommerce_lightbox() {
	
    remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );
        wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
        wp_dequeue_script( 'prettyPhoto' );
        wp_dequeue_script( 'prettyPhoto-init' );
}
add_action( 'wp_enqueue_scripts', 'remove_woocommerce_lightbox', 99 );



//==============================================================================
// Cart
//==============================================================================

remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cart_totals' );

add_action( 'woocommerce_cart_collaterals', 'woocommerce_cart_totals' );
add_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 20 );

endif;