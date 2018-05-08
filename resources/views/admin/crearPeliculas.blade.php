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
       .form-area{
          background-color: #FAFAFA;
          margin-left: 50%;
          padding: 10px 40px 60px;
          margin: 10px 0px 60px;
          border: 1px solid GREY;
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
          <div class="row" style="margin-top:20px">
          @if(Session::has('flash_message'))
             <div class="alert alert-success alert-dismissable col-md-offset-3 col-md-6">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
               <strong> ¡Bien!</strong> {{Session::get('flash_message')}}
            </div>
          @endif
    <div class="col-md-offset-3 col-md-6" style="float: left;">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title text-center">
                    <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
                    Añadir Pelicula
                </h3>
            </div>

            <div class="panel-body">
            
                <form action="{{ url('admin/crearPeliculas') }}" method="POST" enctype="multipart/form-data">
                
                    {{ csrf_field() }}
    
                    <div class="form-group">
                        <!--Nombre usuario-->
                        <label>Titulo de la Película:</label>
                        <input type="text" name="titulo" value="" id="titulo" class="form-control">
                        
                        <label for="titulo">Imágen de la Película: </label>
                        <!-- -->
                        <input type="file" name="imgPeli" id="imgPeli" class="form-control">

                        <label for="titulo">Película: </label>
                        <!-- -->
                        <input type="file" name="peli" id="peli" class="form-control">

                        <label for="texto">Resúmen de la película: </label>
                        <!-- -->
                        <textarea id="resumen" name="resumen" cols="44" class="form-control" required></textarea></br>

                        <label for="texto">Género: </label>
                        <select id="genero" name="genero" >
                            @foreach( $arrayGenero as $key => $genero )
                                <option value="{{$genero->nombre}}">{{$genero->nombre}}</option>
                            @endforeach
                        </select></br></br>

                        <label for="texto">Año de lanzamiento: </label>
                        <select id="anyo" name="anyo" >
                          @foreach( $arrayAn as $key => $anyo )
                                <option value="{{$anyo->aLanzamiento}}">{{$anyo->aLanzamiento}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">
                            Añadir Película
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
        <!--Final-->
      </div>
    </div>
  </div>
</div>
@endsection
