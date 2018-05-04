<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
        <title>HBFlix</title>
        <style>
          body{
            background-color: #151515;
          }
          .infoPos{
            width: 400px;
          	height: 500px;
            margin-left: 40%;
            margin-top: 5%;
            background-color: #181E1F;
            border-radius: 8px;
          }
          td{
            color: #EC67A2;
            text-align: center;
          }
          th{
            color: #EC67A2;
            text-align: center;
            font-size: 24px;
          }
        </style>
    </head>
    <body>
      <div class="logPos">
        <li><a href="{{ url('/inicio') }}">Home</a></li>
      </div>
      <div class="infoPos">
        <div>

        </div>
        <div>
          <table class="table table-user-information">
            <tr>
              <th colspan="2">Perfil</th>
            </tr>
          	<tr>
              	<td>Nombre:</td>
              	<td>{{Auth::user()->name}}</td>
              </tr>
              <tr>
              	<td>Dirección:</td>
              	<td>{{Auth::user()->apellido}}</td>
              </tr>
              <tr>
              	<td>Fecha de nacimiento:</td>
              	<td>{{Auth::user()->date}}</td>
              </tr>
            	<tr>
              	<td>Email</td>
              	<td><a href="mailto:{{Auth::user()->email}}">{{Auth::user()->email}}</a></td>
              </tr>
              <!--<tr>
              	<td>Numero de telefono:</td>
              	<td>{{Auth::user()->telefono}}</td>
              </tr>-->
            	<tr>
              	<td>Fecha de creación:</td>
              	<td>{{Auth::user()->created_at}}</td>
            	</tr>
        	</table>
        </div>
      </div>
    </body>
</html>
