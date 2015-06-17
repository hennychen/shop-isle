<?php
/**
 * @package storefront
 */
?>

<?php
	/**
	 * @hooked storefront_post_header - 10
	 * @hooked storefront_post_meta - 20
	 * @hooked storefront_post_content - 30
	 */
	do_action( 'storefront_single_post' );
	?>

