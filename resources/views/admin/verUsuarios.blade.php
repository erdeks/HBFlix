@extends('layouts.index')

@section('content')
<style type="text/css">
  @media screen and (max-width: 600px) {
       table {
           width:100%;
       }
       thead {
           display: none;
       }
       tr:nth-of-type(2n) {
           background-color: inherit;
       }
       tr td:first-child {
           background: #f0f0f0;
           font-weight:bold;
           font-size:1.3em;
       }
       tbody td {
           display: block;
           text-align:center;
       }
       tbody td:before {
           content: attr(data-th);
           display: block;
           text-align:center;
       }
}
</style>
</div>
  </div>
  <!--DIV DEL MEDIO-->
    <div class="col-sm-9 col-md-9">
      <div class="panel">
        <div class="panel-heading" style="background-color: #181E1F;">
          <h3 class="panel-title" style="color: #EC67A2">Peliculas</h3>
            </div>
            <div class="panel-body" style="background-color: #282F30;">
            <p style="color:  #EC67A2;">Menú peliculas En proceso...</p>
            <div class="container" style="background-color: white; border-radius: 8px; display:block;" id="info">
              <h2>Usuarios</h2>
              <table class="table">
                <thead>
                  <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                @foreach( $arrayUsuarios as $key => $user )
                  <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->apellido}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                      <button class="btn btn-sm btn-info" onclick="mostrar()">
                        <i class="glyphicon glyphicon-zoom-in"></i>
                      </button>
                      <button class="btn btn-sm btn-warning">
                        <i class="glyphicon glyphicon-refresh"></i>
                      </button>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <div class="container" style="background-color: white; border-radius: 8px; display:none;" id="userInfo">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Firstname</th>
                      <th>Lastname</th>
                      <th>Email</th>
                      <th>Telefono</th>
                      <th>Fecha Nacimiento</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach( $arrayUsuarios as $key => $user )
                    <tr>
                      <td>{{$user->name}}</td>
                      <td>{{$user->apellido}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->telefono}}</td>
                      <td>{{$user->date}}</td>
                      <td>
                        <button class="btn btn-sm btn-info" onclick="noMostrar()">Ocultar</button>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>

              </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
function mostrar(){
  document.getElementById('userInfo').style.display = 'block';
  document.getElementById('info').style.display = 'none';
}
function noMostrar(){
  document.getElementById('userInfo').style.display = 'none';
  document.getElementById('info').style.display = 'block';
}
</script>
@endsection
