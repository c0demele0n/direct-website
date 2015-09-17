<?php
/**
 * wdlr functions and definitions
 *
 * @package wdlr
 */

if ( ! function_exists( 'wdlr_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wdlr_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on wdlr, use a find and replace
	 * to change 'wdlr' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'wdlr', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'wdlr' ),
		'secondary' => esc_html__( 'Secondary Menu', 'wdlr' ),
		'social' => esc_html__( 'Social Share Menu', 'wdlr' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'wdlr_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/**
	 *  thumbnail sizes
	 */
	$image_sizes = array(
		'1920'	=>	'full-hd',
		'1280'	=>	'desktop',
		'1024'	=>	'tablet-landscape',
		'768'		=>	'tablet-portrait',
		'640'		=>	'phone-landscape',
		'480'		=>	'phone-portrait',
		'320'		=>	'default'
	);

	// add sizes
	foreach ($image_sizes as $size => $name) {
		add_image_size($name, $size);
	}
}
endif; // wdlr_setup
add_action( 'after_setup_theme', 'wdlr_setup' );

/**
 *  disable posts
 */
function remove_posts_menu() {
    remove_menu_page('edit.php');
}
add_action('admin_init', 'remove_posts_menu');

/**
 *  hide admin bar
 */
add_filter('show_admin_bar', '__return_false');

/**
 *  set yoast priority
 */
add_filter( 'wpseo_metabox_prio', function() { return 'low'; });

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wdlr_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wdlr_content_width', 640 );
}
add_action( 'after_setup_theme', 'wdlr_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function wdlr_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wdlr' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'wdlr_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wdlr_scripts() {
	wp_enqueue_style( 'wdlr-style', get_stylesheet_uri() );

	wp_enqueue_script( 'wdlr-modernizr', get_template_directory_uri() . '/js/modernizr.js', array('jquery') );

	wp_enqueue_script( 'wdlr-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'wdlr-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'wdlr-script', get_template_directory_uri() . '/js/script.js', array('jquery'), false, true );
}
add_action( 'wp_enqueue_scripts', 'wdlr_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Custom shortcodes.
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Page Sections Metabox.
 */
require get_template_directory() . '/inc/sections.php';