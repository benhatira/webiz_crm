$(document).ready(function(){
  
  $(".apply_score").click(function() {
    var nid = $(this).attr('id');
    var path = 'report/callcenter_log_score_v1';
		    
		    $.post(path, { nid: nid },function(data) {
		      if(data=="yes"){
		        alert('aaaaa');
             $.fancybox("บันทึกข้อมูลเรียบร้อยแล้ว",{
                  minWidth: 'auto',
                  minHeight: 'auto'
              });
          }else{
             $.fancybox("ไม่สามารถบันทึกข้อมูล",{
                  minWidth: 'auto',
                  minHeight: 'auto'
              });
          }
          
        });
           
  }); // end submit
  
});