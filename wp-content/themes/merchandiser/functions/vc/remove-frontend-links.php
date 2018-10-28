<?php

/******************************************************************************/
/* Remove "Edit with Visual Composer" link ************************************/
/******************************************************************************/

if ( GETBOWTIED_VISUAL_COMPOSER_IS_ACTIVE ) {

	function getbowtied_vc_remove_frontend_links() {
	    remove_filter( 'edit_post_link', array(vc_frontend_editor(), 'renderEditButton', 1000) );
	}
	add_action( 'vc_after_init', 'getbowtied_vc_remove_frontend_links' );

}