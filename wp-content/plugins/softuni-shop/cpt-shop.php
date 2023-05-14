<?php

/**
 * Register a custom post type called "shop".
 *
 * @see get_post_type_labels() for label keys.
 */
function softuni_shop_cpt() {
	$labels = array(
		'name'                  => _x( 'Shops', 'Post type general name', 'softuni-shop' ),
		'singular_name'         => _x( 'Shop', 'Post type singular name', 'softuni-shop' ),
		'menu_name'             => _x( 'Shops', 'Admin Menu text', 'softuni-shop' ),
		'name_admin_bar'        => _x( 'Shop', 'Add New on Toolbar', 'softuni-shop' ),
		'add_new'               => __( 'Add New', 'softuni-shop' ),
		'add_new_item'          => __( 'Add New Shop', 'softuni-shop' ),
		'new_item'              => __( 'New Shop', 'softuni-shop' ),
		'edit_item'             => __( 'Edit Shop', 'softuni-shop' ),
		'view_item'             => __( 'View Shop', 'softuni-shop' ),
		'all_items'             => __( 'All Shops', 'softuni-shop' ),
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

/**
 * Register a private 'Product_Type' taxonomy for post type 'shop'.
 *
 * @see register_post_type() for registering post types.
 */
function softuni_product_type_taxonomy() {
    $labels = array(
		'name'              => _x( 'Product_types', 'taxonomy general name', 'softuni-shop' ),
		'singular_name'     => _x( 'Product_type', 'taxonomy singular name', 'softuni-shop' ),
		'search_items'      => __( 'Search Product_types', 'softuni-shop' ),
		'all_items'         => __( 'All Product_types', 'softuni-shop' ),
		'view_item'         => __( 'View Product_type', 'softuni-shop' ),
		'parent_item'       => __( 'Parent Product_type', 'softuni-shop' ),
		'parent_item_colon' => __( 'Parent Product_type:', 'softuni-shop' ),
		'edit_item'         => __( 'Edit Product_type', 'softuni-shop' ),
		'update_item'       => __( 'Update Product_type', 'softuni-shop' ),
		'add_new_item'      => __( 'Add New Product_type', 'softuni-shop' ),
		'new_item_name'     => __( 'New Product_type Name', 'softuni-shop' ),
		'not_found'         => __( 'No Product_type Found', 'softuni-shop' ),
		'back_to_items'     => __( 'Back to Product_types', 'softuni-shop' ),
		'menu_name'         => __( 'Product_type', 'softuni-shop' ),
	);

    $args = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'show_in_rest'      => true,
	);
    
   register_taxonomy( 'product_type', 'shop', $args );
}
add_action( 'init', 'softuni_product_type_taxonomy', 0 );

/**
 * Register a private 'Brand' taxonomy for post type 'shop'.
 *
 * @see register_post_type() for registering post types.
 */
function softuni_brand_taxonomy() {
    $labels = array(
		'name'              => _x( 'Brands', 'taxonomy general name', 'softuni-shop' ),
		'singular_name'     => _x( 'Brand', 'taxonomy singular name', 'softuni-shop' ),
		'search_items'      => __( 'Search Brands', 'softuni-shop' ),
		'all_items'         => __( 'All Brands', 'softuni-shop' ),
		'view_item'         => __( 'View Brand', 'softuni-shop' ),
		'parent_item'       => __( 'Parent Brand', 'softuni-shop' ),
		'parent_item_colon' => __( 'Parent Brand:', 'softuni-shop' ),
		'edit_item'         => __( 'Edit Brand', 'softuni-shop' ),
		'update_item'       => __( 'Update Brand', 'softuni-shop' ),
		'add_new_item'      => __( 'Add New Brand', 'softuni-shop' ),
		'new_item_name'     => __( 'New Brand Name', 'softuni-shop' ),
		'not_found'         => __( 'No Brand Found', 'softuni-shop' ),
		'back_to_items'     => __( 'Back to Brands', 'softuni-shop' ),
		'menu_name'         => __( 'Brand', 'softuni-shop' ),
	);

    $args = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'show_in_rest'      => true,
	);
    
   register_taxonomy( 'brand', 'shop', $args );
}
add_action( 'init', 'softuni_brand_taxonomy', 0 );


/**
 * Register a private 'Model' taxonomy for post type 'shop'.
 *
 * @see register_post_type() for registering post types.
 */
function softuni_model_taxonomy() {
    $labels = array(
		'name'              => _x( 'Models', 'taxonomy general name', 'softuni-shop' ),
		'singular_name'     => _x( 'Model', 'taxonomy singular name', 'softuni-shop' ),
		'search_items'      => __( 'Search Models', 'softuni-shop' ),
		'all_items'         => __( 'All Models', 'softuni-shop' ),
		'view_item'         => __( 'View Model', 'softuni-shop' ),
		'parent_item'       => __( 'Parent Model', 'softuni-shop' ),
		'parent_item_colon' => __( 'Parent Model:', 'softuni-shop' ),
		'edit_item'         => __( 'Edit Model', 'softuni-shop' ),
		'update_item'       => __( 'Update Model', 'softuni-shop' ),
		'add_new_item'      => __( 'Add New Model', 'softuni-shop' ),
		'new_item_name'     => __( 'New Model Name', 'softuni-shop' ),
		'not_found'         => __( 'No Model Found', 'softuni-shop' ),
		'back_to_items'     => __( 'Back to Models', 'softuni-shop' ),
		'menu_name'         => __( 'Model', 'softuni-shop' ),
	);

    $args = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'show_in_rest'      => true,
	);
    
   register_taxonomy( 'model', 'shop', $args );
}
add_action( 'init', 'softuni_model_taxonomy', 0 );