<?php

function webiz_crm_quality_check_pass_graph(){
  drupal_add_js(drupal_get_path('module', 'webiz_crm') .'/Highcharts/js/highcharts.js');
  drupal_add_js(drupal_get_path('module', 'webiz_crm') .'/Highcharts/js/modules/exporting.js');
  $vars = array();
  $date = date('Y-m-d',strtotime($date.'-6 day'));
  
  for($i=1;$i<=7;$i++){
  $sql = "SELECT COUNT(*) FROM {content_type_customer} WHERE field_customer_signup_date_value BETWEEN UNIX_TIMESTAMP( '".$date." 00:00:00' ) AND UNIX_TIMESTAMP( '".$date." 23:59:59') AND field_website_quality_value='%s' ";
  $result_pass = db_result(db_query($sql,'pass'));
  $vars['day'][$i] = $date;
  $vars['pass'][$i] = $result_pass;
  $date = date('Y-m-d',strtotime($date.'+1 day'));
  }

  $result = theme_render_template(drupal_get_path('module','webiz_crm').'/themes/quality_check_pass_graph.tpl.php',$vars);
  return $result;
  
}

?>