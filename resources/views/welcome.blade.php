<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <title>HBFlix</title>
        <style>
          body {
                background-color: #181E1F;
                border-color: #181E1F;
             }
           #logotipo{
            font-family: STARWARS;
          }
          @font-face{
            font-family: STARWARS;
            src: url('fonts/BLADRMF_.TTF');
          }
        </style>
    </head>
    <body>
      @if (Route::has('login'))
        @auth
          <script type="text/javascript">
            window.location.href = "http://127.0.0.1:8000/inicio";
          </script>
        @else
          <nav class="navbar navbar-inverse navbar-fixed-top" style="opacity: .7;height: 90px;" role="navigation">
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
            <a class="navbar-brand" id="logotipo" href="#" style="color: #EC67A2;font-size: 70px;margin-top: 6.5%;">hbflix</a>
          </div>
         
          <!-- Agrupar los enlaces de navegación, los formularios y cualquier
               otro elemento que se pueda ocultar al minimizar la barra -->
          <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right" style="margin-right: 1%;margin-top: 1%;">
              <li><a href="{{ route('login') }}" style="color: #EC67A2;font-size: 30px;"><span class="glyphicon glyphicon-user"></span> Identificarse</a></li>
              <li class="dropdown"> 
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #EC67A2;font-size: 30px;">
                  <span class="glyphicon glyphicon-globe" ></span> ES<b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="#" style="color: #EC67A2"><span class="glyphicon glyphicon-ok" style="color: black;"> Español - ES</a></li>
                  <li><a href="#" style="color: #EC67A2"><span class="glyphicon glyphicon-remove" style="color: black;"> Catalán - CAT</a></li>
                  <li><a href="#" style="color: #EC67A2"><span class="glyphicon glyphicon-remove" style="color: black;"> Inglés - EN</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
          <style>
          .mySlides {display:none;}
          </style>
          <div class="container" style="margin-top: 7%">
            <div class="row">
              <div class="col-sm-9 col-md-6" style="float: left;">
                <div style="margin-top: 10%;color: white;">
                  <h1 class="dv-copy-title" style="font-size: 60px;">Ve películas y series</h1>
                  <div class="dv-copy-body">Con la suscripción de HBFLIX, podrás ver películas y series, además de series Prime Originals como The Grand Tour, Sneaky Pete y The Man in the High Castle. Además, disfruta por la subscripción de 1 més y gana 5 días más de subscripción.</div>
                  </br>
                  <a class="btn btn-lg" href="{{ route('register') }}" style="background-color: #EC67A2;"><strong>Registrate y empieza tu periodo de subscripción HBFLIX</strong></a></br></br>
                  <p>¿Ya eres miembro de HBFLIX? Identifícate para disfrutar de contenido ilimitado y único.</p>
                  <p>¿No eres miembro de HBFLIX? Empieza tu periodo de subscripción en HBFLIX</p>
                </div>
              </div>
                
                  <div class="col-sm-9 col-md-6" style="margin-top: 5%"">
                    <img src="{{url('images/3.jpg')}}" style="width:550px; border-radius: 5px;">
                    <!--<img class="mySlides" src="{{url('images/2.jpg')}}" style="width:500px; border-radius: 5px;">
                    <img class="mySlides" src="{{url('images/1.jpg')}}" style="width:500px; border-radius: 5px;">-->
                  </div>
          
            
           </div>
          </div>
          <script>
          var myIndex = 0;
          carousel();

          function carousel() {
              var i;
              var x = document.getElementsByClassName("mySlides");
              for (i = 0; i < x.length; i++) {
                 x[i].style.display = "none";  
              }
              myIndex++;
              if (myIndex > x.length) {myIndex = 1}    
              x[myIndex-1].style.display = "block";  
              setTimeout(carousel, 4000); // Change image every 2 seconds
          }
          </script>
      @endauth
    @endif
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
