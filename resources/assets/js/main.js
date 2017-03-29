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
    var table = $('#areas_table').DataTable({
        aaSorting: [[2, 'desc']],
        orderCellsTop: true,   //move sorting to top header
    });

    mapInit();

    // Get the index of matching row.  Assumes only one match
    var indexes = table.rows().eq( 1 ).filter( function (rowIdx) {    //check column 0 of each row for tradeMsg.message.coin
        return table.cell( rowIdx, 1 ).data() === 'National Average' ? true : false;
    } );

    // grab the data from the row
    var data = table.row(indexes).data();

    // populate the .second header with the data
    for (var i = 1; i < data.length; i++) {
        $('.second').find('th').eq(i).html( data[i] );
    }

    // remove the row from the table
    table.row(indexes).remove().draw(false);
} );//End of document.ready function

(function(angular) {
    'use strict';
    angular.module('myapp', []).controller('MainCtrl', [
        '$scope', function($scope) {
            $scope.data = {
                singleSelect: null,
                option1: 'option-1'
            };
    }]);
})(window.angular);

//Code for GoogleMap API

function mapInit(){
    myLatlng = new google.maps.LatLng(52.6280446,-1.7221074);
    //Load the Map
    createMap(myLatlng);
    //Get the areas from the database
    fetchAreas();
//    var selectBox = document.getElementById('census-variable');
//    var chosenVar = selectBox.value;
//    console.log(chosenVar);
//    google.maps.event.addDomListener(selectBox, 'change', function() {
//        window.alert("Varaible was changed to " + chosenVar);
//    });
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

//var chosenVar = "crime";
//var selectBox;

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
    selectBox.addEventListener("change", displayMessage);

    google.maps.event.addDomListener(selectBox, 'change', function() {
    var chosenVar = selectBox.value;
    //HERE CAN I JUST SET A ANGULAR VARIABLE TO EQUAL chosenVar? RATHER THAN USING NG-MODEL???

        window.alert("Varaible was changed to " + chosenVar);

    //Now the application should reload all the circles with the chosenVar data
    });

    // state polygons only need to be loaded once, do them now
//    loadMapShapes();
}

function displayMessage(){
    window.alert("Selection has changed");
}

var infoWindow = new google.maps.InfoWindow;

function createMarker(latlang, id, name, price, pop,greenspace,schools,restaurants, broadband, lowerC, middleC, upperC){

    var infowincontent = document.createElement('div');
    var strong = document.createElement('h3');
    strong.textContent = name;
//    strong.textContent = '<a href="/areas/'+id+'">' + name + '</a>';
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


function fetchAreas(){
    $.post('http://localhost:8000/fetchAreas',{},function(match){
//            console.log(match);
        // Get the min and max value

        var valueMin = Math.min.apply(Math,match.map(function(o){return o.greenspace;}))
        var valueMax = Math.max.apply(Math,match.map(function(o){return o.greenspace;}))

//        var valueMin = Math.min.apply(Math,match.map(function(o){return o.{{chosenVar}};}))
//        var valueMax = Math.max.apply(Math,match.map(function(o){return o.{{chosenVar}};}))

        $.each(match,function(i,val){
//            console.log(val.name,val.lat,val.lng);

            var glatval=val.lat;
            var glngval=val.lng;
            var gLatLng = new google.maps.LatLng(glatval,glngval);

            var gname=val.name;
            var gid = val.id;
            var price = val.mean_house_price_2015;
            var pop = this.pop2014;
            var greenspace = this.greenspace;
            var schools = this.five_good_gcses;
            var restaurants = this.restaurants;
            var broadband = this.superfast_broadband;

            var properties = {
                "mean_house_price_2015": val.mean_house_price_2015,
                "crime": val.crime,
                "greenspace": val.greenspace,
                "five_good_gcses": val.five_good_gcses,
                "restaurants": val.restaurants,
                "superfast_broadband": val.superfast_broadband
            };

            console.log(greenspace);

//            properties[chosenVar];

            ///////// Here is where I want to define the colour
            var low = [5, 69, 54];  // color of smallest datum
            var high = [151, 83, 34];   // color of largest datum

            // delta represents where the value sits between the min and max
            var delta = (greenspace - valueMin) /
            (valueMax - valueMin);

            var color = [];
            for (var i = 0; i < 3; i++) {
              // calculate an integer color based on the delta
              color[i] = (high[i] - low[i]) * delta + low[i];
            }

            ///////// Then I can pass it as a variable into createMarker()
            createMarker(gLatLng,gid,gname,price,pop,greenspace,schools,restaurants, broadband, color[0], color[1], color[2]);
        });
    });
}

//End of Code for GoogleMap API
