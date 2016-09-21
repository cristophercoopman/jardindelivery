<!DOCTYPE html>
<html lang="en">
<head>
  <title>404 Page Not Found</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- LIBRERIAS BOOTSTRAP DESDE INTERNET -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style type="text/css">

::selection { background-color: #E13300; color: white; }
::-moz-selection { background-color: #E13300; color: white; }

body {
	background-color: #fff;
	margin: 40px;
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: #4F5155;
}

a {
	color: #003399;
	background-color: transparent;
	font-weight: normal;
}

h1 {
	color: #444;
	background-color: transparent;
	border-bottom: 1px solid #D0D0D0;
	font-size: 19px;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
}

code {
	font-family: Consolas, Monaco, Courier New, Courier, monospace;
	font-size: 12px;
	background-color: #f9f9f9;
	border: 1px solid #D0D0D0;
	color: #002166;
	display: block;
	margin: 14px 0 14px 0;
	padding: 12px 10px 12px 10px;
}

#container {
	margin: 10px;
	border: 1px solid #D0D0D0;
	box-shadow: 0 0 8px #D0D0D0;
}

p {
	margin: 12px 15px 12px 15px;
}
</style>
</head>
<body>
	<div id="container" class="container text-center">
		<h1><strong><p class="text-danger">ERROR 404 </strong><span class="glyphicon glyphicon-warning-sign"></span></p></h1>
		<p>La página seleccionada no existe. Revise si la ha ingresado correctamente.</p>		
		<p>Si el problema persiste, favor contactar con el administrador del sitio.</p>		
		<p><a href="<?php echo base_url() ?>"><span class="glyphicon glyphicon-home"></span> Volver a la página principal	<br>	
		<img src="<?php echo base_url() ?>assets/img/logo.png" id="logo" style="width: 80px;"></a></p>
	</div>
</body>
</html>