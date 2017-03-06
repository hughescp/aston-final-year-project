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
//                    [
//                        'rgba(5, 255, 0, 0.5)',
//                        'rgba(255, 99, 132, 0.5)',
//                        'rgba(54, 162, 235, 0.5)',
//                        'rgba(255, 206, 86, 0.5)',
//                        'rgba(75, 192, 192, 0.5)',
//                        'rgba(153, 102, 255, 0.5)',
//                        'rgba(255, 159, 64, 0.5)'
////                                                'rgba(39, 139, 73, 0.5)',
////                        'rgba(39, 139, 73, 0.5)',
////                        'rgba(39, 139, 73, 0.5)',
////                        'rgba(39, 139, 73, 0.5)',
////                        'rgba(39, 139, 73, 0.5)',
////                        'rgba(39, 139, 73, 0.5)',
////                        'rgba(39, 139, 73, 0.5)'
//
//                    ],
                    fill: false,
                    label: "Standard of Living Index rank",
                    borderColor: "rgba(10,70,220, 0.5)",
                    borderSkipped: "top",
                    strokeColor: "rgba(220,70, 10,0.5)",
                    pointColor: "rgba(70,220,10,0.5)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: this.values
                }
            ]
        };
        var ctx = this.$el.getContext('2d');

        new Chart(
            this.$el.getContext('2d'),{
                type: "horizontalBar",
                data: data,
                options:{
                    barThickness: 10,
                    scales: {
                        xAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
        })
    }
}
