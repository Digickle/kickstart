<?php

error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
ini_set('display_errors','on');

$databases = array (
  'default' =>
  array (
    'default' =>
    array (
      'database' => 'admin_kickstart',  // change this
      'username' => 'root',
      'password' => 'KlopgBo90n',
      'host' => 'localhost',
      'port' => '',
      'driver' => 'mysql',
      'prefix' => '',
    ),
  ),
);

// Logins last for a week
ini_set('session.gc_maxlifetime', 640800);
ini_set('session.cookie_lifetime', 640800);

$conf['robotstxt'] = 'User-agent: *
Disallow: /';

$conf['cache'] = FALSE;
$conf['page_compression'] = FALSE;
$conf['preprocess_css'] = FALSE;
$conf['css_gzip'] = FALSE;
$conf['preprocess_js'] = FALSE;
$conf['javascript_aggregator_gzip'] = FALSE;

$conf['securepages_enable'] = FALSE;
$conf['https'] = FALSE;

$conf['environment_indicator_overwrite'] = TRUE;
$conf['environment_indicator_overwritten_name'] = 'Development 🤓';
$conf['environment_indicator_overwritten_color'] = '#009aec';
$conf['environment_indicator_overwritten_text_color'] = '#ffffff';
