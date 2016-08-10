<div class="clearfix content-type-<?php print drupal_clean_css_identifier($type); ?> content-display-<?php print drupal_clean_css_identifier($view_mode); ?>" id="content-<?php print $nid; ?>">
  <?php if ($display_submitted): ?>
    <div class="submitted">
      <?php print $submitted; ?>
    </div>
  <?php endif; ?>
  <div class="content"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </div>
  <?php print render($content['links']); ?>
  <?php print render($content['comments']); ?>
</div>
