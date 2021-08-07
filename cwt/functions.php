<?php
/**
 * LovelyMyanmar functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package LovelyMyanmar
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'lovelymyanmar_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function lovelymyanmar_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on LovelyMyanmar, use a find and replace
		 * to change 'lovelymyanmar' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'lovelymyanmar', get_template_directory() . '/languages' );

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
				'header-nav' => esc_html__( 'Fixed Header Nav', 'lovelymyanmar' ),
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
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'lovelymyanmar_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

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
	}
endif;
add_action( 'after_setup_theme', 'lovelymyanmar_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lovelymyanmar_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lovelymyanmar_content_width', 640 );
}
add_action( 'after_setup_theme', 'lovelymyanmar_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lovelymyanmar_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'lovelymyanmar' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'lovelymyanmar' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'lovelymyanmar_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function lovelymyanmar_scripts() {
	wp_enqueue_style( 'lovelymyanmar-style', get_stylesheet_uri(), array(), rand(111,9999), 'all' ); //_S_VERSION );
	wp_style_add_data( 'lovelymyanmar-style', 'rtl', 'replace' );

	wp_enqueue_script( 'lovelymyanmar-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	//LMM components
	wp_enqueue_style( 'lovelymyanmar-bulma', get_template_directory_uri() . '/lmm/bulma.css', array(), 'all' ); //Bulma.CSS

	wp_enqueue_style( 'lovelymyanmar-fa', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', array(), 'all' ); //FA icons

	wp_enqueue_script( 'lmm-js', get_template_directory_uri() . '/lmm/lmm.js', array(), _S_VERSION, true ); //lmm.js

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lovelymyanmar_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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

function lmm_sticat_menu() {
	register_nav_menu('smart-nav',__( 'Smart Sticky Menu' ));
}
add_action( 'init', 'lmm_sticat_menu' );

// Category names Improvement
function lovelymyanmar_cat() {
	$lovelymyanmar_cat = get_the_category(); 
	$lovelymyanmar_catname = $lovelymyanmar_cat[0]->cat_name; 
	$lovelymyanmar_catlink = get_category_link( $lovelymyanmar_cat[0]->cat_ID ); 
	echo '<a href="'.$lovelymyanmar_catlink.'" class="tag" > &sext; &nbsp;'.$lovelymyanmar_catname.'</a>'; 
} 

function lovelymyanmar_catcount() {
	$lovelymyanmar_cat = get_the_category();
	$lovelymyanmar_catnum = $lovelymyanmar_cat[0]->count;
	echo $lovelymyanmar_catnum;
}

function get_excerpt( $count ) {
	$excerpt = get_the_content();
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, $count);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = $excerpt.'...';
	return $excerpt;
}

// Numeric Pagination
function lovelymyanmar_numeric_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<nav class='pagination is-small is-rounded'> <ul class='pagination-list'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."' class='pagination-link has-background-info'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."' class='pagination-link has-background-info'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='pagination-link has-background-info'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='pagination-link' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."' class='pagination-link has-background-info'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."' class='pagination-link has-background-info'>&raquo;</a>";
         echo "</ul></nav>\n";
     }
}
