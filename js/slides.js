;(function (window, document, $) {
  'use strict';

  // Slide Tabs
  $( '.slide-block-tab-btn' ).click(function(){
    var tabId = $(this).attr('data-tab');
    $(this).addClass( 'active').siblings().removeClass('active');
    $( '#'+tabId ).addClass( 'active' ).siblings().removeClass('active');
  });

  // On video end
  $('.vid-player video.ng-scope').on('ended', function(){
    $('.vid-intro-container').show();
  });

  // Video skip
  $('.vid-btn-skip').click(function() {
    var videoId = $(this).parent().data().videoId;
    var video = $('#' + videoId);
    video.get(0).pause();
    $( 'html, body' ).animate(
      {scrollLeft: "+="+750}, 400
    );
    $(this).parents( '.vid-container' ).addClass( 'vid-container-inactive' );
    $(this).parents( '.vid-content-container' ).siblings('.vid-intro-container').fadeIn(200);
    $(this).siblings( '.vid-btn-playpause' ).toggleClass( 'vid-btn-pause').toggleClass( 'vid-btn-play' );
  });

  // If slide block too tall, add scroll down button
  $( '.slide-block' ).each(function(){
    if ($(this).scrollHeight > $(this).height()) {
      $(this).addClass( 'slide-scroll' );
    }
  });
  $( '.slide-block' ).bind('scroll', function() {
    $(this).removeClass( 'slide-scroll' );
  });

  $( '.slide-block-scroll > span' ).on("click" ,function(){
    $(this).parents( '.slide-scroll' ).animate({
        scrollTop: 300
    });
  });

}(window, document, jQuery));