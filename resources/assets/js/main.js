import Vue from 'vue';
import linegraph from './components/linegraph.js';
import barchart from './components/barchart.js';
//require('angular');
//import angluar from 'angular';


new Vue({
    el: 'body',

    components: {linegraph,barchart}
});

$(document).ready( function () {
    $('#areas_table').DataTable({
        aaSorting: [[1, 'desc']]
    });
} );

//(function(angular) {
//  'use strict';
//angular.module('scopeExample', []).controller('MyController', ['$scope', function($scope) {
//    $scope.areas = jsVars.areas;
//    $scope.testPhrase = 'Successfully fetched data from $scope';
//  }]);
//})(window.angular);

var app = angular.module('myapp', []);

app.controller('MainCtrl', ['$scope', '$window', function($scope, $jsVars) {
    $scope.areas = $jsVars.areas;
    $scope.testPhrase = 'Successfully fetched data from $scope';
}]);

//angular.module('scopeExample', []).controller('MyController', ['$scope', function($scope) {
//    $scope.areas = jsVars.areas;
//    $scope.testPhrase = 'Successfully fetched data from $scope';
//}]);

////Code for AngularJS
//var app = angular.module('app', ['ngMaterial']);
//
////These lines change the render tags of angular because by default Laravel and Angular both use {{dirivative here}}
//app.config(function ($interpolateProvider) {
//
//    $interpolateProvider.startSymbol('!{');
//    $interpolateProvider.endSymbol('}!');
//});
