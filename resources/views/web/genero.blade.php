@extends('layouts.app')
<style>


a:hover {
  color: #6ABCEA;
}

.movie-card:hover {
  -webkit-transform: scale(1.03);
          transform: scale(1.03);
  box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.08);
}
.imgTam{
  width: 25%;
  height: 300px;
}


</style>
@section('content')
    <div class="col-md-8">
      @foreach($arrayPelis as $key => $peli)
        <a href="{{url('inicio/'.$peli->titulo)}}">
          <img src="{{$peli->rutaImg}}" class="imgTam">
        </a>
    		<a href="{{url('inicio/'.$peli->titulo)}}">
    		  <h3 class="movie-title">{{$peli->titulo}}</h3>
    		</a>
    		<label>Genero</label>
    		<span>{{$peli->genero}}</span>

    		<label>Año lanzamiento</label>
    		<span>{{$peli->aLanzamiento}}</span>


  @endforeach
	 </div>
 </div>
</div><!--container-->
@endsection
