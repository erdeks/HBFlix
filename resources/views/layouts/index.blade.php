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
                border-color: #181E1F;
             }
             body{margin:50px;}
              #accordion .glyphicon { margin-right:10px; }
              .panel-collapse>.list-group .list-group-item:first-child {border-top-right-radius: 0;border-top-left-radius: 0;}
              .panel-collapse>.list-group .list-group-item {border-width: 1px 0;}
              .panel-collapse>.list-group {margin-bottom: 0;}
              .panel-collapse .list-group-item {border-radius:0;}

              .panel-collapse .list-group .list-group {margin: 0;margin-top: 10px;}
              .panel-collapse .list-group-item li.list-group-item {margin: 0 -15px;border-top: 1px solid #ddd;border-bottom: 0;padding-left: 30px;}
              .panel-collapse .list-group-item li.list-group-item:last-child {padding-bottom: 0;}

              .panel-collapse div.list-group div.list-group{margin: 0;}
              .panel-collapse div.list-group .list-group a.list-group-item {border-top: 1px solid #ddd;border-bottom: 0;padding-left: 30px;}


        </style>
    <title>Panel Admin</title>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color: #181E1F; border-radius: 60px;">
    <div class="container">
      <!-- El logotipo y el icono que despliega el menú se agrupan
           para mostrarlos mejor en los dispositivos móviles -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target=".navbar-ex1-collapse">
          <span class="sr-only">Desplegar navegación</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/inicio') }}" style="color:  #EC67A2;">Inicio</a>
      </div>

      <!-- Agrupar los enlaces de navegación, los formularios y cualquier
           otro elemento que se pueda ocultar al minimizar la barra -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
          <li><a href="#" style="color:  #EC67A2">Enlace #2</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:  #EC67A2">
              Menú #1 <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              <li><a href="#" style="color:  #EC67A2">Acción #1</a></li>
              <li><a href="#" style="color:  #EC67A2">Acción #2</a></li>
              <li><a href="#" style="color:  #EC67A2">Acción #3</a></li>
              <li class="divider"></li>
              <li><a href="#" style="color:  #EC67A2">Acción #4</a></li>
              <li class="divider"></li>
              <li><a href="#" style="color:  #EC67A2">Acción #5</a></li>
            </ul>
          </li>
        </ul>

        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Buscar">
          </div>
          <button type="submit" class="btn btn-default">Enviar</button>
        </form>

        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:  #EC67A2">
               {{ Auth::user()->name }}<b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();" style="color:  #EC67A2">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    </nav>
    <div class="container " >
    <img src="{{url('images/logo.png')}}" alt="logo" style="height: 70px;">
          <div class="row">
            <div class="col-sm-3 col-md-3">
              <div class="panel-group" id="accordion">
              <!--MENU USUARIOS-->
                <div class="panel panel-default">
                  <div class="panel-heading" style="background-color: #181E1F;">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" style="color: #EC67A2"><span class="glyphicon glyphicon-folder-close">
                        </span>&nbsp;Users</a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse">
                    <ul class="list-group">
                      <li class="list-group-item" style="background-color: #282F30;"><span class="glyphicon glyphicon-flash text-success"></span><a href="{{ url('/admin/verUsuarios') }}" style="color: #EC67A2">&nbsp;Ver usuarios</a></li>

                      <li class="list-group-item" style="background-color: #282F30;"><span class="glyphicon glyphicon-file text-info"></span><a href="#" style="color: #EC67A2">&nbsp;Ver usuarios baneados</a></li>

                      <li class="list-group-item" style="background-color: #282F30;"> <span class="glyphicon glyphicon-comment text-success"></span><a href="#" style="color: #EC67A2">&nbsp;Ver mensajes de usuarios</a><span class="badge">42</span></li>
                    </ul>
                  </div>
                </div>
                <!--FINAL MENÚ USUARIO-->
                <!--MENU PELÍCULAS-->
                <div class="panel panel-default">
                  <div class="panel-heading" style="background-color: #181E1F;">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="color: #EC67A2"><span class="glyphicon glyphicon-folder-close">
                        </span>&nbsp;Películas</a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse">
                    <ul class="list-group" >
                      <li class="list-group-item" style="background-color: #282F30;"><span class="glyphicon glyphicon-flash text-success"></span><a href="{{ url('admin/verPeliculas') }}" style="color: #EC67A2">&nbsp;Ver Películas</a></li>

                      <li class="list-group-item" style="background-color: #282F30;"><span class="glyphicon glyphicon-file text-info"></span><a href="{{ url('admin/crearPeliculas') }}" style="color: #EC67A2">&nbsp;Crear película</a></li>
                    </ul>
                  </div>
                </div>
                <!--FINAL MENÚ PELÍCULAS-->
                <!--MENU SERIESS-->
                <div class="panel panel-default">
                  <div class="panel-heading" style="background-color: #181E1F;">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" style="color: #EC67A2"><span class="glyphicon glyphicon-folder-close">
                        </span>&nbsp;Series</a>
                    </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse">
                    <ul class="list-group">
                      <li class="list-group-item" style="background-color: #282F30;"><span class="glyphicon glyphicon-flash text-success"></span><a href="{{url('admin/verSeries')}}" style="color: #EC67A2">&nbsp;Ver Series</a></li>

                      <li class="list-group-item" style="background-color: #282F30;"><span class="glyphicon glyphicon-file text-info"></span><a href="{{url('admin/crearSeries')}}" style="color: #EC67A2">&nbsp;Crear Serie</a></li>
                    </ul>
                  </div>
                </div>
                <!--FINAL MENÚ SERIES-->
                <!--MENU GÑÉNERO-->
                <div class="panel panel-default">
                  <div class="panel-heading" style="background-color: #181E1F;">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" style="color: #EC67A2"><span class="glyphicon glyphicon-folder-close">
                        </span>&nbsp;Género</a>
                    </h4>
                  </div>
                  <div id="collapseFour" class="panel-collapse collapse">
                    <ul class="list-group">
                      <li class="list-group-item" style="background-color: #282F30;"><span class="glyphicon glyphicon-flash text-success"></span><a href="{{ url('admin/verGeneros') }}" style="color: #EC67A2">&nbsp;Ver Géneros</a></li>

                      <li class="list-group-item" style="background-color: #282F30;"><span class="glyphicon glyphicon-file text-info"></span><a href="{{url('admin/crearGeneros')}}" style="color: #EC67A2">&nbsp;Crear Género</a></li>
                    </ul>
                  </div>
                </div>
                <!--FINAL MENÚ GÉNERO-->
                <!--MENU AÑO DE LANZAMIENTO-->
                <div class="panel panel-default" >
                  <div class="panel-heading" style="background-color: #181E1F;">
                    <h4 class="panel-title" >
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive" style="color: #EC67A2"><span class="glyphicon glyphicon-folder-close" >
                        </span>&nbsp;Año de lanzamiento</a>
                    </h4>
                  </div>
                  <div id="collapseFive" class="panel-collapse collapse">
                    <ul class="list-group">
                      <li class="list-group-item" style="background-color: #282F30;"><span class="glyphicon glyphicon-flash text-success"></span><a href="{{ url('admin/verAnLan') }}" style="color: #EC67A2">&nbsp;Ver Años de lanzamiento</a></li>

                      <li class="list-group-item" style="background-color: #282F30;"><span class="glyphicon glyphicon-file text-info"></span><a href="{{ url('admin/crearAnLan') }}" style="color: #EC67A2">&nbsp;Crear Año de lanzamiento</a></li>
                    </ul>
                  </div>
                </div>

                <!--FINAL MENÚ AÑO DE LANZAMIENTO-->
                <!--Menu Codigos-->
                <div class="panel panel-default" >
                  <div class="panel-heading" style="background-color: #181E1F;">
                    <h4 class="panel-title" >
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix" style="color: #EC67A2"><span class="glyphicon glyphicon-folder-close" >
                      </span>&nbsp;Codigos</a>
                    </h4>
                  </div>
                  <div id="collapseSix" class="panel-collapse collapse">
                    <ul class="list-group">
                      <li class="list-group-item" style="background-color: #282F30;"><span class="glyphicon glyphicon-flash text-success"></span><a href="{{url('admin/verCodigos')}}" style="color: #EC67A2">&nbsp;Ver Codigos</a></li>
                      <li class="list-group-item" style="background-color: #282F30;"><span class="glyphicon glyphicon-file text-info"></span><a href="{{url('admin/crearCodigos')}}" style="color: #EC67A2">&nbsp;Crear Codigos</a></li>
                    </ul>
                  </div>
                </div>
                <!--Final menu codigos-->
         @yield('content')
 </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
