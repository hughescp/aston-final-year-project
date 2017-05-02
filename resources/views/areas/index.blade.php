@extends('layout')

@section('content')
<section id="landing_page_section">
    <div class="inner">
        <h1>Let's Find Your Home</h1>
    </div>
    <div class=tablediv>
    <h4 class="left">Get detailed information on cities across the UK        <img id = "uk_outline" src="/img/uk-map.png">
        <!--http://www.hlmarchitects.com/img/location/uk-map.png-->
    </h4>
    </div>
    <div class="tablediv">
        <h4 class="right">Receive personalised recommendations
        <i id="reccommendation_icon" class = "fa fa-thumbs-o-up fa-5x" aria-hidden="true" style="float:left"></i>
        </h4>
    </div>
    <div class="tablediv">
        <h4 class="left">Compare areas side-by-side
           <img id = "uk_outline" src="/img/city_icon.png">
           <img id = "uk_outline" src="/img/village_icon.png">
        </h4>
    </div>
    <div class="inner">
        <a href="#main_content"><i id="nav_to_table" class="fa fa-angle-double-down fa-4x" aria-hidden="true" ></i></a>
    </div>
</section>
<!--<img id="landing_page" src="/img/Plain_Landing_Page.png">-->
<!--<img id="landing_page" src="/img/Comparea_Landing_Page.png">-->
<div id="main_content">
<div id = "preferencesInput" class = "container">
    <h2>Find Your Area</h2>
    <form method = "post" action="/pref_input" id="preferencesForm" class="form-group" onsubmit="return validateInputForm()">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    !{csrf_field()}!
        <p>Please enter the upper and lower limits that you would like the average house price of the area to be in:</p>
        <div class="form-group row">
        <label class="col-md-6 col-form-label">Lower Limit:</label>
        <div class="col-md-5 input-group">
            <span class="input-group-addon"> £</span>
            @if (Session::has('lowerlimit'))
            <select type = "number" class="form-control" name="lowerlimit">
                <option value="100000" @if(Session::get('lowerlimit')=="100000") !{"selected=selected"}! @endif>£100,000</option>
                <option value="120000" @if(Session::get('lowerlimit')=="120000") !{"selected=selected"}! @endif>£120,000</option>
                <option value="140000"@if(Session::get('lowerlimit')=="140000") !{"selected=selected"}! @endif>£140,000</option>
                <option value="160000"@if(Session::get('lowerlimit')=="160000") !{"selected=selected"}! @endif>£160,000</option>
                <option value="180000"@if(Session::get('lowerlimit')=="180000") !{"selected=selected"}! @endif>£180,000</option>
                <option value="200000"@if(Session::get('lowerlimit')=="200000") !{"selected=selected"}! @endif>£200,000</option>
                <option value="220000"@if(Session::get('lowerlimit')=="220000") !{"selected=selected"}! @endif>£220,000</option>
                <option value="240000"@if(Session::get('lowerlimit')=="240000") !{"selected=selected"}! @endif>£240,000</option>
                <option value="260000"@if(Session::get('lowerlimit')=="260000") !{"selected=selected"}! @endif>£260,000</option>
                <option value="280000"@if(Session::get('lowerlimit')=="280000") !{"selected=selected"}! @endif>£280,000</option>
                <option value="300000"@if(Session::get('lowerlimit')=="300000") !{"selected=selected"}! @endif>£300,000</option>
                <option value="320000"@if(Session::get('lowerlimit')=="320000") !{"selected=selected"}! @endif>£320,000</option>
                <option value="340000"@if(Session::get('lowerlimit')=="340000") !{"selected=selected"}! @endif>£340,000</option>
                <option value="360000"@if(Session::get('lowerlimit')=="360000") !{"selected=selected"}! @endif>£360,000</option>
                <option value="380000"@if(Session::get('lowerlimit')=="380000") !{"selected=selected"}! @endif>£380,000</option>
                <option value="400000"@if(Session::get('lowerlimit')=="400000") !{"selected=selected"}! @endif>£400,000</option>
                <option value="420000"@if(Session::get('lowerlimit')=="420000") !{"selected=selected"}! @endif>£420,000</option>
                <option value="440000"@if(Session::get('lowerlimit')=="440000") !{"selected=selected"}! @endif>£440,000</option>
                <option value="460000"@if(Session::get('lowerlimit')=="460000") !{"selected=selected"}! @endif>£460,000</option>
                <option value="480000"@if(Session::get('lowerlimit')=="480000") !{"selected=selected"}! @endif>£480,000</option>
                <option value="500000"@if(Session::get('lowerlimit')=="500000") !{"selected=selected"}! @endif>£500,000</option>
                <option value="520000"@if(Session::get('lowerlimit')=="520000") !{"selected=selected"}! @endif>£520,000</option>
                <option value="540000"@if(Session::get('lowerlimit')=="540000") !{"selected=selected"}! @endif>£540,000</option>
                <option value="560000"@if(Session::get('lowerlimit')=="560000") !{"selected=selected"}! @endif>£560,000</option>
                <option value="580000"@if(Session::get('lowerlimit')=="580000") !{"selected=selected"}! @endif>£580,000</option>
                <option value="600000"@if(Session::get('lowerlimit')=="600000") !{"selected=selected"}! @endif>£600,000</option>
            </select>
