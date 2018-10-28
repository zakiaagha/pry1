jQuery(function($) {
	
	"use strict";

	//comming from wp_localize_script

	//getbowtied_scripts_vars.blog_pagination_type
	//getbowtied_scripts_vars.blog_layout
	
	//getbowtied_scripts_vars.ajax_load_more_locale
	//getbowtied_scripts_vars.ajax_loading_locale
	//getbowtied_scripts_vars.ajax_no_more_items_locale

	
	var getbowtied_blog_ajax_load = {
	    
	    init: function() {

	        if (getbowtied_scripts_vars.blog_pagination_type == 'load_more_button' || getbowtied_scripts_vars.blog_pagination_type == 'infinite_scroll') {
	        
		        $(document).ready(function() {
		            
		            if ($('.posts-navigation').length) {
		                
		                $('.posts-navigation').before('<div class="getbowtied_blog_ajax_load_button"><a getbowtied_blog_ajax_load_more_processing="0"><i class="fa fa-refresh"></i>&nbsp;&nbsp;'+getbowtied_scripts_vars.ajax_load_more_locale+'</a></div>');
		                
		                if (getbowtied_scripts_vars.blog_pagination_type == 'infinite_scroll') {
		                    $('.getbowtied_blog_ajax_load_button').addClass('getbowtied_blog_ajax_load_more_hidden');
		                }
		                
		                if ($('.posts-navigation a.next').length == 0) {
	                        $('.getbowtied_blog_ajax_load_button').addClass('getbowtied_blog_ajax_load_more_hidden');
	                    }

		            }

		            //$('.posts-navigation').addClass('getbowtied_blog_ajax_load_more_hidden');
		            $('.posts-navigation').hide();		            
	            	$('ul.blog_posts > li').addClass('getbowtied_blog_ajax_load_more_item_visible');

		        });
		        
		        $('body').on('click', '.getbowtied_blog_ajax_load_button a', function(e) {
		            
		            e.preventDefault();
		            
		            if ($('.posts-navigation a.next').length) {
		                
		                $('.getbowtied_blog_ajax_load_button a').attr('getbowtied_blog_ajax_load_more_processing', 1);		                
		                var href = $('.posts-navigation a.next').attr('href');
		                
		                /*if(!getbowtied_blog_ajax_load.msieversion()) {
							history.pushState(null, null, href);
						}*/

		                getbowtied_blog_ajax_load.onstart();
		                
		                $('.getbowtied_blog_ajax_load_button').hide();		                
		                $('.posts-navigation').before('<div class="getbowtied_blog_ajax_load_more_loader"><i class="fa fa-refresh fa-spin"></i>&nbsp;&nbsp;<span>'+getbowtied_scripts_vars.ajax_loading_locale+'</span></div>');
		                
		                $.get(href, function(response) {

		                	/*if(!getbowtied_blog_ajax_load.msieversion()) {
								document.title = $(response).filter('title').html();
							}*/
		                    
		                    $('.posts-navigation').html($(response).find('.posts-navigation').html());

		                    $(response).find('ul.blog_posts > li').each(function() {
		                        
		                         if ( getbowtied_scripts_vars.blog_layout == "blog_layout_default" ) {

		                         	var grid = document.querySelector('#masonry_grid');
									var item = document.createElement('li');

									salvattore.appendElements(grid, [item]);
									item.outerHTML = $(this).prop('outerHTML');

		                         } else {

		                        	$('ul.blog_posts > li:last').after($(this));

		                         }

		                    });

		                    $('.getbowtied_blog_ajax_load_more_loader').remove();		                    
		                    $('.getbowtied_blog_ajax_load_button').show();		                    
		                    $('.getbowtied_blog_ajax_load_button a').attr('getbowtied_blog_ajax_load_more_processing', 0);
		                    
		                    getbowtied_blog_ajax_load.onfinish();
		                    
		                    $('ul.blog_posts > li').not('.getbowtied_blog_ajax_load_more_item_visible').addClass('animated fadeIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
		                        $(this).removeClass('animated fadeIn').addClass('getbowtied_blog_ajax_load_more_item_visible');
		                    });

		                    if ($('.posts-navigation a.next').length == 0) {
		                        $('.getbowtied_blog_ajax_load_button').addClass('finished').removeClass('getbowtied_blog_ajax_load_more_hidden');
		                        $('.getbowtied_blog_ajax_load_button a').show().html(getbowtied_scripts_vars.ajax_no_more_items_locale).addClass('disabled');
		                    }

		                });

		            } else {
		                
		                $('.getbowtied_blog_ajax_load_button').addClass('finished').removeClass('getbowtied_blog_ajax_load_more_hidden');		                
		                $('.getbowtied_blog_ajax_load_button a').show().html(getbowtied_scripts_vars.ajax_no_more_items_locale).addClass('disabled');

		            }

		        });

	        }
	        
	        if (getbowtied_scripts_vars.blog_pagination_type == 'infinite_scroll') {

		        var buffer_pixels = Math.abs(0);
		        
		        $(window).scroll(function() {
		           
		            if ($('ul.blog_posts').length) {
		                
		                var a = $('ul.blog_posts').offset().top + $('ul.blog_posts').outerHeight();
		                var b = a - $(window).scrollTop();
		                
		                if ((b - buffer_pixels) < $(window).height()) {
		                    if ($('.getbowtied_blog_ajax_load_button a').attr('getbowtied_blog_ajax_load_more_processing') == 0) {
		                        $('.getbowtied_blog_ajax_load_button a').trigger('click');
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

	if (!$('body').hasClass('search'))
	{
		getbowtied_blog_ajax_load.init();
		getbowtied_blog_ajax_load.onfinish();
	}
});