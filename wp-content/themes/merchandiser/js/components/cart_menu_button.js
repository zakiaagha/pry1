jQuery(function($) {
	
	"use strict";

	$(".shopping-bag-button").click(function(e) {

		$("body").addClass("offcanvas_for_cart");
		$("body").removeClass("offcanvas_for_quickview");
		
		e.preventDefault();
		window.offcanvas_right();
		
	});

});
