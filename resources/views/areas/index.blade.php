@extends('layout')

@section('content')
<div id ='title'>
    <h1>Areas</h1>
</div>

<div class="container">
    <graph></graph>
</div>

<script src="/js/main.js"></script>

<div id = 'area grid'>
    <table class = 'table-bordered'>
        <tr>
            @foreach ($areas as $area)
            <td class = 'areaSummary'>
                <h2>{{$area->name}}</h2>
                <h3>Overall Score:</h3>
                <h3>7.1</h3>
<!--
                <canvas id="lineChart" height="300" width="300"></canvas>
                <script type="text/javascript">

                    function(){
                        var ctx = document.getElementById(lineChart).getContext('2d');
                        var chart = {
                            labels: ['January', 'February', 'March'],
                            datasets:[{
                                data: [100, 423, 719]
                            }]
                        };

                        new Chart(ctx).Line(chart);
                    };
                </script>
-->
            </td>
            @endforeach
        </tr>
    </table>
</div>
@stop

@section('footer')
    <script src="/public/js/Chart.min.js"></script>
@stop
