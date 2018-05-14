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
        #logotipo{
         font-family: STARWARS;
         color: #EC67A2 !important;
         font-size: 70px;
         margin-top: 6%;
       }
       @font-face{
         font-family: STARWARS;
         src: url('fonts/BLADRMF_.TTF');
       }
        .container{
          margin-top: 10%;
        }
        body{
          background-color: #181E1F;
          border-color: #181E1F;
        }
        h4{
          color: white;
          margin-left: 7%;
        }
        h3{
          color: white;
          margin-left: 7%;
        }
        i{
          color: #EC67A2;
        }
        .publi{
          width: 70%;
          margin-left: 20%;
        }
        img{
          margin-left: auto;
          margin-right: auto;
          display: block;
        }
        h1{
          color: white;
          text-align: center;
          font-size: 400%
        }
        .log{
          width: 70%;
          margin-left: 10%;
          margin-top: 10%;
        }
        .check{
          color: white;
          display: block;
          position: relative;
          padding-left: 35px;
          margin-bottom: 12px;
          cursor: pointer;
          font-size: 22px;
          -webkit-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
          user-select: none;
        }
        .check input {
          position: absolute;
          opacity: 0;
          cursor: pointer;
        }
        .checkmark {
          position: absolute;
          top: 0;
          left: 0;
          border-radius: 8px;
          height: 25px;
          width: 25px;
          background-color: #eee;
        }
        .check:hover input ~ .checkmark {
          background-color: #ccc;
        }
        .check input:checked ~ .checkmark {
          background-color: #EC67A2;
        }
        .checkmark:after {
          content: "";
          position: absolute;
          display: none;
        }
        .check input:checked ~ .checkmark:after {
          display: block;
        }
        .check .checkmark:after {
          left: 9px;
          top: 5px;
          width: 5px;
          height: 10px;
          border: solid white;
          border-width: 0 3px 3px 0;
          -webkit-transform: rotate(45deg);
          -ms-transform: rotate(45deg);
          transform: rotate(45deg);
        }
        label{
          color: white;
        }
        </style>

    </head>
    <body>
      <nav class="navbar navbar-inverse navbar-fixed-top" style="opacity: .7;height: 90px;" role="navigation">
        <div class="navbar-header">
          <a class="navbar-brand" id="logotipo" href="{{url('/inicio')}}">hbflix</a>
        </div>
      </nav>
      <div class="container">

        <div class="row">
          <h1>Iniciar sesión</h1>
          <div class="col-sm-6 col-md-6">
            <div class="publi">
              <img src="images/imagen_login.png">
              <br><br><h4>Suscríbete a HBFlix y disfruta de tus series
                y peliculas favoritas.</h4><br>
              <h3><i class="glyphicon glyphicon-ok"></i>&nbsp;Sólo 7,99€ al mes</h3><br>
              <h3><i class="glyphicon glyphicon-ok"></i>&nbsp;Sin Compromiso: cancela
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;cuando quieras</h3><br>
              <h3><i class="glyphicon glyphicon-ok"></i>&nbsp;Todas las temporadas.<br>
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Todos los episodios.</h3>
            </div>
          </div>
          <div class="col-sm-6 col-md-6">
            <div class="log">
              <form class="form-horizontal" method="POST" action="{{ route('login') }}" style="margin-top: 5%; margin-left: 5%;">
                  {{ csrf_field() }}
                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Correo Electronico:</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label">Contraseña:</label>
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div >
                      <label class="check"> Recuerdame
                          <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                          <span class="checkmark"></span>
                      </label>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-lg" style="background-color: #EC67A2; color: white;">
                          Login
                    </button>
                    <a class="btn btn-lg" href="{{ route('register') }}" style="background-color: #EC67A2; color: white; margin-left: 20%;">Registrate</a>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </body>
  </html>
