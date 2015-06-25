<?php
/* Remove some custom post types
  ================================================== */
if ( ! function_exists( 'spartan_unregister_themcptypes' ) ) :

  function spartan_unregister_theme_cptypes() {

      global $wp_post_types;

      foreach( array( 'portfolio',  'galleries', 'team', 'clients', 'testimonials', 'jobs', 'faqs',  ) as $post_type ) {

          if ( isset( $wp_post_types[ $post_type ] ) ) {
              unset( $wp_post_types[ $post_type ] );
          }

      }
  }

endif;
// add_action( 'init', 'spartan_unregister_theme_cptypes', 20 );



/* remove WP version from scripts
==================================================== */
function spartan_remove_wp_ver_css_js( $src ) {

	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );

	return $src;

}



/* Head cleanup
==================================================== */
function spartan_head_cleanup() {

	remove_action( 'wp_head', 'feed_links_extra', 3 ); 												// category feeds
	remove_action( 'wp_head', 'feed_links', 2 ); 															// post and comment feeds
	remove_action( 'wp_head', 'rsd_link' ); 																	// EditURI link
	remove_action( 'wp_head', 'wlwmanifest_link' ); 													// windows live writer
	remove_action( 'wp_head', 'index_rel_link' ); 														// index link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); 								// previous link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); 								// start link
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); 		// links for adjacent posts
	remove_action( 'wp_head', 'wp_generator' ); 															// WP version

	add_filter( 'style_loader_src', 'spartan_remove_wp_ver_css_js', 9999 ); 	// remove WP version from css
	add_filter( 'script_loader_src', 'spartan_remove_wp_ver_css_js', 9999 ); 	// remove WP version from scripts

} // added in spartan()



/* remove WP version from RSS
==================================================== */
function spartan_rss_version() {

	return '';

} // added in spartan()



/* Launch Spartan
==================================================== */
function spartan() {

	add_action( 'init', 'spartan_head_cleanup' );
	add_filter( 'the_generator', 'spartan_rss_version' );
	// add_action( 'wp_enqueue_scripts', 'bones_scripts_and_styles', 999 );

}
add_action( 'after_setup_theme', 'spartan' );



/* Remove some items for non admin 1
==================================================== */
function spartan_user() {

	if( is_admin() ) {

		$currnt_user = get_current_user_id( );

		if ($currnt_user == 1) {

	    $spartan_yes .= '<div style="position:fixed; left:0; bottom:0; z-index:9999;">Hola: '.$currnt_user.'</div>';
	    $spartan_yes .= '<style type="text/css">';
	    $spartan_yes .= '#toplevel_page_sf_theme_options,#toplevel_page_themepunch-google-fonts{border-left:1px solid red !important}';
	    $spartan_yes .= '</style>';

	    echo $spartan_yes;

		} else {

	    $spartan_not .= '<div style="position:fixed; left:0; bottom:0; z-index:9999;">How are you '.$currnt_user.'</div>';
	    $spartan_not .= '<style type="text/css">';
	    $spartan_not .= '#toplevel_page_sf_theme_options,#toplevel_page_themepunch-google-fonts{display:none !important}';
	    $spartan_not .= '</style>';

	    echo $spartan_not;

		}

	}

}
// add_action( 'init', 'spartan_user' );




