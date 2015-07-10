<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 */
?>
		<!-- Widgets start -->
		<?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
		<div class="module-small bg-dark shop_isle_footer_sidebar">
			<div class="container">
	
				<div class="row">
	
					<?php dynamic_sidebar('sidebar-footer'); ?>
	
				</div><!-- .row -->
	
			</div>
		</div>
		<?php endif; ?>
		<!-- Widgets end -->
	
		<!-- Divider -->
		<hr class="divider-d">
		<!-- Divider -->
	
		<!-- Footer start -->
		<footer class="footer bg-dark">
			<div class="container">
	
				<div class="row">
					<?php
						/* Copyright */
						$shop_isle_copyright = get_theme_mod('shop_isle_copyright',__( '&copy; Themeisle, All rights reserved', 'shop-isle' ));
						if( !empty($shop_isle_copyright) ):
							echo '<div class="col-sm-6">';
								echo '<p class="copyright font-alt">'.$shop_isle_copyright.'</p>';
							echo '</div>';
						endif;	
						
						/* Socials icons */
						
						$shop_isle_socials = get_theme_mod('shop_isle_socials',json_encode(array( array('icon_value' => 'social_facebook' ,'link' => '#' ),array('icon_value' => 'icon-social-twitter' ,'link' => '#'), array('icon_value' => 'icon-social-dribbble' ,'link' => '#'), array('icon_value' => 'icon-social-skype' ,'link' => '#') )));
					
						if( !empty( $shop_isle_socials ) ):
									
							$shop_isle_socials_decoded = json_decode($shop_isle_socials);
									
							if( !empty($shop_isle_socials_decoded) ):
										
								echo '<div class="col-sm-6">';
									echo '<div class="footer-social-links">';
										
											foreach($shop_isle_socials_decoded as $shop_isle_social):
												
												echo '<a href="'.$shop_isle_social->link.'"><span class="'.$shop_isle_social->icon_value.'"></span></a>';
											
											endforeach;
									
										echo '</div>';
										
									echo '</div>';
									
							endif;
							
						endif;
					?>
	
				</div><!-- .row -->
	
			</div>
		</footer>
		<!-- Footer end -->
	
	</div>
	<!-- Wrapper end -->
	
	<!-- Scroll-up -->
	<div class="scroll-up">
		<a href="#totop"><i class="fa fa-angle-double-up"></i></a>
	</div>
	
	<?php do_action( 'storefront_after_footer' ); ?>

<?php wp_footer(); ?>

</body>
</html>
