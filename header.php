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
	<?php
	
	$shop_isle_disable_preloader = get_theme_mod('shop_isle_disable_preloader');
		
	if( isset($shop_isle_disable_preloader) && ($shop_isle_disable_preloader != 1) ):
	
		echo '<div class="page-loader">';
			echo '<div class="loader">Loading...</div>';
		echo '</div>';
	
	endif;
	
	?>
	
	<!-- Navigation start -->
	<nav class="navbar navbar-custom navbar-transparent navbar-fixed-top" role="navigation">

		<div class="container">
	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#custom-collapse">
					<span class="sr-only"><?php _e('Toggle navigation','shop-isle'); ?></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<?php
					$shop_isle_logo = get_theme_mod('shop_isle_logo'); 
					if( !empty($shop_isle_logo) ):
						echo '<a href="'.esc_url( home_url( '/' ) ).'"><img src="'.$shop_isle_logo.'"></a>';
					else:
						echo '<div class="shop_isle_header_title">';
							echo '<h1 class="site-title"><a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">'.get_bloginfo( 'name' ).'</a></h1>';

							echo '<h2 class="site-description"><a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">'.get_bloginfo( 'description' ).'</a></h2>';
							
						echo '</div>';
					endif;
				?>
				
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
	//do_action( 'shop_isle_content_top' ); ?>
