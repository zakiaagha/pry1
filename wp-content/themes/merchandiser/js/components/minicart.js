jQuery(function($) {

	"use strict";
	
	var paypal = $(document).find('.offcanvas_minicart p.buttons #woo_pp_ec_button');
	if( paypal.length != 0 ) {
		$(document).find('.offcanvas_minicart').addClass('paypal_minicart');
	} else {
		$(document).find('.offcanvas_minicart').removeClass('paypal_minicart');
	}
	
});