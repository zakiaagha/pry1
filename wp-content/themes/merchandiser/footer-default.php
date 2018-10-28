<?php
					
if (get_post_meta( getbowtied_page_id(), 'footer_meta_box_check', true )) {
	$page_footer_option = get_post_meta( getbowtied_page_id(), 'footer_meta_box_check', true );
} else {
	$page_footer_option = "on";
}

global  $custom_footer_copyright;

?>

<div class="footer-widget-wrapper">
    <ul class="footer-widget-area widget-area adjust_cols_height">
        <?php dynamic_sidebar( 'footer-widget-area' ); ?>
    </ul>
</div>

<?php if ( $page_footer_option == "on" ) : ?>

<footer class="site-footer">

	<div class="footer-wrapper">
			
		<div class="footer-socials">
			<?php echo do_shortcode('[socials]'); ?>
		</div>

		<?php if (!empty($custom_footer_copyright)): ?>
			<div class="footer-copyright"><?php echo ent2ncr($custom_footer_copyright); ?></div>
		<?php endif; ?>

		<nav class="footer-navigation" >
			<?php 
	            wp_nav_menu(array(
	                'theme_location' => 'footer',
	                'fallback_cb'    => false,
	                'container'      => false,
	                'items_wrap'     => '<ul class="%1$s">%3$s</ul>',
	            ));
	        ?>
		</nav>

	</div>

</footer>

<?php endif; ?>