<script type="text/javascript" src="https://www.google.com/jsapi"></script>
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
  </tr>
  </table>
  </form>
  
  <?php
  
  
  function DateDiff($strDate1,$strDate2)
  	 {
  				return (strtotime($strDate2)-strtotime($strDate1))/(60*60*24);  
  	 }
  
  if($_GET['filter-date1']!=''){
  $date1 = $_GET['filter-date1'];
  $date2 = $_GET['filter-date2'];
  
  $charts = "<script type='text/javascript'>
    google.load('visualization', '1', {packages:['corechart']});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = new google.visualization.DataTable();
      data.addColumn({type:'string'}); 
      data.addColumn('number', 'register');
      data.addColumn({type:'string', role:'tooltip'}); 
      data.addColumn('number', 'publish');
      data.addColumn({type:'string', role:'tooltip'});";
  $charts .= " data.addRows([";
  
 $dateDiff = DateDiff($date1,$date2);
  
for($i=0;$i<=$dateDiff;$i++){
  if($i<$dateDiff){
    $sql_register = "SELECT COUNT(*) FROM content_type_customer WHERE field_customer_signup_date_value BETWEEN UNIX_TIMESTAMP( '".$date1." 00:00:00' ) AND UNIX_TIMESTAMP( '".$date1." 23:59:59') ";

    $sql_publish = "SELECT COUNT(*) FROM `content_type_customer` where `field_customer_signup_date_value` between unix_timestamp('".$date1." 00:00:00') and unix_timestamp('".$date1." 23:59:59') and `field_customer_site_status_value` ='1' ";
     
  }else{
    //echo $i;
    $sql_register = "SELECT COUNT(*) FROM content_type_customer WHERE field_customer_signup_date_value BETWEEN UNIX_TIMESTAMP( '".$date2." 00:00:00' ) AND UNIX_TIMESTAMP( '".$date2." 23:59:59') ";
   

     $sql_publish = "SELECT COUNT(*) FROM `content_type_customer` where `field_customer_signup_date_value` between unix_timestamp('".$date2." 00:00:00') and unix_timestamp('".$date2." 23:59:59') and `field_customer_site_status_value` ='1' ";
  }
  
   
  
   $result_sms_reg = db_result(db_query($sql_register));
   $result_publish = db_result(db_query($sql_publish));
  
  $avg = ROUND(($result_publish/100)*$result_sms_reg,2);
  $charts .= "['$date1',$result_sms_reg,'$result_sms_reg , $avg %',$result_publish,'$result_publish , $avg %'],";
  
  
  $date1 = date('Y-m-d',strtotime($date1.'+1 day'));
  }


  $charts .= "]);
var options = {
title: 'Last 7 Day',
hAxis: {title: 'Day',  titleTextStyle: {color: 'red'},slantedText:true}
};
var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
chart.draw(data, options);
}
</script>";

echo $charts;
  
}else{
    
  $avg1 = ROUND(($last_publish[1]/100)*$last_reg[1],2);
  $avg2 = ROUND(($last_publish[2]/100)*$last_reg[2],2);
  $avg3 = ROUND(($last_publish[3]/100)*$last_reg[3],2);
  $avg4 = ROUND(($last_publish[4]/100)*$last_reg[4],2);
  $avg5 = ROUND(($last_publish[5]/100)*$last_reg[5],2);
  $avg6 = ROUND(($last_publish[6]/100)*$last_reg[6],2);
  $avg7 = ROUND(($last_publish[7]/100)*$last_reg[7],2);
  
  $charts = "<script type='text/javascript'>
    google.load('visualization', '1', {packages:['corechart']});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
      
                      
              var data = new google.visualization.DataTable();
              data.addColumn({type:'string'}); 
              data.addColumn('number', 'register');
              data.addColumn({type:'string', role:'tooltip'}); 
              data.addColumn('number', 'publish');
              data.addColumn({type:'string', role:'tooltip'}); 

              data.addRows([
                  ['$day[1]',$last_reg[1],'$last_reg[1] , $avg1%',$last_publish[1],'$last_publish[1] , $avg1%'],
                  ['$day[2]',$last_reg[2],'$last_reg[2] , $avg2%',$last_publish[2],'$last_publish[2] , $avg2%'],
                  ['$day[3]',$last_reg[3],'$last_reg[3] , $avg3%',$last_publish[3],'$last_publish[3] , $avg3%'],
                  ['$day[4]',$last_reg[4],'$last_reg[4] , $avg4%',$last_publish[4],'$last_publish[4] , $avg4%'],
                  ['$day[5]',$last_reg[5],'$last_reg[5] , $avg5%',$last_publish[5],'$last_publish[5] , $avg5%'],
                  ['$day[6]',$last_reg[6],'$last_reg[6] , $avg6%',$last_publish[6],'$last_publish[6] , $avg6%'],
                  ['$day[7]',$last_reg[7],'$last_reg[7] , $avg7%',$last_publish[7],'$last_publish[7] , $avg7%']

              ]);
              
              
      var options = {
        title: 'Last 7 Day',
        hAxis: {title: 'Day',  titleTextStyle: {color: 'red'},slantedText:true}
      };
      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
  </script>";
  
  echo $charts;
  
  } // end if
  
?>
  
  <div id="chart_div" style="width: 900px; height: 500px;"></div>
