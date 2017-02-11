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
        @include('includes.footer')
    </footer>
</body>
</html>
