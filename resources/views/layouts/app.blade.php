<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">

<style type="text/css">
    @import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
@media(min-width:768px) {
    body {
        margin-top: 50px;
    }
    /*html, body, #wrapper, #page-wrapper {height: 100%; overflow: hidden;}*/
}

#wrapper {
    padding-left: 0;
}

#page-wrapper {
    width: 100%;
    padding: 0;
    background-color: #fff;
}

@media(min-width:768px) {
    #wrapper {
        padding-left: 225px;
    }

    #page-wrapper {
        padding: 22px 10px;
    }
}

/* Top Navigation */

.top-nav {
    padding: 0 15px;
}

.top-nav>li {
    display: inline-block;
    float: left;
}

.top-nav>li>a {
    padding-top: 20px;
    padding-bottom: 20px;
    line-height: 20px;
    color: #fff;
}

.top-nav>li>a:hover,
.top-nav>li>a:focus,
.top-nav>.open>a,
.top-nav>.open>a:hover,
.top-nav>.open>a:focus {
    color: #fff;
    background-color: #1a242f;
}

.top-nav>.open>.dropdown-menu {
    float: left;
    position: absolute;
    margin-top: 0;
    /*border: 1px solid rgba(0,0,0,.15);*/
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    background-color: #fff;
    -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
    box-shadow: 0 6px 12px rgba(0,0,0,.175);
}

.top-nav>.open>.dropdown-menu>li>a {
    white-space: normal;
}

/* Side Navigation */

@media(min-width:768px) {
    .side-nav {
        position: fixed;
        top: 60px;
        left: 225px;
        width: 225px;
        margin-left: -225px;
        border: none;
        border-radius: 0;
        border-top: 1px rgba(0,0,0,.5) solid;
        overflow-y: auto;
        background-color: #222;
        /*background-color: #5A6B7D;*/
        bottom: 0;
        overflow-x: hidden;
        padding-bottom: 40px;
    }

    .side-nav>li>a {
        width: 225px;
        border-bottom: 1px rgba(0,0,0,.3) solid;
    }

    .side-nav li a:hover,
    .side-nav li a:focus {
        outline: none;
        background-color: #1a242f !important;
    }
}

.side-nav>li>ul {
    padding: 0;
    border-bottom: 1px rgba(0,0,0,.3) solid;
}

.side-nav>li>ul>li>a {
    display: block;
    padding: 10px 15px 10px 38px;
    text-decoration: none;
    /*color: #999;*/
    color: #fff;
}

.side-nav>li>ul>li>a:hover {
    color: #fff;
}

.navbar .nav > li > a > .label {
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  position: absolute;
  top: 14px;
  right: 6px;
  font-size: 10px;
  font-weight: normal;
  min-width: 15px;
  min-height: 15px;
  line-height: 1.0em;
  text-align: center;
  padding: 2px;
}

.navbar .nav > li > a:hover > .label {
  top: 10px;
}

.navbar-brand {
    padding: 5px 15px;
}
.custom-checkbox {
  min-height: 1rem;
  padding-left: 0;
  margin-right: 0;
  cursor: pointer;
}
  .custom-checkbox .custom-control-indicator {/* color del fondo*/
    content: "";
    display: inline-block;
    position: relative;
    width: 30px;
    height: 10px;
    background-color: #818181;
    border-radius: 15px;
    margin-right: 10px;
    -webkit-transition: background .3s ease;
    transition: background .3s ease;
    vertical-align: middle;
    margin: 0 16px;
    box-shadow: none;
  }
    .custom-checkbox .custom-control-indicator:after {
      content: "";
      position: absolute;
      display: inline-block;
      width: 18px;
      height: 18px;
      background-color: #EC67A2;
      border-radius: 21px;
      box-shadow: 0 1px 3px 1px rgba(0, 0, 0, 0.4);
      left: -2px;
      top: -4px;
      -webkit-transition: left .3s ease, background .3s ease, box-shadow .1s ease;
      transition: left .3s ease, background .3s ease, box-shadow .1s ease;
    }
  .custom-checkbox .custom-control-input:checked ~ .custom-control-indicator {
    background-color: #818181;
    background-image: none;
    box-shadow: none !important;
  }
    .custom-checkbox .custom-control-input:checked ~ .custom-control-indicator:after {
      background-color: #EC67A2;
      left: 15px;
    }
  .custom-checkbox .custom-control-input:focus ~ .custom-control-indicator {
    box-shadow: none !important;
  }
  html,body{
    overflow-x: hidden;
    color:black;
    font-family:'Opens Sans',helvetica;
    height:100%;
    width:101%;
    margin: 0px;
    padding: 0px;
 }
   ::-webkit-scrollbar {
      display: none;
  }
  .logotipo{
    font-family: LOGO;
    color: #EC67A2 !important;
  }
  @font-face{
    font-family: LOGO;
    src: url('fonts/BLADRMF_.TTF');
  }
  a:link
  {
    text-decoration:none;
  }
