<?php
/*
Template Name: Blog template
*/

get_header(); ?>
<!-- Wrapper start -->
	<div class="main">

		<!-- Header section start -->
		<?php
		$shop_isle_header_image = get_header_image();
		if( !empty($shop_isle_header_image) ):
			echo '<section class="module bg-dark" data-background="'.$shop_isle_header_image.'">';
		else:
			echo '<section class="module bg-dark">';
		endif;
		?>
			<div class="container">

				<div class="row">

					<div class="col-sm-6 col-sm-offset-3">

						<h1 class="module-title font-alt"><?php the_title(); ?></h1>

						<?php

						/* Header description */

						$shop_isle_shop_id = get_the_ID();

						if( !empty($shop_isle_shop_id) ):

							$shop_isle_page_description = get_post_meta($shop_isle_shop_id, 'shop_isle_page_description');

							if( !empty($shop_isle_page_description[0]) ):
								echo '<div class="module-subtitle font-serif mb-0">'.$shop_isle_page_description[0].'</div>';
							endif;

						endif;
						?>

					</div>

				</div><!-- .row -->

			</div>
		</section>
		<!-- Header section end -->

		<!-- Blog standar start -->
		<section class="module">
			<div class="container">

				<div class="row">

					<!-- Content column start -->
					<div class="col-sm-8">

						<!-- Post with thumbnail start -->
						<div class="post">

							<?php
							if ( has_post_thumbnail() ) {

								echo '<div class="post-thumbnail">';
									echo '<a href="'.get_permalink().'">';
										echo get_the_post_thumbnail($post->ID, 'blog-thumb');
									echo '</a>';
								echo '</div>';
							}
							?>


							<div class="post-header font-alt">
								<h2 class="post-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
								<div class="post-meta">
									By <a href="#">Mark Stone</a> | 23 November | 3 Comments | <a href="#">Photography</a>, <a href="#">Web Design</a>
								</div>
							</div>

							<div class="post-entry">
								<?php the_excerpt(); ?>
							</div>

							<div class="post-more">
								<a href="blog-single-right.html" class="more-link">Read more</a>
							</div>

						</div>
						<!-- Post with thumbnail end -->

						<!-- Pagination start-->
						<div class="pagination font-alt">
							<a href="#"><i class="fa fa-angle-left"></i></a>
							<a href="#" class="active">1</a>
							<a href="#">2</a>
							<a href="#">3</a>
							<a href="#">4</a>
							<a href="#"><i class="fa fa-angle-right"></i></a>
						</div>
						<!-- Pagination end -->

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
		<!-- Blog standar end -->
<?php get_footer(); ?>