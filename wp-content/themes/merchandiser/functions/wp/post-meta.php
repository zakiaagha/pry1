<?php

/******************************************************************************/
/* Post Meta ******************************************************************/
/******************************************************************************/

if ( ! function_exists( 'getbowtied_posted_on' ) ) :
function getbowtied_posted_on() {
	
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$byline = sprintf(
		_x( 'by %s', 'post author', 'getbowtied' ),
		'<span class="author"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	$posted_on = sprintf(
		_x( 'on %s', 'post date', 'getbowtied' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	echo '<span class="byline"> ' . $byline . '</span>&nbsp;&nbsp;<span class="posted-on">' . $posted_on . '</span>';

	$categories_list = get_the_category_list( esc_html__( ', ', 'getbowtied' ) );
	if ( $categories_list ) {
		printf( '&nbsp;&nbsp;<span class="cat-links">' . esc_html__( 'in %1$s', 'getbowtied' ) . '</span>', $categories_list );
	}

	if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'getbowtied' ), esc_html__( 'One Comment', 'getbowtied' ), esc_html__( '% Comments', 'getbowtied' ) );
		echo '</span>';
	}

}
endif;