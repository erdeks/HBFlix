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
                 <img alt="User Pic" src="#" class="img-circle img-responsive">
               </div>
               <div class=" col-md-9 col-lg-9 ">
                 <form action="{{ url('/inicio/perfil/editarPerfil') }}" method="POST">
                   {{ csrf_field() }}
                 <table class="table table-user-information">
                   <tbody>
                     <tr>
                       <td></td>
                       <td><input type="hidden" name="id" value="{{ Auth::user()->id }}" class="form-control"></td>
                     </tr>
                     <tr>
                       <td>Nombre:</td>
                       <td><input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control"></td>
                     </tr>
                     <tr>
                       <td>Apellido:</td>
                       <td><input type="text" name="apellido" value="{{ Auth::user()->apellido }}" class="form-control"></td>
                     </tr>
                     <tr>
                       <td>Email:</td>
                       <td><input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control"></td>
                     </tr>
                     <tr>
                       <td>Telefono:</td>
                       <td><input type="text" name="telefono" value="{{ Auth::user()->telefono }}" class="form-control"></td>
                     </tr>

                     <tr>
                       <td>Fecha de nacimiento:</td>
                       <td><input type="text" name="fechaNac" value="{{ Auth::user()->date }}" class="form-control"></td>
                     </tr>
                     <tr>
                      <td></td>
                      <td><input type="hidden" name="password" value="{{ Auth::user()->password }}" class="form-control"></td>
                    </tr>

                   </tbody>
                 </table>
                 <input type="submit" value="Guardar Cambios" class="btn btn-primary" style="margin-left:70%;">

               </form>
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
      </div>
    </div>
  </div>
</div>

@endsection
