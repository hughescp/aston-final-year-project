@extends('layout')

@section('content')
<div class="container">
    <a href="/areas" class="btn btn-primary">Back</a>
    <h1>Comparison</h1>
    <p>Hello, this is the comparison page. !{$areas}!</p>
    <table>
        <tr>
            <th>Name:</th>
            <td>!{$areas[0]->name}!</td>
            <td>!{$areas[1]->name}!</td>
        </tr>
        <tr>
            <th>Overall Score:</th>
            <td>!{$areas[0]->name}!</td>
            <td>!{$areas[1]->name}!</td>
        </tr>
        <tr>
            <th>Average House Price:</th>
            <td>!{$areas[0]->average}!</td>
            <td>!{$areas[1]->name}!</td>
        </tr>
        <tr>
            <th>Overall Score:</th>
            <td>!{Helpers::calculateOverallScore($areas[0])}!</td>
            <td>!{Helpers::calculateOverallScore($areas[1])}!</td>
        </tr>
        <tr>
            <th>Housing Affordability Ratio:</th>
            <td>!{$areas[0]->housing_affordability_ratio}!</td>
            <td>!{$areas[1]->housing_affordability_ratio}!</td>
        </tr>
        <tr>
            <th>Average House Price:</th>
            <td>£!{$areas[0]->mean_house_price_2015}!</td>
            <td>£!{$areas[1]->mean_house_price_2015}!</td>
        </tr>
        <tr>
            <th>Crime Level:</th>
            <td>!{$areas[1]->crime}!</td>
            <td>!{$areas[1]->crime}!</td>
        </tr>
        <tr>
            <th>Greenspace:</th>
            <td>!{$areas[1]->greenspace*100}!%</td>
            <td>!{$areas[1]->greenspace*100}!%</td>
        </tr>
        <tr>
            <th>Good GCSEs:</th>
            <td>!{$areas[1]->five_good_gcses*100}!%</td>
            <td>!{$areas[1]->five_good_gcses*100}!%</td>
        </tr>
        <tr>
            <th>Number of Pubs & restaurants:</th>
            <td>!{$areas[1]->restaurants}!/km<sup>2</sup></td>
            <td>!{$areas[1]->restaurants}!/km<sup>2</sup></td>
        </tr>
        <tr>
            <th>Broadband:</th>
            <td>!{$areas[1]->superfast_broadband*100}!%</td>
            <td>!{$areas[1]->superfast_broadband*100}!%</td>
        </tr>
</table>
</div>
@stop
