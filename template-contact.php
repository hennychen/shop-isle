<?php
/**
 * The template for displaying contact page.
 *
 * Template Name: Contact page
 *
 */

get_header(); ?>

<!-- Wrapper start -->
	<div class="main">

		<!-- Header section start -->
		<section class="module bg-dark bg-dark-60" data-background="">
			<div class="container">

				<div class="row">

					<div class="col-sm-6 col-sm-offset-3">

						<h1 class="module-title font-alt"><?php the_title(); ?></h1>

					</div>

				</div><!-- .row -->

			</div>
		</section>
		<!-- Header section end -->

		<!-- Contact start -->
		
		<?php 
		
		if( have_posts() ):
		
			while ( have_posts() ) : the_post();

				get_template_part( 'content', 'contact' );

			endwhile; 
			
		endif;	
			
get_footer(); ?>