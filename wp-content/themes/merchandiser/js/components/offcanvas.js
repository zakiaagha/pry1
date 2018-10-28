jQuery(function($) {
	
	"use strict";
	
	window.offcanvas_open = false;
	window.offcanvas_from_left = false;
	window.offcanvas_from_right = false;

	window.offcanvas_close = function() {		
		
		window.offcanvas_open = false;
		window.offcanvas_from_left = false;
		window.offcanvas_from_right = false;			
		
		$("body").removeClass("offcanvas_open offcanvas_left offcanvas_right");

		$(".offcanvas_main_content").one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function() {   
            setTimeout(function(){ 
            	$(window).trigger('resize');
            }, 600);
        });

	}

	window.offcanvas_left = function() {			
		
		if (window.offcanvas_open == true) window.offcanvas_close();
		window.offcanvas_open = true;
		window.offcanvas_from_left = true;		
		
		$("body").removeClass("no-offcanvas-animation").addClass("offcanvas_open offcanvas_left");

		//$(".nano").nanoScroller();		
	}

	window.offcanvas_right = function() {			
		
		if (window.offcanvas_open == true) window.offcanvas_close();	
		window.offcanvas_open = true;
		window.offcanvas_from_right = true;		
		
		$("body").removeClass("no-offcanvas-animation").addClass("offcanvas_open offcanvas_right");

		//$(".nano").nanoScroller();		
	}
	
	// Overlay Close Offcanvas
	$(".offcanvas_overlay").click(function() {	
		window.offcanvas_close();
	});

	$('.offcanvas_aside_left .offcanvas_close').on('click', function(){
		window.offcanvas_close();
	});

	$('.offcanvas_aside_right .offcanvas_close').on('click', function(){
		window.offcanvas_close();
	});

});
