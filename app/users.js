//Define an angular module for our app
var app = angular.module('myApp', []);

app.controller('usersController', function($scope, $http) {
  getUser(); // Load all available tasks 
  function getUser(){  
  $http.post("ajax/getUser.php").success(function(data){
        $scope.users = data;
       });
  };
  $scope.addUser = function (username,password) {
    $http.post("ajax/addUser.php?username="+username+password).success(function(data){
        getUser();
        $scope.userInput = "";
        $scope.passInput = "";
      });
  };

});
