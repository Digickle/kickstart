<?php
/**
 * @file
 * Flexnav module settings.
 */

/**
 * Flexnav settings form.
 */
function flexnav_settings_form() {
  $form['container'] = array(
    '#type' => 'fieldset',
    '#title' => t('Flexnav Settings'),
  );
  $form['container']['flexnav_block_count'] = array(
    '#type' => 'textfield',
    '#title' => t('Number of Flexnav blocks'),
    '#default_value' => variable_get('flexnav_block_count', 1),
    '#description' => t('Set the number of Flexnav blocks available on the <a href="@url">blocks page</a>. (Configure menu settings per block.)', array(
      '@url' => url('admin/structure/block'),
    )),
  );
  $form['container']['flexnav_active_trail'] = array(
    '#type' => 'checkbox',
    '#title' => t('Automatically set <code>active-trail</code> CSS class.'),
    '#default_value' => variable_get('flexnav_active_trail', TRUE),
    '#description' => t('Adds the class with JavaScript similar to how the <code>active</code> CSS class is added.'),
  );

  return system_settings_form($form);
}
