jQuery(function($) {
	
	"use strict";

	$(".menu-button").click(function() {
		
		$('nav.offcanvas_navigation').show();
		$('.offcanvas_sidebars').hide();

		window.offcanvas_left();
	});

	$('.mobile-category-link').click(function(){
		$('.mobile-categories').toggle();
	})

});
