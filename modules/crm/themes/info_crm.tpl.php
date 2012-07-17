 <?php
 global $base_url;
 drupal_get_css();
 ?>
 <script type="text/javascript" src="<?php echo $base_url.'/'.path_to_theme();?>/js/datepicker.js"></script>
 <script type="text/javascript" src="<?php echo $base_url.'/'.path_to_theme();?>/js/jquery.timePicker.js"></script> 
 <link type="text/css" rel="stylesheet" media="all" href="<?php echo $base_url.'/'.path_to_theme();?>/css/timePicker.css" /> 
 <script type="text/javascript" src="<?php echo $base_url.'/'.drupal_get_path('module','webiz_crm')?>/js/script.js"></script>
 
 
  <script type="text/javascript">
  $(document).ready(function() {
    
    if($("#description-status :selected").val()==4 || $("#description-status :selected").val()==5 || $("#description-status :selected").val()==6){
        $('#workDate').show();
        $('#workTime').show();
    }else{
        $('#workDate').hide();
        $('#workTime').hide();
    }
    
    
    $("#workDate").datepicker({
      dateFormat: 'yy-mm-dd'
    });
    $("#workTime").timePicker();
  });
  
  function showDate(str){
    if(str==4 || str==5 || str==6){
      $('#workDate').show();
      $('#workTime').show();
    }else{
      $('#workDate').hide();
      $('#workTime').hide();
    }
    
  }
  </script>
  <?php
  
  $data = variable_get('status_description',array());

  $node = node_load($nid);
  //echo '<pre>';print_r($node);echo '</pre>';
  ?>
  <div class="success" style='display:none;'></div>
  <div class="error" style='display:none;'></div>
   <table border="1" width="100%">
     <tr>
        <td>ประเภท</td>
        <td><?php echo $node->field_customer_biztype[0][value]?></td>
     </tr>
     <tr>
         <td>หมวดหมู่</td>
         <td><?php echo $node->field_customer_bizcat[0][value]?></td>
      </tr>
     <tr>
       <td>ชื่อเว็บไซต์</td>
       <td><?php echo $node->field_customer_custom_domain[0][value]?></td>
    </tr>
    <tr>
       <td>เว็บบิซโดเมน</td>
       <td><?php echo $node->field_customer_webiz_domain[0][value]?></td>
    </tr>
    <tr>
       <td>ชื่อ-นามสกุล</td>
       <td><?php echo $node->field_customer_admin_name[0][value]?></td>
    </tr>
    <tr>
       <td>เบอร์โทรศัพท์</td>
       <td><?php echo $node->field_customer_admin_phone[0][value]?></td>
    </tr>
    <tr>
       <td>อีเมล</td>
       <td><?php echo $node->field_customer_email[0][value]?></td>
    </tr>
    <tr>
       <td>ที่อยู่</td>
       <td>
       <?php 
       echo $node->field_customer_address[0][value].' ';
       echo 'เขต '.$node->field_customer_district[0][value].' ';
       echo 'แขวง '.$node->field_customer_subdistrict[0][value].' ';
       echo 'จังหวัด '.$node->field_customer_province[0][value].' ';
       ?>
      </td>
    </tr>
     <tr>
         <td>รหัสไปษณีย์</td>
         <td><?php echo $node->field_customer_zipcode[0][value]?></td>
      </tr>
    
   </table>
   <?php
      //if($node->field_customer_status_check[0]['value']=='pass'){
   ?>
   <!--<span>ผ่านแล้ว</span>-->
   <?php
      //}else{
   ?>
   <!--<button id="info-pass">ผ่าน</button> -->
   <?php
    //}
   ?>
   <?php 
   if($node->field_customer_recall_datetime['0']['value']!=''){
        for($j=0;$j<=sizeof($node->field_customer_recall_datetime)-1;$j++) {
     echo 'รอบที่ '.($j+1).'   โทรกลับวันที่/เวลา : '.date('d-m-Y',$node->field_customer_recall_datetime[$j]['value'])." ";
     echo $node->field_customer_recall_time[$j]['value'].'<br/>';
        }
   } 
   ?>
   <select id="info-status">
     
     <?php
     //if($node->field_customer_status_level[0]['value']==''){
       echo '<option value="">กรุณาเลือกสถานะ</option>';
     //}
        for($i=1;$i<=5;$i++){
             if($node->field_customer_status_level[0]['value']==$i){
     ?>
     <option value="<?php echo $i;?>" SELECTED>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $i;?></option>
     <?php
              }else{ 
     ?>
     <option value="<?php echo $i;?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $i;?></option>
     <?php
              }
        }
     ?>
  </select>
  
  <select id="description-status" onchange="showDate(this.value)">
     <?php
       echo '<option value="">กรุณาเลือกสถานะ</option>';

        for($i=1;$i<=sizeof($data);$i++){
          if($node->field_customer_status_des[0]['value']==$i){
     ?>
     <option value="<?php echo $i;?>" SELECTED><?php echo $data[$i];?></option>
     <?php
          }else{
     ?>
     <option value="<?php echo $i;?>"><?php echo $data[$i];?></option>
     <?php
               }
         }
      ?>
  </select>
  <input type="text" name="workDate" id="workDate" value="" style="display:none;">
  <input type="text" name="workTime" id="workTime" value="" style="display:none;">
  <input type="hidden" name="nid" id="nid" value="<?php echo $node->nid;?>"> 
  <button id="info-ok">ok</button> 
  <div>
    <h3>Comments</h3>
    <?php
      db_set_active('webiz_crm_cc');
      $sql="SELECT subject,comment FROM {comments} WHERE nid = '%s'";
      $result = db_query($sql,$nid);
      while($row = db_fetch_array($result)){
        echo '<div style="margin-bottom:5px; border:1px solid #ccc; border-radius:5px; -webkit-border-radius:5px; -moz-border-radius:5px; padding:5px;">';
        echo '<div>Subject : '.$row['subject'].'</div>';
        echo '<div>Comment : '.$row['comment'].'</div>';
        echo '</div>';
      }
      db_set_active('default');
    ?>
  </div>
  <form action="/update_comment_add"  accept-charset="UTF-8" method="post" id="comment-form">
    <div class="form-item" id="edit-subject-wrapper">
     <label for="edit-subject">Subject: </label>
     <input type="text" maxlength="64" name="subject" id="edit-subject" size="60" value="" class="form-text" />
    </div>
    <div class="form-item" id="edit-comment-wrapper">
     <label for="edit-comment">Comment: <span class="form-required" title="This field is required.">*</span></label>
     <textarea cols="60" rows="15" name="comment" id="edit-comment"  class="form-textarea resizable required"></textarea>
    </div>
    <input type="hidden" name="nid" value="<?php echo $nid; ?>"  />
    <input type="submit" name="op" id="edit-submit" value="Save"  class="form-submit" />
  </form>