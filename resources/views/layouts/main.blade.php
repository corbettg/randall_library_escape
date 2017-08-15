<?php
$loginLINK = action('RandallAuthController@login');
$logoutLINK = action('RandallAuthController@logout');

$bootstrapCSS_LINK = url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
$bootstrapJS_LINK = url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');
$jqueryLINK = url('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js');

$momentJS_LINK = asset('/js/moment-with-locales.min.js');
$datetimepickerJS_LINK = asset('/js/bootstrap-datetimepicker.min.js');
$datetimepickerCSS_LINK = asset('/css/bootstrap-datetimepicker.min.css');
$appCSS_LINK = asset('/css/app.css');
?>

<!DOCTYPE html>
<html lang='en'>
  <head>
    <title>Randall Library Escape Room</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{$jqueryLINK}}"></script>
    <script src="{{$bootstrapJS_LINK}}"></script>
    <script src="{{$momentJS_LINK}}"></script>
    <script src="{{$datetimepickerJS_LINK}}"></script>
    <link href="{{$bootstrapCSS_LINK}}" rel="stylesheet">
    <link href="{{$datetimepickerCSS_LINK}}" rel="stylesheet" type="text/css">
    <link href="{{$appCSS_LINK}}" rel="stylesheet" type="text/css">
  </head>
  <body id="home" data-spy="scroll" data-target=".navbar" data-offset="50">
    <!-- Navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">WILLIAM MADISON RANDALL LIBRARY</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#home">HOME</a></li>
            <li><a href="#about">ABOUT</a></li>
            <li><a href="#reserve">RESERVE</a></li>
            <li><a href="#contact">CONTACT</a></li>
            <li><a href="#faqs">FAQs</a></li>
            <li><a href="#reviews">REVIEWS</a></li>
            @if (randallAuth())
              <li><a href="{{$logoutLINK}}">LOGOUT</a></li>
            @else
              <li><a href="{{$loginLINK}}">LOGIN</a></li>
            @endif
          </ul>
        </div>
      </div>
    </nav>
    <!-- Container (Body Sectopn) -->
    @yield('content')
    <!-- Footer -->
    <footer class="text-center">
      <a class="up-arrow" href="#home" data-toggle="tooltip" title="TO TOP">
        <span class="glyphicon glyphicon-chevron-up"></span>
      </a>
    </footer>
    <!-- Scripts -->
    @yield('scripts')
  </body>
</html>
