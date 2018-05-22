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
         <div class="panel panel-info" style="background-color:#1a242f;">
           <div class="panel-heading" style="background-color:black;">
             <h3 class="panel-title" style="color:#EC67A2;">PERFIL</h3>
           </div>
           <div class="panel-body">
             <div class="row">
               <div class="col-md-3 col-lg-3 " align="center">
                 <img alt="User Pic" src="{{url('images/perfil')}}" class="img-circle img-responsive">
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
                 <a href="{{ url('/inicio/perfil/editarPerfil') }}" class="btn btn-primary" style="margin-left:80%;">Editar perfil</a>
               </div>
             </div>
           </div>

      <!--<div class="infoPos">
          <table class="table table-user-information">
            <tr>
              <th colspan="2">Perfil</th>
            </tr>
          	<tr>
              	<td>Nombre:</td>
              	<td>{{Auth::user()->name}}</td>
              </tr>
              <tr>
              	<td>Apellido:</td>
              	<td>{{Auth::user()->apellido}}</td>
              </tr>
              <tr>
              	<td>Fecha de nacimiento:</td>
              	<td>{{Auth::user()->date}}</td>
              </tr>
            	<tr>
              	<td>Email</td>
              	<td><a href="mailto:{{Auth::user()->email}}">{{Auth::user()->email}}</a></td>
              </tr>
              <tr>
              	<td>Numero de telefono:</td>
              	<td>{{Auth::user()->telefono}}</td>
              </tr>
            	<tr>
              	<td>Fecha de creación:</td>
              	<td>{{Auth::user()->created_at}}</td>
            	</tr>
        	</table>
        </div>-->
        </div>
        <div class="panel panel-info" style="background-color:#1a242f; margin-top: 5%;">
          <div class="panel-heading" style="background-color:black;">
            <h3 class="panel-title" style="color:#EC67A2;">Generos</h3>
          </div>
          <div class="panel-body">
           <table class="table table-user-information">
             <tbody>
               <tr>
                 <td>Genero 1:</td>
                 <td>{{Auth::user()->fav1}}</td>
               </tr>
               <tr>
                 <td>Genero 2:</td>
                 <td>{{Auth::user()->fav2}}</td>
               </tr>
               <tr>
                 <td>Genero 3:</td>
                 <td>{{Auth::user()->fav3}}</td>
               </tr>
               <tr>
                 <td>Genero 4:</td>
                 <td>{{Auth::user()->fav4}}</td>
               </tr>
            </tbody>
         </table>
       </div>
     </div>
   </div>
      </div>
    </div>
  </div>
</div>

@endsection
