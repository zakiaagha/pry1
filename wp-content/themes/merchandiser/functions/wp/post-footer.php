<?php

/******************************************************************************/
/* Post Footer ****************************************************************/
/******************************************************************************/

if ( ! function_exists( 'getbowtied_entry_footer' ) ) :
function getbowtied_entry_footer() {
	if ( 'post' == get_post_type() ) {
		$tags_list = get_the_tag_list();
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . '%1$s' . '</span>', $tags_list );
		}
	}
}
endif;