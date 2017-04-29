@extends('layout')

@section('content')
<div class="container">
    <a href="/areas" class="btn btn-primary">Back</a>
    <h1>!{ $area->name }!</h1>
    <ul id = "navbar" class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="/areas/!{$area->id}!">Overview</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/areas/!{$area->id}!/sol">Standard of Living</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/areas/!{$area->id}!/crime">Crime</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/areas/!{$area->id}!/asking_prices">Asking Prices</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/areas/!{$area->id}!/neighbourhood">Neighbourhood</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/areas/!{$area->id}!/schools">Schools</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/areas/!{$area->id}!/pubtransport">Public Transport</a>
        </li>
    </ul>
    <h2>Overview</h2>
    <div id="overview_cards"class="row">
      <div class="overviewcard col-sm-12 col-md-6 col-lg-3">
        <div class="card text-center">
          <div class="card-block">
            <h4 class="card-title">Overall Score</h4>
            <h3>!{Helpers::calculateOverallScore($area)}!</h3>
            <p class="card-text">This score is calculated based upon the how the area ranks based upon each of the different factors.</p>
          </div>
        </div>
      </div>
      <div class="overviewcard col-sm-12 col-md-6 col-lg-3">
        <div class="card text-center">
          <div class="card-block">
            <h4 class="card-title">Mean House Price</h4>
            <h3>£!{ $area->mean_house_price_2015 }!</h3>
            @if($area->mean_house_price_2015 > Session::get('house_price_natav'))
            <p style="color:#cc0000">Above National Average</p>
            @else
            <p style="color:darkgreen">Below National Average</p>
            @endif
            <p class="card-text">The average asking price for a property in this area.</p>
          </div>
        </div>
          </div>
            <div class="overviewcard col-sm-12 col-md-6 col-lg-3">
            <div class="card text-center">
              <div class="card-block">
                <h4 class="card-title">Housing Affordability Ratio</h4>
                <h3>!{ $area->housing_affordability_ratio }!</h3>
                @if($area->housing_affordability_ratio > Session::get('har_natav'))
                <p style="color:#cc0000">Above National Average</p>
                @else
                <p style="color:darkgreen">Below National Average</p>
                @endif
                <p class="card-text">The ratio of house price to income. Ex. if the ratio is 4, then the average house price is 4x the average annual income.</p>
              </div>
            </div>
          </div>
          <div class="overviewcard col-sm-12 col-md-6 col-lg-3">
            <div class="card text-center">
              <div class="card-block">
                <h4 class="card-title">Superfast Broadband</h4>
                <h3>!{ $area->superfast_broadband*100}!%</h3>
                @if($area->superfast_broadband > Session::get('broadband_natav'))
                <p style="color:darkgreen">Above National Average</p>
                @else
                <p style="color:#cc0000">Below National Average</p>
                @endif
                <p class="card-text">This is the percentage of households in an area that have superfast broadband - download speeds in excess of 24 Mbps.</p>
              </div>
            </div>
          </div>
          <div class="overviewcard col-sm-12 col-md-6 col-lg-3">
            <div class="card text-center">
              <div class="card-block">
                <h4 class="card-title">Green space</h4>
                <h3>!{ $area->greenspace*100}!%</h3>
                @if($area->greenspace > Session::get('greenspace_natav'))
                <p style="color:darkgreen">Above National Average</p>
                @else
                <p style="color:#cc0000">Below National Average</p>
                @endif
                <p class="card-text">Greenspace includes: natural habitats, paths, waterways, parks and gardens, outdoor sports facilities, playing fields and children's play areas.</p>
              </div>
            </div>
          </div>
        <div class="overviewcard col-sm-12 col-md-6 col-lg-3">
            <div class="card text-center">
                <div class="card-block">
                    <h4 class="card-title">Crime</h4>
                    <h3>!{ $area->crime }!</h3>
                    @if($area->crime > Session::get('crime_natav'))
                    <p style="color:#cc0000">Above National Average</p>
                    @else
                    <p style="color:darkgreen">Below National Average</p>
                    @endif
                    <p class="card-text">The number of crimes committed per 1000 of the population.</p>
                </div>
            </div>
        </div>
        <div class="overviewcard col-sm-12 col-md-6 col-lg-3">
            <div class="card text-center">
                <div class="card-block">
                    <h4 class="card-title">Pupils Achieving 5 A*-C GCSEs</h4>
                    <h3>!{ $area->five_good_gcses*100}!%</h3>
                    @if($area->five_good_gcses > Session::get('goodGCSEs_natav'))
                    <p style="color:darkgreen">Above National Average</p>
                    @else
                    <p style="color:#cc0000">Below National Average</p>
                    @endif
                    <p class="card-text">The number of pupils achieving 5 A*-C GCSEs.</p>
                </div>
            </div>
        </div>
        <div class="overviewcard col-sm-12 col-md-6 col-lg-3">
            <div class="card text-center">
                <div class="card-block">
                    <h4 class="card-title">Pubs &amp Restaurants</h4>
                    <h3>!{ $area->restaurants }!/km<sup>2</sup></h3>
                    @if($area->restaurants > Session::get('restaurants_natav'))
                    <p style="color:darkgreen">Above National Average</p>
                    @else
                    <p style="color:#cc0000">Below National Average</p>
                    @endif
                    <p class="card-text">The number of pubs, restaurants, or other eatieries per square km of an city.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
