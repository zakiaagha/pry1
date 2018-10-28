jQuery(function($) {
	
	"use strict";

	var blog_posts_slides_per_view = 2;

	var update_blog_posts_slides_per_view = function() {
	    if (Foundation.utils.is_small_only()) {
			blog_posts_slides_per_view = 1;
		} else { //if (Foundation.utils.is_medium_only()) {
		    blog_posts_slides_per_view = 2;
		}
	};

	update_blog_posts_slides_per_view();

	if ($('.shortcode_getbowtied_blog_posts').length > 0) {

		$('.shortcode_getbowtied_blog_posts').each(function(){

			window.blog_posts = new Swiper ($(this), {
				// Optional parameters
			    direction: 'horizontal',
			    loop: true,
			    grabCursor: true,
				preventClicks: true,
				preventClicksPropagation: true,
				autoplay: 10000,
				speed: 600,
				effect: 'slide',
				slidesPerView: blog_posts_slides_per_view,
			    
			    // // If we need pagination
			    pagination: $(this).find('.quickview-pagination'),
			    paginationClickable: true,

			    // // Navigation arrows
			    nextButton: $(this).find('.swiper-button-next'),
			    prevButton: $(this).find('.swiper-button-prev'),

			    parallax: true,

			    
			    // // And if we need scrollbar
			    // scrollbar: '.swiper-scrollbar',
			})

			$(window).on("load resize",function() {
				update_blog_posts_slides_per_view();
				window.blog_posts.params.slidesPerView = blog_posts_slides_per_view;
			});

		})

	}

	// $(window).on('load resize', Foundation.utils.throttle(function(e) {
	// 	console.log('yes');
	// }, 300));
});