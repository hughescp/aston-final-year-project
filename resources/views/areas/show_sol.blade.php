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
            <a class="nav-link active" href="/areas/!{$area->id}!/sol">Standard of Living</a>
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
    <h2>Standard of Living</h2>
        <h3 class="card-title">Overall Score</h3>
        <h4>Insert rank here</h4>
        <strong>Above/Below National Average</strong>
        <p class="card-text">The average asking price for a property in this area.</p>
        <strong>Mean House Price Over Time:</strong>
        <solbarchart id="price_over_time" :labels="[
            'Income',
            'Employment',
            'Health',
            'Education',
            'Housing and services',
            'Low Crime',
            'Living environment'
            ]"
           :values="[
                !{Helpers::calculateIncomeRank($area)}!,
                !{Helpers::calculateEmploymentRank($area)}!,
                !{Helpers::calculateHealthRank($area)}!,
                !{Helpers::calculateEducationRank($area)}!,
                !{Helpers::calculateHousingServicesRank($area)}!,
                !{Helpers::calculateCrimeRank($area)}!,
                !{Helpers::calculateLivingEnvironmentRank($area)}!]">
        </solbarchart>
</div>
@stop
