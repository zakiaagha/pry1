jQuery(function($) {
	
	"use strict";

	var login_register = function() {

			// $('.registerContainer').hide();

			$('h2.loginTab').click(function(){
				$(this).addClass('active');
				$('.loginContainer').fadeIn(300);
				$('h2.registerTab').removeClass('active');
				$('.registerContainer').fadeOut(0);
			})

			$('h2.registerTab').click(function(){
				$(this).addClass('active');
				$('.registerContainer').fadeIn(300);
				$('h2.loginTab').removeClass('active');
				$('.loginContainer').fadeOut(0);
			})
	}

	login_register();

});