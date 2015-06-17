<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package storefront
 */

get_header(); ?>

	<!-- Wrapper start -->
	<div class="main">

		<!-- Header section start -->
		<section class="module-small bg-dark bg-dark-60" data-background="assets/images/section-4.jpg">
			<div class="container">

				<div class="row">

					<div class="col-sm-6 col-sm-offset-3">

						<h1 class="module-title font-alt">FAQ</h1>
						<div class="module-subtitle font-serif mb-0">
							A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.
						</div>

					</div>

				</div><!-- .row -->

			</div>
		</section>
		<!-- Header section end -->

		<!-- Pricing start -->
		<section class="module">
			<div class="container">

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

<?php do_action( 'storefront_sidebar' ); ?>
<?php get_footer(); ?>
