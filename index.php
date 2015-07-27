<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */
?>
<?php get_header(); ?>

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

						<h1 class="module-title font-alt"><?php _e('Blog','shop-isle'); ?></h1>

					</div>

				</div><!-- .row -->

			</div>
		</section>
		<!-- Header section end -->

		<!-- Blog standar start -->
		<?php
		$shop_isle_query = new WP_Query( array('post_type' => 'post') );

		if ( $shop_isle_query->have_posts() ) {

			?>
			<section class="module">
				<div class="container">

					<div class="row">

						<!-- Content column start -->
						<div class="col-sm-8">
							<?php

							while ( $shop_isle_query->have_posts() ) {
								$shop_isle_query->the_post();

								?>
								<div id="post-<?php the_ID(); ?>" <?php post_class("post"); ?> itemscope="" itemtype="http://schema.org/BlogPosting">

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
											<?php
											shop_isle_posted_on();
											storefront_post_meta();
											?>

										</div>
									</div>

									<div class="post-entry">
										<?php
										$shop_isleismore = @strpos( $post->post_content, '<!--more-->');
										if($shop_isleismore) :
											the_content();
										else :
											the_excerpt();
										endif;
										?>
									</div>

									<div class="post-more">
										<a href="<?php echo get_permalink(); ?>" class="more-link"><?php _e('Read more','shop-isle'); ?></a>
									</div>

								</div>
								<?php

							}
							?>
							<!-- Pagination start-->
							<div class="pagination font-alt">
								<?php do_action('storefront_loop_after'); ?>
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

			<?php
		}
		/* Restore original Post Data */
		wp_reset_postdata();
		?>

<?php get_footer(); ?>