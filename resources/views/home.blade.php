@extends('layouts.inicio')

@section('content')
      <div class="col-sm-3 col-md-3">
      </div>
      <div class="col-sm-9 col-md-9">
        <div class="panel">
          <div class="panel-heading" style="background-color: #181E1F;">
            <h3 class="panel-title" style="color: #EC67A2">Peliculas</h3>
          </div>
          <div class="panel-body" style="background-color: #282F30;">
          <p style="color:  #EC67A2;">
            <input type="button" value="Editar" onclick="mostrar()" class="btn btn-sm btn-success" style="margin: 5px;">
          </p>
         <!--Empieza-->
         <h1 style="color:  #EC67A2;text-align: center;"><strong>Titulo:</strong> </h1>
         </br>
         <ul>
           <li style="color:  #EC67A2;text-align: center;"><H1>Género:</H1></li>
           <li style="color:  #EC67A2;text-align: center;"><H1>Año:</H1></li>
         </ul>
         <h1 style="color:  #EC67A2;text-align: center;">Resumen</h1>
         <p style="color:  #EC67A2;text-align: center;"></p>
        </div>
      </div>
      </div>
    </div>
</div>

@endsection
