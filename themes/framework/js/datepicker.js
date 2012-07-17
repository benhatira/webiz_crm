$(document).ready(function(){
  var myDate = new Date();
  var month = (myDate.getMonth()+1).toString();
  if (month.length == 1) month = "0" + month;
  var today = myDate.getFullYear() + '-' + month + '-' + myDate.getDate() ;
  //$("#edit-field-customer-signup-date-value-min-date").val(today);
  
  
  $("#edit-field-customer-signup-date-value-min-date").datepicker({
    dateFormat: 'yy-mm-dd', 
  });
  
  $("#edit-field-customer-signup-date-value-max-date").datepicker({
    dateFormat: 'yy-mm-dd', 
  });
  
  
  
});
