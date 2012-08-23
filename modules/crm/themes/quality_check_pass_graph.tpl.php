<script type="text/javascript">
$(function () {
   
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

<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>

<?php
function DateDiff($strDate1,$strDate2)
	 {
				return (strtotime($strDate2)-strtotime($strDate1))/(60*60*24);  
	 }

   if($_GET['filter-date1']!=''){
     
   $date1 = $_GET['filter-date1'];
   $date2 = $_GET['filter-date2'];
   
   $title = "กราฟย้อนหลังตั้งแต่วันที่ ".$date1." ถึงวันที่ ".$date2;
   
    $dateDiff = DateDiff($date1,$date2);

   for($i=0;$i<=$dateDiff;$i++){
     if($i<$dateDiff){
          $sql = "SELECT COUNT(*) FROM {content_type_customer} WHERE field_customer_signup_date_value BETWEEN UNIX_TIMESTAMP( '".$date1." 00:00:00' ) AND UNIX_TIMESTAMP( '".$date1." 23:59:59') AND field_website_quality_value='%s' ";
      }else{
          $sql = "SELECT COUNT(*) FROM {content_type_customer} WHERE field_customer_signup_date_value BETWEEN UNIX_TIMESTAMP( '".$date2." 00:00:00' ) AND UNIX_TIMESTAMP( '".$date2." 23:59:59') AND field_website_quality_value='%s' ";
      }
      $result_pass = db_result(db_query($sql,'pass'));
      if($i==$dateDiff){
        $data .= $result_pass;
        $dateXaxis .= "'$date1'";
      }else{
        $data .= $result_pass.',';
        $dateXaxis .= "'$date1',";
      }
      
      $date1 = date('Y-m-d',strtotime($date1.'+1 day'));  
   }
   
   
   }else{
     $title = "กราฟ website quailty pass ย้องหลัง 7 วัน";
     $dateXaxis = "'$day[1]','$day[2]','$day[3]','$day[4]','$day[5]','$day[6]','$day[7]'";
     $data = $pass[1].','.$pass[2].','.$pass[3].','.$pass[4].','.$pass[5].','.$pass[6].','.$pass[7];
   }


     $chart = "<script type='text/javascript'> var chart = new Highcharts.Chart({
         chart: {
             renderTo: 'container',
         },
         title: {
             text: '$title'
         },
         subtitle: {
             text: 'develop by johnny'
         },
         xAxis: [{
             categories: [$dateXaxis]
         }],
         yAxis: [{ 

         }, {
             title: {
                 text: 'website quailty pass value',
                 style: {
                     color: '#4572A7'
                 }
             },
             labels: {
                 formatter: function() {
                     return this.value;
                 },
                 style: {
                     color: '#4572A7'
                 }
             },

         }],
         tooltip: {
             formatter: function() {
                 return ''+
                 this.y +' pass';
             }
         },
         credits: {
             enabled: false
         },
         series: [{
             name: 'pass',
             color: '#4572A7',
             type: 'bar',
             yAxis: 1,
             data: [$data]

         }]
     });
   </script>";  

     echo $chart;



//print_r($pass);
?>
