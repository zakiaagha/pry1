    			<?php 

    			global 	$custom_footer_sticky,
                        $custom_back_to_top,
    					$custom_footer_js,
                        $custom_footer_copyright;

    			?>

                <div class="site-content-overlay"></div>

                </div><!-- .site-content -->

                <?php if ( 0 == $custom_footer_sticky ) : ?>
    			<?php get_template_part( 'footer', 'default' ); ?>
    			<?php endif; ?>

    		</div><!-- .page-wrapper -->

    	</div><!-- .offcanvas_main_content -->

        <!-- OffCanvas Aside Content Left -->
        <div class="offcanvas_aside offcanvas_aside_left">
            <div class="offcanvas_aside_content">
            	<?php get_template_part( 'offcanvas', 'left' ); ?>
            </div>
        </div>

        <!-- OffCanvas Aside Content Right -->
        <div class="offcanvas_aside offcanvas_aside_right">        
            <div class="offcanvas_aside_content">
            	<?php get_template_part( 'offcanvas', 'right' ); ?>
            </div>
        </div>

        <?php if ( 1 == $custom_footer_sticky ) : ?>
    	<?php get_template_part( 'footer', 'default' ); ?>
    	<?php endif; ?>

        <div class="offcanvas_overlay">
    		<!-- <div class="close-canvas">
    			<i class="fa fa-times"></i>
    		</div> -->
        </div>

    </div><!-- .offcanvas_container -->

    <!-- ******************************************************************** -->
    <!-- * Back To Top Button *********************************************** -->
    <!-- ******************************************************************** -->

    <?php if ($custom_back_to_top == 1) :?>
        <a href="#0" class="cd-top"></a>
    <?php endif; ?>

	<!-- ******************************************************************** -->
    <!-- * Custom Footer JavaScript Code ************************************ -->
    <!-- ******************************************************************** -->
    
    <?php if ( (isset($custom_footer_js)) && ($custom_footer_js != "") ) : ?>
		<?php echo $custom_footer_js; ?>
    <?php endif; ?>


    <?php wp_footer(); ?>

</body>
</html>