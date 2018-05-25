@extends('layouts.app')

@section('content')
    <!--De aqui hacia abajo va en la view-->
@if($anyo == "1")


@elseif($anyo == "2")
  <div class="container">
  <div class="row">
     @if (session()->has('flash_notification.success')) 
        <script>location.reload();
                alert("tu subscripción ha caducado");

        </script>
     @endif
  </div>
@else
  <div class="container">
  <div class="row">
     @if (session()->has('flash_notification.success')) 
        <script>alert("¡Cuidado! Tu subscripción acaba {{Auth::user()->subFinal}}, te quedan {{$xyz}} dias una vez acabada la subscripción no tendrás acceso a HBFLIX");</script>
     @endif
  </div>
@endif
  <div class="row">
    <h1 style="color: #EC67A2;margin-top: 8%;text-align: center;font-family: LOGO;"> Estrenos</h1><a style="text-decoration:none;color:  #EC67A2;" href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ver más</a>
        <div id="estrenos" style="margin-left: 3%">
        <?php $cont=1 ?>
          @if($estrenos->isNotEmpty())
            @foreach( $estrenos as $key => $estreno )
             @if ($cont <= 4)
                <div class="hijo" style=" float: left; padding: 3.1%;">
                  <div class="portada-p">
                    <a href="#">
                      <img src="{{url('peliculas/imgPeliculas/'.$estreno->titulo)}}" alt="{{$estreno->titulo}}" style="height: 270px; border-radius: 8px;">
                    </a></br></br>
                    <a href="#">
                      <p style="color:  #EC67A2;"><strong>{{$estreno->titulo}}</strong></p>
                    </a>
                    <span style="color:  #EC67A2; text-align: center;">{{$estreno->aLanzamiento}}</span>
                  </div>
                </div>
              @endif
              <?php $cont++ ?>
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
  <div class="row">
    <h1 style="color: #EC67A2;margin-top: 5%;text-align: center;font-family: LOGO;">Favoritos</h1><a style="text-decoration:none;color:  #EC67A2;" href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ver más</a>
        <div id="favoritos" style="margin-left: 3%">
        <?php $cont=1 ?>
          @if($arrayPelicula->isNotEmpty())
            @foreach( $arrayPelicula as $key => $pelicula )
            	@if($pelicula->genero === Auth::user()->fav1 )
	            	@if ($cont <= 8)
		    	        <div class="hijo" style=" float: left; padding: 3.1%;">
		    	          <div class="portada-p">
		    	            <a href="#">
		    	              <img src="{{url('peliculas/imgPeliculas/'.$pelicula->titulo)}}" alt="{{$pelicula->titulo}}" style="height: 270px; border-radius: 8px;">
		    	            </a></br></br>
		    	            <a href="#">
		    	              <p style="color:  #EC67A2;"><strong>{{$pelicula->titulo}}</strong></p>
		    	            </a>
		    	            <span style="color:  #EC67A2; text-align: center;">{{$pelicula->aLanzamiento}}</span>
		    	          </div>
		    	        </div>
	    	        @endif
              		<?php $cont++ ?>
              	@elseif($pelicula->genero === Auth::user()->fav2)
              		@if ($cont <= 8)
		    	        <div class="hijo" style=" float: left; padding: 3.1%;">
		    	          <div class="portada-p">
		    	            <a href="#">
		    	              <img src="{{url('peliculas/imgPeliculas/'.$pelicula->titulo)}}" alt="{{$pelicula->titulo}}" style="height: 270px; border-radius: 8px;">
		    	            </a></br></br>
		    	            <a href="#">
		    	              <p style="color:  #EC67A2;"><strong>{{$pelicula->titulo}}</strong></p>
		    	            </a>
		    	            <span style="color:  #EC67A2; text-align: center;">{{$pelicula->aLanzamiento}}</span>
		    	          </div>
		    	        </div>
	    	        @endif
              		<?php $cont++ ?>
              	@elseif($pelicula->genero === Auth::user()->fav3)
              		@if ($cont <= 8)
		    	        <div class="hijo" style=" float: left; padding: 3.1%;">
		    	          <div class="portada-p">
		    	            <a href="#">
		    	              <img src="{{url('peliculas/imgPeliculas/'.$pelicula->titulo)}}" alt="{{$pelicula->titulo}}" style="height: 270px; border-radius: 8px;">
		    	            </a></br></br>
		    	            <a href="#">
		    	              <p style="color:  #EC67A2;"><strong>{{$pelicula->titulo}}</strong></p>
		    	            </a>
		    	            <span style="color:  #EC67A2; text-align: center;">{{$pelicula->aLanzamiento}}</span>
		    	          </div>
		    	        </div>
	    	        @endif
              		<?php $cont++ ?>
              	@elseif($pelicula->genero === Auth::user()->fav4)
              		@if ($cont <= 8)
  		    	        <div class="hijo" style=" float: left; padding: 3.1%;">
  		    	          <div class="portada-p">
  		    	            <a href="#">
  		    	              <img src="{{url('peliculas/imgPeliculas/'.$pelicula->titulo)}}" alt="{{$pelicula->titulo}}" style="height: 270px; border-radius: 8px;">
  		    	            </a></br></br>
  		    	            <a href="#">
  		    	              <p style="color:  #EC67A2;"><strong>{{$pelicula->titulo}}</strong></p>
  		    	            </a>
  		    	            <span style="color:  #EC67A2; text-align: center;">{{$pelicula->aLanzamiento}}</span>
  		    	          </div>
  		    	        </div>
	    	          @endif
              		<?php $cont++ ?>
              	@endif
    	     @endforeach
            @if($cont == 1)
              @if(Auth::user()->admin == "1")
                <h1 style="text-align: center;color:  #EC67A2;"><strong>Actualmente no tienes películas favoritas</strong></h1>
                <a href="{{url('inicio/perfil')}}" style="text-align: center;color:  #EC67A2;"><h3><strong>Accede a tu perfil para añadir favoritos</strong></h3></a>
              @else
                <h1 style="text-align: center;color:  #EC67A2;"><strong>Actualmente no tienes películas favoritas</strong></h1>
              @endif
            @endif
          @else
            @if(Auth::user()->admin == "1")
              <h1 style="text-align: center;color:  #EC67A2;"><strong>Actualmente no tienes películas favoritas</strong></h1>
              <a href="{{url('inicio/perfil')}}" style="text-align: center;color:  #EC67A2;"><h3><strong>Accede a tu perfil para añadir favoritos</strong></h3></a>
              
            @else
              <h1 style="text-align: center;color:  #EC67A2;"><strong>Actualmente no tienes películas favoritas</strong></h1>
            @endif

          @endif 
        </div>
    </div>
  <div class="row">
    <h1 style="color: #EC67A2;margin-top: 5%;text-align: center;font-family: LOGO;">Ultimas agregadas</h1><a style="text-decoration:none;color:  #EC67A2;" href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ver más</a>
        <div id="favoritos" style="margin-left: 3%">
            <?php $cont=1 ?>
          @if($ultimasAdd->isNotEmpty())
            @foreach( $ultimasAdd as $key => $add )
             @if ($cont <= 4)
                <div class="hijo" style=" float: left; padding: 3.1%;">
                  <div class="portada-p">
                    <a href="#">
                      <img src="{{url('peliculas/imgPeliculas/'.$add->titulo)}}" alt="{{$add->titulo}}" style="height: 270px; border-radius: 8px;">
                    </a></br></br>
                    <a href="#">
                      <p style="color:  #EC67A2;"><strong>{{$add->titulo}}</strong></p>
                    </a>
                    <span style="color:  #EC67A2; text-align: center;">{{$add->aLanzamiento}}</span>
                  </div>
                </div>
              @endif
              <?php $cont++ ?>
          	@endforeach
          @else
          @if(Auth::user()->admin == "1")
            <h1 style="text-align: center;color:  #EC67A2;"><strong>Actualmente no hay películas Recién agregadas</strong></h1>
            <a href="{{url('admin/verPeliculas')}}" style="text-align: center;color:  #EC67A2;"><h3><strong>Accede para añadir pellículas</strong></h3></a>
            
          @else
            <h1 style="text-align: center;color:  #EC67A2;"><strong>Actualmente no hay películas Recién agregadas</strong></h1>
          @endif

          @endif 
        </div>
    </div>
  </div>
  </div>  
    <!-- /#page-wrapper -->
    <!--De aqui hacia abajo va en la view-->
@endsection