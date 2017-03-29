@extends('layout')

@section('content')
<div class="container">
    <h1>JavaScript test page</h1>
    <p>I am trying to use this page to pass JavaScript through using the controller and making it a global variable. My aim is that I can then use this technique to pass the Area model into a JS array.</p>

    <p>This is to prove that angular is working. 2 + 2 = {{2 + 2}}</p>
    <form name="myForm">
        <label for="singleSelect"> Single select: </label><br>
        <select name="singleSelect" ng-model="data.singleSelect">
            <option value="option-1">Option 1</option>
            <option value="option-2">Option 2</option>
        </select><br>

        <tt>singleSelect = {{data.singleSelect}}</tt>
    </form>
</div>
@stop
