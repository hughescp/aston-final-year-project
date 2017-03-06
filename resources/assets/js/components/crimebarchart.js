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
                    label: "Offences per 1000",
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
                    label: "National Average (Offences per 1000)",
                    borderColor: "rgba(240,0,0, 0.5)",
                    borderSkipped: "top",
                    strokeColor: "rgba(220,70, 10,0.5)",
                    pointColor: "rgba(70,220,10,0.5)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [8.41, 1.66, 25.9]
                }
            ]
        };
        var ctx = this.$el.getContext('2d');

        new Chart(
            this.$el.getContext('2d'),{
                type: "horizontalBar",
                data: data,
        })
    }
}
