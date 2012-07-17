<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>  
<script type="text/javascript">
        $(function(){
                // $('fieldset').find('.content2').css({'display': 'none'});
                $('legend').click(function(){
                        $(this).parent().find('.content').slideToggle("slow"); 
                        // $(this).parent().find('.content2').slideToggle("slow");
                });
        });
</script>
<style type="text/css">
  @font-face {
    font-family: "RSU";
    src: url(http://crm.webiz.co.th/sites/crm.webiz.co.th/modules/crm/fonts/RSU_Regular.ttf) format("truetype");
  }
  body{
    font-family: "RSU", sans-serif;
    margin:0px;
  }
  .header{
    background-image:url(http://crm.webiz.co.th/sites/crm.webiz.co.th/modules/crm/img/emailHeader.png);
    background-repeat:no-repeat;
    width:480;
    height:86px;
    margin:auto;
  }
  .line1{
    background-image:url(http://crm.webiz.co.th/sites/crm.webiz.co.th/modules/crm/img/line1.png);
    background-repeat:repeat-x;
    width:480;
    height:1px;
    margin:auto;
  }
  .line2{
    background-image:url(http://crm.webiz.co.th/sites/crm.webiz.co.th/modules/crm/img/line2.png);
    background-repeat:repeat-x;
    width:480;
    height:1px;
    margin:auto;
  }
  .footer{
    background-image:url(http://crm.webiz.co.th/sites/crm.webiz.co.th/modules/crm/img/emailFooter.png);
    background-repeat:no-repeat;
    width:480;
    height:53px;
    margin:auto;
  }
  #content{
    width:480px;
    margin:auto;
    font-size:1.25em;
  }
  .report{
    padding-left:88px;
  }
  .month-year{
    text-align:center;
  }
  .toolbar{
    width:480px;
    clear:both;
  }
  .toolbar {
    display:block;
    background-color:#CCCCCC;
    border:1px solid;
    border-color:#f3f3f3 #bbb #bbb #f3f3f3;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    margin:0;
    text-align:center;
    padding:2px;
    zoom: 1;
    float:left;
    width:50px;
  }
  .today{
    display:block;
    background-color:#2A3576;
    border:1px solid;
    border-color:#f3f3f3 #bbb #bbb #f3f3f3;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    margin:0;
    text-align:center;
    padding:2px;
    zoom: 1;
    float:left;
    color:#fff;
    width:50px;
  }
  .yesterday{
    display:block;
    background-color:#999997;
    border:1px solid;
    border-color:#f3f3f3 #bbb #bbb #f3f3f3;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    margin:0;
    text-align:center;
    padding:2px;
    zoom: 1;
    float:left;
    color:#fff;
    width:50px;
  }
  .date li {
    display:block;
    margin:0;
    text-align:center;
    float:left;
    padding:3px;
    width:55px;
  }
  .month-year li {
    display:block;
    margin:0;
    text-align:center;
    float:left;
    padding:3px;
    width:55px;
    font-size:10px;
  }
  .br{
    height:20px;
  }
  .br2{
     height:50px;
  }
  .br3{
    height:10px;
  }
   ul{
     width:480px;
     margin-left:-14px;
   }
   h3{
     height:10px;
   }
   h2{
     height:20px;
   }
</style>
</head>
<body>
  <?php
  if(!isset($mail)):
      $array_dateTH = explode(' ',  $today['date']); 
      $array_dateEN = explode(' ',  $today['dateEN']);
       // echo $today['dateEN']; 
      $dw = date( "w", $today['timestamp']);
      $ldw = date( "w", $yesterday['timestamp']);
      $d = date( "Y-m-d", $today['timestamp']);
      if($dw == 0){
        $strStartDate = date('Y-m-d', strtotime("Now"));
        $strEndDate = date('Y-m-d', strtotime("Next Saturday"));
      }
      else if($dw == 6){
        $strStartDate = date('Y-m-d', strtotime("Last Sunday"));
        $strEndDate = date('Y-m-d', strtotime("Now"));
      }
      else{
        $strStartDate = date('Y-m-d', strtotime("Last Sunday"));
        $strEndDate = date('Y-m-d', strtotime("Next Saturday"));
      }
    else:
   $array_dateTH = explode(' ',  $yesterday['date']); 
   $array_dateEN = explode(' ',  $yesterday['dateEN']);
    // echo $today['dateEN']; 
   $dw = date( "w", $yesterday['timestamp']);
   $ldw = date( "w", $yesterday1['timestamp']);
   $d = date( "Y-m-d", $yesterday['timestamp']);
   if($dw == 0){
     $strStartDate = date('Y-m-d', strtotime("Last Sunday"));
     $strEndDate = date('Y-m-d', strtotime("Next Saturday"));
   }
   else if($dw == 5){
     $strStartDate = date('Y-m-d', strtotime("Last Sunday"));
     $strEndDate = date('Y-m-d', strtotime("Now"));
   }
   else if($dw == 6){
     $strStartDate = date('Y-m-d', strtotime("Last Sunday"));
     $strEndDate = date('Y-m-d', strtotime("Last Saturday"));
   }
   else{
     $strStartDate = date('Y-m-d', strtotime("Last Sunday"));
     $strEndDate = date('Y-m-d', strtotime("Next Saturday"));
   }
  endif  
  ?>
<table width='480' align='left'>
<tr><td>
<div id='content'>
  <div class='header'>
    <img src='http://crm.webiz.co.th/sites/crm.webiz.co.th/modules/crm/img/emailHeader.png'>
  </div>
<div class='br'>&nbsp;</div>
  <table width='480' align='center'>
    <tr><td>
      <table width='350' align='center'>
        <tr align='center'>
          <td width='50'>อา.</td>
          <td width='50'>จ.</td>
          <td width='50'>อ.</td>
          <td width='50'>พ.</td>
          <td width='50'>พฤ.</td>
          <td width='50'>ศ.</td>
          <td width='50'>ส.</td>
        </tr>  
      </table>
    </td></tr>
    <tr><td>
      <table width='350' align='center'>
        <tr align='center'>
          <?php
             $i=0;
             while (strtotime($strStartDate) <= strtotime($strEndDate)) { ?>
               <td <?php if($dw==$i){ ?> bgcolor='#2A3576' class='today' style='color:#fff' <?php } else if(($ldw==$i)and($ldw!=6)){ ?> class='yesterday' bgcolor='#999997' style='color:#fff' <?php } else{ ?> class='toolbar' bgcolor='#CCCCCC' <?php } ?> >
                <?php echo substr($strStartDate, -2); ?>
               </td>  
          <?php 
            $strStartDate = date ('Y-m-d', strtotime("+1 day", strtotime($strStartDate)));
            $i++;
           }
          ?>
        </tr>  
      </table>
    </td></tr>
    <tr><td>
      <table width='350' align='center'>
        <tr align='center' style='font-size:10px;'>
          <?php for($i=0;$i<=6;$i++){ ?>
          <td width='50'><? if($dw==$i):  echo $array_dateTH[1].' '.$array_dateTH[2];  else: echo "&nbsp;";  endif ?></td>
          <?php } ?>
        </tr>  
      </table>
    </td></tr>
  </table> 
  <!-- <ul class='date'>
   <li>อา.</li>
   <li>จ.</li>
   <li>อ.</li>
   <li>พ.</li>
   <li>พฤ.</li>
   <li>ศ.</li>
   <li>ส.</li>
   </ul>
   <ul class='toolbar'>
    <?php
       $i=0;
       while (strtotime($strStartDate) <= strtotime($strEndDate)) { ?>
         <li<?php if($dw==$i){ ?> class='today' <?php } ?> <?php if($ldw==$i){ ?> class='yesterday' <?php } ?>><?php echo substr($strStartDate, -2); ?></li>  
    <?php 
      $strStartDate = date ('Y-m-d', strtotime("+1 day", strtotime($strStartDate)));
      $i++;
     }
    ?>
   </ul>
   <ul class='month-year'>
   <li><? if($dw==0){  echo $array_dateTH[1].' '.$array_dateTH[2]; } ?></li>
   <li><? if($dw==1){  echo $array_dateTH[1].' '.$array_dateTH[2]; } ?></li>
   <li><? if($dw==2){  echo $array_dateTH[1].' '.$array_dateTH[2]; } ?></li>
   <li><? if($dw==3){  echo $array_dateTH[1].' '.$array_dateTH[2]; } ?></li>
   <li><? if($dw==4){  echo $array_dateTH[1].' '.$array_dateTH[2]; } ?></li>
   <li><? if($dw==5){  echo $array_dateTH[1].' '.$array_dateTH[2]; } ?></li>
   <li><? if($dw==6){  echo $array_dateTH[1].' '.$array_dateTH[2]; } ?></li>
   </ul> -->
<div class='br2'>
</div>
<?php if(!isset($mail)):?>   
<fieldset>
    <legend> ผลการลงทะเบียนวัน<?php echo $today['date'].'  เวลา '.date('H:i:s').' น.';?> </legend>
    <div class="content">
       <p>จำนวนผู้สมัครหน้าเว็บแล้วกดยืนยัน sms ทั้งหมด <?php echo $result1=$today['sms_all']; ?> คน</p>
       <p>จำนวนผู้ที่ทำการยืนยันผ่าน sms สำเร็จ <?php echo $result2=$today['sms_reg']; ?> คน</p>
       <p>ผู้ที่ทำการยืนยันผ่าน sms สำเร็จคิดเป็น <?php if($result1!=0){ echo round($result2*100/$result1,2);} else{ echo '0';}?> %</p>
       <hr/>
       <p>ผู้ที่สมัครทั้งหมด <?php echo $today['reg_all'];?> คน</p>
    </div>
</fieldset>
<fieldset>
    <legend> สรุปยอดวัน<?php echo $yesterday['date'];?> </legend>
    <div class="content">
      <p>จำนวนผู้สมัครหน้าเว็บแล้วกดยืนยัน sms ทั้งหมด <?php echo $result3=$yesterday['sms_all']; ?> คน</p>
      <p>จำนวนผู้ที่ทำการยืนยันผ่าน sms สำเร็จ <?php echo $result4=$yesterday['sms_reg']; ?> คน</p>
      <p>ผู้ที่ทำการยืนยันผ่าน sms สำเร็จคิดเป็น <?php echo round($result4*100/$result3,2);?> %</p>
      <hr/>
      <p>ผู้ที่สมัครทั้งหมด <?php echo $result5=$yesterday['reg_all'];?> คน</p>
      <p>จำนวนผู้ที่ทำการสมัครวัน<?php echo $yesterday['date'];?> แล้วทำการเผยแพร่เว็บไซต์แล้ว <?php echo $result6=$yesterday['published']; ?> คน </p>
      <p>คิดเป็น <?php echo round($result6*100/$result5,2);?> % ของผู้ที่สมัครทั้งหมด</p>
      <hr/>
      <p>Call Center โทรไปทั้งหมด <?php echo $yesterday['call'];?> คน</p>
    </div>
</fieldset>
<fieldset>
    <legend> สรุปยอดทั้งหมด </legend>
    <div class="content">
      <p>รวมเผยแพร่ทั้งหมด <?php echo number_format($overall_publish); ?> คน</p>
      <p>รวมสมาชิกทั้งหมด <?php echo number_format($overall_reg); ?> คน</p>
      <p>รวมจำนวนที่จดโดเมนทั้งหมด <?php echo number_format($overall_domain); ?> คน</p>
    </div>
</fieldset>
<?php else:?>
  <div class='content'>
    <?php 
      echo "<h3>ผลการลงทะเบียนวัน".$yesterday['date']."</h3>
            <div class='line1'>&nbsp;</div>     
            <h3>สรุปยอดวัน".$yesterday['date']."</h3><div class='br3'>&nbsp;</div>
                       <div class='report'>จำนวนผู้สมัครหน้าเว็บแล้วกดยืนยัน sms ทั้งหมด<b> ".$result3."</b> คน<br/>
                       จำนวนผู้ที่ทำการยืนยันผ่าน sms สำเร็จ<b> ".$result4."</b> คน<br/>
                       ผู้ที่ทำการยืนยันผ่าน sms สำเร็จคิดเป็น<b> ".round($result4*100/$result3,2)."</b> %<br/>
                       <div class='br3'>&nbsp;</div>
                       <div class='line2'>&nbsp;</div> 
                       <div class='br3'>&nbsp;</div>        
                       <div class='report'>ผู้ที่สมัครทั้งหมด <b>".$yesterday['reg_all']."</b> คน</div>    
                       ทำการเผยแพร่เว็บไซต์แล้ว<b> ".$yesterday['published']."</b> คน <br/>
                       คิดเป็น<b> ".round($yesterday['published']*100/$yesterday['reg_all'],2)."</b> % ของผู้ที่สมัครทั้งหมด <br/>
                       <div class='br'>&nbsp;</div>
                       Call Center โทรไปทั้งหมด<b> ".$yesterday['call']."</b> คน<br/>
                       </div>
                       <div class='br3'>&nbsp;</div>
                       <div class='line2'>&nbsp;</div>            
                       <h3>สรุปยอดวัน".$yesterday1['date']."</h3><div class='br3'>&nbsp;</div>
                       <div class='report'>จำนวนผู้สมัครหน้าเว็บแล้วกดยืนยัน sms ทั้งหมด<b> ".$result6."</b> คน<br/>
                       จำนวนผู้ที่ทำการยืนยันผ่าน sms สำเร็จ<b> ".$yesterday1['sms_reg']."</b> คน<br/>
                       ผู้ที่ทำการยืนยันผ่าน sms สำเร็จคิดเป็น<b> ".round($yesterday1['sms_reg']*100/$result6,2)."</b> %<br/>
                       <div class='br3'>&nbsp;</div>
                       <div class='line2'>&nbsp;</div>         
                       <div class='report'>ผู้ที่สมัครทั้งหมด ".$yesterday1['reg_all']." คน</div>
                       ทำการเผยแพร่เว็บไซต์แล้ว<b> ".$yesterday1['published']."</b> คน <br/>
                       คิดเป็น<b> ".round($yesterday1['published']*100/$yesterday1['reg_all'],2)."</b> % ของผู้ที่สมัครทั้งหมด <br/>
                        <div class='br'>&nbsp;</div> 
                       Call Center โทรไปทั้งหมด<b> ".$yesterday1['call']."</b> คน<br/>
                       </div>
                       <div class='br3'>&nbsp;</div>
                       <div class='line2'>&nbsp;</div>
                       <div class='br3'>&nbsp;</div>
                       <div class='report'> สรุปยอดทั้งหมด
                        รวมเผยแพร่ทั้งหมด ".number_format($overall_publish)." คน<br/>
                        รวมสมาชิกทั้งหมด ".number_format($overall_reg)." คน<br/>
                        รวมจำนวนที่จดโดเมนทั้งหมด ".number_format($overall_domain)." คน<br/>
                       </div>
                      <div class='br3'>&nbsp;</div>
                      <div class='line2'>&nbsp;</div>
                      <div class='br3'>&nbsp;</div>       
                          ดูรายงานปัจจุบัน <a href='http://crm.webiz.co.th/report/webiz_daily'>http://crm.webiz.co.th/report/webiz_daily</a>";
    ?>
    
  </div>
<?php endif ?>
<div class='footer'>
  <img src='http://crm.webiz.co.th/sites/crm.webiz.co.th/modules/crm/img/emailFooter.png'>
</div>
</div>
</td></tr></table>
</body>
</html>