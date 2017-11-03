<?php
/**
 * Spartan includes/functions
 *
 * ------------------------------------------------------------------------------
 * The $partan_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/SpartanTheme/st
 */

define( 'SPARTAN_DEV_VERSION', '0.1.2' ); //Nov 3 2017

$spartan_includes = array(

  'lib/less.php',
  'lib/enqueue.php',
  'lib/admin.php',
  'lib/updates.php',
  'lib/plugins.php',
  'lib/custom.php',
  'lib/remove.php',
  'lib/tools.php',
  'lib/overrides.php',
  'lib/metaboxes.php',
  'lib/options.php',
  'lib/shortcodes.php',
  'views/timber-init.php',

);

foreach ($spartan_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'spartan'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);


