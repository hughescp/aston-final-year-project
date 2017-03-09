import Chart from 'chart.js';

export default {
    template: '<canvas width="500px" height="500px"></canvas>',

    props: ['labels', 'area1', 'area2','values1', 'values2'],

    ready(){

        var data = {
            labels: this.labels,

            datasets: [
                {
                    backgroundColor: "rgba(10,70,220, 0.5)",
                    fill: false,
                    label: this.area1,
                    borderColor: "rgba(10,70,220, 0.5)",
                    borderSkipped: "top",
                    strokeColor: "rgba(220,70, 10,0.5)",
                    pointColor: "rgba(70,220,10,0.5)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: this.values1
                },
                {
                    backgroundColor: "rgba(210,70,220, 0.5)",
                    fill: false,
                    label: this.area2,
                    borderColor: "rgba(210,70,220, 0.5)",
                    borderSkipped: "top",
                    strokeColor: "rgba(220,70, 10,0.5)",
                    pointColor: "rgba(70,220,10,0.5)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: this.values2
                }
            ]
        };
        var ctx = this.$el.getContext('2d');

        new Chart(
            this.$el.getContext('2d'),{
                type: "line",
                data: data,
                options:{
//                    responsive:false
                }
        })
    }
}
