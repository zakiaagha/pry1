jQuery(function($) {
	
	"use strict";

	window.close_all_header_dropdowns = function() {		
		
		window.search_wrapper_open = true;
        window.myaccount_popup_open = true;

        window.search_wrapper_fn();
        window.myaccount_popup_fn();

	}

    $(".site-content-overlay").on("click", function() {

        window.close_all_header_dropdowns();

    });

});