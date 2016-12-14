@extends('layout')

@section('content')
    <h1>All Areas</h1>

    @foreach ($areas as $area)
        <div>
            <h2>{{$area->name}}</h2>
            <h3>Greenspace: {{$area->greenspace*100}}%</h3>
            <h3>Housing Affordability Ratio: {{$area->housing_affordability_ratio}}</h3>
            <h3>Superfast Broadband: {{$area->superfast_broadband*100}}%</h3>
            <h3>Crime (crimes per 1000 of the population): {{$area->crime}}</h3>
            <h3>Children with 5 A*-C GCSEs {{$area->five_good_gcses*100}}%</h3>
            <h3>Pubs & Restaurants (per km^2): {{$area->restaurants}}</h3>
        </div>
    @endforeach
<div id ='title'>
    <h1>Areas</h1>
</div>
<div id = 'area grid'>
    <table>
        <tr>
            <td>
            <h3>Area Name</h3>
            <h4>Overall Score:{{AreasController::calculateOverallScore($area); }}</h4>
            <p>7.8</p>
            <table>
                <tr>
                    <td><h5>Housing Affodability Ratio:</h5></td>
                    <td></td>
                </tr>
                <tr>
                    <td><h5>Crime Level:</h5></td>
                    <td></td>
                </tr>
                <tr>
                    <td><h5>Green Space:</h5></td>
                    <td></td>
                </tr>
                <tr>
                    <td><h5>% 5 A*-C GCSEs:</h5></td>
                    <td></td>
                </tr>
                <tr>
                    <td><h5>Number of Pubs &amp; Restaraunts:</h5></td>
                    <td></td>
                </tr>
                <tr>
                    <td><h5>Transport Links:</h5></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            </td>
        </tr>
    </table>
</div>
@stop
