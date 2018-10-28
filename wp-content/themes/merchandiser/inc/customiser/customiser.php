<?php

//remove_theme_mods(); // DEBUG

if (isset($_GET["preset"])) { 
	$preset = $_GET["preset"];
} else {
	$preset = "";
}

if ($preset != "") {
	if ( file_exists( get_template_directory() . '/_presets/'.$preset.'.dat' ) ) {
	//$presets_raw = file_get_contents( get_template_directory() . '/_presets/'.$preset.'.dat' );
	$presets_raw = getbowtied_get_local_file_contents(get_template_directory() . '/_presets/'.$preset.'.dat');
	$presets = @unserialize( $presets_raw );
	}
}

if ( ! function_exists ('getbowtied_theme_option') ) {
function getbowtied_theme_option( $name, $default ) {
	global $presets;
	return ( isset($presets['mods'][$name]) ) ? $presets['mods'][$name] : get_theme_mod( $name, $default );
} //function
} //if

if ( ! function_exists ('getbowtied_theme_custom_styles') ) {
function getbowtied_theme_custom_styles() {	

	global	$custom_header_layout,
			$custom_header_navigation_style,
			$custom_header_navigation_alignment,
			$custom_header_height,
			$custom_mobile_menu_breakpoint,
			$custom_header_background_color,
			$custom_header_font_size,
			$custom_header_font_color,
			
			$custom_header_logo,
			$custom_header_alt_logo,
			$custom_header_logo_height,

		    $custom_header_wishlist,
		    $custom_header_wishlist_icon,
		    $custom_header_search,
		    $custom_header_search_icon,
		    $custom_header_cart,
		    $custom_header_cart_icon,
		    $custom_header_user_account,
		    $custom_header_user_account_icon,

		    $custom_header_sticky,
			
			$custom_header_transparent,
			$custom_header_transparent_scheme,
			$custom_header_transparent_light_color,
			$custom_header_transparent_light_logo,
			$custom_header_transparent_dark_color,
			$custom_header_transparent_dark_logo,
			
			$custom_font_size,
			$custom_primary_color,
			$custom_headings_letter_spacing,
			$custom_default_theme_fonts,
			$custom_default_theme_fonts_variant,
			$custom_main_font,
			$custom_secondary_font,
			$custom_main_font_test,
			$custom_secondary_font_test,
			$custom_new_main_font,
			$custom_new_secondary_font,

			$custom_accent_color,
			$custom_bg_color,

			$custom_blog_layout,
			$custom_blog_pagination,
			$custom_single_post_layout,

			$custom_catalog_mode,
			$custom_shop_layout_style,
			$custom_shop_category_height,
			$custom_shop_sidebar,
			$custom_products_spacing,
			$custom_shop_pagination,
			$custom_shop_product_details,
			$custom_shop_predictive_search,
			$custom_shop_quick_view,
			$custom_shop_second_image,
			$custom_shop_hover_shadow,
			$custom_shop_sale_label,
			$custom_shop_stock_label,
			$custom_shop_category_transparency,

			$custom_product_image_gallery,
			$custom_product_image_zoom,
			$custom_related_products,

			$custom_footer_sticky,
			$custom_back_to_top,
			$custom_footer_background_color,
			$custom_footer_font_color,
			$custom_footer_copyright,

			$custom_facebook_link,
			$custom_twitter_link,
			$custom_pinterest_link,
			$custom_linkedin_link,
			$custom_googleplus_link,
			$custom_rss_link,
			$custom_tumblr_link,
			$custom_instagram_link,
			$custom_youtube_link,
			$custom_vimeo_link,
			$custom_behance_link,
			$custom_dribbble_link,
			$custom_flickr_link,
			$custom_git_link,
			$custom_skype_link,
			$custom_weibo_link,
			$custom_foursquare_link,
			$custom_soundcloud_link,

			$custom_css,
			$custom_header_js,
			$custom_footer_js,

			$custom_header_height_max;

			// Custom Variables

			$custom_header_layout 					= getbowtied_theme_option( 'header_layout', 					'header_2' );
			$custom_header_navigation_style			= getbowtied_theme_option( 'header_navigation_style', 			'slices' );
			$custom_header_navigation_alignment		= getbowtied_theme_option( 'header_navigation_alignment', 		'left' );
			$custom_header_height 					= getbowtied_theme_option( 'header_height', 					'75' );
			$custom_mobile_menu_breakpoint 			= getbowtied_theme_option( 'mobile_menu_breakpoint', 			'1024' );
			$custom_header_background_color 		= getbowtied_theme_option( 'header_background_color', 			'#23282d' );
			$custom_header_font_size 				= getbowtied_theme_option( 'header_font_size', 					'14' );
			$custom_header_font_color 				= getbowtied_theme_option( 'header_font_color', 				'#fff' );
			
			$custom_header_logo                		= getbowtied_theme_option( 'header_logo', 						'' );
			$custom_header_alt_logo                	= getbowtied_theme_option( 'header_alt_logo', 					'' );
			$custom_header_logo_height 				= getbowtied_theme_option( 'header_logo_height', 				'75' );
			$custom_header_alt_logo_height 			= getbowtied_theme_option( 'header_alt_logo_height', 			'55' );
			
			$custom_header_wishlist 				= getbowtied_theme_option( 'header_wishlist', 					1 );
			$custom_header_wishlist_icon 			= getbowtied_theme_option( 'header_wishlist_icon', 				get_template_directory() . '/images/wishlist.svg' );
			$custom_header_search 					= getbowtied_theme_option( 'header_search', 					1 );
			$custom_header_search_icon 				= getbowtied_theme_option( 'header_search_icon', 				get_template_directory() . '/images/search.svg' );
			$custom_header_cart 					= getbowtied_theme_option( 'header_cart', 						1 );
			$custom_header_cart_icon 				= getbowtied_theme_option( 'header_cart_icon', 					get_template_directory() . '/images/cart.svg' );
			$custom_header_user_account 			= getbowtied_theme_option( 'header_user_account', 				1 );
			$custom_header_user_account_icon 		= getbowtied_theme_option( 'header_user_account_icon', 			get_template_directory() . '/images/profile.svg' );

			$custom_header_sticky 					= getbowtied_theme_option( 'header_sticky', 					1 );

			$custom_header_transparent 				= getbowtied_theme_option( 'header_transparent', 				0 );
			$custom_header_transparent_scheme		= getbowtied_theme_option( 'header_transparent_scheme', 		'dark' );
			$custom_header_transparent_light_color	= getbowtied_theme_option( 'header_transparent_light_color', 	'#fff' );
			$custom_header_transparent_light_logo	= getbowtied_theme_option( 'header_transparent_light_logo', 	'' );
			$custom_header_transparent_dark_color	= getbowtied_theme_option( 'header_transparent_dark_color', 	'#000' );
			$custom_header_transparent_dark_logo	= getbowtied_theme_option( 'header_transparent_dark_logo', 		'' );

			$custom_font_size 						= getbowtied_theme_option( 'font_size', 						'18' );
			$custom_primary_color 					= getbowtied_theme_option( 'primary_color', 					'#000' );
			$custom_headings_letter_spacing 		= getbowtied_theme_option( 'headings_letter_spacing', 			'normal' );
			$custom_default_theme_fonts				= getbowtied_theme_option( 'default_theme_fonts', 				'default_fonts' );
			$custom_default_theme_fonts_variant     = getbowtied_theme_option( 'default_fonts_variant', 			'2' );
			$custom_main_font 						= getbowtied_theme_option( 'main_font', 						'Roboto' );
			$custom_secondary_font 					= getbowtied_theme_option( 'secondary_font', 					'Roboto' );
			$custom_main_font_test					= getbowtied_theme_option( 'main_font_test', 					'adahybrid' );
			$custom_secondary_font_test				= getbowtied_theme_option( 'secondary_font_test', 				'adahybrid' );
			$custom_new_main_font 					= getbowtied_theme_option( 'new_main_font', 						array('font-family' => 'Roboto') );
			$custom_new_secondary_font 				= getbowtied_theme_option( 'new_secondary_font', 					array('font-family' => 'Roboto') );


			$custom_accent_color 					= getbowtied_theme_option( 'accent_color', 						'#ffc741' );
			$custom_bg_color 						= getbowtied_theme_option( 'bg_color', 							'#fff' );

			$custom_blog_layout 					= getbowtied_theme_option( 'blog_layout', 						'blog_layout_default' );
			$custom_blog_pagination 				= getbowtied_theme_option( 'blog_pagination', 					'infinite_scroll' );
			$custom_single_post_layout 				= getbowtied_theme_option( 'single_post_layout', 				'single_post_2' );

			$custom_catalog_mode 					= getbowtied_theme_option( 'catalog_mode', 						0 );
			$custom_shop_layout_style 				= getbowtied_theme_option( 'shop_layout_style', 				'regular' );
			$custom_shop_category_height			= getbowtied_theme_option( 'category_height', 					70 );
			$custom_shop_sidebar 					= getbowtied_theme_option( 'shop_sidebar', 						1 );
			$custom_products_spacing				= getbowtied_theme_option( 'products_spacing', 					'0' );
			$custom_shop_pagination 				= getbowtied_theme_option( 'shop_pagination', 					'infinite_scroll' );
			$custom_shop_product_details 			= getbowtied_theme_option( 'shop_product_details', 				1 );
			$custom_shop_predictive_search 			= getbowtied_theme_option( 'shop_predictive_search', 			1 );
			$custom_shop_quick_view 				= getbowtied_theme_option( 'shop_quick_view', 					1 );
			$custom_shop_second_image 				= getbowtied_theme_option( 'shop_second_image', 				1 );
			$custom_shop_hover_shadow 				= getbowtied_theme_option( 'shop_hover_shadow', 				1 );
			$custom_shop_sale_label 				= getbowtied_theme_option( 'custom_sale_label', 				'Sale!' );
			$custom_shop_stock_label 				= getbowtied_theme_option( 'custom_out_of_stock_label', 		'Out of stock' );
			$custom_shop_category_transparency 		= getbowtied_theme_option( 'category_transparency', 			'transparency_light' );

			$custom_product_image_gallery 			= getbowtied_theme_option( 'product_image_gallery', 			'half_page' );
			$custom_product_image_zoom 				= getbowtied_theme_option( 'product_image_zoom', 				1 );
			$custom_related_products 				= getbowtied_theme_option( 'related_products', 					1 );

			$custom_footer_sticky 					= getbowtied_theme_option( 'footer_sticky', 					0 );
			$custom_back_to_top 					= getbowtied_theme_option( 'back_to_top', 						1 );
			$custom_footer_background_color 		= getbowtied_theme_option( 'footer_background_color', 			'#000' );
			$custom_footer_font_color 				= getbowtied_theme_option( 'footer_font_color', 				'#fff' );
			$custom_footer_copyright 				= getbowtied_theme_option( 'footer_copyright', 					'' );

			$custom_facebook_link 					= getbowtied_theme_option( 'facebook_link', 					'http://www.getbowtied.com/' );
			$custom_twitter_link 					= getbowtied_theme_option( 'twitter_link', 						'http://www.getbowtied.com/' );
			$custom_pinterest_link 					= getbowtied_theme_option( 'pinterest_link', 					'' );
			$custom_linkedin_link 					= getbowtied_theme_option( 'linkedin_link', 					'' );
			$custom_googleplus_link 				= getbowtied_theme_option( 'googleplus_link', 					'' );
			$custom_rss_link 						= getbowtied_theme_option( 'rss_link', 							'' );
			$custom_tumblr_link 					= getbowtied_theme_option( 'tumblr_link', 						'' );
			$custom_instagram_link 					= getbowtied_theme_option( 'instagram_link', 					'' );
			$custom_youtube_link 					= getbowtied_theme_option( 'youtube_link', 						'' );
			$custom_vimeo_link 						= getbowtied_theme_option( 'vimeo_link', 						'' );
			$custom_behance_link 					= getbowtied_theme_option( 'behance_link', 						'' );
			$custom_dribbble_link 					= getbowtied_theme_option( 'dribbble_link', 					'' );
			$custom_flickr_link 					= getbowtied_theme_option( 'flickr_link', 						'' );
			$custom_git_link 						= getbowtied_theme_option( 'git_link', 							'' );
			$custom_skype_link 						= getbowtied_theme_option( 'skype_link', 						'' );
			$custom_weibo_link 						= getbowtied_theme_option( 'weibo_link', 						'' );
			$custom_foursquare_link 				= getbowtied_theme_option( 'foursquare_link', 					'' );
			$custom_soundcloud_link 				= getbowtied_theme_option( 'soundcloud_link', 					'' );

			$custom_css 							= getbowtied_theme_option( 'custom_css', 						'' );
			$custom_header_js 						= getbowtied_theme_option( 'header_js', 						'' );
			$custom_footer_js 						= getbowtied_theme_option( 'footer_js', 						'' );

			// Calculated Variables

			$custom_header_logo                		= str_replace(array("http://","https://"), "//", $custom_header_logo);
			$custom_header_alt_logo                	= str_replace(array("http://","https://"), "//", $custom_header_alt_logo);
			$custom_header_height_max 				= max($custom_header_height, $custom_header_logo_height, 3*$custom_header_font_size);
			
			if ($custom_default_theme_fonts == 'default_fonts') {
				if ($custom_default_theme_fonts_variant != 2)
				{
					$custom_new_main_font['font-family'] 		= "embed-poppins";
					$custom_new_secondary_font['font-family'] 	= "embed-ptserif";
				}
				else 
				{
					$custom_new_main_font['font-family']		= "arcamajora";
					$custom_new_secondary_font['font-family']	= "radnika";
				}

			}

	
			ob_start();

	?>
	
	<!-- ******************************************************************** -->
	<!-- * Custom Styles **************************************************** -->
	<!-- ******************************************************************** -->
		
	<style>
		
		/***************************************************************/
		/* Body ********************************************************/
		/***************************************************************/

		html,
		.woocommerce-account .woocommerce table.my_account_orders .woocommerce-orders-table__cell-order-actions .button
		{
			font-size: <?php echo ent2ncr($custom_font_size); ?>px;
			
		}

		body,
		.page-wrapper,
		.woocommerce ul.products li.product .product_thumbnail .shop_product_buttons_wrapper,
		.woocommerce ul.products li.product .shop_product_metas,
		.offcanvas_quickview .product-images-wrapper .fade-gradient,
		.site-header .header-wrapper .tools .myaccount-dropdown ul,
		.offcanvas_quickview,
		#expand_this,
		body.blog:not(.woocommerce) .blog_layout_1 .sticky_post_container .sticky_meta, 
		body.archive:not(.woocommerce) .blog_layout_1 .sticky_post_container .sticky_meta,
		body.blog:not(.woocommerce) .blog_layout_1 .blog_posts .blog_post:nth-child(8n+2):nth-child(even) .post_content_wrapper,
		body.blog:not(.woocommerce) .blog_layout_1 .blog_posts .blog_post:nth-child(4n+3) .post_content_wrapper,
		body.blog:not(.woocommerce) .blog_layout_1 .blog_posts .blog_post:nth-child(4n+4) .post_content_wrapper,
		body.blog:not(.woocommerce) .blog_layout_1 .blog_posts .blog_post:nth-child(8n+5):nth-child(odd) .post_content_wrapper,
		body.archive:not(.woocommerce) .blog_layout_1 .blog_posts .blog_post:nth-child(8n+2):nth-child(odd) .post_content_wrapper, 
		body.archive:not(.woocommerce) .blog_layout_1 .blog_posts .blog_post:nth-child(8n+5):nth-child(odd) .post_content_wrapper, 
		body.blog:not(.woocommerce) .blog_layout_1 .blog_posts .blog_post:nth-child(8n+2):nth-child(odd) .post_content_wrapper,
		body.archive:not(.woocommerce) .blog_layout_1 .blog_posts .blog_post:nth-child(8n+2):nth-child(2n) .post_content_wrapper,
		body.archive:not(.woocommerce) .blog_layout_1 .blog_posts .blog_post:nth-child(4n+3) .post_content_wrapper,
		body.archive:not(.woocommerce) .blog_layout_1 .blog_posts .blog_post:nth-child(4n+4) .post_content_wrapper,
		body.archive:not(.woocommerce) .blog_layout_default .sticky-post .sticky-title, 
		body.blog:not(.woocommerce) .blog_layout_default .sticky-post .sticky-title,
		body.archive:not(.woocommerce) .blog_layout_default ul.blog_posts li header .entry-title, 
		body.blog:not(.woocommerce) .blog_layout_default ul.blog_posts li header .entry-title,
		body.archive:not(.woocommerce) .blog_layout_default ul.blog_posts li header .entry-meta, 
		body.blog:not(.woocommerce) .blog_layout_default ul.blog_posts li header .entry-meta,
		.woocommerce table.variations td.label select option, .woocommerce table.variations td.value select option,
		.woocommerce-account .woocommerce form.edit-account,
		fieldset legend,
		.myaccount-popup,
		.woocommerce-account .woocommerce #customer_login,
		.offcanvas_aside,
		.offcanvas_minicart p.total,
		.search_wrapper .search-widget-area,
		.vc_tta-color-white.vc_tta-style-flat .vc_tta-tab.vc_active>a,
		.categories_layout_default .woocommerce .shortcode_products li.category_item .category_name a,
		.autocomplete-suggestions
		{
			background: <?php echo ent2ncr($custom_bg_color); ?>;
		}


		/***************************************************************/
		/* Header ******************************************************/
		/***************************************************************/

		/* Height */

		.site-header .header-wrapper,
		.myaccount-dropdown
		{
			height: <?php echo ent2ncr($custom_header_height_max . "px"); ?>;
		}

		/*.main-navigation-slices > ul > li > a
		{	
			line-height: <?php echo ent2ncr($custom_header_height_max . "px"); ?>;
		}*/

		.site-content,
		.header-transparent .shop-page-category-description
		{
			padding-top: <?php echo ent2ncr($custom_header_height_max . "px"); ?>;
		}

		body.header-transparent.tax-product_cat .site-content .shop-page-category-description.no-padding
		{
			padding-top: <?php echo ent2ncr($custom_header_height_max . "px"); ?>;
		}

		/* Background Color */

		.site-header,
		.site-header-mobiles
		{
			background-color: <?php echo ent2ncr($custom_header_background_color); ?>;
		}

		/* Header Typography Color */

		<?php

		function header_colors($color_scheme, $color) {

			$header_colors_classes = '

				' . $color_scheme . ' .site-header .site-branding .site-title a,
				' . $color_scheme . ' .site-header .tools a.tools_button,
				' . $color_scheme . ' .site-header .main-navigation-slices > ul > li > a,
				' . $color_scheme . ' .site-header .main-navigation-flyout > ul > li > a,
				' . $color_scheme . ' .site-header .header-wrapper .tools a.tools_button,
				' . $color_scheme . ' .site-header .header-wrapper .tools a.tools_button:hover,
				' . $color_scheme . ' .site-header .site-branding .site-title a,
				' . $color_scheme . ' .site-header-mobiles .site-branding .site-title a,
				' . $color_scheme . ' .site-header-mobiles .tools a.tools_button,
				' . $color_scheme . ' .site-header-mobiles .nav ul li div,
				' . $color_scheme . ' .site-header-mobiles .header-wrapper-mobiles .tools a.tools_button,
				' . $color_scheme . ' .site-header-mobiles .site-branding .site-title a
				{
					color: ' . ent2ncr($color) . ';
				}

				' . $color_scheme . ' .site-header .header-wrapper .tools ul li a.tools_button .tools_button_icon.uploaded_icon svg,
				' . $color_scheme . ' .site-header .header-wrapper .tools ul li span.tools_button .tools_button_icon.uploaded_icon svg,
				' . $color_scheme . ' .site-header-mobiles .header-wrapper-mobiles .tools ul li a.tools_button .tools_button_icon.uploaded_icon svg,
				' . $color_scheme . ' .site-header-mobiles .header-wrapper-mobiles .tools ul li span.tools_button .tools_button_icon.uploaded_icon svg
				{
					fill: ' . ent2ncr($color) . ';
				}

			';

			echo ent2ncr($header_colors_classes);

		}

		header_colors('', $custom_header_font_color);
		header_colors('.header-transparent-light:not(.header-sticky-scroll)', 	$custom_header_transparent_light_color);
		header_colors('.header-transparent-dark:not(.header-sticky-scroll)', 	$custom_header_transparent_dark_color);

		?>

		/* Header Typography Size */

		.site-header,
		.site-header-mobiles
		{
			font-size: <?php echo ent2ncr($custom_header_font_size . "px"); ?>;
		}

		/* Header Logo */

		.site-header .header-wrapper .site-branding .site-logo img
		{
			height: <?php echo ent2ncr($custom_header_logo_height . "px"); ?>;
		}

		.site-header-mobiles .header-wrapper-mobiles .site-branding .site-logo img
		{
			height: <?php echo ent2ncr($custom_header_alt_logo_height . "px"); ?>;
		}
		
		
		/***************************************************************/
		/* Fonts *******************************************************/
		/***************************************************************/
		
		h1, h2, h3, h4, h5, h6,
		button,
		.button,
		input[type="submit"],
		.vc_btn3,
		.shortcode_getbowtied_slider .swiper-slide .button,
		.shortcode_title.secondary_font,
		.site-header,
		.site-header-mobiles,
		.footer-navigation,
		.widget-area,
		#reply-title,
		.woocommerce-cart .woocommerce,
		.woocommerce-checkout .woocommerce,
		.woocommerce-order-received .woocommerce>p:first-child,
		.woocommerce-error,
		.woocommerce-message,
		.woocommerce ul.products li.product .shop_product_price,
		.woocommerce ul.products li.product .product_thumbnail .shop_product_buttons_wrapper .shop_product_buttons .button,
		.woocommerce .shop-product-badges .onsale,
		.woocommerce .shop-product-badges .out_of_stock,
		.offcanvas_quickview .product_infos .product-badges .onsale,
		.offcanvas_quickview .product_infos .product-badges .out_of_stock,
		.woocommerce-account .woocommerce table a,
		.woocommerce-account .woocommerce table .amount,
		.woocommerce-account .woocommerce .addresses a,
		.woocommerce-edit-address .woocommerce,
		.woocommerce-edit-account .woocommerce,
		#customer_login,
		.shop_table thead th span,
		.woocommerce .shop-page-title-wrapper .shop-sort-wrapper,
		.offcanvas_quickview,
		.screen_btn,
		.offcanvas_minicart,
		.offcanvas_minicart a,
		.offcanvas_minicart span,
		.woocommerce .woocommerce-pagination,
		.posts-navigation .nav-links,
		.getbowtied_ajax_load_button,
		.getbowtied_ajax_load_more_loader,
		.getbowtied_blog_ajax_load_button,
		.getbowtied_blog_ajax_load_more_loader,
		.woocommerce-no-products,
		div.search-no-results,
		div.search-no-results p,
		section.error-404 .icon-404,
		section.error-404,
		button.vc_general,
		.vc_tta-panel-heading h4,
		.vc_tta-panel-heading h4 a, 
		.vc_toggle_title h4,
		.vc_tta-tab a,
		.vc_separator h4,
		.myaccount-dropdown,
		.woocommerce .product_infos .product_price .price,
		.woocommerce-breadcrumb,
		.woocommerce .product_content_wrapper .product_infos .after_single_product_summary,
		.woocommerce.add_to_cart_inline,
		.primary_font,
		.woocommerce .product_infos .cart .quantity,
		.woocommerce .woocommerce-tabs ul.tabs li,
		.shop_attributes th,
		.comment_container .meta,
		.comment-form,
		.variations_form,
		.woocommerce .group_table,
		.product-badges,
		.product_price .onsale,
		.out_of_stock,
		.shortcode_products,
		form.track_order,
		.add_to_cart_inline,
		.woocommerce-account .woocommerce .myaccount_user,
		.woocommerce-account .woocommerce .shop_table td.order-status,
		.woocommerce-account .woocommerce form,
		.woocommerce-account .woocommerce .order-info,
		.woocommerce-view-order .woocommerce table.shop_table,
		.woocommerce-order-received .woocommerce table.shop_table th,
		.site-header .site-title a,
		.site-header-mobiles .site-title a,
		form.track_order p.form-row,
		.shop_table td:before,
		ul.list_categories,
		.blog .sticky-title,
		.blog .entry-meta,
		.search article .entry-meta,
		.archive .sticky-title,
		.archive .entry-meta,
		.single .post-categories li a,
		.single .entry-meta,
		.single .entry-footer .tags-links,
		.navigation_between_posts,
		.posts-navigation a,
		#comments .comment-metadata,
		#comments .comment-reply, #comments .comment-edit-link, #comments .comments-number,
		.shortcode_blog_posts_date,
		.comment-list .pingback,
		figcaption,
		ul.mobile-categories,
		.woocommerce .shop-page-header .shop-page-title-wrapper ul.shop-tools > li .shop-result-count p,
		.woocommerce .product_infos .product_ratings .woocommerce-review-link,
		.woocommerce .product_infos .product_sale_badge .onsale,
		.offcanvas_navigation,
		.woocommerce-MyAccount-navigation,
		.woocommerce-account .woocommerce .woocommerce-MyAccount-content p:first-child,
		.woocommerce .product_infos .stock,
		.footer-copyright,
		.woocommerce #yith-wcwl-popup-message #yith-wcwl-message,
		.woocommerce .product_infos .yith-wcwl-add-to-wishlist a,
		.woocommerce #yith-wcwl-form .wishlist_table .product-name,
		.woocommerce #yith-wcwl-form .wishlist_table .product-stock-status .wishlist-in-stock,
		.woocommerce #yith-wcwl-form .wishlist_table .product-stock-status .wishlist-out-of-stock,
		.woocommerce #yith-wcwl-form .wishlist_table .product-price,
		body.blog:not(.woocommerce) .blog_layout_1 .read_more, body.archive:not(.woocommerce) .blog_layout_1 .read_more,
		body.blog:not(.woocommerce) .blog_layout_2 .read_more, body.archive:not(.woocommerce) .blog_layout_2 .read_more,
		body.blog:not(.woocommerce) .blog_layout_2 .sticky_post_container .sticky_meta > a,
		body.archive:not(.woocommerce) .blog_layout_2 .sticky_post_container .sticky_meta > a,
		body.archive:not(.woocommerce) .blog_layout_1 .sticky_post_container .sticky_meta > a,
		body.blog:not(.woocommerce) .blog_layout_1 .post-categories li a, body.archive:not(.woocommerce) .blog_layout_1 .post-categories li a,
		body.blog:not(.woocommerce) .blog_layout_2 .post-categories li a, body.archive:not(.woocommerce) .blog_layout_2 .post-categories li a,
		body.blog:not(.woocommerce) .blog_layout_1 .sticky_post_container .sticky_meta > a, 
		body.archive:not(.woocommerce) .blog_layout_1 .sticky_post_container .sticky_meta > a,
		.hover-me-nice,
		.woocommerce-checkout.woocommerce-order-pay .woocommerce .order_details li,
		.woocommerce-privacy-policy-link,
		.woocommerce-checkout:not(.woocommerce-order-received).woocommerce-order-pay .woocommerce > .woocommerce-info,
		.woocommerce-order-pay:not(.logged-in) .woocommerce label,
		.wp-block-gbt-banner .shortcode_getbowtied_banner_title.primary_font,
		.wp-block-gbt-banner .shortcode_getbowtied_banner_subtitle.primary_font,
		.wp-block-gbt-posts-grid .latest_posts_grid_wrapper .latest_posts_grid_title,
		.wp-block-gbt-slider .slider-content-wrapper .slide-title.primary_font,
		.wp-block-gbt-slider .slider-content-wrapper .slide-description.primary_font,
		.wp-block-button a,
		.wp-block-cover-image .wp-block-cover-image-text
		{
			font-family: 
			<?php echo "'" . $custom_new_main_font['font-family'] . "'," ?>
			sans-serif;
		}


		body,
		.shortcode_title.main_font,
		.woocommerce-order-received .woocommerce table.customer_details,
		.woocommerce-account .woocommerce table.customer_details td,
		.woocommerce-order-received .woocommerce .col2-set,
		.woocommerce-order-received .woocommerce p,
		.woocommerce-account .woocommerce,
		.offcanvas_quickview .product_excerpt,
		.secondary_font,
		.comment_container .description p,
		#review_form textarea,
		.shop_attributes td,
		#tab-description p,
		.woocommerce-variation-description,
		.widget-area .widget.widget_rss div.rssSummary,
		address,
		form.track_order p,
		.checkout-info form.login p:first-child,
		.widget-area .widget.widget_text,
		.woocommerce .checkout .checkout-col-aside .payment_methods .payment_box p,
		.woocommerce #order_review .checkout-col-aside .payment_methods .payment_box p,
		.shortcode_products .category_item .category_name .category_desc,
		.woocommerce #order_review .checkout-col-aside .woocommerce-terms-and-conditions p, .woocommerce .checkout .checkout-col-aside .woocommerce-terms-and-conditions p,
		.woocommerce-account form.lost_reset_password p.form-row .woocommerce-password-hint,
		.woocommerce-account form.lost_reset_password p.form-row .woocommerce-password-strength,
		.woocommerce-checkout .woocommerce .woocommerce-terms-and-conditions-wrapper .woocommerce-privacy-policy-text p,
		.woocommerce-account .woocommerce .woocommerce-MyAccount-content .woocommerce-Payment .payment_box p,
		.wp-block-gbt-banner .shortcode_getbowtied_banner_title.secondary_font,
		.wp-block-gbt-banner .shortcode_getbowtied_banner_subtitle.secondary_font,
		.wp-block-gbt-slider .slider-content-wrapper .slide-title.secondary_font,
		.wp-block-gbt-slider .slider-content-wrapper .slide-description.secondary_font
		{ 
			font-family: 
			<?php echo "'" . $custom_new_secondary_font['font-family'] . "'," ?>
			sans-serif;
		}

		/* Headings Letter Spacing */

		<?php if ( $custom_headings_letter_spacing == 'tide' ) : ?>
			h1,
			h2,
			h3,
			h4,
			h5,
			/*h6,*/
			.tabs > li > a,
			#review_form h3,
			#review_form span,
			.site-header .header-wrapper .site-branding .site-title a,
			.site-header-mobiles .header-wrapper-mobiles .site-branding .site-title a,
			.woocommerce table.customer_details th,
			.woocommerce-edit-account .woocommerce fieldset legend,
			section.error-404 > .page-content > p, section.error-404 > .page-content > p:before,
			.woocommerce .cart-empty,
			section.no-results .search-no-results .sorry-no-results p,
			.woocommerce-no-products p
			{
				letter-spacing: -0.05em;
			}
		<?php endif; ?>
		
		
		/***************************************************************/
		/* Body Text Color  ********************************************/
		/***************************************************************/

		<?php

		$secondary_color_dark	 		= 'rgba('.getbowtied_hex2rgb($custom_primary_color).', 0.6)';
		$secondary_color_medium 		= 'rgba('.getbowtied_hex2rgb($custom_primary_color).', 0.35)';
		$secondary_color_light 			= 'rgba('.getbowtied_hex2rgb($custom_primary_color).', 0.1)';
		$secondary_color_ultra_light 	= 'rgba('.getbowtied_hex2rgb($custom_primary_color).', 0.05)';

		?>
		
		body,
		abbr,
		acronym,
		h1, h2, h3, h4, h5, h6,
		a,
		.widget-area .widget.widget_rss cite,
		.site-footer .footer-wrapper .footer-socials .shortcode_socials ul li a,
		.site-footer .footer-wrapper .footer-navigation ul li a,
		.widget-area h4,
		.woocommerce-cart .woocommerce .cart-collaterals .cart_totals table th,
		.woocommerce-cart .woocommerce form table tbody td.product-name a,
		.woocommerce-cart .woocommerce form table tbody td.actions .button,
		.woocommerce-cart .woocommerce form table tbody td.product-subtotal .remove,
		.blog .entry-title a, .archive .entry-title a,
		.woocommerce .woocommerce-tabs ul.tabs li.active a,
		.woocommerce .products .yith-wcwl-add-to-wishlist a:hover,
		.woocommerce-account .woocommerce td.order-actions .view,
		.woocommerce-order-received .woocommerce ul.order_details li>strong,
		.woocommerce-order-received .woocommerce>p:first-child,
		.woocommerce-order-received .woocommerce table.shop_table tfoot .amount,
		.woocommerce-account .woocommerce #customer_login h2.active,
		.woocommerce .woocommerce-pagination ul.page-numbers a,
		.posts-navigation .nav-links a,
		.woocommerce .product_content_wrapper .product_infos .after_single_product_summary .product_meta_wrapper span span,
		.shop_attributes th,
		.woocommerce .group_table,
		.woocommerce.add_to_cart_inline .amount,
		.woocommerce .woocommerce-shipping-fields h3#ship-to-different-address label,
		.woocommerce table.shop_table.customer_details th,
		.woocommerce table.shop_table tfoot tr:last-child .amount,
		.comments_section label,
		.comments_section a.user, .comments_section a.logout,
		section.error-404 form:after,
		.woocommerce-cart .entry-content .woocommerce form table tbody td.product-name a,
		.woocommerce .cart .quantity input.qty,
		.woocommerce-cart .entry-content .woocommerce form table tbody td.actions .button,
		input[type="text"],
		.woocommerce-cart .entry-content .woocommerce .cart-collaterals .cart_totals,
		.cart_totals label,
		.woocommerce label,
		.woocommerce-info,
		.woocommerce table.shop_table th,
		.woocommerce .checkout .checkout-col-aside table.woocommerce-checkout-review-order-table tfoot tr .amount,
		.woocommerce #order_review .checkout-col-aside table.woocommerce-checkout-review-order-table tfoot tr .amount,
		.woocommerce .checkout .checkout-col-aside table.woocommerce-checkout-review-order-table tfoot tr #shipping_method label,
		.woocommerce #order_review .checkout-col-aside table.woocommerce-checkout-review-order-table tfoot tr #shipping_method label,
		.woocommerce ul.products li.product .shop_product_metas h3 a,
		.woocommerce ul.products li.product .product_thumbnail .shop_product_buttons_wrapper .shop_product_buttons .button,
		.woocommerce .cart .quantity input.qty,
		.widget-area .widget.woocommerce.widget_price_filter .price_slider_amount .button,
		.widget-area .widget.woocommerce.widget_product_categories ul li>a:hover,
		.widget-area .widget.woocommerce.widget_layered_nav ul li>a:hover,
		.widget-area .widget.woocommerce.widget_product_categories ul li>a:hover~span.count, 
		.widget-area .widget.woocommerce.widget_product_categories ul li>a:hover~span.post_count,
		.widget-area .widget.woocommerce.widget_layered_nav ul li>a:hover~span.count, 
		.widget-area .widget.woocommerce.widget_layered_nav ul li>a:hover~span.post_count,
		.widget-area .widget.widget_archive ul li>a:hover,
		.site-header .header-wrapper .tools .myaccount-dropdown ul>li>a,
		select,
		.archive:not(.woocommerce) .blog_layout_1 .blog-header-wrapper h1.blog-header, 
		.blog:not(.woocommerce) .blog_layout_1 .blog-header-wrapper h1.blog-header,
		.archive:not(.woocommerce) .blog_layout_1 .blog-header-wrapper .list_categories li a:hover, 
		.blog:not(.woocommerce) .blog_layout_1 .blog-header-wrapper .list_categories li a:hover,
		.archive:not(.woocommerce) .blog_layout_1 .blog-header-wrapper .list_categories li.current-cat a, 
		.blog:not(.woocommerce) .blog_layout_1 .blog-header-wrapper .list_categories li.current-cat a,
		body.archive:not(.woocommerce) .blog_layout_default h1.blog-header, 
		body.blog:not(.woocommerce) .blog_layout_default h1.blog-header,
		body.archive:not(.woocommerce) .blog_layout_default ul.list_categories li.current-cat a, 
		body.blog:not(.woocommerce) .blog_layout_default ul.list_categories li.current-cat a,
		body.archive:not(.woocommerce) .blog_layout_2 .blog-header-wrapper .list_categories li.current-cat a, 
		body.blog:not(.woocommerce) .blog_layout_2 .blog-header-wrapper .list_categories li.current-cat a,
		body.archive:not(.woocommerce) .blog_layout_2 .read_more, body.blog:not(.woocommerce) .blog_layout_2 .read_more,
		body.archive:not(.woocommerce) .blog_layout_2 .blog-header-wrapper .list_categories li a:hover, 
		body.blog:not(.woocommerce) .blog_layout_2 .blog-header-wrapper .list_categories li a:hover,
		body.archive:not(.woocommerce) .blog_layout_default ul.list_categories li a:hover, 
		body.blog:not(.woocommerce) .blog_layout_default ul.list_categories li a:hover,
		body.archive:not(.woocommerce) .blog_layout_2 .posts-navigation .nav-links .page-numbers, 
		body.blog:not(.woocommerce) .blog_layout_2 .posts-navigation .nav-links .page-numbers,
		body.archive:not(.woocommerce) .blog_layout_1 .posts-navigation .nav-links .page-numbers, 
		body.blog:not(.woocommerce) .blog_layout_1 .posts-navigation .nav-links .page-numbers,
		input[type=color], input[type=date], input[type=datetime], input[type=datetime-local], input[type=email], input[type=month], 
		input[type=number], input[type=password], input[type=tel], input[type=text], input[type=time], input[type=url], 
		input[type=week], textarea,
		.woocommerce-customer-details .woocommerce-column address,
		.woocommerce-customer-details .woocommerce-column .woocommerce-customer-details--phone,
		.woocommerce-customer-details .woocommerce-column .woocommerce-customer-details--email,
		.woocommerce-account .woocommerce #customer_login label[for=rememberme],
		.woocommerce-account .woocommerce .woocommerce-MyAccount-content>p:first-child a,
		.woocommerce-account .woocommerce .addresses address,
		.vc_tta-color-white.vc_tta-style-flat .vc_tta-tab.vc_active>a,
		.woocommerce .product_infos .yith-wcwl-add-to-wishlist a,
		.comments_section ul li article .comment-text .comment-edit-link, 
		.comments_section ul li article .comment-text .comment-reply,
		.woocommerce-checkout:not(.woocommerce-order-received) .select2-container--default .select2-selection--single .select2-selection__rendered,
		.woocommerce-cart .entry-content .woocommerce form table tbody td.product-subtotal .remove,
		.woocommerce-cart .entry-content .woocommerce .cart-collaterals .cart_totals table th,
		.woocommerce-cart .entry-content .woocommerce .cart-collaterals .cross-sells li.product .shop_product_buttons_wrapper .shop_product_buttons a.button:before,
		.categories_layout_default .woocommerce .shortcode_products li.category_item .category_name a,
		.shortcode_title,
		.autocomplete-suggestion .autocomplete-suggestion-info,
		.woocommerce-account .woocommerce table.my_account_orders .woocommerce-orders-table__cell-order-actions .button,
		.woocommerce-checkout.woocommerce-order-pay .order_details li strong
		{
			color: <?php echo ent2ncr($custom_primary_color); ?>;
		}

		button,
		.button,
		input[type="submit"],
		.widget-area .widget.woocommerce.widget_product_tag_cloud a:hover,
		.widget-area .widget.widget_tag_cloud a:hover,
		.woocommerce-cart .woocommerce .cart-collaterals .cart_totals .wc-proceed-to-checkout a:hover,
		.woocommerce .checkout .checkout-col-aside #place_order:hover,
		.woocommerce #order_review .checkout-col-aside #place_order:hover,
		.main-navigation-flyout > ul > li > ul,
		.entry-content .mejs-container .mejs-controls .mejs-time-rail .mejs-time-current,
		.woocommerce .woocommerce-pagination ul.page-numbers a:hover,
		.posts-navigation .nav-links a:hover,
		.woocommerce.add_to_cart_inline a.add_to_cart_button,
		.screen_btn,
		.woocommerce-cart .entry-content .woocommerce .cart-collaterals .cart_totals .wc-proceed-to-checkout a,
		.woocommerce-cart .woocommerce .cart-collaterals .cart_totals .wc-proceed-to-checkout a,
		.woocommerce .checkout .checkout-col-aside #place_order,
		.woocommerce #order_review .checkout-col-aside #place_order,
		.offcanvas_quickview .product-images-wrapper .quickview-pagination .swiper-pagination-bullet-active,
		.widget-area .widget.woocommerce.widget_price_filter .ui-slider .ui-slider-range,
		body.archive:not(.woocommerce) .blog_layout_2 .posts-navigation .nav-links a:hover, 
		body.blog:not(.woocommerce) .blog_layout_2 .posts-navigation .nav-links a:hover,
		body.archive:not(.woocommerce) .blog_layout_1 .posts-navigation .nav-links a:hover, 
		body.blog:not(.woocommerce) .blog_layout_1 .posts-navigation .nav-links a:hover
		{
			background-color: <?php echo ent2ncr($custom_primary_color); ?>;
		}

		.myaccount-popup,
		.search_wrapper
		{
			box-shadow: 0px 10px 80px -25px <?php echo ent2ncr($secondary_color_light); ?>;
		}

		.woocommerce-account .woocommerce #customer_login h2.active
		{
			border-color: <?php echo ent2ncr($custom_primary_color); ?>;
		}

		.offcanvas_quickview .product-images-wrapper .fade-gradient
		{
			background: -moz-linear-gradient(top,  rgba(255,255,255,0) 0%, <?php echo ent2ncr($custom_bg_color); ?> 70%);
			background: -webkit-linear-gradient(top,  rgba(255,255,255,0) 0%, <?php echo ent2ncr($custom_bg_color); ?> 70%);
			background: linear-gradient(to bottom,  rgba(255,255,255,0) 0%, <?php echo ent2ncr($custom_bg_color); ?> 70%);
		}

		body.offcanvas_open .offcanvas_overlay:after
		{
			box-shadow: inset 0px 0px 40px -10px <?php echo ent2ncr($custom_primary_color); ?>;
			opacity: 0.7;
		}

		.site-header .header-wrapper .tools .myaccount-dropdown:hover>ul,
		.autocomplete-suggestions
		{
			box-shadow: 0px 11px 15px 0px <?php echo ent2ncr($secondary_color_light); ?>;
		}

		.woocommerce.archive .shop-sidebar,
		.comments_section,
		input[type=color], input[type=date], input[type=datetime], input[type=datetime-local],
		input[type=email], input[type=month], input[type=number], input[type=password], input[type=search], 
		input[type=tel], input[type=text], input[type=time], input[type=url], input[type=week], textarea,
		.woocommerce-checkout .select2-container--default .select2-selection--single
		{
			background: <?php echo ent2ncr($secondary_color_ultra_light); ?>;
		}

		input[type=color]:focus, input[type=date]:focus, input[type=datetime]:focus, input[type=datetime-local]:focus,
		input[type=email]:focus, input[type=month]:focus, input[type=number]:focus, input[type=password]:focus, input[type=search]:focus, 
		input[type=tel]:focus, input[type=text]:focus, input[type=time]:focus, input[type=url]:focus, input[type=week]:focus, textarea:focus,
		input[type=color]:hover, input[type=date]:hover, input[type=datetime]:hover, input[type=datetime-local]:hover,
		input[type=email]:hover, input[type=month]:hover, input[type=number]:hover, input[type=password]:hover, input[type=search]:hover, 
		input[type=tel]:hover, input[type=text]:hover, input[type=time]:hover, input[type=url]:hover, input[type=week]:hover, textarea:hover
		{
			background: <?php echo ent2ncr($secondary_color_light); ?>;
		}

		.woocommerce .cart .quantity input.qty
		{
			border-bottom: 2px solid <?php echo ent2ncr($custom_primary_color); ?>;
		}

		.woocommerce ul.products li.product .product_thumbnail .shop_product_buttons_wrapper .shop_product_buttons
		{
			border-color: <?php echo ent2ncr($secondary_color_ultra_light); ?>;
		}

		.woocommerce-account .woocommerce table thead tr
		{
			border-bottom: 2px solid <?php echo ent2ncr($secondary_color_ultra_light); ?>;
		}

		.widget-area .widget.woocommerce.widget_price_filter .ui-slider .ui-slider-handle
		{
			border: 3px solid <?php echo ent2ncr($custom_primary_color); ?>;
		}

		.site-header .header-wrapper .tools .myaccount-dropdown ul>li>a
		{
			border-top: 1px solid <?php echo ent2ncr($secondary_color_light); ?>;
		}

		.comments_section ul li
		{
			border-top: 1px solid <?php echo ent2ncr($secondary_color_ultra_light); ?>;
		}

		.comments_section ul.comment-list>li:last-child
		{
			border-bottom: 1px solid <?php echo ent2ncr($secondary_color_ultra_light); ?>;
		}

		.search_wrapper .search-widget-area li.widget
		{
			    border-right: 1px solid <?php echo ent2ncr($secondary_color_light); ?>;
		}

		table tr
		{
			border-bottom: 1px solid <?php echo ent2ncr($secondary_color_ultra_light); ?>;
		}

		.offcanvas_minicart ul.cart_list li,
		.search_wrapper .getbowtied_search_bar .search-field
		{
			border-bottom: 1px solid <?php echo ent2ncr($secondary_color_light); ?>;
		}

		.comments_section .comments-number svg
		{
			fill: <?php echo ent2ncr($custom_primary_color); ?>;
		}

		body.archive:not(.woocommerce) .blog_layout_2 .posts-navigation .nav-links, 
		body.blog:not(.woocommerce) .blog_layout_2 .posts-navigation .nav-links,
		body.archive:not(.woocommerce) .blog_layout_1 .posts-navigation .nav-links, 
		body.blog:not(.woocommerce) .blog_layout_1 .posts-navigation .nav-links,
		body.archive:not(.woocommerce) .blog_layout_default .posts-navigation .nav-links, 
		body.blog:not(.woocommerce) .blog_layout_default .posts-navigation .nav-links
		{
			border-top-color: <?php echo ent2ncr($secondary_color_medium); ?>;
		}

		body.archive:not(.woocommerce) .blog_layout_2 .posts-navigation .nav-links .page-numbers, 
		body.blog:not(.woocommerce) .blog_layout_2 .posts-navigation .nav-links .page-numbers,
		body.archive:not(.woocommerce) .blog_layout_1 .posts-navigation .nav-links .page-numbers, 
		body.blog:not(.woocommerce) .blog_layout_1 .posts-navigation .nav-links .page-numbers,
		body.archive:not(.woocommerce) .blog_layout_default .posts-navigation .nav-links .page-numbers, 
		body.blog:not(.woocommerce) .blog_layout_default .posts-navigation .nav-links .page-numbers
		{
			border-right-color: <?php echo ent2ncr($secondary_color_medium); ?>;
		}

		button,
		.button,
		input[type="submit"],
		button:hover,
		button:focus,
		.button:hover,
		.button:focus,
		button.disabled:hover,
		button.disabled:focus,
		button[disabled]:hover,
		button[disabled]:focus,
		.button.disabled:hover,
		.button.disabled:focus,
		.button[disabled]:hover,
		.button[disabled]:focus,
		input[type="submit"]:hover,
		input[type="submit"]:focus,
		.woocommerce .woocommerce-pagination ul.page-numbers a:hover,
		.posts-navigation .nav-links a:hover,
		.woocommerce-account.woocommerce-downloads .woocommerce-Button,
		.footer-copyright a,
		body.archive:not(.woocommerce) .blog_layout_2 .posts-navigation .nav-links a:hover, 
		body.blog:not(.woocommerce) .blog_layout_2 .posts-navigation .nav-links a:hover,
		body.archive:not(.woocommerce) .blog_layout_1 .posts-navigation .nav-links a:hover, 
		body.blog:not(.woocommerce) .blog_layout_1 .posts-navigation .nav-links a:hover,
		.add_to_cart_inline .add_to_cart_button,
		.add_to_cart_inline .add_to_cart_button:focus, 
		.add_to_cart_inline .add_to_cart_button:hover
		{
			color: <?php echo ent2ncr($custom_bg_color); ?>;
		}


		/***************************************************************/
		/* Body Text Color - Secondary (Dark)  *************************/
		/***************************************************************/

		.woocommerce-cart .woocommerce form table tbody td,
		table.shop_table th,
		table.shop_table tfoot th,
		.checkout-info form.login p:first-child,
		.widget-area .widget.widget_rss div.rssSummary,
		.woocommerce .woocommerce-tabs #reviews #comments .description p,
		.shop_attributes td,
		label,
		.comments_section ul li article .comment-metadata time,
		.woocommerce-cart .entry-content .woocommerce form table tbody td,
		.woocommerce .checkout .checkout-col-aside table.woocommerce-checkout-review-order-table tbody .cart_item .product-total .amount,
		.woocommerce #order_review .checkout-col-aside table.woocommerce-checkout-review-order-table tbody .cart_item .product-total .amount,
		.woocommerce table.shop_table td.product-name .product-quantity,
		.woocommerce .checkout .checkout-col-aside .payment_methods>li .payment_box p,
		.woocommerce #order_review .checkout-col-aside .payment_methods>li .payment_box p,
		.woocommerce.add_to_cart_inline del,
		.woocommerce.add_to_cart_inline del span.amount,
		.woocommerce .product_infos .product_excerpt p,
		.woocommerce .product_infos .product_excerpt,
		body.archive:not(.woocommerce) .blog_layout_default .sticky-post .sticky-title .title a:hover, 
		body.blog:not(.woocommerce) .blog_layout_default .sticky-post .sticky-title .title a:hover,
		body.archive:not(.woocommerce) .blog_layout_2 .read_more, body.blog:not(.woocommerce) .blog_layout_2 .read_more:hover,
		body.archive:not(.woocommerce) .blog_layout_1 .post-categories li a, 
		body.blog:not(.woocommerce) .blog_layout_1 .post-categories li a,
		body.archive:not(.woocommerce) .blog_layout_2 .post-categories li a, 
		body.blog:not(.woocommerce) .blog_layout_2 .post-categories li a,
		body.archive:not(.woocommerce) .blog_layout_3 .post-categories li a, 
		body.blog:not(.woocommerce) .blog_layout_3 .post-categories li a,
		.woocommerce .product_infos .yith-wcwl-add-to-wishlist a:hover,
		.comments_section ul li article .comment-text .comment-edit-link:hover, 
		.comments_section ul li article .comment-text .comment-reply .comment-reply-link:hover,
		.woocommerce #order_review .checkout-col-aside .woocommerce-terms-and-conditions p, .woocommerce .checkout .checkout-col-aside .woocommerce-terms-and-conditions p,
		.wcppec-checkout-buttons__separator,
		.woocommerce-checkout .woocommerce .woocommerce-terms-and-conditions-wrapper .woocommerce-privacy-policy-text p,
		.woocommerce-account .woocommerce .woocommerce-MyAccount-content .woocommerce-Payment .payment_box p
		{
			color: <?php echo ent2ncr($secondary_color_dark); ?>;
		}

		button:hover,
		button:focus,
		.button:hover,
		.button:focus,
		button.disabled:hover,
		button.disabled:focus,
		button[disabled]:hover,
		button[disabled]:focus,
		.button.disabled:hover,
		.button.disabled:focus,
		.button[disabled]:hover,
		.button[disabled]:focus,
		input[type="submit"]:hover,
		input[type="submit"]:focus,
		.screen_btn#view_details_screen
		{
			background-color: <?php echo ent2ncr($secondary_color_dark); ?>;
		}


		/***************************************************************/
		/* Body Text Color - Secondary (Medium)  ***********************/
		/***************************************************************/

		.widget-area .amount, .widget-area .reviewer,
		.widget-area .widget.woocommerce.widget_shopping_cart li .quantity,
		.widget-area .widget.woocommerce.widget_products li del,
		.widget-area .widget.woocommerce.widget_products li ins,
		.woocommerce-cart .woocommerce form table tbody td.product-name a:hover,
		.woocommerce .variation dd p,
		.woocommerce-cart .woocommerce form table tbody td.product-subtotal .remove:hover,
		/*a:hover,
		a:focus,*/
		.woocommerce-account .woocommerce td.order-actions a.button:hover,
		.woocommerce-order-received .woocommerce ul.order_details li,
		.woocommerce-order-received .woocommerce p,
		.woocommerce-order-received .woocommerce table.shop_table .amount,
		.woocommerce-order-received .woocommerce table.shop_table tfoot td,
		.woocommerce-order-received .woocommerce table.customer_details,
		.woocommerce ul.products li.product h3 a:hover,
		.woocommerce ul.products li.product .shop_product_price,
		.woocommerce .price del,
		.woocommerce .shop-product-badges .out_of_stock,
		.offcanvas_quickview .product_infos .product-badges .out_of_stock,
		.woocommerce .star-rating:before,
		.offcanvas_minicart .quantity,
		.offcanvas_minicart .remove,
		.fixed-container .total strong,
		.woocommerce ul.shop_categories_list li a h3 mark,
		.woocommerce ul.shop_categories_list li a h3:hover,
		.woocommerce ul.shop_categories_with_thumb li a h3 mark,
		.woocommerce ul.shop_categories_with_thumb li a h3:hover,
		.woocommerce .woocommerce-pagination ul.page-numbers .current,
		.blog .posts-navigation .nav-links .current,
		.archive .posts-navigation .nav-links .current,
		.search .posts-navigation .nav-links .current,
		.getbowtied_ajax_load_more_loader,
		.getbowtied_ajax_load_button.finished a,
		.getbowtied_blog_ajax_load_more_loader,
		.getbowtied_blog_ajax_load_button.finished a,
		.widget-area .widget h4,
		.widget-area .widget h4 a,
		.widget-area .widget ul>li>span.count,
		.woocommerce .product_content_wrapper .product_infos .after_single_product_summary .product_meta_wrapper span,
		.woocommerce .product_infos .single_product_share_wrapper .share-product-text,
		.woocommerce .product_infos .single_product_share .share-product-text,
		.track_order:before,
		#reviews #comments h2,
		.comment_container time,
		.woocommerce .comment-form-rating p.stars a:after,
		.woocommerce .product-badges .out_of_stock,
		.out_of_stock,
		.shortcode_products .count,
		address,
		.checkout-info form.login label.inline,
		.blog article .entry-meta,
		.search article .entry-meta,
		.blog .list_categories li a,
		.archive article .entry-meta,
		.archive .list_categories li a,
		.single .post-categories li a,
		.single .entry-meta,
		.single .entry-footer .tags-links a,
		.comment-notes, .comment-notes a,
		.logged-in-as, .logged-in-as a,
		.comment-list .pingback,
		figcaption, figcaption a,
		.woocommerce-account .woocommerce #customer_login h2,
		.woocommerce .woocommerce-tabs ul.tabs li a sup,
		.woocommerce .product_infos .stock.out-of-stock,
		.blog_layout_default .sticky-post .sticky-title span.date,
		.shortcode_products .category_item .category_name .category_desc,
		.widget-area .widget.woocommerce.widget_product_categories ul li>a:before,
		.widget-area .widget.woocommerce.widget_layered_nav ul li>a:before,
		body.archive:not(.woocommerce) .blog_layout_1 .entry-title a:hover, 
		body.blog:not(.woocommerce) .blog_layout_1 .entry-title a:hover,
		body.archive:not(.woocommerce) .blog_layout_2 .entry-title a:hover, 
		body.blog:not(.woocommerce) .blog_layout_2 .entry-title a:hover,
		body.archive:not(.woocommerce) .blog_layout_1 .read_more:hover, 
		body.blog:not(.woocommerce) .blog_layout_1 .read_more:hover,
		.widget-area .widget.widget_archive ul li>a:before,
		body.archive:not(.woocommerce) .blog_layout_2 .posts-navigation .nav-links .current, 
		body.blog:not(.woocommerce) .blog_layout_2 .posts-navigation .nav-links .current,
		body.archive:not(.woocommerce) .blog_layout_1 .posts-navigation .nav-links .current, 
		body.blog:not(.woocommerce) .blog_layout_1 .posts-navigation .nav-links .current,
		.offcanvas_aside .offcanvas_close p,
		.offcanvas_aside .offcanvas_close i,
		.woocommerce table.shop_table .wc-item-meta li p,
		.woocommerce-checkout.woocommerce-order-pay .order_details li
		{
			color: <?php echo ent2ncr($secondary_color_medium); ?>;
		}

		.woocommerce .variation dd,
		.woocommerce .shop-product-badges .out_of_stock,
		.offcanvas_quickview .product_infos .product-badges .out_of_stock,
		.woocommerce .product-badges .out_of_stock,
		.out_of_stock,
		.woocommerce-account .woocommerce #customer_login h2,
		.single .entry-footer .tags-links a,
		.woocommerce .product_infos .stock.out-of-stock
		{
			border-color: <?php echo ent2ncr($secondary_color_medium); ?>;
		}

		button.disabled,
		button[disabled],
		.button.disabled,
		.button[disabled],
		{
			background-color: <?php echo ent2ncr($secondary_color_medium); ?>;
		}


		/***************************************************************/
		/* Body Text Color - Secondary (Light)  ************************/
		/***************************************************************/

		.woocommerce-cart .woocommerce form table tbody td.actions .button,
		.woocommerce-order-received .woocommerce header h2,
		.woocommerce .woocommerce-pagination ul.page-numbers,
		.woocommerce .woocommerce-pagination ul.page-numbers a,
		.woocommerce .woocommerce-pagination ul.page-numbers .current,
		.widget-area .widget,
		.offcanvas_close,
		.woocommerce .cart .quantity input.qty,
		.woocommerce .product_content_wrapper .product_infos .after_single_product_summary,
		/*h6 a:hover,*/
		.woocommerce-cart .entry-content .woocommerce form table tbody td.actions .button
		{
			border-color: <?php echo ent2ncr($secondary_color_light); ?>;
		}

		section.error-404 > .page-content > p:before,
		.woocommerce .empty-cart:before,
		section.no-results .sorry-no-results:before,
		.woocommerce-no-products:before
		{
			color: <?php echo ent2ncr($secondary_color_light); ?>;
		}

		.select2-container .select2-choice,
		select:hover
		{
			background-color: <?php echo ent2ncr($secondary_color_light); ?>;
		}


		/***************************************************************/
		/* Body Text Color - Secondary (Ultra Light)  ******************/
		/***************************************************************/

		.woocommerce .checkout .checkout-col-aside,
		.woocommerce #order_review .checkout-col-aside,
		.woocommerce-cart .woocommerce .cart-collaterals,
		.woocommerce .woocommerce_tabs_wrapper,
		.woocommerce-cart .entry-content .woocommerce .cart-collaterals,
		select
		{
			background-color: <?php echo ent2ncr($secondary_color_ultra_light); ?>;
		}

		.woocommerce-cart .entry-content .woocommerce .cart-collaterals .cross-sells li.product .shop_product_metas
		{
			background-color: <?php echo 'rgba('.getbowtied_hex2rgb($custom_bg_color).', 0.05)'; ?>;
		}

		.widget-area .widget.woocommerce.widget_product_tag_cloud a:hover,
		.widget-area .widget.widget_tag_cloud a:hover,
		.woocommerce-checkout-review-order-table tr,
		.woocommerce .checkout .checkout-col-aside .payment_methods > li,
		.woocommerce #order_review .checkout-col-aside .payment_methods > li,
		.cart-collaterals tr,
		.woocommerce-account .woocommerce .woocommerce-MyAccount-content .woocommerce-Payment .payment_methods .woocommerce-PaymentMethod
		{
			border-color: <?php echo ent2ncr($secondary_color_ultra_light); ?>;
		}



		/***************************************************************/
		/* Accent color ************************************************/
		/***************************************************************/
		
		body header h1.page-title,
		h1.shop-page-title.entry-title.page-title,
		h1.blog-header,
		.woocommerce ul.products li.product .shop_archive_wishlist .yith-wcwl-add-to-wishlist a,
		body.blog:not(.woocommerce) .blog_layout_1 .blog_posts .blog_post article.sticky .bg-image-wrapper::before,
		body.blog:not(.woocommerce) .blog_layout_2 .blog_posts .blog_post article.sticky .bg-image-wrapper::before,
		body.archive:not(.woocommerce) .blog_layout_1 .blog_posts .blog_post article.sticky .bg-image-wrapper::before,
		body.archive:not(.woocommerce) .blog_layout_2 .blog_posts .blog_post article.sticky .bg-image-wrapper::before
	
		{
			background-color: <?php echo ent2ncr($custom_accent_color); ?>;
		}

		.woocommerce-account .woocommerce .myaccount_user strong, 
		.woocommerce-account .woocommerce .myaccount_user a,
		.woocommerce-account .woocommerce .shop_table td.order-number a,
		.woocommerce-account .woocommerce .shop_table td.order-actions a,
		.woocommerce-account .woocommerce .addresses header.title a.edit,
		a.shipping-calculator-button,
		.woocommerce-info a,
		.wc_payment_method a,
		.shipping-calculator-button,
		.woocommerce-account .woocommerce .woocommerce-MyAccount-content > p:last-child a,
		.woocommerce .product_infos .yith-wcwl-add-to-wishlist .yith-wcwl-add-button:before,
		.woocommerce .product_infos .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse:before,
		.woocommerce .product_infos .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse:before
		{
			color: <?php echo ent2ncr($custom_accent_color); ?>;
		}

		.about_paypal,
		.payment_box a
		{
			color: <?php echo ent2ncr($custom_primary_color); ?> !important;
		}

		.woocommerce-account .woocommerce .myaccount_user,
		.woocommerce-account .woocommerce .order-info,
		.wc_payment_method a,
		.shipping-calculator-button,
		.woocommerce-account .woocommerce .woocommerce-MyAccount-content > p:first-child
		{
			border-bottom: 2px solid <?php echo ent2ncr($custom_accent_color); ?>;
		}

		.woocommerce-terms-and-conditions-link,
		.woocommerce-privacy-policy-link,
		.about_paypal,
		.payment_box a
		{
			border-bottom: 2px solid <?php echo ent2ncr($custom_primary_color); ?> !important;
		}

		
		/***************************************************************/
		/* Footer ******************************************************/
		/***************************************************************/

		/* Footer Background Color */

		.site-footer,
		.footer-widget-wrapper {
			background-color: <?php echo ent2ncr($custom_footer_background_color); ?>;
		}

		/* Footer Typography Color */

		.site-footer,
		.site-footer .footer-wrapper .footer-socials .shortcode_socials ul li a,
		.site-footer .footer-wrapper .footer-navigation ul li a,
		.footer-widget-wrapper ul.footer-widget-area *
		{
			color: <?php echo ent2ncr($custom_footer_font_color); ?>;
		}

		.footer-widget-wrapper ul.footer-widget-area li > a:before,
		.footer-widget-wrapper ul.footer-widget-area li a:hover,
		.footer-widget-wrapper ul.footer-widget-area li span.count
		{
			color: <?php echo 'rgba('.getbowtied_hex2rgb($custom_footer_font_color).', 0.35)'; ?> !important;
		}

		<?php if ( 1 == $custom_footer_sticky ) : ?>
			@media only screen and (min-width: 64em) {
				.woocommerce-message,
				.woocommerce-error
				{
					bottom: 37px;
				}
			}
		<?php endif; ?>

		@media screen and (min-width: 64em) {

			.woocommerce .product_infos .yith-wcwl-add-to-wishlist .yith-wcwl-add-button:before,
			.woocommerce .product_infos .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse:before,
			.woocommerce .product_infos .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse:before
			{
				background-color: <?php echo ent2ncr($custom_accent_color); ?> !important;
				color: #fff;
			}
		}
		/***************************************************************/
		/* Mobile menu breakpoint **************************************/
		/***************************************************************/

		<?php if ( (isset($custom_mobile_menu_breakpoint)) && ($custom_mobile_menu_breakpoint != "") ) : ?>
				@media only screen and (min-width: 64em) and (max-width: <?php echo $custom_mobile_menu_breakpoint; ?>px) {

					.woocommerce .product_infos .yith-wcwl-add-to-wishlist .yith-wcwl-add-button:before,
					.woocommerce .product_infos .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse:before,
					.woocommerce .product_infos .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse:before
					{
						background-color: <?php echo ent2ncr($custom_accent_color); ?> !important;
					}


					.site-header-mobiles
					{
						display: block !important;
					}

					.site-header .header-wrapper
					{
						display: none !important;
					}

					.site-content
					{
						padding-top: 55px !important;
					}

					body.offcanvas_left .site-header-mobiles {
					    -webkit-transform: translate3d(400px, 0, 0);
					    transform: translate3d(400px, 0, 0);
					}

					body.offcanvas_right .site-header-mobiles {
					    -webkit-transform: translate3d(-400px, 0, 0);
					    transform: translate3d(-400px, 0, 0);
					}

					.site-header-mobiles
					{
						background-color: <?php echo ent2ncr($custom_header_background_color); ?> !important;
					}

					.site-header-mobiles .tools_button_icon,
					.site-header-mobiles .tools_button_text,
					.site-header-mobiles .tools_button
					{
						color: <?php echo $custom_header_font_color; ?> !important;
					}

					.tools_button_icon.uploaded_icon svg
					{
						fill: <?php echo $custom_header_font_color; ?> !important;
					}
				}
		<?php endif; ?>

		/***************************************************************/
		/* Custom product spacing **************************************/
		/***************************************************************/

		<?php if ( (isset($custom_products_spacing)) && ($custom_products_spacing != "") ) : ?> 
			.woocommerce ul.products li.product
			{
				padding: <?php echo $custom_products_spacing; ?>px;
			}
		<?php endif; ?>

		/***************************************************************/
		/* Custom product hover ****************************************/
		/***************************************************************/

		<?php if ( (isset($custom_shop_hover_shadow)) && ($custom_shop_hover_shadow != true) ) : ?> 
			.woocommerce ul.products li.product:hover::after
			{
				display: none;
			}
		<?php endif; ?>

		/***************************************************************/
		/* Custom product hover ****************************************/
		/***************************************************************/

		<?php if ( !$custom_shop_quick_view ) : ?>
			.getbowtied_product_quick_view_button
			{
				display: none !important;
			}
		<?php endif; ?> 

		/********************************************************************/
		/* Custom CSS *******************************************************/
		/********************************************************************/
		
		<?php echo ent2ncr($custom_css); ?>
	
	</style>

    <!-- ******************************************************************** -->
	<!-- * Custom Header JavaScript Code ************************************ -->
	<!-- ******************************************************************** -->
    
    <?php if ( (isset($custom_header_js)) && ($custom_header_js != "") ) : ?>
        <?php echo $custom_header_js; ?>
    <?php endif; ?>

<?php
$content = ob_get_clean();
$content = str_replace(array("\r\n", "\r"), "\n", $content);
$lines = explode("\n", $content);
$new_lines = array();
foreach ($lines as $i => $line) { if(!empty($line)) $new_lines[] = trim($line); }
echo implode($new_lines);
} //function
} //if
add_action( 'wp_head', 'getbowtied_theme_custom_styles', 99 );