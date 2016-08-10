<!DOCTYPE html>
<!--[if IE 9]>         <html class="lt-ie10" lang="<?php print $language->language; ?>"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="<?php print $language->language; ?>"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <title><?php print $head_title; ?></title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="apple-touch-icon" href="/<?php print drupal_get_path('theme',$GLOBALS['theme']); ?>/img/touch-icon-iphone.png">
  <meta http-equiv="x-dns-prefetch-control" content="on"><link rel="dns-prefetch" href="http://cdnjs.cloudflare.com"><link rel="dns-prefetch" href="http://code.jquery.com"><link rel="dns-prefetch" href="http://maps.googleapis.com">
  <?php print $head; ?><?php print $styles; ?>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
<?php print $page_top; ?>
<?php print $page; ?>
<?php print $scripts; ?>
<?php print $page_bottom; ?>
</body>
</html>
<!-- thinkasone -->