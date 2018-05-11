<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style type="text/css">
             body {
                background-color: #181E1F;
                overflow-y: scroll;
             }
             .link{
               color: #EC67A2;
             }
             .link:hover{
               color:#EC67A2;
             }
             .titulo{
               text-align: center;
               font-size: 20px;
               color: #EC67A2;
             }
             .mPos{
               position: -webkit-sticky;
               position: sticky;
               top: 0;
               left: 0;
             }
             .menu{
               background-color: #282934;
               height: 800px;
             }
             .menu a{
               color: #ff32e6;
             }
             .h5{
               color: #fa04dc;
             }
             .menu-fixed{
               position:fixed;
               z-index:1000;
               top:0;
               max-width:1000px;
               width:100%;
             }
        </style>
    <title>Panel Admin</title>
</head>
<body>
    <div class="container">
        <div class="row">
          <div class="col-sm-3 col-md-3 mPos">
            <!--MENU USUARIOS-->
              <img src="{{url('images/logo.png')}}" alt="logo" style="height: 100px; width: 200px;">
              <div id="sidebar" class="well sidebar-nav menu">
                  <h4 class="titulo">Informacion Usuarios</h4>
                  <ul class="nav nav-pills nav-stacked">
                    <li><a href="#" class="link">&nbsp;{{ Auth::user()->name }}</a></li>
                    <li><a href="{{ url('/inicio') }}" class="link">&nbsp;Home</a></li>
                    <li><a href="{{ url('inicio/perfil') }}" class="link">&nbsp;Ver Perfil</a></li>
                    <li><a href="{{ route('logout') }}" class="link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">&nbsp;Logout
                    </a></li>
                  </ul>
                  <h4 class="panel-title titulo">Generos</h4>
                  <ul class="nav nav-pills nav-stacked">
                    @foreach($arrayGenero as $key => $genero)
                     <li><a href="{{ url('inicio/'.$genero->nombre) }}" class="link">{{$genero->nombre}}</a></li>
                    @endforeach
                  </ul>
                  <h4 class="panel-title titulo">Año Lanzamiento</h4>
                  <ul class="nav nav-pills nav-stacked">
                    @foreach($arrayLanz as $key => $aLanz)
                     <li><a>{{$aLanz->aLanzamiento}}</a></li>
                    @endforeach
                  </ul>
              </div>

            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>


            @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
