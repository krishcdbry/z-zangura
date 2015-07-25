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
