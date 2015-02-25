$(document).ready(function() {	
	
	$('body').keypress(function(e) {
		if (e.keyCode == 27) {
			$('.popup').css('display','none');
			$('.popup01').css('display','none');
		}
	});		
	
	reload_list0();
	
	/*
	$(':file').change(function(){
		var file = this.files[0];
		name = file.name;
		size = file.size; 
		type = file.type;
		//Your validation
	});
	*/
});

function clear_bigselect_element(id1,type1) {			

	$.post("ajax/structure_basic.php", {'action': 'clear_bigselect_element','id1': id1},  function(data){
		reload_list0();
	});			
}

function search_for_bigselect_element_select(id1,key1,val,type1) {		
	
	if (type1 == 'filter') {	
		$("#filter_"+key1).html('<option value='+id1+'>'+val+'</option>');
	} else {
		$("#"+key1).html('<option value='+id1+'>'+val+'</option>');
	}
	$('.popup000').css('display','none');
	$('.popup001').css('display','none');
	/*
	loading01(); 
	$.post("ajax/structure_basic.php", {'action': 'filter_bigselect_save','filter_bigselect': filter_bigselect,'key1': key1},  function(data){
		search_for_bigselect_element(key1);
		loading02(); 
	});				
	*/
}

function filter1_bigselect(key1) {
	
	var filter_bigselect = $("#filter_bigselect_"+key1).val();
	loading01(); 
	$.post("ajax/structure_basic.php", {'action': 'filter_bigselect','filter_bigselect': filter_bigselect,'key1': key1},  function(data){
		search_for_bigselect_element(key1);
		loading02(); 
	});				
}

function change_pagination_bigselect(amount,key1) {

	loading01(); 
	$.post("ajax/structure_basic.php", {'action': 'change_pagination_bigselect','amount': amount,'key1': key1},  function(data){
		search_for_bigselect_element(key1);
		loading02(); 
	});				
}

function search_for_bigselect_element(key1,type1) {

	loading01(); 
	$.post("php/popups/search_for_bigselect_element.php", {'key1': key1,'type1': type1},  function(data){
		$(".popup00").html(data);
		loading02(); 
	});			
}

function upload_attachment(element_id) {

	var
	oOutput = document.getElementById("output"),
	oData = new FormData(document.forms.namedItem("structure_basic_form"));

	var oReq = new XMLHttpRequest();
	oReq.open("POST", "ajax/structure_basic_uploadatt.php", true);

	oReq.onload = function(oEvent) {
		if (oReq.status == 200) {
			//alert('test1');
			element_attachments(element_id);
		} else {
			oOutput.innerHTML = "Error " + oReq.status + " occurred uploading your file.<br \/>";
		}
	};
	oReq.send(oData);
}

function upload_picture(element_id) {

	var
	oOutput = document.getElementById("output"),
	oData = new FormData(document.forms.namedItem("structure_basic_form"));

	var oReq = new XMLHttpRequest();
	oReq.open("POST", "ajax/structure_basic_uploadimg.php", true);

	oReq.onload = function(oEvent) {
		if (oReq.status == 200) {
			//alert('test1');
			element_pictures(element_id);
		} else {
			oOutput.innerHTML = "Error " + oReq.status + " occurred uploading your file.<br \/>";
		}
	};
	oReq.send(oData);
}

function upload_picture_att(element_id,element_id1,attachetname) {

	var
	oOutput = document.getElementById("output"),
	oData = new FormData(document.forms.namedItem("structure_basic_form"));

	var oReq = new XMLHttpRequest();
	oReq.open("POST", "ajax/structure_basic_uploadimg_att.php", true);

	oReq.onload = function(oEvent) {
		if (oReq.status == 200) {
			//alert('test1');
			element_pictures_att(element_id,element_id1,attachetname);
		} else {
			oOutput.innerHTML = "Error " + oReq.status + " occurred uploading your file.<br \/>";
		}
	};
	oReq.send(oData);
}


function change_pagination_att(amount,element_id,attachetname) {

	loading01(); 
	$.post("ajax/structure_basic_att.php", {'action': 'change_pagination','amount': amount,'element_id': element_id,'attachetname': attachetname},  function(data){
		attachet_tab(element_id,attachetname);
		loading02(); 
	});				
}

function change_pagination(amount) {	

	loading01(); 
	$.post("ajax/structure_basic.php", {'action': 'change_pagination','amount': amount},  function(data){
		reload_list0();
		loading02(); 
	});				
}

