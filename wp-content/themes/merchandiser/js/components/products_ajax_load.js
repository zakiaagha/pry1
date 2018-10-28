jQuery(function($) {
	
	"use strict";

	//comming from wp_localize_script

	//getbowtied_scripts_vars.shop_pagination_type
	//getbowtied_scripts_vars.shop_layout_style
	
	//getbowtied_scripts_vars.ajax_load_more_locale
	//getbowtied_scripts_vars.ajax_loading_locale
	//getbowtied_scripts_vars.ajax_no_more_items_locale
	
	var getbowtied_ajax_load = {
	    
	    init: function() {

	        if (getbowtied_scripts_vars.shop_pagination_type == 'load_more_button' || getbowtied_scripts_vars.shop_pagination_type == 'infinite_scroll') {
	        
		        $(document).ready(function() {
		            
		            if ($('.woocommerce-pagination').length) {
		                
		                $('.woocommerce-pagination').before('<div class="getbowtied_ajax_load_button"><a getbowtied_ajax_load_more_processing="0"><i class="fa fa-refresh"></i>&nbsp;&nbsp;'+getbowtied_scripts_vars.ajax_load_more_locale+'</a></div>');
		                
		                if (getbowtied_scripts_vars.shop_pagination_type == 'infinite_scroll') {
		                    $('.getbowtied_ajax_load_button').addClass('getbowtied_ajax_load_more_hidden');
		                }
		                
		                if ($('.woocommerce-pagination a.next').length == 0) {
	                        $('.getbowtied_ajax_load_button').addClass('getbowtied_ajax_load_more_hidden');
	                    }

		            }

		            //$('.woocommerce-pagination').addClass('getbowtied_ajax_load_more_hidden');
		            $('.woocommerce-pagination').hide();		            
		            $('ul.products li.product').addClass('getbowtied_ajax_load_more_item_visible');

		        });
		        
		        $('body').on('click', '.getbowtied_ajax_load_button a', function(e) {
		            
		            e.preventDefault();
		            
		            if ($('.woocommerce-pagination a.next').length) {
		                
		                $('.getbowtied_ajax_load_button a').attr('getbowtied_ajax_load_more_processing', 1);		                
		                var href = $('.woocommerce-pagination a.next').attr('href');
		                
		                /*if(!getbowtied_ajax_load.msieversion()) {
							history.pushState(null, null, href);
						}*/

		                getbowtied_ajax_load.onstart();
		                
		                $('.getbowtied_ajax_load_button').hide();		                
		                $('.woocommerce-pagination').before('<div class="getbowtied_ajax_load_more_loader"><i class="fa fa-refresh fa-spin"></i>&nbsp;&nbsp;<span>'+getbowtied_scripts_vars.ajax_loading_locale+'</span></div>');
		                
		                $.get(href, function(response) {

		                	/*if(!getbowtied_ajax_load.msieversion()) {
								document.title = $(response).filter('title').html();
							}*/
		                    
		                    $('.woocommerce-pagination').html($(response).find('.woocommerce-pagination').html());

		                    $(response).find('ul.products li.product').each(function() {
		                        
		                        $(this).addClass('hidden');

		                        if ( getbowtied_scripts_vars.shop_layout_style == "regular" ) {

		                        	$('ul.products li.product:last').after($(this));

		                        } else {

		                        	var grid = document.querySelector('#masonry_grid');
									var item = document.createElement('li');

									salvattore.appendElements(grid, [item]);
									item.outerHTML = $(this).prop('outerHTML');

		                        }

		                    });

		                    $('.getbowtied_ajax_load_more_loader').fadeOut("slow");
		                    $('.getbowtied_ajax_load_button').fadeIn("slow");

		                    $('.getbowtied_ajax_load_button a').attr('getbowtied_ajax_load_more_processing', 0);
		                    
		                    getbowtied_ajax_load.onfinish();

		                    setTimeout(function(){
		                    	$('ul.products li.product').not('.getbowtied_ajax_load_more_item_visible').addClass('animated fadeIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
			                        $(this).removeClass('hidden animated fadeIn').addClass('getbowtied_ajax_load_more_item_visible');
			                    });
		                    }, 500);

		                    if ($('.woocommerce-pagination a.next').length == 0) {
		                        $('.getbowtied_ajax_load_button').addClass('finished').removeClass('getbowtied_ajax_load_more_hidden');
		                        $('.getbowtied_ajax_load_button a').show().html(getbowtied_scripts_vars.ajax_no_more_items_locale).addClass('disabled');
		                    }

		                });

		            } else {
		                
		                $('.getbowtied_ajax_load_button').addClass('finished').removeClass('getbowtied_ajax_load_more_hidden');		                
		                $('.getbowtied_ajax_load_button a').show().html(getbowtied_scripts_vars.ajax_no_more_items_locale).addClass('disabled');

		            }

		        });

	        }
	        
	        if (getbowtied_scripts_vars.shop_pagination_type == 'infinite_scroll') {

		        var buffer_pixels = Math.abs(0);
		        
		        $(window).scroll(function() {
		           
		            if ($('ul.products').length) {
		                
		                var a = $('ul.products').offset().top + $('ul.products').outerHeight();
		                var b = a - $(window).scrollTop();
		                
		                if ((b - buffer_pixels) < $(window).height()) {
		                    if ($('.getbowtied_ajax_load_button a').attr('getbowtied_ajax_load_more_processing') == 0) {
		                        $('.getbowtied_ajax_load_button a').trigger('click');
		                    }
		                }

		            }

		        });

	        }
	    },

	    onstart: function() {
	    },

	    onfinish: function() {
            // window.shop_sidebar();
	    },

	    /*msieversion: function() {
	        var ua = window.navigator.userAgent;
	        var msie = ua.indexOf("MSIE ");

	        if (msie > 0) // If Internet Explorer, return version number
	            return parseInt(ua.substring(msie + 5, ua.indexOf(".", msie)));

	        return false;
	    },*/

	};

	getbowtied_ajax_load.init();
	getbowtied_ajax_load.onfinish();
});