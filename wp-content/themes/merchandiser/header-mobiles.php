<?php

    global  $custom_header_logo,
            $custom_header_alt_logo,
            $custom_header_wishlist,
            $custom_header_wishlist_icon,
            $custom_header_search,
            $custom_header_search_icon,
            $custom_header_cart,
            $custom_header_cart_icon,
            $custom_header_user_account,
            $yith_wcwl;
            
?>

<div class="site-header-mobiles"> 

    <div class="header-wrapper-mobiles">

        <div class="nav">

            <ul>
                <li class="menu-button">
                    <div class="tools_button">
                        <span class="tools_button_icon"><i class="fa fa-bars"></i></span> <span class="tools_button_text"><?php esc_html_e( 'Menu', 'getbowtied' ); ?></span>
                    </div>
                </li>
            </ul>

        </div>

        <div class="site-branding">

            <?php if ( ! empty( $custom_header_logo ) || ! empty( $custom_header_alt_logo )  ) : ?>

                <div class="site-logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        
                        <?php if ( ! empty( $custom_header_alt_logo ) ) : ?>

                            <img src="<?php echo esc_url( $custom_header_alt_logo ); ?>" alt="logo">

                        <?php elseif ( ! empty( $custom_header_logo ) ) : ?>

                            <img src="<?php echo esc_url( $custom_header_logo ); ?>" alt="logo">
                            
                        <?php endif; ?>

                    </a>
                </div>

            <?php else : ?>

                <div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>

            <?php endif; ?>

        </div>

        <div class="tools">
            
            <ul>                
                
                <!-- Wishlist Button -->
                <?php if ( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) : ?>
                <?php if ( GETBOWTIED_WISHLIST_IS_ACTIVE ) : ?>
                <?php if ( $custom_header_wishlist == '1' ) : ?>
                
                <li class="wishlist-button show-for-large-up">
                    <a class="tools_button" href="<?php echo esc_url($yith_wcwl->get_wishlist_url()); ?>">
                        
                        <?php if ( $custom_header_wishlist_icon != "" ) : ?>
                            <?php $ext = explode('.', $custom_header_wishlist_icon); ?>
                           
                            <?php if (in_array('svg', $ext)): ?>
                                <span class="tools_button_icon uploaded_icon">
                                    <?php echo getbowtied_get_local_file_contents($custom_header_wishlist_icon); ?>
                                </span>
                            <?php else: ?>
                                <span class="tools_button_icon uploaded_icon">
                                    <img src="<?php echo esc_url($custom_header_wishlist_icon); ?>">
                                </span>                                
                            <?php endif; ?>
                        
                        <?php else : ?>
                            
                            <span class="tools_button_icon">
                                <i class="fa fa-shopping-cart"></i>
                            </span>

                        <?php endif; ?>
                        
                        <span class="wishlist_items_number"><?php echo yith_wcwl_count_products(); ?></span>

                    </a>
                </li>

                <?php endif; ?>
                <?php endif; ?>
                <?php endif; ?>

                <!-- Search Button -->
                <?php if ( $custom_header_search == '1' ) : ?>
                
                <li class="search-button">
                    <a class="tools_button">
                        
                            
                            <?php if ( $custom_header_search_icon != "" ) : ?> 
                                <?php $ext = explode('.', $custom_header_search_icon); ?>
                           
                                <?php if (in_array('svg', $ext)): ?>
                                    <span class="tools_button_icon uploaded_icon">
                                        <?php echo getbowtied_get_local_file_contents($custom_header_search_icon); ?>
                                    </span>
                                <?php else: ?>
                                    <span class="tools_button_icon uploaded_icon">
                                        <img src="<?php echo esc_url($custom_header_search_icon); ?>">
                                    </span>                                
                                <?php endif; ?>

                        
                            <?php else: ?>
                                
                                <span class="tools_button_icon">
                                    <i class="fa fa-search"></i>
                                </span>

                            <?php endif; ?>

                        
                    </a>
                </li>

                <?php endif; ?>

                <!-- Shopping Bag Button -->
                <?php if ( GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ) : ?>
                <?php if ( $custom_header_cart == '1' ) : ?>
                
                <li class="shopping-bag-button">
                    <span class="tools_button">
                        
                        <?php if ( $custom_header_cart_icon != "" ) : ?>
                            <?php $ext = explode('.', $custom_header_cart_icon); ?>
                           
                            <?php if (in_array('svg', $ext)): ?>
                                <span class="tools_button_icon uploaded_icon">
                                    <?php echo getbowtied_get_local_file_contents($custom_header_cart_icon); ?>
                                </span>
                            <?php else: ?>
                                <span class="tools_button_icon uploaded_icon">
                                    <img src="<?php echo esc_url($custom_header_cart_icon); ?>">
                                </span>                                
                            <?php endif; ?>
                        
                        <?php else : ?>
                            
                            <span class="tools_button_icon">
                                <i class="fa fa-shopping-cart"></i>
                            </span>

                        <?php endif; ?>
                        
                        <span class="shopping_bag_items_number"><?php echo esc_html(WC()->cart->get_cart_contents_count()); ?></span>

                    </span>
                </li>

                <?php endif; ?>
                <?php endif; ?>

            </ul>

        </div>

    </div>

    <div class="search_wrapper">

        <div class="getbowtied_search_bar">
            <?php 
                GETBOWTIED_WOOCOMMERCE_IS_ACTIVE ? get_product_search_form() : get_search_form(true); 
            ?>
        </div>

    </div>

</div>