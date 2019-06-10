<?php
/**
 * Metropoly Theme Customizer
 *
 * @package metropoly
 */


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function metropoly_customize_preview_js() {
	wp_enqueue_script( 'metropoly_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'metropoly_customize_preview_js' );
