import Vue from 'vue';
import linegraph from './components/linegraph.js';
import crimebarchart from './components/crimebarchart.js';
import solbarchart from './components/solbarchart.js';
import poplinegraph from './components/poplinegraph.js';
import agepiechart from './components/agepiechart.js';
import comparepricelinegraph from './components/comparepricelinegraph.js';
import comparepoplinegraph from './components/comparepoplinegraph.js';
//require('angular');s
//import angluar from 'angular';


new Vue({
    el: 'body',

    components: {
        linegraph,
        crimebarchart,
        solbarchart,
        poplinegraph,
        agepiechart,
        comparepricelinegraph,
        comparepoplinegraph
    }
});

var map;
var myLatlng;
$(document).ready( function () {
    $('#areas_table').DataTable({
        aaSorting: [[2, 'desc']]
    });

    mapInit();

    //Code for GoogleMap API
//    geoLocationInit();

    function mapInit(){
        myLatlng = new google.maps.LatLng(52.6280446,-1.7221074);
        createMap(myLatlng);
//        nearbySearch(myLatlng,"school");
        fetchAreas();
    }

    function geoLocationInit(){
        if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(success,fail);
        }else{
            alert("Browser not supported");
        }
    }

    function success(position){
        console.log(position);
        var latval=position.coords.latitude;
        var lngval=position.coords.longitude;

        myLatlng = new google.maps.LatLng(latval,lngval);
        //Original values: 52.6280446,-1.7221074
        createMap(myLatlng);
//        nearbySearch(myLatlng,"school");
        fetchAreas();
    }

    function fail(){
        alert("Method failed");
    }


    function createMap(myLatlng){
        map = new google.maps.Map(document.getElementById('map'), {
            center: myLatlng,
            scrollwheel: false,
            zoom: 9
        });
//        var marker = new google.maps.Marker({
//            position: myLatlng,
//            map: map,
//            icn:'http://maps.google.com/mapfiles/ms/icons/red-dot.png'
//        })
    }

    function createMarker(latlang,icn, name){
        var marker = new google.maps.Marker({
            position: latlang,
            map: map,
            icon:icn,
            title: name
        });
    }
    function nearbySearch(myLatlng, type){
        var request = {
            location: myLatlng,
            radius: '5000',
            types: [type]
        };

        var service = new google.maps.places.PlacesService(map);
        service.nearbySearch(request, callback);

        function callback(results, status) {
            if (status == google.maps.places.PlacesServiceStatus.OK) {
                for (var i = 0; i < results.length; i++) {
                    var place = results[i];
                    var latlng=place.geometry.location;
                    var icn='http://maps.google.com/mapfiles/ms/icons/red-dot.png'; //I can also define this icon as any other. Look at map-icons-master in FYP folder.
                    var name=place.name;
                  createMarker(latlng,icn,name);
                }
            }
    }
    }

    function fetchAreas(){
        $.post('http://localhost:8000/fetchAreas',{},function(match){
//            console.log(match);
            $.each(match,function(i,val){
                console.log(val.name,val.lat,val.lng);

                var glatval=val.lat;
                console.log(glatval);
                var glngval=val.lng;
                console.log(glngval);
                var gLatLng = new google.maps.LatLng(glatval,glngval);
                console.log(gLatLng);

                var gname=val.name;
                console.log(gname);

                var gicn='http://maps.google.com/mapfiles/ms/icons/red-dot.png'; //I can also define this icon as any other. Look at map-icons-master in FYP folder.
                createMarker(gLatLng,gicn,gname);
            });
        });
    }
    //End of Code for GoogleMap API
} );//End of document.ready function

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
