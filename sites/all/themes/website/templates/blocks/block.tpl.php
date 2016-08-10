<?php
/*
  Default block template file. Cleans up the markup
*/
  if($classes){
    $classes_list = explode(' ', $classes);
    $keep = array('contextual-links-region','block');
    $classes = implode(' ', array_intersect($classes_list, $keep));
  }
?>
<div class="<?php print $classes; ?>"<?php print $attributes; ?> id="<?php print str_replace('bean-','',$block_html_id); ?>">
  <?php print render($title_prefix); ?>
<?php if ($block->subject): ?>
  <h3><?php print $block->subject ?></h3>
<?php endif;?>
  <?php print render($title_suffix); ?>
  <?php print $content ?>
</div>