@extends('layouts.index')

@section('content')
<style type="text/css">
  @media screen and (max-width: 600px) {
       table {
           width:100%;
       }
       thead {
           display: none;
       }
       tr:nth-of-type(2n) {
           background-color: inherit;
       }
       tr td:first-child {
           background: #f0f0f0;
           font-weight:bold;
           font-size:1.3em;
       }
       tbody td {
           display: block;
           text-align:center;
       }
       tbody td:before {
           content: attr(data-th);
           display: block;
           text-align:center;
       }
}
</style>
</div>
  </div>
  <!--DIV DEL MEDIO-->
    <div class="col-sm-9 col-md-9">
      <div class="panel">
        <div class="panel-heading" style="background-color: #181E1F;">
          <h3 class="panel-title" style="color: #EC67A2">Generos</h3>
            </div>
            <div class="panel-body" style="background-color: #282F30;">
            <p style="color:  #EC67A2;">
              <a class="btn btn-sm btn-danger" href="{{url('admin/verGeneros')}}" style="margin: 5px;">Volver atras</a>
            </p>
           <!--Empieza-->
           <form action="{{ url('admin/editarGenero') }}" method="POST" enctype="multipart/form-data">
             {{ csrf_field() }}
             <div class="form-group">
                 <!--Nombre usuario-->
                 <input type="hidden" name="idGenero" value="{{$genero->id}}">
                 <label style="color: #EC67A2">Genero:</label>
                 <input type="text" name="genero" id="genero" class="form-control" value="{{$genero->nombre}}">


             <div class="form-group text-center">
                 <button type="submit" class="btn btn-primary">
                     Editar Genero
                 </button>
             </div>
         </form>
           <!--Acaba-->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
