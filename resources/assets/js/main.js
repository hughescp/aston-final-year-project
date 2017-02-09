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

//function validateForm(){
//    //Set the error message.
//    var errorText = "<h5>Please assign 20 points across the variables to indicated how important they are to you.</h5>";
//
//    //Get the form and fetch the values inputted, converting thmem to numbers
//    var form = document.getElementById("preferencesForm");
//
//    var crimeLevel = Number(form.crimeLevel.value);
//    var greenSpace = Number(form.greenSpace.value);
//    var goodGCSEs = Number(form.goodGCSEs.value);
//    var pubsandRestaurants = Number(form.pubsandRestaurants.value);
//    var broadband = Number(form.broadband.value);
//
//    //Calculate the sum of the input
//    var inputSum = crimeLevel + greenSpace + goodGCSEs + pubsandRestaurants + broadband;
//
//    //Check if the sum is equal to 20 or not.
//    if(inputSum == 20){
////                alert("true, value = " + inputSum);
//        return true;
//    }else{
//        var area = document.getElementById("prefFormError");
//        area.innerHTML = errorText;
////                alert("false, value = " + inputSum);
//        return false;
//    }
//}
