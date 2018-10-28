<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

while ( have_posts() ) : the_post();

	global $product;

	$custom_shop_stock_label 				= getbowtied_theme_option( 'custom_out_of_stock_label', 		'Out of stock' );

    add_action( 'woocommerce_before_single_product_summary_sale_flash', 'woocommerce_show_product_sale_flash', 10 );
    add_action( 'woocommerce_before_single_product_summary_product_images', 'woocommerce_show_product_images', 20 );

    add_action( 'woocommerce_single_product_summary_single_title', 'woocommerce_template_single_title', 5 );
    add_action( 'woocommerce_single_product_summary_single_rating', 'woocommerce_template_single_rating', 10 );
    add_action( 'woocommerce_single_product_summary_single_price', 'woocommerce_template_single_price', 10 );
    add_action( 'woocommerce_single_product_summary_single_excerpt', 'woocommerce_template_single_excerpt', 20 );
    add_action( 'woocommerce_single_product_summary_single_add_to_cart', 'woocommerce_template_single_add_to_cart', 30 );
    add_action( 'woocommerce_single_product_summary_single_meta', 'woocommerce_template_single_meta', 40 );
    add_action( 'woocommerce_single_product_summary_single_sharing', 'woocommerce_template_single_sharing', 50 );

    add_action( 'woocommerce_product_summary_thumbnails', 'woocommerce_show_product_thumbnails', 20 );

    function add_product_class($classes) {
	    $classes[] = "product";
	    return $classes;
	}

	if( !function_exists('wc_product_class') ) {
		add_filter('post_class', 'add_product_class');
	}

	?>

	<div id="product-<?php the_ID(); ?>" <?php function_exists('wc_product_class') ? wc_product_class() : post_class(); ?>>

	    <div class="product_content_wrapper">

	        <div class="row">

	            <div class="large-12 columns">
	                
	                <div class="product-images-wrapper">                  
	                    
	                    <?php do_action( 'woocommerce_before_single_product_summary_product_images' ); ?>

	                    <div class="quickview-pagination"></div>
	                    <div class="fade-gradient"></div>
	                    
	                </div>
               
	            </div><!-- .columns -->

	            <div class="large-12 columns">

	                <div class="product_infos">

	                    <?php
	                    do_action( 'woocommerce_single_product_summary_single_rating' );
	                    do_action( 'woocommerce_single_product_summary_single_title' );                        
	                    ?>

	                    <div class="product-badges">
                            <?php do_action( 'woocommerce_before_single_product_summary_sale_flash' ); ?>

                            <?php if ( !$product->is_in_stock() && !empty($custom_shop_stock_label) ) : ?>            
                                <div class="out_of_stock"><?php esc_html_e( $custom_shop_stock_label, 'getbowtied' ); ?></div>            
                            <?php endif; ?>                       

		                    <div class="product_price">
		                        <?php do_action( 'woocommerce_single_product_summary_single_price' ); ?>
		                    </div>
	                    </div>

	                    <div class="product_excerpt">
                        	<?php do_action( 'woocommerce_single_product_summary_single_excerpt' ); ?>
                  		</div>

	                    <?php
	                    do_action( 'woocommerce_single_product_summary_single_meta' );
	                    do_action( 'woocommerce_single_product_summary_single_sharing' );
	                    ?>

	                	<div class="buttons">
		                	<?php do_action( 'woocommerce_single_product_summary_single_add_to_cart' ); ?>
		            		<a class="view-product button" href="<?php the_permalink(); ?>"><?php esc_html_e( 'View product', 'woocommerce') ?></a>
	            		</div>

	                </div>


	            </div><!-- .columns -->

	        </div><!-- .row -->
	        
	    </div><!-- .product_content_wrapper -->

	</div><!-- #product-<?php the_ID(); ?> -->	

<?php endwhile; // end of the loop.