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


} );//End of document.ready function

//Code for GoogleMap API
//    geoLocationInit();

function mapInit(){
    myLatlng = new google.maps.LatLng(52.6280446,-1.7221074);
    //Load the Map
    createMap(myLatlng);
    //Get the areas from the database
    fetchAreas();
    // set up the style rules and events for google.maps.Data
    map.data.setStyle(styleFeature);
    map.data.addListener('mouseover', mouseInToRegion);
    map.data.addListener('mouseout', mouseOutOfRegion);

    // wire up the button
    var selectBox = document.getElementById('census-variable');
    google.maps.event.addDomListener(selectBox, 'change', function() {
      clearCensusData();
      loadCensusData(selectBox.options[selectBox.selectedIndex].value);
    });

    // state polygons only need to be loaded once, do them now
    loadMapShapes();
}

function styleFeature(feature) {
    var low = [5, 69, 54];  // color of smallest datum
    var high = [151, 83, 34];   // color of largest datum

    // delta represents where the value sits between the min and max
    var delta = (feature.getProperty('census_variable') - censusMin) /
        (censusMax - censusMin);

    var color = [];
    for (var i = 0; i < 3; i++) {
      // calculate an integer color based on the delta
      color[i] = (high[i] - low[i]) * delta + low[i];
    }

    // determine whether to show this shape or not
    var showRow = true;
    if (feature.getProperty('census_variable') == null ||
        isNaN(feature.getProperty('census_variable'))) {
      showRow = false;
    }

    var outlineWeight = 0.5, zIndex = 1;
    if (feature.getProperty('state') === 'hover') {
      outlineWeight = zIndex = 2;
    }

    return {
      strokeWeight: outlineWeight,
      strokeColor: '#fff',
      zIndex: zIndex,
      fillColor: 'hsl(' + color[0] + ',' + color[1] + '%,' + color[2] + '%)',
      fillOpacity: 0.75,
      visible: showRow
    };
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


    // set up the style rules and events for google.maps.Data
    map.data.setStyle(styleFeature);
//        map.data.addListener('mouseover', mouseInToRegion);
//        map.data.addListener('mouseout', mouseOutOfRegion);

    // wire up the button
    var selectBox = document.getElementById('census-variable');
    google.maps.event.addDomListener(selectBox, 'change', function() {
      clearCensusData();
      loadCensusData(selectBox.options[selectBox.selectedIndex].value);
    });

    // state polygons only need to be loaded once, do them now
//    loadMapShapes();
}

var infoWindow = new google.maps.InfoWindow;

function createMarker(latlang, name, price, pop,greenspace,schools,restaurants, broadband, lowerC, middleC, upperC){

    var infowincontent = document.createElement('div');
    var strong = document.createElement('h3');
    strong.textContent = name
    infowincontent.appendChild(strong);

    var priceText = document.createElement('p');
    priceText.textContent = "Mean House Price: £" + price;
    infowincontent.appendChild(priceText);

    var greenspaceText = document.createElement('p');
    greenspaceText.textContent = "Greenspace: " + greenspace*100 + "%";
    infowincontent.appendChild(greenspaceText);

    var schoolsText = document.createElement('p');
    schoolsText.textContent = "Children with good GCSEs: " + schools*100 + "%";
    infowincontent.appendChild(schoolsText);

    var restText = document.createElement('p');
    restText.textContent = "N. of pubs & restaurants: " + restaurants + "/km2";
    infowincontent.appendChild(restText);

    var broadbandText = document.createElement('p');
    broadbandText.textContent = "Superfast Broadband: " + broadband*100 + "%";

    var marker = new google.maps.Marker({
        position: latlang,
        map: map,
        icon:{
            path: google.maps.SymbolPath.CIRCLE,
            scale: 30,
//            fillColor: "#33B1FF",
            fillColor: 'hsl(' + lowerC + ',' + middleC + '%,' + upperC + '%)',
            fillOpacity: 0.5,
            strokeColor:  'hsl(' + lowerC + ',' + middleC + '%,' + upperC + '%)',
//            strokeColor: "#33B1FF",
            strokeOpacity: 1.0,
            strokeWeight: 1
        },
        title: name
    });
    marker.addListener('click', function() {
        infoWindow.setContent(infowincontent);
        infoWindow.open(map, marker);
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
              createMarker(latlng,name);
            }
        }
}
}

function fetchAreas(){
    $.post('http://localhost:8000/fetchAreas',{},function(match){
//            console.log(match);
        // Get the min and max value
        var valueMax = 239576;
        var valueMin = 121807;

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

            var price = val.mean_house_price_2015;
            var pop = this.pop2014;
            var greenspace = this.greenspace;
            var schools = this.five_good_gcses;
            var restaurants = this.restaurants;
            var broadband = this.superfast_broadband;

            ///////// Here is where I want to define the colour
            var low = [5, 69, 54];  // color of smallest datum
            var high = [151, 83, 34];   // color of largest datum

            // delta represents where the value sits between the min and max
            var delta = (val.mean_house_price_2015 - valueMin) /
            (valueMax - valueMin);

            var color = [];
            for (var i = 0; i < 3; i++) {
              // calculate an integer color based on the delta
              color[i] = (high[i] - low[i]) * delta + low[i];
            }


            ///////// Then I can pass it as a variable into createMarker()
            createMarker(gLatLng,gname,price,pop,greenspace,schools,restaurants, broadband, color[0], color[1], color[2]);
        });
    });
}

//End of Code for GoogleMap API

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
