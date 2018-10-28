<?php

add_filter('woocommerce_single_product_summary_single_sharing', 'getbowtied_single_product_share');
function getbowtied_single_product_share() {
    
    global $post, $product;
        
    $thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false, ''); //Get the Thumbnail URL
    
    ?>

    <div class="single_product_share">

        <span class="share-product-text"><?php esc_html_e('Share this product', 'getbowtied' ); ?></span>
    
        <div class="social_links">
            <a href="//facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="social_media social_media_facebook"><i class="fa fa-facebook"></i></a>
            <a href="//twitter.com/share?url=<?php the_permalink(); ?>" target="_blank" class="social_media social_media_twitter"><i class="fa fa-twitter"></i></a>
            <a href="//pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php echo esc_url($thumbnail_src[0]) ?>&amp;description=<?php echo urlencode(get_the_title()); ?>" target="_blank" class="social_media social_media_pinterest"><i class="fa fa-pinterest"></i></a>
        </div>
       
    </div><!-- .single_product_share -->

    <?php
    
}