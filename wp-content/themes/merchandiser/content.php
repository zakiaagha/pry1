<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
        <div class="image-wrapper">
            <?php if ( has_post_thumbnail() ) {

                the_post_thumbnail();

            } else { ?>
  
                <div style="background: #F7F7F7; min-height: 457px;"></div>

            <?php } ?>

        </div>

        <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

        <?php if ( 'post' == get_post_type() ) : ?>

        <div class="entry-meta">
            <?php

                the_date();

            ?>
        </div>
        <?php endif; ?>

        <a class="entry-link" href="<?php echo the_permalink(); ?>"></a>

    </header><!-- .entry-header -->

    <div class="entry-content">
        
        <?php /* the_content( esc_html__( 'Continue reading', 'getbowtied' ), false ); */ ?>

        <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'getbowtied' ),
                'after'  => '</div>',
            ) );
        ?>

    </div><!-- .entry-content -->

    <footer class="entry-footer">
    </footer><!-- .entry-footer -->

</article><!-- #post-## -->