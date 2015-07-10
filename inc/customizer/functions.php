<?php

/**
 * Theme Customizer functions
 *
 */

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since  1.0.0
 */
if ( ! function_exists( 'shop_isle_customize_preview_js' ) ) {
	function shop_isle_customize_preview_js() {
		
		wp_enqueue_script( 'shop_isle_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '', true );
		
	}
}	

/**
 * Binds JS scripts for Theme Customizer.
 *
 * @since  1.0.0
 */
if ( ! function_exists( 'shop_isle_customizer_script' ) ) { 
	function shop_isle_customizer_script() {
		
		wp_enqueue_script( 'shop_isle_customizer_script', get_template_directory_uri() . '/js/shop_isle_customizer.js', array("jquery","jquery-ui-draggable"),'', true  );
		
	}
}	

/**
 * Sanitizes a hex color. Identical to core's sanitize_hex_color(), which is not available on the wp_head hook.
 *
 * Returns either '', a 3 or 6 digit hex color (with #), or null.
 * For sanitizing values without a #, see sanitize_hex_color_no_hash().
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'shop_isle_sanitize_hex_color' ) ) {
	function shop_isle_sanitize_hex_color( $color ) {
		if ( '' === $color ) {
			return '';
        }

		// 3 or 6 hex digits, or the empty string.
		if ( preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
			return $color;
        }

		return null;
	}
}

/**
 * Sanitizes choices (selects / radios)
 * Checks that the input matches one of the available choices
 *
 * @since  1.0.0
 */
if ( ! function_exists( 'shop_isle_sanitize_choices' ) ) {
    function shop_isle_sanitize_choices( $input, $setting ) {
        global $wp_customize;

        $control = $wp_customize->get_control( $setting->id );

        if ( array_key_exists( $input, $control->choices ) ) {
            return $input;
        } else {
            return $setting->default;
        }
    }
}

/**
 * Sanitizes text
 *	
 * @since  1.0.0
 */
if ( ! function_exists( 'shop_isle_sanitize_text' ) ) { 
	function shop_isle_sanitize_text( $input ) {

		return wp_kses_post( force_balance_tags( $input ) );

	}
}	

if ( class_exists( 'WP_Customize_Control' ) ):

	/**
	 * Repeater drag and drop controler
	 *	
	 * @since  1.0.0
	 */
	class Shop_Isle_Repeater_Controler extends WP_Customize_Control {
		
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
			if( !empty($options['shop_isle_image_control']) ) {
				$shop_isle_image_control = $options['shop_isle_image_control'];
			} else {
				$shop_isle_image_control = false;
			}
			if( !empty($options['shop_isle_text_control']) ) {
				$shop_isle_text_control = $options['shop_isle_text_control'];
			} else {
				$shop_isle_text_control = false;
			}
			if( !empty($options['shop_isle_subtext_control']) ) {
				$shop_isle_subtext_control = $options['shop_isle_subtext_control'];
			} else {
				$shop_isle_subtext_control = false;
			}
			if( !empty($options['shop_isle_link_control']) ) {
				$shop_isle_link_control = $options['shop_isle_link_control'];
			} else {
				$shop_isle_link_control = false;
			}
			if( !empty($options['shop_isle_label_control']) ) {
				$shop_isle_label_control = $options['shop_isle_label_control'];
			} else {
				$shop_isle_label_control = false;
			}
			
			if( !empty($options['shop_isle_box_label']) ) {
				$shop_isle_box_label = $options['shop_isle_box_label'];
			} else {
				$shop_isle_box_label = __('Slide','shop-isle');	
			}
			
			if( !empty($options['shop_isle_box_add_label']) ) {
				$shop_isle_box_add_label = $options['shop_isle_box_add_label'];
			} else {
				$shop_isle_box_add_label = __('Add new slide','shop-isle');
			}
	 ?>
				
			<div class="shop_isle_general_control_repeater shop_isle_general_control_droppable">
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<?php 
						if(empty($json)) {
					?>
							<div class="shop_isle_general_control_repeater_container">
								<div class="shop-isle-customize-control-title"><?php echo $shop_isle_box_label; ?></div>
								<label>
									<?php 
										if($shop_isle_image_control ==true){ ?>
											<span class="customize-control-title"><?php _e('Image','shop-isle'); ?></span>
											<p class="shop_isle_image_control">
												<input type="text" class="widefat custom_media_url">
												<input type="button" class="button button-primary custom_media_button_shop_isle" value="<?php _e('Upload Image','shop-isle'); ?>" />
											</p>
									<?php 
										} 
							
										if($shop_isle_text_control==true){ ?>
											<span class="customize-control-title"><?php _e('Title','shop-isle'); ?></span>
											<input type="text" class="shop_isle_text_control" placeholder="<?php _e('Title','shop-isle'); ?>"/>
									<?php 
										}
									
										if($shop_isle_subtext_control==true){ ?>
											<span class="customize-control-title"><?php _e('Subtitle','shop-isle'); ?></span>
											<input type="text" value="<?php if(!empty($icon->subtext)) {echo esc_attr($icon->subtext);} ?>" class="shop_isle_subtext_control" placeholder="<?php _e('Subtitle','shop-isle'); ?>"/>
									<?php }
	
										if($shop_isle_label_control==true){ ?>
											<span class="customize-control-title"><?php _e('Button Label','shop-isle'); ?></span>
											<input type="text" value="<?php if(!empty($icon->label)) echo esc_attr($icon->label); ?>" class="shop_isle_label_control" placeholder="<?php _e('Button Label','shop-isle'); ?>"/>
									<?php } 
									
										if($shop_isle_link_control==true){ ?>
											<span class="customize-control-title"><?php _e('Button Link','shop-isle'); ?></span>
											<input type="text" class="shop_isle_link_control" placeholder="<?php _e('Button Link','shop-isle'); ?>"/>
									<?php } ?>
								<button type="button" class="shop_isle_general_control_remove_field button" style="display:none;"><?php _e('Delete field','shop-isle'); ?></button>
								</label>
							</div>
					<?php
						} else {
							if ( !empty($this_default) && empty($json)) {
								foreach($this_default as $icon){
					?>
									<div class="shop_isle_general_control_repeater_container shop_isle_draggable">
										<div class="shop-isle-customize-control-title"><?php echo $shop_isle_box_label; ?></div>
										<label>
											<?php	if($shop_isle_image_control==true){ ?>
														<span class="customize-control-title"><?php _e('Image','shop-isle'); ?></span>
														<p class="shop_isle_image_control">
															<input type="text" class="widefat custom_media_url" value="<?php if(!empty($icon->image_url)) {echo esc_attr($icon->image_url);} ?>">
															<input type="button" class="button button-primary custom_media_button_shop_isle" value="<?php _e('Upload Image','shop-isle'); ?>" />
														</p>
											<?php	}
				
													if($shop_isle_text_control==true){ ?>
														<span class="customize-control-title"><?php _e('Title','shop-isle'); ?></span>
														<input type="text" value="<?php if(!empty($icon->text)) {echo esc_attr($icon->text);} ?>" class="shop_isle_text_control" placeholder="<?php _e('Title','shop-isle'); ?>"/>
											<?php	}
											
													if($shop_isle_subtext_control==true){?>
														<span class="customize-control-title"><?php _e('Subtitle','shop-isle'); ?></span>
														<input type="text" value="<?php if(!empty($icon->subtext)) {echo esc_attr($icon->subtext);} ?>" class="shop_isle_subtext_control" placeholder="<?php _e('Subtitle','shop-isle'); ?>"/>
												<?php }
									
													if($shop_isle_label_control==true){ ?>
														<span class="customize-control-title"><?php _e('Button Label','shop-isle'); ?></span>
														<input type="text" value="<?php if(!empty($icon->label)) echo esc_attr($icon->label); ?>" class="shop_isle_label_control" placeholder="<?php _e('Button Label','shop-isle'); ?>"/>
												<?php } 
												
													if($shop_isle_link_control){ ?>
														<span class="customize-control-title"><?php _e('Button Link','shop-isle'); ?></span>
														<input type="text" value="<?php if(!empty($icon->link)) echo esc_url($icon->link); ?>" class="shop_isle_link_control" placeholder="<?php _e('Button Link','shop-isle'); ?>"/>
											<?php	} ?>
										<button type="button" class="shop_isle_general_control_remove_field button" <?php if ($it == 0) echo 'style="display:none;"'; ?>><?php _e('Delete field','shop-isle'); ?></button>
										</label>								

									</div>

					<?php
									$it++;
								}
							} else {
								foreach($json as $icon){
						?>
									<div class="shop_isle_general_control_repeater_container shop_isle_draggable">
										<div class="shop-isle-customize-control-title"><?php echo $shop_isle_box_label; ?></div>
										<label>
										<?php 
											if($shop_isle_image_control == true){ ?>
												<span class="customize-control-title"><?php _e('Image','shop-isle'); ?></span>
												<p class="shop_isle_image_control">
													<input type="text" class="widefat custom_media_url" value="<?php if(!empty($icon->image_url)) {echo esc_attr($icon->image_url);} ?>">
													<input type="button" class="button button-primary custom_media_button_shop_isle" value="<?php _e('Upload Image','shop-isle'); ?>" />
												</p>
										<?php }
											
											if($shop_isle_text_control==true ){?>
												<span class="customize-control-title"><?php _e('Title','shop-isle'); ?></span>
												<input type="text" value="<?php if(!empty($icon->text)) {echo esc_attr($icon->text);} ?>" class="shop_isle_text_control" placeholder="<?php _e('Title','shop-isle'); ?>"/>
											<?php }
											
											if($shop_isle_subtext_control==true){?>
												<span class="customize-control-title"><?php _e('Subtitle','shop-isle'); ?></span>
												<input type="text" value="<?php if(!empty($icon->subtext)) {echo esc_attr($icon->subtext);} ?>" class="shop_isle_subtext_control" placeholder="<?php _e('Subtitle','shop-isle'); ?>"/>
										<?php }
											
											if($shop_isle_label_control==true){ ?>
												<span class="customize-control-title"><?php _e('Button Label','shop-isle'); ?></span>
												<input type="text" value="<?php if(!empty($icon->label)) echo esc_attr($icon->label); ?>" class="shop_isle_label_control" placeholder="<?php _e('Button Label','shop-isle'); ?>"/>
									<?php } 
									
											if($shop_isle_link_control){ ?>
												<span class="customize-control-title"><?php _e('Button Link','shop-isle'); ?></span>
												<input type="text" value="<?php if(!empty($icon->link)) echo esc_url($icon->link); ?>" class="shop_isle_link_control" placeholder="<?php _e('Button Link','shop-isle'); ?>"/>
											<?php } ?>
										
											<button type="button" class="shop_isle_general_control_remove_field button" <?php if ($it == 0) echo 'style="display:none;"'; ?>><?php _e('Delete field','shop-isle'); ?></button>
										</label>								

									</div>
						<?php
									$it++;
								}
							}
						}
					
					if ( !empty($this_default) && empty($json)) {	?>
						<input type="hidden" id="shop_isle_<?php echo $options['section']; ?>_repeater_colector" <?php $this->link(); ?> class="shop_isle_repeater_colector" value="<?php echo esc_textarea( $this_default ); ?>" />
				<?php } else {	?>
						<input type="hidden" id="shop_isle_<?php echo $options['section']; ?>_repeater_colector" <?php $this->link(); ?> class="shop_isle_repeater_colector" value="<?php echo esc_textarea( $this->value() ); ?>" />
				<?php } ?>
				</div>

				<button type="button" class="button add_field shop_isle_general_control_new_field"><?php echo $shop_isle_box_add_label; ?></button>

				<?php
			
		}
									 
	}
	
endif;