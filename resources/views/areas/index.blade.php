@extends('layout')

@section('content')
    <h1>All Areas</h1>

    @foreach ($areas as $area)
        <div>
            {{$area->name}}
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
            <h4>Overall Score:</h4>
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
