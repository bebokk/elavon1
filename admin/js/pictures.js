$(document).ready(function() {
	
	$( "#sortable" ).sortable({
		update: function(event, ui) {
			save_positions();
		}
	});
	$( "#sortable" ).disableSelection();
	
	$('.picture_show a').lightBox({fixedNavigation:true});
});

function picture_edit(picture_id) {	

	$.post("php/popups/edit_picture.php", {'picture_id': picture_id},  function(data){
		$(".popup0").html(data);
	});			
}

function save_image_changes(picture_id) {	

	var image_desc1 = $("#image_desc1").val();

	$.post("ajax/pictures.php", {'picture_id': picture_id,'action': 'save_description','image_desc1': image_desc1},  function(data){
		save_changes_info('You changes has been saved :)');
		$('.popup').css('display','none');
		$('.popup01').css('display','none');
	});			
}

function save_positions() {	

	var details_id = $("#details_id").val();

	var pic_pos = '';
	$(".picture").each(function() {	
		pic_pos += $(this).attr('id')+',';	
	});	
	$.post("ajax/pictures.php", {'details_id': details_id,'action': 'save_position','pic_pos': pic_pos},  function(data){
		save_changes_info('You changes has been saved :)');
	});			
}

function delete_picture(del_pic) {	

	$("#pic_"+del_pic).css('display','none');
	$.post("ajax/pictures.php", {'action': 'delete_picture','del_pic': del_pic},  function(data){
		save_changes_info('Picture was successfully deleted');
	});			
}