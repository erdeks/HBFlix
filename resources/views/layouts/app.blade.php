<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>HBFlix</title>

    <!-- Styles -->
    <style>
      img{
        width: 250px;
        height: 200px;
      }
      .btPos{
        margin-top: 2.5%;
        margin-left: 85%;
      }
      .logPos{
        float: left;
        margin-top: -4%;
        margin-left: 0.5%;
        width: 300px;
        height: 150px
      }
      .button{
        padding: 16px 32px;
        text-align: center;
        font-size: 16px;
        border-radius: 8px;
      }
      .button1{
        background-color: #EC67A2;
        color: white;
      }
      .button1:hover{
        background-color: #E3027A;
        color: #FC91CA;
      }
      body{
        background-color: #151515;;
      }

      .menu{
        width: 300px;
        height: 400px;
        margin-top: 10%;
      }
      .menu p{
        margin-top: 0px;
        padding-top: 0px;
        color: #fff;
        background: #1e262d;
        font-weight: 400;
        font-size: 20px;
        padding: 10px 0;
        border-bottom: 1px solid rgba(255,255,255,.1);
        text-align: center;
      }
      div, span, p{
        margin: 0;
        padding: 0;
        border: 0;
        outline: 0;
        font-size: 100%;
        vertical-align: baseline;
        background: 0 0;
      }
      li{
        list-style: none;
        padding: 0px;
        margin-bottom: 0px;
      }
      ul{
        padding: 0px;
        margin-bottom: 0px;
      }
      .menu ul.m1 li.selected a{
        color: #f8eeee;
        background: rgba(0,0,0,.5);
      }
      .menu ul.m1 li a:hover{
        color: #fff;
        background: rgba(0,0,0,.5);
      }
      .menu ul.m1 li a{
        color: rgba(255,255,255,.5);
        font-weight: 400;
        display: block;
        padding: 10px;
        padding-left: 5%;
        background: #1e262d;
        border-bottom: 1px solid rgba(255,255,255,.1);
      }
      .menu ul.m1 li:hover a{
        color: #fff;
      }
      a{
        text-decoration: none;
      }
      div{
        border: 1px solid white;
      }
    </style>
</head>
<body>
    <div id="app">
      @guest
          <div class="logPos">
            <a href="{{ url('/inicio') }}"><img src="images/logo.png"></a>
          </div>
          <div class="btPos">
            <a href="{{ route('register') }}" class="button button1">Register</a>
          </div>
      @else
        <div class="logPos">
          <a href="{{ url('/inicio') }}"><img src="images/logo.png"></a>
        </div>
        <div class="menu">
          <p>Información de Usuario</p>
          <ul class="m1">
            <li><a>{{ Auth::user()->name }}</a></li>
            <li><a href="{{ url('/inicio') }}">Home</a></li>
            <li><a href="{{ url('inicio/perfil') }}" role="button"><span class="glyphicon glyphicon-user"></span>Ver tu Perfil</a></li>
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Logout
            </a>
         </ul>
         <p>Géneros</p>
         <div class=>
         <ul class="m1">
           @foreach($arrayGenero as $key => $genero)
            <li><a>{{$genero->nombre}}</a></li>
           @endforeach
         </ul>
        </div>



        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
      @endguest
  </div>
@yield('content')


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
