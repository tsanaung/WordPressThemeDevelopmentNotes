<?php
/**
 * Spring MM functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Spring_MM
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'springmm_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function springmm_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Spring MM, use a find and replace
		 * to change 'springmm' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'springmm', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'springmm' ),
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
				'springmm_custom_background_args',
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
				'height'      => 47.04,
				'width'       => 47.04,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'springmm_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function springmm_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'springmm_content_width', 640 );
}
add_action( 'after_setup_theme', 'springmm_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function springmm_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'springmm' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'springmm' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar2', 'springmm' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'springmm' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'springmm_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function springmm_scripts() {
	wp_enqueue_style( 'springmm-style', get_stylesheet_uri(), array(), rand(111,9999), 'all' );// _S_VERSION );
	wp_enqueue_style( 'springmm-faicon', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css', array(), 'all');
	wp_style_add_data( 'springmm-style', 'rtl', 'replace' );

	wp_enqueue_script( 'springmm-navigation', get_template_directory_uri() . '/js/navigation.js', array(), rand(111,9999),/*_S_VERSION,*/ true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'springmm_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Implement the Category Thumbnails feature.
 */
require get_template_directory() . '/inc/catimg.php';

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

function wp_hct() {
	echo '<p>&copy;'; echo the_time('Y'); echo ' <strong><a href="';echo esc_url(bloginfo('url')); echo '">'; echo bloginfo('name'); echo '</a></strong> | All Rights Reserved<br/>
	Theme <strong><a href="">SpringMM</a></strong> Designed by <strong><a href="https://tsanaung.github.io/">Tsan Aung</a></strong>.<br/><strong>SiteName strongly condemn the Myanmar Military Coup.</strong> </p>';
}

// unautop for images
function fb_unautop_4_img( $content ) {
    
    $content = preg_replace(
        '/<p>\\s*?(<a rel=\"attachment.*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s',
        '<figure>$1</figure>',
        $content
    );
    
    return $content;
}
add_filter( 'the_content', 'fb_unautop_4_img', 99 );

// Numeric Pagination
function springmm_numeric_pagination($pages = '', $range = 2)
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
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."' class='pagination-link nu'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."' class='pagination-link nu'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='pagination-link current-page nu'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='pagination-link nu' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."' class='pagination-link nu'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."' class='pagination-link nu'>&raquo;</a>";
         echo "</div>\n";
     }
}

//limit excerpt count
function get_excerpt( $count ) {
	$excerpt = get_the_content();
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, $count);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = $excerpt.'...';
	return $excerpt;
}

//Create Library
if (isset($_GET['activated']) && is_admin()){
  
    $new_page_title = 'Library';
    $new_page_content = 'LoremIpsumဘာမှမပေါ်နဲ့';
    $new_page_template = 'library.php'; //ex. template-custom.php. Leave blank if you don't want a custom page template.
  
    //don't change the code bellow, unless you know what you're doing
  
    $page_check = get_page_by_title($new_page_title);
    $new_page = array(
        'post_type' => 'page',
		'post_name'  => 'library',
        'post_title' => $new_page_title,
        'post_content' => $new_page_content,
        'post_status' => 'publish',
        'post_author' => 1,
    );
    if(!isset($page_check->ID)){
        $new_page_id = wp_insert_post($new_page);
        if(!empty($new_page_template)){
            update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
        }
    }
  
}

if(function_exists('add_theme_support')) {
	add_theme_support('category-thumbnails');
}

/*
 * viewcount
 */
function customSetPostViews($postID) {
    $countKey = 'post_views_count';
    $count = get_post_meta($postID, $countKey, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '15');
    }else{
        $count++;
        update_post_meta($postID, $countKey, $count);
    }
}
function count_post_visits() {
	if( is_single() ) {
	   global $post;
	   $views = get_post_meta( $post->ID, 'springmm_post_viewed', true );
	   if( $views == '' ) {
		  update_post_meta( $post->ID, 'springmm_post_viewed', '1' );   
	   } else {
		  $views_no = intval( $views );
		  update_post_meta( $post->ID, 'springmm_post_viewed', ++$views_no );
	   }
	}
 }
 add_action( 'wp_head', 'count_post_visits' );
