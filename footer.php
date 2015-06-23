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
						$shop_isle_copyright = get_theme_mod('shop_isle_copyright',__( '&copy; Themeisle, All rights reserved', 'shop-isle' ));
						if( !empty($shop_isle_copyright) ):
							echo '<div class="col-sm-6">';
								echo '<p class="copyright font-alt">'.$shop_isle_copyright.'</p>';
							echo '</div>';
						endif;	
					?>
	
					<div class="col-sm-6">
						<div class="footer-social-links">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-skype"></i></a>
						</div>
					</div>
	
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
