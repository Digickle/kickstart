<?php
if ($_SERVER["SERVER_NAME"] == 'kickstart.oneclients.co.uk') { ?>
<h1>*** Please do not edit this site!!! ***</h1>
<?php }
require_once('header-common.php'); ?>

<?php if ($page['sidebar_first']): ?>
<aside id="sidebar-first">
  <?php print render($page['sidebar_first']); ?>
</aside>
<?php endif; ?>

<section id="node">
  <?php if($breadcrumb): ?>
  <div id="breadcrumb">
    <?php print $breadcrumb; ?>
  </div>
  <?php endif; ?>

  <?php if ($title): ?>
    <?php print render($title_prefix); ?>
    <h1 id="page-title"><?php print $title; ?></h1>
    <?php print render($title_suffix); ?>
  <?php endif; ?>

  <article>

    <?php if ($messages): ?>
      <div id="console" class="clearfix"><?php print $messages; ?></div>
    <?php endif; ?>

    <?php if ($tabs): ?>
      <?php print render($tabs); ?>
    <?php endif; ?>

    <?php if ($page['help']): ?>
      <div id="help">
        <?php print render($page['help']); ?>
      </div>
    <?php endif; ?>

    <?php if ($page['content_before']): ?>
    <div id="content-before">
      <?php print render($page['content_before']); ?>
    </div>
    <?php endif; ?>

    <?php if ($page['content']): ?>
    <div id="main-content">
      <?php print render($page['content']); ?>
    </div>
    <?php endif; ?>

    <?php if ($page['content_after']): ?>
    <div id="content-after">
      <?php print render($page['content_after']); ?>
    </div>
    <?php endif; ?>

  </article>

</section>

<?php if ($page['sidebar_second']): ?>
<aside id="sidebar-second">
  <?php print render($page['sidebar_second']); ?>
</aside>
<?php endif; ?>

<?php require_once('footer-common.php'); ?>