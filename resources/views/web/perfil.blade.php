@extends('layouts.app')
<style>
  body{
    background-color: #151515;
  }
  .infoPos{
    width: 400px;
    height: 500px;
    margin-top: 15%;
    margin-left: 15%;
    background-color: #181E1F;
    border-radius: 8px;
  }
  td{
    color: #EC67A2;
    text-align: center;
  }
  th{
    color: #EC67A2;
    text-align: center !important;
    font-size: 24px;
  }
  table{
    bor
  }
  .table2{
    margin-top: 5% !important;
  }

</style>
@section('content')
  <div class="col-md-8" style="margin-top:7%; margin-left:7%;">
    <div style="width:100%;">
         <div class="panel panel-info" style="background-color:#1d2424;">
           <div class="panel-heading" style="background-color:#272727;">
             <h3 class="panel-title" style="color:#EC67A2;">PERFIL</h3>
           </div>
           <div class="panel-body">
             <div class="row">
               <div class="col-md-3 col-lg-3 " align="center">
                 <img alt="User Pic" src="{{url('peliculas/1.png')}}" class="img-circle img-responsive">
               </div>
               <div class=" col-md-9 col-lg-9 ">
                 <table class="table table-user-information">
                   <tbody>
                     <tr>
                       <td>Nombre:</td>
                       <td>{{Auth::user()->name}}</td>
                     </tr>
                     <tr>
                       <td>Apellido:</td>
                       <td>{{Auth::user()->apellido}}</td>
                     </tr>
                     <tr>
                       <td>Email:</td>
                       <td>{{Auth::user()->email}}</td>
                     </tr>
                     <tr>
                       <td>Telefono:</td>
                       <td>{{Auth::user()->telefono}}</td>
                     </tr>
                     <tr>
                       <td>Fecha de nacimiento:</td>
                       <td>{{Auth::user()->date}}</td>
                     </tr>

                   </tbody>
                 </table>
                 <a href="{{ url('/inicio/perfil/editarPerfil') }}" class="btn btn-primary">Editar perfil</a>
               </div>
             </div>
           </div>
        </div>
        <div class="panel panel-info" style="background-color:#1d2424;">
           <div class="panel-heading" style="background-color:#272727;">
             <h3 class="panel-title" style="color:#EC67A2;">SUBSCRIPCIÓN</h3>
           </div>
           <form action="{{ url('/inicio/perfil/code') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
           <div class="panel-body">
             <div class="row">
               <div class=" col-md-9 col-lg-9 ">
                 <table class="table table-user-information">
                   <tbody>
                      @if(Auth::user()->admin == 1)
                       <div class="alert alert-info alert-dismissable" style="margin-top: 5%;">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>¡ATENCIÓN!</strong> Los admin tienen subscripción infinita.
                      </div>
                      @else
                      <label style="color:#EC67A2;">Amplia tu subscripción con un código nuevo</label></br></br>
                      @if(Session::has('flash_message'))
                         <div class="alert alert-danger alert-dismissable col-md-offset-4 col-md-6">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                           <strong> ¡Atención!</strong> {{Session::get('flash_message')}}
                        </div>
                      @endif
                       <input type="text" name="code" id="code" required></br></br>
                       <input type="hidden" name="idC" value="{{Auth::user()->id}}">
                      <div class="alert alert-warning alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>¡ATENCIÓN!</strong> Tu subscripción caba en {{Auth::user()->subFinal}}.
                      </div>
                      <button type="submit" class="btn btn-primary" >Enviar code!</button>
                      @endif
                   </tbody>
                   </form>
                 </table>
               </div>
             </div>
           </div>
        </div>
        <div class="panel panel-info" style="background-color:#1d2424; margin-top: 5%;">
          <div class="panel-heading" style="background-color:#272727;">
            <h3 class="panel-title" style="color:#EC67A2;">Favoritos</h3>

          </div>
          <!--Hasta aquí-->
          <div class="panel-body" id="ver" style="display: block;">
           <table class="table table-user-information">
             <tbody>
               <tr>
                 <td>Favorito 1:</td>
                 <td>{{Auth::user()->fav1}}</td>
               </tr>
               <tr>
                 <td>Favorito 2:</td>
                 <td>{{Auth::user()->fav2}}</td>
               </tr>
               <tr>
                 <td>Favorito 3:</td>
                 <td>{{Auth::user()->fav3}}</td>
               </tr>
               <tr>
                 <td>Favorito 4:</td>
                 <td>{{Auth::user()->fav4}}</td>
               </tr>
            </tbody>
         </table>
         <button value="Editar" class="btn btn-primary" onclick="mostrar()" >Editar</button>
       </div>
       <!--Hasta aquí-->
       <!--Hasta aquí-->
       <form action="{{ url('/inicio/perfil/editarFav') }}" method="POST" enctype="multipart/form-data">
       {{ csrf_field() }}
       <input type="hidden" name="id" value="{{ Auth::user()->id }}" class="form-control"></td>
          <div class="panel-body" id="selector" style="display: none;">
           <table class="table table-user-information">
             <tbody>
               <tr>
                 <td>Favorito 1:</td>
                 <td>
                 <select id="fav1" name="fav1" required>
                 	<option selected>{{Auth::user()->fav1}}</option>
                    @foreach( $arrayGenero as $key => $genero )
                    	@if(Auth::user()->fav1 != $genero->nombre)
                        	<option value="{{$genero->nombre}}">{{$genero->nombre}}</option>
                     	@endif
                    @endforeach
                </select>
                </td>
                <td>Actual: {{Auth::user()->fav1}}</td>
               </tr>
               <tr>
                 <td>Favorito 2:</td>
                 <td>
                 <select id="fav2" name="fav2" required>
                 <option selected>{{Auth::user()->fav2}}</option>
                    @foreach( $arrayGenero as $key => $genero )
                    	@if(Auth::user()->fav2 != $genero->nombre)
                        	<option value="{{$genero->nombre}}">{{$genero->nombre}}</option>
                        @endif
                    @endforeach
                </select>
                </td>
                <td>Actual: {{Auth::user()->fav2}}</td>
               </tr>
               <tr>
                 <td>Favorito 3:</td>
                 <td>
                 <select id="fav3" name="fav3" required>
                 <option selected>{{Auth::user()->fav3}}</option>
                    @foreach( $arrayGenero as $key => $genero )
                    	@if(Auth::user()->fav3 != $genero->nombre)
                        <option value="{{$genero->nombre}}">{{$genero->nombre}}</option>
                        @endif
                    @endforeach
                </select>
                </td>
                <td>Actual: {{Auth::user()->fav3}}</td>
               </tr>
               <tr>
                 <td>Favorito 4:</td>
                 <td>
                 <select id="fav4" name="fav4" required>
                 <option selected>{{Auth::user()->fav4}}</option>
                    @foreach( $arrayGenero as $key => $genero )
                    	@if(Auth::user()->fav4 != $genero->nombre)
                        	<option value="{{$genero->nombre}}">{{$genero->nombre}}</option>
                        @endif
                    @endforeach
                </select>
                </td>
                <td>Actual: {{Auth::user()->fav4}}</td>
               </tr>
            </tbody>
         </table>
         <button type="submit" value="Confirmar" class="btn btn-primary" onclick="noMostrar()" >Guardar cambios</button>
       </div>
       <!--Hasta aquí-->
     </form>
     </div>
   </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    function mostrar(){
      document.getElementById('ver').style.display = 'none';
      document.getElementById('selector').style.display = 'block';
    }
    function noMostrar(){
      document.getElementById('ver').style.display = 'block';
      document.getElementById('selector').style.display = 'none';
    }
</script>
@endsection
