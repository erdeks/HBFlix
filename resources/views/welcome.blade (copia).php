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
          .btPos{
            margin-top: 3%;
            margin-left: 80%;
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
          .button2{
            background-color: #EC67A2;
            color: white;
          }
          .button2:hover{
            background-color: #E3027A;
            color: #FC91CA;
          }
          .bienvenida{
            margin-top: 25%;
            margin-left: 5%;
            font-family: 'Comic Sans';
          }
          h3{
            color:  white;
            font-size: 50px;
            font-family: STARWARS;
          }
          @font-face{
            font-family: STARWARS;
            src: url('fonts/STARWARS.woff');
          }
          h1{
            color:  #FF00FF;
            font-size: 70px;
            font-family: STARWARS;
          }
          img{
            width: 200px;
            height: 200px;
          }

          .logPos{
            float: left;
            margin-left: 5%;
          }
        </style>
    </head>
    <body>
      @if (Route::has('login'))
        @auth
        <div class="logPos">
          <li><a href="{{ url('/inicio') }}"><img src="images/logo.png"></a></li>
        </div>
        <div class="btPos">
            <li><a href="{{ route('logout') }}" class="button button1" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout <span class="glyphicon glyphicon-log-out"></span></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
                </form>
            </li>
          </div>
        <div class="bienvenida">
          <h3>¡BIENVENIDO!</h3>
          <h1>SÉ ORIGINAL.</h1>
          <h3>DISFRUTA DONDE QUIERAS.</h3>
          <a href="{{ route('register') }}" class="button button2">Register</a>
        </div>
        @else
          <div class="logPos">
            <li><a href="{{ url('/inicio') }}"><img src="images/logo.png"></a></li>
          </div>
          <div class="btPos">
              <li><a href="{{ route('login') }}" class="button button1">Iniciar Sesion</a></li>
            </div>
          <div class="bienvenida">
            <h3>¡BIENVENIDO!</h3>
            <h1>SÉ ORIGINAL.</h1>
            <h3>DISFRUTA DONDE QUIERAS.</h3>
            <a href="{{ route('register') }}" class="button button2">Register</a>
          </div>
        @endauth

      @endif


    </body>
</html>
