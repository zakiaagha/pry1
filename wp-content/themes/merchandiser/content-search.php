<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

        <div class="entry-meta">
        <?php if (null !== get_the_date()): ?>
            <span class="single-date">
            	<i class="fa fa-calendar-o"></i>
	            <?php 
	            	echo get_the_date('F j, Y'); 
	            ?>
            </span>
        <?php endif; ?>

            <span class="single-comments">
                <i class="fa fa-comment-o"></i>
                <?php if (get_post_type() != 'product'): ?>
                <a href="<?php comments_link(); ?> ">
	                <?php 
	                    comments_number();
	                ?>
                </a>
            	<?php else: ?>
            	<a href="<?php echo esc_url( get_permalink() ) ?>#reviews">
	                <?php 
	                    comments_number();
	                ?>
                </a>
             	<?php endif; ?>	
            </span>
        </div><!-- .entry-meta -->

		<?php if ( 'post' == get_post_type() ) : ?>
		<!-- <div class="entry-meta">
			<?php getbowtied_posted_on(); ?>
		</div>--><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<!-- <div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>--><!-- .entry-summary -->

	<!-- <footer class="entry-footer">
		<?php getbowtied_entry_footer(); ?>
	</footer> --><!-- .entry-footer -->
	
</article><!-- #post-## -->
