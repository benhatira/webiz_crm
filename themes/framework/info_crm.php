<html>
<head>
  <title>johnny</title>
</head>
<body>
     <?php
     
          $info = array();

          $nid = $_POST['nid'];
          $node = node_load($nid);
          $info['address'] = $node->field_customer_address[0]['value'];
          $info['email'] = $node->field_customer_admin_email[0]['value'];
          $info['name'] = $node->field_customer_admin_name[0]['value'];
          $info['phone'] = $node->field_customer_admin_phone[0]['value'];
          $info['bizcat'] = $node->field_customer_bizcat[0]['value'];
          $info['biztype'] = $node->field_customer_biztype[0]['value'];
          $info['campaign'] = $node->field_customer_campaign[0]['value'];
          $info['district'] = $node->field_customer_district[0]['value'];
          $info['province'] = $node->field_customer_province[0]['value'];
          $info['subdistrict'] = $node->field_customer_subdistrict[0]['value'];
          $info['zipcode'] = $node->field_customer_zipcode[0]['value'];
          $info['custom_domain'] = $node->field_customer_custom_domain[0]['value'];
          $info['webiz_domain'] = $node->field_customer_webiz_domain[0]['value'];
          $info['site_status'] = $node->field_customer_site_status[0]['value'];
          print_r($info);
          exit;
     
     
     
     ?>
</body>