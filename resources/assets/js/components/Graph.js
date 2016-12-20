import Chart from 'chart.js';

export default{
    template: '<canvas width="200" height="200" id="graph"></canvas>',

    ready(){
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
    }
}
