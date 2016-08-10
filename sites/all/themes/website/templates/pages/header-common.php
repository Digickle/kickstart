<div id="container">
<header>

<?php if ($logo): ?>
  <div id="logo">
    <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>"></a>
  </div>
<?php endif; ?>

<?php if (isset($page['header'])): ?>
<div id="header">
  <?php print render($page['header']); ?>
</div>
<?php endif; ?>

  <nav id="primary-nav" class="clearfix">
  <?php if (!empty($primary_nav)): ?>
    <?php print render($primary_nav); ?>
  <?php endif; ?>

  <?php if (!empty($page['navigation'])): ?>
    <?php print render($page['navigation']); ?>
  <?php endif; ?>
  </nav>

</header>