<?php 
	@session_start();
	include("funciones_mysql.php");
	$conexion=conectar();	
	
		
	$id_usuario=$_SESSION['usuario'];	
	$area = $_SESSION['area'];
	$descripcion = $_SESSION['descripcion'];
	$especialidad = $_POST['especialidad'];
	
	$sql = "SELECT * FROM `Trabajador` WHERE `area`='$area' AND especialidad='$especialidad'";
	$resultado = query($sql, $conexion);
	$campo = mysql_fetch_array($resultado);
	$id_trabajador = $campo['id_trabajador'];
	
	$sql = "SELECT `id_enlace` FROM Enlace ORDER BY `id_enlace` DESC LIMIT 1";
	$resultado = query($sql, $conexion);
	$campo = mysql_fetch_row($resultado);
	$id_enlace = $campo[0] + 1;
	
	$fecha = date('d.m.y');
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

	if ($id_enlace == "") 
	{
		$id_enlace = 1;
	}
	
	$sqla = "INSERT INTO `Enlace` (id_enlace, id_usuario, id_trabajador, descripcion, fecha, hora) values ('$id_enlace', '$id_usuario', '$id_trabajador', '$descripcion', '$fecha', '$tiempo')";
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

	La consulta se ha enviado exitosamente, recibir&aacute; su respuesta en breve.

</h2>


<br />
<br />
<br />
<a href="usuario.php"  class="bt">Regresar</a>
</div>
</div>	
<body>
</html>