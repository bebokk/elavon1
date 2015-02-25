  function startTour(){
    var tour = introJs();
    tour.setOption('tooltipPosition', 'auto');
    tour.setOption('positionPrecedence', ['left', 'right', 'bottom', 'top']);

    if ($( 'body' ).hasClass( 'body-slides' )) {
      tour.setOptions({
        showStepNumbers: false,
        scrollToElement: true,
        disableInteraction: false,
        doneLabel: 'Close',
        prevLabel: 'Back',
        nextLabel: 'Next',
        steps: [
          {
            element: '.gbl-arrow-nav',
            intro: "<h5>Navigation</h5><p>Use these arrows to navigate horizontally.</p><p>Alternatively you can <span class='hide-ontouch'>use scrollbars or your keyboard's arrow keys</span> <span class='hide-onclick'>swipe left and right</span> to scroll sideways.</p>",
            tooltipClass: "helptip-first"
          },
          {
            element: '.scroll-help',
            intro: "<h5>Horizontal Scrolling</h5><p>You can also scroll through the slides using this scrollbar, click and drag horizontally to navigate.</p>",
            tooltipClass: "helptip-scroll-help"
          },
          {
            element: '.gbl-nav-title',
            intro: "<h5>Current Module</h5><p>This title states which module you are currently within and the circular number above indicates the number of that module.</p>"
          },
          {
            element: '.mod-list-item.active',
            intro: "<h5>Current Section</h5><p>This highlighted item states the current section you are currently viewing. The diamond number indicates which module and section.</p><p class='light'>Example:<br> <strong>6.1</strong> means <strong>module 6, section 1.</strong></p>"
          },
          {
            element: '.gbl-nav-close-btn',
            intro: "<h5>Closing the Side Menu</h5><p>Clicking this button will close the side menu.</p><p>After the side menu has hidden, the mini menu will slide out. Click the mini menu button to view the side menu again.</p>",
            tooltipClass: "helptip-last"
          }
        ]
      });
    } else if ($( 'body' ).hasClass( 'body-game' )) {
      tour.setOptions({
        showStepNumbers: false,
        scrollToElement: true,
        disableInteraction: false,
        doneLabel: 'Close',
        prevLabel: 'Back',
        nextLabel: 'Next',
        steps: [
          {
            element: '.gbl-nav-title',
            intro: "<h5>Current Module</h5><p>This title states which module you are currently within and the circular number above indicates the number of that module.</p>",
            tooltipClass: "helptip-first"
          },
          {
            element: '.mod-list-item.active',
            intro: "<h5>Current Section</h5><p>This highlighted item states the current section you are currently viewing. The diamond number indicates which module and section.</p><p class='light'>Example:<br> <strong>6.1</strong> means <strong>module 6, section 1.</strong></p>"
          },
          {
            element: '.gbl-nav-close-btn',
            intro: "<h5>Closing the Side Menu</h5><p>Clicking this button will close the side menu.</p><p>After the side menu has hidden, the mini menu will slide out. Click the mini menu button to view the side menu again.</p>",
            tooltipClass: "helptip-last"
          }
        ]
      });
    }
    tour.oncomplete(function() {
      $( 'body' ).removeClass( 'gbl-help-active' );
    }).onexit(function() {
      $( 'body' ).removeClass( 'gbl-help-active' );
    }).start();
  }

  $(document.body).on('touchstart click', '.gbl-help-btn', function(){
    if( $( 'body' ).hasClass( 'body-slides' )) {
      $( '.gbl-nav-mini' ).addClass( 'gbl-nav-mini-hide');
      $( '.gbl-nav-container' ).addClass( 'gbl-nav-container-show');
      $( 'body' ).addClass( 'gbl-help-active' );
      setTimeout(function() {
        startTour();
      }, 500);
    } else if ($( 'body' ).hasClass( 'body-game' )) {
      $( '.gbl-nav-mini' ).addClass( 'gbl-nav-mini-hide');
      $( '.gbl-nav-container' ).addClass( 'gbl-nav-container-show');
      $( 'body' ).addClass( 'gbl-help-active' );
      setTimeout(function() {
        startTour();
      }, 500);
    }
  });

  introJs().onexit(function() {
    $( 'body' ).removeClass( 'gbl-help-active' );
  });
  

  $(document.body).on('touchstart click', '.introjs-button.introjs-skipbutton, .introjs-overlay', function(){
    $( 'body' ).removeClass( 'gbl-help-active' );
    $( '.gbl-nav-mini' ).removeClass( 'gbl-nav-mini-hide');
    $( '.gbl-nav-container' ).removeClass( 'gbl-nav-container-show');
  }); 