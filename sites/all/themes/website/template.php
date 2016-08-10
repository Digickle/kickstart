<?php

function website_preprocess_html(&$variables) {

  $exclude_nid = '';
  if (arg(0) == 'node' && is_numeric(arg(1)) && arg(2) == '') {
    $exclude_nid = 'page-node-' . arg(1);
  }
  elseif (arg(0) == 'taxonomy' && is_numeric(arg(2)) && arg(1) == 'term') {
    $exclude_nid = 'page-taxonomy-term-' . arg(2);
  }

  // Remove some cruddy Drupal classes

  $variables['classes_array'] = array_diff($variables['classes_array'], array(
    'html',
    'page-node',
    'page-node-',
    'node-type-page',
    'not-logged-in',
    'page-taxonomy',
    'page-taxonomy-term',
    'page-taxonomy-term-',
    $exclude_nid
  ));

}

function website_process_html(&$variables) {
  // Placeholder function
}

function website_html_head_alter(&$head_elements) {
  unset($head_elements['system_meta_generator']);
}

function website_preprocess_page(&$variables) {

  // For security, show a 404 instead of a 403

/*  $header = drupal_get_http_header("status");
  if ($header == "403 Forbidden") {
    drupal_deliver_page(MENU_NOT_FOUND);
    die();
  }*/

  //drupal_add_js('//platform.twitter.com/widgets.js','external');

  /* Use this for TypeKit
  drupal_add_css( drupal_get_path('theme',$GLOBALS['theme']) . '/css/fonts.css', array(
    'group' => CSS_SYSTEM,
    'every_page' => TRUE,
    'weight' => -99,
    'preprocess'=>FALSE,
  ));
  */
  if (isset($variables['node']) && $variables['node']->type) {
    if ($variables['node']->type == 'product') {
      // extra JS for node type
    }
  }


  // Page template suggestions based off of content types (exclude home page)
  if (!drupal_is_front_page() && isset($variables['node'])) {
    $variables['theme_hook_suggestions'][] = 'page__type__' . $variables['node']->type;
    $variables['theme_hook_suggestions'][] = 'page__node__' . $variables['node']->nid;
  }

}

function website_css_alter(&$css) {
  $exclude = array(
    'misc/vertical-tabs.css'                                              => FALSE,
    'modules/aggregator/aggregator.css'                                   => FALSE,
    'modules/block/block.css'                                             => FALSE,
    'modules/book/book.css'                                               => FALSE,
    'modules/comment/comment.css'                                         => FALSE,
    'sites/all/modules/contrib/ctools/ctools.css'                         => FALSE,
    'modules/dblog/dblog.css'                                             => FALSE,
    'modules/file/file.css'                                               => FALSE,
    'modules/field/theme/field.css'                                       => FALSE,
    'modules/filter/filter.css'                                           => FALSE,
    'modules/forum/forum.css'                                             => FALSE,
    'modules/help/help.css'                                               => FALSE,
    'modules/menu/menu.css'                                               => FALSE,
    'modules/node/node.css'                                               => FALSE,
    'modules/openid/openid.css'                                           => FALSE,
    'modules/poll/poll.css'                                               => FALSE,
    'modules/profile/profile.css'                                         => FALSE,
    'modules/search/search.css'                                           => FALSE,
    'modules/statistics/statistics.css'                                   => FALSE,
    'modules/syslog/syslog.css'                                           => FALSE,
    'modules/system/admin.css'                                            => FALSE,
    'modules/system/system.menus.css'                                     => FALSE,
    'modules/system/system.messages.css'                                  => FALSE,
    'modules/system/system.theme.css'                                     => FALSE,
    'modules/system/system.base.css'                                      => FALSE,
    'sites/all/modules/contrib/views/css/views.css'                       => FALSE,
    'modules/taxonomy/taxonomy.css'                                       => FALSE,
    'modules/tracker/tracker.css'                                         => FALSE,
    'modules/update/update.css'                                           => FALSE,
    'modules/user/user.css'                                               => FALSE,
    'sites/all/modules/contrib/date/date_popup/themes/datepicker.1.7.css' => FALSE,
    'sites/all/modules/contrib/date/date_api/date.css'                    => FALSE,
    'sites/all/modules/contrib/webform/css/webform.css'                   => FALSE,
    'sites/all/modules/contrib/logintoboggan/logintoboggan.css'           => FALSE,
    'sites/all/modules/contrib/typogrify/typogrify.css'                   => FALSE,
  );
  $css = array_diff_key($css, $exclude);
  unset($css[drupal_get_path('module', 'ctools') . '/css/ctools.css']);
}

