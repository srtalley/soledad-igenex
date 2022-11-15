<?php
define( 'THEME_FUNCTIONS__FILE__', __FILE__ );

/**
* Enqueue the theme scripts
*/
if(!function_exists('child_theme_enqueue_scripts')) {

	Function child_theme_enqueue_scripts() {

		wp_dequeue_style('penci_style');

		wp_enqueue_style( 'soledad-childstyle', get_stylesheet_directory_uri() . '/style.css', 'penci_style', wp_get_theme()->get('Version'), 'all' );

		// Disable Penci fonts for speed
		wp_dequeue_style('penci-fonts');
		wp_dequeue_style('penci_icon');
		wp_dequeue_style('penci-font-awesomeold');

		// Disable elementor Google fonts for speed
		add_filter( 'elementor/frontend/print_google_fonts', '__return_false' );
	}

	add_action('wp_enqueue_scripts', 'child_theme_enqueue_scripts', 11);
}

require_once( dirname( __FILE__ ) . '/includes/class-menu.php');
function wl ( $log )  {
	if ( true === WP_DEBUG ) {
		if ( is_array( $log ) || is_object( $log ) ) {
			error_log( print_r( $log, true ) );
		} else {
			error_log( $log );
		}
	}
} // end public function wl 