</style>
</head>
@if(Auth::user()->subs === "1")
<body style="background-color: #181E1F;">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="padding: 5px;">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target=".navbar-ex1-collapse" >
              <span class="sr-only">Desplegar navegación</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/inicio')}}">
                <img src="{{url('images/logo.png')}}" alt="logo" style="height: 70px;margin-top: -8%">
            </a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">

        </ul>
         <div class="nav top-nav" style="text-align: center; margin-top: 1%;">
            <strong style="color: #EC67A2" class="logotipo" id="peFue">peliculas</strong>
              <label class="custom-control custom-checkbox">
                <strong style="color: #EC67A2" class="logotipo" id="peDen"></strong>
                <input type="checkbox" class="custom-control-input" id="checkid" style="display: none;" onchange="prueba()">
                <span class="custom-control-indicator"></span>
                <strong style="color: #EC67A2" class="logotipo" id="seDen">series</strong>
              </label>
            <strong style="color: #EC67A2" class="logotipo" id="seFue"></strong>
            </div>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a  data-toggle="collapse" data-target="#submenu-1" style="color: #EC67A2;text-align: center;" ><i class="glyphicon glyphicon-list-alt"></i>
                     PERFIL</a>
                </li>
                @if(Auth::user()->admin == 1)
                  <li>
                      <a href="{{url('admin/verPeliculas')}}" data-toggle="collapse" data-target="#submenu-1" style="color: #EC67A2"><i class="glyphicon glyphicon-user"></i>
                       {{ Auth::user()->name }} - Usuario administrador</a>
                  </li>
                @else
                  <li>
                      <a data-toggle="collapse" data-target="#submenu-1" style="color: #EC67A2"><i class="glyphicon glyphicon-user"></i>
                       {{ Auth::user()->name }}</a>
                  </li>
                @endif
                <li>
                    <a href="{{url('inicio/perfil')}}" data-toggle="collapse" data-target="#submenu-1" style="color: #EC67A2"><i class="glyphicon glyphicon-home"></i>
                     Ver perfil</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();" style="color:  #EC67A2">
                    <i class="glyphicon glyphicon-log-in"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
                <li>
                  <a href="investigaciones/favoritas" style="color: #EC67A2; text-align: center;"><i class="glyphicon glyphicon-film"></i> GÉNEROS</a>
                    <ul style="height:245px; width:100%; overflow:hidden; overflow-y:scroll;">
                    @foreach($arrayGenero as $key => $genero )
                      <li style=""><a href="{{url('inicio/nombre/'.$genero->nombre)}}" style="color: #EC67A2;"><i class="glyphicon glyphicon-chevron-right"></i> {{$genero->nombre}}</a></li>
                    @endforeach
                    </ul>
                </li>
                <li>
                    <a href="sugerencias" style="color: #EC67A2; text-align: center;"><i class="glyphicon glyphicon-time"></i> AÑO DE LANZAMIENTO</a>
                    <ul style="height:190px; width:100%;overflow:hidden; overflow-y:scroll;">
                    @foreach($arrayLanz as $key => $aLanza )
                      <li><a href="{{url('inicio/anyo/'.$aLanza->aLanzamiento)}}" style="color: #EC67A2;"><i class="glyphicon glyphicon-chevron-right"></i> {{$aLanza->aLanzamiento}}</a></li>
                    @endforeach
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
    <script type="text/javascript">
      function prueba(){
        var x = document.getElementById("checkid").checked;

        if(x){
          document.getElementById('peDen').innerHTML = "peliculas";
          document.getElementById('peFue').innerHTML = "";
          document.getElementById('seDen').innerHTML = "";
          document.getElementById('seFue').innerHTML = "series";
        }else{
          document.getElementById('peDen').innerHTML = "";
          document.getElementById('peFue').innerHTML = "peliculas";
          document.getElementById('seDen').innerHTML = "series";
          document.getElementById('seFue').innerHTML = "";
        }
      }
    </script>
     @yield('content')
      <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
@else
<style type="text/css">
.centrar{
  text-align: center;
  margin-top: 10%;
  width: 50%;
  margin-left: 25%;
}
</style>
<div class="panel panel-danger centrar">

  <div class="panel-heading">Tu subscripción está terminada...</div>
  <div class="panel-body" style="text-align: left;">
    <h2>Usuario:<strong> {{Auth::user()->name}}</strong></h2>
    <h3 style="text-align: center"><u>Codigo</u></h3>
    <p></p>
  </div>
  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <button type="button" class="btn btn-primary">Volver al Inicio</button></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
  </br>
    <p>  </p>
</div>


@endif
