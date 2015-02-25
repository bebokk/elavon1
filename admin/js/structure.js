$(document).ready(function() {

	$( "#sortable" ).sortable({
		update: function(event, ui) {
			save_positions();
		}
	});
	$( "#sortable" ).disableSelection();	
});

function save_positions() {	

	var parent_id = $("#parent_id").val();

	var elemstr_pos = '';
	$(".elemstr").each(function() {	
		elemstr_pos += $(this).attr('id')+',';	
	});	
	
	$.post("ajax/structure.php", {'parent_id': parent_id,'action': 'save_position','elemstr_pos': elemstr_pos},  function(data){
		save_changes_info('You changes has been saved :)');
	});			
}