<!--            <input style="min-width:100px" type = "number" class="form-control" name="lowerlimit" min="1" max="999999999999" value = !{Session::get('lowerlimit')}!>-->
            @else
<!--            <input style="min-width:100px" type = "number" class="form-control" name="lowerlimit" min="1" max="999999999999" value = 180000>-->
            <select type = "number" class="form-control" name="lowerlimit" min="1" max="999999999999" value = 140000>
                <option value="100000">£100,000</option>
                <option value="120000">£120,000</option>
                <option value="140000">£140,000</option>
                <option value="160000">£160,000</option>
                <option value="180000" selected="selected">£180,000</option>
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
            @endif
        </div>
        </div>
        <div class="form-group row">
        <label class="col-md-6 col-form-label">Upper Limit:</label>
        <div class="col-md-5 input-group">
            <span class="input-group-addon"> £</span>
            @if (Session::has('upperlimit'))
            <select type = "number" class="form-control" name="upperlimit" min="1" max="999999999999" value = !{Session::get('upperlimit')}!>
                <option value="100000" @if(Session::get('upperlimit')=="100000") !{"selected=selected"}! @endif>£100,000</option>
                <option value="120000" @if(Session::get('upperlimit')=="120000") !{"selected=selected"}! @endif>£120,000</option>
                <option value="140000"@if(Session::get('upperlimit')=="140000") !{"selected=selected"}! @endif>£140,000</option>
                <option value="160000"@if(Session::get('upperlimit')=="160000") !{"selected=selected"}! @endif>£160,000</option>
                <option value="180000"@if(Session::get('upperlimit')=="180000") !{"selected=selected"}! @endif>£180,000</option>
                <option value="200000"@if(Session::get('upperlimit')=="200000") !{"selected=selected"}! @endif>£200,000</option>
                <option value="220000"@if(Session::get('upperlimit')=="220000") !{"selected=selected"}! @endif>£220,000</option>
                <option value="240000"@if(Session::get('upperlimit')=="240000") !{"selected=selected"}! @endif>£240,000</option>
                <option value="260000"@if(Session::get('upperlimit')=="260000") !{"selected=selected"}! @endif>£260,000</option>
                <option value="280000"@if(Session::get('upperlimit')=="280000") !{"selected=selected"}! @endif>£280,000</option>
                <option value="300000"@if(Session::get('upperlimit')=="300000") !{"selected=selected"}! @endif>£300,000</option>
                <option value="320000"@if(Session::get('upperlimit')=="320000") !{"selected=selected"}! @endif>£320,000</option>
                <option value="340000"@if(Session::get('upperlimit')=="340000") !{"selected=selected"}! @endif>£340,000</option>
                <option value="360000"@if(Session::get('upperlimit')=="360000") !{"selected=selected"}! @endif>£360,000</option>
                <option value="380000"@if(Session::get('upperlimit')=="380000") !{"selected=selected"}! @endif>£380,000</option>
                <option value="400000"@if(Session::get('upperlimit')=="400000") !{"selected=selected"}! @endif>£400,000</option>
                <option value="420000"@if(Session::get('upperlimit')=="420000") !{"selected=selected"}! @endif>£420,000</option>
                <option value="440000"@if(Session::get('upperlimit')=="440000") !{"selected=selected"}! @endif>£440,000</option>
                <option value="460000"@if(Session::get('upperlimit')=="460000") !{"selected=selected"}! @endif>£460,000</option>
                <option value="480000"@if(Session::get('upperlimit')=="480000") !{"selected=selected"}! @endif>£480,000</option>
                <option value="500000"@if(Session::get('upperlimit')=="500000") !{"selected=selected"}! @endif>£500,000</option>
                <option value="520000"@if(Session::get('upperlimit')=="520000") !{"selected=selected"}! @endif>£520,000</option>
                <option value="540000"@if(Session::get('upperlimit')=="540000") !{"selected=selected"}! @endif>£540,000</option>
                <option value="560000"@if(Session::get('upperlimit')=="560000") !{"selected=selected"}! @endif>£560,000</option>
                <option value="580000"@if(Session::get('upperlimit')=="580000") !{"selected=selected"}! @endif>£580,000</option>
                <option value="600000"@if(Session::get('upperlimit')=="600000") !{"selected=selected"}! @endif>£600,000</option>
            </select>
