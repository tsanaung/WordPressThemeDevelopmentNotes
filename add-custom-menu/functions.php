function tsan_custom_new_menu() {
  register_nav_menu('tsan-custom-menu',__( 'Sidebar Navigation Menu By Tsan Aung' ));
}
add_action( 'init', 'tsan_custom_new_menu' );
