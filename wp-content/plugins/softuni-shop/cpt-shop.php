<?php

/**
 * Register a custom post type called "shop".
 *
 * @see get_post_type_labels() for label keys.
 */
function softuni_shop_cpt() {
	$labels = array(
		'name'                  => _x( 'Shops', 'Post type general name', 'training-site' ),
		'singular_name'         => _x( 'Shop', 'Post type singular name', 'training-site' ),
		'menu_name'             => _x( 'Shops', 'Admin Menu text', 'training-site' ),
		'name_admin_bar'        => _x( 'Shop', 'Add New on Toolbar', 'training-site' ),
		'add_new'               => __( 'Add New', 'training-site' ),
		'add_new_item'          => __( 'Add New Shop', 'training-site' ),
		'new_item'              => __( 'New Shop', 'training-site' ),
		'edit_item'             => __( 'Edit Shop', 'training-site' ),
		'view_item'             => __( 'View Shop', 'training-site' ),
		'all_items'             => __( 'All Shops', 'training-site' ),
	);

	$args = array(
		'labels'                => $labels,
		'public'                => true,
		'publicly_queryable'    => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'shop' ),
		'capability_type'       => 'post',
		'has_archive'           => true,
		'hierarchical'          => false,
		'menu_position'         => null,
		'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions' ),
        'show_in_rest'          => true,
	);

	register_post_type( 'shop', $args );
}
add_action( 'init', 'softuni_shop_cpt' );