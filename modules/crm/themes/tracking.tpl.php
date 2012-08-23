<script type="text/javascript">
$(document).ready(function() {
  
  $("#filter-date1").datepicker({
    dateFormat: 'yy-mm-dd'
  });
  
  $("#filter-date2").datepicker({
    dateFormat: 'yy-mm-dd'
  });
  
});
</script>

<form action=""  accept-charset="UTF-8" method="get" id="filter-form">
<table border="0" class="table-form-callcenter">
<tr>  
<td>From Date</td>
<td><input type="text" maxlength="200" id="filter-date1" name="filter-date1"></td>
</tr>
<tr>  
<td>To Date</td>
<td><input type="text" maxlength="200" id="filter-date2" name="filter-date2"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="apply"></td>
<td>
</tr>
</table>  

<table id="tacking">
  <tr class="tacking-head">
    <th>ชื่อ-สกุล</th>
    <th>domain name</th>
    <th>เบอร์โทร</th>
    <th>วันที่ต้องโทรกลับ</th>
    <th>เวลาที่ต้องโทรกลับ</th>
  </tr>
<?php
global $user;

$date1 = $_GET['filter-date1'];
$date2 = $_GET['filter-date2'];

if($date1=="" and $date2==""){
  $date1 = date('Y-m-d');
  $date2 = date('Y-m-d');
}

//$date = date('Y-m-d',strtotime("now"));
$sql = "SELECT customer.*,watchdog.*,recallDate.*,recallTime.*  FROM {webiz_crm_cc.watchdog_callcenter}  watchdog left join {webiz_crm.content_type_customer} customer  on (customer.nid = watchdog.nid) LEFT JOIN {webiz_crm.content_field_customer_recall_datetime} recallDate on (customer.nid = recallDate.nid) LEFT JOIN {webiz_crm.content_field_customer_recall_time} recallTime on (customer.nid = recallTime.nid) WHERE webiz_crm_cc.watchdog.uid=%d AND webiz_crm.recallDate.field_customer_recall_datetime_value BETWEEN  UNIX_TIMESTAMP('".$date1." 00:00:00')  AND UNIX_TIMESTAMP('".$date2." 23:59:59') GROUP BY watchdog.nid ORDER BY recallTime.field_customer_recall_time_value ASC"; //ORDER BY recallTime.field_customer_recall_time_value ASC
$result = db_query($sql,$user->uid);
$i=1;
while($row = db_fetch_array($result)) {
  echo '<tr class="tacking-row" rel='.$i.'>'; 
  echo '<td><a href="http://crm.webiz.co.th/crm_info?nid='.$row['nid'].'&height=300&width=600" title="infomation CRM" class="thickbox">'.$row['field_customer_owner_name_value'].'</td>';
  echo '<td>'.$row['location'].'</td>';
  echo '<td>'.$row['field_customer_admin_phone_value'].'</td>';
  echo '<td>'.date('d-m-Y',$row['field_customer_recall_datetime_value']).'</td>';
  echo '<td>'.$row['field_customer_recall_time_value'].'</td>';
  echo '</tr>';
  $i++;
}


/*echo "<table>";
$sql = "SELECT customer.*, watchdog.* FROM {webiz_crm_cc.watchdog_log_score_quality} watchdog LEFT JOIN {webiz_crm.content_type_customer} customer ON watchdog.nid = customer.nid WHERE `timestamp` BETWEEN UNIX_TIMESTAMP(  '2012-07-30 00:00:00' ) 
 AND UNIX_TIMESTAMP(  '2012-07-30 23:59:59' )";
$result = db_query($sql);
while($row = db_fetch_array($result)) {
  echo "<tr>";
  echo "<td>".$row['before']."<td>";
  echo "<td>".$row['after']."<td>";
  echo "<td>".$row['field_customer_webiz_domain_value']."<td>";
  echo "</tr>";
}*/

?>
</table>