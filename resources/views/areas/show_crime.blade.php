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
    <h2>Crime</h2>
    <h2>Crime</h2>
    <h3 class="card-title">Mean House Price 2015</h3>
    <h4>!{ $area->crime }! crimes per 100,000 of the population</h4>
    <strong>Above/Below National Average</strong>
    <p class="card-text">The number of crimes committed in this area relative to population.</p>
    <strong>Mean House Price Over Time:</strong>
    <barchart :labels="[
        'Robbery',
        'Burglary',
        'Violent & Sexual Offences'
        ]"
       :values="[
        !{$area->robbery}!,
        !{$area->burglary}!,
        !{$area->vsoffences}!]">
    </barchart>
</div>
@stop
