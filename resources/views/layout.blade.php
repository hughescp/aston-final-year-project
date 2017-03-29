<!DOCTYPE html>
<html ng-app="myapp" lang="en">
<head>
    @include('includes.head')
</head>
<body ng-controller="MainCtrl" >
    <header>
        @include('includes.header')
    </header>
    @yield('content')

    <footer>
        @include('footer')
    </footer>
</body>
</html>
