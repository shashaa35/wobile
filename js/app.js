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
		$scope.name="";
	    $scope.password="";

	

		$scope.show=function(){
			$scope.showing=!$scope.showing;
		
		}
    $scope.signup=function(name,password,email){
		console.log("working");
        $scope.name=name,
        $scope.password=password,
		$scope.details={
		name:$scope.name,
        password:$scope.password,
        email:$scope.email
	    }	

	    var res=
			$http({
			    method: "post",
			    url: 'index.php/signup',
			    data: 'data='+JSON.stringify($scope.details),
			    headers: {'Content-Type': 'application/x-www-form-urlencoded' }
			});
	    	res.success(function(data, status, headers, config) {
            console.log($scope.details);
			$scope.message = data;
		});
		res.error(function(data, status, headers, config) {
			alert( "failure message: " + JSON.stringify({data: data}));
		});	


	 $scope.login=function(){	
     	var res=$http.post('index.php/signup',$scope.details);
     
	}


	}
});