<!--            <input style="min-width:100px" type = "number" class="form-control" name="upperlimit" min="1" max="999999999999" value = !{Session::get('upperlimit')}!>-->
            @else
            <select type = "number" class="form-control" name="upperlimit" min="1" max="999999999999" value = 180000>
                <option value="100000">£100,000</option>
                <option value="120000">£120,000</option>
                <option value="140000">£140,000</option>
                <option value="160000">£160,000</option>
                <option value="180000">£180,000</option>
                <option value="200000">£200,000</option>
                <option value="220000" selected="selected">£220,000</option>
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
            <!--            <input style="min-width:100px" type = "number" class="form-control" name="upperlimit" min="1" max="999999999999" value = 220000>-->
            @endif

        </div>
        </div>
        <p>Rank the factors below according to their importance to you, the highest being the most important.</p>
        
        <p>Distribute points to indicate how important they are to you; you have 20 points in total:</p>
<!--
        <div id="demo">
            <p>{{num1}}</p>
            <p>{{num2}}</p>
            <p>The sum of the two numbers is {{num1 + num2 + num3 + num4 + num5}}</p>
            <input type="number" v-model.number="num1" number><br>
            <input type="number" v-model.number="num2" number><br>
            <input type="number" v-model.number="num3" number><br>
            <input type="number" v-model.number="num4" number><br>
            <input type="number" v-model.number="num5" number>
        </div>
-->
        <div id="pointsInput">
        <div class="form-group row">
        <script src="https://unpkg.com/vue"></script>
            <div class ="col-sm-3">
                @if (Session::has('crimeLevel'))
                <input style="min-width:50px" class="form-control" type="number" name = "crimeLevel" min = "0" max = "20" value = !{Session::get('crimeLevel')}!>
                @else
                <input style="min-width:50px" class="form-control" type="number" name = "crimeLevel" min = "0" max = "20" value = 4>
                @endif
            </div>
            <label class="col-sm-9 col-form-label">Low Crime Level</label>
        </div>
        <div class="form-group row">
            <div class ="col-sm-3">
                @if (Session::has('greenSpace'))
                <input style="min-width:50px" class="form-control" type="number" name = "greenSpace" min = "0" max = "20" value = !{Session::get('greenSpace')}!>
                @else
                <input style="min-width:50px" class="form-control" type="number" name = "greenSpace" min = "0" max = "20" value = 4>
                @endif
            </div>
            <label class="col-sm-9 col-form-label">Green Space</label>
        </div>
        <div class="form-group row">
            <div class ="col-sm-3">
                @if (Session::has('goodGCSEs'))
                <input style="min-width:50px" class="form-control" type="number" name = "goodGCSEs" min = "0" max = "20" value = !{Session::get('goodGCSEs')}!>
                @else
                <input style="min-width:50px" class="form-control" type="number" name = "goodGCSEs" min = "0" max = "20" value = 4>
                @endif
            </div>
            <label class="col-sm-9 col-form-label">Good schools</label>
        </div>
        <div class="form-group row">
            <div class ="col-sm-3">
                @if (Session::has('pubsandRestaurants'))
                <input style="min-width:50px" class="form-control" type="number" name = "pubsandRestaurants" min = "0" max = "20" value = !{Session::get('pubsandRestaurants')}!>
                @else
                <input style="min-width:50px" class="form-control" type="number" name = "pubsandRestaurants" min = "0" max = "20" value = 4>
                @endif
            </div>
            <label class="col-sm-9 col-form-label">Number of Pubs &amp Restaurants</label>
        </div>
        <div class="form-group row">
            <div class ="col-sm-3">
                @if (Session::has('broadband'))
                <input style="min-width:50px" class="form-control" type="number" name = "broadband" min = "0" max = "20" value = !{Session::get('broadband')}!>
                @else
                <input style="min-width:50px" class="form-control" type="number" name = "broadband" min = "0" max = "20" value = 4>
                @endif
            </div>
            <label class="col-sm-9 col-form-label">Superfast Broadband</label>
        </div>
        </div>
<!--        <p>You have submitted {{crimelevel+greenSpace+goodGCSEs+pubsandRestaurants+broadband}} points</p>-->
        <input type="submit" class="btn btn-primary" value="Search"/>
    </form>
        <a href="/pref_reset"><button class="btn btn-primary" style="background-color:#fff !important;color:#1b6634">Reset values</button></a>
        <div id="prefFormError"></div>
