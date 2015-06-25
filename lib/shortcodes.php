<?php

function foobar_func( $atts ){

	$breaz = sf_breadcrumbs();

	return $breaz;

}
add_shortcode( 'breadcrumbz', 'foobar_func' );