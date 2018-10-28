<?php

if ( GETBOWTIED_VISUAL_COMPOSER_IS_ACTIVE ) {

	//==============================================================================
	// VC Widget Area
	//==============================================================================

	if ( ! function_exists('getbowtied_vc_widget_area_class') ) :
	function getbowtied_vc_widget_area_class( $class_string, $tag ) {
		if ( $tag == 'vc_widget_sidebar' ) {
			$class_string = str_replace( 'wpb_widgetised_column', 'wpb_widgetised_column widget-area', $class_string );
		}
		return $class_string;
	}
	add_filter( 'vc_shortcodes_css_class', 'getbowtied_vc_widget_area_class', 10, 2 );
	endif;

}