function website_process_field(&$variables, $hook) {
  // Standard Drupal function, just with an addition for wysiwyg fields
  // to render the css consistently and easily.

  $variables['classes'] = implode(' ', $variables['classes_array']);

  if($variables['element']['#field_type'] == 'text_long' ||
    $variables['element']['#field_type'] == 'text_with_summary'){
    $variables['classes'] .= ' html-text-field';
  }

  $variables['attributes'] = empty($variables['attributes_array']) ? '' : drupal_attributes($variables['attributes_array']);
  $variables['title_attributes'] = empty($variables['title_attributes_array']) ? '' : drupal_attributes($variables['title_attributes_array']);
  $variables['content_attributes'] = empty($variables['content_attributes_array']) ? '' : drupal_attributes($variables['content_attributes_array']);
  foreach ($variables['items'] as $delta => $item) {
    $variables['item_attributes'][$delta] = empty($variables['item_attributes_array'][$delta]) ? '' : drupal_attributes($variables['item_attributes_array'][$delta]);
  }
}

function website_field($variables) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<div class="field-label"' . $variables['title_attributes'] . '>' . $variables['label'] . ':&nbsp;</div>';
  }

  // Render the items.
  foreach ($variables['items'] as $delta => $item) {
    $classes = 'field ' . ($delta % 2 ? 'odd' : 'even');
    $output .= '<div class="' . $classes . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</div>';
  }

  return $output;
}

function website_form_alter(&$form, $form_state, $form_id) {
  if ($form_id == 'views_exposed_form') {
    if (isset($form['distance']['search_distance'])) {
      $form['#id'] = drupal_html_id('dealer');
      //$form['distance']['postal_code']['#prefix'] = '<div class="form-left">';
      //$form['distance']['postal_code']['#suffix'] = '</div><div class="form-right">';
      $form['distance']['postal_code']['#title'] = 'Enter your postcode';
      $form['distance']['postal_code']['#attributes'] = array('placeholder' => 'POSTCODE');
      $form['distance']['postal_code']['#size'] = 16;
      $form['distance']['postal_code']['#maxlength'] = 8;

      //$form['submit']['#suffix'] = '</div>';

      $form['distance']['postal_code']['#id'] = drupal_html_id('stockist-postcode');

      $form['distance']['search_distance'] = array(
        '#type'    => 'select',
        '#id'      => 'selRadius',
        '#title'   => t('within (miles)'),
        '#options' => array(
          ''    => t('Distance'),
          '5'   => t('5'),
          '10'  => t('10'),
          '25'  => t('25'),
          '50'  => t('50'),
          '100' => t('100'),
        ),
        '#weight'  => 9,
      );

      $form['distance']['search_distance']['#default_value'] = '25';
      $form['distance']['search_units']['#access'] = FALSE;
    }
  }
}

function website_breadcrumb($variables) {

  $breadcrumb = $variables['breadcrumb'];

  if (!empty($breadcrumb) && count($breadcrumb) > 1) {
    $output = '';
    $output .= '<div id="breadcrumb">' . implode(' &gt; ', $breadcrumb) . '</div>';
    return $output;
  }
}

function website_links($links, $attributes = array()) {
  unset($links['links']['blog_usernames_blog']);
  return theme_links($links, $attributes);
}

function website_menu_alter(&$items) {
  // Remove access to add standard blocks page. Bleurgh.
  $items ['admin/structure/block/add']['access callback'] = FALSE;
  $items ['admin/structure/block/list/shiny/add']['access callback'] = FALSE;
  // Don't be install stuff through the CMS, either!
  $items ['admin/modules/install']['access callback'] = FALSE;
}

function website_preprocess_paragraphs_items(&$variables, $hook) {
  unset($variables['classes_array']);
}

function website_preprocess_node(&$variables) {

   switch($variables['type']) {

    case 'article':
      $article_date = $variables['field_article_date'][0]['value'];
      $article_date_array = explode('-',$article_date);
      $variables['article_date']['day'] = trim(substr($article_date_array[2],0,2));
      $variables['article_date']['month'] = $article_date_array[1];
      $variables['article_date']['year'] = $article_date_array[0];

      break;
  }

}

function website_preprocess_taxonomy_term(&$variables) {
  $variables['vocabulary'] = $variables['term']->vocabulary_machine_name;
}
?>