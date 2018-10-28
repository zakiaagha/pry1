<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.3.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product, $woocommerce;

$attachment_ids = $product->get_gallery_image_ids();
	
if ( $attachment_ids ) {
	
?> 

	<?php if ( has_post_thumbnail() ) { ?>

    <div class="swiper-container product-thumbnails-carousel">
        
        <div class="swiper-wrapper">

    		<?php

            //Featured
            
            $image_title 		= esc_attr( get_the_title( get_post_thumbnail_id() ) );
            $image_link  		= wp_get_attachment_url( get_post_thumbnail_id() );
            $image       		= get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ), array('title' => $image_title) );
            
    		$attachment_count   = count( $product->get_gallery_image_ids() );

            echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<div class="swiper-slide"><div class="thumbnail_wrapper">%s</div></div>', $image ), $post->ID );

            //Thumbs
        
            $attachment_ids = $product->get_gallery_image_ids();
        
            if ( $attachment_ids ) {
            
                foreach ( $attachment_ids as $attachment_id ) {
        
                    $image_link = wp_get_attachment_url( $attachment_id );
        
                    if ( ! $image_link )
                        continue;
        
                    $image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ) );
                    $image_title = esc_attr( get_the_title( $attachment_id ) );
        
                    echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<div class="swiper-slide"><div class="thumbnail_wrapper">%s</div></div>', $image ), $attachment_id, $post->ID );
                }
        
            ?>
            
        </div><!-- /.swiper-wrapper -->

    </div><!-- /.swiper-container -->
    
	<?php
	} //has_post_thumbnail

	} else {	
		echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="Placeholder" />', wc_placeholder_img_src() ), $post->ID );	
	}
	
} //attachment_ids