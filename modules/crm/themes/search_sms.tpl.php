<form action="/search/sms" method="POST">
<div id="crm_sms">
  <div class="form-item" id="search-phone">
    <label for="phone"><strong>เบอร์โทรศัพท์</strong></label>
    <input type="text" name="phone" id="phone" size="12" maxlength="10" value="<?php if(!empty($_POST['phone'])){echo $_POST['phone'];}?>" />
    <div class="description">กรอกเฉพาะตัวเลขเท่านั้น ตัวอย่าง. '08xxxxxxxx'</div>
  </div>
  <div class="form-item" id="search-email">
    <label for="email"><strong>อีเมล</strong></label>
    <input type="text" name="email" id="email" size="38" value="<?php if(!empty($_POST['email'])){echo $_POST['email'];}?>" />
  </div>
  <div class="form-item" id="search-submit">
    <input type="submit" value="ค้นหา" id="submit_sms_search">
  </div>
  <?php if($search!='nodata'){?>
  <div style="height:20px"></div>  
  <table class="views-table cols-20">
    <thead>
      <tr>
        <th class="views-field views-field-domain">ชื่่อเว็บไซต์</th>
        <th class="views-field views-field-field-customer-owner-name-value">ชื่อ-นามสกุล</th>
        <th class="views-field views-field-field-customer-phone-value">เบอร์โทรศัพท์</th>
        <th class="views-field views-field-field-customer-email-value">อีเมล</th>
        <th class="views-field views-pwd">รหัสผ่าน</th>
      </tr>
    </thead>
    <tbody>
      <?php if(!empty($search)){
          foreach($search as $items){?>
      <tr>
        <td class="views-field views-field-domain">
          <span><?php echo $items['domain'];?></span>
        </td>
        <td class="views-field views-field-field-customer-owner-name-value">
          <span><?php echo $items['customer_name'];?></span>
        </td>
        <td class="views-field views-field-field-customer-phone-value">
          <span><?php echo $items['phone'];?></span>
        </td>
        <td class="views-field views-field-field-customer-email-value">
          <span><?php echo $items['email'];?></span>
        </td>
        <td class="views-field views-pwd">
          <span><?php echo $items['sms_pwd'];?></span>
        </td>
      </tr>
      <?php 
          }
        }
      else{
      ?>
        <tr>
          <td colspan="5" align="center">
            <span>ไม่พบข้อมูล</span>
          </td>
        </tr>  
      <?php
      } 
      ?>
    </tbody>
  </table>
  <?php } ?>
</div>
</form>
