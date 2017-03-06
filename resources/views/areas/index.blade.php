@extends('layout')

@section('content')
<div id ='title' class="container">
    <h1>Areas</h1>
</div>
<div id = "preferencesInput" class = "container">
    
    <form method = "POST" action="/areas" id="preferencesForm" class="form-group" onsubmit="return validateForm()">
        
    !{csrf_field()}!
        
        <p>Please enter the upper and lower limits that you would like the average house price of the area to be in:</p>
        <label>Lower Limit:</label>
        <div class="input-group">
            <span class="input-group-addon"> £</span>
            <input type = "number" class="form-control" name="lowerlimit" min="1" max="999999999999" value = !{$_POST['lowerlimit'] or  140000}!>
        </div>
        
        <label>Upper Limit:</label>
        <div class="input-group">
            <span class="input-group-addon"> £</span>
            <input type = "number" class="form-control" name="upperlimit" min="1" max="999999999999" value = !{$_POST['upperlimit'] or  180000}!>
        </div>
        <br/>
        <p>Rank the factors below according to their importance to you, the highest being the most important.</p>
        
        <p>Distribute points to indicate how important they are to you; you have 20 points in total:</p>
        
        <ul id="sortable">
          <li class="ui-state-default"><input type="number" name = "crimeLevel" min = "0" max = "20" value = !{$_POST['crimeLevel'] or  4}!>Crime Level</li>
          <li class="ui-state-default"><input type="number" name = "greenSpace" min = "0" max = "20" value = !{$_POST['greenSpace'] or 4}!>Green Space</li>
          <li class="ui-state-default"><input type="number" name = "goodGCSEs" min = "0" max = "20" value = !{$_POST['goodGCSEs'] or 4}!>5 Good GCSEs</li>
          <li class="ui-state-default"><input type="number" name = "pubsandRestaurants" min = "0" max = "20" value = !{$_POST['pubsandRestaurants'] or 4}!>Number of Pubs &amp Restaurants</li>
          <li class="ui-state-default"><input type="number" name = "broadband" min = "0" max = "20" value = !{$_POST['broadband'] or 4}!>Superfast Broadband</li>
        </ul>
<!--
        <ul id="sortable">
          <li class="ui-state-default"><input ng-model="crime" type="number" name = "crimeLevel" min = "0" max = "20" value = "4">Crime Level</li>
          <li class="ui-state-default"><input  ng-model="greenspace" type="number" name = "greenSpace" min = "0" max = "20" value = "4">Green Space</li>
          <li class="ui-state-default"><input ng-model="gcses" type="number" name = "goodGCSEs" min = "0" max = "20" value = "4">5 Good GCSEs</li>
          <li class="ui-state-default"><input ng-model="restaurants" type="number" name = "pubsandRestaurants" min = "0" max = "20" value = "4">Number of Pubs &amp Restaurants</li>
          <li class="ui-state-default"><input ng-model="broadband" type="number" name = "broadband" min = "0" max = "20" value = "4">Superfast Broadband</li>
        </ul>
-->
        <br/>
        <input type="submit" class="btn btn-primary" value="Search"/>
        <div id="prefFormError"></div>
    </form>
    <script type="text/javascript">
        function validateForm(){
            //Set the error message.
            //Get the form and fetch the values inputted, converting thmem to numbers
            var form = document.getElementById("preferencesForm");

            var crimeLevel = Number(form.crimeLevel.value);
            var greenSpace = Number(form.greenSpace.value);
            var goodGCSEs = Number(form.goodGCSEs.value);
            var pubsandRestaurants = Number(form.pubsandRestaurants.value);
            var broadband = Number(form.broadband.value);

            //Calculate the sum of the input
            var inputSum = crimeLevel + greenSpace + goodGCSEs + pubsandRestaurants + broadband;

            //Check if the sum is equal to 20 or not.
            if(inputSum == 20){
                return true;
            }else{
                var errorText = '<br/><div id="prefFormError" class="alert alert-danger" role="alert"><strong>Please assign 20 points across the variables to indicated how important they are to you. (You have assigned '.concat(inputSum).concat(' points.)</strong></div>');

                var area = document.getElementById("prefFormError");
                area.innerHTML = errorText;
                return false;
            }
        }
    </script>
</div>
<div id = 'area_grid'>
    <div class = "container">
