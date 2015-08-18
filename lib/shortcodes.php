<?php

function foobar_func( $atts ){

	$breaz = sf_breadcrumbs();

	return $breaz;

}
add_shortcode( 'breadcrumbz', 'foobar_func' );


function spartan_home_url() { // lets avoid rewriting URLs when setting this puppy live - rj - may 6, 2015

  // $home_urls = site_url() . '/';
  // $home_urls = site_url();
  $home_urls = home_url();
  return $home_urls;

}
add_shortcode('home', 'spartan_home_url'); // [home] wherever you wanna call the home page URL

function spartan_wp_url() { // lets avoid rewriting URLs when setting this puppy live - rj - may 6, 2015

  // $home_urls = site_url() . '/';
  $home_urls = site_url();
  // $home_urls = home_url();
  return $home_urls;

}
add_shortcode('wp', 'spartan_wp_url'); // [home] wherever you wanna call the home page URL