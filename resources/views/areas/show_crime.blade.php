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
            <a class="nav-link" href="/areas/!{$area->id}!/schools">Schools</a>
        </li>
    </ul>
    <h2>Crime</h2>
    <h3 class="card-title">2015 Crime rates</h3>
    <h4>!{ $area->crime }! offences per 1,000 of the population</h4>
    @if($area->crime > Session::get('crime_natav'))
    <p style="color:#cc0000">Above National Average</p>
    @else
    <p style="color:darkgreen">Below National Average</p>
    @endif
    <p class="card-text">The number of crimes committed in this area relative to population.</p>
    @if($area->robbery)
    @else
    <strong>Sorry, data on specific offences is not available for this area.</strong>
    @endif
    <crimebarchart :labels="[
        'Robbery',
        'Burglary',
        'Violent & Sexual Offences'
        ]"
       :values="[
        !{$area->robbery}!,
        !{$area->burglary}!,
        !{$area->vsoffences}!]">
    </crimebarchart>
</div>
@stop
