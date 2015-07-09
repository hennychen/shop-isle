<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 */

get_header(); ?>

	<!-- Wrapper start -->
	<div class="main">

		<!-- Header section start -->
		<section class="module-small bg-dark bg-dark-60" data-background="">
			<div class="container">

				<div class="row">

					<div class="col-sm-6 col-sm-offset-3">

						<h1 class="module-title font-alt"><?php the_title(); ?></h1>

					</div>

				</div><!-- .row -->

			</div>
		</section>
		<!-- Header section end -->

		<!-- Pricing start -->
		<section class="module">
			<div class="container">
			
				<div class="row">	

					<!-- Content column start -->
					<div class="col-sm-8">
						<?php
						/**
						* @hooked woocommerce_breadcrumb - 10
						*/
						do_action( 'shop_isle_content_top' ); ?>

						<?php while ( have_posts() ) : the_post(); ?>

							<?php
							do_action( 'storefront_page_before' );
							?>

							<?php get_template_part( 'content', 'page' ); ?>

							<?php
							/**
							 * @hooked storefront_display_comments - 10
							 */
							do_action( 'storefront_page_after' );
							?>

						<?php endwhile; // end of the loop. ?>

					</div>
					<!-- Content column end -->

					<!-- Sidebar column start -->
					<div class="col-sm-4 col-md-3 col-md-offset-1 sidebar">

						<?php do_action( 'storefront_sidebar' ); ?>

					</div>
					<!-- Sidebar column end -->

				</div><!-- .row -->
			
			</div>
		</section>
		<!-- Pricing end -->


<?php get_footer(); ?>