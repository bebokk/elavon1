angular.module('webApp', [])

  .run(function () {
    loading1();

    $(function() {
	    FastClick.attach(document.body);
		});
  })

  .controller('formControler', function ($scope, $http, $timeout) {

    $http.get("php/get_type.php").success(function (response) {
      $("#type1").val(response);
    });

    $http.get("php/get_settings.php").success(function (response) {
      $("#intoduction_text").html(response);
    });

    $http.get("php/get_settings1.php").success(function (response) {
      $("#intoduction_title").html(response);
    });

    $http.get("php/get_settings2.php").success(function (response) {
      $("#thank_you_text").html(response);
    });

    $http.get("php/get_questions.php").success(function (response) {

      $scope.names = response;

      $timeout(function () {

		var type = $("#type1").val();
		//alert(type);
		
        $(".sortable_faces11").each(function() {	  
		  
			var id = $(this).attr("id");
			
			$( "#"+id )
			  .sortable({
  				start: function (event, ui) {
					$("#not_clicable").val('1');
  				},
			  stop: function (event, ui) {

					//alert("New position: " + ui.item.index());
					//alert("New id: " + this.id);

					var id2 = this.id.split("_");

					var not_dragable = $("#not_dragable").val();
					if (not_dragable == '') {
												
						if (ui.item.index() == 0) {
							
						  $("#likert_tick_" + id2[2] + "_" + id2[3]).attr("src", "img/tick.svg");
						  $("#likert_cross_" + id2[2] + "_" + id2[3]).attr("src", "img/cross-selected.svg");      
						  $("#pic_com_"+id2[2]+"_"+id2[3]).val('-1');

						} else if (ui.item.index() == 1) {

						  $("#likert_tick_" + id2[2] + "_" + id2[3]).attr("src", "img/tick.svg");
						  $("#likert_cross_" + id2[2] + "_" + id2[3]).attr("src", "img/cross.svg");      
						  $("#pic_com_"+id2[2]+"_"+id2[3]).val('0');
						  
						} else if (ui.item.index() == 2) {
							
						  $("#likert_tick_" + id2[2] + "_" + id2[3]).attr("src", "img/tick-selected.svg");
						  $("#likert_cross_" + id2[2] + "_" + id2[3]).attr("src", "img/cross.svg");      
						  $("#pic_com_"+id2[2]+"_"+id2[3]).val('1');
						}
					}
					
					$("#not_clicable").val('');
  				}
			  });
		});
		

        $( "#sortable1, #sortable2, #sortable3, #sortable4" )
          .sortable({
            connectWith: ".connectedSortable",

            start: function (event, ui) {

            },

            stop: function (event, ui) {
				
              var ui_id = ui.item.attr('id');
              var ui_id2 = ui_id.split("_");
              var id2 = $("#" + ui_id).parent().attr("id");
              //alert(id2);

              if (id2 !== 'sortable1') {

                var i = 0;

                $("#" + id2 + " .button-mini").each(function() {					
					
                  var testid = $(this).attr('id');
                  var testid2 = testid.split("_");

                  //alert(i);
                  if (ui_id2[1] === testid2[1]) {
					  
					if (id2 === 'sortable2') {
						$("#pic_com_"+testid2[1]+"_"+testid2[2]).val('-1');
					} else if (id2 === 'sortable3') {
						$("#pic_com_"+testid2[1]+"_"+testid2[2]).val('0');
					} else if (id2 === 'sortable4') {
						$("#pic_com_"+testid2[1]+"_"+testid2[2]).val('1');
					}

                    var left = i * 60 - Math.floor(i / 3) * 180;
                    var bottom = Math.floor(i / 3) * 60;

                    $(this).css("left", left + "px");
                    $(this).css("bottom", bottom + "px");
                    $(this).css("position", "absolute");
                    $(this).css("margin", "auto");
                    $(this).css("top", "auto");
                    $(this).css("right", "auto");

                    i++;
                  }
                });
              }
            }
          })
          .draggable({})
          .disableSelection();

        $('.name_filled').click(function() {
          var name = $("#name").val();

          if (name != '') {
            $(".start_hidden").attr("class","slide-block mod-secondary-dark5 ng-scope start_hidden1");
          }
        });

        $('.likert3_1').click(function() {
			
			var id1 = $(this).attr('id');
			var id2 = id1.split("_");		
			var face = $("#face_" + id2[2] + "_" + id2[3]).html(); 	
					
			var i=-1;		
			$("#sortable_faces1_" + id2[2] + "_" + id2[3]+" .likert3_1").each(function() {
						
				var id11 = $(this).attr('id');
				
				if (id11 == id1) {					
					$(this).html(face);
					$("#pic_com_"+id2[2]+"_"+id2[3]).val(i);
					
					if (i == -1) {
						$("#likert_tick_" + id2[2] + "_" + id2[3]).attr("src","img/tick.svg");
						$("#likert_cross_" + id2[2] + "_" + id2[3]).attr("src","img/cross-selected.svg");
					} else if (i == 0) {
						$("#likert_tick_" + id2[2] + "_" + id2[3]).attr("src","img/tick.svg");
						$("#likert_cross_" + id2[2] + "_" + id2[3]).attr("src","img/cross.svg");						
					} else if (i == 1) {
						$("#likert_tick_" + id2[2] + "_" + id2[3]).attr("src","img/tick-selected.svg");
						$("#likert_cross_" + id2[2] + "_" + id2[3]).attr("src","img/cross.svg");						
					}
					
				} else {		
					$(this).html("");		
				}
				i++;	
			});			
		});			
			
        $('.button1').click(function (evt) {
          evt.preventDefault();

          var id1 = $(this).attr('id');
          var id2 = id1.split("_");

          check_what_selected(id2[1],id2[2]);
        });

        // QUESTION: who doesn't check their business and functional responsibilities at the door?
        $('.button2').click(function (evt) {
          evt.preventDefault();

          var id = $(this).attr('id');
          check_what_selected2(id);
        });

        $('.button22').click(function (evt) {
          evt.preventDefault();

          var id1 = $(this).attr('id');
          var id2 = id1.split("_");

          check_what_selected2_1(id2[1]);
        });
    
        $('.i_dont_know').click(function (evt) {
          evt.preventDefault();
      
          var id1 = $(this).attr('id');
          var id2 = id1.split("_");   
      
          i_dont_know1(id2[3]);   
        });
    
        $('.i_dont_know2').click(function (evt) {
      
          var id1 = $(this).attr('id');
          var id2 = id1.split("_");   
      
          i_dont_know2(id2[4]);   
        });
		
        $('.button3').click(function (evt) {
          evt.preventDefault();

          var id1 = $(this).attr('id');
          var id2 = id1.split("_");

          check_what_selected3(id2[1],id2[2]);
        });

        $('.button4').click(function (evt) {
          evt.preventDefault();

          var id1 = $(this).attr('id');
          var id2 = id1.split("_");

          check_what_selected4(id2[1],id2[2]);
        });

        $('.button5').click(function (evt) {
          evt.preventDefault();

          var id1 = $(this).attr('id');
          var id2 = id1.split("_");

          check_what_selected5(id2[1],id2[2],id2[3]);
        });

        $('.button6').click(function (evt) {
          evt.preventDefault();

          var id = $(this).attr('id');
          check_what_selected6(id);
        });      


        $(".slider1").each(function() {

          var id1 = $(this).attr('id');
          var id2 = id1.split("_");

          $( "#slider1_" + id2[1] ).slider({
            range: "max",
            min: 1,
            max: 5,
            value: 3,
            slide: function (event, ui) {
              $( "#amount1_" + id2[1] ).val(ui.value);
            }
          });

          $( "#amount1_" + id2[1] ).val($( "#slider1_" + id2[1] ).slider( "value" ));
        });


        $(".slider2").each(function() {

          var id1 = $(this).attr('id');
          var id2 = id1.split("_");

          $( "#slider2_" + id2[1] ).slider({
            range: "max",
            min: 1,
            max: 100,
            value: 50,
            slide: function(event, ui) {
              $( "#amount2_" + id2[1] ).val( ui.value );
            }
          });

          $( "#amount2_" + id2[1] ).val( $( "#slider2_" + id2[1] ).slider( "value" ) );
        });

        setTimeout(function() {
          $(".loading_page").fadeOut("slow", function() {
            $(".content").css("display", "inline");			
		
			if (type == '9 ') {			
				
				$("#section_name").css("display","none");
        $(".start_hidden").attr("class","slide-block mod-secondary-dark5 ng-scope start_hidden1");
			}		  
          });
          //$(".loading_page").css("display","none");
        }, 3000);


        calculateBlockWidths(attachNavControls);

				// get the scroll position & width for all slide-blocks on the page
				function calculateBlockWidths(callback) {
				  var blockMarkers = [0];
				  var blocks = $('.slide-block');

				  Array.prototype.forEach.call(blocks, function (item, idx) {
				    var size = blockMarkers.length;

				    var $el = $(item);
				    var itemHeight = parseInt($el.height(), 10);

				    $el.id = idx + 1;
				    $el.animate({opacity: 1}, 1000);

				    blockMarkers.push(blockMarkers[size-1] + itemHeight); // space to leave either side of slide-block
				  });

				  if (callback) {
				  	return callback(blockMarkers);
			  	}

			  	return blockMarkers;
				};


				function attachNavControls (blockPositions) {

				  // right
				  $('.gbl-arrow-nav-right').on('touchstart click', function (evt) {
				    var docScrollPosition = $('.css-form').scrollTop();

				    blockPositions = calculateBlockWidths();

				    // get all blocks to the right of current position
				    var nextBlock = blockPositions.filter(function (item, idx) {
				      return (item > docScrollPosition + 10);
				    });

			      $('.css-form').animate({
              scrollTop: nextBlock[0]
            }, 700);
				  });
				}

      }, 10); // end $timeout
    }); // $http.get("php/get_questions.php")
  }); // formControler

