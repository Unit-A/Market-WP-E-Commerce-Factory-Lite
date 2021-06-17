<?php
/**
 * @package Factory Lite
 * Setup the WordPress core custom header feature.
 *
 * @uses factory_lite_header_style()
*/
function factory_lite_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'factory_lite_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 2000,
		'height'                 => 200,
		'flex-width'    		 => true,
		'flex-height'    		 => true,
		'wp-head-callback'       => 'factory_lite_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'factory_lite_custom_header_setup' );

if ( ! function_exists( 'factory_lite_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see factory_lite_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'factory_lite_header_style' );

function factory_lite_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        .middle-bar{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'factory-lite-basic-style', $custom_css );
	endif;
}
endif;