@extends('layouts.app')
<style>
  body{
    background-color: #151515;
  }
  .infoPos{
    width: 400px;
    height: 500px;
    margin-left: 40%;
    margin-top: -30%;
    background-color: #181E1F;
    border-radius: 8px;
  }
  td{
    color: #EC67A2;
    text-align: center;
  }
  th{
    color: #EC67A2;
    text-align: center !important;
    font-size: 24px;
  }
  table{
    bor
  }
</style>
@section('content')

      <div class="infoPos">
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
@endsection