function show_entries_att(amount,element_id,attachetname) {	

	loading01(); 
	$.post("ajax/structure_basic_att.php", {'action': 'show_entries','amount': amount,'element_id': element_id,'attachetname': attachetname},  function(data){
		attachet_tab(element_id,attachetname);
		loading02(); 
	});				
}

function show_entries(amount) {	

	loading01(); 
	$.post("ajax/structure_basic.php", {'action': 'show_entries','amount': amount},  function(data){
		reload_list0();
		loading02(); 
	});				
}

function filter2(element_id,attachetname) {	

	loading01(); 
	var save_parameters_id_tab = new Array();
	var save_parameters_val_tab = new Array();
	var i=0;
		
	$(".filter_att_tab").each(function() {				
		save_parameters_id_tab[i]=$(this).attr('id');
		if ($(this).attr('class').match('select_value')) {
			save_parameters_val_tab[i]=$("select[name="+$(this).attr('id')+"]").val();		
		} else if ($(this).attr('class').match('tinymce')) {
			save_parameters_val_tab[i]=tinyMCE.get($(this).attr('id')).getContent();
		} else {
			save_parameters_val_tab[i]=$("input[name="+$(this).attr('id')+"]").val();		
		}
		i++;			
	});	
	
	$.post("ajax/structure_basic_att.php", {'action': 'filter1','element_id': element_id,'attachetname': attachetname,
	'save_parameters_id_tab':  save_parameters_id_tab,'save_parameters_val_tab': save_parameters_val_tab},  function(data){
		attachet_tab(element_id,attachetname);
		loading02(); 
	});			
}

function filter1() {	

	loading01(); 
	var save_parameters_id_tab = new Array();
	var save_parameters_val_tab = new Array();
	var i=0;
		
	$(".filter_tab").each(function() {				
		save_parameters_id_tab[i]=$(this).attr('id');
		if ($(this).attr('class').match('select_value')) {
			save_parameters_val_tab[i]=$("select[name="+$(this).attr('id')+"]").val();		
		} else if ($(this).attr('class').match('tinymce')) {
			save_parameters_val_tab[i]=tinyMCE.get($(this).attr('id')).getContent();
		} else {
			save_parameters_val_tab[i]=$("input[name="+$(this).attr('id')+"]").val();		
		}
		i++;			
	});	
	
	$.post("ajax/structure_basic.php", {'action': 'filter1','save_parameters_id_tab':  save_parameters_id_tab,
	'save_parameters_val_tab': save_parameters_val_tab},  function(data){
		reload_list0();
		loading02(); 
	});			
}

function sort1(sort1,sort2) {	

	loading01(); 
	$.post("ajax/structure_basic.php", {'action': 'sort1','sort1': sort1,'sort2': sort2},  function(data){
		reload_list0();
		loading02(); 
	});			
}

function sort1_att(sort1,sort2,element_id,attachetname) {	

	loading01(); 
	$.post("ajax/structure_basic_att.php", {'action': 'sort1','sort1': sort1,'sort2': sort2,'attachetname': attachetname},  function(data){
		attachet_tab(element_id,attachetname);
		loading02(); 
	});			
}

function save_positions() {	

	loading01(); 
	var parent_id = $("#parent_id").val();

	var elemstr_pos = '';
	$(".elemstr").each(function() {	
		elemstr_pos += $(this).attr('id')+',';	
	});	
	$.post("ajax/structure_basic.php", {'parent_id': parent_id,'action': 'save_position','elemstr_pos': elemstr_pos},  function(data){
		save_changes_info('You changes has been saved :)');
		loading02(); 
	});			
}

function save_positions_att(element_id,attachetname) {	

	loading01(); 
	var parent_id = $("#parent_id").val();

	var elemstr_pos = '';
	$(".elemstr_att").each(function() {	
		elemstr_pos += $(this).attr('id')+',';	
	});	
	$.post("ajax/structure_basic_att.php", {'parent_id': parent_id,'action': 'save_position','elemstr_pos': elemstr_pos,
	'element_id': element_id,'attachetname': attachetname},  function(data){
		save_changes_info_att('You changes has been saved :)');
		loading02(); 
	});			
}

function element_add_att(element_id,attachetname) {	

	loading01(); 
	$.post("php/popups/structure_basic_add_att.php", {'element_id': element_id,'attachetname': attachetname},  function(data){
		$(".popup00").html(data);
		$(".focus_here").focus();
		tiny_mce_on();
		loading02(); 
	});			
}

function element_add(element_id) {	

	loading01(); 
	$.post("php/popups/tenancies_add.php", {'element_id': element_id},  function(data){
		$(".popup0").html(data);
		$(".focus_here").focus();
		tiny_mce_on();
		loading02(); 
	});			
}

