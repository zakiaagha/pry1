<?php 
	global  $custom_header_wishlist,
            $custom_header_wishlist_icon,
            $custom_header_wishlist_icon,
            $custom_header_user_account,
            $yith_wcwl;
?>
<div class="offcanvas_left_close offcanvas_close"><i class="fa fa-times"></i></div>
<nav class="offcanvas_navigation">
	<ul class="offcanvas_menu">

		<?php 
		    wp_nav_menu(array(
		        'theme_location'  => 'primary',
		        'fallback_cb'     => false,
		        'container'       => false,
		        'items_wrap'      => '%3$s',
		    ));
		?>

		<!-- Wishlist Button -->
        <?php if ( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) : ?>
        <?php if ( GETBOWTIED_WISHLIST_IS_ACTIVE ) : ?>
        <?php if ( $custom_header_wishlist == '1' ) : ?>
        
            <li class="wishlist-button has-border">
                <a class="tools_button" href="<?php echo esc_url($yith_wcwl->get_wishlist_url()); ?>">
                    
                    <?php esc_html_e('Wishlist', 'getbowtied'); ?>

                </a>
            </li>

        <?php endif; ?>
        <?php endif; ?>
        <?php endif; ?>
		

		<?php if ( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) : ?>
			
			<?php if ( $custom_header_user_account == '1' ) : ?>

				<li class="has-border">
					<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><?php esc_html_e('My account', 'woocommerce'); ?></a>
				</li>

				<?php if ( is_user_logged_in() ) : ?>
				
				<li>
					 <a href="<?php echo wp_logout_url( home_url() ); ?>"><?php esc_html_e('Logout', 'woocommerce'); ?></a>
				</li>

				<?php endif; ?>

			<?php endif; ?>

		<?php endif; ?>
		
	</ul>
</nav>

<div class="offcanvas_sidebars">
<?php 
	// Is this a blog page?
	if (( (is_front_page() && is_home() ) || (is_home()) || (is_single()) || (is_archive()) || (is_sticky()) || (is_search())) && (GETBOWTIED_WOOCOMMERCE_IS_ACTIVE && !is_woocommerce()) ):
		if ( is_active_sidebar( 'blog-widget-area' ) ) : ?>
			<div class="offcanvas_blog_sidebar">
		        <div class="widget-area">
		            <?php dynamic_sidebar( 'blog-widget-area' ); ?>
		        </div>
		    </div>
	    <?php 
	    endif; 
	endif;


	// Is this a woocommerce page?
	if (GETBOWTIED_WOOCOMMERCE_IS_ACTIVE && is_woocommerce()):
		if ( is_active_sidebar( 'catalog-widget-area' ) ) : ?>
			<div class="offcanvas_shop_sidebar">
		        <div class="widget-area">
		            <?php //dynamic_sidebar( 'catalog-widget-area' ); ?>
		        </div>
		    </div>
	    <?php endif;  
	endif;          
?>
</div>