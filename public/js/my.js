
$(document).ready(function(){
	$("div > .facility1").html("<i class=\"fa fa-check-circle\"></i>").css("color","#4488FF");
	$("div > .facility0").html("<i class=\"fa fa-close\"></i>").css("color","red");
	$("div .check1").attr("checked",true);

});
$(function () {
  $('.datatable').DataTable({
    'paging'      : true,
    'lengthChange': false,
    'searching'   : true,
    'ordering'    : true,
    'info'        : true,
    'autoWidth'   : false
  });
});
function ConfirmDelete()
{
  var x = confirm("Are you sure you want to delete?");            
  if (x){            
    return true;                
  } else {            
    return false;            
  }                
}
$(function(){
  var dtToday = new Date();    
  var month = dtToday.getMonth() + 1;
  var day = dtToday.getDate();
  var year = dtToday.getFullYear();
  if(month < 10)
    month = '0' + month.toString();
  if(day < 10)
    day = '0' + day.toString();    
  var maxDate = year + '-' + month + '-' + day;
  $('.datepicker').attr('min', maxDate);
});


