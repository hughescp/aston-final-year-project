<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body ng-app="myapp" ng-controller="MainCtrl" >
    <header>
        @include('includes.header')
    </header>
    @yield('content')

    <footer>
        @include('footer')
    </footer>
</body>
</html>
