$(function(){
    var nid;
    var status;
    var status_desc;
    var recall_date;
    var recall_time;
    var path = 'update_crm_info';
    var location = window.location.href.split('/');
		location_status = "http://"+location[2]+"/"+path;
    $('#info-ok').click(function(){
         
          nid = $('#nid').attr("value");
          status = $('#info-status').val();
          status_desc = $('#description-status').val();
          recall_date = $('#workDate').val();
          recall_time = $('#workTime').val();
          
          if(status != '' && status_desc != ''){
            $("#TB_ajaxContent .msg").empty();
            if(status_desc != 4 && status_desc != 5 && status_desc != 6){
              recall_date = '';
            }
            var data = {nid: nid, status: status, status_desc: status_desc, recall_date: recall_date, recall_time: recall_time, mode: 'level'}
            $.ajax({
              type: 'POST',
              url: location_status,
              data: data,
              success: function(response) {

                if(response=='yes'){
                  $(".success").text("อัพเดท").show('slow');
                }
                if(response=='no'){
                  $(".error").text("ไม่สำเร้จ").show('slow');
                }

              },complete: function(respond, status) {
                if (status == 'error') {
                  $("#TB_ajaxContent").append("<span class='msg' style='color:red;'>ล้มเหลว</span>");
                };

              }
            });
          }else{
            alert('เลือกสถานะด้วยนะครับ');
          }
    });
    $('#comment-form .form-submit').click(function(){
          event.preventDefault();
          $("#comment-form .msg").empty();
          nid = $('input[name=nid]').attr("value");
          subject = $("#comment-form #edit-subject-wrapper input[name=subject]").attr("value");
          comment = $("#comment-form #edit-comment-wrapper textarea[name=comment]").attr("value");
          //alert(status_desc+" : "+recall_date);
          var data = {nid: nid, subject: subject, comment: comment}
          $.ajax({
            type: 'POST',
            url: "http://"+location[2]+"/"+"update_comment_add",
            data: data,
            success: function(response) {
              
              if(response=='yes'){
                $("#comment-form #edit-subject-wrapper input[name=subject]").attr("value","");
                $("#comment-form #edit-comment-wrapper textarea[name=comment]").attr("value","");
                $("#comment-form").append("<span class='msg' style='color:green;'>อัพเดท</span>");
              }
              if(response=='no'){
                $("#comment-form").append("<span class='msg' style='color:red;'>กรุณาใส่ comment</span>");
              }
              
            },complete: function(respond, status) {
              if (status == 'error') {
                $("#comment-form").append("<span class='msg' style='color:red;'>ล้มเหลว</span>");
              };
              
            }
          });
          
    });
    
    $('#info-pass').click(function(){
       
       
        nid = $('#nid').text();
        status = $('#info-status').val();
       
       var data = {nid: nid, mode: 'check'}
       
       $.ajax({
         type: 'POST',
         url: location,
         data: data,
         success: function(response) {
           
           if(response=='yes'){
             console.log('updated');
           }
           
         },complete: function(respond, status) {
           if (status == 'error') { console.log('sync...fail!!!');};
         }
       });
       
       
    });
//palm search sms 
    $('#submit_sms_search').click(function(){
       if($("#phone").val()=='' && $("#email").val()==''){
         alert('กรุณากรอกข้อมูลเบอร์โทรศัพท์ หรือ อีเมล ก่อนทำการค้นหาด้วย ค่ะ');
         return false;
       }
       if($("#phone").val()!=''){
         if($("#phone").val().length <10){
           alert('กรุณากรอกข้อมูลเบอร์โทรศัพท์ ให้ครบ 10 หลักค่ะ');
           return false;
         }
       }
      if($("#email").val()!=''){
        if($("#email").val().match(/^[a-z0-9A-Z\-_\.]+@[a-z0-9A-Z\-_\.]+/)==null){
          alert('กรุณาตรวจสอบ อีเมล');
          return false;
        }
      }
    });
//palm search sms     
/*    $("#phone").keydown(function(event) {
      // Allow: backspace, delete, tab and escape
        if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || 
          // Allow: Ctrl+A
            (event.keyCode == 65 && event.ctrlKey === true) || 
          // Allow: home, end, left, right
            (event.keyCode >= 35 && event.keyCode <= 39)) {
          // let it happen, don't do anything
            return;
        }
        else {
          // Ensure that it is a number and stop the keypress
          if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
            event.preventDefault(); 
          }   
        }
    });*/
    
//palm  tacking 
    $('.thickbox').click(function(){
       $(this).parent('td').parent('.tacking-row').css("background-color","#93AE5C");
    });
 
    $('.tacking-row').click(function(){
       $(this).addClass('checked').css("background-color","#93AE5C");
    });
    
    $('.tacking-row').dblclick(function(){
       $(this).removeClass('checked').css("background-color","#FFFFFF");
    });
    
});