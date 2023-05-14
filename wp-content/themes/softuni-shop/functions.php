<?php

// function of get css path (enqueue style)
function softuni_assets(){
    wp_enqueue_style( 
        'softuni-shop', 
        get_template_directory_uri() . '/assets/css/master.css', array(), 
        filemtime( get_template_directory(). '/assets/css/master.css' ));
}
add_action( 'wp_enqueue_scripts', 'softuni_assets' );

/**
 * Taking care our custom menu
 *
 * @return void
 */
function softuni_register_nav_menu(){
    register_nav_menus( array(
        'primary_menu' => __( 'Primary Menu', 'softuni' ),
        'footer_menu'  => __( 'Footer Menu', 'softuni' ),
    ) );
}
add_action( 'after_setup_theme', 'softuni_register_nav_menu', 0 );