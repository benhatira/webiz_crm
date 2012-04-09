$(function(){
  /*$(".page-monitor table.views-table tbody td.views-field-phpcode-1");
  $(".page-monitor table.views-table tbody tr");
  var nid = $(this).find('.views-field-phpcode').find('#nid').text();*/

  $(".page-monitor table.views-table tbody td.views-field-phpcode-1").hover(function (event) {
        
        var locateX=event.pageX;   
        var locateY=event.pageY; 
    		locateX+=10;
    		locateY-=180;
    		
    		var nid = $(this).find('#nid').text();
    		//console.log(nid);
       
    		var path = 'crm_tooltip';
    		var location = window.location.href.split('/');
    		location = "http://"+location[2]+"/"+path;
    		//console.log(location);
    		//console.log(path);
          $.ajax({
        		type: 'POST',
        		url: location,
        		dataType: "json",
            data: { 'nid': nid },
        		success: function(response) {
        		  
        		    console.log(response);
                var name = $('<div>').addClass('name').text('ชื่อ-สกุล่: '+response.name).appendTo('#info-tooltip');
                var biztype = $('<div>').addClass('biztype').text('ประเภท: '+response.biztype).appendTo('#info-tooltip');
                var bizcat = $('<div>').addClass('biztype').text('หมวดหมู่: '+response.bizcat).appendTo('#info-tooltip');
                var email = $('<div>').addClass('email').text('อีเมล: '+response.email).appendTo('#info-tooltip');
                var address = $('<div>').addClass('address').text('ที่อยู่: '+response.address).appendTo('#info-tooltip');
                var district = $('<div>').addClass('district').text('แขวง/ตำบล:  '+response.district).appendTo('#info-tooltip');
                var subdistrict = $('<div>').addClass('subdistrict').text('เขต/อำเภอ:   '+response.subdistrict).appendTo('#info-tooltip');
                var province = $('<div>').addClass('province').text('จังหวัด:   '+response.province).appendTo('#info-tooltip');
                var zipcode = $('<div>').addClass('zipcode').text('รหัสไปรษณีย์:   '+response.zipcode).appendTo('#info-tooltip');
                var custom_domain = $('<div>').addClass('custom_domain').text('domain :   '+response.custom_domain).appendTo('#info-tooltip');
                var webiz_domain = $('<div>').addClass('webiz_domain').text('webiz domain :   '+response.webiz_domain).appendTo('#info-tooltip');
                
                
        		   
        		},
        		complete: function(respond, status) {
        			if (status == 'error') {
        				console.log('Error, please try again later.');
        			}
        		}
        	});
    		
    		
    		  $('#info-tooltip').show().css({
      			left:locateX,
      			top:locateY
      		});
    		
    }, 
    function () {
      $('#info-tooltip').html("").hide();
    }
  );
    

});


function callTooltip(obj,event){ 
		var locateX=event.pageX;   
    var locateY=event.pageY; 
		locateX+=10;
		locateY+=10;
		$(obj).show().css({
			left:locateX,
			top:locateY
		});				
}