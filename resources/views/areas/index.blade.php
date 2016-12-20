@extends('layout')

@section('content')
<div id ='title'>
    <h1>Areas</h1>
</div>

<div class="container">
    <graph :labels="['January', 'February', 'March']" :values="[10, 42, 4]"></graph>
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
                <table>
                <tr>
                    <td>
                        <h4>Housing Affodability Ratio:</h4>
                    </td>
                    <td>
                        <h4>{{$area->housing_affordability_ratio}}</h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>Crime Level:</h4>
                    </td>
                    <td>
                        <h4>{{$area->crime}}</h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>Green Space:</h4>
                    </td>
                    <td>
                        <h4>{{$area->greenspace*100}}%</h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>5 Good GCSEs:</h4>
                    </td>
                    <td>
                        <h4>{{$area->five_good_gcses*100}}%</h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>Number of Pubs &amp; Restaraunts:</h4>
                    </td>
                    <td>
                        <h4>{{$area->restaurants}}</h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4>Superfast Broadband:</h4>
                    </td>
                    <td>
                        <h4>{{$area->superfast_broadband*100}}%</h4>
                    </td>
                </tr>
            </table>
            </td>
            @endforeach
        </tr>
    </table>
</div>
@stop

@section('footer')
    <script src="/js/Chart.min.js"></script>
@stop
