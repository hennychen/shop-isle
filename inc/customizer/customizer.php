<?php

/**
 *
 * Customizer
 *
 */

/**
 * Register settings and controls for customize
 *
 * @since  1.0.0
 */ 
function shop_isle_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';

	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	/******************************/
	/**********  Header ***********/
	/******************************/
	
	$wp_customize->add_section( 'shop_isle_header_section', array(
        'title'    => __( 'Header', 'shop-isle' ),
        'priority' => 40
    ) );
	
	/* Logo */
	$wp_customize->add_setting( 'shop_isle_logo');

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'shop_isle_logo', array(
		'label'    => __( 'Logo', 'shop-isle' ),
		'section'  => 'shop_isle_header_section',
		'settings' => 'shop_isle_logo',
		'priority'    => 1,
	)));
	
	/*******************************/
	/******    Slider section ******/
	/*******************************/
	
	$wp_customize->add_section( 'shop_isle_slider_section' , array(
		'title'       => __( 'Slider section', 'shop-isle' ),
		'priority'    => 41
	));
	
	/* Hide slider */
	$wp_customize->add_setting( 'shop_isle_slider_hide');

	$wp_customize->add_control(
		'shop_isle_slider_hide',
		array(
			'type' => 'checkbox',
			'label' => __('Hide slider section?','shop-isle'),
			'description' => __('If you check this box, the Slider section will disappear from homepage.','shop-isle'),
			'section' => 'shop_isle_slider_section',
			'priority'    => 1,
		)
	);
	
	/* Slider */
	$wp_customize->add_setting( 'shop_isle_slider', array( 'sanitize_callback' => '',
		'default' => json_encode(array( array('image_url' => get_template_directory_uri().'/assets/images/slide1.jpg' ,'link' => '#', 'text' => __('ShopIsle','shop-isle'), 'subtext' => __('WooCommerce Theme','shop-isle'), 'label' => __('FIND OUT MORE','shop-isle') ), array('image_url' => get_template_directory_uri().'/assets/images/slide2.jpg' ,'link' => '#', 'text' => __('ShopIsle','shop-isle'), 'subtext' => __('Hight quality store','shop-isle') , 'label' => __('FIND OUT MORE','shop-isle')), array('image_url' => get_template_directory_uri().'/assets/images/slide3.jpg' ,'link' => '#', 'text' => __('ShopIsle','shop-isle'), 'subtext' => __('Responsive Theme','shop-isle') , 'label' => __('FIND OUT MORE','shop-isle') ))))
	);
	
	$wp_customize->add_control( new Shop_Isle_Slider_Repeater( $wp_customize, 'shop_isle_slider', array(
		'label'   => __('Add new slide','shop-isle'),
		'section' => 'shop_isle_slider_section',
		'active_callback' => 'is_front_page',
		'priority' => 2,
        'shop_isle_image_control' => true,
        'shop_isle_text_control' => true,
        'shop_isle_link_control' => true,
		'shop_isle_subtext_control' => true,
		'shop_isle_label_control' => true
	) ) );
	
	/********************************/
    /*********	Banners section *****/
	/********************************/
	
	$wp_customize->add_section( 'shop_isle_banners_section' , array(
		'title'       => __( 'Banners section', 'shop-isle' ),
		'priority'    => 42
	));
	
	/* Hide banner */
	$wp_customize->add_setting( 'shop_isle_banners_hide');

	$wp_customize->add_control(
		'shop_isle_banners_hide',
		array(
			'type' => 'checkbox',
			'label' => __('Hide banners section?','shop-isle'),
			'description' => __('If you check this box, the Banners section will disappear from homepage.','shop-isle'),
			'section' => 'shop_isle_banners_section',
			'priority'    => 1,
		)
	);
	
	/* Banner */
	$wp_customize->add_setting( 'shop_isle_banner', array(
		'sanitize_callback' => '',
		'default' => json_encode(array( array('image_url' => get_template_directory_uri().'/assets/images/banner1.jpg' ,'link' => '#' ),array('image_url' => get_template_directory_uri().'/assets/images/banner2.jpg' ,'link' => '#'),array('image_url' => get_template_directory_uri().'/assets/images/banner3.jpg' ,'link' => '#') ))
	));
	$wp_customize->add_control( new Shop_Isle_Banners_Repeater( $wp_customize, 'shop_isle_banner', array(
		'label'   => __('Add new banner','shop-isle'),
		'section' => 'shop_isle_banners_section',
		'active_callback' => 'is_front_page',
		'priority' => 2,
        'shop_isle_image_control' => true,
        'shop_isle_link_control' => true,
        'shop_isle_text_control' => false,
		'shop_isle_subtext_control' => false,
		'shop_isle_label_control' => false

	) ) );
	
	
	/*********************************/
    /*******  Products section *******/
	/********************************/
	
	$wp_customize->add_section( 'shop_isle_products_section' , array(
		'title'       => __( 'Products section', 'shop-isle' ),
		'description' => __( 'If no shortcode or no category is selected , WooCommerce latest products are displaying.', 'shop-isle' ),
		'priority'    => 43
	));
	
	/* Hide products */
	$wp_customize->add_setting( 'shop_isle_products_hide');

	$wp_customize->add_control(
		'shop_isle_products_hide',
		array(
			'type' => 'checkbox',
			'label' => __('Hide products section?','shop-isle'),
			'description' => __('If you check this box, the Products section will disappear from homepage.','shop-isle'),
			'section' => 'shop_isle_products_section',
			'priority'    => 1,
		)
	);
	
	/* Title */
	$wp_customize->add_setting( 'shop_isle_products_title', array('sanitize_callback' => 'shop_isle_sanitize_text', 'default' => __( 'Latest products', 'shop-isle' )));

	$wp_customize->add_control( 'shop_isle_products_title', array(
		'label'    => __( 'Section title', 'shop-isle' ),
		'section'  => 'shop_isle_products_section',
		'priority'    => 2,
	));
	
	/* Shortcode */
	$wp_customize->add_setting( 'shop_isle_products_shortcode', array('sanitize_callback' => ''));

	$wp_customize->add_control( 'shop_isle_products_shortcode', array(
		'label'    => __( 'WooCommerce shortcode', 'shop-isle' ),
		'section'  => 'shop_isle_products_section',
		'description'  => __( 'Insert a WooCommerce shortcode', 'shop-isle' ),
		'priority'    => 3,
	));
	
	$shop_isle_prod_categories_array = array('-' => __('Select category','shop-isle'));

	$shop_isle_prod_categories = get_categories( array('taxonomy' => 'product_cat', 'hide_empty' => 0, 'title_li' => '') );

	if( !empty($shop_isle_prod_categories) ):
		foreach ($shop_isle_prod_categories as $shop_isle_prod_cat):
		
			if( !empty($shop_isle_prod_cat->term_id) && !empty($shop_isle_prod_cat->name) ):
				$shop_isle_prod_categories_array[$shop_isle_prod_cat->term_id] = $shop_isle_prod_cat->name;
			endif;	
				
		endforeach;
	endif;
	
	/* Category */	
	$wp_customize->add_setting(
		'shop_isle_products_category'
	);
	$wp_customize->add_control(
		'shop_isle_products_category',
		array(
			'type' 		   => 'select',
			'label' 	   => __( 'Products category', 'shop-isle' ),
			'description'  => __( 'OR pick a product category', 'shop-isle' ),
			'section' 	   => 'shop_isle_products_section',
			'choices'      => $shop_isle_prod_categories_array,
			'priority' 	   => 4,
		)
	);
	
	/****************************************/
	/*********** Video section **************/
	/****************************************/
	
	$wp_customize->add_section( 'shop_isle_video_section' , array(
		'title'       => __( 'Video section', 'shop-isle' ),
		'priority'    => 44
	));
	
	/* Hide video */
	$wp_customize->add_setting( 'shop_isle_video_hide');

	$wp_customize->add_control(
		'shop_isle_video_hide',
		array(
			'type' => 'checkbox',
			'label' => __('Hide video section?','shop-isle'),
			'description' => __('If you check this box, the Video section will disappear from homepage.','shop-isle'),
			'section' => 'shop_isle_video_section',
			'priority'    => 1,
		)
	);
	
	/* Title */
	$wp_customize->add_setting( 'shop_isle_video_title', array('sanitize_callback' => 'shop_isle_sanitize_text'));

	$wp_customize->add_control( 'shop_isle_video_title', array(
		'label'    => __( 'Title', 'shop-isle' ),
		'section'  => 'shop_isle_video_section',
		'priority'    => 2,
	));
	
	/* Youtube link */
	$wp_customize->add_setting( 'shop_isle_yt_link', array('sanitize_callback' => ''));

	$wp_customize->add_control( 'shop_isle_yt_link', array(
		'label'    => __( 'Youtube link', 'shop-isle' ),
		'section'  => 'shop_isle_video_section',
		'priority'    => 3,
	));
	
	/****************************************/
    /*******  Products slider section *******/
	/****************************************/
	
	$wp_customize->add_section( 'shop_isle_products_slider_section' , array(
		'title'       => __( 'Products slider section', 'shop-isle' ),
		'description' => __( 'If no category is selected , WooCommerce products from the first category found are displaying.', 'shop-isle' ),
		'priority'    => 45
	));
	
	/* Hide products slider */
	$wp_customize->add_setting( 'shop_isle_products_slider_hide');

	$wp_customize->add_control(
		'shop_isle_products_slider_hide',
		array(
			'type' => 'checkbox',
			'label' => __('Hide products slider section?','shop-isle'),
			'description' => __('If you check this box, the Products slider section will disappear from homepage.','shop-isle'),
			'section' => 'shop_isle_products_slider_section',
			'priority'    => 1,
		)
	);
	
	/* Title */
	$wp_customize->add_setting( 'shop_isle_products_slider_title', array('sanitize_callback' => 'shop_isle_sanitize_text', 'default' => __( 'Exclusive products', 'shop-isle' )));

	$wp_customize->add_control( 'shop_isle_products_slider_title', array(
		'label'    => __( 'Section title', 'shop-isle' ),
		'section'  => 'shop_isle_products_slider_section',
		'priority'    => 2,
	));
	
	/* Subtitle */
	$wp_customize->add_setting( 'shop_isle_products_slider_subtitle', array('sanitize_callback' => 'shop_isle_sanitize_text', 'default' => __( 'Special category of products', 'shop-isle' )));

	$wp_customize->add_control( 'shop_isle_products_slider_subtitle', array(
		'label'    => __( 'Section subtitle', 'shop-isle' ),
		'section'  => 'shop_isle_products_slider_section',
		'priority'    => 3,
	));
	
	/* Category */
	$wp_customize->add_setting(
		'shop_isle_products_slider_category'
	);
	$wp_customize->add_control(
		'shop_isle_products_slider_category',
		array(
			'type' 		   => 'select',
			'label' 	   => __( 'Products category', 'shop-isle' ),
			'section' 	   => 'shop_isle_products_slider_section',
			'choices'      => $shop_isle_prod_categories_array,
			'priority' 	   => 4,
		)
	);
	
	/*******************************/
    /***********  Footer ***********/
	/*******************************/
	
	$wp_customize->add_section( 'shop_isle_footer_section', array(
        'title'    => __( 'Footer', 'shop-isle' ),
        'priority' => 50
    ) );
	
	/* Copyright */
	$wp_customize->add_setting( 'shop_isle_copyright', array('sanitize_callback' => 'shop_isle_sanitize_text', 'default' => __( '&copy; Themeisle, All rights reserved', 'shop-isle' )));

	$wp_customize->add_control( 'shop_isle_copyright', array(
		'label'    => __( 'Copyright', 'shop-isle' ),
		'section'  => 'shop_isle_footer_section',
		'priority'    => 1,
	));
	
}