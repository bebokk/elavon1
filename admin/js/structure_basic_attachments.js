$(document).ready(function() {
	
	$( "#structure_basic_sortable" ).sortable({
		update: function(event, ui) {
			save_positions();
		}
	});
	$( "#structure_basic_sortable" ).disableSelection();
	 
	$('.attachment_show a').lightBox({fixedNavigation:true});
});

function save_attachment_changes(element_id,element_id1) {	

	var description = $("textarea[name=description]").val();		
	
	$.post("ajax/structure_basic_attachments.php", {'element_id': element_id,'action': 'save_changes','description': description},  function(data){
		
		$(".popup00").html('');
		element_attachments(element_id1);
		save_changes_info_att('You changes has been saved :)');
	});			
}

function edit_attachment(element_id,element_id1) {

	loading01(); 	
	$.post("php/popups/structure_attachments_edit.php", {'element_id': element_id,'element_id1': element_id1},  function(data){	
		$(".popup00").html(data);
		$(".focus_here").focus();
		loading02();
	});			
}

function save_positions() {	

	var details_id = $("#details_id").val();

	var pic_pos = '';
	$(".elemstr").each(function() {	
		pic_pos += $(this).attr('id')+',';	
	});	
	$.post("ajax/structure_basic_attachments.php", {'details_id': details_id,'action': 'save_position','pic_pos': pic_pos},  function(data){
		//alert(data);
		save_changes_info('You changes has been saved :)');
	});			
}

function delete_attachment(del_pic) {	

	$("#pic1_"+del_pic).css('display','none');
	$.post("ajax/structure_basic_attachments.php", {'action': 'delete_attachment','del_pic': del_pic},  function(data){
		save_changes_info('attachment was successfully deleted');
	});			
}