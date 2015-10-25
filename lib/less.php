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
if ( ! class_exists( 'wp_less' ) ) {
	require_once locate_template('/lib/wp-less/wp-less.php' );
}

if ( ! function_exists( 'custom_less_cache_path' ) ) {
	function custom_less_cache_path( $path ) {
	    return get_stylesheet_directory().'/assets/css';
	}
	add_filter( 'wp_less_cache_path', 'custom_less_cache_path' );
}

if ( ! function_exists( 'custom_less_cache_url' ) ) {
	function custom_less_cache_url( $url ) {
	    return get_stylesheet_directory_uri().'/assets/css';
	}
	add_filter( 'wp_less_cache_url', 'custom_less_cache_url' );
}


