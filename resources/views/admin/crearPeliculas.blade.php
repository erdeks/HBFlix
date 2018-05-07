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
       .form-area{
          background-color: #FAFAFA;
          margin-left: 50%;
          padding: 10px 40px 60px;
          margin: 10px 0px 60px;
          border: 1px solid GREY;
        }
}
</style>
</div>
  </div>
  <!--DIV DEL MEDIO-->
    <div class="col-sm-9 col-md-9">
      <div class="panel">
        <div class="panel-heading" style="background-color: #181E1F;">
          <h3 class="panel-title" style="color: #EC67A2">Peliculas</h3>
            </div>
            <div class="panel-body" style="background-color: #282F30;">
            <p style="color:  #EC67A2;">Menú peliculas En proceso...</p>
            <!--INICIO FORM-->
            <div class="container" style=" width: 60%;margin-left: 1%; float: left;">
              <div class="col-md-12">  
                <form role="form" class="col-md-12" style="float:left;" accept-charset="UTF-8" enctype="multipart/form-data">7

                 {{ csrf_field() }}

                  <br style="clear:both">
                  <h3 style="margin-bottom: 25px; text-align: center; color: #EC67A2">Introducir nueva película</h3>
                  <!--Nombre-->
                  <label for="sel1" style="color: #EC67A2">Nombre:</label>
                  <div class="form-group">
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                  </div>
                  <!--FinGénero-->
                  <!--Resumen-->
                  <label for="sel1" style="color: #EC67A2">Resumen:</label>
                  <div class="form-group">
                    <textarea class="form-control" type="textarea" id="resumen" name="resumen" placeholder="Resumen" maxlength="140" rows="7"></textarea>
                  </div>
                  <!--FinResumen-->
                  <!--Géneros-->
                  <div class="form-group">
                  <label for="genero" style="color: #EC67A2">Género:</label>
                    <select class="form-control" id="genero">
                      <option value="1">Terror</option>
                      <option value="2">Comedia</option>
                      <option value="3">Amor</option>
                      <option value="4">NoPorn</option>
                    </select>
                  <br style="clear:both">
                  <!--FInGéneros-->
                  <!--Géneros-->
                  <div class="form-group">
                  <label for="anyo" style="color: #EC67A2">Año de lanzamiento:</label>
                    <select class="form-control" id="anyo">
                      <option value="1">2018</option>
                      <option value="2">2017</option>
                      <option value="3">2016</option>
                      <option value="4">2015</option>
                    </select>
                  <br style="clear:both">
                  <!--FInGéneros-->
              </div>
              <button type="button" id="submit" name="submit" class="btn btn-primary pull-left" style="float: left;">Submit Form</button>
            </div>
          </div>
        </div>
        <!--INICIO FORM-->
            <div class="container" style="width: 35%;margin-top: 11% ;float: left;">
              <div class="col-md-12">  
                <form role="form" class="col-md-12">
                  <!--Imágen-->
                  <label for="sel1" style="color: #EC67A2">Imágen de la pélicula:</label>
                  <div class="form-group">
                    <input type="file" class="form-control" id="imgPeli" name="imgPeli" placeholder="Nombre" required>
                  </div>
                  <!--Imágen-->
                  <!--Película-->
                  <label for="sel1" style="color: #EC67A2">Subir película:</label>
                  <div class="form-group">
                    <input type="file" class="form-control" id="vidPeli" name="vidPeli" placeholder="Nombre" required>
                  </div>
                  <!--Película-->
              </form>
            </div>
          </div>
        <!--Final-->
      </div>
    </div>
  </div>
</div>
@endsection
