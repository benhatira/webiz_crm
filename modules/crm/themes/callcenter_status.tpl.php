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
<select name="user" id="user">
    <option value="">ไม่เลือก user</option>
    <option value="all">user ทั้งหมด</option>
<?php
$query_user = db_query("SELECT u.uid,u.name FROM users u JOIN users_roles r  on u.uid = r.uid  WHERE r.rid=%d ",3);
while($row = db_fetch_array($query_user)){
echo '<option value="'.$row['uid'].'">'.$row['name'].'</option>';
}
?>
</select>
 </td>
</tr>
</table>
</form>

<?php
db_set_active('webiz_crm_cc');
$user = array(18=>'ขวัญ',19=>'ตา',20=>'mind',21=>'tom');
$date1 = $_GET['filter-date1'];
$date2 = $_GET['filter-date2'];
$uid = $_GET['user']; 
?>
    
 
<?php

if($date1=="" and $date2==""){
  $date1 = date('Y-m-d');
  $date2 = date('Y-m-d');
}

$var = array();

$data = variable_get('status_description',array());




if($uid=='all'){
  
  
foreach($user as $key => $value){
  
  echo '<table class="table-callcenter-status-report">';
  echo '<thead>';
  echo '<tr>';
  echo '<td colspan="18" align="center">'.$value.'</td>';
  echo '</tr>';
  
  for($i=1;$i<=sizeof($data);$i++){
      $sql = "SELECT count(*) AS count FROM {watchdog_callcenter} where timestamp BETWEEN UNIX_TIMESTAMP('".$date1." 00:00:00') and UNIX_TIMESTAMP('".$date2." 23:59:59') AND message like '%(".$i.")%' AND uid=%d ";
      $result = db_query($sql,$key);
      $row = db_fetch_array($result);
      echo '<td width="300px">'.$data[$i].'</td>';
      $var[$i] = $row['count'];
      $count+= $row['count'];
      $sum+= $row['count'];
  }
  
  
  echo '<td width="300px">รวมทั้งหมด</td>';
  echo '</tr>';
  echo '</thead>';
  echo '<tr>';
  for($i=1;$i<=sizeof($var);$i++){
    echo '<td width="300px">'.$var[$i].'</td>';
  }
  echo '<td>'.$count.'</td></tr>';
  $chart_data[] = $count;
  $count = 0;  
}

echo '<table class="table-callcenter-status-report">';
echo '<tr>';  
echo '<td>รวมทั้งหมด</td>';
echo '<td>'.$sum.'</td>';
echo '</tr>';
echo '</table>';


      $chart = array(
            '#chart_id' => 'test_chart',
            '#title' => t('Callcenter status'),
            '#type' => CHART_TYPE_PIE,
            '#size' => chart_size(800,200),
          );


      for($i=0;$i<=sizeof($chart_data);$i++){
        $chart['#data'][$i] = $chart_data[$i];
      }

      foreach($user as $key => $value){
        $chart['#labels'][] = $value;
      }   

    echo chart_render($chart);
  
}else{

  echo '<table class="table-callcenter-status-report">';
  echo '<thead>';
  echo '<tr>';  
  
for($i=1;$i<=sizeof($data);$i++){
  
  if($uid!=""){
    $sql = "SELECT count(*) AS count FROM `watchdog_callcenter` where timestamp BETWEEN UNIX_TIMESTAMP('".$date1." 00:00:00') and UNIX_TIMESTAMP('".$date2." 23:59:59') and message like '%(".$i.")%' AND uid=%d ";
    $result = db_query($sql,$uid); 
    }else{
      $sql = "SELECT count(*) AS count FROM `watchdog_callcenter` where timestamp BETWEEN UNIX_TIMESTAMP('".$date1." 00:00:00') and UNIX_TIMESTAMP('".$date2." 23:59:59') and message like '%(".$i.")%' ";
      $result = db_query($sql);
    }

$row = db_fetch_array($result);
  echo '<td width="300px">'.$data[$i].'</td>';
  $var[$i] = $row['count'];
  $count+= $row['count'];
}
echo '<td width="300px">รวมทั้งหมด</td>';
echo '</tr>';
echo '</thead>';
echo '<tr>';
for($i=1;$i<=sizeof($var);$i++){
  echo '<td width="300px">'.$var[$i].'</td>';
}
echo '<td>'.$count.'</td></tr>';

?>

<?php

$chart = array(
      '#chart_id' => 'test_chart',
      '#title' => t('Callcenter status'),
      '#type' => CHART_TYPE_PIE,
      '#size' => chart_size(800,200),
    );
   
    for($i=1;$i<=sizeof($var);$i++){
      $chart['#data'][$i] = $var[$i];
    }
    
    for($j=1;$j<=sizeof($data);$j++){
      $chart['#labels'][] = $j;
    }   
  
  echo chart_render($chart);
  
} // end if else

db_set_active('default');
?>

</table>