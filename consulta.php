<?php 
	@session_start();
	include("funciones_mysql.php");
	$conexion=conectar();	
	
		
	$usuario=$_SESSION['usuario'];	
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
	
	$fecha = date('y.m.d');
	$hora = time('H.i.s');
	
	echo $hora;

	if ($id_enlace == "") 
	{
		$id_enlace = 1;
	}
	
	$sqla = "INSERT INTO `Enlace` (id_enlace, id_usuario, id_trabajador, descripcion) values ('$id_usuario', '$nombre', '$apellidos', '$correo', '$telefono', '$domicilio', '$password')";
	$resultadoa = query($sqla, $conexion);

?>