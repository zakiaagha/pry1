<?php

// WP
include_once( get_template_directory() . '/inc/shortcodes/wp/banner.php' );
include_once( get_template_directory() . '/inc/shortcodes/wp/slider.php' );
include_once( get_template_directory() . '/inc/shortcodes/wp/socials.php' );
include_once( get_template_directory() . '/inc/shortcodes/wp/title.php' );
include_once( get_template_directory() . '/inc/shortcodes/wp/blog-posts.php' );

// WC
include_once( get_template_directory() . '/inc/shortcodes/wc/recent-products-list.php' );
include_once( get_template_directory() . '/inc/shortcodes/wc/featured-products-list.php' );
include_once( get_template_directory() . '/inc/shortcodes/wc/sale-products-list.php' );
include_once( get_template_directory() . '/inc/shortcodes/wc/best-selling-products-list.php' );
include_once( get_template_directory() . '/inc/shortcodes/wc/top-rated-products-list.php' );
include_once( get_template_directory() . '/inc/shortcodes/wc/product-category-list.php' );
include_once( get_template_directory() . '/inc/shortcodes/wc/products-list.php' );
include_once( get_template_directory() . '/inc/shortcodes/wc/products-by-attribute-list.php' );
include_once( get_template_directory() . '/inc/shortcodes/wc/single-product.php' );
include_once( get_template_directory() . '/inc/shortcodes/wc/product-categories.php' );

// Mixed
include_once( get_template_directory() . '/inc/shortcodes/mixed/recent-products-mixed.php' );
include_once( get_template_directory() . '/inc/shortcodes/mixed/featured-products-mixed.php' );
include_once( get_template_directory() . '/inc/shortcodes/mixed/sale-products-mixed.php' );
include_once( get_template_directory() . '/inc/shortcodes/mixed/best-selling-products-mixed.php' );
include_once( get_template_directory() . '/inc/shortcodes/mixed/top-rated-products-mixed.php' );
include_once( get_template_directory() . '/inc/shortcodes/mixed/product-category-mixed.php' );
include_once( get_template_directory() . '/inc/shortcodes/mixed/products-mixed.php' );
include_once( get_template_directory() . '/inc/shortcodes/mixed/products-by-attribute-mixed.php' );
include_once( get_template_directory() . '/inc/shortcodes/mixed/blog-posts-mixed.php' );

/******************************************************************************/
/* Add Shortcodes to VC *******************************************************/
/******************************************************************************/

if ( GETBOWTIED_VISUAL_COMPOSER_IS_ACTIVE ) {
	
	add_action( 'init', 'getbowtied_visual_composer_shortcodes' );
	function getbowtied_visual_composer_shortcodes() {
		
		// Add new WP shortcodes to VC
		
		include_once( get_template_directory() . '/inc/shortcodes/vc/wp/banner.php' );
		include_once( get_template_directory() . '/inc/shortcodes/vc/wp/blog-posts.php' );
		include_once( get_template_directory() . '/inc/shortcodes/vc/wp/slider.php' );
		include_once( get_template_directory() . '/inc/shortcodes/vc/wp/socials.php' );
		include_once( get_template_directory() . '/inc/shortcodes/vc/wp/title.php' );
		
		// Add new WC shortcodes to VC
		
		if (class_exists('WooCommerce')) {
			
			include_once( get_template_directory() . '/inc/shortcodes/vc/wc/best-selling-products.php' );
			include_once( get_template_directory() . '/inc/shortcodes/vc/wc/featured-products.php' );
			include_once( get_template_directory() . '/inc/shortcodes/vc/wc/product-by-id-sku.php' );
			include_once( get_template_directory() . '/inc/shortcodes/vc/wc/product-categories.php' );
			include_once( get_template_directory() . '/inc/shortcodes/vc/wc/product-categories-grid.php' );
			include_once( get_template_directory() . '/inc/shortcodes/vc/wc/products-by-attribute.php' );
			include_once( get_template_directory() . '/inc/shortcodes/vc/wc/products-by-category.php' );
			include_once( get_template_directory() . '/inc/shortcodes/vc/wc/products-by-ids-skus.php' );
			include_once( get_template_directory() . '/inc/shortcodes/vc/wc/recent-products.php' );
			include_once( get_template_directory() . '/inc/shortcodes/vc/wc/sale-products.php' );
			include_once( get_template_directory() . '/inc/shortcodes/vc/wc/top-rated-products.php' );

		}
	
	}

}