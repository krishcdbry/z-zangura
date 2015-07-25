/**
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
