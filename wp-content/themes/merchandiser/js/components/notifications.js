jQuery(function($) {
	
	"use strict";

	$(window).load(function(){
		// if ($('.woocommerce-error').length || $('.woocommerce-message').length > 0 || $('.woocommerce-info').length > 0 )
		// {
		// 	$('.notifications').addClass('active');
		// }

		// setTimeout(function(){
		// 	$('.notifications').removeClass('active');
		// }, 5000)

		if ( $('.woocommerce-message').length > 0 )
		{
			$('.woocommerce-message').wrapInner('<div class="inner"></div>').append('<a href="#" class="close"><i class="fa fa-times"></i></a>');
			$('.woocommerce-message > .inner').find('a').detach().appendTo('.woocommerce-message > .inner');

			$('.woocommerce-message').on('click', '.close', function(){
				$('.woocommerce-message').addClass('inactive');
			})
		}

		if ( $('.woocommerce-error').length > 0 )
		{
			$('ul.woocommerce-error').append('<li class="close"><a href="#" class="close"><i class="fa fa-times"></i></a></li>');
			$('.woocommerce-error').on('click', '.close', function(){
				$('.woocommerce-error').addClass('inactive');
			})
		}

		$('form.woocommerce-checkout').on('click', '.woocommerce-error', function(){
			$('.woocommerce-error').addClass('inactive');
		})

		if ( $('.woocommerce-cart .woocommerce-info').length > 0 )
		{
			$('.woocommerce-cart .woocommerce-info').wrapInner('<div class="inner"></div>').append('<a href="#" class="close"><i class="fa fa-times"></i></a>');
			$('.woocommerce-cart .woocommerce-info > .inner').find('a').detach().appendTo('.woocommerce-cart .woocommerce-info > .inner');

			$('.woocommerce-cart .woocommerce-info').on('click', '.close', function(){
				$('.woocommerce-cart .woocommerce-info').addClass('inactive');
			})
		}
	})

});