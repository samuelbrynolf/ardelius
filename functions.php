<?php
/**
 * bsk functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bsk
 */

if ( ! function_exists( 'bsk_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bsk_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on bsk, use a find and replace
	 * to change 'bsk' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'bsk', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'bsk' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form'
	) );

	// clean up header
	remove_action('wp_head', 'rsd_link'); //removes EditURI/RSD (Really Simple Discovery) link.
	remove_action('wp_head', 'wlwmanifest_link'); //removes wlwmanifest (Windows Live Writer)	
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
	function wpbeginner_remove_version() { //remove wordpress version (header)
	return '';
	}
	add_filter('the_generator', 'wpbeginner_remove_version');	
}
endif;
add_action( 'after_setup_theme', 'bsk_setup' );


/**
 * Enqueue scripts and styles.
 */
function bsk_scripts() {
	wp_enqueue_style( 'bsk-style', get_stylesheet_uri() );
	wp_enqueue_script( 'bsk-bundled-scripts', get_template_directory_uri() . '/js/bundled.js', array(), '', true );
}
add_action( 'wp_enqueue_scripts', 'bsk_scripts' );

// Custom functions

require get_template_directory() . '/functions/theme_functions.php';
