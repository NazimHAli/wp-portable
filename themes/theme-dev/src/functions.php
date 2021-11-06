<?php
/**
 * Theme_Name functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Theme_Name
 * @since 1.0.0
 */

require_once __dir__ . '/vendor/autoload.php';
use Jenssegers\Blade\Blade;


function render( string $view ) {
	$blade = new Blade( __dir__ . '/views', __dir__ . '/cache' );
	echo $blade->make( $view );
}


if ( ! function_exists( 'theme_slug_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function theme_slug_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Theme Name, use a find and replace
		 * to change 'theme-slug' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'theme-slug', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'theme-slug' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(

			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Set up the WordPress core custom background feature.
		// add_theme_support('custom-background', apply_filters('theme_slug_custom_background_args', array(
		// 'default-color' => 'ffffff',
		// 'default-image' => '',
		// )));

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		/**
		 * Editor Color Palette Support
		 *
		 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-color-palettes
		 */
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Light grayy' ),
					'slug'  => 'light-gray',
					'color' => '#f5f5f5',
				),
				array(
					'name'  => __( 'Medium gray' ),
					'slug'  => 'medium-gray',
					'color' => '#999',
				),
				array(
					'name'  => __( 'Dark gray' ),
					'slug'  => 'dark-gray',
					'color' => '#333',
				),
			)
		);

		/**
		 * Post Formats
		 *
		 * @link https://developer.wordpress.org/themes/functionality/post-formats/
		 */
		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'quote', 'image', 'video' ) );
	}
endif;
add_action( 'after_setup_theme', 'theme_slug_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function theme_slug_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'theme_slug_content_width', 640 );
}
add_action( 'after_setup_theme', 'theme_slug_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */


function theme_slug_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'theme-slug' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'theme-slug' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'theme_slug_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function theme_slug_scripts() {
	$env     = getenv( 'WORDPRESS_ENV' );
	$fileExt = $env === 'development' ? '.' : '.min.';

	wp_enqueue_style( 'theme-slug-style', get_stylesheet_uri(), filemtime() );
	wp_enqueue_style( 'theme-slug-shared', get_template_directory_uri() . '/css/shared' . $fileExt . 'css', filemtime() );
	wp_enqueue_style( 'theme-slug-material-icons', '//fonts.googleapis.com/icon?family=Material+Icons', filemtime() );
	wp_enqueue_script( 'theme-slug-materialize', get_template_directory_uri() . '/js/materialize' . $fileExt . 'js', array(), filemtime(), true );
	wp_enqueue_script( 'theme-slug-shared', get_template_directory_uri() . '/js/shared' . $fileExt . 'js', array(), filemtime(), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_slug_scripts' );

/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load security functions.
 */
 require get_template_directory() . '/inc/security-functions.php';

/**
 * Admin customizations.
 */
 require get_template_directory() . '/inc/admin-customizations.php';

/**
 * Blocks templates.
 */
require get_template_directory() . '/blocks/movie.php';
