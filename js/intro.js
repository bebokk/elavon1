;(function (window, document, $) {

  $(document.body).on('touchstart click', '.course-start-play', function(){
    $(this).hide();
    courseIntro();
  });

  // Course Intro
  function courseIntro() {
    $( '#course-intro' )[0].play();

    // Lights on
    setTimeout(function() {
      $( '.course-muted' ).fadeOut();
      $( '.body-intro-inner' ).addClass( 'onair-blur');
    }, 18400);

    // "Stand By" flashing
    setTimeout(function() {
      $( '.course-onair-btm' ).addClass( 'onair-btm');
    }, 25000);

    // "On Air" flashing
    setTimeout(function() {
      $( '.course-onair-top' ).addClass( 'onair-top');
    }, 30000);

    // Pearson Ident
    setTimeout(function() {
      $( '.course-pearson-ident' ).addClass( 'pearson-ident-fadein');
    }, 33600);

    // FastTrack Intro
    setTimeout(function() {
      $( '.ft-intro' ).addClass( 'ft-intro-fadein');
    }, 57000);

    (function(){
      var counter = 60;
      setInterval(function() {
        counter--;
        if (counter >= 0) {
          countdown = document.getElementById("course-countdown");
          countdown.innerHTML = counter;
        }
        if (counter === 0) {
          ftStart = document.getElementById("course-start");
          ftStart.className = ftStart.className + " course-inactive";
        }
      }, 750);
    })();

    $( '#course-intro' ).on('ended', function(){
      setTimeout(function() {
        window.location.href = "1-introducing-managing-safely/fasttrack/1-boxie.html";
      }, 500);
    });
  }

}(window, document, jQuery));