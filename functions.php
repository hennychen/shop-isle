<?php
/**
 * storefront engine room
 *
 * @package storefront
 */

/**
 * Initialize all the things.
 */
require get_template_directory() . '/inc/init.php';

/**
 * Note: Do not add any custom code here. Please use a child theme so that your customizations aren't lost during updates.
 * http://codex.wordpress.org/Child_Themes
 */
 
 include_once( get_template_directory() . '/kirki/kirki.php' );
 
 /**
 * Change the URL that will be used by Kirki
 * to load its assets in the customizer.
 */
function kirki_demo_configuration_sample( $config ) {

    $config['url_path'] = get_template_directory_uri() . '/kirki/';
    return $config;

}
add_filter( 'kirki/config', 'kirki_demo_configuration_sample' );