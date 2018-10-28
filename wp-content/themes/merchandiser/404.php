<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'getbowtied' ); ?></h1>
			</header><!-- .page-header -->

			<section class="error-404 not-found">
				<div class="page-content">

					<div class="icon-404"></div>
					
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'getbowtied' ); ?></p>

				</div><!-- .page-content -->

				<?php get_search_form(); ?>

			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
