<?php
/**
 * uvalibrarystaff functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package uvalibrarystaff
 */

if ( ! function_exists( 'uvalibrarystaff_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function uvalibrarystaff_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on uvalibrarystaff, use a find and replace
	 * to change 'uvalibrarystaff' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'uvalibrarystaff', get_template_directory() . '/languages' );

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
		'primary' => __( 'Sidebar Navigation', 'uvalibrarystaff' ),
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
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'uvalibrarystaff_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // uvalibrarystaff_setup
add_action( 'after_setup_theme', 'uvalibrarystaff_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function uvalibrarystaff_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'uvalibrarystaff_content_width', 640 );
}
add_action( 'after_setup_theme', 'uvalibrarystaff_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function uvalibrarystaff_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'uvalibrarystaff' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'uvalibrarystaff_widgets_init' );



/**
 * Enqueue scripts and styles.
 */
function uvalibrarystaff_scripts() {
  if (!is_admin()) {
  	// Jquery needs to load in the header to support forms on the site.
    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri() . '/js/plugins/jquery-2.1.1.js');
    wp_enqueue_script('jquery');
		wp_enqueue_script('uvalibrarystaff-forms', get_template_directory_uri() . 'js/forms.js');
		wp_enqueue_script( 'uvalibrarystaff-materialize', get_template_directory_uri() . '/js/plugins/materialize.min.js', array(), '20120206', true );
		wp_enqueue_script( 'uvalibrarystaff-init', get_template_directory_uri() . '/js/init.js', array(), '20120206', true );
		wp_enqueue_script( 'uvalibrarystaff-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
		wp_enqueue_script( 'uvalibrarystaff-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		wp_enqueue_style( 'gf-forms', plugins_url() . '/gravityforms/css/forms.css' );
		wp_enqueue_style( 'uvalibrarystaff-style', get_stylesheet_uri() );
	}
}
add_action( 'wp_enqueue_scripts', 'uvalibrarystaff_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Register Custom Navigation Walker to implement the materialize style sidebar navigation.
 */
require_once(get_template_directory() . '/inc/sidebar_materialize_navwalker.php');