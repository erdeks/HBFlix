@extends('layouts.app')

@section('content')
    <!--De aqui hacia abajo va en la view-->
  <div class"container" id="peliculas">
  <div class="container">
  <div class="row">
    <!--Mostramos las peliculas que han sido agregadas ultimamente-->
    <h1 style="color: #EC67A2;margin-top: 5%;text-align: center;font-family: LOGO;">Ultimas agregadas</h1>
        <div id="favoritos" style="margin-left: 3%">
          @if($ultimasAddPeli->isNotEmpty())
            @foreach( $ultimasAddPeli as $key => $add )
                <div class="hijo" style=" float: left; padding: 3.1%;">
                  <div class="portada-p">
                    <a href="{{ url('/inicio/verPelicula/'. $add->id ) }}">
                      <img src="{{url('peliculas/imgPeliculas/'.$add->titulo)}}" alt="{{$add->titulo}}" style="height: 270px; border-radius: 8px;">
                    </a></br></br>
                    <a href="{{ url('/inicio/verPelicula/'. $add->id ) }}">
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
