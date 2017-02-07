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
    var area = document.getElementById("prefFormError");

    var errorText = "";
    var form = document.getElementById("preferencesForm");

    var crimeLevel = form.crimeLevel.value;
    var greenSpace = form.greenSpace.value;
    var goodGCSEs = form.goodGCSEs.value;
    var pubsandRestaurants = form.pubsandRestaurants.value;
    var broadband = form.broadband.value;

    var crimeLevelValue = crimeLevel.value;
    var greenSpaceValue = greenSpace.value;
    var goodGCSEsValue = goodGCSEs.value;
    var pubsandRestaurantsValue = pubsandRestaurants.value;
    var broadbandValue = broadband.value;

    var inputSum = crimeLevelValue + greenSpaceValue + goodGCSEsValue + pubsandRestaurantsValue + broadbandValue;

    if(inputSum!=20){
        var errorText = "<h5>Please assign 20 points across the variables to indicated how important they are to you.</h5>";
        alert(errorText);
        return false;
        area.innerHTML = errorText;
    }else{
        return true;
    }
}
