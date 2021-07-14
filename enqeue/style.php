/**
* functions.php
* random version number should be removed in production
**/

//Register
wp_register_style( 'tsan-style', get_template_directory_uri() . '/css/tsan.css', array(), rand(111,9999), 'all' );

//Or Add action
function tsan_style() {
	wp_enqueue_style( 'tsan-style', get_template_directory_uri() . '/css/tsan.css', array(), rand(111,9999), 'all' );
	}
	add_action('wp_enqueue_scripts', 'tsan_style');
