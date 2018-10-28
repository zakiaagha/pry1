<?php

/******************************************************************************/
/* WooCommerce Remove Tabs Titles *********************************************/
/******************************************************************************/

if ( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) {	

	function getbowtied_product_description_heading() {
	    echo "";
	}
	add_filter( 'woocommerce_product_description_heading', 'getbowtied_product_description_heading' );

	
	function getbowtied_product_additional_information_heading() {
	    echo "";
	}
	add_filter( 'woocommerce_product_additional_information_heading', 'getbowtied_product_additional_information_heading' );
	
}