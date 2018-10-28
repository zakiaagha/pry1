<?php

// =============================================================================
// Settings
// =============================================================================

// Paths

$theme_path 			= get_template_directory();
$framework_path 		= $theme_path . '/framework';





// =============================================================================
// Framework Functions
// =============================================================================

require_once( $framework_path 				. '/functions/helpers.php' );
require_once( $framework_path 				. '/functions/ajax-setup.php' );
require_once( $framework_path		 		. '/inc/kirki/kirki.php' );
	add_filter( 'kirki/config', 'getbowtied_kirki_update_url' );
	function getbowtied_kirki_update_url( $config ) {

	    $config['url_path'] = get_template_directory_uri()		 		. '/framework/inc/kirki/';
	    return $config;
	}

// =============================================================================
// Theme Functions
// =============================================================================

// Body Classes
require_once( $theme_path 					. '/functions/body-classes.php' );

// Customiser
require_once( $theme_path 					. '/inc/customiser/customiser-backend.php' );
require_once( $theme_path 					. '/inc/customiser/customiser.php' );

// Theme Setup
require_once( $theme_path 					. '/functions/theme-setup.php' );

// Enqueue Styles & Scripts
require_once( $theme_path 					. '/functions/enqueue-font-awesome.php' );
require_once( $theme_path 					. '/functions/enqueue-default-fonts.php' );
require_once( $theme_path 					. '/functions/enqueue-google-fonts.php' );
require_once( $theme_path 					. '/functions/enqueue-styles.php' );
require_once( $theme_path 					. '/functions/enqueue-scripts.php' );

// WP
require_once( $theme_path 					. '/functions/wp/actions.php' );
require_once( $theme_path 					. '/functions/wp/filters.php' );
require_once( $theme_path 					. '/functions/wp/post-meta.php' );
require_once( $theme_path 					. '/functions/wp/post-footer.php' );
require_once( $theme_path 					. '/functions/wp/post-navigation-single.php' );
require_once( $theme_path 					. '/functions/wp/post-navigation-archive.php' );
require_once( $theme_path 					. '/functions/wp/comments.php' );
require_once( $theme_path 					. '/functions/wp/archive-title.php' );

// WC
require_once( $theme_path 					. '/functions/wc/actions.php' );
require_once( $theme_path 					. '/functions/wc/filters.php' );
require_once( $theme_path 					. '/functions/wc/add-to-cart-fragments.php' );
require_once( $theme_path 					. '/functions/wc/remove-tabs-titles.php' );
require_once( $theme_path 					. '/functions/wc/single-product-share.php' );
require_once( $theme_path 					. '/functions/wc/quick-view.php' );
require_once( $theme_path 					. '/functions/wc/custom-sale-label.php' );

// VC
require_once( $theme_path 					. '/functions/vc/init.php' );
require_once( $theme_path 					. '/functions/vc/filters.php' );
require_once( $theme_path 					. '/functions/vc/remove-frontend-links.php' );

// Shortcodes
require_once( $theme_path 					. '/inc/shortcodes/shortcodes.php' );

// Widgets Areas
require_once( $theme_path 					. '/inc/widgets/widgets-areas.php' );

// Meta Boxes
require_once( $theme_path 					. '/inc/metaboxes/page.php' );
require_once( $theme_path 					. '/inc/metaboxes/post.php' );

// Addons
require_once( $theme_path 					. '/inc/addons/woocommerce-header-category-image.php' );
require_once( $theme_path 					. '/functions/wc/search.php' );



// =============================================================================
// Theme Welcome Page
// =============================================================================

require_once( $theme_path 					. '/inc/tgm/class-tgm-plugin-activation.php' );
require_once( $theme_path 					. '/inc/tgm/plugins.php' );
require_once( $theme_path 					. '/inc/admin/wizard/class-gbt-helpers.php' );
require_once( $theme_path 					. '/inc/admin/wizard/class-gbt-install-wizard.php' );
require_once( $theme_path 					. '/inc/demo/ocdi-setup.php');

function remove_getbowtied_tools() {
	if (class_exists( 'GetBowtied_Tools' )):
    ?>
	    <div class="notice notice-warning is-dismissible">
	        <p>
	        	<?php _e('The <strong>GetBowtied Tools</strong> plugin is no longer required. You can deactivate and delete it. Use the <strong>Envato Market</strong> plugin for future updates.', 'merchandiser');?>
	        	<a href="<?php echo admin_url('themes.php?getbowtied_migrate_tools=1');?>">I'm ready</a> or 
	        	<a href="https://merchandiser.wp-theme.help/hc/en-us/articles/207507239-How-to-update-the-theme-" target="_blank"><?php _e('Read More', 'merchandiser'); ?> →</a></p>
	    </div>
    <?php
	endif;
}
add_action( 'admin_notices', 'remove_getbowtied_tools' );

if (!function_exists('getbowtied_migrate_tools')) {
add_action('admin_init', 'getbowtied_migrate_tools');
function getbowtied_migrate_tools() {
	if (isset($_GET['getbowtied_migrate_tools'])) {
		if (class_exists('GetBowtied_Tools')) {
			deactivate_plugins( 'getbowtied-tools/getbowtied-tools.php' );

			if (!class_exists('Envato_Market') || !class_exists('OCDI_Plugin') || !class_exists('WooCommerce') || !defined('WPB_VC_VERSION')) {
				wp_redirect(admin_url('themes.php?page=tgmpa-install-plugins'));
			} else {
				wp_redirect(admin_url('admin.php?page=envato-market'));
			}
		}
	}
}
}

/**
 * On theme activation redirect to splash page
 */
global $pagenow;

if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {

	wp_redirect(admin_url("themes.php?page=gbt-setup")); // Your admin page URL
	
}


