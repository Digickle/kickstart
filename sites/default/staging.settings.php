<?php

error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
ini_set('display_errors','on');

$databases = array (
  'default' =>
  array (
    'default' =>
    array (
      'database' => 'admin_staging',
      'username' => 'admin_staging',
      'password' => 'staging',
      'host' => 'localhost',
      'port' => '',
      'driver' => 'mysql',
      'prefix' => '',
    ),
  ),
);

$conf['robotstxt'] = 'User-agent: *
Disallow: /';

$conf['environment_indicator_overwrite'] = TRUE;
$conf['environment_indicator_overwritten_name'] = 'Staging 🍰';
$conf['environment_indicator_overwritten_color'] = '#3CD8C6';
$conf['environment_indicator_overwritten_text_color'] = '#ffffff';