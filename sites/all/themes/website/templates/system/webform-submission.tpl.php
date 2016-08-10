<?php

// Double-spacing the submission output, if this is a default-template,
// plaintext email.
if (!empty($email['template']) && $email['template'] == 'default') {
  foreach ($renderable as $key => $webform_field) {
    if (strpos($key, '#') !== 0) { // This is a child render array = submission field.
      $renderable[$key]['#prefix'] = "\n";
    }
  }
}

print drupal_render_children($renderable);