jQuery(function($) {
	
	"use strict";

	var max_per_column 	= 6;
    var list_item 		= 'li';
    var list_class 		= 'sub-list';
    
    $(".main-navigation-slices > ul > li > ul.sub-menu > li > ul.sub-menu").each(function() {
        
        var items = $(this).find(list_item);
        var columns = Math.ceil(items.length / max_per_column);

        //console.log(items.length + " / " + columns);

        for (var i = 0; i < columns; i++) {
            
            $(this).append($('<ul />').addClass(list_class));
            
            for (var j = 0; j < max_per_column; j++) {
                
                var pointer = 0;
                
                for (var k = 0; k < i; k++) {
                    pointer += max_per_column;
                }

                $(this).find('.' + list_class).last().append(items[j + pointer]);

                //console.log("pointer: " + pointer + " / " + (j + pointer));

            }
        }

    });


    $('.main-navigation-slices > ul > li.menu-item-has-children').mouseenter(function() {		
		//if ($(document).scrollTop() <= 0) $('body.header-transparent.header-sticky').addClass("header-sticky-scroll");
	}).mouseleave(function() {		
		//if ($(document).scrollTop() <= 0) $('body.header-transparent.header-sticky').removeClass("header-sticky-scroll");
	});





    function gb_show_submenu(){ 
        if ($(document).scrollTop() <= 0) $('body.header-transparent.header-sticky').addClass("header-sticky-scroll no-transparency-lock");
        $('.site-content-overlay').addClass("visible");
        $(this).children('ul').slideDown(200);
    }
    
    function gb_hide_submenu(){ 
        if ($(document).scrollTop() <= 0) $('body.header-transparent.header-sticky').removeClass("header-sticky-scroll no-transparency-lock");
        $('.site-content-overlay').removeClass("visible");
        $(this).children('ul').slideUp(200);
    }

    $('.main-navigation-slices > ul > li.menu-item-has-children').hoverIntent({
        sensitivity: 3, // number = sensitivity threshold (must be 1 or higher)
        interval: 200, // number = milliseconds for onMouseOver polling interval
        timeout: 200, // number = milliseconds delay before onMouseOut
        over: gb_show_submenu, 
        out: gb_hide_submenu
    });

});