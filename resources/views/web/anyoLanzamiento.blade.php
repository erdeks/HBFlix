@extends('layouts.app')


@section('content')
<div id="peliculas">
<div class="row">
    <div id="peliculas" style="margin-left: 5%; margin-top:5%;">
      @foreach($arrayPelis as $key=>$peli)
        <div class="hijo" style=" float: left; padding: 3.1%;">
            <div class="portada-p">
              <a href="{{ url('/inicio/verPelicula/'. $peli->id ) }}">
                <img src="{{url('peliculas/imgPeliculas/'.$peli->titulo)}}" alt="{{$peli->titulo}}" style="height: 270px; border-radius: 8px;">
              </a></br></br>
              <a href="{{ url('/inicio/verPelicula/'. $peli->id ) }}">
                <p style="color:  #EC67A2;"><strong>{{$peli->titulo}}</strong></p>
              </a>
              <span style="color:  #EC67A2; text-align: center;">{{$peli->genero}}</span>
            </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
<div id="series" style="display:none;"
  <div class="row">
      <div id="series" style="margin-left: 5%; margin-top:5%;">
        @foreach($arraySeries as $key=>$serie)
          <div class="hijo" style=" float: left; padding: 3.1%;">
              <div class="portada-p">
                <a href="{{url('/inicio/verSerie/'.$serie->id)}}">
                  <img src="{{url('series/imgSeries/'.$serie->titulo)}}" alt="{{$serie->titulo}}" style="height: 270px; border-radius: 8px;">
                </a></br></br>
                <a href="{{url('/inicio/verSerie/'.$serie->id)}}">
                  <p style="color:  #EC67A2;"><strong>{{$serie->titulo}}</strong></p>
                </a>
                <span style="color:  #EC67A2; text-align: center;">{{$serie->genero}}</span>
              </div>
          </div>
        @endforeach
      </div>
    </div>
 </div>
</div><!--container-->
<script>
    //funcion que alterna el selector entre series y peliculas
    document.addEventListener('DOMContentLoaded', function () {
    var checkbox = document.querySelector('input[type="checkbox"]');

      checkbox.addEventListener('change', function () {

          if (checkbox.checked) {
            document.getElementById('peliculas').style.display = 'none';
            document.getElementById('series').style.display = 'block';
          } else {
            document.getElementById('peliculas').style.display = 'block';
            document.getElementById('series').style.display = 'none';
          }


      });
    });

</script>
@endsection
