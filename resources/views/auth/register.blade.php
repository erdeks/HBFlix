<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <title>HBFlix</title>
        <style>
        #logotipo{
         font-family: STARWARS;
         color: #EC67A2 !important;
         font-size: 20px;
        
       }
       @font-face{
         font-family: STARWARS;
         src: url('fonts/BLADRMF_.TTF');
       }
        
        body{
          background-color: #181E1F;
          border-color: #181E1F;
        }
        h4{
          color: white;
          margin-left: 7%;
        }
        h3{
          color: white;
          margin-left: 7%;
        }
        i{
          color: #EC67A2;
        }
        ul.chec-radio {
		    margin: 15px;
		}
		ul.chec-radio li.pz {
		    display: inline;
		}
		.chec-radio label.radio-inline input[type="checkbox"] {
		    display: none;
		}
		.chec-radio label.radio-inline input[type="checkbox"]:checked+div {
		    color: #fff;
		    background-color: #000;
		}
		.chec-radio .radio-inline .clab {
		    cursor: pointer;
		    background: #EC67A2;
		    padding: 7px 20px;
		    text-align: center;
		    text-transform: uppercase;
		    color: #333;
		    position: relative;
		    height: 34px;
		    float: left;
		    margin: 0;
		    margin-bottom: 5px;
		}
		.chec-radio label.radio-inline input[type="checkbox"]:checked+div:before {
		    content: "\e013";
		    margin-right: 5px;
		    font-family: 'Glyphicons Halflings';
		}
		.chec-radio label.radio-inline input[type="radio"] {
		    display: none;
		}
		.chec-radio label.radio-inline input[type="radio"]:checked+div {
		    color: #fff;
		    background-color: #000;
		}
		.chec-radio label.radio-inline input[type="radio"]:checked+div:before {
		    content: "\e013";
		    margin-right: 5px;
		    font-family: 'Glyphicons Halflings';
		}
        </style>

    </head>
    <body>
      <nav class="navbar navbar-inverse navbar-default" style="opacity: .7;" role="navigation">
        <div class="navbar-header">
          <a class="navbar-brand" id="logotipo" href="{{url('/inicio')}}">hbflix</a>
        </div>
      </nav>
		<div class="container">
		    <div class="row" style="margin-top: -2%">
		    <h3 style="text-align: right;" id="estado">Bien!</h3>
		    	<div class="progress progress-striped active">
				  <div id="barraProgres" class="progress-bar" role="progressbar"
				       aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"
				       style="width: 0%;background-color: #EC67A2">
				  </div>
				</div>
		    </div>
		    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
		        {{ csrf_field() }}
		                        <!--NOMBRE-->
			    <div class="row" id="info" style="display: block;">
			        <div class="col-md-8 col-md-offset-2">
			                <div id="logotipo" style="color: #EC67A2;text-align: center;">Datos Personales</div></br>
			                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
			                            <label for="name" class="col-md-4 control-label" style="color: #EC67A2">Nombre</label>

			                            <div class="col-md-6">
			                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

			                                @if ($errors->has('name'))
			                                    <span class="help-block">
			                                        <strong>{{ $errors->first('name') }}</strong>
			                                    </span>
			                                @endif
			                            </div>
			                        </div>
			                        <!--Apellido-->
			                        <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
			                            <label for="apellido" class="col-md-4 control-label" style="color: #EC67A2">Apellido</label>

			                            <div class="col-md-6">
			                                <input id="apellido" type="text" class="form-control" name="apellido" value="{{ old('apellido') }}" required autofocus>

			                                @if ($errors->has('apellido'))
			                                    <span class="help-block">
			                                        <strong>{{ $errors->first('apellido') }}</strong>
			                                    </span>
			                                @endif
			                            </div>
			                        </div>
			                        <!--Fecha Nacimiento-->
			                        <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
			                            <label for="date" class="col-md-4 control-label" style="color: #EC67A2">Fecha de nacimiento</label>

			                            <div class="col-md-6">
			                                <input id="date" type="date" class="form-control" name="date" value="{{ old('date') }}" required autofocus>

			                                @if ($errors->has('date'))
			                                    <span class="help-block">
			                                        <strong>{{ $errors->first('date') }}</strong>
			                                    </span>
			                                @endif
			                            </div>
			                        </div>
			                        <!--Telefono-->
			                        <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
			                            <label for="telefono" class="col-md-4 control-label" style="color: #EC67A2">Telefono</label>

			                            <div class="col-md-6">
			                                <input id="telefono" type="text" class="form-control" name="telefono" value="{{ old('telefono') }}" required autofocus>

			                                @if ($errors->has('telefono'))
			                                    <span class="help-block">
			                                        <strong>{{ $errors->first('telefono') }}</strong>
			                                    </span>
			                                @endif
			                            </div>
			                        </div>
			                        <input type="button" value="Siguiente" onclick="alanteUno()" class="btn btn-sm" style="background-color: #EC67A2;color: white;margin-left: 90%">
			            	</div>
			        	</div>
			        	<div class="row" id="pass" style="display: none;">
			        		<div class="col-md-8 col-md-offset-2">
				                <div id="logotipo" style="color: #EC67A2;text-align: center;">Datos de la cuenta </div></br>
				                        <!--EMAIL-->
				                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
				                            <label for="email" class="col-md-4 control-label" style="color: #EC67A2">E-Mail Address</label>

				                            <div class="col-md-6">
				                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

				                                @if ($errors->has('email'))
				                                    <span class="help-block">
				                                        <strong>{{ $errors->first('email') }}</strong>
				                                    </span>
				                                @endif
				                            </div>
				                        </div>
				                        <!--PASSWORD-->
				                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
				                            <label for="password" class="col-md-4 control-label" style="color: #EC67A2">Password</label>

				                            <div class="col-md-6">
				                                <input id="password" type="password" class="form-control" name="password" required>

				                                @if ($errors->has('password'))
				                                    <span class="help-block">
				                                        <strong>{{ $errors->first('password') }}</strong>
				                                    </span>
				                                @endif
				                            </div>
				                        </div>
				                        <!--CONFIRM PASSWORD-->
				                        <div class="form-group">
				                            <label for="password-confirm" class="col-md-4 control-label" style="color: #EC67A2">Confirm Password</label>

				                            <div class="col-md-6">
				                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
				                            </div>
				                        </div></br></br>
				                        <input type="button" value="Volver" onclick="alanteTres()" class="btn btn-sm" style="background-color: #EC67A2;color: white;float: left;">
				                        <input type="button" value="Siguiente" onclick="alanteDos()" class="btn btn-sm" style="background-color: #EC67A2;color: white;margin-left: 80%">
				                	</div>	
				            	</div>
				        	</div>

				        	<div class="row" id="fav" style="display: none;">
				        		<div class="col-md-8 col-md-offset-2">
				        		<div id="logotipo" style="color: #EC67A2;text-align: center;">Favoritos</div></br></br>
					                <ul class="chec-radio">
					                	@foreach($genero as $key => $genero)
										<li class="pz">
											<label class="radio-inline">
												<input type="checkbox" id="pro-chx-residential" name="check[]" class="pro-chx" value="{{$genero->nombre}}" >
												<div class="clab">{{$genero->nombre}}</div>
											</label>
										</li>
										@endforeach
										<input type="text" id="fav1" name="fav1" value="">
										<input type="text" id="fav2" name="fav2" value="">
										<input type="text" id="fav3" name="fav3" value="">
										<input type="text" id="fav4" name="fav4" value="">
									</ul></br></br></br>
					                        <input type="button" value="Volver" onclick="alanteUno()" class="btn btn-sm" style="background-color: #EC67A2;color: white;float: left;">
					                        <input type="button" value="Siguiente" onclick="alanteCuatro()" class="btn btn-sm" style="background-color: #EC67A2;color: white;margin-left: 80%">
					                	</div>	
					            	</div>
					        	</div>
					        	<div class="row" id="pagar" style="display: none;">
				        			<div class="col-md-8 col-md-offset-2">
						        		<div id="logotipo" style="color: #EC67A2;text-align: center;">activar cuenta B</div></br></br>
					                        <label for="password" class="col-md-4 control-label" style="color: #EC67A2"></label>
					                            <div class="col-md-6">
					                            <label for="password" class="col-md-4 control-label" style="color: #EC67A2">CODE</label></br>
					                                <input id="code" type="text" class="form-control" name="code" value="" required autofocus>

					                                
					                            </div>
					                        </br></br></br>
					                        <input type="button" value="Volver" onclick="alanteDos()" class="btn btn-sm" style="background-color: #EC67A2;color: white;float: left;">
					                        <button type="submit" class="btn " style="background-color: #EC67A2;color: white;margin-left: 80%">
				                                Login
				                            </button>
					                	</div>	
					            	</div>
					        	</div>
					        </form>
					    </div>    
		        <script type="text/javascript">
		        	function alanteTres(){
			          document.getElementById('info').style.display = 'block';
		              document.getElementById('pass').style.display = 'none';
		              document.getElementById('fav').style.display = 'none';
		              document.getElementById('pagar').style.display = 'none';
		              document.getElementById('estado').innerHTML = "Bienvenido!";
		              document.getElementById('barraProgres').setAttribute("style","width:0%;background-color: #EC67A2");
			        }
			        function alanteUno(){
			          document.getElementById('info').style.display = 'none';
			          document.getElementById('pass').style.display = 'block';
			          document.getElementById('fav').style.display = 'none';
			          document.getElementById('pagar').style.display = 'none';
			          document.getElementById('estado').innerHTML = "Ya casi estas!";
			          document.getElementById('barraProgres').setAttribute("style","width:33%;background-color: #EC67A2");
			        }
			        function alanteDos(){
		              document.getElementById('info').style.display = 'none';
		              document.getElementById('pass').style.display = 'none';
		              document.getElementById('fav').style.display = 'block';
		              document.getElementById('pagar').style.display = 'none';
		              document.getElementById('estado').innerHTML = "Elige tus favoritos!";
		              document.getElementById('barraProgres').setAttribute("style","width:66%;background-color: #EC67A2");
			        }
			         function alanteCuatro(){
		              document.getElementById('info').style.display = 'none';
		              document.getElementById('pass').style.display = 'none';
		              document.getElementById('fav').style.display = 'none';
		              document.getElementById('pagar').style.display = 'block';
		              document.getElementById('estado').innerHTML = "Introduce el codigo y as terminado!";
		              document.getElementById('barraProgres').setAttribute("style","width:100%;background-color: #EC67A2");
			        }

			        
    			
    				localStorage.contador = 0;
    				
    				
			   		$('.pro-chx').on('change', function() {
			   			//localStorage.contador = parseInt(localStorage.contador) + 1;
					    //solu = localStorage.contador;
					    //console.log(solu);
					    console.log("entro en el clic");
			   			if( $('.pro-chx').prop('checked') ) {
						    console.log("Ya has seleccionado todos");
						    //localStorage.contador = 3;
						}else{
				   			var checkedValue = null; 
							var inputElements = document.getElementsByClassName('pro-chx');
							j = 1;
							for(var i=0; inputElements[i]; ++i){
							      if(inputElements[i].checked){
							           checkedValue = inputElements[i].value;
							           //document.getElementById().value = checkedValue;
							           break;
							      }
							}
						}
						   if($('.pro-chx:checked').length > 4) {
						       this.checked = false;
						       console.log(this.checked);
						   }					
						});

			      </script>
			      <!--
			      <div class="form-group">
				                            <div class="col-md-6 col-md-offset-4">
				                                <button type="submit" class="btn " style="background-color: #EC67A2;color: white">
				                                    Register
				                                </button>
				                            </div>
				                        </div>

-->