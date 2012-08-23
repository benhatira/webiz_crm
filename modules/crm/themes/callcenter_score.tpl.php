<script type="text/javascript">
$(".apply_score").click(function() {
  var nid = $(this).attr('id');
  var type_call = $('#select-type-call option:selected').val();
  var path = 'report/callcenter_log_score_v1';
  
  if(type_call=='1'){
    type_call = "bound in";
  }else{
    type_call = "bound out";
  }
	    
	    $.post(path, { nid: nid, type_call: type_call },function(data) {
	      if(data=="yes"){
           $.fancybox("บันทึกข้อมูลเรียบร้อยแล้ว",{
                minWidth: 'auto',
                minHeight: 'auto'
            });
            window.parent.location.reload();
        }else{
           $.fancybox("ไม่สามารถบันทึกข้อมูล",{
                minWidth: 'auto',
                minHeight: 'auto'
            });
            window.parent.location.reload();
        }
        
      });
         
}); // end submit
</script>
<center>
        <select id="select-type-call">
          <option value="1">bound in</option>
          <option value="2">bound out</option>
        </select>
      <br><br>  
    <button class='apply_score' id="<?echo $nid?>">apply</button>
    <br><br>
    <?php
      $node = node_load($nid);
      $uid = $node->field_customer_webiz_id[0]['value'];
      $username = db_result(db_query("SELECT name FROM webiz_production.users WHERE uid = ".$uid));

      $url = 'http://crm.webiz.co.th/api/score/v1/1cbccf22aafd8057dd82e5540c9e3ba1/'.$username;
      
      $score = get_quailty_score($url);
      echo "<font color='red'><b>score = ".$score."</b></font>";
      
      
      function get_quailty_score($url)
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
      
      
      
      
      
    ?>
</center>