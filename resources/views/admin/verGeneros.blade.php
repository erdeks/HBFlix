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
            <p style="color:  #EC67A2;">Menú peliculas En proceso...</p>
            <div class="container" style="background-color: white; border-radius: 8px;">
              <h2>Generos</h2>
              <table class="table">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Numero</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                @foreach( $arrayGeneros as $key => $genero )
                  <tr>
                    <td>{{$genero->nombre}}</td>
                      <?php $countGen = 0; ?>
                      @foreach( $countGeneros as $key => $gen )
                        @if($genero->nombre === $gen->genero)
                          <?php $countGen++; ?>
                        @endif
                      @endforeach
                      <td>{{$countGen}}</td>
                    <td>
                      <a href="{{ url('/admin/editarGenero/' . $genero->id ) }}" class="btn btn-sm btn-success">
                        <i class="glyphicon glyphicon-pencil"></i>
                      </a>
                      <a href="{{ url('/admin/eliminarGenero/' . $genero->id ) }}" class="btn btn-sm btn-danger">
                        <i class="glyphicon glyphicon-trash "></i>
                      </a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
