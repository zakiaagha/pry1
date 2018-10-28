<?php if ( ! is_active_sidebar( 'blog-widget-area' ) ) : ?>
	
	

<?php else : ?>

<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'blog-widget-area' ); ?>
</div><!-- #secondary -->

<?php endif; ?>