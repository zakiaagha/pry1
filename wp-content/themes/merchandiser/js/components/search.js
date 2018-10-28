jQuery(function($) {
	
	"use strict";

	window.search_wrapper_open = false;

	function search_widgets_equal_height() {

		$('.search-widget-area').find('li.widget').css('min-height', $('.search-widget-area').height());

	};

	window.search_wrapper_fn = function() {		
		
		if (window.search_wrapper_open == false) {			
			
			if (Foundation.utils.is_large_up() && $(document).scrollTop() <= 0) $('body.header-transparent.header-sticky').addClass("header-sticky-scroll no-transparency-lock");
			$(".search_wrapper").slideDown(200);
			$('.site-content-overlay').addClass("visible");
			search_widgets_equal_height();			
			setTimeout(function(){
				$('.search_wrapper').find('.search-field').focus();
			}, 500);
			window.search_wrapper_open = true;
		
		} else {
			
			if (Foundation.utils.is_large_up() && $(document).scrollTop() <= 0) $('body.header-transparent.header-sticky').removeClass("header-sticky-scroll no-transparency-lock");
			$(".search_wrapper").slideUp(200);
			$('.site-content-overlay').removeClass("visible");
			$('.search_wrapper').find('.search-field').blur();
			window.search_wrapper_open = false;

		}

	}

	$(".search-button").on("click", function() {
		
		if (window.search_wrapper_open == false) window.close_all_header_dropdowns();
		
		setTimeout(function() {
			window.search_wrapper_fn();
		}, 200);

	});

	$(window).resize(function() {
		
		search_widgets_equal_height();
	
	});

})