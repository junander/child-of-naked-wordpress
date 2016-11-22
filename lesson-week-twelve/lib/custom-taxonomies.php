<?php
/**
* Registering custom taxonomies
 * See: https://codex.wordpress.org/Function_Reference/register_taxonomy
 * 
*/

/**
 * Register Custom Taxonomies
 * Generated via: https://generatewp.com/taxonomy/
 * 
 */
// Register Custom Taxonomy
function lessontwelve_create_custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Genres', 'Taxonomy General Name', 'lessontwelve' ),
		'singular_name'              => _x( 'Genre', 'Taxonomy Singular Name', 'lessontwelve' ),
		'menu_name'                  => __( 'Genre', 'lessontwelve' ),
		'all_items'                  => __( 'All Genres', 'lessontwelve' ),
		'parent_item'                => __( 'Parent Genre', 'lessontwelve' ),
		'parent_item_colon'          => __( 'Parent Genre:', 'lessontwelve' ),
		'new_item_name'              => __( 'New Genre Name', 'lessontwelve' ),
		'add_new_item'               => __( 'Add New Genre', 'lessontwelve' ),
		'edit_item'                  => __( 'Edit Genre', 'lessontwelve' ),
		'update_item'                => __( 'Update Genre', 'lessontwelve' ),
		'view_item'                  => __( 'View Genre', 'lessontwelve' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'lessontwelve' ),
		'add_or_remove_items'        => __( 'Add or remove genres', 'lessontwelve' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'lessontwelve' ),
		'popular_items'              => __( 'Popular Genres', 'lessontwelve' ),
		'search_items'               => __( 'Search Genres', 'lessontwelve' ),
		'not_found'                  => __( 'Not Found', 'lessontwelve' ),
		'no_terms'                   => __( 'No genres', 'lessontwelve' ),
		'items_list'                 => __( 'Genres list', 'lessontwelve' ),
		'items_list_navigation'      => __( 'Genres list navigation', 'lessontwelve' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'genre', array( 'recipe' ), $args );

}
add_action( 'init', 'lessontwelve_create_custom_taxonomy', 0 );