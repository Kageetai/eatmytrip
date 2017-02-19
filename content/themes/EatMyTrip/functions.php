<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function eatmytrip_styles() {
	$parent_style = 'brasserie'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	if (is_page_template( 'page-templates/custom_home.php' )) {
		wp_enqueue_style( 'eatmytrip-style',
			get_stylesheet_directory_uri() . '/dist/css/main.css',
			array( $parent_style, 'flexslider', 'font-awesome', 'animate', 'style' ),
			wp_get_theme()->get( 'Version' )
		);
	} else {
		wp_enqueue_style( 'eatmytrip-style',
			get_stylesheet_directory_uri() . '/dist/css/main.css',
			array( $parent_style ),
			wp_get_theme()->get('Version')
		);
	}
}
add_action( 'wp_enqueue_scripts', 'eatmytrip_styles' );


function register_menu() {
	register_nav_menu('secondary-header',__( 'Secondary Header Menu' ));
}
add_action( 'init', 'register_menu' );

function get_image_id($image_url) {
	global $wpdb;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ));
	return $attachment[0];
}

add_image_size( 'medium-cropped', 300, 300, true );

/**
 * Customizer additions
 */
require( get_stylesheet_directory() . '/inc/customizer.php' );