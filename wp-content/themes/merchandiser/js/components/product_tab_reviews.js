jQuery(function($) {
	
	"use strict";

	$(".woocommerce-tabs #reviews .comment-text > p.meta").contents().filter(function(){
	    return (this.nodeType == 3);
	}).remove();

	$("#reviews #comments .comment_container").each(function(){
		$(this).find(".star-rating").detach().insertAfter($(this).find(".meta"));
	});

	if ( ($('ol.commentlist').length < 1) && ($('body.woocommerce').length > 1)  )
	{
		$('#comments').hide();
	}

});