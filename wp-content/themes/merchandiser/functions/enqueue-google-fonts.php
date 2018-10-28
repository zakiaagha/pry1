<?php

// =============================================================================
// Enqueue Google Fonts
// =============================================================================

if ( ! function_exists('getbowtied_google_fonts') ) :
function getbowtied_google_fonts() {

	global $custom_new_main_font,
		   $custom_new_secondary_font;

	if ( getbowtied_theme_option( 'default_theme_fonts', 'default_fonts' ) == 'google_fonts' ) :

		$main_font_variants 		= getbowtied_theme_option( 'main_font_variants',false);	
		$secondary_font_variants 	= getbowtied_theme_option( 'secondary_font_variants', false);
		$old_mfont					= getbowtied_theme_option('main_font', false);
		$old_sfont					= getbowtied_theme_option('secondary_font', false);


		if (!empty($old_mfont) && is_string($old_mfont)) {
			$temp_mfont= array();
			$temp_mfont['font-family']= $old_mfont;
			if (isset($main_font_variants)) {
				$temp_mfont['variant']= $main_font_variants;
			}

			set_theme_mod('new_main_font', $temp_mfont);
			set_theme_mod('main_font', false);
			$mfont= $temp_mfont;
			$custom_new_main_font= $mfont;
		}

		if (!empty($old_sfont) && is_string($old_sfont)) {
			$temp_sfont= array();
			$temp_sfont['font-family']= $old_sfont;
			if (isset($secondary_font_variants)) {
				$temp_sfont['variant']= $secondary_font_variants;
			}

			set_theme_mod('new_secondary_font', $temp_sfont);
			set_theme_mod('secondary_font', false);
			$sfont= $temp_sfont;
			$custom_new_secondary_font= $sfont;
		}

	endif;
}            
add_action('wp_head', 'getbowtied_google_fonts', 0);
endif;