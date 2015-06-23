<?php
/**
 * The template for displaying full width pages.
 *
 * Template Name: Full width
 *
 */

get_header(); ?>

<!-- Wrapper start -->
	<div class="main">
	
		<!-- Header section start -->
		<section class="module-small bg-dark bg-dark-60" data-background="assets/images/section-4.jpg">
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
		</section>
		<!-- Pricing end -->


<?php get_footer(); ?>
