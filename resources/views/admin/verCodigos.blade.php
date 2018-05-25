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
          <h3 class="panel-title" style="color: #EC67A2">Codigos</h3>
            </div>
            <div class="panel-body" style="background-color: #282F30;">
            <div class="container" style="background-color: white; border-radius: 8px;">
              <h2>Codigos</h2>
              <table class="table">
                <thead>
                  <tr>
                    <th>Codigo</th>
                    <th>Disponible</th>
                    <th>Utilizado por:</th>
                  </tr>
                </thead>
                <tbody>
                @foreach( $arrayCodigos as $key => $codigo )
                  <tr>
                    <td>{{$codigo->codigo}}</td>
                    @if($codigo->usado==0)
                      <td><i class="glyphicon glyphicon-ok" style="color:green;"></i></td>
                    @else
                      <td><i class="glyphicon glyphicon-remove" style="color:red;"></i></td>
                    @endif
                    <td>{{$codigo->user}}</td>
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
