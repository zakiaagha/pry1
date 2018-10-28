jQuery(function($) {
	
	"use strict";

	var grid = document.querySelector('#masonry_grid');

	var newVal = 4;

	$(".change_layout")
		
		.on('click', '.nl-field-toggle', function() {
			$(this).closest(".nl-dd").addClass("nl-field-open");
		})

		.on('click', 'li', function() {

			newVal 	= $(this).data('newval');
			var bg 		= $(this).data('bg');

			document.cookie = "change_layout=" + newVal + ';path=/';

			if ($("#masonry_grid").length) {
				
				$('#masonry_grid').removeClass();
				$('#masonry_grid')
					.addClass('products')
					.addClass('masonry_columns_' + newVal)
					.addClass('visible');
				salvattore.recreateColumns(grid);

			} else {
				
				$('.woocommerce-page .products-grid')
					.removeClass('xlarge-block-grid-2 xxlarge-block-grid-2')
					.removeClass('xlarge-block-grid-3 xxlarge-block-grid-3')
					.removeClass('xlarge-block-grid-4 xxlarge-block-grid-4')
					.removeClass('xlarge-block-grid-5 xxlarge-block-grid-5')
					.removeClass('xlarge-block-grid-6 xxlarge-block-grid-6')
					.addClass('xlarge-block-grid-' + newVal)
					.addClass('xxlarge-block-grid-' + newVal);
			}

			$(this).siblings("li").removeClass();
			$(this).addClass("nl-dd-checked");
			$(this).closest(".nl-dd").find(".nl-field-toggle").css( 'background', 'url(' + bg + ')' );
			$(this).closest(".nl-dd").removeClass("nl-field-open");

		})

		.on('click', '.nl-overlay', function() {
			$(this).siblings(".nl-dd").removeClass("nl-field-open");
		});

		function getCookie(cname) {
		    var name = cname + "=";
		    var ca = document.cookie.split(';');
		    for(var i = 0; i <ca.length; i++) {
		        var c = ca[i];
		        while (c.charAt(0)==' ') {
		            c = c.substring(1);
		        }
		        if (c.indexOf(name) == 0) {
		            return c.substring(name.length,c.length);
		        }
		    }
		    return "";
		}

	    var change_layout = getCookie("change_layout");

	    var layout_options = [2,3,4,5,6];

	    if ( change_layout != '' && layout_options.indexOf('change_layout') !== 0 ) {
	        
	        $('body.archive.woocommerce-page .products-grid')
			.removeClass('xlarge-block-grid-2 xxlarge-block-grid-2')
			.removeClass('xlarge-block-grid-3 xxlarge-block-grid-3')
			.removeClass('xlarge-block-grid-4 xxlarge-block-grid-4')
			.removeClass('xlarge-block-grid-5 xxlarge-block-grid-5')
			.removeClass('xlarge-block-grid-6 xxlarge-block-grid-6')
			.addClass('xlarge-block-grid-' + change_layout)
			.addClass('xxlarge-block-grid-' + change_layout);

			var bg_current = false;

			$('.change_layout li').each(function() {
				if ($(this).attr('data-newval') == change_layout  ) {
					bg_current = $(this).attr('data-bg') ;
				}
			});

			if ( bg_current !== false ) {
				$('.nl-dd').find(".nl-field-toggle").css( 'background', 'url(' + bg_current + ' ) ');
			}
	    } 

});