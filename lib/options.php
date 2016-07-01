<?php
/* Options and settings
  ================================================== */
// define ('WP_POST_REVISIONS', false ) ;
// define ('WP_POST_REVISIONS', 0 );
//Remove revisions actions in post.php
remove_action('pre_post_update', 'wp_save_post_revision');

// delete post revisions from wordpress
$wpdb->query( "
    DELETE FROM $wpdb->posts
    WHERE post_type = 'revision'
" );