function save_add_element_att(element_id,attachetname) {

	loading01(); 
	//get all of the parameters which are to save
	var save_parameters_id_tab = new Array();
	var save_parameters_val_tab = new Array();
	var i=0;
	
	$(".save_par_att").each(function() {		
		$("#"+$(this).attr('id')+"_"+element_id).html($("input[name="+$(this).attr('id')+"]").val());	
		save_parameters_id_tab[i]=$(this).attr('id');
		if ($(this).attr('class').match('select_value')) {
			save_parameters_val_tab[i]=$("select[name="+$(this).attr('id')+"]").val();		
		} else if ($(this).attr('class').match('tinymce')) {
			save_parameters_val_tab[i]=tinyMCE.get($(this).attr('id')).getContent();
		} else {
			save_parameters_val_tab[i]=$("input[name="+$(this).attr('id')+"]").val();		
		}
		i++;	
	});
		
	$.post("ajax/structure_basic_att.php", {'element_id': element_id,'action': 'add_element','attachetname': attachetname,
	'save_parameters_id_tab':  save_parameters_id_tab,'save_parameters_val_tab': save_parameters_val_tab},  function(data){
		$(".popup00").html('');
		attachet_tab(element_id,attachetname);
		save_changes_info_att('You changes has been saved :)');
		loading02(); 
	});			
}

function save_add_element(element_id) {	

	var geolocation = $("#geolocation").val();
	
	var location1 = '';
	var location2 = '';
	
	if (geolocation == 1) {		
	
		var save_parameters_id_tab = new Array();
		var save_parameters_val_tab = new Array();
		
		var i=0;
		$(".save_par").each(function() {		
		
			save_parameters_id_tab[i]=$(this).attr('id');				
			//get location directory
			if ($(this).attr('id') == 'postcode') {
					
				var geocoder = new google.maps.Geocoder();
				var address = $("input[name="+$(this).attr('id')+"]").val();
				geocoder.geocode( { 'address': address}, function(results, status) {
					if (google.maps.GeocoderStatus.OK == 'OK')  {
						// do something with the geocoded result
						location1 = results[0].geometry.location.lat();
						location2 = results[0].geometry.location.lng();
					}
					save_add_element1(element_id,location1,location2);
				});
			}
			i++;	
		});
		
	} else {
	
		save_add_element1(element_id,location1,location2);
	} 
}

function save_add_element1(element_id,location1,location2) {

	loading01(); 
	//get all of the parameters which are to save
	var save_parameters_id_tab = new Array();
	var save_parameters_val_tab = new Array();
	var i=0;
	
	$(".save_par").each(function() {		
		$("#"+$(this).attr('id')+"_"+element_id).html($("input[name="+$(this).attr('id')+"]").val());	
		save_parameters_id_tab[i]=$(this).attr('id');
		if ($(this).attr('class').match('select_value')) {
			save_parameters_val_tab[i]=$("select[name="+$(this).attr('id')+"]").val();		
		} else if ($(this).attr('class').match('tinymce')) {
			save_parameters_val_tab[i]=tinyMCE.get($(this).attr('id')).getContent();
		} else {
			save_parameters_val_tab[i]=$("input[name="+$(this).attr('id')+"]").val();		
		}
		i++;	
	});
		
	$.post("ajax/tenancies.php", {'element_id': element_id,'action': 'add_element','save_parameters_id_tab':  save_parameters_id_tab,
	'save_parameters_val_tab': save_parameters_val_tab,'location1': location1,'location2': location2},  function(data){
		reload_list(element_id);
		loading02(); 
	});			
}

function reload_list0() {

	loading01(); 	
	$.post("ajax/structure_basic_list.php", {},  function(data){
		$("#structure_basic_list").html(data);
		loading02(); 
	});			
}

function reload_list(element_id) {	

	loading01(); 	
	//get all of the parameters which are to save
	var save_parameters_id_tab = new Array();
	var save_parameters_val_tab = new Array();
	var i=0;
	
	$(".save_par").each(function() {		
		$("#"+$(this).attr('id')+"_"+element_id).html($("input[name="+$(this).attr('id')+"]").val());	
		save_parameters_id_tab[i]=$(this).attr('id');
		if ($(this).attr('class').match('select_value')) {
			save_parameters_val_tab[i]=$("select[name="+$(this).attr('id')+"]").val();		
		} else if ($(this).attr('class').match('tinymce')) {
			save_parameters_val_tab[i]=tinyMCE.get($(this).attr('id')).getContent();
		} else {
			save_parameters_val_tab[i]=$("input[name="+$(this).attr('id')+"]").val();		
		}
		i++;	
	});
	
	$.post("ajax/structure_basic_list.php", {'element_id': element_id,'save_parameters_id_tab': save_parameters_id_tab,
	'save_parameters_val_tab': save_parameters_val_tab},  function(data){
		$("#structure_basic_list").html(data);
		save_changes_info('You changes has been saved :)');
		$('.popup').css('display','none');
		$('.popup01').css('display','none');
		loading02(); 
	});			
}

