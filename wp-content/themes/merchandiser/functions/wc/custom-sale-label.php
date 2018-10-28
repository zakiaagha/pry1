<?php 
/******************************************************************************/
/****** Custom Sale label *****************************************************/
/******************************************************************************/

add_filter('woocommerce_sale_flash', 'woocommerce_custom_sale_tag_sale_flash', 10, 3);
function woocommerce_custom_sale_tag_sale_flash($original, $post, $product) {
	$custom_shop_sale_label 				= getbowtied_theme_option( 'custom_sale_label', 				'Sale!' );

	if (!empty($custom_shop_sale_label)):
		echo '<span class="onsale">'.$custom_shop_sale_label.'</span>';
	else: 
		echo '';
	endif;
}