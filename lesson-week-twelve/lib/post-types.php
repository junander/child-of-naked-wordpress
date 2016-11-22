<?php
/**
 * Creating custom post types
 * See: https://codex.wordpress.org/Function_Reference/register_post_type
 */
 
 /**
  * Registering custom post types
  * Generated via: https://generatewp.com/post-type/
  */


// Register Custom Post Type
function lessontwelve_create_custom_post_types() {

	$labels = array(
		'name'                  => _x( 'Recipes', 'Post Type General Name', 'lessontwelve' ),
		'singular_name'         => _x( 'Recipe', 'Post Type Singular Name', 'lessontwelve' ),
		'menu_name'             => __( 'Recipes', 'lessontwelve' ),
		'name_admin_bar'        => __( 'Recipe', 'lessontwelve' ),
		'archives'              => __( 'Recipe Archives', 'lessontwelve' ),
		'parent_item_colon'     => __( 'Parent Item:', 'lessontwelve' ),
		'all_items'             => __( 'All Recipes', 'lessontwelve' ),
		'add_new_item'          => __( 'Add New Recipe', 'lessontwelve' ),
		'add_new'               => __( 'Add New', 'lessontwelve' ),
		'new_item'              => __( 'New Recipe', 'lessontwelve' ),
		'edit_item'             => __( 'Edit Recipe', 'lessontwelve' ),
		'update_item'           => __( 'Update Recipe', 'lessontwelve' ),
		'view_item'             => __( 'View Recipe', 'lessontwelve' ),
		'search_items'          => __( 'Search Recipe', 'lessontwelve' ),
		'not_found'             => __( 'Not found', 'lessontwelve' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'lessontwelve' ),
		'featured_image'        => __( 'Featured Image', 'lessontwelve' ),
		'set_featured_image'    => __( 'Set featured image', 'lessontwelve' ),
		'remove_featured_image' => __( 'Remove featured image', 'lessontwelve' ),
		'use_featured_image'    => __( 'Use as featured image', 'lessontwelve' ),
		'insert_into_item'      => __( 'Insert into item', 'lessontwelve' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'lessontwelve' ),
		'items_list'            => __( 'Recipe list', 'lessontwelve' ),
		'items_list_navigation' => __( 'Items list navigation', 'lessontwelve' ),
		'filter_items_list'     => __( 'Filter recipes list', 'lessontwelve' ),
	);
	$args = array(
		'label'                 => __( 'Recipe', 'lessontwelve' ),
		'description'           => __( 'These are my recipes', 'lessontwelve' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-network',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'recipe', $args );

}
add_action( 'init', 'lessontwelve_create_custom_post_types', 0 );