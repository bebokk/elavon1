$(document).ready(function() {	
	$( "#sortable1, #sortable2, #sortable3, #sortable4" ).sortable({
		connectWith: ".connectedSortable"
	}).disableSelection();
});

function save_positions() {	
			
	var sortable11_tab = new Array();
	var sortable12_tab = new Array();
	var sortable21_tab = new Array();
	var sortable22_tab = new Array();
	var sortable31_tab = new Array();
	var sortable32_tab = new Array();
	var i=0;
	var id01;
	var id0 = new Array();
	
	i=0;
	$("#sortable1 li").each(function() {	
		id01 = $(this).attr('id');
		if (id01 != '') {			
			id0 = $(this).attr('id').split("_"); 
			sortable11_tab[i]=id0[0];
			sortable12_tab[i]=id0[1];
			i++;	
		}
	});	
	
	i=0;
	$("#sortable2 li").each(function() {	
		id01 = $(this).attr('id');
		if (id01 != '') {
			id0 = $(this).attr('id').split("_"); 
			sortable21_tab[i]=id0[0];
			sortable22_tab[i]=id0[1];
			i++;	
		}	
	});	
	
	i=0;
	$("#sortable3 li").each(function() {				
		id01 = $(this).attr('id');
		if (id01 != '') {
			id0 = $(this).attr('id').split("_"); 
			sortable31_tab[i]=id0[0];
			sortable32_tab[i]=id0[1];
			i++;	
		}
	});	
	
	$.post("ajax/main_page_save_pos.php", {
	'sortable11_tab': sortable11_tab,'sortable12_tab': sortable12_tab,
	'sortable21_tab': sortable21_tab,'sortable22_tab': sortable22_tab,
	'sortable31_tab': sortable31_tab,'sortable32_tab': sortable32_tab
	},  function(data){
		//alert(data);
		save_changes_info('You changes has been saved :)');
	});			
}
