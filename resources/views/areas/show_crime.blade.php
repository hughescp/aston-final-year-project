@extends('layout')

@section('content')
    <a href="/areas" class="btn btn-primary">Back</a>
    <h1>{{ $area->name }}</h1>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="/areas/{{$area->id}}">Overview</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/areas/{{$area->id}}/sol">Standard of Living</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="/areas/{{$area->id}}/crime">Crime</a>
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
    <h2>Crime</h2>
    <div id="overview_cards"class="row">
     <div class="col-sm-12 col-md-6 col-lg-3">
        <div class="card text-center">
          <div class="card-block">
            <h3 class="card-title">Mean House Price</h3>
            <h4>£{{ $area->crime }}</h4>
            <strong>Above/Below National Average</strong>
            <p class="card-text">The average asking price for a property in this area.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
    </div>
@stop
