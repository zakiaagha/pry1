<?php
if ( post_password_required() )
	return;
?>

<div class="comments_section">

    <div id="comments" class="comments-area">

        <?php if ( have_comments() ) : ?>
            <div class="row">
                <div class="large-6 columns small-centered">
                    <div class="comments-number">
                        <?php echo '<p>' . get_comments_number() . '</p>' . getbowtied_get_local_file_contents(get_template_directory().'/images/comments.svg'); ?>
                    </div>

                    <h2 class="comments-title">
                        <?php
                            printf( // WPCS: XSS OK.
                                esc_html( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'getbowtied' ) ),
                                number_format_i18n( get_comments_number() ),
                                '<span>' . get_the_title() . '</span>'
                            );
                        ?>
                    </h2>
                </div>
            </div>

            <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
            <nav id="comment-nav-above" class="comment-navigation" >
                <h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'getbowtied' ); ?></h1>
                <div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'getbowtied' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'getbowtied' ) ); ?></div>
            </nav><!-- #comment-nav-above -->
            <?php endif; // check for comment navigation ?>

            <ul class="comment-list">
            <?php
                /* Loop through and list the comments. Tell wp_list_comments()
                 * to use getbowtied_comment() to format the comments.
                 * If you want to override this in a child theme, then you can
                 * define getbowtied_comment() and that will be used instead.
                 * See getbowtied_comment() in inc/template-tags.php for more.
                 */
                wp_list_comments( array( 'callback' => 'getbowtied_comments' ) );
            ?>
            </ul><!-- .comment-list -->

            <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
            <nav id="comment-nav-below" class="comment-navigation" >
                <h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'getbowtied' ); ?></h1>
                <div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'getbowtied' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'getbowtied' ) ); ?></div>
            </nav><!-- #comment-nav-below -->
            <?php endif; // check for comment navigation ?>

        <?php endif; // have_comments() ?>

        <?php
            // If comments are closed and there are comments, let's leave a little note, shall we?
            if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
        ?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'getbowtied' ); ?></p>
        <?php endif; ?>


        <?php 

        $commenter 	= wp_get_current_commenter();
        $req 		= get_option( 'require_name_email' );
        $aria_req 	= ( $req ? " aria-required='true'" : '' );

        $allowed_html_array = array();

        $getbowtied_comments_args = array(		

            'title_reply' => esc_html__( 'Leave a Reply', 'getbowtied' ),

            'fields' => apply_filters( 'comment_form_default_fields', array(

                'author' 	    => 	'<div class="row"><div class="large-4 columns"><p class="comment-form-author">' . '<label for="author">' . esc_html__( 'Name', 'getbowtied' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                                    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p></div>',
                'email'  	    => 	'<div class="large-4 columns"><p class="comment-form-email"><label for="email">' . esc_html__( 'Email Address', 'getbowtied' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                                    '<input id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p></div>',
                'url'   	    => 	'<div class="large-4 columns"><p class="comment-form-url"><label for="url">' . esc_html__( 'Website', 'getbowtied' ) . '</label> ' .
                                    '<input id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p></div></div>'
            )),

            'comment_field' =>	'<p>' .	
                                '<label for="comment">' . esc_html__( 'Message', 'getbowtied' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label>' .
                                '<textarea id="comment" name="comment" cols="45" rows="8" ' . $aria_req . '></textarea>' .	
                                '</p>',

            //'comment_notes_after'  => '<p class="form-allowed-tags">' . sprintf( esc_html__( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', 'getbowtied' ), ' <code>' . allowed_tags() . '</code>' ) . '</p>',
            'comment_notes_after'  => '',
            'logged_in_as'  =>  '<p class="logged-in-as">' . sprintf( wp_kses( __( 'Logged in as <a class="user" href="%1$s">%2$s</a>. <a class="logout" href="%3$s" title="Log out of this account"><i class="fa fa-power-off"></i> Log out?</a>', 'getbowtied' ), $allowed_html_array ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>'

        );

        echo '<div class="comment-respond-form ' . ('0' == get_comments_number() ? 'no-comments' : '') . '">';
        if ( '0' == get_comments_number()):
            echo '<div class="comments-number">'.getbowtied_get_local_file_contents(get_template_directory().'/images/comments.svg') . get_comments_number().'</div>';
        endif;

            ob_start();
            comment_form($getbowtied_comments_args);
            $form = ob_get_clean(); 
            echo ent2ncr($form);

        echo '</div>';

        ?>

    </div><!-- #comments -->  


</div><!-- .comments_section -->