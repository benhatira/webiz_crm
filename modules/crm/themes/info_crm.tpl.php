 <?php
 global $base_url;
 ?>
 <script type="text/javascript" src="<?php echo $base_url.'/'.path_to_theme();?>/js/datepicker.js"></script>
 <script type="text/javascript" src="<?php echo $base_url.'/'.drupal_get_path('module','webiz_crm')?>/js/script.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    $("#workTime").datepicker({
      dateFormat: 'yy-mm-dd', 
    });
  });
  
  function showDate(str){
    
    if(str==4 || str==7){
      $('#workTime').show();
    }else{
      $('#workTime').hide();
    }
    
  }
  </script>
  <?php
  
  $data = variable_get('status_description',array());

  $node = node_load($nid);
  //print_r($node);
  ?>
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
   <select id="info-status">
     <?php
     //if($node->field_customer_status_level[0]['value']==''){
       echo '<option value="">กรุณาเลือกสถานะ</option>';
     //}
        for($i=1;$i<=10;$i++){
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
  <input type="text" name="workTime" id="workTime" value="" style="display:none;">
  <input type="hidden" name="nid" id="nid" value="<?php echo $node->nid;?>"> 
  <button id="info-ok">ok</button> 