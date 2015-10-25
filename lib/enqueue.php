<?php

/*
*
*	Spartan functions
*	------------------------------------------------
*
*
*/

/* Enqueue CSS and JS
================================================== */
if ( ! function_exists( 'spartan_scripts_and_styles' ) ) {
	function spartan_scripts_and_styles() {

	  global $wp_styles;

	  if (!is_admin()) {

	  	// wp_dequeue_style( 'sf-main' );
    	// wp_deregister_style( 'original-register-stylesheet-handle' );

			wp_register_style( 'app-' . SPARTAN_DEV_VERSION, get_stylesheet_directory_uri() . '/assets/less/app.less', array(), '' );

			wp_enqueue_style('app-' . SPARTAN_DEV_VERSION);

			wp_register_script( 'spartan-js', get_stylesheet_directory_uri() . '/assets/js/spartan.js', array( 'jquery' ), '', true );

			wp_enqueue_script( 'spartan-js' );

	  }

	}
	add_action('wp_enqueue_scripts', 'spartan_scripts_and_styles', 999);
}


/* Enqueue wp-login CSS and JS
================================================== */
if ( ! function_exists( 'spartan_login_scripts_and_styles' ) ) {
	function spartan_login_scripts_and_styles() {

	  global $wp_styles;

		wp_register_style( 'wp-login', get_stylesheet_directory_uri() . '/assets/less/admin/login.less', array(), '' );

		wp_enqueue_style('wp-login');

	}
	add_action('login_enqueue_scripts', 'spartan_login_scripts_and_styles', 999);
}


/* Remove some admin menu items
================================================== */
if ( ! function_exists( 'spartan_remove_menu_items' ) ) {
	function spartan_remove_menu_items() {

		wp_register_style( 'wp-remove', get_stylesheet_directory_uri() . '/assets/less/admin/remove.less', array(), 'all' );

		wp_enqueue_style('wp-remove');

	}
}

if ( ! function_exists( 'spartan_highlight_menu_items' ) ) {
	function spartan_highlight_menu_items() {

		wp_register_style( 'wp-highlight', get_stylesheet_directory_uri() . '/assets/less/admin/highlight.less', array(), 'all' );

		wp_enqueue_style('wp-highlight');

		wp_register_style( 'wp-editors', get_stylesheet_directory_uri() . '/assets/less/admin/editor.less', array(), '' );

		wp_enqueue_style('wp-editors');

	}
}


/* Editor styles
================================================== */
if ( ! function_exists( 'sf_add_editor_style' ) ) {
	function sf_add_editor_style() {
	    add_editor_style( 'assets/css/wp-editors.css' );
	}
	add_action( 'init', 'sf_add_editor_style' );
}


/* Style admin
================================================== */
if( is_admin() ) {

	$currnt_user = get_current_user_id( );

	if ($currnt_user == 1) {

		add_action( 'admin_print_scripts', 'spartan_highlight_menu_items' );

	} else {

		add_action( 'admin_print_scripts', 'spartan_remove_menu_items' );

	}

}
