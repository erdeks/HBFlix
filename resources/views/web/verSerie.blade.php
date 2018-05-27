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
    <div class="row" style="margin-left:15%; margin-top:8%; ">
    <div class="col-sm-9 col-md-9" id='divInfo' style="display: block;">
      <div class="panel">
        <div class="panel-heading" style="background-color: #181E1F;">
          <h3 class="panel-title" style="color: #EC67A2">Series</h3>
        </div>
        <div class="panel-body" style="background-color: #282F30;">
        <p style="color:  #EC67A2;">
          <input type="button" value="Volver atras" onclick="volverAtras()" class="btn btn-sm btn-danger" style="margin: 5px;">

        </p>
       <!--Empieza-->
       <img src="{{url('series/imgSeries/'.$series->titulo)}}" alt="{{$series->titulo}}" style="height: 350px; border-radius: 8px; float: left;">
       <h1 style="color:  #EC67A2;text-align: center;"><strong>Titulo:</strong> {{$series->titulo}}</h1>
       </br>
       <p style="color:  #EC67A2; text-align:center;">{{$series->genero}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$series->aLanzamiento}}</p>
       <h1 style="color:  #EC67A2;text-align: center;">Sinopsis</h1>
       <p style="color:  #EC67A2;text-align: center;">{{$series->resumen}}</p>
      </div>
    </div>
    <div class="panel">
      <div class="panel-heading" style="background-color: #181E1F;">
        <h3 class="panel-title" style="color: #EC67A2">Capitulos</h3>
      </div>
      <div class="panel-body" style="background-color: #282F30;">
        <div class="panel-group" style="background-color: #282F30;">
          <div class="panel panel-default" style="background-color: #282F30;">

            @foreach ( $temporadas as $key => $temp )
              @if($series->id == $temp->idMultimedia)
            <div class="panel-heading"style="background-color: #282F30;">
    					<h4 class="panel-title" style="background-color: #282F30;">
    						<h4><a data-toggle="collapse" href="#collapse{{$key}}" style="color: #EC67A2">Temporada {{$temp->temporada}}</a></h4>
    					</h4>
    				</div>
    				<div id="collapse{{$key}}" class="panel-collapse collapse" style="background-color: #282F30;">
    					<div class="panel-body" style="background-color: #282F30;">
                @foreach ( $arrayEpisodios as $epi => $ep )
                  @if($temp->id == $ep->idTemporada)
                  <ul>
                    <li style="color: #EC67A2"><a href="#coll{{$epi}}" data-toggle="collapse" style="color: #EC67A2"> Episodio{{$ep->orden}}: {{$ep->titulo}}
                      <video width="400" controls id="coll{{$epi}}" class="collapse">
                        <source src="{{url('series/VideoSeries/'.$series->titulo.'_'.$ep->titulo)}}" type="video/mp4">
                      </video>
                    </li>
                  </ul>

                  @endif
                @endforeach
              </div>
            </div>
              @endif
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>

    </div>
  </div>
  <script type="text/javascript">
        function volverAtras(){
          window.location = "http://127.0.0.1:8000/admin/verSeries";

        }
      </script>

</div>
@endsection
