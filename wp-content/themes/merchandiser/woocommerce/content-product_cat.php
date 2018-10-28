<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $shop_display_type;

?>

<?php if ( $shop_display_type == "subcategories" ) : ?>

<li <?php wc_product_cat_class( '', $category ); ?>>
	
	<?php //do_action( 'woocommerce_before_subcategory', $category ); ?>

	<?php 

	$small_thumbnail_size  	= apply_filters( 'single_product_small_thumbnail_size', 'full' );
	$dimensions    			= wc_get_image_size( $small_thumbnail_size );
	$thumbnail_id  			= get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true  );

	if ( $thumbnail_id ) {
		$image = wp_get_attachment_image_src( $thumbnail_id, $small_thumbnail_size  );
		$image = $image[0];
	} else {
		$image = wc_placeholder_img_src();
	}

	if ( $image ) {
		// Prevent esc_url from breaking spaces in urls for image embeds
		// Ref: http://core.trac.wordpress.org/ticket/23605
		$image = str_replace( ' ', '%20', $image );
	}

	?>

	<a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>">

		<span class="category_img" style="background-image:url(<?php echo esc_url($image); ?>)"></span>

		<h3>
			<?php
				echo ent2ncr($category->name);

				if ( $category->count > 0 )
					echo apply_filters( 'woocommerce_subcategory_count_html', ' <mark class="count">' . $category->count . '</mark>', $category );
			?>
		</h3>

		<?php do_action( 'woocommerce_after_subcategory_title', $category ); ?>

	</a>

	<?php do_action( 'woocommerce_after_subcategory', $category ); ?>

</li>

<?php else : ?>

	<li <?php wc_product_cat_class(); ?>>
	
		<?php //do_action( 'woocommerce_before_subcategory', $category ); ?>

		<a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>">

			<h3>
				<?php
					echo ent2ncr($category->name);

					if ( $category->count > 0 )
						echo apply_filters( 'woocommerce_subcategory_count_html', ' <mark class="count">(' . $category->count . ')</mark>', $category );
				?>
			</h3>

		</a>

		<?php do_action( 'woocommerce_after_subcategory', $category ); ?>

	</li>

<?php endif; ?>