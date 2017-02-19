<?php
// Register Custom Post Type
function recipe_post_type() {

	$labels = array(
		'name'                  => _x( 'Recipes', 'Post Type General Name', 'eatmytrip' ),
		'singular_name'         => _x( 'Recipe', 'Post Type Singular Name', 'eatmytrip' ),
		'menu_name'             => __( 'Recipes', 'eatmytrip' ),
		'name_admin_bar'        => __( 'Recipe', 'eatmytrip' ),
		'archives'              => __( 'Recipes Archives', 'eatmytrip' ),
		'attributes'            => __( 'Recipe Attributes', 'eatmytrip' ),
		'parent_item_colon'     => __( 'Parent Item:', 'eatmytrip' ),
		'all_items'             => __( 'All Recipes', 'eatmytrip' ),
		'add_new_item'          => __( 'Add New Recipe', 'eatmytrip' ),
		'add_new'               => __( 'Add New', 'eatmytrip' ),
		'new_item'              => __( 'New Recipe', 'eatmytrip' ),
		'edit_item'             => __( 'Edit Recipe', 'eatmytrip' ),
		'update_item'           => __( 'Update Recipe', 'eatmytrip' ),
		'view_item'             => __( 'View Recipe', 'eatmytrip' ),
		'view_items'            => __( 'View Recipe', 'eatmytrip' ),
		'search_items'          => __( 'Search Recipe', 'eatmytrip' ),
		'not_found'             => __( 'Not found', 'eatmytrip' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'eatmytrip' ),
		'featured_image'        => __( 'Featured Image', 'eatmytrip' ),
		'set_featured_image'    => __( 'Set featured image', 'eatmytrip' ),
		'remove_featured_image' => __( 'Remove featured image', 'eatmytrip' ),
		'use_featured_image'    => __( 'Use as featured image', 'eatmytrip' ),
		'insert_into_item'      => __( 'Insert into Recipe', 'eatmytrip' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Recipe', 'eatmytrip' ),
		'items_list'            => __( 'Recipes list', 'eatmytrip' ),
		'items_list_navigation' => __( 'Recipes list navigation', 'eatmytrip' ),
		'filter_items_list'     => __( 'Filter recipes list', 'eatmytrip' ),
	);
	$args = array(
		'label'                 => __( 'Recipe', 'eatmytrip' ),
		'description'           => __( 'Recipe with ingredients', 'eatmytrip' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'revisions', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'recipe', $args );

}
add_action( 'init', 'recipe_post_type', 0 );