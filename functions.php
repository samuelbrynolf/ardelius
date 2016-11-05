<?php if ( ! function_exists( 'shell_setup' ) ) :

	function shell_setup() {

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
		//add_theme_support( 'post-thumbnails', array( 'reportage', 'portrait', 'singlar', 'post' ) );

		// REGISTER MENU -------------------------------------------------------------------

		if ( !function_exists( 'register_my_menu' )) {
			function register_my_menu()
			{
				register_nav_menu('navigation', __('Huvudnavigation'));
			}

			add_action('init', 'register_my_menu');
		}

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form'
		));

		// clean up header
		remove_action('wp_head', 'rsd_link'); //removes EditURI/RSD (Really Simple Discovery) link.
		remove_action('wp_head', 'wlwmanifest_link'); //removes wlwmanifest (Windows Live Writer)
		remove_action('wp_head', 'print_emoji_detection_script', 7 );
	    remove_action('wp_print_styles', 'print_emoji_styles' );
		remove_action('wp_head', 'rest_output_link_wp_head', 10 );
		remove_action('wp_head', 'wp_oembed_add_discovery_links', 10 );
		remove_action('wp_head', 'feed_links_extra', 3 );
		remove_action('wp_head', 'feed_links', 2 );
		remove_action('do_feed_rdf', 'do_feed_rdf', 10, 1);
		remove_action('do_feed_rss', 'do_feed_rss', 10, 1);
		remove_action('do_feed_rss2', 'do_feed_rss2', 10, 1);
		remove_action('do_feed_atom', 'do_feed_atom', 10, 1);
		remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

		add_filter( 'emoji_svg_url', '__return_false' ); // No need to prefetch stuff for emojicons (removed above)

		function wp_remove_version() { //remove wordpress version (header)
			return '';
		}
		add_filter('the_generator', 'wp_remove_version');
	}
endif;
add_action( 'after_setup_theme', 'shell_setup' );


/**
 * Enqueue scripts and styles.
 */
function shell_scripts() {
	wp_enqueue_style( 'shell-style', get_stylesheet_uri() );
	wp_deregister_script('jquery');
	wp_enqueue_script( 'shell-bundled-scripts', get_template_directory_uri() . '/js/bundled.js', array(), '', true );

	if(!is_admin()){
		wp_deregister_script('wp-embed');
	}
}
add_action( 'wp_enqueue_scripts', 'shell_scripts' );

// Custom functions

require get_template_directory() . '/functions/theme_functions.php';
require get_template_directory() . '/functions/template_tags.php';
require get_template_directory() . '/functions/post_loader.php';
// require get_template_directory() . '/functions/acf.php';