<?php

if ( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) {

	if ( ! defined( 'GETBOWTIED_WCAS' ) ) {
	    define( 'GETBOWTIED_WCAS', true );
	}

	if ( !class_exists( 'GETBOWTIED_WCAS' ) ) {

	    class GETBOWTIED_WCAS {

	        public function __construct() {

	            // actions
	            add_action( 'wp_ajax_getbowtied_ajax_search_products', array( $this, 'ajax_search_products' ) );
	            add_action( 'wp_ajax_nopriv_getbowtied_ajax_search_products', array( $this, 'ajax_search_products' ) );
	            add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles_scripts' ) );
	        }

	        public function enqueue_styles_scripts() {
	            wp_register_script('getbowtied_wcas_frontend', get_template_directory_uri() . '/js/search/frontend.js', array('jquery'), '1.0', true);

	            wp_localize_script( 'getbowtied_wcas_frontend', 'getbowtied_wcas_params', array(
	            	'loading' => get_template_directory_uri().'/images/loaders/puff.svg',
	                'ajax_url' => admin_url( 'admin-ajax.php' )

	            ));

	            wp_enqueue_script('getbowtied_wcas_jquery-autocomplete' );
	        }

	        public function getmicrotime(){
	            list($usec, $sec) = explode(" ",microtime());
	            return ((float)$usec + (float)$sec);
	        }

	        /**
	         * Perform ajax search products
	         */
	        public function ajax_search_products() {
	            global $woocommerce;
		        $time_start         = $this->getmicrotime();
		        $transient_enabled  = 'no';
		        $transient_duration = 12;

	            $search_keyword =  $_REQUEST['query'];

	            $ordering_args = $woocommerce->query->get_catalog_ordering_args( 'title', 'asc' );
	            $suggestions   = array();

		        $transient_name = 'ywcas_' . $search_keyword;
		        if ( $transient_enabled == 'no' || false === ( $suggestions = get_transient( $transient_name ) ) ) {
			        $args = array(
				        's'                   => apply_filters( 'getbowtied_wcas_ajax_search_products_search_query', $search_keyword ),
				        'post_type'           => 'product',
				        'post_status'         => 'publish',
				        'ignore_sticky_posts' => 1,
				        'orderby'             => '',
				        'order'               => '',
				        'posts_per_page'      => 6,
				        'suppress_filters'    => false,
				        'tax_query' => array(
		                      array(
		                            'taxonomy' => 'product_visibility',
		                            'field'    => 'name',
		                            'terms'    => 'exclude-from-catalog',
		                            'operator' => 'NOT IN',

		                      )
		                  ) 
			        );


			        if( 'yes' === get_option( 'woocommerce_hide_out_of_stock_items' ) ) {

			        	$args['meta_query'] = array(
							        array(
								        'key'     => '_stock_status',
								        'value'   => array( 'search', 'instock' ),
								        'compare' => 'IN'
							        )
				        );
			        }

			        if ( isset( $_REQUEST['product_cat'] ) ) {
				        $args['tax_query'] = array(
					        'relation' => 'AND',
					        array(
						        'taxonomy' => 'product_cat',
						        'field'    => 'slug',
						        'terms'    => $_REQUEST['product_cat']
					        )
				        );
			        }

			        $products = get_posts( $args );

			        if ( ! empty( $products ) ) {
				        foreach ( $products as $post ) {

						    $product = wc_get_product( $post );

						    if( strpos( strtolower($product->get_title()), strtolower($search_keyword) ) !== false ) {

						        $suggestions[] = apply_filters( 'yith_wcas_suggestion', array(
							        'id'     => '',
							        'value'  => strip_tags( $product->get_title() ),
							        'url'    => $product->get_permalink(),
							        'image'  => $product->get_image( array(130, 130) ),
							        'price'  => $product->get_price_html(),
						        ), $product );
						    }
				        }
			        } else {
				        $suggestions[] = array(
					        'id'     => 'no-suggestion',
					        'value'  => esc_html__( 'No products found', 'woocommerce' ),
					        'url'    => '',
					        'image'  => '',
					        'price'  => '',
				        );
			        }
			        wp_reset_postdata();

			        if ( $transient_enabled == 'yes' ) {
				        set_transient( $transient_name, $suggestions, $transient_duration * HOUR_IN_SECONDS );
			        }
		        }

			    $time_end = $this->getmicrotime();
			    $time = $time_end - $time_start;
	            $suggestions = array(
	                'suggestions' => $suggestions,
	                'time'        => $time
	            );
	            echo json_encode( $suggestions );
	            die();

	        }


	    }
	}

	global 	$getbowtied_wcas;

	$getbowtied_wcas = new GETBOWTIED_WCAS();
}
