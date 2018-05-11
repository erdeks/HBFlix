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

       .padre{
          width: 100%;
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
            <nav class="navbar navbar-default" role="navigation" style="background-color: #282F30; border-color: #282F30">
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Buscar película...">
                    </div>
                    <button type="submit" class="btn btn-default"> <span class="glyphicon glyphicon-search"></span> </button>
                </form>
            </nav>
            <div class="container " style="background-color: #2E3637; border-radius: 8px;">
              
              <!--Aqui empieza-->
              @foreach( $arrayPelicula as $key => $pelicula )
                <div class="hijo" style="margin-top: 5%; float: left; padding: 3.1%;">
                  <a class="btn btn-sm btn-success" href="{{ url('/admin/verPeli/' . $pelicula->id ) }}" style="margin: 5px;">
                      <i class="glyphicon glyphicon-pencil"></i>
                  </a>
                  <a class="btn btn-sm btn-info" href="{{ url('/admin/verPeli/' . $pelicula->id ) }}" style="margin: 5px;">
                      <i class="glyphicon glyphicon-zoom-in"></i>
                  </a>
                  <a class="btn btn-sm btn-danger" href="{{url('/admin/eliminarPeli/'.$pelicula->id ) }}" style="margin: 5px;">
                    <i class="glyphicon glyphicon-trash "></i>
                      </a>
                  <div class="portada-p">
                    <a href="{{ url('/admin/verPeli/' . $pelicula->id ) }}">
                      <img src="{{url('peliculas/imgPeliculas/'.$pelicula->titulo)}}" alt="{{$pelicula->titulo}}" style="height: 200px; border-radius: 8px;">
                    </a></br></br>
                    <a href="{{ url('/admin/verPeli/' . $pelicula->id ) }}">
                      <p style="color:  #EC67A2;"><strong>{{$pelicula->titulo}}</strong></p>
                    </a>
                    <span style="color:  #EC67A2; text-align: center;">{{$pelicula->aLanzamiento}}</span>
                  </div>
                </div>
              @endforeach
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
