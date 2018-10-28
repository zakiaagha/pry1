jQuery(function($) {
	
	"use strict";

	window.myaccount_popup_open = false;

	window.myaccount_popup_fn = function() {		
		
		if (window.myaccount_popup_open == false) {
								
			if (Foundation.utils.is_large_up() && $(document).scrollTop() <= 0) $('body.header-transparent.header-sticky').addClass("header-sticky-scroll no-transparency-lock");
			$(".myaccount-popup").slideDown(200);
			$('.site-content-overlay').addClass("visible");
			window.myaccount_popup_open = true;				
		
		} else {
						
			if (Foundation.utils.is_large_up() && $(document).scrollTop() <= 0) $('body.header-transparent.header-sticky').removeClass("header-sticky-scroll no-transparency-lock");
			$(".myaccount-popup").slideUp(200);
			$('.site-content-overlay').removeClass("visible");
			window.myaccount_popup_open = false;
			
		}

	}

	$(".my-account-login-button").on("click", function(e) {
		
		if ($('.myaccount-popup').length > 0 )
		{
			e.preventDefault();
			if (window.myaccount_popup_open == false) window.close_all_header_dropdowns();

			setTimeout(function(){
				window.myaccount_popup_fn();
			}, 200);
		}

	});

});
