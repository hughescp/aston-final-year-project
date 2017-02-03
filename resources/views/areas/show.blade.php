@extends('layout')

@section('content')
    <h1>{{ $area->name }}</h1>
    <h2>Average House Price: £{{ $area->avg_house_price }}</h2>
    <h2>Housing Affordability Ratio: {{ $area->housing_affordability_ratio }}</h2>
    <h2>Superfast Broadband: {{ $area->superfast_broadband*100 }}%</h2>
    <h2>Greenspace: {{ $area->greenspace*100 }}%</h2>
    <h2>Crime: {{ $area->crime }}</h2>
    <h2>Pupils acheiving good GCSEs: {{ $area->five_good_gcses*100 }}%</h2>
    <h2>Number of Pubs &amp Restaurants: {{ $area->restaurants }}</h2>

@stop
