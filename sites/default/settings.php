<?php

$update_free_access = FALSE;
$drupal_hash_salt = @base64_encode(md5($_SERVER["SERVER_ADDR"] . $_SERVER["SERVER_NAME"]));

ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 100);

ini_set('session.gc_maxlifetime', 86400);
ini_set('session.cookie_lifetime', 86400);

$conf['404_fast_paths_exclude'] = '/\/(?:styles)\//';
$conf['404_fast_paths'] = '/\.(?:txt|png|gif|jpe?g|css|js|ico|swf|flv|cgi|bat|pl|dll|exe|asp)$/i';
$conf['404_fast_html'] = '<!DOCTYPE html><html><head><title>Not Found</title></head><body><h1>Not Found</h1><p>The requested URL "@path" was not found.</p></body></html>';

if (isset($_SERVER['SCRIPT_FILENAME']) && strpos($_SERVER['SCRIPT_FILENAME'], 'drush') !== FALSE) {
  if (strpos($_SERVER['PWD'], 'oneclients') !== FALSE) {
    if (strpos($_SERVER['PWD'], 'staging') !== FALSE) {
      require_once('staging.settings.php');
    } else {
      require_once('dev.settings.php');
    }
  } else {
    require_once('live.settings.php');
  }

} else {

  if ($_SERVER["SERVER_ADDR"] == '46.20.231.83') {
    if ($_SERVER["SERVER_NAME"] == 'staging.oneclients.co.uk') {
      // Staging Environment
      require_once('staging.settings.php');
    } else {
      // Dev Environment
      require_once('dev.settings.php');
    }
  } else {
    //Live Environment
    require_once('live.settings.php');
  }
}