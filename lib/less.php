<?php

	/*
	*
	*	Spartan functions
	*	------------------------------------------------
	*
	*
	*/

	/* Adding LESS PHP
	================================================== */
	require_once locate_template('/lib/wp-less/wp-less.php' );

	function custom_less_cache_path( $path ) {
	    return get_stylesheet_directory().'/assets/css';
	}
	add_filter( 'wp_less_cache_path', 'custom_less_cache_path' );


	function custom_less_cache_url( $url ) {
	    return get_stylesheet_directory_uri().'/assets/css';
	}
	add_filter( 'wp_less_cache_url', 'custom_less_cache_url' );


/* Enqueue CSS and JS
================================================== */
function spartan_scripts_and_styles() {

  global $wp_styles;

  if (!is_admin()) {

  	// wp_dequeue_style( 'sf-main' );
  	// wp_deregister_style( 'original-register-stylesheet-handle' );

		wp_register_style( 'style', get_stylesheet_directory_uri() . '/assets/less/app.less', array(), '' );

		wp_enqueue_style('style');

		wp_register_script( 'spartan-js', get_stylesheet_directory_uri() . '/assets/js/spartan.js', array( 'jquery' ), '', true );

		wp_enqueue_script( 'spartan-js' );

  }

}
add_action('wp_enqueue_scripts', 'spartan_scripts_and_styles', 999);


/* Enqueue wp-login CSS and JS
================================================== */
function spartan_login_scripts_and_styles() {

  global $wp_styles;

	wp_register_style( 'wp-login', get_stylesheet_directory_uri() . '/assets/less/login.less', array(), '' );

	wp_enqueue_style('wp-login');


}
add_action('login_enqueue_scripts', 'spartan_login_scripts_and_styles', 999);


/* Remove some admin menu items
================================================== */
function spartan_remove_menu_items() {

	wp_register_style( 'wp-remove', get_stylesheet_directory_uri() . '/assets/less/admin-remove.less', array(), 'all' );

	wp_enqueue_style('wp-remove');

}

function spartan_highlight_menu_items() {

	wp_register_style( 'wp-highlight', get_stylesheet_directory_uri() . '/assets/less/admin-highlight.less', array(), 'all' );

	wp_enqueue_style('wp-highlight');

}


if( is_admin() ) {

	$currnt_user = get_current_user_id( );

	if ($currnt_user == 1) {

		add_action( 'admin_print_scripts', 'spartan_highlight_menu_items' );

	} else {

		add_action( 'admin_print_scripts', 'spartan_remove_menu_items' );

	}

}


