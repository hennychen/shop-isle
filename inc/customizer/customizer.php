<?php

/**
 *
 * Customizer
 *
 */
 
if ( class_exists( 'WP_Customize_Control' ) ):

	class Shop_Isle_Slider_Repeater extends WP_Customize_Control {
		
			private $options = array();
		
			public function __construct( $manager, $id, $args = array() ) {
				parent::__construct( $manager, $id, $args );
				$this->options = $args;
			}
			public function render_content() {
				
				$this_default = json_decode($this->setting->default);
				
				$values = $this->value();
				$json = json_decode($values);
				if(!is_array($json)) $json = array($values);
				$it = 0;
									 
				$options = $this->options;
				if(!empty($options['shop_isle_image_control'])){
					$shop_isle_image_control = $options['shop_isle_image_control'];
				} else {
					$shop_isle_image_control = false;
				}
				if(!empty($options['shop_isle_text_control'])){
					$shop_isle_text_control = $options['shop_isle_text_control'];
				} else {
					$shop_isle_text_control = false;
				}
				if(!empty($options['shop_isle_subtext_control'])){
					$shop_isle_subtext_control = $options['shop_isle_subtext_control'];
				} else {
					$shop_isle_subtext_control = false;
				}
				if(!empty($options['shop_isle_link_control'])){
					$shop_isle_link_control = $options['shop_isle_link_control'];
				} else {
					$shop_isle_link_control = false;
				}
				if(!empty($options['shop_isle_label_control'])){
					$shop_isle_label_control = $options['shop_isle_label_control'];
				} else {
					$shop_isle_label_control = false;
				}
	 ?>
				
				<div class="parallax_one_general_control_repeater parallax_one_general_control_droppable">
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<?php 
						if(empty($json)) {
					?>
							<div class="parallax_one_general_control_repeater_container">
								<div class="parallax-customize-control-title"><?php _e('Slide','shop-isle')?></div>
								<label>
									<?php 
										if($shop_isle_image_control ==true){ ?>
											<span class="customize-control-title"><?php _e('Image','shop-isle')?></span>
											<p class="parallax_one_image_control">
												<input type="text" class="widefat custom_media_url">
												<input type="button" class="button button-primary custom_media_button_parallax_one" value="<?php _e('Upload Image','shop-isle'); ?>" />
											</p>
									<?php 
										} 
							
										if($shop_isle_text_control==true){ ?>
											<span class="customize-control-title"><?php _e('Title','shop-isle')?></span>
											<input type="text" class="parallax_one_text_control" placeholder="<?php _e('Title','shop-isle'); ?>"/>
									<?php 
										}
									
										if($shop_isle_subtext_control==true){ ?>
											<span class="customize-control-title"><?php _e('Subtitle','shop-isle')?></span>
											<input type="text" value="<?php if(!empty($icon->subtext)) {echo esc_attr($icon->subtext);} ?>" class="parallax_one_subtext_control" placeholder="<?php _e('Subtitle','shop-isle'); ?>"/>
									<?php }
	
										if($shop_isle_label_control==true){ ?>
											<span class="customize-control-title"><?php _e('Button Label','shop-isle')?></span>
											<input type="text" value="<?php if(!empty($icon->label)) echo esc_attr($icon->label); ?>" class="parallax_one_label_control" placeholder="<?php _e('Button Label','shop-isle'); ?>"/>
									<?php } 
									
										if($shop_isle_link_control==true){ ?>
											<span class="customize-control-title"><?php _e('Button Link','shop-isle')?></span>
											<input type="text" class="parallax_one_link_control" placeholder="<?php _e('Button Link','shop-isle'); ?>"/>
									<?php } ?>
								<button type="button" class="parallax_one_general_control_remove_field button" style="display:none;"><?php _e('Delete field','shop-isle'); ?></button>
								</label>
							</div>
					<?php
						} else {
							if ( !empty($this_default) && empty($json)) {
								foreach($this_default as $icon){
					?>
									<div class="parallax_one_general_control_repeater_container parallax_one_draggable">
										<div class="parallax-customize-control-title"><?php _e('Slide','shop-isle')?></div>
										<label>
											<?php	if($shop_isle_image_control==true){ ?>
														<span class="customize-control-title"><?php _e('Image','shop-isle')?></span>
														<p class="parallax_one_image_control">
															<input type="text" class="widefat custom_media_url" value="<?php if(!empty($icon->image_url)) {echo esc_attr($icon->image_url);} ?>">
															<input type="button" class="button button-primary custom_media_button_parallax_one" value="<?php _e('Upload Image','shop-isle'); ?>" />
														</p>
											<?php	}
				
													if($shop_isle_text_control==true){ ?>
														<span class="customize-control-title"><?php _e('Title','shop-isle')?></span>
														<input type="text" value="<?php if(!empty($icon->text)) {echo esc_attr($icon->text);} ?>" class="parallax_one_text_control" placeholder="<?php _e('Title','shop-isle'); ?>"/>
											<?php	}
											
													if($shop_isle_subtext_control==true){?>
														<span class="customize-control-title"><?php _e('Subtitle','shop-isle')?></span>
														<input type="text" value="<?php if(!empty($icon->subtext)) {echo esc_attr($icon->subtext);} ?>" class="parallax_one_subtext_control" placeholder="<?php _e('Subtitle','shop-isle'); ?>"/>
												<?php }
									
													if($shop_isle_label_control==true){ ?>
														<span class="customize-control-title"><?php _e('Button Label','shop-isle')?></span>
														<input type="text" value="<?php if(!empty($icon->label)) echo esc_attr($icon->label); ?>" class="parallax_one_label_control" placeholder="<?php _e('Button Label','shop-isle'); ?>"/>
												<?php } 
												
													if($shop_isle_link_control){ ?>
														<span class="customize-control-title"><?php _e('Button Link','shop-isle')?></span>
														<input type="text" value="<?php if(!empty($icon->link)) echo esc_url($icon->link); ?>" class="parallax_one_link_control" placeholder="<?php _e('Button Link','shop-isle'); ?>"/>
											<?php	} ?>
										<button type="button" class="parallax_one_general_control_remove_field button" <?php if ($it == 0) echo 'style="display:none;"'; ?>><?php _e('Delete field','shop-isle'); ?></button>
										</label>								

									</div>

					<?php
									$it++;
								}
							} else {
								foreach($json as $icon){
						?>
									<div class="parallax_one_general_control_repeater_container parallax_one_draggable">
										<div class="parallax-customize-control-title"><?php _e('Slide','shop-isle')?></div>
										<label>
										<?php 
											if($shop_isle_image_control == true){ ?>
												<span class="customize-control-title"><?php _e('Image','shop-isle')?></span>
												<p class="parallax_one_image_control">
													<input type="text" class="widefat custom_media_url" value="<?php if(!empty($icon->image_url)) {echo esc_attr($icon->image_url);} ?>">
													<input type="button" class="button button-primary custom_media_button_parallax_one" value="<?php _e('Upload Image','shop-isle'); ?>" />
												</p>
										<?php }
											
											if($shop_isle_text_control==true ){?>
												<span class="customize-control-title"><?php _e('Title','shop-isle')?></span>
												<input type="text" value="<?php if(!empty($icon->text)) {echo esc_attr($icon->text);} ?>" class="parallax_one_text_control" placeholder="<?php _e('Title','shop-isle'); ?>"/>
											<?php }
											
											if($shop_isle_subtext_control==true){?>
												<span class="customize-control-title"><?php _e('Subtitle','shop-isle')?></span>
												<input type="text" value="<?php if(!empty($icon->subtext)) {echo esc_attr($icon->subtext);} ?>" class="parallax_one_subtext_control" placeholder="<?php _e('Subtitle','shop-isle'); ?>"/>
										<?php }
											
											if($shop_isle_label_control==true){ ?>
												<span class="customize-control-title"><?php _e('Button Label','shop-isle')?></span>
												<input type="text" value="<?php if(!empty($icon->label)) echo esc_attr($icon->label); ?>" class="parallax_one_label_control" placeholder="<?php _e('Button Label','shop-isle'); ?>"/>
									<?php } 
									
											if($shop_isle_link_control){ ?>
												<span class="customize-control-title"><?php _e('Button Link','shop-isle')?></span>
												<input type="text" value="<?php if(!empty($icon->link)) echo esc_url($icon->link); ?>" class="parallax_one_link_control" placeholder="<?php _e('Button Link','shop-isle'); ?>"/>
											<?php } ?>
										
											<button type="button" class="parallax_one_general_control_remove_field button" <?php if ($it == 0) echo 'style="display:none;"'; ?>><?php _e('Delete field','shop-isle'); ?></button>
										</label>								

									</div>
						<?php
									$it++;
								}
							}
						}
					
					if ( !empty($this_default) && empty($json)) {	?>
						<input type="hidden" id="parallax_one_<?php echo $options['section']; ?>_repeater_colector" <?php $this->link(); ?> class="parallax_one_repeater_colector" value="<?php echo esc_textarea( $this_default ); ?>" />
				<?php } else {	?>
						<input type="hidden" id="parallax_one_<?php echo $options['section']; ?>_repeater_colector" <?php $this->link(); ?> class="parallax_one_repeater_colector" value="<?php echo esc_textarea( $this->value() ); ?>" />
				<?php } ?>
				</div>

				<button type="button" class="button add_field parallax_one_general_control_new_field"><?php _e('Add new slide','shop-isle'); ?></button>

				<?php
			
		}
									 
	}
	
	class Shop_Isle_Banners_Repeater extends WP_Customize_Control {
		
			private $options = array();
		
			public function __construct( $manager, $id, $args = array() ) {
				parent::__construct( $manager, $id, $args );
				$this->options = $args;
			}
			public function render_content() {
				
				$this_default = json_decode($this->setting->default);
				
				$values = $this->value();
				$json = json_decode($values);
				if(!is_array($json)) $json = array($values);
				$it = 0;
									 
				$options = $this->options;
				if(!empty($options['shop_isle_image_control'])){
					$shop_isle_image_control = $options['shop_isle_image_control'];
				} else {
					$shop_isle_image_control = false;
				}
				if(!empty($options['shop_isle_link_control'])){
					$shop_isle_link_control = $options['shop_isle_link_control'];
				} else {
					$shop_isle_link_control = false;
				}
				
	 ?>
				
				<div class="parallax_one_general_control_repeater parallax_one_general_control_droppable">
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<?php 
						if(empty($json)) {
					?>
							<div class="parallax_one_general_control_repeater_container">
								<div class="parallax-customize-control-title"><?php _e('Banner','shop-isle')?></div>
								<label>
									<?php 
										if($shop_isle_image_control ==true){ ?>
											<span class="customize-control-title"><?php _e('Image','shop-isle')?></span>
											<p class="parallax_one_image_control">
												<input type="text" class="widefat custom_media_url">
												<input type="button" class="button button-primary custom_media_button_parallax_one" value="<?php _e('Upload Image','shop-isle'); ?>" />
											</p>
									<?php 
										}
										
										if($shop_isle_link_control==true){ ?>
											<span class="customize-control-title"><?php _e('Link','shop-isle')?></span>
											<input type="text" class="parallax_one_link_control" placeholder="<?php _e('Link','shop-isle'); ?>"/>
									<?php } ?>
								<button type="button" class="parallax_one_general_control_remove_field button" style="display:none;"><?php _e('Delete field','shop-isle'); ?></button>
								</label>
							</div>
					<?php
						} else {
							if ( !empty($this_default) && empty($json)) {
								foreach($this_default as $icon){
					?>
									<div class="parallax_one_general_control_repeater_container parallax_one_draggable">
										<div class="parallax-customize-control-title"><?php _e('Banner','shop-isle')?></div>
										<label>
											<?php	if($shop_isle_image_control==true){ ?>
														<span class="customize-control-title"><?php _e('Image','shop-isle')?></span>
														<p class="parallax_one_image_control">
															<input type="text" class="widefat custom_media_url" value="<?php if(!empty($icon->image_url)) {echo esc_attr($icon->image_url);} ?>">
															<input type="button" class="button button-primary custom_media_button_parallax_one" value="<?php _e('Upload Image','shop-isle'); ?>" />
														</p>
											<?php	}
				
													if($shop_isle_link_control){ ?>
														<span class="customize-control-title"><?php _e('Link','shop-isle')?></span>
														<input type="text" value="<?php if(!empty($icon->link)) echo esc_url($icon->link); ?>" class="parallax_one_link_control" placeholder="<?php _e('Link','shop-isle'); ?>"/>
											<?php	} ?>
										<button type="button" class="parallax_one_general_control_remove_field button" <?php if ($it == 0) echo 'style="display:none;"'; ?>><?php _e('Delete field','shop-isle'); ?></button>
										</label>								

									</div>

					<?php
									$it++;
								}
							} else {
								foreach($json as $icon){
						?>
									<div class="parallax_one_general_control_repeater_container parallax_one_draggable">
										<div class="parallax-customize-control-title"><?php _e('Slide','shop-isle')?></div>
										<label>
										<?php 
											if($shop_isle_image_control == true){ ?>
												<span class="customize-control-title"><?php _e('Image','shop-isle')?></span>
												<p class="parallax_one_image_control">
													<input type="text" class="widefat custom_media_url" value="<?php if(!empty($icon->image_url)) {echo esc_attr($icon->image_url);} ?>">
													<input type="button" class="button button-primary custom_media_button_parallax_one" value="<?php _e('Upload Image','shop-isle'); ?>" />
												</p>
										<?php }
									
											if($shop_isle_link_control){ ?>
												<span class="customize-control-title"><?php _e('Link','shop-isle')?></span>
												<input type="text" value="<?php if(!empty($icon->link)) echo esc_url($icon->link); ?>" class="parallax_one_link_control" placeholder="<?php _e('Link','shop-isle'); ?>"/>
											<?php } ?>
										
											<button type="button" class="parallax_one_general_control_remove_field button" <?php if ($it == 0) echo 'style="display:none;"'; ?>><?php _e('Delete field','shop-isle'); ?></button>
										</label>								

									</div>
						<?php
									$it++;
								}
							}
						}
					
					if ( !empty($this_default) && empty($json)) {	?>
						<input type="hidden" id="parallax_one_<?php echo $options['section']; ?>_repeater_colector" <?php $this->link(); ?> class="parallax_one_repeater_colector" value="<?php echo esc_textarea( $this_default ); ?>" />
				<?php } else {	?>
						<input type="hidden" id="parallax_one_<?php echo $options['section']; ?>_repeater_colector" <?php $this->link(); ?> class="parallax_one_repeater_colector" value="<?php echo esc_textarea( $this->value() ); ?>" />
				<?php } ?>
				</div>

				<button type="button" class="button add_field parallax_one_general_control_new_field"><?php _e('Add new banner','shop-isle'); ?></button>

				<?php
			
		}
									 
	}