function personController ($scope, $http) {

  $scope.submit = function () {

    var save_parameters_id_tab = new Array();
    var save_parameters_val_tab = new Array();
    var i = 0;

    $(".values").each(function () {
      //alert($(this).attr('id'));
      save_parameters_id_tab[i] = $(this).attr('id');
      save_parameters_val_tab[i] = $(this).val();
      i++;
    });

    var save_parameters1_id_tab = new Array();
    var save_parameters1_val_tab = new Array();

    $(".values1").each(function () {
      //alert($(this).attr('id'));
      save_parameters1_id_tab[i] = $(this).attr('id');
      save_parameters1_val_tab[i] = $(this).val();
      i++;
    });

    var save_parameters_pic_com_id_tab = new Array();
    var save_parameters_pic_com_val_tab = new Array();

    $(".pic_com").each(function() {
      //alert($(this).attr('id'));
      save_parameters_pic_com_id_tab[i] = $(this).attr('id');
      save_parameters_pic_com_val_tab[i] = $(this).val();
      i++;
    });	
	var name1 = $(".name1").val();
	var type1 = $("#type1").val();
		
    $.post("php/send_form.php", {		
      'name1':  name1,
      'type1':  type1,
      'save_parameters_id_tab':  save_parameters_id_tab,
      'save_parameters_val_tab': save_parameters_val_tab,
      'save_parameters1_id_tab':  save_parameters1_id_tab,
      'save_parameters1_val_tab': save_parameters1_val_tab,
      'save_parameters_pic_com_id_tab': save_parameters_pic_com_id_tab,
      'save_parameters_pic_com_val_tab': save_parameters_pic_com_val_tab
    }, function (data) {

        //alert(data);
        $(".content").css("display","none");
        $(".thank_you").css("display","block");
    });
  }
}