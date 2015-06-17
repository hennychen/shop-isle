<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */
?>
<?php do_action( 'storefront_before_footer' ); ?>
<!-- Widgets start -->
		<div class="module-small bg-dark">
			<div class="container">
	
				<div class="row">
	
					<div class="col-sm-3">
	
						<!-- Widget start -->
						<div class="widget">
							<h5 class="widget-title font-alt">About Rival</h5>
							<p>The languages only differ in their grammar, their pronunciation and their most common words.</p>
							<p>Phone: +1 234 567 89 10<br>Fax: +1 234 567 89 10</p>
							<p>Email: <a href="#">somecompany@example.com</a></p>
						</div>
						<!-- Widget end -->
	
					</div>
	
					<div class="col-sm-3">
	
						<!-- Widget start -->
						<div class="widget">
							<h5 class="widget-title font-alt">Recent Comments</h5>
							<ul class="icon-list">
								<li>Maria on <a href="#">Designer Desk Essentials</a></li>
								<li>John on <a href="#">Realistic Business Card Mockup</a></li>
								<li>Andy on <a href="#">Eco bag Mockup</a></li>
								<li>Jack on <a href="#">Bottle Mockup</a></li>
								<li>Mark on <a href="#">Our trip to the Alps</a></li>
							</ul>
						</div>
						<!-- Widget end -->
	
					</div>
	
					<div class="col-sm-3">
	
						<!-- Widget start -->
						<div class="widget">
							<h5 class="widget-title font-alt">Categories</h5>
							<ul class="icon-list">
								<li><a href="#">Photography - 7</a></li>
								<li><a href="#">Web Design - 3</a></li>
								<li><a href="#">Illustration - 12</a></li>
								<li><a href="#">Marketing - 1</a></li>
								<li><a href="#">WordPress - 16</a></li>
							</ul>
						</div>
						<!-- Widget end -->
	
					</div>
	
					<div class="col-sm-3">
	
						<!-- Widget start -->
						<div class="widget">
							<h5 class="widget-title font-alt">Popular posts</h5>
							<ul class="widget-posts">
	
								<li class="clearfix">
									<div class="widget-posts-image">
										<a href="#"><img src="assets/images/rp-1.jpg" alt=""></a>
									</div>
									<div class="widget-posts-body">
										<div class="widget-posts-title">
											<a href="#">Designer Desk Essentials</a>
										</div>
										<div class="widget-posts-meta">
											23 November
										</div>
									</div>
								</li>
	
								<li class="clearfix">
									<div class="widget-posts-image">
										<a href="#"><img src="assets/images/rp-2.jpg" alt=""></a>
									</div>
									<div class="widget-posts-body">
										<div class="widget-posts-title">
											<a href="#">Realistic Business Card Mockup</a>
										</div>
										<div class="widget-posts-meta">
											15 November
										</div>
									</div>
								</li>
	
							</ul>
						</div>
						<!-- Widget end -->
	
					</div>
	
				</div><!-- .row -->
	
			</div>
		</div>
		<!-- Widgets end -->
	
		<!-- Divider -->
		<hr class="divider-d">
		<!-- Divider -->
	
		<!-- Footer start -->
		<footer class="footer bg-dark">
			<div class="container">
	
				<div class="row">
	
					<div class="col-sm-6">
						<p class="copyright font-alt">© 2015 <a href="index.html">Rival</a>, All Rights Reserved.</p>
					</div>
	
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
			<?php
			/**
			 * @hooked storefront_footer_widgets - 10
			 * @hooked storefront_credit - 20
			 */
			do_action( 'storefront_footer' ); ?>
		</footer>
		<!-- Footer end -->
	
	</div>
	<!-- Wrapper start -->
	
	<!-- Scroll-up -->
	<div class="scroll-up">
		<a href="#totop"><i class="fa fa-angle-double-up"></i></a>
	</div>

	<?php do_action( 'storefront_after_footer' ); ?>

<?php wp_footer(); ?>

</body>
</html>
