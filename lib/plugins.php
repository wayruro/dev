<?php

/**
 * Spartan required plugins
 *
 * ------------------------------------------------------------------------------
 * The $partan_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/SpartanTheme/st
 */

add_action( 'tgmpa_register', 'spartan_required_plugins' );
function spartan_required_plugins() {
  $plugins = array(

    array(
      'name'    => 'The Events Calendar',
      'slug'    => 'the-events-calendar',
      'required'  => true,
    ),

    array(
      'name'    => 'Breadcrumb NavXT',
      'slug'    => 'breadcrumb-navxt',
      'required'  => true,
    ),

    array(
      'name'    => 'Contact Form 7',
      'slug'    => 'contact-form-7',
      'required'  => true,
    ),

    array(
      'name'    => 'Contact Form 7 Campaign Monitor Extension',
      'slug'    => 'contact-form-7-campaign-monitor-extension',
      'required'  => true,
    ),

    array(
      'name'    => 'Contact Form 7 Honeypot',
      'slug'    => 'contact-form-7-honeypot',
      'required'  => true,
    ),

    array(
      'name'    => 'Duplicator',
      'slug'    => 'duplicator',
      'required'  => true,
    ),

    array(
      'name'    => 'Duplicate Post',
      'slug'    => 'duplicate-post',
      'required'  => true,
    ),

    array(
      'name'    => 'Autoptimize',
      'slug'    => 'autoptimize',
      'required'  => true,
    ),

    array(
      'name'    => 'underConstruction',
      'slug'    => 'underconstruction',
      'required'  => true,
    ),

    array(
      'name'    => 'Simple Custom Post Order',
      'slug'    => 'simple-custom-post-order',
      'required'  => true,
    ),


    array(
      'name'    => 'Bad Behavior',
      'slug'    => 'bad-behavior',
      'required'  => true,
    ),


    array(
      'name'    => 'Google Analytics by Yoast',
      'slug'    => 'google-analytics-for-wordpress',
      'required'  => true,
    ),

    array(
      'name'    => 'WordPress SEO by Yoast',
      'slug'    => 'wordpress-seo',
      'required'  => true,
    ),

    array(
      'name'    => 'WP Super Cache',
      'slug'    => 'wp-super-cache',
      'required'  => true,
    )

  );

  tgmpa( $plugins, $config );
}
