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

$("#nav_to_map").click(function() {
    $('html, body').animate({
        scrollTop: $("#main_content").offset().top
    }, 2000);
});

var map;
var myLatlng;
var markers = []; //Array to hold the markers

$(document).ready( function () {
    var table = $('#areas_table').DataTable({
        aaSorting: [[2, 'desc']],
        orderCellsTop: true,   //move sorting to top header
    });

    mapInit();
//
//    // Get the index of matching row.  Assumes only one match
//    var indexes = table.rows().eq( 1 ).filter( function (rowIdx) {    //check column 0 of each row for tradeMsg.message.coin
//        return table.cell( rowIdx, 1 ).data() === 'National Average' ? true : false;
//    } );
//
//    // grab the data from the row
//    var data = table.row(indexes).data();
//
//    // populate the .second header with the data
//    for (var i = 1; i < data.length; i++) {
//        $('.second').find('th').eq(i).html( data[i] );
//    }
//
//    // remove the row from the table
//    table.row(indexes).remove().draw(false);
} );//End of document.ready function

var myApp = angular.module('myApp', []);


myApp.controller('myCtrl', function($scope) {
});

//Code for GoogleMap API

function mapInit(){
    myLatlng = new google.maps.LatLng(52.6280446,-1.7221074);
    //Load the Map
    createMap(myLatlng);
    //Get the areas from the database
    // wire up the button
    var selectBox = document.getElementById('census-variable');

    google.maps.event.addDomListener(selectBox, 'change', function() {
    var chosenVar = selectBox.value;

    deleteMarkers();
    //Now the application should reload all the circles with the chosenVar data
    fetchAreas(chosenVar);
    });

    setMapOnAll(map);
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

function createMap(myLatlng){
    map = new google.maps.Map(document.getElementById('map'), {
        center: myLatlng,
        scrollwheel: false,
        zoom: 9
    });


    // set up the style rules and events for google.maps.Data
    map.data.setStyle(styleFeature);
        map.data.addListener('mouseover', mouseInToRegion);
//        map.data.addListener('mouseout', mouseOutOfRegion);

};

var infoWindow = new google.maps.InfoWindow;

function createMarker(latlang, id, name, price, pop,greenspace,schools,restaurants, broadband, lowerC, middleC, upperC, selectedVar, valOfSelectedVar){

    var infowincontent = document.createElement('div');
    var strong = document.createElement('h3');
    strong.textContent = name;
//    strong.textContent = '<a href="/areas/'+id+'">' + name + '</a>';
    infowincontent.appendChild(strong);

    var priceText = document.createElement('p');
    priceText.textContent = "Mean House Price: £" + Math.round(price*10)/10;
    infowincontent.appendChild(priceText);

    var greenspaceText = document.createElement('p');
    greenspaceText.textContent = "Greenspace: " + Math.round((greenspace*100)*10)/10 + "%";
    infowincontent.appendChild(greenspaceText);

    var schoolsText = document.createElement('p');
    schoolsText.textContent = "Children with good GCSEs: " + Math.round((schools*100)*10)/10 + "%";
    infowincontent.appendChild(schoolsText);

    var restText = document.createElement('p');
    restText.textContent = "N. of pubs & restaurants: " + Math.round((restaurants)*10)/10 + "/km2";
    infowincontent.appendChild(restText);

    var broadbandText = document.createElement('p');
    broadbandText.textContent = "Superfast Broadband: " + Math.round((broadband*100)*10)/10 + "%";
    infowincontent.appendChild(broadbandText);

//    var crimeText = document.createElement('p');
//    crimeText.textContent = "Crimes (per 100,000 of the pop.): " + Math.round((broadband*100)*10)/10 + "%";
//    infowincontent.appendChild(crimeText);

    var marker = new google.maps.Marker({
        position: latlang,
        map: map,
        icon:{
            path: google.maps.SymbolPath.CIRCLE,
            scale: 30,
            fillColor: 'hsl(' + lowerC + ',' + middleC + '%,' + upperC + '%)',
            fillOpacity: 0.5,
            strokeColor:  'hsl(' + lowerC + ',' + middleC + '%,' + upperC + '%)',
            strokeOpacity: 1.0,
            strokeWeight: 1
        },
        title: name
    });

    infoWindow = new google.maps.InfoWindow;

    marker.addListener('click', function() {
        infoWindow.setContent(infowincontent);
        infoWindow.open(map, marker);
    });

    marker.addListener('mouseover', function(){
       marker.icon.strokeColor = 'hsl(0,0%,100%)';
        marker.icon.scale=40;
        marker.icon.fillOpacity = 1;
        if (selectedVar == 'crime'){
            marker.setLabel(String(valOfSelectedVar));
        }else if(selectedVar == 'mean_house_price_2015'){
            marker.setLabel("£"+String(valOfSelectedVar));
        }else if(selectedVar == 'greenspace'){
            marker.setLabel(String(valOfSelectedVar*100)+"%");
        }else if(selectedVar == 'five_good_gcses'){
            marker.setLabel(String(valOfSelectedVar*100)+"%");
        }else if(selectedVar == 'restaurants'){
            marker.setLabel(String(valOfSelectedVar)+"km^2");
        }else if(selectedVar == 'broadband'){
            marker.setLabel(String(valOfSelectedVar*100)+"%");
        }
        marker.setZIndex(google.maps.Marker.MAX_ZINDEX + 1);
        console.log(valOfSelectedVar);
        console.log("mouse went over");
    });

    marker.addListener('mouseout', function(){
       marker.icon.strokeColor = 'hsl(' + lowerC + ',' + middleC + '%,' + upperC + '%)';
        marker.icon.scale=30;
        marker.icon.fillOpacity = 0.5;
        marker.setLabel("");
        console.log("mouse moved out");

    });

    //Add the marker to the markers array.
    markers.push(marker);
}

// Sets the map on all markers in the array.
function setMapOnAll(map) {
  for (var i = 0; i < markers.length; i++) {
    markers[i].setMap(map);
  }
}

function deleteMarkers() {
  setMapOnAll(null);
  markers = [];
}

function fetchAreas(selectedVar){
    $.post('http://localhost:8000/fetchAreas',{},function(match){
        // Get the min and max value

        var properties = {
            "mean_house_price_2015": "mean_house_price_2015",
            "crime": "crime",
            "greenspace": "greenspace",
            "five_good_gcses": "five_good_gcses",
            "restaurants": "restaurants",
            "superfast_broadband": "superfast_broadband"
        };

        var valueMin = Math.min.apply(Math,match.map(function(o){
            return o[selectedVar];}))
        var valueMax = Math.max.apply(Math,match.map(function(o){return o[selectedVar];}))

        document.getElementById('census-min').textContent = valueMin.toLocaleString();

        document.getElementById('census-max').textContent = valueMax.toLocaleString();

//        document.getElementById('data-caret').style.display = 'block';
//        document.getElementById('data-caret').style.paddingLeft = percent + '%';


        $.each(match,function(i,val){

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


            ///////// Here is where I want to define the colour
            var low = [5, 69, 54];;  // color of smallest datum
            var high = [151, 83, 34];   // color of largest datum

//            var high;
//            var low;
//
//            if (selectedVar = 'crime'){
//                low = [151, 83, 34];  // color of smallest datum
//                high = [5, 69, 54];   // color of largest datum
//            }else if(selectedVar = 'mean_house_price_2015'){
//                low = [151, 83, 34];   // color of largest datum
//                high = [5, 69, 54];  // color of smallest datum
//            }else if(selectedVar = 'greenspace'){
//                low = [5, 69, 54];  // color of smallest datum
//                high = [151, 83, 34];   // color of largest datum
//            }else if(selectedVar = 'five_good_gcses'){
//                low = [5, 69, 54];  // color of smallest datum
//                high = [151, 83, 34];   // color of largest datum
//            }else if(selectedVar = 'restaurants'){
//                low = [5, 69, 54];  // color of smallest datum
//                high = [151, 83, 34];   // color of largest datum
//            }else if(selectedVar = 'broadband'){
//                low = [5, 69, 54];  // color of smallest datum
//                high = [151, 83, 34];   // color of largest datum
//            }

            // delta represents where the value sits between the min and max
            var valOfSelectedVar = val[selectedVar];
            var delta = (val[selectedVar] - valueMin) / (valueMax - valueMin);

//            var delta;
//            if (selectedVar = 'crime'){
//                delta = 1-((val[selectedVar] - valueMin) / (valueMax - valueMin));
//            }else{
//                delta = (val[selectedVar] - valueMin) / (valueMax - valueMin);
//            };

            var color = [];
            for (var i = 0; i < 3; i++) {
              // calculate an integer color based on the delta
              color[i] = (high[i] - low[i]) * delta + low[i];
            }
//            console.log(selectedVar + gname + color);
            //SWITCH THE HIGHS AND LOWS FOR CRIME AND HOUSE PRICES
//            if (selectedVar = 'crime' || 'mean_house_price_2015'){
//                var high = [5, 69, 54];;  // color of smallest datum
//                var low = [151, 83, 34];   // color of largest datum
//
//                // Make it so that the scale is inversed
//                for (var i = 0; i < 3; i++) {
//                  // calculate an integer color based on the delta
//                  color[i] = (low[i] - high[i]) * delta + low[i];
//                }
//            }else{
//                for (var i = 0; i < 3; i++) {
//                  // calculate an integer color based on the delta
//                  color[i] = (high[i] - low[i]) * delta + low[i];
//                }
//            }

            ///////// Then I can pass it as a variable into createMarker()
            createMarker(gLatLng,gid,gname,price,pop,greenspace,schools,restaurants, broadband, color[0], color[1], color[2], selectedVar, valOfSelectedVar);
        });
    });
}

function mouseInToRegion(e) {
        // set the hover state so the setStyle function can change the border
        e.feature.setProperty('state', 'hover');
      }

//End of Code for GoogleMap API
