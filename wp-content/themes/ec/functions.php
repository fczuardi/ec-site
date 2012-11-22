<?php
/**
 * ec functions and definitions
 *
 * @package ec
 * @since ec 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since ec 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'ec_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since ec 1.0
 */
function ec_setup() {

	/**
	 * Custom Post Types
	 */
	require( get_template_directory() . '/inc/theme-options/custom-type-pessoa.php' );

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	//require( get_template_directory() . '/inc/tweaks.php' );

	/**
	 * Custom Theme Options
	 */
	//require( get_template_directory() . '/inc/theme-options/theme-options.php' );

	/**
	 * Custom Taxonomies and Metas
	 */
	require( get_template_directory() . '/inc/theme-options/custom-taxonomies-metas.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on ec, use a find and replace
	 * to change 'ec' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'ec', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	// Custom sizes
	add_image_size( 'ec_pessoa_foto', 880, 391, true );
	add_image_size( 'ec_trabalho_grid', 160, 160, true );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'ec' ),
	) );

	/**
	 * Add support for the Aside Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', ) );
}
endif; // ec_setup
add_action( 'after_setup_theme', 'ec_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since ec 1.0
 */
function ec_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'ec' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}
add_action( 'widgets_init', 'ec_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function ec_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'ec_scripts' );

/**
 * Implement the Custom Header feature
 */
//require( get_template_directory() . '/inc/custom-header.php' );



// adaptado de http://www.wpreso.com/blog/tutorials/2011/01/04/add-pagepost-slug-class-to-menu-item-classes/
function add_slug_class_to_menu_item($output){
		$idstr = preg_match_all('/<li id="menu-item-(\d+)/', $output, $matches);
		foreach($matches[1] as $mid){
			$id = get_post_meta($mid, '_menu_item_object_id', true);
			$slug = get_post($id)->post_name;
			$output = preg_replace('/id="menu-item-'.$mid.'"/', 'id="menu-item-'.$slug.'"', $output, 1);
		}
	return $output;
}
add_filter('wp_nav_menu', 'add_slug_class_to_menu_item');
?>