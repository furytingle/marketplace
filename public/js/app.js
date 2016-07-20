var mPlace = angular.module('mainModule', ['ngRoute', 'ngResource']);

mPlace.controller('productController', function ($scope, $http) {
    $scope.functions = {};
    
    $scope.functions.prepareData = function () {
        console.log($scope.textModel);
    };
    
    $scope.response = {};

    $scope.functions.sendAJAX = function (item, event) {
        $http({
            url: "/products/store",
            method: "POST",
            data: {
                
            }
        }).success(function (data, status, headers, config) {
            $scope.response = data;
        }).error(function (data, status, headers, config) {
            $scope.status = status;
        });
    }
});