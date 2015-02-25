$(document).ready(function() {	
	
	var filetr_date = $("#filetr_date").val();
	
	$( "#filetr_date" ).datepicker({
		showWeek: true,
		firstDay: 1
	});
	$( "#filetr_date" ).datepicker( "option", "dateFormat", "yy-mm-dd");
	$( "#filetr_date" ).datepicker( "option", "defaultDate", "");
	$( "#filetr_date" ).datepicker( "setDate", filetr_date );
	
	callendar_month0();
});

function callendar_month0() {	

	var filetr_date = $("#filetr_date").val();
	$.post("ajax/calendar_month.php", {'filetr_date': filetr_date},  function(data){
		$("#calendar_month").html(data);
	});			
}


















