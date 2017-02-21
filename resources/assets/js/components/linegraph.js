import Chart from 'chart.js';

export default {
    template: '<canvas width="200px" height="200px"></canvas>',

    props: ['labels', 'values'],

    ready(){

        var data = {
            labels: this.labels,

            datasets: [
                {
                    backgroundColor: "rgba(10,70,220, 0.5)",
                    fill: false,
                    label: "Mean House Price",
                    borderColor: "rgba(10,70,220, 0.5)",
                    borderSkipped: "top",
                    strokeColor: "rgba(220,70, 10,0.5)",
                    pointColor: "rgba(70,220,10,0.5)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: this.values
                },
                {
                    backgroundColor: "rgba(120,20,210, 0.5)",
                    fill: false,
                    label: "National Average",
                    borderColor: "rgba(240,0,0, 0.5)",
                    borderSkipped: "top",
                    strokeColor: "rgba(220,70, 10,0.5)",
                    pointColor: "rgba(70,220,10,0.5)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [176858.9064, 181119.9949, 194051.5197, 202067.052]
                }
            ]
        };
        var ctx = this.$el.getContext('2d');

        new Chart(
            this.$el.getContext('2d'),{
                type: "line",
                data: data,
        })
    }
}
