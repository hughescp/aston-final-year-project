@extends('layout')

@section('content')
<div id ='title' class="container">
    <h1>Areas</h1>
</div>
<div id = "preferencesInput" class = "container">
    
    <form method = "POST" action="/areas" id="preferencesForm" class="form-group" onsubmit="return validateForm()">
        
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
          <li class="ui-state-default"><input type="number" name = "crimeLevel" min = "0" max = "20" value = "4">Crime Level</li>
          <li class="ui-state-default"><input type="number" name = "greenSpace" min = "0" max = "20" value = "4">Green Space</li>
          <li class="ui-state-default"><input type="number" name = "goodGCSEs" min = "0" max = "20" value = "4">5 Good GCSEs</li>
          <li class="ui-state-default"><input type="number" name = "pubsandRestaurants" min = "0" max = "20" value = "4">Number of Pubs &amp Restaurants</li>
          <li class="ui-state-default"><input type="number" name = "broadband" min = "0" max = "20" value = "4">Superfast Broadband</li>
        </ul>
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
                <!--Here insert a row with the national average-->
                <tr>
                    <th scope="row">National Average</th>
                    <td>N/A</td>
                    <td>7.9</td>
                    <td>£202067.1</td>
                    <td>8.2</td>
                    <td>46%</td>
                    <td>54.3%</td>
                    <td>3.4</td>
                    <td>76%</td>
                </tr>

            @foreach ($areas as $area)
                <tr>
                    <th scrope="row"><a href="/areas/!{$area->id}!">!{$area->name}!</a></th>
                    <td>!{Helpers::calculateOverallScore($area)}!</td>
                    <td>!{$area->housing_affordability_ratio}!</td>
                    <td>£!{$area->mean_house_price_2015}!</td>
                    <td>!{$area->crime}!</td>
                    <td>!{$area->greenspace*100}!%</td>
                    <td>!{$area->five_good_gcses*100}!%</td>
                    <td>!{$area->restaurants}!</td>
                    <td>!{$area->superfast_broadband*100}!%</td>
                </tr>
            @endforeach
                </tbody>
            </table>
<!--        </div>-->
    </div>
</div>
@stop
