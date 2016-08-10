<div class="<?php print trim(str_replace('entity entity-bean bean-','block-',$classes) . strip_tags(render($content['field_block_class']))) ; ?>"<?php print $attributes; ?>>
  <?php
    print render($content);
  ?>
</div>