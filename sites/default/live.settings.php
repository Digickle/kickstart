<?php
error_reporting(0);
ini_set('display_errors','off');

$databases = array (
  'default' =>
  array (
    'default' =>
    array (
      'database' => 'CHANGEME',
      'username' => 'CHANGEME',
      'password' => 'CHANGEME',
      'host' => 'localhost',
      'port' => '',
      'driver' => 'mysql',
      'prefix' => '',
    ),
  ),
);

# $base_url = 'http://www.example.com';  // NO trailing slash!

$conf['environment_indicator_overwrite'] = TRUE;
$conf['environment_indicator_overwritten_name'] = 'LIVE 😱';
$conf['environment_indicator_overwritten_color'] = '#de6a6d';
$conf['environment_indicator_overwritten_text_color'] = '#ffffff';