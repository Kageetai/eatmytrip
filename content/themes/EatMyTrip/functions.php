<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

function chld_thm_cfg_parent_css() {
	wp_enqueue_style( 'chld_thm_cfg_parent', get_template_directory_uri() . '/style.css', array() );
}
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

function child_theme_configurator_css() {
	wp_enqueue_style( 'chld_thm_cfg_separate', get_stylesheet_directory_uri() . '/css/main.css', array(
		'chld_thm_cfg_parent',
		'flexslider',
		'style',
		'font-awesome',
		'animate'
	) );
}
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css' );

// END ENQUEUE PARENT ACTION

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