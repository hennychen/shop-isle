<?php
/**
 * The template for displaying about us page.
 *
 * Template Name: About us page
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

		<!-- About start -->
		<?php
		
			if ( have_posts() ) : while ( have_posts() ) : the_post();
			
				$shop_isle_content_aboutus = get_the_content();
				
			endwhile; endif;
			
			if( trim($shop_isle_content_aboutus) != "" ):
				
				echo '<section class="module">';
				
					echo '<div class="container">';

						echo '<div class="row">';

							echo '<div class="col-sm-12">';

								the_content();

							echo '</div>';

						echo '</div>';

					echo '</div>';
					
				echo '</section>';
				
			endif;
		?>
		
		<!-- About end -->

		<!-- Divider -->
		<hr class="divider-w">
		<!-- Divider -->

		<!-- Team start -->
		<section class="module">
			<div class="container">

				<?php
					$shop_isle_our_team_title = get_theme_mod('shop_isle_our_team_title', __( 'Meet our team', 'shop-isle' ));
					$shop_isle_our_team_subtitle = get_theme_mod('shop_isle_our_team_subtitle',__( 'An awesome way to introduce the members of your team.', 'shop-isle' ));
					
					if( !empty($shop_isle_our_team_title) || !empty($shop_isle_our_team_subtitle) ):
					
						echo '<div class="row">';
							echo '<div class="col-sm-6 col-sm-offset-3">';
							
								if( !empty($shop_isle_our_team_title) ):
									echo '<h2 class="module-title font-alt">'.$shop_isle_our_team_title.'</h2>';
								endif;
								
								if( !empty($shop_isle_our_team_subtitle) ):
									echo '<div class="module-subtitle font-serif">';
										echo $shop_isle_our_team_subtitle;
									echo '</div>';
								endif;

							echo '</div>';

						echo '</div><!-- .row -->';
						
					endif;	

					
					$shop_isle_team_members = get_theme_mod('shop_isle_team_members',json_encode(array( array('image_url' => get_template_directory_uri().'/assets/images/team1.jpg' , 'text' => 'Eva Bean', 'subtext' => 'Developer', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit lacus, a iaculis diam.' ),array('image_url' => get_template_directory_uri().'/assets/images/team2.jpg' ,'text' => 'Maria Woods', 'subtext' => 'Designer', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit lacus, a iaculis diam.' ), array('image_url' => get_template_directory_uri().'/assets/images/team3.jpg' , 'text' => 'Booby Stone', 'subtext' => 'Director', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit lacus, a iaculis diam.'), array('image_url' => get_template_directory_uri().'/assets/images/team4.jpg' , 'text' => 'Anna Neaga', 'subtext' => 'Art Director', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit lacus, a iaculis diam.') )));
						
						if( !empty( $shop_isle_team_members ) ):
										
							$shop_isle_team_members_decoded = json_decode($shop_isle_team_members);
										
							if( !empty($shop_isle_team_members_decoded) ):
							
								echo '<div class="row">';
											
									echo '<div class="hero-slider">';
											
										echo '<ul class="slides">';
												
											foreach($shop_isle_team_members_decoded as $shop_isle_team_member):

												echo '<div class="col-sm-6 col-md-3 mb-sm-20 fadeInUp">';

													echo '<div class="team-item">';
														echo '<div class="team-image">';
															echo '<img src="'.$shop_isle_team_member->image_url.'" alt="">';
															echo '<div class="team-detail">';
																echo '<p class="font-serif">'.$shop_isle_team_member->description.'</p>';
															echo '</div>';
														echo '</div>';
														echo '<div class="team-descr font-alt">';
															echo '<div class="team-name">'.$shop_isle_team_member->text.'</div>';
															echo '<div class="team-role">'.$shop_isle_team_member->subtext.'</div>';
														echo '</div>';
													echo '</div>';

												echo '</div>';

											endforeach;
											
										echo '</ul>';
												
									echo '</div>';
								
								echo '</div>';
								
							endif;
						endif;
					
					
					?>

			</div>
		</section>
		<!-- Team end -->

		<!-- Video start -->
		<section class="module bg-dark-60" data-background="">
			<div class="container">

				<div class="row">

					<div class="col-sm-12">

						<div class="video-box">
							<div class="video-box-icon">
								<a href="http://vimeo.com/15486292" class="video-pop-up"><span class="icon-video"></span></a>
							</div>
							<div class="video-title font-alt">
								Presentation
							</div>
							<div class="video-subtitle font-alt">
								Watch the video about our new products
							</div>
						</div>

					</div>

				</div><!-- .row -->

			</div>
		</section>
		<!-- Video end -->

		<!-- Features start -->
		<section class="module">
			<div class="container">

				<div class="row">

					<div class="col-sm-6 col-sm-offset-3">

						<h2 class="module-title font-alt">Our advantages</h2>

					</div>

				</div><!-- .row -->

				<div class="row multi-columns-row">

					<!-- Features start -->
					<div class="col-sm-6 col-md-3 col-lg-3">

						<div class="features-item">
							<div class="features-icon">
								<span class="icon-lightbulb"></span>
							</div>
							<h3 class="features-title font-alt">Ideas and concepts</h3>
							Careful attention to detail and clean, well structured code ensures a smooth user experience for all your visitors.
						</div>

					</div>
					<!-- Features end -->

					<!-- Features start -->
					<div class="col-sm-6 col-md-3 col-lg-3">

						<div class="features-item">
							<div class="features-icon">
								<span class="icon-bike"></span>
							</div>
							<h3 class="features-title font-alt">Optimised for speed</h3>
							Careful attention to detail and clean, well structured code ensures a smooth user experience for all your visitors.
						</div>

					</div>
					<!-- Features end -->

					<!-- Features start -->
					<div class="col-sm-6 col-md-3 col-lg-3">

						<div class="features-item">
							<div class="features-icon">
								<span class="icon-tools"></span>
							</div>
							<h3 class="features-title font-alt">Designs & interfaces</h3>
							Careful attention to detail and clean, well structured code ensures a smooth user experience for all your visitors.
						</div>

					</div>
					<!-- Features end -->

					<!-- Features start -->
					<div class="col-sm-6 col-md-3 col-lg-3">

						<div class="features-item">
							<div class="features-icon">
								<span class="icon-gears"></span>
							</div>
							<h3 class="features-title font-alt">Highly customizable</h3>
							Careful attention to detail and clean, well structured code ensures a smooth user experience for all your visitors.
						</div>

					</div>
					<!-- Features end -->

				</div><!-- .row -->

			</div><!-- .container -->
		</section>
		<!-- Features end -->
<?php get_footer(); ?>