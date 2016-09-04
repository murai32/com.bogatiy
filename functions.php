<?php
/**
 * Bogatiy Pavel portfolio functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bogatiy_Pavel_portfolio
 */

if ( ! function_exists( 'bogatiy_pavel_portfolio_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bogatiy_pavel_portfolio_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Bogatiy Pavel portfolio, use a find and replace
	 * to change 'bogatiy-pavel-portfolio' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'bogatiy-pavel-portfolio', get_template_directory() . '/languages' );

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

	//unregister_nav_menu( 'social' ); 

	// This theme uses wp_nav_menu() in one location.

	register_nav_menus( array(		
		'main' => 'Главное меню',
		'socials-links' => 'Ссылки на соц. сети',
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'bogatiy_pavel_portfolio_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
		) ) );
}
endif;
add_action( 'after_setup_theme', 'bogatiy_pavel_portfolio_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bogatiy_pavel_portfolio_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bogatiy_pavel_portfolio_content_width', 640 );
}
add_action( 'after_setup_theme', 'bogatiy_pavel_portfolio_content_width', 0 );

/**
 * Hide admin bar.
 *
 */
function bogatiy_pavel_portfolio_remove_admin_bar() {
	show_admin_bar( false );
}
add_action('after_setup_theme', 'bogatiy_pavel_portfolio_remove_admin_bar');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bogatiy_pavel_portfolio_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bogatiy-pavel-portfolio' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'bogatiy-pavel-portfolio' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		) );
}
add_action( 'widgets_init', 'bogatiy_pavel_portfolio_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bogatiy_pavel_portfolio_scripts() {
	wp_enqueue_style( 'bogatiy-pavel-portfolio-style', get_stylesheet_uri() );

// отключаем требуху из коробки
	wp_deregister_script('jquery');

	
	wp_deregister_script( 'wp-embed' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );


//подключаем скрипты темы

	wp_enqueue_script( 'libs-theme', get_template_directory_uri().'/js/libs.min.js', array(), NULL, false );
	wp_enqueue_script( 'common-theme', get_template_directory_uri().'/js/common.min.js', array(), NULL, false );

	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bogatiy_pavel_portfolio_scripts' );

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
 * Load TGM plugins.
 */
require get_template_directory() . '/tgm/theme-plugin-activator.php';

/**
 * Wordpress BEM Menu.
 * https://github.com/roikles/Wordpress-Bem-Menu
 */
require get_template_directory() . '/lib/plugins/Wordpress-Bem-Menu/wp_bem_menu.php';
require get_template_directory() . '/lib/plugins/Wordpress-Bem-Menu/wp_bem_menu_bogatiy_main.php';
