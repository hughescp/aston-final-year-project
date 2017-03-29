@extends('layout')

@section('content')
<div id="controls" class="nicebox">
  <div>
    <select id="census-variable" ng-model="choice">
      <option selected="selected" value="mean_house_price_2015">Mean House Price</option>
      <option value="crime">Crime Level</option>
      <option value="greenspace">Green Space</option>
      <option value="five_good_gcses">Good Schools</option>
      <option value="restaurants">N. of pubs & retaurants</option>
      <option value="superfast_broadband">Superfast Broadband</option>
    </select>
  </div>
  <div id="legend">
    <div id="census-min">min</div>
    <div class="color-key"><span id="data-caret">◆</span></div>
    <div id="census-max">max</div>
  </div>
</div>
<div id="data-box" class="nicebox">
  <label id="data-label" for="data-value"></label>
  <span id="data-value"></span>
</div>
<div id='map'>
</div>
<strong>The chosen var is {{chosenVar}}</strong>
<strong>The chosen var is {{choice}}</strong>
<div id = "preferencesInput" class = "container">
    <h2>Find Your Area</h2>
    <form method = "POST" action="/areas" id="preferencesForm" class="form-group" onsubmit="return validateInputForm()">
        
    !{csrf_field()}!
        <p>Please enter the upper and lower limits that you would like the average house price of the area to be in:</p>
        <div class="form-group row">
        <label class="col-md-6 col-form-label">Lower Limit:</label>
        <div class="col-md-5 input-group">
            <span class="input-group-addon"> £</span>
            <input style="min-width:100px" type = "number" class="form-control" name="lowerlimit" min="1" max="999999999999" value = !{$_POST['lowerlimit'] or  140000}!>
<!--
            <select type = "number" class="form-control" name="lowerlimit" min="1" max="999999999999" value = !{$_POST['lowerlimit'] or  "£140,000"}!>
                <option value="100000">£100,000</option>
                <option value="120000">£120,000</option>
                <option value="140000">£140,000</option>
                <option value="160000">£160,000</option>
                <option value="180000">£180,000</option>
                <option value="200000">£200,000</option>
                <option value="220000">£220,000</option>
                <option value="240000">£240,000</option>
                <option value="260000">£260,000</option>
                <option value="280000">£280,000</option>
                <option value="300000">£300,000</option>
                <option value="320000">£320,000</option>
                <option value="340000">£340,000</option>
                <option value="360000">£360,000</option>
                <option value="380000">£380,000</option>
                <option value="400000">£400,000</option>
                <option value="420000">£420,000</option>
                <option value="440000">£440,000</option>
                <option value="460000">£460,000</option>
                <option value="480000">£480,000</option>
                <option value="500000">£500,000</option>
                <option value="520000">£520,000</option>
                <option value="540000">£540,000</option>
                <option value="560000">£560,000</option>
                <option value="580000">£580,000</option>
                <option value="600000">£600,000</option>
            </select>
-->
        </div>
        </div>
        <div class="form-group row">
        <label class="col-md-6 col-form-label">Upper Limit:</label>
        <div class="col-md-5 input-group">
            <span class="input-group-addon"> £</span>
            <input style="min-width:100px" type = "number" class="form-control" name="upperlimit" min="1" max="999999999999" value = !{$_POST['upperlimit'] or  180000}!>
<!--
            <select type = "number" class="form-control" name="upperlimit" min="1" max="999999999999" value = !{$_POST['upperlimit'] or  "£180,000"}!>
                <option value="100000">£100,000</option>
                <option value="120000">£120,000</option>
                <option value="140000">£140,000</option>
                <option value="160000">£160,000</option>
                <option value="180000">£180,000</option>
                <option value="200000">£200,000</option>
                <option value="220000">£220,000</option>
                <option value="240000">£240,000</option>
                <option value="260000">£260,000</option>
                <option value="280000">£280,000</option>
                <option value="300000">£300,000</option>
                <option value="320000">£320,000</option>
                <option value="340000">£340,000</option>
                <option value="360000">£360,000</option>
                <option value="380000">£380,000</option>
                <option value="400000">£400,000</option>
                <option value="420000">£420,000</option>
                <option value="440000">£440,000</option>
                <option value="460000">£460,000</option>
                <option value="480000">£480,000</option>
                <option value="500000">£500,000</option>
                <option value="520000">£520,000</option>
                <option value="540000">£540,000</option>
                <option value="560000">£560,000</option>
                <option value="580000">£580,000</option>
                <option value="600000">£600,000</option>
            </select>
