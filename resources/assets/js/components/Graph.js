import Chart from 'chart.js';

export default {
    template: '<canvas width="200" height="200"></canvas>',

    props: ['labels', 'values'],

    ready(){

        var data = {
            labels: this.labels,

            datasets: [
                {
                    fillColor: "rgba(10,70,220, 0.5)",
                    strokeColor: "rgba(220,220,220,0.2)",
                    pointColor: "rgba(220,220,220,0.2)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: this.values
                }
            ]
        };

        new Chart(
            this.$el.getContext('2d'),{
                type: "bar",
                data: data,
        })
    }
}
