jQuery(function($) {

	"use strict";

	try {
	if ($(".row_split .product-images-carousel").length) {

		var product_images = new Swiper ('.row_split .product-images-carousel', {				
			//grabCursor: true,
			preventClicks: true,
			preventClicksPropagation: true,
			autoHeight: true,
			preloadImages: true,
			updateOnImagesReady: true,
	        lazyLoading: true,
	        //nextButton: '.swiper-button-next',
	        //prevButton: '.swiper-button-prev',
		});

		if ($(".row_split .product-thumbnails-carousel").length) {

			var product_thumbnails_vertical = new Swiper ('.product-thumbnails-vertical-wrapper .product-thumbnails-carousel', {					
		        direction: 'vertical',
		        slidesPerView: 4,
		        preventClicks: false,
		        preventClicksPropagation: false
			});

			var product_thumbnails_horizontal = new Swiper ('.product-thumbnails-horizontal-wrapper .product-thumbnails-carousel', {					
		        slidesPerView: 3,
		        preventClicks: false,
		        preventClicksPropagation: false
			});

		}

		var temp_img_html = $(".row_split .product-images-carousel .swiper-slide").eq(0).find(".images").html();

		$('.product_content_wrapper').each(function() {

			$(".product-image-temp").html(temp_img_html);

			$(".product-thumbnails-vertical-wrapper .swiper-slide").eq(0).addClass("active");
			$(".product-thumbnails-horizontal-wrapper .swiper-slide").eq(0).addClass("active");

			product_images.on('SlideChangeStart', function() {
				activate_slide(product_images.activeIndex);
			});

			if ($(".row_split .product-thumbnails-carousel").length) {

				if ($('.product-thumbnails-vertical-wrapper .product-thumbnails-carousel').length) {
					product_thumbnails_vertical.on('onTap', function() {
						activate_slide(product_thumbnails_vertical.clickedIndex);
					});
				}

				if ($('.product-thumbnails-horizontal-wrapper .product-thumbnails-carousel').length) {
					product_thumbnails_horizontal.on('onTap', function() {
						activate_slide(product_thumbnails_horizontal.clickedIndex);
					});
				}

			}

		});

		$('.zoom_enabled .product-images-carousel .swiper-wrapper').on('click', function(){

			$('.row_split, .first_col_split').toggleClass("zoomed");

			$('.row_split .product-image-temp').addClass("visible");

			$('.row_split .product-images-carousel').addClass("hidden");

			$(".row_split .first_col_split").one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function() {
			//setTimeout(function(){
				$('.row_split .product-image-temp').removeClass("visible");
				$('.row_split .product-images-carousel').removeClass("hidden");
				product_images.update(true);
				if ($(".row_split .product-thumbnails-carousel").length) {
					if ($('.product-thumbnails-vertical-wrapper .product-thumbnails-carousel').length) {
						product_thumbnails_vertical.update(true);
					}

					if ($('.product-thumbnails-horizontal-wrapper .product-thumbnails-carousel').length) {
						product_thumbnails_horizontal.update(true);
					}
				}
			//}, 500);
			});

		});

		$(".variations").on('change', 'select', function() {
			setTimeout(function() {
				activate_slide(0);
			}, 500);
		});



		$(window).load(function() {			
			setTimeout(function() {
				product_images.update(true);
				if ($(".row_split .product-thumbnails-carousel").length) {
					if ($('.product-thumbnails-vertical-wrapper .product-thumbnails-carousel').length) {
						product_thumbnails_vertical.update(true);
					}
					if ($('.product-thumbnails-horizontal-wrapper .product-thumbnails-carousel').length) {
						product_thumbnails_horizontal.update(true);
					}
				}
			}, 500);		
		});



		$(window).resize(function() {
			$('.row_split, .first_col_split').removeClass("zoomed");	
			setTimeout(function() {
				product_images.update(true);
				if ($(".row_split .product-thumbnails-carousel").length) {
					if ($('.product-thumbnails-vertical-wrapper .product-thumbnails-carousel').length) {
						product_thumbnails_vertical.update(true);
					}
					if ($('.product-thumbnails-horizontal-wrapper .product-thumbnails-carousel').length) {
						product_thumbnails_horizontal.update(true);
					}
				}
			}, 500);
		});

	}
	} catch (error) {
		
	}

	function activate_slide(index) {

		product_images.slideTo(index, 300, false);

		if ($(".row_split .product-thumbnails-carousel").length) {
			
			product_thumbnails_vertical.slideTo(index-1, 300, false);
			product_thumbnails_horizontal.slideTo(index-1, 300, false);
			
			$(".product-thumbnails-vertical-wrapper .swiper-slide").removeClass("active").eq(index).addClass("active");
			$(".product-thumbnails-horizontal-wrapper .swiper-slide").removeClass("active").eq(index).addClass("active");

		}
		
		if (index == 0) {
			temp_img_html = $(".row_split .product-images-carousel .swiper-slide").eq(0).find(".images").html();
		} else {
			temp_img_html = $(".row_split .product-images-carousel .swiper-slide").eq(index).html();
		}

		$(".product-image-temp").html(temp_img_html);

	}

});