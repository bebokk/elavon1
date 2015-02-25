function loading1() {
  var num1 = 0;

  $('#progress2').stop(true, true).animate({ borderSpacing: 180 }, {

    step: function (now, fx) {
      now = now + 45;
      //alert(now);

      $(this).css('-webkit-transform','rotate(' + now + 'deg)');
      $(this).css('-moz-transform','rotate(' + now + 'deg)');
      $(this).css('transform','rotate(' + now + 'deg)');

      now = now/4.5;
      num1 = now.toPrecision(3);
      $("#progress0").html(num1 + '%');
    },

    done: function (now, fx) {

      $(".progress2").css('-webkit-transform','rotate(45deg)');
      $(".progress2").css('-moz-transform','rotate(45deg)');
      $(".progress2").css('transform','rotate(45deg)');
      $(".progress2").css("border-color","#00A5E0 #00A5E0 transparent transparent");
      //alert('test');
      loading2();
    },

    duration: 1500,
    easing:'linear'

  },'linear');
}

function wait() {
	
	$("#not_dragable").val('1');
	setTimeout(function(){
		$("#not_dragable").val('');
	}, 300);
}

function loading2() {

  //alert('test');
  $('#progress2').stop(true,true).animate({  borderSpacing: 360 }, {

    step: function (now,fx) {

      //alert('test1 -- '+now);
      now -= 135;
      $(this).css('-webkit-transform','rotate(' + now + 'deg)');
      $(this).css('-moz-transform','rotate(' + now + 'deg)');
      $(this).css('transform','rotate(' + now + 'deg)');

      now = (now / 4.5) + 50;
      num1 = now.toPrecision(3);
      $("#progress0").html(num1 + '%');
    },

    done: function(now, fx) {
      $("#progress0").html('100.0%');
      /*
      $(".progress2").css('-webkit-transform','rotate(45deg)');
      $(".progress2").css('-moz-transform','rotate(45deg)');
      $(".progress2").css('transform','rotate(45deg)');
      $(".progress2").css("border-color","rgb(149, 165, 166) rgb(149, 165, 166) transparent transparent");
      loading2();
      */
    },

    duration: 1500,
    easing:'linear'

  },'linear');
}

function check_what_selected (id, i) {

  var check1 = $("#button1_" + id + "_" + i).attr("class");
  var button1 = ',';

  if (check1 === "quest-button button1 button1_" + id) {
    $("#button1_" + id + "_" + i).attr("class","quest-button button1 button1_" + id + " button1_selected");

  } else {
    $("#button1_" + id + "_" + i).attr("class","quest-button button1 button1_" + id);
  }

  $(".button1_" + id).each(function() {
    var check2 = $(this).attr("class")

    if (check2 === "quest-button button1 button1_" + id + " button1_selected") {
      button1 += $(this).val() + ",";
    }
  });

  //alert(button1);
  $("#button1_" + id).val(button1);
}

// return the input area markup for the selected person
function getExplanationInputTemplate (name, buttonId, personId) {
  // id to give the textarea
  var elementId = 'pic_com_'+ buttonId + '_' + personId;

  // existing blocks/textareas on the page that we should reuse, inc. the value
  var existingEl = $('#' + name.replace(' ', ''));
  var existingTextarea = $(existingEl.selector + ' > textarea');
  var existingVal = existingTextarea.val() || '';

  // template for new inputs to insert
  var template = '<div id="' + buttonId + '_' + name.replace(' ', '') + '">' + name + '<br /><textarea maxlength="140" placeholder="Max 140 characters..." name="' + elementId + '" id="' + elementId + '" class="form-control pic_com"></textarea> </div> <br />';

  // if a template for the individual already exists, keep the value and reuse it
  if (existingEl[0]) {
    existingTextarea.text(existingVal);
    return existingEl[0].outerHTML;

  } else {
    return template;
  }
}

function check_what_selected2 (elementId) {

  // toggle the selected class
  var btnSelector = '#' + elementId;
  $(btnSelector).toggleClass('button2_selected');

  var id = elementId.split("_")[1];
  var btnClass = '.button1_' + id;

  // get all selected buttons from page
  var selectedButtons = $(btnClass + '.button2_selected');
  var selectedInputAreas = [];

  Array.prototype.forEach.call(selectedButtons, function (button, idx) {
    var $btn = $('#' + button.id);
    var personId = button.id.split("_")[2];

    // build up a list of all inputs
    var template = getExplanationInputTemplate($btn.val(), id, personId);
    selectedInputAreas.push(template);
  });

  // render all the inputs
  $("#pic_com_list_" + id).html(selectedInputAreas.join('\r\n'));
}

function check_what_selected2_1 (id) {

  var button1 = ',';
  var pic_com_list = '';

  $(".button1_" + id).each(function() {
    $(this).attr("class","answer-img-back button2 button1_" + id);
  });

  $("#pic_com_list_" + id).html(pic_com_list);
  $("#button22_" + id).addClass( "button_nobody_hover" );  
}

