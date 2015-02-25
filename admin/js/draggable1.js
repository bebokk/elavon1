$(document).ready(function() {	


});

function draggable1_right(element_id,id) {

	loading01(); 
	$.post("ajax/modules/draggable1.php", {'action': 'draggable1_right','element_id': element_id,'id': id},  function(data){		
		//alert(data);
		popup_draggable1(element_id);
		loading02(); 
	});			
}

function draggable1_left(element_id,id) {

	loading01(); 
	$.post("ajax/modules/draggable1.php", {'action': 'draggable1_left','element_id': element_id,'id': id},  function(data){		
		//alert(data);
		popup_draggable1(element_id);
		loading02(); 
	});			
}

function popup_draggable1(element_id) {

	loading01(); 
	$.post("php/popups/modules/draggable1.php", {'element_id': element_id},  function(data){		
		$(".popup0").html(data);
		loading02(); 
	});				
}
















