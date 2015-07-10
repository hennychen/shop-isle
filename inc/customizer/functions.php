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
			
			if(!empty($options['shop_isle_icon_control'])){
                $shop_isle_icon_control = $options['shop_isle_icon_control'];
				$icons_array = array( 'No Icon', 'fa-glass','fa-music','fa-search','fa-envelope-o','fa-heart', 'fa-star','fa-star-o','fa-user','fa-film','fa-th-large','fa-th','fa-th-list','fa-check','fa-times','fa-search-plus','fa-search-minus','fa-power-off','fa-signal','fa-cog','fa-trash-o','fa-home','fa-file-o','fa-clock-o','fa-road','fa-download','fa-arrow-circle-o-down','fa-arrow-circle-o-up','fa-inbox','fa-play-circle-o','fa-repeat','fa-refresh','fa-list-alt','fa-lock','fa-flag','fa-headphones','fa-volume-off','fa-volume-down','fa-volume-up','fa-qrcode','fa-barcode','fa-tag','fa-tags','fa-book','fa-bookmark','fa-print','fa-camera','fa-font' ,'fa-bold' ,'fa-italic' ,'fa-text-height' ,'fa-text-width' ,'fa-align-left' ,'fa-align-center' ,'fa-align-right' ,'fa-align-justify' ,'fa-list','fa-outdent','fa-indent','fa-video-camera','fa-picture-o','fa-pencil' ,'fa-map-marker' ,'fa-adjust' ,'fa-tint' ,'fa-pencil-square-o' ,'fa-share-square-o' ,'fa-check-square-o' ,'fa-arrows' ,'fa-step-backward' ,'fa-fast-backward' ,'fa-backward' ,'fa-play' ,'fa-pause' ,'fa-stop' ,'fa-forward' ,'fa-fast-forward' ,'fa-step-forward' ,'fa-eject' ,'fa-chevron-left' ,'fa-chevron-right' ,'fa-plus-circle' ,'fa-minus-circle' ,'fa-times-circle' ,'fa-check-circle' ,'fa-question-circle' ,'fa-info-circle' ,'fa-crosshairs' ,'fa-times-circle-o' ,'fa-check-circle-o' ,'fa-ban' ,'fa-arrow-left' ,'fa-arrow-right' ,'fa-arrow-up' ,'fa-arrow-down' ,'fa-share' ,'fa-expand' ,'fa-compress' ,'fa-plus' ,'fa-minus' ,'fa-asterisk' ,'fa-exclamation-circle' ,'fa-gift' ,'fa-leaf' ,'fa-fire' ,'fa-eye' ,'fa-eye-slash' ,'fa-exclamation-triangle' ,'fa-plane' ,'fa-calendar' ,'fa-random' ,'fa-comment' ,'fa-magnet' ,'fa-chevron-up' ,'fa-chevron-down' ,'fa-retweet' ,'fa-shopping-cart' ,'fa-folder' ,'fa-folder-open' ,'fa-arrows-v' ,'fa-arrows-h' ,'fa-bar-chart-o' ,'fa-twitter-square' ,'fa-facebook-square' ,'fa-camera-retro' ,'fa-key' ,'fa-cogs' ,'fa-comments' ,'fa-thumbs-o-up' ,'fa-thumbs-o-down' ,'fa-star-half' ,'fa-heart-o' ,'fa-sign-out' ,'fa-linkedin-square' ,'fa-thumb-tack' ,'fa-external-link' ,'fa-sign-in' ,'fa-trophy' ,'fa-github-square' ,'fa-upload' ,'fa-lemon-o' ,'fa-phone' ,'fa-square-o' ,'fa-bookmark-o' ,'fa-phone-square' ,'fa-twitter' ,'fa-facebook' ,'fa-github' ,'fa-unlock' ,'fa-credit-card' ,'fa-rss' ,'fa-hdd-o' ,'fa-bullhorn' ,'fa-bell' ,'fa-certificate' ,'fa-hand-o-right' ,'fa-hand-o-left' ,'fa-hand-o-up' ,'fa-hand-o-down' ,'fa-arrow-circle-left' ,'fa-arrow-circle-right' ,'fa-arrow-circle-up' ,'fa-arrow-circle-down' ,'fa-globe' ,'fa-wrench' ,'fa-tasks' ,'fa-filter' ,'fa-briefcase' ,'fa-arrows-alt' ,'fa-users' ,'fa-link' ,'fa-cloud' ,'fa-flask' ,'fa-scissors' ,'fa-files-o' ,'fa-paperclip' ,'fa-floppy-o' ,'fa-square' ,'fa-bars' ,'fa-list-ul' ,'fa-list-ol' ,'fa-strikethrough' ,'fa-underline' ,'fa-table' ,'fa-magic' ,'fa-truck' ,'fa-pinterest' ,'fa-pinterest-square' ,'fa-google-plus-square' ,'fa-google-plus' ,'fa-money' ,'fa-caret-down' ,'fa-caret-up' ,'fa-caret-left' ,'fa-caret-right' ,'fa-columns' ,'fa-sort' ,'fa-sort-asc' ,'fa-sort-desc','fa-envelope' ,'fa-linkedin' ,'fa-undo' ,'fa-gavel' ,'fa-tachometer' ,'fa-comment-o' ,'fa-comments-o' ,'fa-bolt' ,'fa-sitemap' ,'fa-umbrella' ,'fa-clipboard' ,'fa-lightbulb-o' ,'fa-exchange' ,'fa-cloud-download' ,'fa-cloud-upload' ,'fa-user-md' ,'fa-stethoscope' ,'fa-suitcase' ,'fa-bell-o' ,'fa-coffee' ,'fa-cutlery' ,'fa-file-text-o' ,'fa-building-o' ,'fa-hospital-o' ,'fa-ambulance' ,'fa-medkit' ,'fa-fighter-jet' ,'fa-beer' ,'fa-h-square' ,'fa-plus-square' ,'fa-angle-double-left' ,'fa-angle-double-right' ,'fa-angle-double-up' ,'fa-angle-double-down' ,'fa-angle-left' ,'fa-angle-right' ,'fa-angle-up' ,'fa-angle-down' ,'fa-desktop' ,'fa-laptop' ,'fa-tablet' ,'fa-mobile' ,'fa-circle-o' ,'fa-quote-left' ,'fa-quote-right' ,'fa-spinner' ,'fa-circle' ,'fa-reply' ,'fa-github-alt' ,'fa-folder-o' ,'fa-folder-open-o' ,'fa-smile-o' ,'fa-frown-o' ,'fa-meh-o' ,'fa-gamepad' ,'fa-keyboard-o' ,'fa-flag-o' ,'fa-flag-checkered' ,'fa-terminal' ,'fa-code' ,'fa-reply-all' ,'fa-mail-reply-all' ,'fa-star-half-o' ,'fa-location-arrow' ,'fa-crop' ,'fa-code-fork' ,'fa-chain-broken' ,'fa-question' ,'fa-info' ,'fa-exclamation' ,'fa-superscript' ,'fa-subscript' ,'fa-eraser' ,'fa-puzzle-piece' ,'fa-microphone' ,'fa-microphone-slash' ,'fa-shield' ,'fa-calendar-o' ,'fa-fire-extinguisher' ,'fa-rocket' ,'fa-maxcdn' ,'fa-chevron-circle-left' ,'fa-chevron-circle-right' ,'fa-chevron-circle-up' ,'fa-chevron-circle-down' ,'fa-html5' ,'fa-css3' ,'fa-anchor' ,'fa-unlock-alt' ,'fa-bullseye' ,'fa-ellipsis-h' ,'fa-ellipsis-v' ,'fa-rss-square' ,'fa-play-circle' ,'fa-ticket' ,'fa-minus-square' ,'fa-minus-square-o' ,'fa-level-up' ,'fa-level-down' ,'fa-check-square' ,'fa-pencil-square' ,'fa-external-link-square' ,'fa-share-square' ,'fa-compass' ,'fa-caret-square-o-down' ,'fa-caret-square-o-up' ,'fa-caret-square-o-right' ,'fa-eur' ,'fa-gbp' ,'fa-usd' ,'fa-inr' ,'fa-jpy' ,'fa-rub' ,'fa-krw' ,'fa-btc' ,'fa-file' ,'fa-file-text' ,'fa-sort-alpha-asc' ,'fa-sort-alpha-desc' ,'fa-sort-amount-asc' ,'fa-sort-amount-desc' ,'fa-sort-numeric-asc' ,'fa-sort-numeric-desc' ,'fa-thumbs-up' ,'fa-thumbs-down' ,'fa-youtube-square' ,'fa-youtube' ,'fa-xing' ,'fa-xing-square' ,'fa-youtube-play' ,'fa-dropbox' ,'fa-stack-overflow' ,'fa-instagram' ,'fa-flickr' ,'fa-adn' ,'fa-bitbucket' ,'fa-bitbucket-square' ,'fa-tumblr' ,'fa-tumblr-square' ,'fa-long-arrow-down' ,'fa-long-arrow-up' ,'fa-long-arrow-left' ,'fa-long-arrow-right' ,'fa-apple' ,'fa-windows' ,'fa-android' ,'fa-linux' ,'fa-dribbble' ,'fa-skype' ,'fa-foursquare' ,'fa-trello' ,'fa-female','fa-male','fa-gittip','fa-sun-o','fa-moon-o','fa-archive','fa-bug','fa-vk','fa-weibo','fa-renren','fa-pagelines','fa-stack-exchange','fa-arrow-circle-o-right','fa-arrow-circle-o-left','fa-caret-square-o-left','fa-dot-circle-o','fa-wheelchair','fa-vimeo-square','fa-try','fa-plus-square-o');
				
           
            } else {
                 $shop_isle_icon_control = false;
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
										if($shop_isle_icon_control ==true){
                                ?>
                                            <span class="customize-control-title"><?php _e('Icon','parallax-one')?></span>
                                            <select name="<?php echo esc_attr($this->id); ?>" class="shop_isle_icon_control">
                                                <?php
                                                    foreach($icons_array as $contact_icon) {
                                                        echo '<option value="'.esc_attr($contact_icon).'">'.esc_attr($contact_icon).'</option>';
                                                    }
                                                ?>
                                            </select>
                                <?php   }

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
										<?php
											if($parallax_icon_control==true){ ?>
                                                    <span class="customize-control-title"><?php _e('Icon','parallax-one')?></span>
                                                    <select name="<?php echo esc_attr($this->id); ?>" class="shop_isle_icon_control">
                                                        <?php
                                                            foreach($icons_array as $contact_icon) {
                                                                if($icon->icon_value == $contact_icon){
                                                                    echo '<option value="'.esc_attr($contact_icon).'" selected="selected">'.esc_attr($contact_icon).'</option>';
                                                                } else {
                                                                    echo '<option value="'.esc_attr($contact_icon).'">'.esc_attr($contact_icon).'</option>';
                                                                }
                                                            }
                                                        ?>
                                                    </select>
                                        <?php
                                                }
										
										
												if($shop_isle_image_control==true){ ?>
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
										if($shop_isle_icon_control==true){ ?>
                                                <span class="customize-control-title"><?php _e('Icon','parallax-one')?></span>
                                                <select name="<?php echo esc_attr($this->id); ?>" class="shop_isle_icon_control">
                                                <?php
                                                    foreach($icons_array as $contact_icon) {
                                                        if($icon->icon_value == $contact_icon){
                                                            echo '<option value="'.esc_attr($contact_icon).'" selected="selected">'.esc_attr($contact_icon).'</option>';
                                                        } else {
                                                            echo '<option value="'.esc_attr($contact_icon).'">'.esc_attr($contact_icon).'</option>';
                                                        }
                                                    }
                                                ?>
                                                </select>
                                        <?php
                                            }
										
										
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