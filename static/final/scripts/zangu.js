angular.module('zanguApp', [])
.controller('test', function($scope, $http) {
	$scope.name = 'Krishcdbry';
	$scope.users = [];
	$http.get('/Angular/json_get_user').success(function(data) {
		$scope.users = data;
	})
})