function check_what_selected3 (id, i) {
	
  var check1 = $("#button1_" + id + "_" + i).attr("class");
  var button1 = $("#button1_" + id + "_" + i).val();

  $(".button1_" + id).attr("class","answer-img-back button4 button1_" + id);
  $("#button1_" + id).val(i);
  $("#button1_" + id + "_" + i).attr("class","answer-img-back button4 button1_" + id + " button2_selected");
}

function check_what_selected4 (id, i) {
	
  var button1_i = 0;
  $(".button1_" + id).each(function() {
    var check2 = $(this).attr("class");
    if (check2 === "answer-img-back button4 button1_" + id + " button2_selected") {		
		button1_i++;
	}	
  });
  var check1 = $("#button1_"+id+"_"+i).attr("class");

  if (button1_i < 3 || check1 != "answer-img-back button4 button1_" + id) {
  
    //alert(check1+" - answer-img-back button2 button1_"+id);

    if (check1 === "answer-img-back button4 button1_" + id) {
		
      $("#button1_" + id + "_" + i).attr("class","answer-img-back button4 button1_" + id + " button2_selected");
      $("#person_" + id + "_" + i).css("display","block");

    } else {
      $("#button1_" + id + "_" + i).attr("class","answer-img-back button4 button1_" + id);
      $("#person_" + id + "_" + i).css("display","none");
    }

	//alert('test');
	var selected_people = ',';
	$(".button1_" + id).each(function() {	  
		var check2 = $(this).attr("class");
		if (check2 === "answer-img-back button4 button1_" + id + " button2_selected") {
			
			//get person id
			var id0 = $(this).attr('id');
			var personId = id0.split("_")[2];
			selected_people += personId+',';   
		}	
	});
	//alert(selected_people);
	$("#button1_" + id).val(selected_people);
  
  } else {
    alert('Please select a maximum of 3 people');
  }
}

function check_what_selected5 (id, i, i1) {
	
	var button1_i=0;
	$(".button5_" + id + "_" + i).each(function() {
		
		var check2 = $(this).attr("class");
		if (check2 === "quest-button button5 button5_" + id + "_" + i + " button1_selected") {
			
			button1_i++;
		}
	});

  var check1 = $("#button5_" + id + "_" + i + "_" + i1).attr("class");

  if (button1_i < 3 || check1 != "quest-button button5 button5_" + id + "_" + i) {

    if (check1 === "quest-button button5 button5_" + id + "_" + i) {
      $("#button5_" + id + "_" + i + "_" + i1).attr("class","quest-button button5 button5_" + id + "_" + i + " button1_selected");

    } else {
      $("#button5_" + id + "_" + i + "_" + i1).attr("class","quest-button button5 button5_" + id + "_" + i);
    }

    var button1 = ',';

    $(".button5_" + id + "_" + i).each(function() {
      var check2 = $(this).attr("class");

      if (check2 == "quest-button button5 button5_" + id + "_" + i + " button1_selected") {
        button1 += $(this).val() + ",";
      }
    });

    //alert(button1);
    $("#button5_" + id + "_" + i).val(button1);
	
	var selected_elements = ',';
	$(".button5_" + id + "_" + i).each(function() {

	var check2 = $(this).attr("class");
	if (check2 === "quest-button button5 button5_" + id + "_" + i + " button1_selected") {
		
		//get person id
		var id0 = $(this).attr('id');
		var personId = id0.split("_")[3];
		selected_elements += personId+',';   
	}
	});
	$("#values1_"+id+"_"+i).val(selected_elements);
  }
}

function check_what_selected6 (elementId) {
  
  // toggle the selected class
  var btnSelector = '#' + elementId;
  $(btnSelector).toggleClass('button2_selected');

  var id = elementId.split("_")[1];
  var btnClass = '.button1_' + id;

  // get all selected buttons from page
  var selectedButtons = $(btnClass + '.button2_selected');
  var selectedInputAreas = [];

  var selected_people = ',';
  Array.prototype.forEach.call(selectedButtons, function (button, idx) {
    var $btn = $('#' + button.id);
    var personId = button.id.split("_")[2];

    // build up a list of all inputs
    var template = getExplanationInputTemplate($btn.val(), id, personId);
    selectedInputAreas.push(template);
    selected_people += personId+',';
  });

  // render all the inputs
  $("#pic_com_list_" + id).html(selectedInputAreas.join('\r\n'));
  $("#button1_" + id).val(selected_people);
  $("#button22_" + id).removeClass( "button_nobody_hover" );  
}

function i_dont_know1(id) {
  
  $("#amount2_"+id).val('-1');
  $("#i_dont_know_checkbox_"+id).prop('checked', true);
}

function i_dont_know2(id) {

  var test = $("#i_dont_know_checkbox_"+id).prop('checked');
  if (test === false) {

    $("#amount2_"+id).val('-1');
  } else {

    $("#amount2_"+id).val('50');
  }
}
