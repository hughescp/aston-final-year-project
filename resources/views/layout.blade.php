<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body>
    <header class="navbar">
        @include('includes.header')
    </header>
    @yield('content')

    <footer>
        @include('footer')
    </footer>
</body>
</html>
