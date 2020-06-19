<?php
/* Remove some thumbnails sizes
  ================================================== */

add_filter('max_srcset_image_width', create_function('', 'return 1;'));


function remove_extra_image_sizes() { // To remove all the image sizes keeping only the default WordPress image sizes DOES NOT REMOVE CORE SIZES
    foreach ( get_intermediate_image_sizes() as $size ) {
        if ( !in_array( $size, array(
          // 'suprema_qodef_landscape',
          'woocommerce_thumbnail',
          'woocommerce_single'
          // 'woocommerce_gallery_thumbnail'

        ) ) ) {
            remove_image_size( $size );
        }
    }
}
add_action('init', 'remove_extra_image_sizes');




function wpdocs_remove_plugin_image_sizes() { // To remove specific image sizes DOES NOT REMOVE CORE SIZES
    remove_image_size( 'woocommerce_thumbnail' );
    add_image_size( 'woocommerce_thumbnail', 300, 300, true );
}
add_action('init', 'wpdocs_remove_plugin_image_sizes');


add_filter('intermediate_image_sizes', function($sizes) { // This CAN remove core sizes
    return array_diff($sizes, ['thumbnail','medium','medium_large','large']);
});




function wdo_disable_srcset( $sources ) {
    return false;
}
add_filter( 'wp_calculate_image_srcset', 'wdo_disable_srcset' );


remove_filter( 'wp_calculate_image_srcset_meta', '__return_null' ); // Remove that filter
the_post_thumbnail();  // Display post thumbnail
add_filter( 'wp_calculate_image_srcset_meta', '__return_null' ); // add srcset filter back