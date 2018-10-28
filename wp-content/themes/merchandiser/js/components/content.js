jQuery(function($) {
	
	"use strict";

	var site_content_min_height = 0;

	$("html").css( "margin-top", 0 );

	function content_min_height() {	

		if ( $(".page-wrapper").outerHeight(true) < $(window).outerHeight(true) ) {
			site_content_min_height = $(window).outerHeight(true) - $(".site-footer").outerHeight(true) - $("#wpadminbar").outerHeight(true);			
			$(".site-content").css( "min-height", site_content_min_height );
		}
	}

	content_min_height();



	$(window).resize(function() {
		
		content_min_height();
	
	});

})