<?php

// function of get css path (enqueue style)
function softuni_assets(){
    wp_enqueue_style( 
        'softuni-shop', 
        get_template_directory_uri() . '/assets/css/master.css', array(), 
        filemtime( get_template_directory(). '/assets/css/master.css' ));
}
add_action( 'wp_enqueue_scripts', 'softuni_assets' );