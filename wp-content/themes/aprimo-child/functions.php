<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

   wp_enqueue_style('child-style', get_stylesheet_directory_uri() .'/style.css', array('parent-style'));
}


function theme_js() {

	wp_enqueue_script( 'theme_js', get_template_directory_uri() . '/js/main.js', array('jquery'), '20151215', true );
	
}
add_action( 'wp_enqueue_scripts', 'theme_js' );
