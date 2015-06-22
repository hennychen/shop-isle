<?php
/**
 * ShopIsle setup functions
 *
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

/**
 * Assign the Storefront version to a var
 */
$theme 					= wp_get_theme();
$storefront_version 	= $theme['Version'];

if ( ! function_exists( 'shop_isle_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function shop_isle_setup() {

		/*
		 * Load Localisation files.
		 *
		 * Note: the first-loaded translation file overrides any following ones if the same translation is present.
		 */

		// wp-content/languages/themes/storefront-it_IT.mo
		load_theme_textdomain( 'storefront', trailingslashit( WP_LANG_DIR ) . 'themes/' );

		// wp-content/themes/child-theme-name/languages/it_IT.mo
		load_theme_textdomain( 'storefront', get_stylesheet_directory() . '/languages' );

		// wp-content/themes/theme-name/languages/it_IT.mo
		load_theme_textdomain( 'storefront', get_template_directory() . '/languages' );

		/**
		 * Add default posts and comments RSS feed links to head.
		 */
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'primary'		=> __( 'Primary Menu', 'shop-isle' )
		) );

		/*
		 * Switch default core markup for search form, comment form, comments, galleries, captions and widgets
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'widgets',
		) );

		// Setup the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'storefront_custom_background_args', array(
			'default-color' => apply_filters( 'storefront_default_background_color', 'fcfcfc' ),
			'default-image' => '',
		) ) );

		// Add support for the Site Logo plugin and the site logo functionality in JetPack
		// https://github.com/automattic/site-logo
		// http://jetpack.me/
		add_theme_support( 'site-logo', array( 'size' => 'full' ) );

		// Declare WooCommerce support
		add_theme_support( 'woocommerce' );

		// Declare support for title theme feature
		add_theme_support( 'title-tag' );
	}
endif; // shop_isle_setup

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function shop_isle_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Sidebar', 'storefront' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Header', 'storefront' ),
		'id'            => 'header-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Banners section', 'shop-isle' ),
		'id'            => 'sidebar-banners',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer', 'shop-isle' ),
		'id'            => 'sidebar-footer',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}

/**
 * Enqueue scripts and styles.
 * @since  1.0.0
 */
function storefront_scripts() {
	global $storefront_version;
	
	wp_enqueue_style( 'storefront-bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css', array(), '20120206', "all"  );
	
	wp_enqueue_style( 'storefront-simpletextrotator', get_template_directory_uri() . '/assets/css/simpletextrotator.css', array('storefront-bootstrap'), '20120206', "all"  );
	
	wp_enqueue_style( 'storefront-font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array('storefront-simpletextrotator'), '20120206', "all"  );
	
	wp_enqueue_style( 'storefront-et-line-font', get_template_directory_uri() . '/assets/css/et-line-font.css', array('storefront-font-awesome'), '20120206', "all"  );
	
	wp_enqueue_style( 'storefront-magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array('storefront-et-line-font'), '20120206', "all"  );
	
	wp_enqueue_style( 'storefront-flexslider', get_template_directory_uri() . '/assets/css/flexslider.css', array('storefront-magnific-popup'), '20120206', "all"  );

	wp_enqueue_style( 'storefront-owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css', array('storefront-flexslider'), '20120206', "all"  );

	wp_enqueue_style( 'storefront-animate', get_template_directory_uri() . '/assets/css/animate.css', array('storefront-owl-carousel'), '20120206', "all"  );

	wp_enqueue_style( 'storefront-style1', get_template_directory_uri() . '/assets/css/style.css', array('storefront-bootstrap'), '20120206', "all" );
	
	wp_enqueue_style( 'storefront-style', get_stylesheet_uri(), '', $storefront_version );
	
	wp_enqueue_script( 'jquery' );
	
	wp_enqueue_script( 'storefront-bootstrap-js', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', array('jquery'), '20120206', true );
	
	wp_enqueue_script( 'storefront-jquery-mb-YTPlayer', get_template_directory_uri() . '/assets/js/jquery.mb.YTPlayer.min.js', array('jquery'), '20120206', true );
	
	wp_enqueue_script( 'storefront-appear', get_template_directory_uri() . '/assets/js/appear.js', array('jquery'), '20120206', true );
	
	wp_enqueue_script( 'storefront-simple-text-rotator-js', get_template_directory_uri() . '/assets/js/jquery.simple-text-rotator.min.js', array('jquery'), '20120206', true );
	
	wp_enqueue_script( 'storefront-jqBootstrapValidation', get_template_directory_uri() . '/assets/js/jqBootstrapValidation.js', array('jquery'), '20120206', true );
	
	wp_enqueue_script( 'storefront-maps', 'http://maps.google.com/maps/api/js?sensor=true', array('jquery'), '20120206', true );
	
	wp_enqueue_script( 'storefront-gmaps', get_template_directory_uri() . '/assets/js/gmaps.js', array('jquery'), '20120206', true );
	
	wp_enqueue_script( 'storefront-isotope', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array('jquery'), '20120206', true );
	
	wp_enqueue_script( 'storefront-imagesloaded', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.js', array('jquery'), '20120206', true );
	
	wp_enqueue_script( 'storefront-flexslider', get_template_directory_uri() . '/assets/js/jquery.flexslider-min.js', array('jquery'), '20120206', true );
	
	wp_enqueue_script( 'storefront-magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), '20120206', true );
	
	wp_enqueue_script( 'storefront-fitvids', get_template_directory_uri() . '/assets/js/jquery.fitvids.js', array('jquery'), '20120206', true );
	
	wp_enqueue_script( 'storefront-smoothscroll', get_template_directory_uri() . '/assets/js/smoothscroll.js', array('jquery'), '20120206', true );
	
	wp_enqueue_script( 'storefront-wow', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), '20120206', true );
	
	wp_enqueue_script( 'storefront-owl', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '20120206', true );
	
	wp_enqueue_script( 'storefront-contact', get_template_directory_uri() . '/assets/js/contact.js', array('jquery'), '20120206', true );
	
	wp_enqueue_script( 'storefront-custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery','storefront-flexslider','storefront-jquery-mb-YTPlayer'), '20120206', true );

	wp_enqueue_script( 'storefront-navigation', get_template_directory_uri() . '/js/navigation.min.js', array(), '20120206', true );

	wp_enqueue_script( 'storefront-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.min.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}