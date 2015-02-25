;(function (window, document, $, angular) {
  'use strict';

			/*
		var browser = {
		  chrome: false,
		  mozilla: false,
		  opera: false,
		  msie: false,
		  safari: false
		};
		var sUsrAg = navigator.userAgent;
		if(sUsrAg.indexOf( 'Chrome' ) > -1) {
		browser.chrome = true;
		$( 'body' ).addClass( 'chrome' );
		} else if (sUsrAg.indexOf( 'Safari' ) > -1) {
		browser.safari = true;
		$( 'body' ).addClass( 'safari' );
		} else if (sUsrAg.indexOf( 'Opera' ) > -1) {
		browser.opera = true;
		$( 'body' ).addClass( 'opera' );
		} else if (sUsrAg.indexOf( 'Firefox' ) > -1) {
		browser.mozilla = true;
		$( 'body' ).addClass( 'firefox' );
		} else if (sUsrAg.indexOf( 'MSIE' ) > -1) {
		browser.msie = true;
		$( 'body' ).addClass( 'ie' );
		}
	*/
  // Support touch devices
  /*
  if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $( 'body' ).addClass( 'touch-device' );
    $( 'body' ).addClass( 'touch-animations-inactive' );
  } else {
    $( 'body' ).addClass( 'click-device' );
  }

  angular.module('iosh', ['gajus.swing', 'pearson.drag-and-drop']);

  // Global variables
  var gblNavHead = $( ".gbl-nav-head" );
  var gblNavMods = $( ".gbl-nav-mod-list" );

  // Mobile menu
  $(document.body).on('click', '.gbl-nav-section-btn', function(){
    $(this).toggleClass( 'active' );
    $(this).next( '.gbl-nav-mod-list' ).toggleClass( 'active' );
    $( 'body, html' ).toggleClass( 'no-scrolscroll' );
  });

  $(document.body).on('click', '.gbl-nav-close-btn', function(){
    $( '.gbl-nav-container' ).removeClass( 'gbl-nav-container-show');
    $( '.gbl-nav-mini' ).removeClass( 'gbl-nav-mini-hide');
    $( 'body').removeClass( 'help-onload' );
  });

  // On menu click show main nav
  $(document.body).on('click', '.gbl-nav-mini-btn', function(){
    $( '.gbl-nav-mini' ).addClass( 'gbl-nav-mini-hide');
    $( '.gbl-nav-container' ).addClass( 'gbl-nav-container-show');
  });
  */


  // Arrow scroll nav
  //var distance = 700;
  var slide_block = $(".slide-block").width();
  var distance = slide_block+45;
  //alert(slide_block);

  $(document.body).on('touchstart click', '.gbl-arrow-nav-right', function(){

    //alert($(document).width());
    if ($(document).width() < 650) {

      var bodyslide = $(".slide-block").height();
      $( '.css-form' ).animate(
        {scrollTop: "+="+bodyslide}, 700
      );

    } else {
      $( 'html, body' ).animate(
        {scrollLeft: "+="+distance}, 700
      );
    }
  });
  $(document.body).on('touchstart click', '.gbl-arrow-nav-left', function(){
    $( 'html, body' ).animate(
        {scrollLeft: "-="+distance}, 700
    );
  });

  // Arrow scroll nav
  //var distance1 = 1400;
  var distance1 = (slide_block*2)+90;

  $(document.body).on('touchstart click', '.gbl-arrow-nav-right2', function(){    

    if ($(document).width() < 650) {

      var bodyslide = $(".slide-block").height();
      $( '.css-form' ).animate(
        {scrollTop: "+="+(bodyslide*2)}, 700
      );
    } else {
      $( 'html, body' ).animate(
        {scrollLeft: "+="+distance1}, 700
      );
    }
  });
  $(document.body).on('touchstart click', '.gbl-arrow-nav-left2', function(){
    $( 'html, body' ).animate(
        {scrollLeft: "-="+distance1}, 1400
    );
  });

  // Window resizing + dom ready functions
  //$(document).ready(resizeWindow);
  //$(window).on('resize',resizeWindow);

  /*
  function resizeWindow() {
    var windowHeight = $( window ).height();
    var gblNavHeadHeight = gblNavHead.height();

    $( '.slide-block' ).each(function(){
      if ($(this)[0].scrollHeight > $(this).height()) {
        $(this).addClass( 'slide-scroll' );
      } else {
        $(this).removeClass( 'slide-scroll' );
      }
    });

    // Scrolling for module nav list only
    $( gblNavMods ).css({
      'height' : windowHeight - gblNavHeadHeight,
      'margin-top' : gblNavHeadHeight
    });

    if ( $( window ).width() > 500 && $( window ).width() < 650 ) {
      return $( 'body' ).addClass( 'medium-viewport' ).removeClass( 'large-viewport small-viewport' );
    } else if ( $( window ).width() > 650 ) {
      $( 'body' ).addClass( 'large-viewport' ).removeClass( 'medium-viewport small-viewport' );
    } else {
      return $( 'body' ).addClass( 'small-viewport' ).removeClass( 'medium-viewport large-viewport' );
    }
  }
  */

  // Global Help
  


}(window, document, jQuery, angular));