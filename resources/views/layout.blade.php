<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body>
    <header>
        @include('includes.header')
    </header>
    @yield('content')

    <footer>
        @include('footer')
    </footer>
</body>
</html>
