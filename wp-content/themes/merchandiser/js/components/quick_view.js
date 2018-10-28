jQuery(function($) {
	
	"use strict";

	function product_quick_view_ajax(id) {
		
		$.ajax({
			
			url: getbowtied_ajax_url,
			
			data: {
				"action" : "getbowtied_product_quick_view",
				'product_id' : id
			},

			success: function(results) {
				
				$(".offcanvas_quickview_content").html(results);
				
				var form_variation = $(".offcanvas_quickview").find('.variations_form');
				var form_variation_select = $(".offcanvas_quickview").find('.variations_form .variations select');
            	
            	form_variation.wc_variation_form();
            	form_variation_select.change();

				$('.offcanvas_quickview .buttons .button').first().addClass('first');
				$('.offcanvas_quickview .product_content_wrapper').css('max-height', $(window).height() - $('.offcanvas_quickview .button.single_add_to_cart_button ').height() - $('.offcanvas_quickview .button.view-product').height());
				$('.offcanvas_quickview .product-images-wrapper').css('max-height', $(window).height()/2);

				if ($('.offcanvas_quickview .product-images-carousel').length > 0 ) {

					var slider = $('.offcanvas_quickview').find('.product-images-carousel');

					var quickviewGallery = new Swiper (slider, {
						direction: 'horizontal',
						grabCursor: true,
						preventClicks: true,
						preventClicksPropagation: true,
						pagination: '.quickview-pagination',
						paginationClickable: true,
						lazyLoading: true,
					});

					quickviewGallery.on('SlideChangeStart', function(s) { 
						console.log($('.offcanvas_quickview').find('.product-images-wrapper').find('.swiper-slide-active').height());
						$('.offcanvas_quickview').find('.product-images-wrapper')
					    	.css( 'height', $('.offcanvas_quickview').find('.product-images-wrapper').find('.swiper-slide-active').height() );
					});

				}

            	setTimeout(function() {
		        	$('.loader-icon').removeClass('spinning').addClass('stop_spinning');
		        	$('.overlay-loader').delay(500).fadeOut();
		    	}, 500);

			},

			//error: function(errorThrown) { console.log(errorThrown); }

		});
	}

    $('.site-content').on('click', '.getbowtied_product_quick_view_button', function(e) {
        e.preventDefault();
        var product_id  = $(this).data('product_id');
        
        $("body").addClass("offcanvas_for_quickview");
        $("body").removeClass("offcanvas_for_cart");

        $('.overlay-loader').show();
        $('.loader-icon').removeClass('stop_spinning').addClass('spinning');

        window.offcanvas_right();
        
        setTimeout(function() {
        	product_quick_view_ajax(product_id);
    	}, 500);
    });

    $(window).resize(function(){
		$('.offcanvas_quickview .product_content_wrapper').css('max-height', $(window).height() - $('.offcanvas_quickview .button.single_add_to_cart_button ').height() - $('.offcanvas_quickview .button.view-product').height());
		$('.offcanvas_quickview .product-images-wrapper').css('max-height', $(window).height()/2);
    })
});
