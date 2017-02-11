@extends('layout')

@section('content')
    <a href="/areas" class="btn btn-primary">Back</a>
    <h1>{{ $area->name }}</h1>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="#">Overview</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/areas/{{$area->id}}/sol">Standard of Living</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/areas/{{$area->id}}/crime">Crime</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/areas/{{$area->id}}/asking_prices">Asking Prices</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/areas/{{$area->id}}/neighbourhood">Neighbourhood</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/areas/{{$area->id}}/people">People</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/areas/{{$area->id}}/schools">Schools</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/areas/{{$area->id}}/pubtransport">Public Transport</a>
        </li>
    </ul>
    <h2>Overview</h2>
    <div id="overview_cards"class="row">
      <div class="col-sm-12 col-md-6 col-lg-3">
        <div class="card text-center">
          <div class="card-block">
            <h4 class="card-title">Overall Score</h4>
            <h3>{{Helpers::calculateOverallScore($area)}}</h3>
            <strong>Above/Below National Average</strong>
            <p class="card-text">This score is calculated based upon the how the area ranks based upon each of the different factors.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-3">
        <div class="card text-center">
          <div class="card-block">
            <h4 class="card-title">Mean House Price</h4>
            <h3>£{{ $area->mean_house_price_2015 }}</h3>
            <strong>Above/Below National Average</strong>
            <p class="card-text">The average asking price for a property in this area.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
        <div class="col-sm-12 col-md-6 col-lg-3">
        <div class="card text-center">
          <div class="card-block">
            <h4 class="card-title">Housing Affordability Ratio</h4>
            <h3>{{ $area->housing_affordability_ratio }}</h3>
            <strong>Above/Below National Average</strong>
            <p class="card-text">This is a ratio of house price to income. For example if the ratio is 4, then the average house price is four times greater than the average annual income.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-3">
        <div class="card text-center">
          <div class="card-block">
            <h4 class="card-title">Superfast Broadband</h4>
            <h3>{{ $area->superfast_broadband*100}}%</h3>
            <strong>Above/Below National Average</strong>
            <p class="card-text">This is the percentage of households in an area that have superfast broadband - download speeds in excess of 24 Mbps.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-3">
        <div class="card text-center">
          <div class="card-block">
            <h4 class="card-title">Greenspace</h4>
            <h3>{{ $area->greenspace*100}}%</h3>
            <strong>Above/Below National Average</strong>
            <p class="card-text">The percentage of an area covered by greenspace, which includes: natural and semi-natural habitats, paths, disused railway lines, rivers and canals, amenity grassland, parks and gardens, outdoor sports facilities, and playing fields and children's play areas.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
        <div class="card text-center">
            <div class="card-block">
                <h4 class="card-title">Crime</h4>
                <h3>{{ $area->crime }}</h3>
                <strong>Above/Below National Average</strong>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
        <div class="card text-center">
            <div class="card-block">
                <h4 class="card-title">Pupils Achieving 5A*-C GCSEs</h4>
                <h3>{{ $area->five_good_gcses*100}}%</h3>
                <strong>Above/Below National Average</strong>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
        <div class="card text-center">
            <div class="card-block">
                <h4 class="card-title">Pubs &amp Restaurants</h4>
                <h3>{{ $area->restaurants }}/km<sup>2</sup></h3>
                <strong>Above/Below National Average</strong>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</div>
@stop
