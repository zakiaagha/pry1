jQuery(function($) {
	
	"use strict";

	$('.woocommerce > .checkout-info > form.login').find("p.lost_password").detach().appendTo(".woocommerce > .checkout-info > form.login label[for='rememberme']");
	$('.woocommerce > .checkout-info > form.checkout_coupon').find("button[type='submit']").detach().appendTo(".woocommerce > .checkout-info > form.checkout_coupon .form-row-first");
	$('.woocommerce > .checkout-info > form.checkout_coupon').find(".form-row-last").detach();

	$('form.woocommerce-checkout').click(function(){
		$('.woocommerce .checkout-info form.login:visible').hide();
		$('.woocommerce .checkout-info form.checkout_coupon:visible').hide();
		$(this).find('.cover').removeClass("active");
	})

	$('.showlogin, .showcoupon').on('click', function(){
		$('form.woocommerce-checkout > .cover').addClass("active");
	})
});
