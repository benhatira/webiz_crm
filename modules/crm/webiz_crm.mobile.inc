<?php
function webiz_crm_mobile_case(){
  if($_GET['user']) {
    $node->type = 'mobile_case';
    $node->uid = 1;
    $node->status = 1;
    $node->title = $_GET['title'];
    $node->body = $_GET['body'];
    $node->teaser = $_GET['body'];
    $node->field_mobile_tel['0']['value'] = $_GET['tel'];
    $node->field_mobile_user['0']['value'] = $_GET['user'].".webiz.co.th";
    node_save($node);
    watchdog('mobile_case','Mobile case complete save.',WATCHDOG_INFO);
    $response['status'] = true;
  }else{
    $response['status'] = false;
    watchdog('mobile_case','Mobile case incomplete data.',WATCHDOG_WARNING);
  }
  echo $_GET['callback'].'('. json_encode($response).')';exit; 
}
