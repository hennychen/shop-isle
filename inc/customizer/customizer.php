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
	
	$fields[] = array(
		 'type'        => 'sortable',
		'setting'     => 'sortable_demo',
		'label'       => __( 'This is the label', 'kirki' ),
		'description' => __( 'This is the control description', 'kirki' ),
		'help'        => __( 'This is some extra help text.', 'kirki' ),
		'section'     => 'shop_isle_header_section',
		'default'     => array(
			'option3',
			'option1',
			'option4'
		),
		'choices'     => array(
			'option1' => __( 'Option 1', 'kirki' ),
			'option2' => __( 'Option 2', 'kirki' ),
			'option3' => __( 'Option 3', 'kirki' ),
			'option4' => __( 'Option 4', 'kirki' ),
			'option5' => __( 'Option 5', 'kirki' ),
			'option6' => __( 'Option 6', 'kirki' ),
		),
		'priority'    => 10,

	);
	
	$fields[] = array(
		'id'          => 'opt-slides',
    'type'        => 'slides',
    'title'       => __('Slides Options', 'redux-framework-demo'),
    'subtitle'    => __('Unlimited slides with drag and drop sortings.', 'redux-framework-demo'),
    'desc'        => __('This field will store all slides values into a multidimensional array to use into a foreach loop.', 'redux-framework-demo'),
	'section'     => 'shop_isle_header_section',
    'placeholder' => array(
        'title'           => __('This is a title', 'redux-framework-demo'),
        'description'     => __('Description Here', 'redux-framework-demo'),
        'url'             => __('Give us a link!', 'redux-framework-demo'),
    ),

	);


    return $fields;

}
add_filter( 'kirki/fields', 'shop_isle_kirki_fields' );