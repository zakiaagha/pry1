<?php
if (get_post_meta( getbowtied_page_id(), 'page_title_meta_box_check', true )) {
    $page_title_option = get_post_meta( getbowtied_page_id(), 'page_title_meta_box_check', true );
} else {
    $page_title_option = "on";
}
?>

<?php get_header(); ?>	

<div id="primary" class="content-area fullwidth">
	<main id="main" class="site-main">		

		<?php while ( have_posts() ) : the_post(); ?>

			<?php if ( "on" == $page_title_option ) : ?>

		        <header class="entry-header">
		            <?php the_title( '<h1 class="entry-title page-title">', '</h1>' ); ?>
		        </header><!-- .entry-header -->

		    <?php endif; ?>

		    <?php 
		    	if ( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ):
		    		echo '<div class="notifications">';
		    		wc_print_notices();
		    		echo '</div>';
		    	endif;
		     ?>

			<div class="row">

				<div class="large-12 columns">

					<?php get_template_part( 'content', 'page' ); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>

				</div><!-- .columns -->

			</div><!-- .row -->

		<?php endwhile; // end of the loop. ?>			

	</main><!-- #main -->
</div><!-- #primary -->		

<?php get_footer(); ?>