<?php

/**
 * Implementation of hook_node_info().
 */
function webiz_crm_node_info() {
  $items = array(
    'customer' => array(
      'name' => t('Customer'),
      'module' => 'features',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('ชื่อบริษัท'),
      'has_body' => '1',
      'body_label' => t('Body'),
      'min_word_count' => '0',
      'help' => '',
    ),
  );
  return $items;
}
