import Vue from 'vue';
import Graph from './components/Graph';


new Vue({
    el: 'body',

    components: {Graph}
});

$(document).ready( function () {
    $('#areas_table').DataTable({
        aaSorting: [[1, 'desc']]
    });
} );

function validateForm(){
    var errorText = "";
    var form = document.getElementById("preferencesForm");

    var crimeLevel = form.crimeLevel;
    var greenSpace = form.greenSpace;
    var goodGCSEs = form.goodGCSEs;
    var pubsandRestaurants = form.pubsandRestaurants;
    var broadband = form.broadband;

    if((crimeLevel + greenSpace + goodGCSEs + pubsandRestaurants + broadband)!=20){
        errorText += "<br/>Please assign 20 points across the variables to indicated how important they are to you.";
        alert(errorText);
    }
}
