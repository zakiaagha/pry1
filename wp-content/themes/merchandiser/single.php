<?php get_header(); ?>

	<div class="row" style="max-width: 100%">

		<?php 	
			global $custom_single_post_layout;
			if ( has_post_thumbnail() ) : 
				$post_thumbnail_id = get_post_thumbnail_id();  
				$image_url =  wp_get_attachment_url($post_thumbnail_id);

				if ($custom_single_post_layout == 'single_post_1'): ?>
					
					<div class="cover-image" style="background-image:url('<?php echo esc_url($image_url); ?>')">
						<?php //the_post_thumbnail( 'full' ); ?>
						<!-- <a class="mobile-category-link"><i class="fa fa-wrench"></i></a> -->
					</div>

				<?php endif; ?>

		<?php 
			endif; 
		?>

		<?php if ( !is_active_sidebar( 'blog-widget-area' ) ) : ?>

		<div class="large-6 columns small-centered">

		<?php else: ?>

		<div class="large-8 columns small-centered">
			<div class="row main-with-sidebar">
				<div class="large-8 columns">

		<?php endif; ?>

			<div id="primary" class="content-area">
				<main id="main" class="site-main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'single' ); ?>

				<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->
			</div><!-- #primary -->

		</div><!-- .columns -->


		<?php if ( is_active_sidebar( 'blog-widget-area' ) ) : ?>
					<div class="large-3 columns">
						<?php get_sidebar(); ?>
					</div><!-- .columns -->
				</div><!-- .row -->
			</div><!-- .columns -->
		<?php endif; ?>

	<?php getbowtied_navigation_between_posts(); ?>

	<?php
		// If comments are open or we have at least one comment, load up the comment template
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	?>

	</div><!-- .row -->


<?php get_footer(); ?>