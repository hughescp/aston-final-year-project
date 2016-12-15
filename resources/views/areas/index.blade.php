@extends('layout')

@section('content')
<div id ='title'>
    <h1>Areas</h1>
</div>
<div id = 'area grid'>
    <table>
        <tr>
            @foreach ($areas as $area)
            <td class = 'areaSummary'>
                <h2>{{$area->name}}</h2>
                <h3>Overall Score:{{AreasController::calculateOverallScore($area)}}</h3>
                <h3>7.1</h3>
                <canvas id="lineChart" height="400" width="400"></canvas>
                <script type="text/javascript">
                    document.getElementById("lineChart);
                    const CHART = document.getElementById("lineChart);
                    let lineChart = new Chart(CHART, {
                        type: 'line',
                        data: {
                            labels: ["January", "February", "March", "April", "May", "June", "July"],
                            datasets: [
                                {
                                    label: "My First dataset",
                                    fill: false,
                                    lineTension: 0.1,
                                    backgroundColor: "rgba(75,192,192,0.4)",
                                    borderColor: "rgba(75,192,192,1)",
                                    borderCapStyle: 'butt',
                                    borderDash: [],
                                    borderDashOffset: 0.0,
                                    borderJoinStyle: 'miter',
                                    pointBorderColor: "rgba(75,192,192,1)",
                                    pointBackgroundColor: "#fff",
                                    pointBorderWidth: 1,
                                    pointHoverRadius: 5,
                                    pointHoverBackgroundColor: "rgba(75,192,192,1)",
                                    pointHoverBorderColor: "rgba(220,220,220,1)",
                                    pointHoverBorderWidth: 2,
                                    pointRadius: 1,
                                    pointHitRadius: 10,
                                    data: [65, 59, 80, 81, 56, 55, 40],
                                    spanGaps: false,
                                }
                            ]
                        }
                    });

                </script>
            </td>
            @endforeach
        </tr>
    </table>
</div>
@stop
