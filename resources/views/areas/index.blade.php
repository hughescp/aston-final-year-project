@extends('layout')

@section('content')
<div id ='title' class="container">
    <h1>Areas</h1>
</div>
<div id = "preferencesInput" class = "container">
    
    <form method = "POST" action="/areas" id="preferencesForm" class="form-group">
        
    {{csrf_field()}}
        
        <p>Please enter your price range:</p>
        
        <label>Lower Limit:</label>
        <div class="input-group">
            <span class="input-group-addon"> £</span>
            <input type = "number" class="form-control" name="lowerlimit" min="1" max="999999999999" value = "140000">
        </div>
        
        <label>Upper Limit:</label>
        <div class="input-group">
            <span class="input-group-addon"> £</span>
            <input type = "number" class="form-control" name="upperlimit" min="1" max="999999999999" value = "180000">
        </div>
        
        <p>Rank the factors below according to their importance to you, the highest being the most important:</p>
        
        <p>Then distribute points to the factors to indicate how important they are to you. You have  20 points in total. You can distribute them in anyway that you would like:</p>
        
        <ul id="sortable">
          <li class="ui-state-default"><input type="number" name = "crimeLevel" min = "0" max = "20" value = "5">Crime Level</li>
          <li class="ui-state-default"><input type="number" name = "greenSpace" min = "0" max = "20" value = "5">Green Space</li>
          <li class="ui-state-default"><input type="number" name = "goodGCSEs" min = "0" max = "20" value = "5">5 Good GCSEs</li>
          <li class="ui-state-default"><input type="number" name = "pubsandRestaurants" min = "0" max = "20" value = "5">Number of Pubs &amp Restaurants</li>
          <li class="ui-state-default"><input type="number" name = "broadband" min = "0" max = "20" value = "5">Superfast Broadband</li>
        </ul>
        <!--For the form input I could just measure the value rather that the order in which the variables are sorted. I assume that boxes sorted higher will have a higher value. The sorting is more to help the user think through the process. The numbers should descend in the same order that they were sorted.-->
        <input type="submit" class="btn btn-primary" value="Search"/>
    </form>
</div>
<div id = 'area grid'>
    <div class = "container">
<!--        <div class = "row">-->
            <table id='areas_table' class="table table-striped">
                <thead class="thead-default">
                    <tr>
                        <th>Area</th>
                        <th>Overall Score</th>
                        <th>Housing Affordability Ratio</th>
                        <th>Mean House Price</th>
                        <th>Crime Level</th>
                        <th>Green Space</th>
                        <th>Good GCSE's</th>
                        <th>Number of Pubs &amp; Restaraunts:</th>
                        <th>Superfast Broadband</th>
                    </tr>
                </thead>
                <tbody>
            @foreach ($areas as $area)
                <tr>
                    <th scrope="row"><a href="/areas/{{$area->id}}">{{$area->name}}</a></th>
                    <td>{{Helpers::calculateOverallScore($area)}}</td>
                    <td>{{$area->housing_affordability_ratio}}</td>
                    <td>£{{$area->avg_house_price}}</td>
                    <td>{{$area->crime}}</td>
                    <td>{{$area->greenspace*100}}%</td>
                    <td>{{$area->five_good_gcses*100}}%</td>
                    <td>{{$area->restaurants}}</td>
                    <td>{{$area->superfast_broadband*100}}%</td>
                </tr>
            @endforeach
                </tbody>
            </table>
<!--        </div>-->
    </div>
</div>
@stop

@section('footer')
@stop
