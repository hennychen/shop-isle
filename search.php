<?php
/**
 * The template for displaying search results pages.
 *
 */

get_header(); ?>

	<!-- Wrapper start -->
	<div class="main">
		<!-- Post single start -->
		<section class="module">
			<div class="container">

				<div class="row">

					<!-- Content column start -->
					<div class="col-sm-8">

						<?php if ( have_posts() ) : ?>

							<header class="page-header">
								<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'shop-isle' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
							</header><!-- .page-header -->

							<?php get_template_part( 'loop' ); ?>

						<?php else : ?>

							<?php get_template_part( 'content', 'none' ); ?>

						<?php endif; ?>

					</div><!-- Content column end -->	
					
					<!-- Sidebar column start -->
					<div class="col-sm-4 col-md-3 col-md-offset-1 sidebar">

						<?php do_action( 'storefront_sidebar' ); ?>

					</div>
					<!-- Sidebar column end -->
					
				</div><!-- .row -->

			</div>
		</section>
		<!-- Post single end -->


<?php get_footer(); ?>
