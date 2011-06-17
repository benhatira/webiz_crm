<?php

/**
 * Implementation of hook_fieldgroup_default_groups().
 */
function webiz_crm_fieldgroup_default_groups() {
  $groups = array();

  // Exported group: group_admin
  $groups['customer-group_admin'] = array(
    'group_type' => 'standard',
    'type_name' => 'customer',
    'group_name' => 'group_admin',
    'label' => 'ผู้ดูแล',
    'settings' => array(
      'form' => array(
        'style' => 'fieldset_collapsed',
        'description' => '',
      ),
      'display' => array(
        'weight' => '-2',
        'label' => 'above',
        'teaser' => array(
          'format' => 'fieldset',
          'exclude' => 0,
        ),
        'full' => array(
          'format' => 'fieldset',
          'exclude' => 0,
        ),
        'description' => '',
        '4' => array(
          'format' => 'fieldset',
          'exclude' => 0,
        ),
      ),
    ),
    'weight' => '-2',
    'fields' => array(
      '0' => 'field_customer_admin_name',
      '1' => 'field_customer_admin_phone',
      '2' => 'field_customer_admin_email',
    ),
  );

  // Exported group: group_business
  $groups['customer-group_business'] = array(
    'group_type' => 'standard',
    'type_name' => 'customer',
    'group_name' => 'group_business',
    'label' => 'บริษัท',
    'settings' => array(
      'form' => array(
        'style' => 'fieldset_collapsed',
        'description' => '',
      ),
      'display' => array(
        'weight' => '-3',
        'label' => 'above',
        'teaser' => array(
          'format' => 'fieldset',
          'exclude' => 0,
        ),
        'full' => array(
          'format' => 'fieldset',
          'exclude' => 0,
        ),
        'description' => '',
        '4' => array(
          'format' => 'fieldset',
          'exclude' => 0,
        ),
      ),
    ),
    'weight' => '-3',
    'fields' => array(
      '0' => 'field_customer_biztype',
      '1' => 'field_customer_bizcat',
    ),
  );

  // Exported group: group_contact
  $groups['customer-group_contact'] = array(
    'group_type' => 'standard',
    'type_name' => 'customer',
    'group_name' => 'group_contact',
    'label' => 'ข้อมูลติดต่อ',
    'settings' => array(
      'form' => array(
        'style' => 'fieldset_collapsed',
        'description' => '',
      ),
      'display' => array(
        'weight' => '-1',
        'label' => 'above',
        'teaser' => array(
          'format' => 'fieldset',
          'exclude' => 0,
        ),
        'full' => array(
          'format' => 'fieldset',
          'exclude' => 0,
        ),
        'description' => '',
        '4' => array(
          'format' => 'fieldset',
          'exclude' => 0,
        ),
      ),
    ),
    'weight' => '-1',
    'fields' => array(
      '0' => 'field_customer_address',
      '1' => 'field_customer_subdistrict',
      '2' => 'field_customer_district',
      '3' => 'field_customer_zipcode',
      '4' => 'field_customer_province',
      '5' => 'field_customer_latitude',
      '6' => 'field_customer_longitude',
      '7' => 'field_customer_phone',
      '8' => 'field_customer_email',
    ),
  );

  // Exported group: group_webiz
  $groups['customer-group_webiz'] = array(
    'group_type' => 'standard',
    'type_name' => 'customer',
    'group_name' => 'group_webiz',
    'label' => 'เว็บบิส',
    'settings' => array(
      'form' => array(
        'style' => 'fieldset_collapsed',
        'description' => '',
      ),
      'display' => array(
        'weight' => '-4',
        'label' => 'above',
        'teaser' => array(
          'format' => 'fieldset',
          'exclude' => 0,
        ),
        'full' => array(
          'format' => 'fieldset',
          'exclude' => 0,
        ),
        'description' => '',
        '4' => array(
          'format' => 'fieldset',
          'exclude' => 0,
        ),
      ),
    ),
    'weight' => '-4',
    'fields' => array(
      '0' => 'field_customer_domain',
      '1' => 'field_customer_campaign',
      '2' => 'field_customer_webiz_id',
    ),
  );

  // Translatables
  array(
    t('ข้อมูลติดต่อ'),
    t('บริษัท'),
    t('ผู้ดูแล'),
    t('เว็บบิส'),
  );

  return $groups;
}