function element_delete_att(element_id,element_id1,attachetname) {	

	loading01(); 	
	$.post("php/popups/structure_basic_delete_att.php", {'element_id': element_id,'element_id1': element_id1,'attachetname': attachetname},  function(data){
		$(".popup00").html(data);
		$(".popup01").css('height',page_height()+'px');
		$(".focus_here").focus();
		loading02(); 
	});			
}

function element_delete(element_id) {

	loading01(); 	
	$.post("php/popups/structure_basic_delete.php", {'element_id': element_id},  function(data){
		$(".popup0").html(data);
		$(".popup01").css('height',page_height()+'px');
		$(".focus_here").focus();
		loading02(); 
	});			
}

function save_delete_element_att(element_id,element_id1,attachetname) {

	loading01(); 			
	$.post("ajax/structure_basic_att.php", {'element_id': element_id,'element_id1': element_id1,
	'attachetname': attachetname,'action': 'delete_element'},  function(data){
		$(".popup00").html('');
		attachet_tab(element_id,attachetname);
		save_changes_info_att('You changes has been saved :)');
		loading02(); 
	});			 
}

function save_delete_element(element_id,element_id1,attachetname) {		

	loading01(); 		
	$.post("ajax/structure_basic.php", {'element_id': element_id,'action': 'delete_element'},  function(data){
		reload_list(element_id);
		loading02(); 
	});			
}

function element_translate(element_id) {

	loading01(); 	
	$.post("php/popups/structure_translations.php", {'element_id': element_id},  function(data){
		$(".popup0").html(data);
		$(".focus_here").focus();
		tiny_mce_on();
		loading02(); 
	});			
}

function element_attachments(element_id) {	

	loading01(); 	
	$.post("php/popups/structure_attachments.php", {'element_id': element_id},  function(data){
		$(".popup0").html(data);
		$(".popup01").css('height',page_height()+'px');
		loading02(); 
	});			
}

function element_pictures(element_id) {	

	loading01(); 	
	$.post("php/popups/structure_pictures.php", {'element_id': element_id},  function(data){
		$(".popup0").html(data);
		$(".popup01").css('height',page_height()+'px');
		loading02(); 
	});			
}

function element_pictures_att(element_id,element_id1,attachetname) {	

	loading01(); 	
	$.post("php/popups/structure_pictures_att.php", {'element_id': element_id,'element_id1': element_id1,'attachetname': attachetname},  function(data){
		$(".popup00").html(data);
		$(".popup001").css('height',page_height()+'px');
		loading02(); 
	});	
}

function attachet_tab(element_id,attachetname) {	

	loading01(); 
	$.post("php/popups/structure_basic_attachet_tab.php", {'element_id': element_id,'attachetname': attachetname},  function(data){
		$(".popup0").html(data);
		$(".focus_here").focus();
		tiny_mce_on();
		loading02();
	});			
}

function element_edit_att(element_id,element_id1,attachetname) {	

	loading01(); 	
	$.post("php/popups/structure_basic_att.php", {'element_id': element_id,'element_id1': element_id1,'attachetname': attachetname},  function(data){
		$(".popup00").html(data);
		$(".focus_here").focus();
		tiny_mce_on();
		loading02();
	});			
}

function element_edit(element_id) {	

	loading01(); 
	$.post("php/popups/structure_basic.php", {'element_id': element_id},  function(data){
		$(".popup0").html(data);
		$(".focus_here").focus();
		tiny_mce_on();
		loading02();
	});			
}

function element_view(element_id) {	

	loading01(); 
	$.post("php/popups/structure_basic_view.php", {'element_id': element_id},  function(data){
		$(".popup0").html(data);
		$(".focus_here").focus();
		tiny_mce_on();
		loading02();
	});			
}

