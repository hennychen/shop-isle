<?php get_header(); ?>
	
	<!-- Home start -->
	<section id="home" class="home-section home-parallax home-fade home-full-height">

		<div class="hero-slider">
			
				<?php
					
					$shop_isle_slider_section = get_theme_mod('shop_isle_slider',json_encode(array( array("image_url" => get_template_directory_uri().'/assets/images/slide1.jpg' ,"link" => "#" ),array("image_url" => get_template_directory_uri().'/assets/images/slide2.jpg' ,"link" => "#" ),array("image_url" => get_template_directory_uri().'/assets/images/slide3.jpg' ,"link" => "#" ) )));
					
					if( !empty( $shop_isle_slider_section ) ){
						
						
						$parallax_one_social_icons_decoded = json_decode($shop_isle_slider_section);
						
						if( !empty($parallax_one_social_icons_decoded) ){
						
							echo '<ul class="slides">';
							
								foreach($parallax_one_social_icons_decoded as $parallax_one_social_icon){
									
									echo '<li class="bg-dark-30 bg-dark" style="background-image:url('.$parallax_one_social_icon->image_url.')">
										<div class="hs-caption">
											<div class="caption-content">
												<div class="hs-title-size-1 font-alt mb-30">
													This is Rival
												</div>
												<div class="hs-title-size-4 font-alt mb-30">
													Summer 2015
												</div>
												<div class="hs-title-size-1 font-alt mb-40">
													Your online fashion destination
												</div>
												<a href="#latest" class="section-scroll btn btn-border-w btn-round">Learn More</a>
											</div>
										</div>
									</li>';
								
								}
						
							echo '</ul>';
						
						}
					}
					
				?>

		</div>

	</section >
	<!-- Home end -->

	<!-- Wrapper start -->
	<div class="main">

		<!-- Banner bloks start -->
		<?php if ( is_active_sidebar( 'sidebar-banners' ) ) : ?>
		
			<section class="module-small">
				<div class="container">

					<div class="row shop_isle_banners_section">

						<?php dynamic_sidebar('sidebar-banners'); ?>

					</div><!-- .row -->

				</div><!-- .container -->
			</section>
			
		<?php endif; ?>
		
		<!-- Banner bloks end -->

		<!-- Divider -->
		<hr class="divider-w">
		<!-- Divider -->

		<!-- Latest start -->
		<section id="latest" class="module-small">
			<div class="container">

				<div class="row">
					<div class="col-sm-6 col-sm-offset-3">
						<h2 class="module-title font-alt">Latest in clothing</h2>
					</div>
				</div><!-- .row -->

				<div class="row multi-columns-row">
				
					<?php echo do_shortcode('[recent_products per_page="12" columns="4"]'); ?>

					<!-- Shop item start -->
					<div class="col-sm-6 col-md-3 col-lg-3">
						<div class="shop-item">
							<div class="shop-item-image">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shop/product-7.jpg" alt="">
								<div class="shop-item-detail">
									<a class="btn btn-round btn-b"><span class="icon-basket"></span> Add To Cart</a>
								</div>
							</div>
							<h4 class="shop-item-title font-alt"><a href="#">Accessories Pack</a></h4>
							L9.00
						</div>
					</div>
					<!-- Shop item end -->

					<!-- Shop item start -->
					<div class="col-sm-6 col-md-3 col-lg-3">
						<div class="shop-item">
							<div class="shop-item-image">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shop/product-8.jpg" alt="">
								<div class="shop-item-detail">
									<a class="btn btn-round btn-b"><span class="icon-basket"></span> Add To Cart</a>
								</div>
							</div>
							<h4 class="shop-item-title font-alt"><a href="#">Men’s Casual Pack</a></h4>
							L12.00
						</div>
					</div>
					<!-- Shop item end -->

					<!-- Shop item start -->
					<div class="col-sm-6 col-md-3 col-lg-3">
						<div class="shop-item">
							<div class="shop-item-image">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shop/product-9.jpg" alt="">
								<div class="shop-item-detail">
									<a class="btn btn-round btn-b"><span class="icon-basket"></span> Add To Cart</a>
								</div>
							</div>
							<h4 class="shop-item-title font-alt"><a href="#">Men’s Garb</a></h4>
							L6.00
						</div>
					</div>
					<!-- Shop item end -->

					<!-- Shop item start -->
					<div class="col-sm-6 col-md-3 col-lg-3">
						<div class="shop-item">
							<div class="shop-item-image">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shop/product-10.jpg" alt="">
								<div class="shop-item-detail">
									<a class="btn btn-round btn-b"><span class="icon-basket"></span> Add To Cart</a>
								</div>
							</div>
							<h4 class="shop-item-title font-alt"><a href="#">Cold Garb</a></h4>
							L14.00
						</div>
					</div>
					<!-- Shop item end -->

					<!-- Shop item start -->
					<div class="col-sm-6 col-md-3 col-lg-3">
						<div class="shop-item">
							<div class="shop-item-image">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shop/product-11.jpg" alt="">
								<div class="shop-item-detail">
									<a class="btn btn-round btn-b"><span class="icon-basket"></span> Add To Cart</a>
								</div>
							</div>
							<h4 class="shop-item-title font-alt"><a href="#">Accessories Pack</a></h4>
							L9.00
						</div>
					</div>
					<!-- Shop item end -->

					<!-- Shop item start -->
					<div class="col-sm-6 col-md-3 col-lg-3">
						<div class="shop-item">
							<div class="shop-item-image">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shop/product-12.jpg" alt="">
								<div class="shop-item-detail">
									<a class="btn btn-round btn-b"><span class="icon-basket"></span> Add To Cart</a>
								</div>
							</div>
							<h4 class="shop-item-title font-alt"><a href="#">Men’s Casual Pack</a></h4>
							L12.00
						</div>
					</div>
					<!-- Shop item end -->

					<!-- Shop item start -->
					<div class="col-sm-6 col-md-3 col-lg-3">
						<div class="shop-item">
							<div class="shop-item-image">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shop/product-13.jpg" alt="">
								<div class="shop-item-detail">
									<a class="btn btn-round btn-b"><span class="icon-basket"></span> Add To Cart</a>
								</div>
							</div>
							<h4 class="shop-item-title font-alt"><a href="#">Men’s Garb</a></h4>
							L6.00
						</div>
					</div>
					<!-- Shop item end -->

					<!-- Shop item start -->
					<div class="col-sm-6 col-md-3 col-lg-3">
						<div class="shop-item">
							<div class="shop-item-image">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shop/product-14.jpg" alt="">
								<div class="shop-item-detail">
									<a class="btn btn-round btn-b"><span class="icon-basket"></span> Add To Cart</a>
								</div>
							</div>
							<h4 class="shop-item-title font-alt"><a href="#">Cold Garb</a></h4>
							L14.00
						</div>
					</div>
					<!-- Shop item end -->

				</div><!-- .row -->

				<div class="row mt-30">
					<div class="col-sm-12 align-center">
						<a href="shop-grid-col-3.html" class="btn btn-b btn-round">See all products</a>
					</div>
				</div>

			</div><!-- .container -->
		</section>
		<!-- Latest end -->

		
		<!-- Video end -->

		<!-- Exclusive products start -->
		<?php 
			$shop_isle_products_slider_category = get_theme_mod('shop_isle_products_slider_category');
			
			if( !empty($shop_isle_products_slider_category) ):
			
				$shop_isle_products_slider_args = array( 'post_type' => 'product', 'posts_per_page' => 10, 'tax_query' => array(
					array(
						'taxonomy' => 'product_cat',
						'field'    => 'term_id',
						'terms'    => $shop_isle_products_slider_category,
					)
				));

				$shop_isle_products_slider_loop = new WP_Query( $shop_isle_products_slider_args );

				if( $shop_isle_products_slider_loop->have_posts() ):
				
					echo '<section class="module">';
			
						echo '<div class="container">';

							echo '<div class="row">';
								echo '<div class="col-sm-6 col-sm-offset-3">';
									echo '<h2 class="module-title font-alt">Exclusive products</h2>';
									echo '<div class="module-subtitle font-serif">';
										echo 'The languages only differ in their grammar, their pronunciation and their most common words.';
									echo '</div>';
								echo '</div>';
							echo '</div><!-- .row -->';

							echo '<div class="row">';

								echo '<div class="owl-carousel text-center" data-items="5" data-pagination="false" data-navigation="false">';
				
									while ( $shop_isle_products_slider_loop->have_posts() ) : 
									
										$shop_isle_products_slider_loop->the_post(); 
										
										echo '<div class="owl-item">';
											echo '<div class="col-sm-12">';
												echo '<div class="ex-product">';
													echo '<a href="'.get_permalink().'">' . woocommerce_get_product_thumbnail().'</a>';
													echo '<h4 class="shop-item-title font-alt"><a href="'.get_permalink().'">'.the_title().'</a></h4>';
													echo 'L12.00';
												echo '</div>';
											echo '</div>';
										echo '</div>';
	
									endwhile; 
	
									wp_reset_postdata();
								echo '</div>';

							echo '</div>';		
									
						echo '</div>';
			
					echo '</section>';
					
				endif;	
				
			endif;	
			?>
		

		<!-- Divider -->
		<hr class="divider-w">
		<!-- Divider -->
<?php get_footer(); ?>