<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comparea</title>
    <link rel="shortcut icon" href="img/comparea_shortcut_logo.png" type="image/png">
    <link rel="stylesheet" href="/css/app.css">
    <!-- Links for JQuery UI components -->
    <link rel="stylesheet" href="jquery-ui.min.css">
    <script src="external/jquery/jquery.js"></script>
    <script src="jquery-ui.min.js"></script>
    <!-- code copied for draggable -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
<header>
    <div class="container">
      <img src="img/comparea_logo[white].png" id="logo">
    </div>
</header>
    @yield('content')

    @yield('footer')
<header>
<div class="container">
    <h5>&copyComparea Developed by Chris Hughes for Aston University. All rights reserved.</h5>
</div>
</header>

    <script src="/js/Chart.min.js"></script>
    <script src="/js/main.js"></script>

</body>
</html>
