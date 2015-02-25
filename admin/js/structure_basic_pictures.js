$(document).ready(function() {
	
	$( "#structure_basic_sortable" ).sortable({
		update: function(event, ui) {
			save_positions();
		}
	});
	$( "#structure_basic_sortable" ).disableSelection();
	 
	$('.picture_show a').lightBox({fixedNavigation:true});
});

function save_positions1(event, ui) {	

	var details_id = $("#details_id").val();

	var pic_pos = '';
	$(".pictures02").each(function() {	
		
		var id1 = $(this).attr('id');
		var id2 = id1.split("_"); 
	
		$("#"+id1+" .picture").each(function() {	
		
			pic_pos += $(this).attr('id')+'_'+id2[3]+',';			
			//alert(pic_pos);			
		});	
	});	
	
	$.post("ajax/structure_basic_pictures.php", {'details_id': details_id,'action': 'save_position1','pic_pos': pic_pos},  function(data){
	
		//alert(data);		
		save_changes_info('You changes has been saved :)');
	});			
}

function save_positions() {	

	var details_id = $("#details_id").val();

	var pic_pos = '';
	$(".picture").each(function() {	
		pic_pos += $(this).attr('id')+',';	
	});	
	$.post("ajax/structure_basic_pictures.php", {'details_id': details_id,'action': 'save_position','pic_pos': pic_pos},  function(data){
		//alert(data);
		save_changes_info('You changes has been saved :)');
	});			
}

function delete_picture(del_pic) {	

	$("#pic1_"+del_pic).css('display','none');
	$.post("ajax/structure_basic_pictures.php", {'action': 'delete_picture','del_pic': del_pic},  function(data){
		save_changes_info('Picture was successfully deleted');
	});			
}