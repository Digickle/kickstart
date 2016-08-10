<?php

hide($content['field_image']);
hide($content['field_body']);
hide($content['field_image_position']);

?>
<div class="content-image-and-text"<?php print $attributes; ?>>
<?php
  $pos = trim(render($content['field_image_position']));

  switch($pos){
    case 'left':
?>
  <div class="image-left">
    <?php print render($content['field_image']); ?>
    <?php print render($content['field_body']); ?>
  </div>
<?php
    break;
    case 'right':
?>
  <div class="image-right">
    <?php print render($content['field_body']); ?>
    <?php print render($content['field_image']); ?>
  </div>
<?php
    break;
  }

print render($content);
?>
</div>
