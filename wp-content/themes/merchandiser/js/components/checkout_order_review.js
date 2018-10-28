jQuery(function($) {
	
	"use strict";

	$('ul.order_details').each(function(){
		if (!$(this).children('li').length)
		{
			$(this).hide();
		}
	})

});
