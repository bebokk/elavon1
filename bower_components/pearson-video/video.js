'use strict';

angular.module('pearson-video', [
  'ngSanitize',
  'com.2fdevs.videogular',
  'com.2fdevs.videogular.plugins.controls',
])
// parent directive
.directive('videoContent', ['$templateCache', function ($templateCache) {

  return {
    restrict: 'AE',
    template: $templateCache.get("/pearson/video.tpl.html"),
    scope: {
      videoId: '@',
      videoTitle: '@'
    }
  };
}])
// controller for videogular component
.controller('videoContentCtrl', ['$scope', '$sce', '$document', function ($scope, $sce, $document) {

  var videoMp4 = 'video/' + $scope.videoId + '.mp4';
  var videoWebm = 'video/' + $scope.videoId + '.webm';

  $scope.hideIntroScreen = function hideIntroScreen() {
    var introContainer = angular.element('div.vid-intro-container')[0];
    var vidContainer = angular.element('div.vid-container')[0];

    introContainer.style.display = 'none';
    vidContainer.classList.remove('vid-intro-unplayed');
    vidContainer.classList.remove('vid-container-inactive');
  };

  $scope.showIntroScreen = function showIntroScreen() {
    var introContainer = angular.element('div.vid-intro-container')[0];
    var vidContainer = angular.element('div.vid-container')[0];

    introContainer.style.display = 'block';
    vidContainer.classList.add('vid-intro-unplayed');
    vidContainer.classList.add('vid-container-inactive');
  };

  // videogular config
  this.config = {
    sources: [
      {src: $sce.trustAsResourceUrl(videoMp4), type: "video/mp4"},
      {src: $sce.trustAsResourceUrl(videoWebm), type: "video/webm"}
    ],
    tracks: [],
    plugins: {
      controls: {
        autoHide: false
      }
    }
  };

  this.onVideoComplete = function onVideoComplete() {
    $scope.showIntroScreen();
  }

}])
// custom video control for intro play button
.directive('customIntroBtn', ['$document', function ($document) {
  return {
    restrict: 'E',
    require: '^videogular',
    template: '<button class="vid-intro-btn" ng-click="API.play()"></button>',
    link: function(scope, elem, attrs, API) {
      scope.API = API;

      // hides the intro container overlay and content
      elem.on('click', function (e) {
        var targetClass = e.target.classList,
            vidContainer, introContainer;

        var audio = $document.find('audio');
        if (audio.length) {
          Array.prototype.forEach.call(audio, function (item) {
            if (!item.paused) {
              item.pause();
            }
          })
        }

        if (targetClass.contains('vid-intro-btn')) {
          scope.hideIntroScreen();
        }
      });
    }
  }
}])
.directive('customPlayPause', [function () {
  return {
    restrict: 'E',
    require: '^videogular',
    template: '<button class="vid-btn vid-btn-playpause" ng-class="playing ? \'vid-btn-pause\' : \'vid-btn-play\'"></button>',
    link: function(scope, elem, attrs, API) {
      scope.playing = true;
      scope.API = API;

      elem.bind('click', function (evt) {
        scope.API.playPause();
        scope.playing = !(scope.playing);
      });
    }
  };
}])
.directive('customSkip', [function () {
  return {
    restrict: 'E',
    require: '^videogular',
    template: '<button class="vid-btn vid-btn-skip"></button>',
    link: function(scope, elem, attrs, API) {
      scope.API = API;

      elem.bind('click', function (evt) {
        evt.preventDefault();

        scope.showIntroScreen();
        scope.API.stop();
      });
    }
  };
}])
// custom directive to load relevant static content in sync with the video
.directive('customContent', ['videoContentFactory', function (videoContentFactory) {
  return {
    restrict: 'E',
    require: '^videogular',
    template: '<span ng-bind-html="content"></span>',
    link: function(scope, elem, attrs, API) {
      var contentUrl = 'video/data/' + scope.videoId + '.json';
      var sequence = {},
          times = [],
          currentTime = 0;

      videoContentFactory.get(contentUrl, function (data) {
        data.sequence.forEach(function (item, idx) {
          // always set the first bit of content
          if (idx === 0) {
            scope.content = item.content;
          }

          // create map of start times and content
          sequence[item.start.toString()] = item.content;
        });

        // array of start timings
        times = Object.keys(sequence).map(function (k) {
          return parseFloat(k);
        });
      });

      scope.$watch('API.currentTime', function (newVal, oldVal) {
        newVal = parseInt(newVal.getSeconds());
        oldVal = parseInt(oldVal.getSeconds());

        // track elapsed seconds. avoids 59 -> 0 -> 1
        if ((newVal - oldVal) !== 0) {
          currentTime += 1;
        }

        // swap in content that matches the number of elapsed seconds
        if (times.indexOf(currentTime) > -1) {
          scope.content = sequence[currentTime.toString()];
        }
      }, true);
    }
  };
}])
.factory('videoContentFactory', ['$http', function ($http) {
  return {
    get: function (videoContentUrl, success) {
      $http({method: 'GET', url: videoContentUrl}).success(function (data) {
        success(data);
      });
    }
  };
}]);