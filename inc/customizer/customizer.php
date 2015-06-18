<?php

/**
 *
 * Customizer
 *
 */

function shop_isle_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';

	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->remove_section('colors');
	

		
	
}

//add_action( 'customize_register', 'shop_isle_customize_register' );