<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
        <title>HBFlix</title>
        <style>
          body {
            background-image: url(images/fondoWelcome.jpg);
            background-position: center center;
            background-attachment: fixed;
            background-size: cover;
            background-color: black;
          }
          .navbar-default {
            background-color: transparent;
            border-color: transparent;
          }
          .navbar-default .navbar-nav > li > a {
            font-size: 17px;
            color: magenta;
          }
          .navbar-default .navbar-nav > li > a:hover {
            font-size: 17px;
            color: pink;
          }
          .bienvenida{
            margin-top: 20%;
            margin-left: 5%;
          }
          h3{
            color:  white;
            font-size: 50px;
          }
          h1{
            color:  #FF00FF;
            font-size: 70px;
          }
        </style>
    </head>
    <body>
      @if (Route::has('login'))
        @auth
        @else
          <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
              <ul class="nav navbar-nav">
                <li><a href="{{ url('/home') }}">Home</a></li>
              </ul>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('login') }}">Login</a></li>
              </ul>
            </div>
          </nav>
          <div class="bienvenida">
            <h3>¡Bienvenido!</h3>
            <h1>SÉ ORIGINAL.</h1>
            <h3>DISFRUTA DONDE QUIERAS.</h3>
            <a href="{{ route('register') }}">Register</a>
          </div>
        @endauth

      @endif


    </body>
</html>
