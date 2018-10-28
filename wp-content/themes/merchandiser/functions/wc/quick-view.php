<?php

/******************************************************************************/
/* WooCommerce Product Quick View *********************************************/
/******************************************************************************/

if ( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) {	


	// Enqueue wc-add-to-cart-variation

	function getbowtied_product_quick_view_scripts() {	
		wp_enqueue_script('wc-add-to-cart-variation');
	}
	add_action( 'wp_enqueue_scripts', 'getbowtied_product_quick_view_scripts' );

	
	// Load The Product

	function getbowtied_product_quick_view_fn() {		
		if (!isset( $_REQUEST['product_id'])) {
			die();
		}
		$product_id = intval($_REQUEST['product_id']);

		if( isset($_GET['wpml_lang']) )	{
			do_action( 'wpml_switch_language',  $_GET[ 'wpml_lang' ] );
		}

		// wp_query for the product
		wp('p='.$product_id.'&post_type=product');
		ob_start();
		get_template_part( 'woocommerce/quick-view' );
		echo ob_get_clean();
		die();
	}	
	add_action( 'wp_ajax_getbowtied_product_quick_view', 'getbowtied_product_quick_view_fn');
	add_action( 'wp_ajax_nopriv_getbowtied_product_quick_view', 'getbowtied_product_quick_view_fn');

	
	// Show Quick View Button

	function getbowtied_product_quick_view_button() {
		global $product, $custom_shop_quick_view;
		if ($custom_shop_quick_view):
		echo '<a href="#" id="product_id_' . $product->get_id() . '" class="button getbowtied_product_quick_view_button" data-product_id="' . $product->get_id() . '">' . esc_html__( 'Quick View', 'getbowtied') . '</a>';
		endif;
	}
	add_action( 'woocommerce_after_shop_loop_item', 'getbowtied_product_quick_view_button', 5 );
	
}