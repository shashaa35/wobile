var app=angular.module('app', ['ngRoute'])
app.config(['$routeProvider', function($routeProvider) {
$routeProvider
.when('/', {
templateUrl: 'ngviews/login.html',
controller:'mycontroller'
})
.when('/page1', {
templateUrl:'ngviews/main.html',
controller:'mycontroller'
})
}]);
app.controller('mycontroller', function ($scope, $http) {
	$scope.showing=true;
	$scope.show=function(){
	$scope.showing=!$scope.showing;
	
	}
    $scope.signup=function(){
		console.log("working")			
		$http.get('index.php/signup').success (function(data){
             console.log(data);
             console.log("hello");
	         }).
	error(function(data){
		// console.log("error");
	})
	}
});

