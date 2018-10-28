jQuery(function($) {
	
	"use strict";

	$('.woocommerce-review-link').off('click').on('click',function(){
	
		$('.tabs li a').each(function(){
			if ($(this).attr('href')=='#tab-reviews') {
				$(this).trigger('click');
			}
		});
		
		var tab_reviews_topPos = $('.woocommerce-tabs').offset().top;
		
		$('html, body').animate({
            scrollTop: tab_reviews_topPos
        }, 500);
		
		return false;
	});

	$( '.wc-tabs-wrapper, .woocommerce-tabs' ).off('click').on('click', '.wc-tabs li a, ul.tabs li a', function() {

		if ($(this).parent('li').hasClass('active'))
		{
			return false;
		}
		else 
		{
			var $tab          = $( this );
			var $tabs_wrapper = $tab.closest( '.wc-tabs-wrapper, .woocommerce-tabs' );
			var $tabs         = $tabs_wrapper.find( '.wc-tabs, ul.tabs' );

			$tabs.find( 'li' ).removeClass( 'active' );
			$(this).parent('li').addClass( 'active' );

			$tabs_wrapper.find( '.wc-tab:visible').fadeOut(300, function(){
				$tabs_wrapper.find( $tab.attr( 'href' ) ).fadeIn(300);
			});

			return false;
		}
	});

});