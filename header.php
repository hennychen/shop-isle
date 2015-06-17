<?php
/**
 * The header for our theme.
 *
 * @package shop-isle
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> <?php storefront_html_tag_schema(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php do_action( 'storefront_before_header' ); ?>

	<!-- Preloader -->
	<div class="page-loader">
		<div class="loader">Loading...</div>
	</div>
	
	
	
	<!-- Navigation start -->
	<nav class="navbar navbar-custom navbar-transparent navbar-fixed-top" role="navigation">

		<div class="container">
	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#custom-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">Rival</a>
			</div>
	
			<div class="collapse navbar-collapse" id="custom-collapse">
	
					<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav navbar-right') ); ?>

			</div>
	
		</div>

	</nav>
	<!-- Navigation end -->
	
	<?php
	/**
	* @hooked woocommerce_breadcrumb - 10
	*/
	do_action( 'storefront_content_top' ); ?>
