<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $custom_shop_predictive_search;

if (isset($custom_shop_predictive_search) && ($custom_shop_predictive_search == 1)) {

  wp_enqueue_script('getbowtied_wcas_frontend' ); ?>

<div class="getbowtied-ajaxsearchform-container">
    <form class="woocommerce-product-search getbowtied-ajaxsearchform" role="search" method="get" action="<?php echo esc_url( home_url( '/'  ) ) ?>">
        <div>
            <label class="screen-reader-text" for="getbowtied-s"><?php esc_html_e( 'Search for:', 'woocommerce' ); ?></label>

            <input type="search"
                   value="<?php echo get_search_query(); ?>"
                   name="s"
                   class="search-field getbowtied-s"
                   placeholder="<?php echo esc_html_e( 'Search products&hellip;', 'woocommerce' ); ?>"
                   data-loader-icon="<?php echo str_replace( '"', '', apply_filters('getbowtied_wcas_ajax_search_icon', '') ); ?>"
                   data-min-chars="3"
                   title="<?php echo esc_html_e( 'Search for:', 'woocommerce' ); ?>" />

            <input type="submit" class="getbowtied-searchsubmit" value="<?php echo esc_html_e( 'Search', 'woocommerce' );  ?>" />
            <input type="hidden" name="post_type" value="product" />
        </div>
    </form>
</div>

<?php } else {  ?>

<form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
    <label class="screen-reader-text"><?php esc_html_e( 'Search for:', 'woocommerce' ); ?></label>
    <input type="search" class="search-field" placeholder="<?php echo esc_html_e( 'Search products&hellip;', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_html_e( 'Search for:', 'woocommerce' ); ?>" />
    <input type="submit" value="<?php echo esc_html_e( 'Search', 'woocommerce' ); ?>" />
    <input type="hidden" name="post_type" value="product" />
</form>

<?php } ?>
