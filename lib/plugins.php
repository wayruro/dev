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
      'name'    => 'P3 (Plugin Performance Profiler)',
      'slug'    => 'p3-profiler',
      'required'  => true,
    ),

    array(
      'name'    => 'WP Fastest Cache',
      'slug'    => 'wp-fastest-cache',
      'required'  => true,
    ),

    array(
      'name'    => 'The Events Calendar',
      'slug'    => 'the-events-calendar',
      'required'  => true,
    ),

    array(
      'name'    => 'Blocks',
      'slug'    => 'blocks',
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
      'name'    => 'Disable Comments',
      'slug'    => 'disable-comments',
      'required'  => true,
    ),

    array(
      'name'    => 'Image Cleanup',
      'slug'    => 'image-cleanup',
      'required'  => true,
    ),

    array(
      'name'    => 'Regenerate Thumbnails',
      'slug'    => 'regenerate-thumbnails',
      'required'  => true,
    ),

    array(
      'name'    => 'WP Email Template',
      'slug'    => 'wp-email-template',
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
      'name'    => 'Timber',
      'slug'    => 'timber-library',
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
      'name'    => 'WP Email Template',
      'slug'    => 'wp-email-template',
      'required'  => true,
    )

  );


  $config = array(
      'default_path' => '',                      // Default absolute path to pre-packaged plugins.
      'menu'         => 'tgmpa-install-plugins', // Menu slug.
      'has_notices'  => true,                    // Show admin notices or not.
      'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
      'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
      'is_automatic' => false,                   // Automatically activate plugins after installation or not.
      'message'      => '',                      // Message to output right before the plugins table.
      'strings'      => array(
          'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
          'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
          'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
          'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
          'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
          'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
          'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
          'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
          'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
          'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
          'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
          'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
          'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
          'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
          'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
          'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
          'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
          'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
      )
  );


  tgmpa( $plugins );
}
