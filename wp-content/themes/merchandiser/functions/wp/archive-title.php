<?php

/******************************************************************************/
/* Archive Title **************************************************************/
/******************************************************************************/

if ( ! function_exists( 'getbowtied_the_archive_title' ) ) :
function getbowtied_the_archive_title( $before = '', $after = '' ) {
    if ( is_category() ) {
        $title = '<span>' . esc_html__( 'Category Archive', 'getbowtied' ) . '</span>' . single_cat_title('', false);
    } elseif ( is_tag() ) {
        $title = '<span>' . esc_html__( 'Tag Archive', 'getbowtied' ) . '</span>' . single_tag_title('', false);
    } elseif ( is_author() ) {
        $title = '<span>' . esc_html__( 'Author Archive', 'getbowtied' ) . '</span>' . get_the_author();
    } elseif ( is_year() ) {
        $title = '<span>' . esc_html__( 'Year Archive', 'getbowtied' ) . '</span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'getbowtied' ) );
    } elseif ( is_month() ) {
        $title = '<span>' . esc_html__( 'Month Archive', 'getbowtied' ) . '</span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'getbowtied' ) );
    } elseif ( is_day() ) {
        $title = '<span>' . esc_html__( 'Day Archive', 'getbowtied' ) . '</span>' . get_the_date( _x( 'F j, Y', 'daily archives date format', 'getbowtied' ) );
    } elseif ( is_tax( 'post_format' ) ) {
        if ( is_tax( 'post_format', 'post-format-aside' ) ) {
            $title = _x( 'Asides', 'post format archive title', 'getbowtied' );
        } elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
            $title = _x( 'Galleries', 'post format archive title', 'getbowtied' );
        } elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
            $title = _x( 'Images', 'post format archive title', 'getbowtied' );
        } elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
            $title = _x( 'Videos', 'post format archive title', 'getbowtied' );
        } elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
            $title = _x( 'Quotes', 'post format archive title', 'getbowtied' );
        } elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
            $title = _x( 'Links', 'post format archive title', 'getbowtied' );
        } elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
            $title = _x( 'Statuses', 'post format archive title', 'getbowtied' );
        } elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
            $title = _x( 'Audio', 'post format archive title', 'getbowtied' );
        } elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
            $title = _x( 'Chats', 'post format archive title', 'getbowtied' );
        }
    } elseif ( is_post_type_archive() ) {
        $title = '<span>' . esc_html__( 'Archives', 'getbowtied' ) . '</span>' . post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $tax = get_taxonomy( get_queried_object()->taxonomy );
        $title = '<span>' . $tax->labels->singular_name . '</span>' . single_term_title( '', false );
    } else {
        $title = esc_html__( 'Archives', 'getbowtied' );
    }

    $title = apply_filters( 'get_the_archive_title', $title );

    if ( ! empty( $title ) ) {
        echo ent2ncr($before . $title . $after);
    }
}
endif;