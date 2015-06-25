<?php

/*
*
*	Spartan functions
*	------------------------------------------------
*
*
*/

/* Add to custom meta to the <head>
==================================================== */
function spartan_meta() {

	$spartan_head_meta = '<meta name="robots" content="NOODP,NOYDIR">'. "\n";
	$spartan_head_meta .= '<meta name="geo.region" content="US-FL">'. "\n";
	$spartan_head_meta .= '<meta name="geo.placename" content="Orlando">'. "\n";
	$spartan_head_meta .= '<meta name="geo.position" content="28.541163,-81.379257">'. "\n";
	$spartan_head_meta .= '<meta name="ICBM" content="28.541163,-81.379257">'. "\n";
	$spartan_head_meta .= '<meta name="application-name" content="' . get_bloginfo('name') . '">'. "\n";

	echo $spartan_head_meta;

}
add_action('wp_head', 'spartan_meta', 5);



/* Custom WordPress login logo (child theme)
==================================================== */
if (!function_exists('sf_custom_login_logo')) {
	function sf_custom_login_logo() {

		$options = get_option('sf_dante_options');
		$custom_logo = "";

		if (isset($options['custom_admin_login_logo'])) {

			$custom_logo = $options['custom_admin_login_logo'];

		}

		if ($custom_logo) {

			echo '<style type="text/css">
			    .login h1 a { background-image:url('. $custom_logo .') !important; height: 95px!important; width: 100%!important; background-size: auto!important; text-indent: -99999rem !important; }
			</style>';

		} else {

			echo '<style type="text/css">
			    .login h1 a { background-image: none !important; width: 100%!important; background-size: auto!important; }
			</style>';

		}

	}
	add_action('login_head', 'sf_custom_login_logo');
}



/* Custom items to the header right after <body>
================================================== */
function spartan_header() {

	$spartan_header_output = '<div class="hide">';
	// $spartan_header_output .= '<p>Custom Header</p>';
	$spartan_header_output .= '</div>';

	echo $spartan_header_output;
}
// add_filter( 'wp_head' , 'spartan_header' , 100 );


/* Custom items to the footer right before </body>
================================================== */
function spartan_footer() {

   $spartan_footer_output = '<span class="hide">'. "\n";
   $spartan_footer_output .= '<p>Custom Footer</p>';
   // $spartan_footer_output .= do_shortcode( '[sf_modal header="check this name!" btn_text="Find Out More"][contact-form-7 id="4"][/sf_modal]' );
   $spartan_footer_output .= '</span>'. "\n";

   echo $spartan_footer_output;
}
// add_filter( 'wp_footer' , 'spartan_footer' , 14 );
