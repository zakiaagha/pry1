<?php

/******************************************************************************/
/* Post Navigation Archive *****************************************************/
/******************************************************************************/

if ( ! function_exists( 'getbowtied_the_posts_navigation' ) ) :
function getbowtied_the_posts_navigation() {
    // Don't print empty markup if there's only one page.
    if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
        return;
    }
    ?>
    <div class="row">
        <div class="large-12 columns">
            <nav class="posts-navigation" >
                <div class="nav-links">

                            <?php  
                                $args = array(
                                    'prev_next'          => True,
                                    'prev_text'          => "",
                                    'next_text'          => ""
                                ); 

                                echo paginate_links($args); 
                            ?>

                            <!--
                            <?php if ( get_next_posts_link() ) : ?>
                            <div class="nav-previous"><?php next_posts_link( esc_html__( '&laquo; Older posts', 'getbowtied' ) ); ?></div>
                            <?php endif; ?>
             
                            <?php if ( get_previous_posts_link() ) : ?>
                            <div class="nav-next"><?php previous_posts_link( esc_html__( 'Newer posts &raquo;', 'getbowtied' ) ); ?></div>
                            <?php endif; ?>
                            -->
             
                </div><!-- .nav-links -->
            </nav><!-- .navigation -->
        </div>
    </div>
    <?php
}
endif;