-->

        </div>
        </div>
        <p>Rank the factors below according to their importance to you, the highest being the most important.</p>
        
        <p>Distribute points to indicate how important they are to you; you have 20 points in total:</p>
        
        <div id="pointsInput">
        <div class="form-group row">
            <div class ="col-sm-3">
                <input style="min-width:50px" class="form-control" type="number" name = "crimeLevel" min = "0" max = "20" value = !{$_POST['crimeLevel'] or  4}!>
            </div>
            <label class="col-sm-9 col-form-label">Low Crime Level</label>
        </div>
        <div class="form-group row">
            <div class ="col-sm-3">
                <input style="min-width:50px" class="form-control" type="number" name = "greenSpace" min = "0" max = "20" value = !{$_POST['greenSpace'] or  4}!>
            </div>
            <label class="col-sm-9 col-form-label">Green Space</label>
        </div>
        <div class="form-group row">
            <div class ="col-sm-3">
                <input style="min-width:50px" class="form-control" type="number" name = "goodGCSEs" min = "0" max = "20" value = !{$_POST['goodGCSEs'] or  4}!>
            </div>
            <label class="col-sm-9 col-form-label">Good schools</label>
        </div>
        <div class="form-group row">
            <div class ="col-sm-3">
                <input style="min-width:50px" class="form-control" type="number" name = "pubsandRestaurants" min = "0" max = "20" value = !{$_POST['pubsandRestaurants'] or  4}!>
            </div>
            <label class="col-sm-9 col-form-label">Number of Pubs &amp Restaurants</label>
        </div>
        <div class="form-group row">
            <div class ="col-sm-3">
                <input style="min-width:50px" class="form-control" type="number" name = "broadband" min = "0" max = "20" value = !{$_POST['broadband'] or  4}!>
            </div>
            <label class="col-sm-9 col-form-label">Superfast Broadband</label>
        </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Search"/>
    </form>
        <a href="/areas"><button class="btn btn-primary" style="background-color:#fff !important;color:#1b6634">Reset values</button></a>
        <div id="prefFormError"></div>

    <script type="text/javascript">

        var crimeLevel;
        var greenSpace;
        var goodGCSEs;
        var pubsandRestaurants;
        var broadband;

        function validateInputForm(){
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
        <form method = "POST" action="/areas/comparison" id="compForm" class="form-group" onsubmit="return validateCompForm()">
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
                    <tr class="second">
                        <th scope="row"></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
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
                        <td scrope="row"><input type="checkbox" name="area[]" class="checkbox" value="!{$area->id}!"></td>
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
<!--            <input type="hidden" name="_token" value="{{ csrf_token() }}">-->
            <input type="submit" id="compare_button" class="btn btn-primary" value="Compare"/>
            <div id="compFormError"></div>
            <p>To compare two areas' details side by side, select the areas and click 'Compare'</p>
            </form>

            <script type="text/javascript">
            function validateCompForm(){
                var numberOfSelected = document.querySelectorAll('input[type="checkbox"]:checked').length;

                if (numberOfSelected === 2)
                {
                    return true;
                }
                else
                {
                var errorText2 = '<br/><div id="prefFormError" class="alert alert-danger" role="alert"><strong>Please enter 2 areas to compare</strong></div>';

                var area2 = document.getElementById("compFormError");
                area2.innerHTML = errorText2;
//                    $( "#dialog" ).dialog();

                    // cancel submit
                    return false;
                }
            }
        </script>
        <div id="dialog" title="Comparea">
            <p>Please select two areas to compare</p>
        </div>
</div>
@stop
