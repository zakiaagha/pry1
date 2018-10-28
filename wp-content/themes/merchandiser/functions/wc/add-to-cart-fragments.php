<?php

/******************************************************************************/
/* WooCommerce Update Number of Items in the Cart *****************************/
/******************************************************************************/

if ( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) {

	
		function getbowtied_shopping_bag_items_number($fragments) {
			global $woocommerce;
			ob_start(); ?>
	        
	        <span class="shopping_bag_items_number visible animated jello"><?php echo esc_html(WC()->cart->get_cart_contents_count()); ?></span>

			<?php
			$fragments['.shopping_bag_items_number'] = ob_get_clean();
			return $fragments;
		}
		
		add_filter('woocommerce_add_to_cart_fragments', 'getbowtied_shopping_bag_items_number');
}