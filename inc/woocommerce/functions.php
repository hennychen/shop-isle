<?php
/**
 * General functions used to integrate this theme with WooCommerce.
 *
 */

add_image_size( 'shop_isle_cart_item_image_size', 58, 72, true );
 
/**
 * Before Content
 * Wraps all WooCommerce content in wrappers which match the theme markup
 * @since   1.0.0
 * @return  void
 */
if ( ! function_exists( 'shop_isle_before_content' ) ) {
	function shop_isle_before_content() {
		?>
		<div class="main">
	    	<?php
	}
}

/**
 * After Content
 * Closes the wrapping divs
 * @since   1.0.0
 * @return  void
 */
if ( ! function_exists( 'shop_isle_after_content' ) ) {
	function shop_isle_after_content() {
		?>
		</div><!-- .main -->

		<?php
	}
}

/**
 * Before Shop loop
 * @since   1.0.0
 * @return  void
 */
if ( ! function_exists( 'shop_isle_shop_page_wrapper' ) ) {
	function shop_isle_shop_page_wrapper() {
		?>
		<section class="module-small">
				<div class="container"> 
		<?php	
	}
}

/**
 * Before Product content
 * @since   1.0.0
 * @return  void
 */
function shop_isle_product_page_wrapper() {
	echo '<section class="module">
			<div class="container">';
}

/**
 * After Product content
 * Closes the wrapping div and section
 * @since   1.0.0
 * @return  void
 */
if ( ! function_exists( 'shop_isle_product_page_wrapper_end' ) ) {	
	function shop_isle_product_page_wrapper_end() {
		?>
			</div><!-- .container -->
		</section><!-- .module-small -->
			<?php	
	}
}

/**
 * After Shop loop
 * Closes the wrapping div and section
 * @since   1.0.0
 * @return  void
 */
if ( ! function_exists( 'shop_isle_shop_page_wrapper_end' ) ) {	
	function shop_isle_shop_page_wrapper_end() {
		?>
			</div><!-- .container -->
		</section><!-- .module-small -->
			<?php	
	}
}	

/**
 * Default loop columns on product archives
 * @return integer products per row
 * @since  1.0.0
 */
function storefront_loop_columns() {
	return apply_filters( 'storefront_loop_columns', 4 ); // 4 products per row
}

/**
 * Add 'woocommerce-active' class to the body tag
 * @param  array $classes
 * @return array $classes modified to include 'woocommerce-active' class
 */
function storefront_woocommerce_body_class( $classes ) {
	if ( is_woocommerce_activated() ) {
		$classes[] = 'woocommerce-active';
	}

	return $classes;
}

/**
 * Cart Fragments
 * Ensure cart contents update when products are added to the cart via AJAX
 * @param  array $fragments Fragments to refresh via AJAX
 * @return array            Fragments to refresh via AJAX
 */
if ( ! function_exists( 'storefront_cart_link_fragment' ) ) {
	function storefront_cart_link_fragment( $fragments ) {
		global $woocommerce;

		ob_start();

		storefront_cart_link();

		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}

/**
 * WooCommerce specific scripts & stylesheets
 * @since 1.0.0
 */
function storefront_woocommerce_scripts() {
	global $shop_isle_version;

	wp_enqueue_style( 'storefront-woocommerce-style', get_template_directory_uri() . '/inc/woocommerce/css/woocommerce.css', $shop_isle_version );
}

/**
 * Related Products Args
 * @param  array $args related products args
 * @since 1.0.0
 * @return  array $args related products args
 */
function storefront_related_products_args( $args ) {
	$args = apply_filters( 'storefront_related_products_args', array(
		'posts_per_page' => 4,
		'columns'        => 4,
	) );

	return $args;
}

/**
 * Product gallery thumnail columns
 * @return integer number of columns
 * @since  1.0.0
 */
function storefront_thumbnail_columns() {
	return intval( apply_filters( 'storefront_product_thumbnail_columns', 4 ) );
}

/**
 * Products per page
 * @return integer number of products
 * @since  1.0.0
 */
function storefront_products_per_page() {
	return intval( apply_filters( 'storefront_products_per_page', 12 ) );
}

/**
 * Query WooCommerce Extension Activation.
 * @var  $extension main extension class name
 * @return boolean
 */
function is_woocommerce_extension_activated( $extension = 'WC_Bookings' ) {
	return class_exists( $extension ) ? true : false;
}

/**
 * Header for shop page
 * @since  1.0.0
 */
function shop_isle_header_shop_page( $page_title ) {

	$shop_isle_title = '<section class="module bg-dark bg-dark-60" data-background="">';
		$shop_isle_title .= '<div class="container">';

			$shop_isle_title .= '<div class="row">';

				$shop_isle_title .= '<div class="col-sm-6 col-sm-offset-3">';

					$shop_isle_title .= '<h1 class="module-title font-alt">'.$page_title.'</h1>';
				
				$shop_isle_title .= '</div>';

			$shop_isle_title .= '</div><!-- .row -->';

		$shop_isle_title .= '</div>';
	$shop_isle_title .= '</section>';
	
	return $shop_isle_title;
}

/**
 * New thumbnail size for cart page
 * @since  1.0.0
 */
function shop_isle_cart_item_thumbnail( $thumb, $cart_item, $cart_item_key ) {
	
	$product = get_product( $cart_item['product_id'] );
	return $product->get_image( 'shop_isle_cart_item_image_size' ); 
	
} 