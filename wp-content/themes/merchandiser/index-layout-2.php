<div class="blog_layout_2">

	<div class="row" style="max-width: 100%">

		<div id="primary" class="content-area fullwidth">

			<main id="main" class="site-main">

		    	<?php if ( "on" == $page_title_option ) : ?>

			    	<div class="blog-header-wrapper">
			  
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

		            	<ul class="list_categories list-centered">
							
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

							<?php $current_cat;

				            	if ( is_home() ) {

				            		$current_cat = 'current-cat';
				            	}	

			            	?>

							<li class="cat-item <?php echo $current_cat; ?>">
								<a href="<?php if ( get_option( 'show_on_front' ) == 'page' ) echo get_permalink( get_option('page_for_posts' ) );
									else echo esc_url( home_url() );?>"><?php echo esc_html__( 'ALL', 'getbowtied'); ?>
								</a>
							</li>
						   <?php wp_list_categories( $args ); ?> 

						</ul>

					</div>

				<?php endif; ?>

				<?php 
			    	if ( isset($sticky[0]) ) {
				    	global $wp_query;
						$args = array_merge( $wp_query->query_vars, array(  'post__not_in' => array($sticky[0]) ) );
						query_posts( $args );
					}
		    	?>

				<ul class="blog_posts">

					<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<li class="blog_post">

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

								<div class="bg-image-wrapper">
									
									<div class="bg-image" style="background: #F7F7F7 url(<?php echo esc_url( the_post_thumbnail_url( 'full' ) ); ?>)"></div>

								</div>

								<div class="post_content_wrapper">

									<div class="post_content">

										<?php the_category(); ?>

								        <?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

								        <?php the_excerpt(); ?>

								        <a class="read_more" href="<?php echo get_permalink(); ?>"> <?php echo esc_html_e( 'Read more', 'getbowtied' ); ?></a> 

							        </div>
									
								</div>

								<a class="entry-link" href="<?php echo the_permalink(); ?>"></a>

							</article>

						</li>

					<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'content', 'none' ); ?>

				<?php endif; ?>

				</ul>

				<?php getbowtied_the_posts_navigation(); ?>

			</main> <!--  end main -->

		</div>  <!--  end primary -->

	</div> <!-- end full row -->

</div>  <!-- end blog layout 2 -->