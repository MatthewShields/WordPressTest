<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

if ( !defined('MATT_ROOT') )
  define('MATT_ROOT', dirname(__FILE__) . '/');

// Set your environment/url pairs
$environments = array(
  'local'       => 'wp-framework.localhost',
  'staging'     => ''
);

// Get the hostname
$http_host = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

// Loop through $environments to see if there’s a match
foreach($environments as $environment => $hostname) {
  if (stripos($http_host, $hostname) !== FALSE) {
    define('ENVIRONMENT', $environment);
    break;
  }
}

// Exit if ENVIRONMENT is undefined
if (!defined('ENVIRONMENT')) {
    define('ENVIRONMENT', 'production');
}

// Location of environment-specific configuration
$wp_db_config = 'wp-config/wp-db-' . ENVIRONMENT . '.php';

// Check to see if the configuration file for the environment exists
if (file_exists(__DIR__ . '/' . $wp_db_config)) {
  require_once($wp_db_config);
} else {
  // Exit if configuration file does not exist
  exit('No database configuration found for this host');
}

/* That’s all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
  define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');