<?php 
	@session_start();
	include("funciones_mysql.php");
	$conexion=conectar();
	
	$descripcion=$_POST['descripcion'];
	$id_enlace=$_SESSION['id_enlace'];
	
	$fecha = date('y.m.d');
	$hora= date("H");	
	$min= date("i");
	$minn=$min-22;

if($hora>12)
{
	$ampm="pm";
	$horaa=$hora-12;
}
else
{
	$ampm="am";
}

$tiempo = $horaa . ":" . $minn . " " . $ampm;
	
	$sqla = "UPDATE `Enlace` SET descripcion='$descripcion', fecha='$fecha', hora='$tiempo' WHERE `id_enlace`='$id_enlace'";
	$resultadoa = query($sqla, $conexion);
	
?>

<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="images/icono.ico">
<meta http-equiv="Content-Type" content="text/html"/>
  <title>Usuario</title>
  <link rel="stylesheet" type="text/css" href="estiloUsuario.css" />
</head>

<style type="text/css">

#contenidoo {
padding: 2em;
margin: 0 auto;
margin-top: 20em;
border-radius: 25px;
 background-color: #FFFFFF;
  border: solid 0.1em #000000;
  overflow: hidden;
  width: 30em;
  height: 20em;
  box-sizing:border-box;
}

#centrar
{
	text-align: center;
	
}

</style>

<body>
<div id="contenidoo">
<div id="centrar">
<h2>

	Los mensajes se han actualizado.

</h2>


<br />
<br />
<br />
<a href="usuario.php"  class="bt">Regresar</a>
</div>
</div>	
<body>
</html>