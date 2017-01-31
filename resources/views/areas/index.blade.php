@extends('layout')

@section('content')
<div id ='title'>
    <h1>Areas</h1>
</div>
<div id = "preferencesInput" class = "container">
    <p>Please enter your upper and lower price limits.</p>
    <label>Lower Limit:</label><span> £</span><input type = "number" name="lowerlimit" min="1" max="999999999999" value = "140000">
    <label>Upper Limit:</label><span> £</span><input type = "number" name="upperlimit" min="1" max="999999999999" value = "180000">
    <p>Rank the factors below according to their importance to you, the highest being the most important:</p>
    <ul id="sortable">
      <li class="ui-state-default">Crime Level</li>
      <li class="ui-state-default">Green Space</li>
      <li class="ui-state-default">5 Good GCSEs</li>
      <li class="ui-state-default">Number of Pubs &amp Restaurants</li>
      <li class="ui-state-default">Superfast Broadband</li>
    </ul>
</div>
<div id = 'area grid'>
    <div class = "container">
        <div class = "row">
            @foreach ($areas as $area)
            <div class = "col-md-2 col-md-offset-1 col-sm-4">
            <div class = 'areaSummary'>
                <h2>{{$area->name}}</h2>
                <h3>Overall Score:</h3>
                <h3 id="overall_score">
                    {{Helpers::calculateOverallScore($area)}}
                </h3>
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
                            <h4>Mean House Price:</h4>
                        </td>
                        <td>
                            <h4>£{{$area->avg_house_price}}</h4>
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
                <div class="container-fluid">
                    <graph :labels="[
                            'Housing Affordability Ratio',
                            'Crime Level',
                            'Green Space',
                            '5 Good GCSEs',
                            'N. of Restaurants',
                            'Superfast Broadband'
                            ]"
                           :values="[
                            {{$area->housing_affordability_ratio}},
                            {{$area->crime}},
                            {{$area->greenspace*100}},
                            {{$area->five_good_gcses*100}},
                            {{$area->restaurants}},
                            {{$area->superfast_broadband*100}}]">
                    </graph>
                </div>
            </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@stop

@section('footer')
    <script src="/js/Chart.min.js"></script>
    <script src="/js/main.js"></script>
@stop
