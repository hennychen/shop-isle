<?php get_header(); ?>
	
	<!-- Home start -->
	<section id="home" class="home-section home-parallax home-fade home-full-height">

	<?php
					
		$shop_isle_slider = get_theme_mod('shop_isle_slider',json_encode(array( array("image_url" => get_template_directory_uri().'/assets/images/slide1.jpg' ,"link" => "#", "text" => "ShopIsle", "subtext" => "WooCommerce Theme", "label" => "FIND OUT MORE" ),array("image_url" => get_template_directory_uri().'/assets/images/slide2.jpg' ,"link" => "#", "text" => "ShopIsle", "subtext" => "Hight quality store" , "label" => "FIND OUT MORE"),array("image_url" => get_template_directory_uri().'/assets/images/slide3.jpg' ,"link" => "#", "text" => "ShopIsle", "subtext" => "Responsive Theme" , "label" => "FIND OUT MORE") )));
					
		if( !empty( $shop_isle_slider ) ){
						
			$shop_isle_slider_decoded = json_decode($shop_isle_slider);
						
			if( !empty($shop_isle_slider_decoded) ){
							
				echo '<div class="hero-slider">';
						
					echo '<ul class="slides">';
							
						foreach($shop_isle_slider_decoded as $parallax_one_social_icon){
									
							echo '<li class="bg-dark-30 bg-dark" style="background-image:url('.$parallax_one_social_icon->image_url.')">';
								echo '<div class="hs-caption">';
									echo '<div class="caption-content">';
										echo '<div class="hs-title-size-4 font-alt mb-30">'.$parallax_one_social_icon->text.'</div>';
										echo '<div class="hs-title-size-1 font-alt mb-40">'.$parallax_one_social_icon->subtext.'</div>';
										echo '<a href="'.$parallax_one_social_icon->link.'" class="section-scroll btn btn-border-w btn-round">'.$parallax_one_social_icon->label.'</a>';
									echo '</div>';
								echo '</div>';
							echo '</li>';
								
						}
						
					echo '</ul>';
							
				echo '</div>';
						
			}
		}
					
	?>

	</section >
	<!-- Home end -->

	<!-- Wrapper start -->
	<div class="main">

		<!-- Banner bloks start -->
		
		<?php
					
			$shop_isle_banner = get_theme_mod('shop_isle_banner',json_encode(array( array("image_url" => get_template_directory_uri().'/assets/images/banner1.jpg' ,"link" => "#" ),array("image_url" => get_template_directory_uri().'/assets/images/banner2.jpg' ,"link" => "#"),array("image_url" => get_template_directory_uri().'/assets/images/banner3.jpg' ,"link" => "#") )));
					
			if( !empty( $shop_isle_banner ) ){
						
				$shop_isle_banner_decoded = json_decode($shop_isle_banner);
						
				if( !empty($shop_isle_banner_decoded) ){
							
					echo '<section class="module-small">';
						echo '<div class="container">';

							echo '<div class="row shop_isle_banners_section">';
							
								foreach($shop_isle_banner_decoded as $parallax_one_social_icon){
									
									echo '<div class="col-sm-4"><div class="content-box mt-0 mb-0"><div class="content-box-image"><a href="'.$parallax_one_social_icon->link.'"><img src="'.$parallax_one_social_icon->image_url.'"></a></div></div></div>';
								
								}
						
							echo '</div>';
							
						echo '</div>';
							
					echo '</section>';
						
				}
			}
					
	?>

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

				<?php
				
				$shop_isle_latest_args = array( 'post_type' => 'product', 'posts_per_page' => 8, 'orderby' =>'date','order' => 'DESC' );
				
				$shop_isle_latest_loop = new WP_Query( $shop_isle_latest_args );
				
				if( $shop_isle_latest_loop->have_posts() ):
				
					echo '<div class="row multi-columns-row">';
				
					while( $shop_isle_latest_loop->have_posts() ) : 
					
						$shop_isle_latest_loop->the_post(); 
						global $product; 
						
						echo '<div class="col-sm-6 col-md-3 col-lg-3">';
							echo '<div class="shop-item">';
								echo '<div class="shop-item-image">';
								
									if (has_post_thumbnail( $shop_isle_latest_loop->post->ID )):
										echo get_the_post_thumbnail($shop_isle_latest_loop->post->ID, 'shop_catalog'); 
									else: 
										echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="65px" height="115px" />';
									endif;
									
									echo '<div class="shop-item-detail">';
										echo '<a class="btn btn-round btn-b" href="<?php echo $product->add_to_cart_url(); ?>"><span class="icon-basket"></span> Add To Cart</a>';
									echo '</div>';
								echo '</div>';
								echo '<h4 class="shop-item-title font-alt"><a href="#"><?php the_title(); ?></a></h4>';
								echo get_woocommerce_currency_symbol().$product->price;
							
							echo '</div>';
						echo '</div>';

					endwhile; 
					
					echo '</div>';
					
				endif;
				
				wp_reset_postdata(); ?>

				<div class="row mt-30">
					<div class="col-sm-12 align-center">
						<a href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' )); ?>" class="btn btn-b btn-round">See all products</a>
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
<?php get_footer(); ?>