function save_element_translations(element_id) {	

	loading01(); 
	//get all of the parameters which are to save
	var save_parameters_id_tab = new Array();
	var save_parameters_val_tab = new Array();
	var i=0;
	$(".save_par").each(function() {
		save_parameters_id_tab[i]=$(this).attr('id');			
		if ($(this).attr('class').match('select_value')) {
			save_parameters_val_tab[i]=$("select[name="+$(this).attr('id')+"]").val();		
		} else if ($(this).attr('class').match('tinymce')) {
			save_parameters_val_tab[i]=tinyMCE.get($(this).attr('id')).getContent();
		} else {
			save_parameters_val_tab[i]=$("input[name="+$(this).attr('id')+"]").val();		
		}
		i++;	
	});
		
	$.post("ajax/structure_basic.php", {'element_id': element_id,'action': 'save_translations','save_parameters_id_tab':  save_parameters_id_tab,
	'save_parameters_val_tab': save_parameters_val_tab},  function(data){
		//alert(data);
		save_changes_info('You changes has been saved :)');
		$('.popup').css('display','none');
		$('.popup01').css('display','none');
		loading02();
	});			
}

function save_element_changes_att(element_id,element_id1,attachetname) {	

	loading01(); 
	//get all of the parameters which are to save
	var save_parameters_id_tab = new Array();
	var save_parameters_val_tab = new Array();
	var i=0;
	$(".save_par_att").each(function() {		
	
		save_parameters_id_tab[i]=$(this).attr('id');			
		
		if ($(this).attr('class').match('select_value')) {
			save_parameters_val_tab[i]=$("select[name="+$(this).attr('id')+"]").val();		
		} else if ($(this).attr('class').match('tinymce')) {
			save_parameters_val_tab[i]=tinyMCE.get($(this).attr('id')).getContent();
		} else {
			save_parameters_val_tab[i]=$("input[name="+$(this).attr('id')+"]").val();		
		}
		//$("#"+$(this).attr('id')+"_"+element_id).html(save_parameters_val_tab[i]);	
		i++;	
	});
		
	$.post("ajax/structure_basic_att.php", {'element_id': element_id,'attachetname': attachetname,'action': 'save_details',
	'save_parameters_id_tab':  save_parameters_id_tab,'save_parameters_val_tab': save_parameters_val_tab},  function(data){	
		$(".popup00").html('');
		attachet_tab(element_id1,attachetname);
		save_changes_info_att('You changes has been saved :)');
		loading02();
	});			
}

function save_element_changes(element_id) {	

	var geolocation = $("#geolocation").val();
	
	var location1 = '';
	var location2 = '';
	
	if (geolocation == 1) {		
	
		var save_parameters_id_tab = new Array();
		var save_parameters_val_tab = new Array();
		
		var i=0;
		$(".save_par").each(function() {		
		
			save_parameters_id_tab[i]=$(this).attr('id');				
			//get location directory
			if ($(this).attr('id') == 'postcode') {
					
				var geocoder = new google.maps.Geocoder();
				var address = $("input[name="+$(this).attr('id')+"]").val();
				geocoder.geocode( { 'address': address}, function(results, status) {
					if (google.maps.GeocoderStatus.OK == 'OK')  {
						// do something with the geocoded result
						location1 = results[0].geometry.location.lat();
						location2 = results[0].geometry.location.lng();
					}
					save_element_changes1(element_id,location1,location2);
				});
			}
			i++;	
		});
	} else {
		save_element_changes1(element_id,location1,location2);
	} 
}

function save_element_changes1(element_id,location1,location2) {	
		
	loading01(); 
	//get all of the parameters which are to save
	var save_parameters_id_tab = new Array();
	var save_parameters_val_tab = new Array();
	var i=0;
	$(".save_par").each(function() {		
	
		save_parameters_id_tab[i]=$(this).attr('id');			
		if ($(this).attr('class').match('multiselect_value')) {
			save_parameters_val_tab[i]=$("select[name="+$(this).attr('id')+"]").val();	
		} else if ($(this).attr('class').match('select_value')) {
			save_parameters_val_tab[i]=$("select[name="+$(this).attr('id')+"]").val();	
		} else if ($(this).attr('class').match('tinymce')) {
			save_parameters_val_tab[i]=tinyMCE.get($(this).attr('id')).getContent();
		} else {
			save_parameters_val_tab[i]=$("input[name="+$(this).attr('id')+"]").val();		
		}
		//$("#"+$(this).attr('id')+"_"+element_id).html(save_parameters_val_tab[i]);	
		i++;	
	});
		
	$.post("ajax/structure_basic.php", {'element_id': element_id,'action': 'save_details','save_parameters_id_tab':  save_parameters_id_tab,
	'save_parameters_val_tab': save_parameters_val_tab,'location1': location1,'location2': location2},  function(data){
	
		reload_list0();
		save_changes_info('You changes has been saved :)');
		$('.popup').css('display','none');
		$('.popup01').css('display','none');
		loading02();
	});			
}













