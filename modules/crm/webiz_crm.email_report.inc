<?php 
function webiz_crm_register_report($send=0){ //palm report 
  $vars = array();
  $date = date('Y-m-d');
  $dateTH = webiz_crm_thaidate($date);
  $result_sms_today = db_query("SELECT webiz_sms_data.phone FROM webiz_sms_data WHERE webiz_sms_data.timestamp BETWEEN UNIX_TIMESTAMP(  '".$date." 00:00:00' ) AND UNIX_TIMESTAMP(  '".$date." 23:59:59' ) GROUP BY webiz_sms_data.phone");
  $result_sms_reg = db_query("SELECT webiz_sms_data.phone FROM content_type_customer INNER JOIN `webiz_sms_data` ON content_type_customer.field_customer_admin_phone_value = webiz_sms_data.phone WHERE field_customer_signup_date_value BETWEEN UNIX_TIMESTAMP( '".$date." 00:00:00' ) AND UNIX_TIMESTAMP( '".$date." 23:59:59' ) GROUP BY webiz_sms_data.phone");
  $count_all_reg = db_result(db_query("select count(*) from webiz_production.users where created  BETWEEN UNIX_TIMESTAMP( '".$date." 00:00:00' ) AND UNIX_TIMESTAMP( '".$date." 23:59:59' )"));
   
  $count_sms_today=0;
  while($fetch1 = db_fetch_array($result_sms_today)){
     $count_sms_today=$count_sms_today+1;
   }
  
  $count_sms_reg=0;
  while($fetch2 = db_fetch_array($result_sms_reg)){
     $count_sms_reg=$count_sms_reg+1;
   }

  $vars['today']['sms_all'] = $count_sms_today;  
  $vars['today']['sms_reg'] = $count_sms_reg;
  $vars['today']['reg_all'] = $count_all_reg;
  $vars['today']['timestamp'] = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
  $vars['today']['date'] = webiz_crm_thaidate('lที่ j F Y ', $vars['today']['timestamp']);
  $vars['today']['dateEN'] = $date; 
  
  $vars['overall_publish'] = db_result(db_query("SELECT COUNT(*) FROM {content_type_customer as ctc} WHERE ctc.field_customer_site_status_value = 1")); 
  //  $unpublish = db_result(db_query("SELECT COUNT(*) FROM {content_type_customer as ctc} WHERE ctc.field_customer_site_status_value = 0"));
  //  $banned = db_result(db_query("SELECT COUNT(*) FROM {content_type_customer as ctc} WHERE ctc.field_customer_site_status_value = -1"));
  
  $startTime = mktime(0, 0, 0, date('m'), date('d')-1, date('Y'));     
  $endTime = mktime(23, 59, 59, date('m'), date('d')-1, date('Y'));
  $vars['yesterday']['date'] = webiz_crm_thaidate('lที่ j F Y ', $startTime);
  $vars['yesterday']['timestamp'] = $startTime;
  $count_all_reg2 = db_result(db_query("select count(*) from webiz_production.users where created  BETWEEN '".$startTime."' and '".$endTime."'"));
  
  $vars['yesterday']['reg_all'] = $count_all_reg2;
  $vars['overall_reg']  =  db_result(db_query("SELECT count FROM `webiz_crm_report_register_graph` order by time desc limit 0,1"));
  $vars['overall_domain']  =  db_result(db_query("SELECT count(field_customer_domain_status_value) FROM content_type_customer WHERE field_customer_domain_status_value = 1"));
  $result_sms_all_yes = db_query("SELECT webiz_sms_data.phone FROM webiz_sms_data WHERE webiz_sms_data.timestamp BETWEEN '".$startTime."' and '".$endTime."' GROUP BY webiz_sms_data.phone");
  
  $result_sms_yes = db_query("SELECT webiz_sms_data.phone FROM content_type_customer INNER JOIN `webiz_sms_data` ON content_type_customer.field_customer_admin_phone_value = webiz_sms_data.phone WHERE field_customer_signup_date_value BETWEEN '".$startTime."' and '".$endTime."' GROUP BY webiz_sms_data.phone");
  
  $sql_published = "SELECT FROM_UNIXTIME(users.created)
                   FROM webiz_production.node
                   LEFT JOIN webiz_production.content_type_site site ON node.nid = site.nid
                   LEFT JOIN webiz_production.webiz_admin_contact admin ON admin.uid = node.uid
                   LEFT JOIN webiz_production.users users ON admin.uid = users.uid
                   LEFT JOIN webiz_production.watchdog wd ON (wd.uid = users.uid and wd.type='user') 
                   WHERE  site.field_site_domain_value NOT LIKE '%.webiz.co.th%'
                   AND node.status =1
                   AND wd.timestamp BETWEEN '".$startTime."'
                   AND '".$endTime."'
                   AND
                   users.created BETWEEN '".$startTime."'  
                   AND '".$endTime."'   
                   AND wd.message LIKE '%Session opened for%'
                   GROUP BY admin.admin_email limit 0,300";
       
  $result_published = db_query($sql_published);
  
  $count_sms_yes=0;
  while($fetch3 = db_fetch_array($result_sms_all_yes)){
     $count_sms_yes = $count_sms_yes+1;
   }
  
  $count_sms_reg_yes=0;
  while($fetch4 = db_fetch_array($result_sms_yes)){
     $count_sms_reg_yes = $count_sms_reg_yes+1;
   }
  
  $count_published=0;
    while($fetch5 = db_fetch_array($result_published)){
      $count_published = $count_published+1;
    }
  
  $vars['yesterday']['sms_all'] = $count_sms_yes;  
  $vars['yesterday']['sms_reg'] = $count_sms_reg_yes;
  $vars['yesterday']['published'] = $count_published;
     
  $vars['yesterday']['call'] = db_result(db_query("SELECT count(*) AS count FROM webiz_crm_cc.watchdog_callcenter where timestamp BETWEEN '".$startTime."' and '".$endTime."'"));
  
  $startTime1 = mktime(0, 0, 0, date('m'), date('d')-2, date('Y'));     
  $endTime1 = mktime(23, 59, 59, date('m'), date('d')-2, date('Y'));
  $vars['yesterday1']['date'] = webiz_crm_thaidate('lที่ j F Y ', $startTime1);
  $vars['yesterday1']['timestamp'] = $startTime1;
  
  $count_all_reg3 = db_result(db_query("select count(*) from webiz_production.users where created  BETWEEN '".$startTime1."' and '".$endTime1."'"));
  
  $vars['yesterday1']['reg_all'] = $count_all_reg3;
  $result_sms_all_yes1 = db_query("SELECT webiz_sms_data.phone FROM webiz_sms_data WHERE webiz_sms_data.timestamp BETWEEN '".$startTime1."' and '".$endTime1."' GROUP BY webiz_sms_data.phone");
  
  $result_sms_yes1 = db_query("SELECT webiz_sms_data.phone FROM content_type_customer INNER JOIN `webiz_sms_data` ON content_type_customer.field_customer_admin_phone_value = webiz_sms_data.phone WHERE field_customer_signup_date_value BETWEEN '".$startTime1."' and '".$endTime1."' GROUP BY webiz_sms_data.phone");
  
  $sql_published1 = "SELECT FROM_UNIXTIME(users.created)
         FROM webiz_production.node
         LEFT JOIN webiz_production.content_type_site site ON node.nid = site.nid
         LEFT JOIN webiz_production.webiz_admin_contact admin ON admin.uid = node.uid
         LEFT JOIN webiz_production.users users ON admin.uid = users.uid
         LEFT JOIN webiz_production.watchdog wd ON (wd.uid = users.uid and wd.type='user') 
         WHERE  site.field_site_domain_value NOT LIKE '%.webiz.co.th%'
         AND node.status =1
         AND wd.timestamp BETWEEN '".$startTime1."'
         AND '".$endTime1."'
         AND
         users.created BETWEEN '".$startTime1."'  
         AND '".$endTime1."'   
         AND wd.message LIKE '%Session opened for%'
         GROUP BY admin.admin_email limit 0,300";
      
      $result_published1 = db_query($sql_published1);
  
  $count_sms_yes1=0;
  while($fetch6 = db_fetch_array($result_sms_all_yes1)){
     $count_sms_yes1 = $count_sms_yes1+1;
   }
  
  $count_sms_reg_yes1=0;
  while($fetch7 = db_fetch_array($result_sms_yes1)){
     $count_sms_reg_yes1 = $count_sms_reg_yes1+1;
   }
  
  $count_published1=0;
  while($fetch8 = db_fetch_array($result_published1)){
    $count_published1 = $count_published1+1;
  }
  
  $vars['yesterday1']['sms_all'] = $count_sms_yes1;  
  $vars['yesterday1']['sms_reg'] = $count_sms_reg_yes1;
  $vars['yesterday1']['published'] = $count_published1;
     
  $vars['yesterday1']['call'] = db_result(db_query("SELECT count(*) AS count FROM webiz_crm_cc.watchdog_callcenter where timestamp BETWEEN '".$startTime1."' and '".$endTime1."'"));
  // print_r($vars);
  // drupal_add_js(drupal_get_path('module', 'webiz_crm') . '/js/jquery-1.6.2.min.js');
  
  $result = theme_render_template(drupal_get_path('module','webiz_crm').'/themes/register_report.tpl.php',$vars);
    if($send==1){ //Send email Report
     $vars['mail'] = 0;
      $subject = 'ผลการลงทะเบียนวัน'.$vars['yesterday']['date'];
      $to = 'cc@webiz.co.th,developer@webiz.co.th,pornthip@google.com,chayatat@google.com'; 
      // $to = 'palm@7republic.com';                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
      $from = 'crm@webiz.co.th';
      $language = 'th';

      $result1=$count_sms_today;
      $result2=$count_sms_reg;
      
      $result3=$count_sms_yes;
      $result4=$count_sms_reg_yes;
      $result5=$count_published;
      
      $result6=$count_sms_yes1;
      $result7=$count_sms_reg_yes1;
      $result8=$count_published1;
      
      $vars['result1'] = $result1;
      $vars['result2'] = $result2;
      $vars['result3'] = $result3;
      $vars['result4'] = $result4;
      $vars['result5'] = $result5;
      $vars['result6'] = $result6;
      $vars['result7'] = $result7;
      $vars['result8'] = $result8;
            
      if($result1!=0){ $per1 =round($result2*100/$result1,2);} else{ $per1= '0';}
      $per2 = round($result4*100/$result3,2);
      $per3 = round($result5*100/$result4,2);
      
      $per4 = round($result7*100/$result6,2);
      $per5 = round($result8*100/$result7,2);
      
      $vars['per1'] = $per1;
      $vars['per2'] = $per2;
      $vars['per3'] = $per3;
      $vars['per4'] = $per4;
      $vars['per5'] = $per5;
      //print_r($vars);
    $body = theme_render_template(drupal_get_path('module','webiz_crm').'/themes/register_report.tpl.php',$vars);
    drupal_mail('webiz_crm','mail',$to , $language, array('body' => $body, 'subject' => $subject), $from, TRUE); //mail
    } // End Send Email
  
  if($send ==2) {
    include('class/logfile.class.php');
    $log = new Logging();
    $log->lfile('sites/crm.webiz.co.th/modules/crm/tmp/daily_report.log');
    $log->lwrite($result);
    $log->lclose();  
  }
  // print_r($vars);
  echo $result;
  exit;
}

?>