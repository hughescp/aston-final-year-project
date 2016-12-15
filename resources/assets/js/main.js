import Chart from 'chart.js';
import Vue from 'vue';

var data = {
    labels: ['January', 'February', 'March'],

    datasets: [
        {
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,0.2)",
            pointColor: "rgba(220,220,220,0.2)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [30, 122, 90]
        }
    ]
};

var context = document.querySelector('#graph').getContext('2d');

new Chart(context,{
        type: "line",
        data: data,
});
