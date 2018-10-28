<?php

/******************************************************************************/
/* Register Widget Areas ******************************************************/
/******************************************************************************/

if ( ! function_exists('getbowtied_theme_widgets_init') ) :
function getbowtied_theme_widgets_init() {
	
	register_sidebar( array(
		'name'          => esc_html__('Blog Sidebar', 'getbowtied'),
		'id'            => 'blog-widget-area',
		'description'   => '',
		'before_widget' => '<aside class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Shop Sidebar', 'getbowtied' ),
		'id'            => 'catalog-widget-area',
		'description'   => '',
		'before_widget' => '<aside class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Search Widget Area', 'getbowtied' ),
		'id'            => 'search-widget-area',
		'description'   => '',
		'before_widget' => '<li class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area', 'getbowtied' ),
		'id'            => 'footer-widget-area',
		'description'   => '',
		'before_widget' => '<li class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

}
endif;
add_action( 'widgets_init', 'getbowtied_theme_widgets_init' );