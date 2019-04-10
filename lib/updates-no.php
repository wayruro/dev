<?php

  /*
  *
  * Spartan functions plugins & theme updates
  * ------------------------------------------------
  *
  *
  */

// remove_action('load-update-core.php','wp_update_plugins');
// add_filter('pre_site_transient_update_plugins','__return_null');


  /* Enables updates plugins
  ================================================== */
  add_filter( 'auto_update_plugin', '__return_false' );


  /* Enables updates themes
  ================================================== */
  add_filter( 'auto_update_theme', '__return_false' );


  /* Enable major version updates:
  ================================================== */
  // add_filter( 'allow_major_auto_core_updates', '__return_false' );


  /* Disable update emails
  ================================================== */
  add_filter( 'auto_core_update_send_email', '__return_false' );


/* hide update notifications
================================================== */
function hide_update_notice_to_all_but_admin_users(){
    if (!current_user_can('update_core')) {
        remove_action( 'admin_notices', 'update_nag', 3 );
    }
}
// add_action( 'admin_head', 'hide_update_notice_to_all_but_admin_users', 1 );


/* hide update notifications
================================================== */
function remove_core_updates(){
  global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}

add_filter('pre_option_update_core','remove_core_updates');
add_filter('pre_site_transient_update_core','remove_core_updates'); //hide updates for WordPress itself
add_filter('pre_site_transient_update_plugins','remove_core_updates'); //hide updates for all plugins
add_filter('pre_site_transient_update_themes','remove_core_updates'); //hide updates for all themes



function remove_dashboard_meta() {

  remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal'); //Removes the 'incoming links' widget
  remove_meta_box('dashboard_plugins', 'dashboard', 'normal'); //Removes the 'plugins' widget
  remove_meta_box('dashboard_primary', 'dashboard', 'normal'); //Removes the 'WordPress News' widget
  remove_meta_box('dashboard_secondary', 'dashboard', 'normal'); //Removes the secondary widget
  remove_meta_box('dashboard_quick_press', 'dashboard', 'side'); //Removes the 'Quick Draft' widget
  remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side'); //Removes the 'Recent Drafts' widget
  remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); //Removes the 'Activity' widget
  remove_meta_box('dashboard_right_now', 'dashboard', 'normal'); //Removes the 'At a Glance' widget
  remove_meta_box('dashboard_activity', 'dashboard', 'normal'); //Removes the 'Activity' widget (since 3.8)
  remove_meta_box('monsterinsights_reports_widget', 'dashboard', 'normal'); //Removes the 'Activity' widget (since 3.8)
  remove_meta_box('woo_vl_news_widget', 'dashboard', 'normal'); //Removes the 'Activity' widget (since 3.8)
  remove_meta_box('wpseo-dashboard-overview', 'dashboard', 'normal'); //Removes the 'Activity' widget (since 3.8)

}
add_action('admin_init', 'remove_dashboard_meta');



