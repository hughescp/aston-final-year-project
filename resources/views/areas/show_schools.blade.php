@extends('layout')

@section('content')
 <div class="container">
   <a href="/areas" class="btn btn-primary">Back</a>
    <h1>!{ $area->name }!</h1>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="/areas/!{$area->id}!">Overview</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/areas/!{$area->id}!/sol">Standard of Living</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="/areas/!{$area->id}!/crime">Crime</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/areas/!{$area->id}!/asking_prices">Asking Prices</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/areas/!{$area->id}!/neighbourhood">Neighbourhood</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="/areas/!{$area->id}!/schools">Schools</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/areas/!{$area->id}!/pubtransport">Public Transport</a>
        </li>
    </ul>
    <h2>School</h2>
    <div id="overview_cards"class="row">
     <div class="col-sm-12 col-md-6 col-lg-3">
        <div class="card text-center">
          <div class="card-block">
            <h4 class="card-title">Pupils Achieving 5A*-C GCSEs inc. Maths & Eng</h4>
            <h3>!{ $area->five_good_gcses*100}!%</h3>
            <strong>Above/Below National Average</strong>
            <p class="card-text">The average asking price for a property in this area.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
    </div>
</div>
@stop
