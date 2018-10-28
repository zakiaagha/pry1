<?php

// =============================================================================
// Ajax url
// =============================================================================

if ( ! function_exists('getbowtied_ajax_url_fn') ) :
function getbowtied_ajax_url_fn() {

	$ajax_url = admin_url("admin-ajax.php");
	if ( class_exists('SitePress') ) {
		$my_current_lang = apply_filters( 'wpml_current_language', NULL );
		if ( $my_current_lang ) {
		    $ajax_url = add_query_arg( 'wpml_lang', $my_current_lang, $ajax_url );
	}}

?>
    <script type="text/javascript">
        var getbowtied_ajax_url = '<?php echo $ajax_url; ?>';
    </script>
<?php
}
add_action( 'wp_head','getbowtied_ajax_url_fn' );
endif;