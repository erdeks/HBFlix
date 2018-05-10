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
        width: 100%;
        height: 100%;
      }
      .btPos{
        margin-top: 2.5%;
        margin-left: 85%;
      }
      .logPos{
        float: left;
        margin-top: -5%;
        margin-left: 0.5%;
        margin-bottom: 2%;
        width: 100%;
        height: 10%;
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
      div{
        border: 1px solid white;
      }
      .menu{
        background-color: #282934;
      }
      .sub{
        height: 300px;
        overflow-y: scroll;
      }
      h5{
        color: #fa04dc;
        text-align: center;
      }
      .h5{
        color: #fa04dc;
      }
      .menu a{
        color: #ff32e6;
      }
      .container{
        margin-left: 0%;
      }
      .col-md-4{
        margin-left: 0px;
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
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <div class="logPos">
                <a href="{{ url('/inicio') }}"><img src="{{ asset('images/logo.png')}}"></a>
              </div>
              <!-- It can be fixed with bootstrap affix http://getbootstrap.com/javascript/#affix-->
              <div id="sidebar" class="well sidebar-nav menu">
                <h5><i class="glyphicon glyphicon-user"></i>
                    <small><b class="h5">Información de Usuario</b></small>
                </h5>
                <ul class="nav nav-pills nav-stacked">
                    <li><a>{{ Auth::user()->name }}</a></li>
                    <li><a href="{{ url('/inicio') }}">Home</a></li>
                    <li><a href="{{ url('inicio/perfil') }}" role="button">Ver tu Perfil</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      Logout
                    </a>
                </ul>
                <h5>
                  <b class="h5">Géneros</b>
                </h5>
                <div class="sub">
                  <ul class="nav nav-pills nav-stacked">
                    @foreach($arrayGenero as $key => $genero)
                     <li><a href="{{ url('inicio/'.$genero->nombre) }}">{{$genero->nombre}}</a></li>
                    @endforeach
                  </ul>
                </div>
                <h5>
                  <b class="h5">Año Lanzamiento</b>
                </h5>
                <div class="sub">
                  <ul class="nav nav-pills nav-stacked">
                    @foreach($arrayLanz as $key => $aLanz)
                     <li><a>{{$aLanz->aLanzamiento}}</a></li>
                    @endforeach
                  </ul>
                </div>
              </div>
          </div>


  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
  </form>
      <!--  <div class="container">
          <div class="logPos">
            <a href="{{ url('/inicio') }}"><img src="images/logo.png"></a>
          </div>
          <div class="row">
            <div class="col-sm-3 col-md-3">
              <div class="menu">
                <p>Información de Usuario</p>
                <ul>
                  <li><a>{{ Auth::user()->name }}</a></li>
                  <li><a href="{{ url('/inicio') }}">Home</a></li>
                  <li><a href="{{ url('inicio/perfil') }}" role="button"><span class="glyphicon glyphicon-user"></span>Ver tu Perfil</a></li>
                  <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                  </a>
               </ul>
               <p>Géneros</p>
               <div class="scl">
               <ul>
                 @foreach($arrayGenero as $key => $genero)
                  <li><a>{{$genero->nombre}}</a></li>
                 @endforeach
               </ul>
              </div>
              <p>Año Lanzamiento</p>
              <div class="scl">
                <ul>
                  @foreach($arrayLanz as $key => $aLanz)
                   <li><a>{{$aLanz->aLanzamiento}}</a></li>
                  @endforeach
                </ul>
              </div>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </div>
          </div>
        </div>
      </div>-->

      @endguest
@yield('content')


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
