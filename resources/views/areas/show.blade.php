@extends('layout')

@section('content')
    <h1>{{ $area->name }}</h1>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="#">Overview</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Standard of Living</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Crime</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Asking Prices</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="#">Neighbourhood</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">People</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Schools</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Public Transport</a>
        </li>
    </ul>
    <h4>Average House Price: £{{ $area->avg_house_price }}</h4>
    <h4>Housing Affordability Ratio: {{ $area->housing_affordability_ratio }}</h4>
    <h4>Superfast Broadband: {{ $area->superfast_broadband*100 }}%</h4>
    <h4>Greenspace: {{ $area->greenspace*100 }}%</h4>
    <h4>Crime: {{ $area->crime }}</h4>
    <h4>Pupils acheiving good GCSEs: {{ $area->five_good_gcses*100 }}%</h4>
    <h4>Number of Pubs &amp Restaurants: {{ $area->restaurants }}</h4>
    @stop
