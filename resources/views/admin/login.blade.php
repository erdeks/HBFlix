<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <title>Titulo de la web</title>
  <style>
  body{
    background-color: #000000;
  }
  .contenedor{
  	width: 300px;
  	height: 320px;
  	border: 1px solid black;
  	padding: 10px;
  	background: #151515;
    border-radius: 8px;
  }
  .center{
  	position: fixed;
  	top: 50%;
  	left: 50%;
  	transform: translate(-50%, -50%);
  }
  h2{
    text-align: center;
    color: #EC67A2;
  }
  .labColor{
    color: #EC67A2;
  }
  .button{
    text-align: center;
    font-size: 16px;
    border-radius: 4px;
    margin-left: 75%;
  }
  .button1{
    background-color: #EC67A2;
    color: white;
  }
  .button1:hover{
    background-color: #E3027A;
    color: #FC91CA;
  }
  </style>
</head>
<body>
    <div class="contenedor center">
      <h2>Admin Panel</h2>
      <form action="{{url('admin/inicio')}}" method="post" role="form">
        {{ csrf_field() }}
        <div class="form-group">
          <label class="labColor" for="email">Email:</label>
          <input type="email" class="form-control" name="email">
        </div>
        <div class="form-group">
          <label class="labColor" for="password">Contraseña:</label>
          <input type="password" class="form-control" name="password">
        </div>
        <input type="submit" value="Entrar" class="button button1">
      </form>
    </div>
</body>
</html>
