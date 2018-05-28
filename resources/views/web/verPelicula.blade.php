@extends('layouts.app')

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
  <div class="container" >
    <div class="row" style="margin-left:10%; margin-top:8%; ">
      <div class="col-sm-9 col-md-9">
        <div class="panel">
          <div class="panel-heading" style="background-color: #181E1F;">
            <h3 class="panel-title" style="color: #EC67A2">Peliculas</h3>
          </div>
          <div class="panel-body" style="background-color: #282F30;">
          <p style="color:  #EC67A2;">
            <input type="button" value="Volver atras" onclick="volverAtras()" class="btn btn-sm btn-danger" style="margin: 5px;">
          </p>
         <!--Empieza-->
         <img src="{{url('peliculas/imgPeliculas/'.$peli->titulo)}}" alt="{{$peli->titulo}}" style="height: 350px; border-radius: 8px; float: left;">
         <h1 style="color:  #EC67A2;text-align: center;">{{$peli->titulo}}</h1>
         </br>
         <p style="color:  #EC67A2; text-align:center;">{{$peli->genero}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$peli->aLanzamiento}}</p>
         <h1 style="color:  #EC67A2;text-align: center;">Sinopsis</h1>
         <p style="color:  #EC67A2;text-align: center;">{{$peli->resumen}}</p>
        </div>
      </div>
    </div>
    <div class="col-sm-9 col-md-9">
        <div class="panel-body">
          <div class="panel-group" style="background-color: #282F30;">
            <div class="panel panel-default" style="background-color: #282F30;">
              <div class="panel-heading"style="background-color: #282F30;">
      					<h4 class="panel-title" style="background-color: #282F30;">
      						<h4><a data-toggle="collapse" href="#collapse1" style="color: #EC67A2">Ver Pelicula</a></h4>
      					</h4>
      				</div>
      				<div id="collapse1" class="panel-collapse collapse" style="background-color: #282F30;">
      					<div class="panel-body" style="background-color: #282F30;">
                  <video width="400" controls>
                    <source src="{{url('peliculas/VideoPeliculas/'.$peli->titulo)}}" type="video/mp4">
                  </video>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
    </div>
  </div>
  <script type="text/javascript">
        //funcion para volver a la pagina de inicio
        function volverAtras(){
          window.location = "http://127.0.0.1:8000/inicio/";

        }
      </script>

</div>
@endsection
