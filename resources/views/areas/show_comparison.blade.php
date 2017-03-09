@extends('layout')

@section('content')
<div class="container">
    <a href="/areas" class="btn btn-primary">Back</a>
    <h1>Comparison</h1>
    <table id="comparison_table">
        <tr class="comp_row">
            <th>Name:</th>
            @foreach ($areas as $area)
            <td class="comp_column"><h2>!{$area->name}!</h2></td>
            @endforeach
        </tr>
        <tr class="comp_row">
            <td><h5>Overall Score:</h5></td>
            @foreach ($areas as $area)
            <td class="comp_column">!{Helpers::calculateOverallScore($area)}!</td>
            @endforeach
        </tr>
        <tr class="comp_row">
            <td><h5>Housing Affordability Ratio:</h5>
            <p>Ratio of average income to average house price</p>
            </td>
            @foreach ($areas as $area)
            <td class="comp_column">!{$area->housing_affordability_ratio}!</td>
            @endforeach
        </tr>
        <tr class="comp_row">
            <td><h5>Average House Price (2015):</h5></td>
            @foreach ($areas as $area)
            <td class="comp_column">£!{$area->mean_house_price_2015}!</td>
            @endforeach
        </tr>
        <tr class="comp_row">
            <td><h5>Crime Level:</h5>
            <p>Number of crimes committed per 1000 of the population</p>
            </td>
            @foreach ($areas as $area)
            <td class="comp_column">!{$area->crime}!</td>
            @endforeach
        </tr>
        <tr class="comp_row">
            <td><h5>Greenspace:</h5><p>(Natural habitats, paths, waterways, parks, gardens, outdoor sports facilities, playing fields and children's play areas)</p></td>
            @foreach ($areas as $area)
            <td class="comp_column">!{$area->greenspace*100}!%</td>
            @endforeach
        </tr>
        <tr class="comp_row">
            <td><h5>Good GCSEs:</h5><p>Percentage of pupils achieving 5 A*-C GCSEs</p></td>
            @foreach ($areas as $area)
            <td class="comp_column">!{$area->five_good_gcses*100}!%</td>
            @endforeach
        </tr>
        <tr class="comp_row">
            <td><h5>Number of Pubs & restaurants:</h5><p>(pubs, restauraunts, fast food outlets, and other eateries per square kilometer)</p></td>
            @foreach ($areas as $area)
            <td class="comp_column">!{$area->restaurants}!/km<sup>2</sup></td>
            @endforeach
        </tr>
        <tr class="comp_row">
            <td><h5>Superfast Broadband:</h5><p>% of households that have download speeds in excess of 24 Mbps.</p></td>
            @foreach ($areas as $area)
            <td class="comp_column">!{$area->superfast_broadband*100}!%</td>
            @endforeach
        </tr>
    </table>
    <br/>
    <h5>Mean House Price Over Time:</h5>
    <comparepricelinegraph id="price_over_time" :labels="[
        '2012',
        '2013',
        '2014',
        '2015'
        ]"
        area1="!{$areas[0]->name}!"
        area2="!{$areas[1]->name}!"
       :values1="[
        !{$areas[0]->mean_house_price_2012}!,
        !{$areas[0]->mean_house_price_2013}!,
        !{$areas[0]->mean_house_price_2014}!,
        !{$areas[0]->mean_house_price_2015}!]"
      :values2="[
        !{$areas[1]->mean_house_price_2012}!,
        !{$areas[1]->mean_house_price_2013}!,
        !{$areas[1]->mean_house_price_2014}!,
        !{$areas[1]->mean_house_price_2015}!]"
    >
    </comparepricelinegraph>
    <h5>Population Over Time</h5>
    <comparepoplinegraph :labels="[
        '1984',
        '1989',
        '1994',
        '1999',
        '2004',
        '2009',
        '2014'
        ]"
        area1="!{$areas[0]->name}!"
        area2="!{$areas[1]->name}!"
       :values1="[
        !{$areas[0]->pop1984}!,
        !{$areas[0]->pop1989}!,
        !{$areas[0]->pop1994}!,
        !{$areas[0]->pop1999}!,
        !{$areas[0]->pop2004}!,
        !{$areas[0]->pop2009}!,
        !{$areas[0]->pop2014}!]"
      :values2="[
        !{$areas[1]->pop1984}!,
        !{$areas[1]->pop1989}!,
        !{$areas[1]->pop1994}!,
        !{$areas[1]->pop1999}!,
        !{$areas[1]->pop2004}!,
        !{$areas[1]->pop2009}!,
        !{$areas[1]->pop2014}!]">
    </comparepoplinegraph>
<!--
    <div class="container">
        <h5>Age of Population</h5>
        <h6>!{$areas[0]->name}!</h6>
        <agepiechart class="compagecharts" style="float:left" :labels="[
            '0 - 19',
            '20 - 29',
            '30 - 44',
            '45 - 64',
            '65 and over'
            ]"
           :values="[
            !{$areas[0]->age0to19}!,
            !{$areas[0]->age20to29}!,
            !{$areas[0]->age30to44}!,
            !{$areas[0]->age45to64}!,
            !{$areas[0]->age65plus}!
            ]">
        </agepiechart>
        <h6>!{$areas[1]->name}!</h6>
        <agepiechart class="compagecharts" style="float:right" :labels="[
            '0 - 19',
            '20 - 29',
            '30 - 44',
            '45 - 64',
            '65 and over'
            ]"
           :values="[
            !{$areas[1]->age0to19}!,
            !{$areas[1]->age20to29}!,
            !{$areas[1]->age30to44}!,
            !{$areas[1]->age45to64}!,
            !{$areas[1]->age65plus}!
            ]">
        </agepiechart>
    </div>
-->
</div>
@stop
