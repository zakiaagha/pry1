<div class="offcanvas_minicart">
	<div class="offcanvas_right_close offcanvas_close"><i class="fa fa-times"></i></div>
	<?php if ( class_exists( 'WC_Widget_Cart' ) ) { the_widget( 'WC_Widget_Cart' ); } ?>
</div>

<div class="offcanvas_quickview woocommerce">
	
	<div class="overlay-loader">
	    <img class="loader-icon spinning" src="<?php echo get_template_directory_uri() . '/images/loaders/puff.svg'; ?>" alt="">
	</div>

	<div class="offcanvas_quickview_content"><!-- Quick view content --></div>

</div>