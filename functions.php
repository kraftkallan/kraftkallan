<?php 

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
*/
if ( ! function_exists( 'kraftkallan_setup' ) ) :
	function kraftkallan_setup() {
		/*
		 * Make theme available for translation. Translations can be filed in the /languages/ directory.
		 */
		//  load_theme_textdomain( 'kraftkallan', get_template_directory() . '/languages' );

		/**
		 * Register navigation menus.
		 */
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary Menu', 'kraftkallan' ),
			)

		);
		
		// Enable support for featured image
		add_theme_support( 'post-thumbnails' );
	}
endif; // kraftkallan_setup
add_action( 'after_setup_theme', 'kraftkallan_setup' );


/**
 * Custom nav walker with bulma support.
 */
require get_template_directory() . '/inc/sk-nav-walker.php';

/**
 * Register styles.  
 */
function kraftkallan_register_styles() {
	$version = wp_get_theme()->get('Version');
	wp_enqueue_style('kraftkallan-style', get_template_directory_uri() . "/style.css", array(), $version, 'all');
	wp_enqueue_style('kraftkallan-main', get_template_directory_uri() . "/dist/kraftkallan.css", array(), $version, 'all');
}
add_action('wp_enqueue_scripts', 'kraftkallan_register_styles');

/**
 * Register scripts.
 */
function kraftkallan_register_scripts() {
	$version = wp_get_theme()->get('Version');
	wp_enqueue_script('kraftkallan-main', get_template_directory_uri() . "/dist/main.js", array(), $version, true);
}
add_action('wp_enqueue_scripts', 'kraftkallan_register_scripts');

/**
 * Register sidebars.
 */
add_action( 'widgets_init', function () {
	// Widget 1
	register_sidebar(
		array(
			'id'            => 'sk-footer-widget',
			'name'          => esc_html__( 'Footer Widget 1', 'kraftkallan' ),
			'description'   => esc_html__( 'Used for footer widget area', 'kraftkallan' ),
			'before_widget' => '<div id="%1$s" class="sk-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="sk-widget__title">',
			'after_title'   => '</h2>'
		)
	);
	// Widget 2
	register_sidebar(
		array(
			'id'            => 'sk-footer-widget-2',
			'name'          => esc_html__( 'Footer Widget 2', 'kraftkallan' ),
			'description'   => esc_html__( 'Used for footer widget area', 'kraftkallan' ),
			'before_widget' => '<div id="%1$s" class="sk-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="sk-widget__title">',
			'after_title'   => '</h2>'
		)
	);
	// Widget 3
	register_sidebar(
		array(
			'id'            => 'sk-footer-widget-3',
			'name'          => esc_html__( 'Footer Widget 3', 'kraftkallan' ),
			'description'   => esc_html__( 'Used for footer widget area', 'kraftkallan' ),
			'before_widget' => '<div id="%1$s" class="sk-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="sk-widget__title">',
			'after_title'   => '</h2>'
		)
	);
});
