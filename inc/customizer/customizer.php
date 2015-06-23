<?php

/**
 *
 * Customizer
 *
 */
 
function shop_isle_customizer_config() {

	$args = array(

		/* Change the logo image. (URL)
		 If omitted, the default theme info will be displayed.
		 A good size for the logo is 250x50.*/
		'logo_image'   => get_template_directory_uri() . '/assets/images/logo.png',

		/* If Kirki is embedded in your theme, then you can use this line to specify its location.
		 This will be used to properly enqueue the necessary stylesheets and scripts.*/
		'url_path'     => get_template_directory_uri() . '/kirki/'

	);

	return $args;

}
add_filter( 'kirki/config', 'shop_isle_customizer_config' );

function shop_isle_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';

	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	//$wp_customize->remove_section('colors');
	
	/* Header */
	$wp_customize->add_section( 'shop_isle_header_section', array(
        'title'    => __( 'Header', 'shop-isle' ),
        'priority' => 40
    ) );
	
	/* Footer */
	$wp_customize->add_section( 'shop_isle_footer_section', array(
        'title'    => __( 'Footer', 'shop-isle' ),
        'priority' => 50
    ) );
	
	/* Frontpage */
	if ( class_exists( 'WP_Customize_Panel' ) ):
	
		$wp_customize->add_panel( 'panel_frontpage', array(
			'priority' => 41,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Frontpage', 'shop-isle' )
		) );
		
		$wp_customize->add_section( 'shop_isle_products_slider_section' , array(
					'title'       => __( 'Products slider section', 'shop-isle' ),
					'priority'    => 1,
					'panel' => 'panel_frontpage'
		));
	
	else:
	
		$wp_customize->add_section( 'shop_isle_products_slider_section' , array(
					'title'       => __( 'Products slider section', 'shop-isle' ),
					'priority'    => 1
		));
	
	endif;
		
	
}

add_action( 'customize_register', 'shop_isle_customize_register' );

function shop_isle_kirki_fields( $fields ) {

	/* Logo */
    $fields[] = array(
		'type'        => 'image',
		'setting'     => 'shop_isle_logo',
		'label'       => __( 'Logo', 'shop-isle' ),
		'section'     => 'shop_isle_header_section',
		'priority'    => 1,
    );
	
	/* Copyright */
    $fields[] = array(
		'type'        => 'text',
		'setting'     => 'shop_isle_copyright',
		'label'       => __( 'Copyright', 'shop-isle' ),
		'section'     => 'shop_isle_footer_section',
		'default'     => __( '&copy; Themeisle, All rights reserved', 'shop-isle' ),
		'priority'    => 1,
    );
	
	$shop_isle_prod_categories_array = array();

	$shop_isle_prod_categories = get_categories( array('taxonomy' => 'product_cat', 'hide_empty' => 0, 'title_li' => '') );

	if( !empty($shop_isle_prod_categories) ):
		foreach ($shop_isle_prod_categories as $shop_isle_prod_cat):
		
			if( !empty($shop_isle_prod_cat->term_id) && !empty($shop_isle_prod_cat->name) ):
				$shop_isle_prod_categories_array[$shop_isle_prod_cat->term_id] = $shop_isle_prod_cat->name;
			endif;	
				
		endforeach;
	endif;
	
	$fields[] = array(
		'type'        => 'select',
		'setting'     => 'shop_isle_products_slider_category',
		'label'       => __( 'Products category', 'shop-isle' ),
		'help'        => __( 'Products will be selected from this category', 'shop-isle' ),
		'section'     => 'shop_isle_products_slider_section',
		'priority'    => 1,
		'choices'     => $shop_isle_prod_categories_array
		
	);	


    return $fields;

}
add_filter( 'kirki/fields', 'shop_isle_kirki_fields' );