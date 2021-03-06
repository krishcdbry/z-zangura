/**
 * Zangu-login directive
 */

(function(ng){

	angular.module('zanguLogin', [])
		.directive('zanguLogin',[function(){
			return {
				restrict: 'E',
				scope :{
					loginType: '@'
				},
				templateUrl: '../../views/templates/zangu-login.html',
				controller: ['$scope', '$http', '$rootScope', function($scope, $http, $rootScope) {
					$scope.zanguLog = function (data) {
						data._zanguSecToken = $rootScope.csrf_token;
						console.log(data);
					}
				}]
			}
		}])
}(angular));
;var BASE_URL = '';
angular.module('zanguApp', ['zanguLogin', 'zanguRegistration'])
	.constant("HTTP", {
		HTTP_STATUS_OK: 200, HTTP_STATUS_FOUND: 302, HTTP_STATUS_NOT_FOUND: 404
	})
	.controller('mainController', ['$scope', '$http', '$compile', '$rootScope', function ($scope, $http, $compile, $rootScope) {
		setTimeout(function() {
			$rootScope.csrf_token = $scope.csrf_token;
		}, 1000);
		$scope.name = 'Krishcdbry';
		$scope.searchZangu = function (term) {
			$scope.items = [];
			if (term) {
				$scope.items.push(term)
					, $('.search-item-suggested').hide()
					, $('.search-res-div').hide()
					, $('.search-item-results').show();
			}
			else {
				$('.search-item-results').hide()
					, $('.search-item-suggested').show();
			}
		}
		$scope.showSuggested = function (type) {
			$('.search-res-div').hide()
				, $('.search-' + type + '-suggested').show();
		}
		$scope.searchLocation = function (term) {
			$scope.locations = [];
			if (term) {
				$scope.locations.push(term)
					, $('.search-res-div').hide()
					, $('.search-location-results').show()
					, $('.search-location-suggested').hide();
			}
			else {
				$('.search-location-results').hide()
					, $('.search-location-suggested').show();
			}
		}

		$scope.showZanguRegistration = function () {
			$('.zangu-login-one').html($compile('<zangu-reg></zangu-reg>')($scope));
			$('.zangu-intro-join-btns').hide();
			$('.zangu-intro-login-btns').show();
			$('.vendor-reg-instructions').show();
		}

		$scope.showVendorRegistration = function () {
			$('.zangu-login-one').html($compile('<zangu-reg-vendor></zangu-reg-vendor>')($scope));
			$('.zangu-intro-join-btns').hide();
			$('.zangu-intro-login-btns').show();
			$('.vendor-reg-instructions').show();
		}


		$scope.showZanguLogin = function () {
			$('.zangu-login-one').html($compile('<zangu-login></zangu-login>')($scope));
			$('.zangu-intro-login-btns').hide();
			$('.zangu-intro-join-btns').show();
			$('.vendor-reg-instructions').show();
		}

		$(document).mouseup(function (e) {
			var container = $(".search-res-div");
			if (!container.is(e.target) && container.has(e.target).length === 0) {
				container.hide();
			}
		});

	}]);/**
 * Zangu-registration directive
 */

(function(ng){

	angular.module('zanguRegistration', [])
		.directive('zanguReg',[function(){
			return {
				restrict: 'E',
				scope :{
					regType: '@'
				},
				templateUrl: '/views/templates/zangu-registration-one.html',
				controller: ['$scope', '$http', '$rootScope', function($scope, $http, $rootScope) {
					$scope.zanguReg = function(data) {
						data._zanguSecToken = $rootScope.csrf_token;
						console.log(data);
						//$http.post('http://192.168.1.14/z-zangura/ex.php', data).success(function(res) {
						//	console.log(res);
						//})
						//	.error(function(res, error) {
						//		console.log(res);
						//		console.log(error);
						//	});
					}
				}]
			}
		}])
}(angular));
