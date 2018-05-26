@extends('layouts.app')

@section('content')
    <!--De aqui hacia abajo va en la view-->

  <div class"container" id="peliculas">
  <div class="row">
    <h1 style="color: #EC67A2;margin-top: 8%;text-align: center;font-family: LOGO;"> Estrenos</h1>
        <div id="estrenos" style="margin-left: 3%">
          @if($estrenosPeli->isNotEmpty())
            @foreach( $estrenosPeli as $key => $estreno )
                <div class="hijo" style=" float: left; padding: 3.1%;">
                  <div class="portada-p">
                    <a href="{{ url('/inicio/verPelicula/'. $estreno->id ) }}">
                      <img src="{{url('peliculas/imgPeliculas/'.$estreno->titulo)}}" alt="{{$estreno->titulo}}" style="height: 270px; border-radius: 8px;">
                    </a></br></br>
                    <a href="{ url('/inicio/verPelicula/' . $estreno->id ) }}">
                      <p style="color:  #EC67A2;"><strong>{{$estreno->titulo}}</strong></p>
                    </a>
                    <span style="color:  #EC67A2; text-align: center;">{{$estreno->aLanzamiento}}</span>
                  </div>
                </div>
          	@endforeach
          @else
            @if(Auth::user()->admin == "1")
              <h1 style="text-align: center;color:  #EC67A2;"><strong>Actualmente no hay películas de Estreno</strong></h1>
              <a href="{{url('admin/verPeliculas')}}" style="text-align: center;color:  #EC67A2;"><h3><strong>Accede para añadir pellículas</strong></h3></a>

            @else
              <h1 style="text-align: center;color:  #EC67A2;"><strong>Actualmente no hay películas de Estreno</strong></h1>
            @endif

          @endif
        </div>
    </div>
</div>
<div id="series" style="display:none;">
<div class="row">
  <!--Mostramos los ultimos estrenos de series-->
  <h1 style="color: #EC67A2;margin-top: 8%; text-align: center;font-family: LOGO;"> Estrenos</h1><a style="text-decoration:none;color:  #EC67A2;" href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ver más</a>
      <div id="estrenos" style="margin-left: 3%">
        @if($estrenosSer->isNotEmpty())
          @foreach( $estrenosSer as $key => $estreno )
              <div class="hijo" style=" float: left; padding: 3.1%;">
                <div class="portada-p">
                  <a href="#">
                    <img src="{{url('series/imgSeries/'.$estreno->titulo)}}" alt="{{$estreno->titulo}}" style="height: 270px; border-radius: 8px;">
                  </a></br></br>
                  <a href="#">
                    <p style="color:  #EC67A2;"><strong>{{$estreno->titulo}}</strong></p>
                  </a>
                  <span style="color:  #EC67A2; text-align: center;">{{$estreno->aLanzamiento}}</span>
                </div>
              </div>
            <?php $cont++ ?>
          @endforeach
        @else
          @if(Auth::user()->admin == "1")
            <h1 style="text-align: center;color:  #EC67A2;"><strong>Actualmente no hay Series de Estreno</strong></h1>
            <a href="{{url('admin/verSeries')}}" style="text-align: center;color:  #EC67A2;"><h3><strong>Accede para añadir pellículas</strong></h3></a>

          @else
            <h1 style="text-align: center;color:  #EC67A2;"><strong>Actualmente no hay Series de Estreno</strong></h1>
          @endif

        @endif
      </div>
  </div>
  <script>
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
    <!-- /#page-wrapper -->
    <!--De aqui hacia abajo va en la view-->
@endsection
