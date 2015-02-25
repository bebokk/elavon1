var phonecatControllers = angular.module('phonecatControllers', []);

phonecatControllers.controller('PhoneListCtrl', ['$scope', '$http',
  function ($scope, $http) {  
    $http.get('data/data1.json').success(function(data) {
      $scope.phones = data;
    });
    $scope.orderProp = '+price';		
  }]);  

phonecatControllers.controller('PhoneDetailCtrl', ['$scope', '$routeParams',
  function($scope, $routeParams) {
    $scope.phoneId = $routeParams.phoneId;
  }]);

phonecatControllers.controller('ClickCtrl', ['$scope', 
	function($scope) {
		$scope.backToTop = function() {
		  $('html, body').animate({ scrollTop: 0 }, 'slow')
		};
	}]); 

phonecatControllers.directive('isActiveNav', [ '$location', function($location) {
return {
	restrict: 'A',
	link: function(scope, element) {
		scope.location = $location;
		scope.$watch('location.path()', function(currentPath) {
			if('./#' + currentPath === element[0].attributes['href'].nodeValue) {
				element.parent().addClass('active');
			} else {
				element.parent().removeClass('active');
			}
		});
	}
};
}]);  

phonecatControllers.controller('game1', ['$scope', '$http',

	function($scope,$http) {	
	
		var list1 = '';
		var cur;
		//get specific record from radnomized file and displey it (and delete first element)
		$scope.shuffle = function() {
			$http.get('data/cards_pack.json').success(function(data) {

				cardsArr1 = JSON.parse(JSON.stringify(data));				
				shuffle(cardsArr1.cards);
				console.log(cardsArr1.cards);			
				cur=0					
				$("#game1_2").html('');		
				$scope.selected_card='';	
				$(".game1_1 img").css('visibility','hidden');
				list1 = '';	
				$scope.deck_shuffled='deck shuffled';		
			});
		};
		
		//get specific record from radnomized file and displey it (and delete first element)		
		$scope.take = function(obj) {	
		
			//alert(myValue);
			if (cur == null) {			
				alert('Please shuffle!');	
			} else if (cur > 54) {			
				alert('No cards, Please shuffle!');	
			} else {		
			
				$scope.deck_shuffled='';		
				$(".game1_1 img").css('visibility','visible');
				cur++;				
				$scope.selected_card=cardsArr1.cards[cur].img;				
				//$scope.list1=list1;			
				$("#game1_2").html(list1);				
				list1+=" <img src='images/"+cardsArr1.cards[cur].img+"' />";
			}
		};
	}]);
	
	
function shuffle(array) {
  var currentIndex = array.length, temporaryValue, randomIndex ;

  // While there remain elements to shuffle...
  while (0 !== currentIndex) {

    // Pick a remaining element...
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;

    // And swap it with the current element.
    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    array[randomIndex] = temporaryValue;
  }

  return array;
}
	
	
	
	
phonecatControllers.controller('ClickCtrl', ['$scope', 
	function($scope) {
		$scope.backToTop = function() {
		  $('html, body').animate({ scrollTop: 0 }, 'slow')
		};
	}]);   
	
	

phonecatControllers.controller('ClickCtrl', ['$anchorScroll', '$location', '$scope',
	function($anchorScroll, $location, $scope) {
		$scope.gotoAnchor = function(x) {
			$location.hash('anchor' + x);
		};
	}]);   	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
  