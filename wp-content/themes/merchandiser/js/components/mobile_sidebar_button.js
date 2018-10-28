jQuery(function($) {
	
	"use strict";

	$(".woocommerce .mobile-sidebar-toggle").click(function() 
	{
		$('nav.offcanvas_navigation').hide();
		$('.offcanvas_sidebars').show();
		$('.offcanvas_blog_sidebar').hide();
		$('.offcanvas_shop_sidebar').show();

		window.offcanvas_left();
	});

	$(".blog-header-wrapper .mobile-sidebar-link").click(function() 
	{
		$('nav.offcanvas_navigation').hide();
		$('.offcanvas_sidebars').show();
		$('.offcanvas_blog_sidebar').show();
		$('.offcanvas_shop_sidebar').hide();

		window.offcanvas_left();
	});

});
