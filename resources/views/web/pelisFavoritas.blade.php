@extends('layouts.app')

@section('content')
    <!--De aqui hacia abajo va en la view-->
  <div class"container" id="peliculas">
  <div class="row">
    <h1 style="color: #EC67A2;margin-top: 5%;text-align: center;font-family: LOGO;">Favoritos</h1>
        <div id="favoritos" style="margin-left: 3%">
          @if($arrayPelicula->isNotEmpty())
            @foreach( $arrayPelicula as $key => $pelicula )
            	@if($pelicula->genero === Auth::user()->fav1 )
		    	        <div class="hijo" style=" float: left; padding: 3.1%;">
		    	          <div class="portada-p">
		    	            <a href="{{ url('/inicio/verPelicula/'. $pelicula->id ) }}">
		    	              <img src="{{url('peliculas/imgPeliculas/'.$pelicula->titulo)}}" alt="{{$pelicula->titulo}}" style="height: 270px; border-radius: 8px;">
		    	            </a></br></br>
		    	            <a href="{{ url('/inicio/verPelicula/'. $pelicula->id ) }}">
		    	              <p style="color:  #EC67A2;"><strong>{{$pelicula->titulo}}</strong></p>
		    	            </a>
		    	            <span style="color:  #EC67A2; text-align: center;">{{$pelicula->aLanzamiento}}</span>
		    	          </div>
		    	        </div>
              	@elseif($pelicula->genero === Auth::user()->fav2)
		    	        <div class="hijo" style=" float: left; padding: 3.1%;">
		    	          <div class="portada-p">
		    	            <a href="{{ url('/inicio/verPelicula/'. $pelicula->id ) }}">
		    	              <img src="{{url('peliculas/imgPeliculas/'.$pelicula->titulo)}}" alt="{{$pelicula->titulo}}" style="height: 270px; border-radius: 8px;">
		    	            </a></br></br>
		    	            <a href="{{ url('/inicio/verPelicula/'. $pelicula->id ) }}">
		    	              <p style="color:  #EC67A2;"><strong>{{$pelicula->titulo}}</strong></p>
		    	            </a>
		    	            <span style="color:  #EC67A2; text-align: center;">{{$pelicula->aLanzamiento}}</span>
		    	          </div>
		    	        </div>
              		<?php $cont++ ?>
              	@elseif($pelicula->genero === Auth::user()->fav3)
		    	        <div class="hijo" style=" float: left; padding: 3.1%;">
		    	          <div class="portada-p">
		    	            <a href="{{ url('/inicio/verPelicula/'. $pelicula->id ) }}">
		    	              <img src="{{url('peliculas/imgPeliculas/'.$pelicula->titulo)}}" alt="{{$pelicula->titulo}}" style="height: 270px; border-radius: 8px;">
		    	            </a></br></br>
		    	            <a href="{{ url('/inicio/verPelicula/'. $pelicula->id ) }}">
		    	              <p style="color:  #EC67A2;"><strong>{{$pelicula->titulo}}</strong></p>
		    	            </a>
		    	            <span style="color:  #EC67A2; text-align: center;">{{$pelicula->aLanzamiento}}</span>
		    	          </div>
		    	        </div>
              		<?php $cont++ ?>
              	@elseif($pelicula->genero === Auth::user()->fav4)
  		    	        <div class="hijo" style=" float: left; padding: 3.1%;">
  		    	          <div class="portada-p">
  		    	            <a href="{{ url('/inicio/verPelicula/'. $pelicula->id ) }}">
  		    	              <img src="{{url('peliculas/imgPeliculas/'.$pelicula->titulo)}}" alt="{{$pelicula->titulo}}" style="height: 270px; border-radius: 8px;">
  		    	            </a></br></br>
  		    	            <a href="{{ url('/inicio/verPelicula/'. $pelicula->id ) }}">
  		    	              <p style="color:  #EC67A2;"><strong>{{$pelicula->titulo}}</strong></p>
  		    	            </a>
  		    	            <span style="color:  #EC67A2; text-align: center;">{{$pelicula->aLanzamiento}}</span>
  		    	          </div>
  		    	        </div>
              	@endif
    	     @endforeach
           @else
              <h1 style="text-align: center;color:  #EC67A2;"><strong>Actualmente no tienes películas favoritas</strong></h1>
              <a href="{{url('inicio/perfil')}}" style="text-align: center;color:  #EC67A2;"><h3><strong>Accede a tu perfil para añadir favoritos</strong></h3></a>
          @endif
        </div>
    </div>
