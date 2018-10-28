<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
        <?php the_category(); ?>
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

        <div class="entry-meta">
            <span class="single-date">
            <i class="fa fa-calendar-o"></i>
            <?php 
                the_date(); 
            ?>
            </span>

            <span class="single-comments">
                <a href="<?php comments_link(); ?>">
                    <i class="fa fa-comment-o"></i>
                    <?php 
                        comments_number();
                    //getbowtied_posted_on(); 
                    ?>
                </a>
            </span>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->
    <?php global $custom_single_post_layout; ?>
    <?php if ($custom_single_post_layout != 'single_post_1'): ?>
        <div class="featured-image">
            <?php the_post_thumbnail( 'full' ); ?>
        </div>
    <?php endif; ?> 

    <div class="entry-content">
        <?php the_content(); ?>
        <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'getbowtied' ),
                'after'  => '</div>',
            ) );
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php getbowtied_entry_footer(); ?>
    </footer><!-- .entry-footer -->
    
</article><!-- #post-## -->