<!--        <div class = "row">-->
        <a href="/areas"><button class="btn btn-primary">Reset values</button></a>
        <form method = "POST" action="/areas/comparison" id="preferencesForm" class="form-group">
        !{csrf_field()}!
            <table id='areas_table' class="table table-striped">
                <thead class="thead-default">
                    <tr>
                        <th>Select</th>
                        <th>Area</th>
                        <th>Overall Score</th>
                        <th>Housing Affordability Ratio</th>
                        <th>Mean House Price</th>
                        <th>Crime Level</th>
                        <th>Green Space</th>
                        <th>Good GCSE's</th>
                        <th>Number of Pubs &amp; Restaraunts:</th>
                        <th>Superfast Broadband</th>
<!--
                        <th class="tooltip">Area<span class="tooltiptext">Name of the Area</span></th>
                        <th class="tooltip">Overall Score<span class="tooltiptext">Score based on default or user preferences</span></th>
                        <th class="tooltip">Housing Affordability Ratio<span class="tooltiptext">Ratio of avg house price to income</span></th>
                        <th class="tooltip">Mean House Price<span class="tooltiptext">Average house price in the area</span></th>
                        <th class="tooltip">Crime Level<span class="tooltiptext"># of crime's committed per 1,000 people</span></th>
                        <th class="tooltip">Green Space<span class="tooltiptext">% of area covered in greenspace</span></th>
                        <th class="tooltip">Good GCSE's<span class="tooltiptext">% of children achieving 5 A*-C GCSEs</span></th>
                        <th class="tooltip">Number of Pubs &amp; Restaraunts<span class="tooltiptext"># of eateries per km squared</span></th>
                        <th class="tooltip">Superfast Broadband<span class="tooltiptext">% of households with more than 24Mbps download speed</span></th>
-->
                    </tr>
                </thead>
                <tbody>
                <!--Here insert a row with the national average-->
                <tr>
                    <td scope="row"></td>
                    <th>National Average</th>
                    <td>N/A</td>
                    <td>7.9</td>
                    <td>£202067.1</td>
                    <td>8.2</td>
                    <td>46%</td>
                    <td>54.3%</td>
                    <td>3.4/km<sup>2</sup></td>
                    <td>76%</td>
                </tr>
            @if (isset($_POST["lowerlimit"]) && isset($_POST["upperlimit"]))
                @foreach ($areas as $area)
                    @if ($area->mean_house_price_2015 >= $_POST["lowerlimit"] && $_POST["upperlimit"] >= $area->mean_house_price_2015)
                       <tr>
                            <td scrope="row"><input type="checkbox" name="area[]" value='!{$area->id}!'></td>
                            <th><a href="/areas/!{$area->id}!">!{$area->name}!</a></th>
                            <td>!{Helpers::calculateOverallScore($area)}!</td>
                            <td>!{$area->housing_affordability_ratio}!</td>
                            <td>£!{$area->mean_house_price_2015}!</td>
                            <td>!{$area->crime}!</td>
                            <td>!{$area->greenspace*100}!%</td>
                            <td>!{$area->five_good_gcses*100}!%</td>
                            <td>!{$area->restaurants}!/km<sup>2</sup></td>
                            <td>!{$area->superfast_broadband*100}!%</td>
                        </tr>
                    @endif
                @endforeach
            @else
                @foreach ($areas as $area)
                    <tr>
                        <td scrope="row"><input type="checkbox" name="area[]" value="!{$area->id}!"></td>
                        <th><a href="/areas/!{$area->id}!">!{$area->name}!</a></th>
                        <td>!{Helpers::calculateOverallScore($area)}!</td>
                        <td>!{$area->housing_affordability_ratio}!</td>
                        <td>£!{$area->mean_house_price_2015}!</td>
                        <td>!{$area->crime}!</td>
                        <td>!{$area->greenspace*100}!%</td>
                        <td>!{$area->five_good_gcses*100}!%</td>
                        <td>!{$area->restaurants}!/km<sup>2</sup></td>
                        <td>!{$area->superfast_broadband*100}!%</td>
                    </tr>
                @endforeach
            @endif
                </tbody>
            </table>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="submit" id="compare_button" class="btn btn-primary" value="Compare"/>
        </form>
<!--        </div>-->
    </div>
</div>
@stop
