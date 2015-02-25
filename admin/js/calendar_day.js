$(document).ready(function() {	
	
	var filetr_date = $("#filetr_date").val();
	
	$( "#filetr_date" ).datepicker({
		showWeek: true,
		firstDay: 1
	});
	$( "#filetr_date" ).datepicker( "option", "dateFormat", "yy-mm-dd");
	$( "#filetr_date" ).datepicker( "option", "defaultDate", "");
	$( "#filetr_date" ).datepicker( "setDate", filetr_date );
	
	callendar_day0();
});

function callendar_day0() {	

	var filetr_date = $("#filetr_date").val();
	$.post("ajax/calendar_day.php", {'filetr_date': filetr_date},  function(data){
		$(".callendar_day").html(data);
	});			
}


















