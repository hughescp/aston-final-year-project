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
        <li class="nav-item active">
            <a class="nav-link" href="/areas/!{$area->id}!/schools">Schools</a>
        </li>
    </ul>
    <h2>School</h2>
        <div class="overviewcard col-sm-12 col-md-6 col-lg-3">
            <div class="card text-center">
                <div class="card-block">
                    <h4 class="card-title">Pupils Achieving 5 A*-C GCSEs</h4>
                    <h3>!{ $area->five_good_gcses*100}!%</h3>
                    @if($area->five_good_gcses > Session::get('goodGCSEs_natav'))
                    <p style="color:darkgreen">Above National Average</p>
                    @else
                    <p style="color:#cc0000">Below National Average</p>
                    @endif
                    <p class="card-text">The number of pupils achieving 5 A*-C GCSEs.</p>
                </div>
            </div>
        </div>
</div>
@stop
