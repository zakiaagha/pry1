<?php

/******************************************************************************/
/* Comments *******************************************************************/
/******************************************************************************/

if ( ! function_exists( 'getbowtied_comments' ) ) :
function getbowtied_comments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;

    if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

    <li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
        <div class="comment-body">
            <?php esc_html_e( 'Pingback:', 'getbowtied' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( 'Edit', 'getbowtied' ), '<span class="edit-link">', '</span>' ); ?>
        </div>

    <?php else : ?>

    <li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
        <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">

            <div class="comment-content">

                    <div class="author-info">
                
                        <div class="comment-author-avatar">
                            <?php echo get_avatar( $comment, 140 ); ?>
                        </div><!-- .comment-author-avatar -->
                        
                        <?php if ( '0' == $comment->comment_approved ) : ?>
                            <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'getbowtied' ); ?></p>
                        <?php endif; ?>
                        
                        <?php printf( esc_html__( '%s', 'getbowtied' ), sprintf( '<h3 class="comment-author">%s</h3>', get_comment_author_link() ) ); ?>
                        
                        <div class="comment-metadata">
                            <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                                <time datetime="<?php comment_time( 'c' ); ?>">
                                    <?php printf( esc_html__( '%1$s at %2$s', 'getbowtied' ), get_comment_date(), get_comment_time() ); ?>
                                </time>
                            </a>
                        </div><!-- .comment-metadata -->

                    </div>

                    <div class="comment-text"><?php comment_text(); ?>
                    
                        <?php
                            comment_reply_link( array_merge( $args, array(
                                'add_below' => 'div-comment',
                                'depth'     => $depth,
                                'max_depth' => $args['max_depth'],
                                'before'    => '<span class="comment-reply"><i class="fa fa-reply"></i>&nbsp;&nbsp;',
                                'after'     => '</span>',
                            ) ) );
                        ?>
                        
                        <?php edit_comment_link( esc_html__( 'Edit', 'getbowtied' ), '<span class="comment-edit-link">', '</span>' ); ?>
                    </div><!-- .comment-text -->

                    
                    <div class="comment-separator"></div>
                
            </div><!-- .comment-content -->
            
        </article><!-- .comment-body -->

    <?php
    endif;
}
endif;