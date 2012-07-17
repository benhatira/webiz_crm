<html>
<head>
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>  
<script type="text/javascript">
        $(function(){
                // $('fieldset').find('.content2').css({'display': 'none'});
                $('legend').click(function(){
                        $(this).parent().find('.content').slideToggle("slow"); 
                        // $(this).parent().find('.content2').slideToggle("slow");
                });
        });
</script> -->
</head>
<body>
<div style='font-size:1.35em;'>
<fieldset>
    <legend> ผลการลงทะเบียนวันที่ <?php echo $today['date'].'  เวลา '.date('H:i:s').' น.';?> </legend>
    <div class="content">
       <p>จำนวนผู้สมัครหน้าเว็บ ทั้งหมด <?php echo $result1=$today['sms_all']; ?> คน</p>
       <p>จำนวนผู้ที่ทำการยืนยันสำเร็จ <?php echo $result2=$today['sms_reg']; ?> คน</p>
       <p>ผู้ที่ทำการยืนยันสำเร็จคิดเป็น <?php if($result1!=0){ echo round($result2*100/$result1,2);} else{ echo '0';}?> %</p>
    </div>
</fieldset>
<fieldset>
    <legend>สรุปยอดวันที่ <?php echo $yesterday['date'];?> </legend>
    <div class="content">
      <p>จำนวนผู้ผู้สมัครหน้าเว็บ ทั้งหมด <?php echo $result3=$yesterday['sms_all']; ?> คน</p>
      <p>จำนวนผู้ที่ทำการยืนยันสำเร็จ <?php echo $result4=$yesterday['sms_reg']; ?> คน</p>
      <p>ผู้ที่ทำการยืนยันสำเร็จคิดเป็น <?php echo round($result4*100/$result3,2);?> %</p>
      <hr/>
      <p>จำนวนผู้ที่ทำการสมัครวันที่ <?php echo $yesterday['date'];?> แล้วทำการเผยแพร่เว็บไซต์แล้ว <?php echo $result5=$yesterday['published']; ?> คน </p>
      <p>คิดเป็น <?php echo round($result5*100/$result4,2);?> % ของผู้ที่ทำการยืนยันสำเร็จ</p>
      <hr/>
      <p>Call Center โทรไปทั้งหมด <?php echo $yesterday['call'];?> คน</p>
    </div>
</fieldset>
</div>
</body>
</html>