</div>
<div id="series" style="display:none;">
<div class="row">
  <!--Mostramos las series segun tus generos favoritos-->
  <h1 style="color: #EC67A2;margin-top: 5%;text-align: center;font-family: LOGO;">Favoritos</h1>
      <div id="favoritos" style="margin-left: 3%">
        @if($arraySerie->isNotEmpty())
          @foreach( $arraySerie as $key => $serie )
            @if($serie->genero === Auth::user()->fav1 )
                <div class="hijo" style=" float: left; padding: 3.1%;">
                  <div class="portada-p">
                    <a href="#">
                      <img src="{{url('series/imgSeries/'.$serie->titulo)}}" alt="{{$serie->titulo}}" style="height: 270px; border-radius: 8px;">
                    </a></br></br>
                    <a href="#">
                      <p style="color:  #EC67A2;"><strong>{{$serie->titulo}}</strong></p>
                    </a>
                    <span style="color:  #EC67A2; text-align: center;">{{$serie->aLanzamiento}}</span>
                  </div>
                </div>
                <?php $cont++ ?>
              @elseif($serie->genero === Auth::user()->fav2)
                <div class="hijo" style=" float: left; padding: 3.1%;">
                  <div class="portada-p">
                    <a href="#">
                      <img src="{{url('series/imgSeries/'.$serie->titulo)}}" alt="{{$serie->titulo}}" style="height: 270px; border-radius: 8px;">
                    </a></br></br>
                    <a href="#">
                      <p style="color:  #EC67A2;"><strong>{{$serie->titulo}}</strong></p>
                    </a>
                    <span style="color:  #EC67A2; text-align: center;">{{$serie->aLanzamiento}}</span>
                  </div>
                </div>
                <?php $cont++ ?>
              @elseif($serie->genero === Auth::user()->fav3)
                <div class="hijo" style=" float: left; padding: 3.1%;">
                  <div class="portada-p">
                    <a href="#">
                      <img src="{{url('series/imgSeries/'.$serie->titulo)}}" alt="{{$serie->titulo}}" style="height: 270px; border-radius: 8px;">
                    </a></br></br>
                    <a href="#">
                      <p style="color:  #EC67A2;"><strong>{{$serie->titulo}}</strong></p>
                    </a>
                    <span style="color:  #EC67A2; text-align: center;">{{$serie->aLanzamiento}}</span>
                  </div>
                </div>
                <?php $cont++ ?>
              @elseif($serie->genero === Auth::user()->fav4)
                  <div class="hijo" style=" float: left; padding: 3.1%;">
                    <div class="portada-p">
                      <a href="#">
                        <img src="{{url('series/imgSeries/'.$serie->titulo)}}" alt="{{$serie->titulo}}" style="height: 270px; border-radius: 8px;">
                      </a></br></br>
                      <a href="#">
                        <p style="color:  #EC67A2;"><strong>{{$serie->titulo}}</strong></p>
                      </a>
                      <span style="color:  #EC67A2; text-align: center;">{{$serie->aLanzamiento}}</span>
                    </div>
                  </div>
              @endif
         @endforeach
         @else
              <h1 style="text-align: center;color:  #EC67A2;"><strong>Actualmente no tienes Series favoritas</strong></h1>
              <a href="{{url('inicio/perfil')}}" style="text-align: center;color:  #EC67A2;"><h3><strong>Accede a tu perfil para añadir favoritos</strong></h3></a>
        @endif
      </div>
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
