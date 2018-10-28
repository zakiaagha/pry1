<div class="blog_layout_default">

	<div class="row" style="max-width: 100%">
		
		<div id="primary" class="content-area fullwidth">
			<main id="main" class="site-main">
				<div class="row">
					<div class="large-10 columns small-centered no-pad">
						<div class="blog-header-wrapper">
			            	<?php if ( is_active_sidebar( 'blog-widget-area' ) ) : ?>
			            		<a class="mobile-sidebar-link"><img src="<?php echo get_template_directory_uri() . '/images/blog-sidebar.svg'; ?>" /></a>
			           		<?php endif; ?>

				            <?php if ( ! is_front_page() ) : ?>

				            	<?php if ( "on" == $page_title_option ) : ?>

						            <h1 class="blog-header">

					            		<?php wp_title( '' ); ?>

						            </h1>

						            <?php if (category_description() != '') : ?>
										<div class="row">
											<div class="large-6 small-centered columns blog-category-description">
												<?php echo category_description(); ?>
											</div>
										</div>
									<?php endif; ?>

				            	<?php endif; ?>

				            <?php endif; ?>

			            	<a class="mobile-category-link"><img src="<?php echo get_template_directory_uri() . '/images/blog-categories.svg'; ?>" alt="" /></a>

			            	<ul class="mobile-categories">
			            		<?php $args = array(
										'show_option_all'    => '',
										'orderby'            => 'name',
										'order'              => 'ASC',
										'style'              => 'list',
										'show_count'         => 0,
										'hide_empty'         => 1,
										'use_desc_for_title' => 1,
										'child_of'           => 0,
										'feed'               => '',
										'feed_type'          => '',
										'feed_image'         => '',
										'exclude'            => '',
										'exclude_tree'       => '',
										'include'            => '',
										'hierarchical'       => 1,
										'title_li'           => '',
										'show_option_none'   => 'No categories',
										'number'             => null,
										'echo'               => 1,
										'depth'              => 1,
										'current_category'   => 0,
										'pad_counts'         => 0,
										'taxonomy'           => 'category',
										'walker'             => null
								); ?>
			            		<?php wp_list_categories( $args ); ?>
			            	</ul>

			            </div>

			            <?php if ( "on" == $page_title_option ) : ?>
				
							<ul class="list_categories list-centered">
								<li class="cat-item <?php echo is_home()? 'current-cat' : ''; ?>">
									<a href="<?php if( get_option( 'show_on_front' ) == 'page' ) echo get_permalink( get_option('page_for_posts' ) );
										else echo esc_url( home_url() );?>"><?php echo esc_html__( 'ALL', 'getbowtied'); ?>
									</a>
								</li>
							   <?php wp_list_categories( $args ); ?> 
							</ul>

						 <?php endif; ?>

						<?php 

								$sticky = get_option( 'sticky_posts' );
								if ( isset($sticky[0])  )  {

									$post_thumbnail_id = get_post_thumbnail_id( $sticky[0] );
									echo '<div class="sticky-post" style="background-image: url('.wp_get_attachment_url($post_thumbnail_id).')">';
									echo '<div class="sticky-title">';
									echo '<h2 class="title"><a href=" '.get_the_permalink($sticky[0]).'">'.get_the_title($sticky[0]).'</a></h2>';
									echo '<span class="date">'.get_the_date('',$sticky[0]).'</span>';
									echo '</div>';
									echo '<a class="the_link" href="'.get_the_permalink($sticky[0]).'"></a>';
									echo '</div>';
								}

						?>

						<?php if ( is_active_sidebar( 'blog-widget-area' ) ) : ?>
							
							<div class="row">
								<div class="large-9 columns">
						
						<?php endif; ?>
				    	
				    	<?php 

				    	if ( isset($sticky[0]) ) {
					    	global $wp_query;
							$args = array_merge( $wp_query->query_vars, array(  'post__not_in' => array($sticky[0]) ) );
							query_posts( $args );
						}

				    	?>

				    	<ul id="masonry_grid" class="blog_posts masonry_columns_3" data-columns>
							<?php if ( have_posts() ) : ?>

								<?php while ( have_posts() ) : the_post(); ?>

										<li>
											<?php get_template_part( 'content', get_post_format() ); ?>
										</li>

								<?php endwhile; ?>

							<?php else : ?>

								<?php get_template_part( 'content', 'none' ); ?>

							<?php endif; ?>

						</ul>

						<?php if ( is_active_sidebar( 'blog-widget-area' ) ) : ?>

								</div>
								
								<div class="large-3 columns">

									<?php get_sidebar(); ?>

								</div><!-- .columns -->
								
							</div>

						<?php endif; ?>


					</div><!-- .columns -->
				</div><!-- .row -->

				<?php getbowtied_the_posts_navigation(); ?>
				
			</main><!-- #main -->
		</div><!-- #primary -->

	</div>

</div>