<!--
        <script src="https://unpkg.com/vue"></script>
        <div id="demo">
            <input style="min-width:50px" class="form-control" type="number" v-model.number="num1" name = "crimelevel" min = "0" max = "20" >
            <label class="col-sm-9 col-form-label">Low Crime</label>
            <input style="min-width:50px" class="form-control" type="number" v-model.number="num2" name = "greenSpace" min = "0" max = "20" >
            <label class="col-sm-9 col-form-label">Green space</label>
            <input style="min-width:50px" class="form-control" type="number" v-model.number="num3" name = "goodGCSEs" min = "0" max = "20" >
            <label class="col-sm-9 col-form-label">Good schools</label>
            <input style="min-width:50px" class="form-control" type="number" v-model.number="num4" name = "pubsandRestaurants" min = "0" max = "20" >
            <label class="col-sm-9 col-form-label">N. of Pubs &amp Restaurants</label>
            <input style="min-width:50px" class="form-control" type="number" v-model.number="num5" name = "broadband" min = "0" max = "20" >
            <label class="col-sm-9 col-form-label">Superfast Broadband</label><br>
            <p>The sum of the numbers is {{num1 + num2 + num3 + num4 + num5}}</p>
        </div>
        <script type="text/javascript">
        var data = {
            num1: 4,
            num2: 4,
            num3: 4,
            num4: 4,
            num5: 4
        }

        var demo = new Vue({
            el: '#demo',
            data: data
        })
        </script>
-->

    <script type="text/javascript">
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
                        <th data-toggle="tooltip" title="Select areas to compare!">Select</th>
                        <th data-toggle="tooltip" title="Name of area">Area</th>
                        <th data-toggle="tooltip" title="Score calculated based on default weightings or user preferences">Overall Score</th>
                        <th data-toggle="tooltip" title="Ratio of avg salary to avg house price">Housing Affordability Ratio</th>
                        <th data-toggle="tooltip" title="of houses in the area">Mean House Price</th>
                        <th data-toggle="tooltip" title="Offences per 1,000">Crime Level</th>
                        <th data-toggle="tooltip" title="% of city coverd by green space">Green Space</th>
                        <th data-toggle="tooltip" title="% of pupils achieving 5 A*-C GCSEs.">Good GCSE's</th>
                        <th data-toggle="tooltip" title="per square km">Number of Pubs &amp; Restaraunts:</th>
                        <th data-toggle="tooltip" title="% of households with superfast broadband">Superfast Broadband</th>
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
            @if ((Session::has('lowerlimit')) && (Session::has('upperlimit')))
                @foreach ($areas as $area)
                    @if ($area->mean_house_price_2015 >= Session::get('lowerlimit') && Session::get('upperlimit') >= $area->mean_house_price_2015)
                       <tr>
                            <td scrope="row"><input type="checkbox" name="area[]" class="checkbox" value='!{$area->id}!'></td>
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
<!--
        <div id="dialog" title="Comparea">
            <p>Please select two areas to compare</p>
        </div>
-->
    <div class="inner">
        <a href="#map"><i id="nav_to_map" class="fa fa-angle-double-down fa-4x" aria-hidden="true" ></i></a>
    </div>

</div>

<div id="controls" class="nicebox">
  <div>
    <select id="census-variable">
      <option selected="selected" value="mean_house_price_2015">Mean House Price</option>
      <option value="crime">Crime Level (offences per 1,000 of the population)</option>
      <option value="greenspace">Green Space (% of city)</option>
      <option value="five_good_gcses">Good Schools (% of children with 5 A*-C GCSEs)</option>
        <option value="restaurants">N. of Pubs & Restaurants (per km<sup>2</sup>)</option>
      <option value="superfast_broadband">Superfast Broadband (% of households in city)</option>
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
<div id="emailSignUp">
    <div class="container">
        <h2 id="emailPara" class="col-md-6">Want us to send you a free breakdown of the areas that best match your needs?</h2>
        <form method="post" action="/email-signup" id="emailInput" class="col-md-6">
            !{csrf_field()}!
            <div class="row" id="emailFormComps">
                <input id="emailFormCompsEmail" name="email" type="email" placeholder="Enter Your Email">
                <input id="emailFormCompsButton" type="submit" class="btn btn-primary" value="Request">
            </div>
            <div>
                <input type="checkbox" name="optOutBox" value=1>
                <sub>I don't want my details passing to any 3rd parties.</sub>
            </div>
        </form>
        @if (Session::has('status'))
            <strong>!{Session::get('status')}!</strong>
        @endif
    </div>
</div>
</div>
@stop