endif;
	
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
	
	/* Logo */
	$wp_customize->add_setting( 'shop_isle_logo');

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'shop_isle_logo', array(
		'label'    => __( 'Logo', 'shop-isle' ),
		'section'  => 'shop_isle_header_section',
		'settings' => 'shop_isle_logo',
		'priority'    => 1,
	)));
	
	/* Footer */
	$wp_customize->add_section( 'shop_isle_footer_section', array(
        'title'    => __( 'Footer', 'shop-isle' ),
        'priority' => 50
    ) );
	
	/* Copyright */
	$wp_customize->add_setting( 'shop_isle_copyright', array('sanitize_callback' => 'shop_isle_sanitize_text', 'default' => __( '&copy; Themeisle, All rights reserved', 'shop-isle' )));

	$wp_customize->add_control( 'shop_isle_copyright', array(
		'label'    => __( 'Copyright', 'shop-isle' ),
		'section'  => 'shop_isle_footer_section',
		'settings' => 'shop_isle_copyright',
		'priority'    => 1,
	));
	
	/* Slider */
	$wp_customize->add_section( 'shop_isle_slider_section' , array(
		'title'       => __( 'Slider section', 'shop-isle' ),
		'priority'    => 41
	));
	
	$wp_customize->add_setting( 'shop_isle_slider', array(
		'sanitize_callback' => 'shop_isle_sanitize_text',
		'default' => json_encode(array( array("image_url" => get_template_directory_uri().'/assets/images/slide1.jpg' ,"link" => "#", "text" => "ShopIsle", "subtext" => "WooCommerce Theme", "label" => "FIND OUT MORE" ),array("image_url" => get_template_directory_uri().'/assets/images/slide2.jpg' ,"link" => "#", "text" => "ShopIsle", "subtext" => "Hight quality store" , "label" => "FIND OUT MORE"),array("image_url" => get_template_directory_uri().'/assets/images/slide3.jpg' ,"link" => "#", "text" => "ShopIsle", "subtext" => "Responsive Theme" , "label" => "FIND OUT MORE") ))
	));
	$wp_customize->add_control( new Shop_Isle_Slider_Repeater( $wp_customize, 'shop_isle_slider', array(
		'label'   => __('Add new slide','shop-isle'),
		'section' => 'shop_isle_slider_section',
		'settings' => 'shop_isle_slider',
		'active_callback' => 'is_front_page',
		'priority' => 1,
        'shop_isle_image_control' => true,
        'shop_isle_text_control' => true,
        'shop_isle_link_control' => true,
		'shop_isle_subtext_control' => true,
		'shop_isle_label_control' => true
	) ) );
	
	/* Banners */
	$wp_customize->add_section( 'shop_isle_banners_section' , array(
		'title'       => __( 'Banners section', 'shop-isle' ),
		'priority'    => 42
	));
	
	$wp_customize->add_setting( 'shop_isle_banner', array(
		'sanitize_callback' => 'shop_isle_sanitize_text',
		'default' => json_encode(array( array("image_url" => get_template_directory_uri().'/assets/images/banner1.jpg' ,"link" => "#" ),array("image_url" => get_template_directory_uri().'/assets/images/banner2.jpg' ,"link" => "#"),array("image_url" => get_template_directory_uri().'/assets/images/banner3.jpg' ,"link" => "#") ))
	));
	$wp_customize->add_control( new Shop_Isle_Slider_Repeater( $wp_customize, 'shop_isle_banner', array(
		'label'   => __('Add new banner','shop-isle'),
		'section' => 'shop_isle_banners_section',
		'settings' => 'shop_isle_banner',
		'active_callback' => 'is_front_page',
		'priority' => 1,
        'shop_isle_image_control' => true,
        'shop_isle_link_control' => true

	) ) );
	
	
	/* Products slider */
	$wp_customize->add_section( 'shop_isle_products_slider_section' , array(
		'title'       => __( 'Products slider section', 'shop-isle' ),
		'priority'    => 43
	));
	
	$shop_isle_prod_categories_array = array();

	$shop_isle_prod_categories = get_categories( array('taxonomy' => 'product_cat', 'hide_empty' => 0, 'title_li' => '') );

	if( !empty($shop_isle_prod_categories) ):
		foreach ($shop_isle_prod_categories as $shop_isle_prod_cat):
		
			if( !empty($shop_isle_prod_cat->term_id) && !empty($shop_isle_prod_cat->name) ):
				$shop_isle_prod_categories_array[$shop_isle_prod_cat->term_id] = $shop_isle_prod_cat->name;
			endif;	
				
		endforeach;
	endif;
		
	$wp_customize->add_setting(
		'shop_isle_products_slider_category'
	);
	$wp_customize->add_control(
		'shop_isle_products_slider_category',
		array(
			'type' 		=> 'select',
			'label' 	=> __( 'Products category', 'shop-isle' ),
			'section' 	=> 'shop_isle_products_slider_section',
			'choices' 	=> $shop_isle_prod_categories_array,
			'priority' 	=> 1,
		)
	);	
	
}

add_action( 'customize_register', 'shop_isle_customize_register' );

function shop_isle_sanitize_text( $input ) {

    return wp_kses_post( force_balance_tags( $input ) );

}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function shop_isle_customize_preview_js() {
	wp_enqueue_script( 'shop_isle_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'shop_isle_customize_preview_js' );

function shop_isle_customizer_script() {	
	wp_enqueue_script( 'shop_isle_customizer_script', get_template_directory_uri() . '/js/shop_isle_customizer.js', array("jquery","jquery-ui-draggable"),'', true  );
}
add_action( 'customize_controls_enqueue_scripts', 'shop_isle_customizer_script' );