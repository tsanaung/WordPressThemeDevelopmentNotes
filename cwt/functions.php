/**
 * Add this code to Underscores Starter Theme
 **/

// Enqueue Styles & Scripts

function lmm_scripts() {

	wp_enqueue_style( 'lovelymyanmar-bulma', get_template_directory_uri() . '/lmm/bulma.css', array(), 'all' ); //Bulma.CSS

	wp_enqueue_style( 'lovelymyanmar-fa', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', array(), 'all' ); //FA icons

	wp_enqueue_script( 'lmm-js', get_template_directory_uri() . '/lmm/lmm.js', array(), _S_VERSION, true ); //lmm.js

}
add_action( 'wp_enqueue_scripts', 'lmm_scripts' );
