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
            <a class="nav-link" href="/areas/!{$area->id}!/crime">Crime</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/areas/!{$area->id}!/asking_prices">Asking Prices</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="/areas/!{$area->id}!/neighbourhood">Neighbourhood</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/areas/!{$area->id}!/schools">Schools</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/areas/!{$area->id}!/pubtransport">Public Transport</a>
        </li>
    </ul>
    <h2>Neighbourhood</h2>
    <div id="overview_cards"class="row">
     <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="card text-center">
          <div class="card-block">
            <h3 class="card-title">Population</h3>
            <h4>!{ $area->pop2014 }!</h4>
            <strong>Above/Below National Average</strong>
            <p class="card-text">The population living in this area in 2014.</p>
            <poplinegraph :labels="[
            '1984',
            '1989',
            '1994',
            '1999',
            '2004',
            '2009',
            '2014'
            ]"
           :values="[
            !{$area->pop1984}!,
            !{$area->pop1989}!,
            !{$area->pop1994}!,
            !{$area->pop1999}!,
            !{$area->pop2004}!,
            !{$area->pop2009}!,
            !{$area->pop2014}!
            ]"></poplinegraph>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="card text-center">
          <div class="card-block">
            <h3 class="card-title">Population by Age</h3>
            <p class="card-text">A breakdown of the population of the area by age.</p>
            <agepiechart :labels="[
            '0 - 19',
            '20 - 29',
            '30 - 44',
            '45 - 64',
            '65 and over'
            ]"
           :values="[
            !{$area->age0to19}!,
            !{$area->age20to29}!,
            !{$area->age30to44}!,
            !{$area->age45to64}!,
            !{$area->age65plus}!
            ]"></agepiechart>
          </div>
        </div>
      </div>
    <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="card text-center">
          <div class="card-block">
            <h3 class="card-title">Greenspace</h3>
            <h4>!{ $area->greenspace*100}!%</h4>
            <strong>Above/Below National Average</strong>
            <p class="card-text">The percentage of an area covered in greenspace i.e. parks, grassland, trees, natural habitation etc.</p>
          </div>
        </div>
      </div>
    <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="card text-center">
          <div class="card-block">
            <h3 class="card-title">Pubs & Restaurants</h3>
            <h4>!{ $area->restaurants }!/km<sup>2</sup></h4>
            <strong>Above/Below National Average</strong>
            <p class="card-text">The total number of pubs, restaurants, and other eateries in an area, divided by the size of the area.</p>
          </div>
        </div>
      </div>
    </div>
</div>
@stop
