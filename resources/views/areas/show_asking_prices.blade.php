@extends('layout')

@section('content')
<div class="container">
    <a href="/areas" class="btn btn-primary">Back</a>
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
            <a class="nav-link active" href="/areas/!{$area->id}!/asking_prices">Asking Prices</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/areas/!{$area->id}!/neighbourhood">Neighbourhood</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/areas/!{$area->id}!/people">People</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/areas/!{$area->id}!/schools">Schools</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/areas/!{$area->id}!/pubtransport">Public Transport</a>
        </li>
    </ul>
        <h2>Asking Prices</h2>
        <h3 class="card-title">Mean House Price 2015</h3>
        <h4>£!{ $area->mean_house_price_2015 }!</h4>
        <strong>Above/Below National Average</strong>
        <p class="card-text">The average asking price for a property in this area.</p>
        <strong>Mean House Price Over Time:</strong>
        <linegraph id="price_over_time" :labels="[
            '2012',
            '2013',
            '2014',
            '2015'
            ]"
           :values="[
            !{$area->mean_house_price_2012}!, !{$area->mean_house_price_2013}!,
            !{$area->mean_house_price_2014}!,
            !{$area->mean_house_price_2015}!]">
        </linegraph>
</div>
@stop
