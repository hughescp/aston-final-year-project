@extends('layout')

@section('content')
<div class="container">
    <h1>JavaScript test page</h1>
    <p>I am trying to use this page to pass JavaScript through using the controller and making it a global variable. My aim is that I can then use this technique to pass the Area model into a JS array.</p>
    <p>{{2 + 2}}</p>
    <p>Output from scope: {{testPhrase}}</p>
    <p id="example" onmousedown="modifyParagraph()">Hello World</p>
</div>
<script type="text/javascript">
    function modifyParagraph(){
            document.getElementById("example").innerHTML = jsVars.areas[0].name;
        console.log(jsVars.areas);
    };

    var app = angular.module('myapp', []);

    app.controller('MainCtrl', ['$scope', '$window', function($scope, $jsVars) {
        $scope.areas = $jsVars.areas;
        $scope.testPhrase = "Successfully fetched data from $scope";
    }]);
</script>
@stop
