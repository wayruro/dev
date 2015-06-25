<?php

/*
*
*	Spartan functions
*	------------------------------------------------
*
*
*/

/* Changing the logo link from wordpress.org to your site
==================================================== */
function spartan_login_url() {

	return home_url();

}
add_filter('login_headerurl', 'spartan_login_url');



/* changing the alt text on the logo to show your site name
==================================================== */
function spartan_login_title() {

	return get_option('blogname');

}
add_filter('login_headertitle', 'spartan_login_title');



/* Adding SVG support
==================================================== */
function cc_mime_types( $mimes ) {

	$mimes['svg'] = 'image/svg+xml';

	return $mimes;

}
add_filter( 'upload_mimes', 'cc_mime_types' );



/* auto-insert content to post editor
==================================================== */
function spartan_content($content) {

	$content .= '<h5>Thank you for developing with Spartan Theme.</h5>'. "\n";
	$content .= '<p>Read more about ';
	$content .= '<a href="http://spartantheme.com" target="_blank">Spartan Theme here</a>';
	$content .= '</p>'. "\n";

	return $content;
}
// add_filter('default_content', 'spartan_content');



/* Custom Backend Footer
==================================================== */
function spartan_custom_admin_footer() {

	// VARIABLES

	$iq ='server1.iquariusmedia.com' || 'server2.iquariusmedia.com';
	$spartan = 'ns1.wayruro.com' || 'ns2.wayruro.com';

	if ( gethostname() == $iq ) {

		$developer = 'iQuarius Media';
		$developer_url = 'http://iquariusmedia.com';

	} else if ( gethostname() == $spartan ) {

		$developer = 'Renzo Johnson';
		$developer_url = 'http://renzojohnson.com';

	} else {

		$developer = 'Renzo Johnson';
		$developer_url = 'http://renzojohnson.com';

	}

	$client = get_option('blogname');
	$client_url = home_url();



	$spartan_admin_footer = 'Developed for ';
	$spartan_admin_footer .= '<a href="'. $client_url .'">';
	$spartan_admin_footer .= $client;
	$spartan_admin_footer .= '</a>. Made Awesome by ';
	$spartan_admin_footer .= '<a href="' . $developer_url. '" target="_blank">'. $developer .'</a>.';

	echo $spartan_admin_footer;

}
add_filter( 'admin_footer_text', 'spartan_custom_admin_footer' );
