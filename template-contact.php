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
		<section class="module bg-dark bg-dark-60" data-background="assets/images/section-4.jpg">
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
		<section class="module">
			<div class="container">

				<div class="row">

					<div class="col-sm-6">

						<h4 class="font-alt">Get in touch</h4>
						<br>

						<form id="contact-form" role="form" novalidate="">

							<div class="form-group">
								<label class="sr-only" for="cname">Name</label>
								<input type="text" id="cname" class="form-control" name="cname" placeholder="Name*" required="" data-validation-required-message="Please enter your name.">
								<p class="help-block text-danger"></p>
							</div>

							<div class="form-group">
								<label class="sr-only" for="cemail">Your Email</label>
								<input type="email" id="cemail" name="cemail" class="form-control" placeholder="Your E-mail*" required="" data-validation-required-message="Please enter your email address.">
								<p class="help-block text-danger"></p>
							</div>

							<div class="form-group">
								<textarea class="form-control" id="cmessage" name="cmessage" rows="7" placeholder="Message*" required="" data-validation-required-message="Please enter your message."></textarea>
								<p class="help-block text-danger"></p>
							</div>

							<div class="text-center">
								<button type="submit" class="btn btn-block btn-round btn-d">Submit</button>
							</div>

						</form>

						<!-- Ajax response -->
						<div id="contact-response" class="ajax-response font-alt"></div>

					</div>

					<div class="col-sm-6">

						<h4 class="font-alt">Additional info</h4>
						<br>
						<p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend.</p>
						<hr/>
						<h4 class="font-alt">Business Hours</h4>
						<br>
						<ul class="list-unstyled">
							<li>Mo - Fr: 8am to 6pm</li>
							<li>Sa, Su: 10am to 2pm</li>
						</ul>

					</div>

				</div><!-- .row -->

			</div>
		</section>
		<!-- Contact end -->

		<!-- Map start -->
		<section id="map-section">
			<div id="map"></div>
		</section>
		<!-- Map end -->



<?php get_footer(); ?>
