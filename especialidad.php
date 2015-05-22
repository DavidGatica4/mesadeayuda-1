<?php 
	@session_start();
	include("funciones_mysql.php");
	$conexion=conectar();	
	
		
	$usuario=$_SESSION['usuario'];
	
	$_SESSION['area']=$_POST['area'];
	$area = $_SESSION['area'];
	$_SESSION['descripcion']=$_POST['descripcion'];


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

	Especialidad

</h2>

<br />
<br />
<br />
<form method="POST" action="consulta.php">
<?
                $sql = "SELECT * FROM `Trabajador` WHERE `area`='$area'";
                $resultado = query($sql, $conexion);
				
                //Generamos el menu desplegable
                echo '<select id=bajaselect name=especialidad>';
                while ($campo = mysql_fetch_array($resultado)) {
                    echo '<option>' . $campo["especialidad"] ;
                }
                echo '</select>';
?>
<br />
<br />
<br />
<input type="submit"  class="bt" value="Enviar" />
</div>
</div>	
<body>
</html>