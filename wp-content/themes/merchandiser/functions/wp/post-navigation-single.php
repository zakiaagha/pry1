<?php

/******************************************************************************/
/* Post Navigation Single *****************************************************/
/******************************************************************************/

if ( ! function_exists( 'getbowtied_navigation_between_posts' ) ) :
function getbowtied_navigation_between_posts() {
	
    // Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) return;
    
    ?>
    
    <div class="row">
        <div class="large-12 columns">    
            <nav class="navigation_between_posts" >	
                
                <?php                    
                    $prevPost = get_previous_post(); 
                    if (!empty($prevPost->ID)) {
                        $prevthumbnail = get_the_post_thumbnail($prevPost->ID, array(150,150) );
                        previous_post_link( '<div class="nav-previous">%link'.$prevthumbnail.'</div>', '' );
                    }             
                ?>
                
                <?php 
                    $nextPost = get_next_post();
                    if (!empty($nextPost->ID)) {
                        $nextthumbnail = get_the_post_thumbnail($nextPost->ID, array(150,150) );
                        next_post_link( '<div class="nav-next">%link '.$nextthumbnail.'</div>', '' );
                    }
                ?> 

                <?php previous_post_link( '<div class="nav-previous-mobile">%link</div>', '&laquo; prev' ); ?>
                <?php next_post_link( '<div class="nav-next-mobile">%link</div>', 'next &raquo;' ); ?>

            </nav>
        </div>
    </div>
	
    <?php
}
endif;