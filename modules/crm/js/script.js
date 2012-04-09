$(function(){
    
    var nid;
    var status;
    var status_desc;
    var recall_date;
    var path = 'update_crm_info';
    var location = window.location.href.split('/');
		location = "http://"+location[2]+"/"+path;
   
    $('#info-ok').click(function(){
          
          nid = $('#nid').text();
          status = $('#info-status').val();
          status_desc = $('#description-status').val();
          recall_date = $('#workTime').val();
          //alert(status_desc+" : "+recall_date);
          
          var data = {nid: nid, status: status, status_desc: status_desc, recall_date: recall_date, mode: 'level'}
          
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
    
});