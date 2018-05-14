@extends('layouts.app')

@section('content')
    <!--De aqui hacia abajo va en la view-->
<div class="container ">
  <div class="row" >
   
  </div>
  <div class="row">
    <h1 style="color: #EC67A2;margin-top: 8%;text-align: center;font-family: LOGO;"> Estrenos</h1><a style="text-decoration:none;color:  #EC67A2;" href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ver más</a>
        <div id="estrenos" style="margin-left: 3%">
            @foreach( $arrayPelicula as $key => $pelicula )
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
          	@endforeach
        </div>
    </div>
  <div class="row">
    <h1 style="color: #EC67A2;margin-top: 5%;text-align: center;font-family: LOGO;">Favoritos</h1><a style="text-decoration:none;color:  #EC67A2;" href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ver más</a>
        <div id="favoritos" style="margin-left: 3%">
            @foreach( $arrayPelicula as $key => $pelicula )
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
    	    @endforeach
        </div>
    </div>
  <div class="row">
    <h1 style="color: #EC67A2;margin-top: 5%;text-align: center;font-family: LOGO;">Ultimas agregadas</h1><a style="text-decoration:none;color:  #EC67A2;" href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ver más</a>
        <div id="favoritos" style="margin-left: 3%">
            @foreach( $arrayPelicula as $key => $pelicula )
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
          @endforeach
        </div>
    </div>
  </div>
  </div>  
    <!-- /#page-wrapper -->
    <!--De aqui hacia abajo va en la view-->
@endsection