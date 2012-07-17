<?php

function webiz_crm_callcenter_log_score_v1(){
  global $user;
  $nid = $_REQUEST['nid'];
  $type_call = $_REQUEST['type_call'];
  $node = node_load($nid);
  $uid = $node->field_customer_webiz_id[0]['value'];
  $domain = $node->field_customer_custom_domain[0]['value'];
  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
  $msg = "callcenter submit before call to customer $type_call";
  //print_r($node);
   
   $username = db_result(db_query("SELECT name FROM webiz_production.users WHERE uid = ".$uid));
   
   $url = 'http://crm.webiz.co.th/api/score/v1/1cbccf22aafd8057dd82e5540c9e3ba1/'.$username;
   $score = webiz_crm_get_quailty_score($url);
  
  db_set_active('webiz_crm_cc');
  $sql="INSERT INTO {watchdog_log_score_quality} (`nid`,`uid`,`before`,`message`,`location`,`hostname`,`timestamp`) VALUES ('%d','%d','%d','%s','%s','%s','%s') ";
  $result = db_query($sql,$nid,$user->uid,$score,$msg,$domain,$ip,time());
  
    echo "yes";
  
  db_set_active('default');
} 



/* gets the data from a URL */
function webiz_crm_get_quailty_score($url)
{
  $ch = curl_init();
  $timeout = 5;
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}


function webiz_crm_info_score_quality(){
  $vars['nid'] = $_REQUEST['nid'];
  $result = theme_render_template(drupal_get_path('module','webiz_crm').'/themes/callcenter_score.tpl.php',$vars);
  echo $result;
}

