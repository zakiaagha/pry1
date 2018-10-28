<?php get_header(); ?>

			<div id="primary" class="content-area">
				<main id="main" class="site-main">

				<?php while ( have_posts() ) : the_post(); ?>
					<header class="page-header">
						<h1 class="page-title"><?php the_title(); ?></h1>
					</header><!-- .page-header -->

                <div class="entry-attachment">
	                <p class="attachment" style="text-align: center">
						<?php if ( wp_attachment_is_image( $post->id ) ) : $att_image = wp_get_attachment_image_src( $post->id, "full"); ?>
	                        <a href="<?php echo wp_get_attachment_url($post->id); ?>" title="<?php the_title(); ?>" rel="attachment">
	                        	<img src="<?php echo ent2ncr($att_image[0]);?>" width="<?php echo ent2ncr($att_image[1]);?>" height="<?php echo ent2ncr($att_image[2]);?>"  class="attachment-medium" alt="<?php $post->post_excerpt; ?>" />
	                        </a>
						<?php else : ?>
	                        <a href="<?php echo wp_get_attachment_url($post->ID) ?>" title="<?php echo esc_html( get_the_title($post->ID), 1 ) ?>" rel="attachment"><?php echo basename($post->guid) ?></a>
						<?php endif; ?>
					</p>
                </div>

				<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->
			</div><!-- #primary -->

		</div><!-- .columns -->

<?php get_footer(); ?>