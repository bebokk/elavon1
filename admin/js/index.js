$(document).ready(function() {	

});

$(window).bind("load", function() {	
});

function loading01() {	

	$("#loading0").val('1');	
	setTimeout(loading011, 200);	
}

function loading011() {	
	
	var loading0 = $("#loading0").val();	
	if (loading0 == 1) {
		$( ".loading0" ).fadeIn( "slow", function() {
			$("#loading0").val('2');
		});
	}
}

function loading02() {
	
	var loading0 = $("#loading0").val();	
	$("#loading0").val('0');
	
	if (loading0 == 2 || loading0 == 1) {
		$( ".loading0" ).fadeOut( "slow", function() {		
		});	
	} else {
		$("#loading0").val('0');
	} 
}

function tiny_mce_on0(id) {
	tinymce.init({
		selector: "."+id,
			plugins: [
					"advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
					"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
					"table contextmenu directionality emoticons template textcolor paste fullpage textcolor"
			],
			toolbar1: "code | newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
			toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | inserttime preview | forecolor backcolor",
			toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",

			menubar: false,
			toolbar_items_size: 'small',
			height : 300,

			style_formats: [
					{title: 'Bold text', inline: 'b'},
					{title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
					{title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
					{title: 'Example 1', inline: 'span', classes: 'example1'},
					{title: 'Example 2', inline: 'span', classes: 'example2'},
					{title: 'Table styles'},
					{title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
			],

			templates: [
					{title: 'Test template 1', content: 'Test 1'},
					{title: 'Test template 2', content: 'Test 2'}
			]
	});
}

function tiny_mce_on() {
	tiny_mce_on0('tinymce');
}

function save_changes_info (text) {
	$("#save_changes_info_span").html(text);
	$(".save_changes_info").fadeIn(500).delay(1000).fadeOut(500);
}
function save_changes_info_att (text) {
	$("#save_changes_info_att_span").html(text);
	$(".save_changes_info_att").fadeIn(500).delay(1000).fadeOut(500);
}

function page_height() {
	return($(".content0").height());
}