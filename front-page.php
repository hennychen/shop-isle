<?php get_header(); ?>
<!-- Home start -->
	<section id="home" class="home-section home-parallax home-fade home-full-height">

		<div class="hero-slider">
			<ul class="slides">

				<li class="bg-dark-30 bg-dark" style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/images/section-23.jpg)">
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
				</li>

				<li class="bg-dark-30 bg-dark" style="background-image:url(<?php echo get_template_directory_uri(); ?>/assets/images/section-20.jpg)">
					<div class="hs-caption">
						<div class="caption-content">
							<div class="hs-title-size-1 font-alt mb-30">
								This is Rival
							</div>
							<div class="hs-title-size-4 font-alt mb-40">
								Exclusive products
							</div>
							<a href="#latest" class="section-scroll btn btn-border-w btn-round">Learn More</a>
						</div>
					</div>
				</li>

			</ul>
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
		<section class="module">
			<div class="container">

				<div class="row">
					<div class="col-sm-6 col-sm-offset-3">
						<h2 class="module-title font-alt">Exclusive products</h2>
						<div class="module-subtitle font-serif">
							The languages only differ in their grammar, their pronunciation and their most common words.
						</div>
					</div>
				</div><!-- .row -->

				<div class="row">

					<!-- Owl-carousel start -->
					<div class="owl-carousel text-center" data-items="5" data-pagination="false" data-navigation="false">

						<!-- ex-product start -->
						<div class="owl-item">
							<div class="col-sm-12">
								<div class="ex-product">
									<a href="#">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shop/product-1.jpg" alt="">
									</a>
									<h4 class="shop-item-title font-alt"><a href="#">Leather belt</a></h4>
									L12.00
								</div>
							</div>
						</div>
						<!-- ex-product end -->

						<!-- ex-product start -->
						<div class="owl-item">
							<div class="col-sm-12">
								<div class="ex-product">
									<a href="#">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shop/product-3.jpg" alt="">
									</a>
									<h4 class="shop-item-title font-alt"><a href="#">Derby shoes</a></h4>
									L54.00
								</div>
							</div>
						</div>
						<!-- ex-product end -->

						<!-- ex-product start -->
						<div class="owl-item">
							<div class="col-sm-12">
								<div class="ex-product">
									<a href="#">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shop/product-2.jpg" alt="">
									</a>
									<h4 class="shop-item-title font-alt"><a href="#">Leather belt</a></h4>
									L19.00
								</div>
							</div>
						</div>
						<!-- ex-product end -->

						<!-- ex-product start -->
						<div class="owl-item">
							<div class="col-sm-12">
								<div class="ex-product">
									<a href="#">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shop/product-4.jpg" alt="">
									</a>
									<h4 class="shop-item-title font-alt"><a href="#">Leather belt</a></h4>
									L14.00
								</div>
							</div>
						</div>
						<!-- ex-product end -->

						<!-- ex-product start -->
						<div class="owl-item">
							<div class="col-sm-12">
								<div class="ex-product">
									<a href="#">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shop/product-5.jpg" alt="">
									</a>
									<h4 class="shop-item-title font-alt"><a href="#">Chelsea boots</a></h4>
									L44.00
								</div>
							</div>
						</div>
						<!-- ex-product end -->

						<!-- ex-product start -->
						<div class="owl-item">
							<div class="col-sm-12">
								<div class="ex-product">
									<a href="#">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/shop/product-6.jpg" alt="">
									</a>
									<h4 class="shop-item-title font-alt"><a href="#">Leather belt</a></h4>
									L19.00
								</div>
							</div>
						</div>
						<!-- ex-product end -->

					</div>
					<!-- Owl-carousel end -->

				</div>

			</div>
		</section>
		<!-- Exclusive products end -->

		<!-- Divider -->
		<hr class="divider-w">
		<!-- Divider -->
<?php get_footer(); ?>