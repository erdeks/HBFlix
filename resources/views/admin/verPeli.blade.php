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
    <div class="col-sm-9 col-md-9" id='divInfo' style="display: block;">
      <div class="panel">
        <div class="panel-heading" style="background-color: #181E1F;">
          <h3 class="panel-title" style="color: #EC67A2">Peliculas</h3>
        </div>
        <div class="panel-body" style="background-color: #282F30;">
        <p style="color:  #EC67A2;">
          <input type="button" value="Editar" onclick="mostrar()" class="btn btn-sm btn-success" style="margin: 5px;">
          <input type="button" value="Volver atras" onclick="volverAtras()" class="btn btn-sm btn-danger" style="margin: 5px;">
        </p>
       <!--Empieza-->
       <img src="{{url('peliculas/imgPeliculas/'.$peli->titulo)}}" alt="{{$peli->titulo}}" style="height: 350px; border-radius: 8px; float: left;">
       <h1 style="color:  #EC67A2;text-align: center;"><strong>Titulo:</strong> {{$peli->titulo}}</h1>
       </br>
       <ul>
         <li style="color:  #EC67A2;text-align: center; list-style:none;"><H1>Género: {{$peli->genero}}</H1></li>
         <li style="color:  #EC67A2;text-align: center; list-style:none;"><H1>Año: {{$peli->aLanzamiento}}</H1></li>
       </ul>
       <h1 style="color:  #EC67A2;text-align: center;">Resumen</h1>
       <p style="color:  #EC67A2;text-align: center;">{{$peli->resumen}}</p>
      </div>
    </div>
  </div>
    <!--Acaba-->
    <!--DIV DEL MEDIO-->
    <div class="col-sm-9 col-md-9" id='divEdit' style="display: none;">
      <div class="panel">
        <div class="panel-heading" style="background-color: #181E1F;">
          <h3 class="panel-title" style="color: #EC67A2">Editar</h3>
        </div>
        <div class="panel-body" style="background-color: #282F30;">
        <p style="color:  #EC67A2;">
          <input type="button" value="Volver atras" onclick="noMostrar()" class="btn btn-sm btn-danger" style="margin: 5px;">
        </p>
       <!--Empieza-->
      <form action="{{ url('admin/editarPeli') }}" method="POST" enctype="multipart/form-data">

        {{ csrf_field() }}

        <div class="form-group">
            <!--Nombre usuario-->
            <input type="hidden" name="idPeli" value="{{$peli->id}}">
            <label style="color: #EC67A2">Titulo de la Película:</label>
            <input type="text" name="titulo" id="titulo" class="form-control" required>

            <label for="titulo" style="color: #EC67A2">Imágen de la Película: </label>
            <!-- -->
            <input type="file" name="imgPeli" id="imgPeli" class="form-control" required>

            <label for="titulo" style="color: #EC67A2">Película: </label>
            <!-- -->
            <input type="file" name="peli" id="peli" class="form-control">

            <label for="texto" style="color: #EC67A2">Resúmen de la película: </label>
            <!-- -->
            <textarea id="resumen" name="resumen" cols="44" class="form-control" required style="height: 150px"></textarea></br>

            <label for="texto" style="color: #EC67A2">Género actual: </label>

            <select id="genero" name="genero" class="form-control" style="width:83px" required>
              <option value="{{$peli->genero}}">{{$peli->genero}}</option>
                @foreach( $arrayGenero as $key => $genero )
                  @if($genero->nombre == $peli->genero)

                  @else
                     <option value="{{$genero->nombre}}">{{$genero->nombre}}</option>
                  @endif
                @endforeach
            </select>
            </div>

            <label for="texto" style="color: #EC67A2; ">Año de lanzamiento: </label>
            <select id="anyo" name="anyo" class="form-control" style="width:83px" required>
             <option value="{{$peli->aLanzamiento}}">{{$peli->aLanzamiento}}</option>
              @foreach( $arrayAn as $key => $anyo )
                @if($anyo->aLanzamiento == $peli->aLanzamiento)

                @else
                    <option value="{{$anyo->aLanzamiento}}">{{$anyo->aLanzamiento}}</option>
                @endif
                @endforeach
            </select>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">
                Editar Película
            </button>
        </div>
    </form>
<!--Acaba-->
    </div>
  </div>
  <script type="text/javascript">
        function mostrar(){
          document.getElementById('divInfo').style.display = 'none';
          document.getElementById('divEdit').style.display = 'block';
          document.getElementById('titulo').value = "{{$peli->titulo}}";
          document.getElementById('resumen').value = "{{$peli->resumen}}";
          document.getElementById('gActual').value = "{{$peli->genero}}";
        }

        function noMostrar(){
          if(confirm("Al pulsar sobre 'Volver atras' todos los cambios efectuados no se guardarán.") == true){
              document.getElementById('divInfo').style.display = 'block';
              document.getElementById('divEdit').style.display = 'none';
          }else{
              document.getElementById('divInfo').style.display = 'none';
              document.getElementById('divEdit').style.display = 'block';
          }
        }

        function volverAtras(){
          window.location = "http://127.0.0.1:8000/admin/verPeliculas";

        }
      </script>

</div>
@endsection
