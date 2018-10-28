<?php

//==============================================================================
// Add Lightbox to WP Gallery
//==============================================================================

if ( ! function_exists('getbowtied_lightbox_to_gallery') ) :
function getbowtied_lightbox_to_gallery ($content, $id, $size, $permalink, $icon, $text) {
    if ($permalink) {
    	return $content;    
    }
    $content = preg_replace('/<a/', '<a data-lightbox="gallery"', $content, 1);
    return $content;
}
add_filter( 'wp_get_attachment_link', 'getbowtied_lightbox_to_gallery', 10, 6);
endif;


//==============================================================================
// Archives Count Filter
//==============================================================================

if ( ! function_exists('getbowtied_archive_count_filter') ) :
function getbowtied_archive_count_filter($links) {
	$links = str_replace('</a>&nbsp;(', '</a><span class="count">', $links);
	$links = str_replace(')', '</span>', $links);
	return $links;
}
add_filter('get_archives_link', 'getbowtied_archive_count_filter');
endif;

//==============================================================================
// Excerpt Length Filter
//==============================================================================

function custom_excerpt_length( $length ) {
	return 15;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


//==============================================================================
// Excerpt Read More End Filter
//==============================================================================

function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );