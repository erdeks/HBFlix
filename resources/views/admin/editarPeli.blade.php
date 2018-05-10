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
            <p style="color:  #EC67A2;">
              <a class="btn btn-sm btn-success" href="#" style="margin: 5px;">Editar</a>
            </p>
           <!--Empieza-->
           <img src="{{url('peliculas/imgPeliculas/'.$peli->titulo)}}" alt="{{$peli->titulo}}" style="height: 350px; border-radius: 8px; float: left;">
           <h1 style="color:  #EC67A2;text-align: center;"><strong>Titulo:</strong> {{$peli->titulo}}</h1>
           </br>
           <ul>
             <li style="color:  #EC67A2;text-align: center;"><H1>Género: {{$peli->genero}}</H1></li>
             <li style="color:  #EC67A2;text-align: center;"><H1>Año: {{$peli->aLanzamiento}}</H1></li>
           </ul>
           <h1 style="color:  #EC67A2;text-align: center;">Resumen</h1>
           <p style="color:  #EC67A2;text-align: center;">{{$peli->resumen}}</p>
           <!--Acaba-->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
