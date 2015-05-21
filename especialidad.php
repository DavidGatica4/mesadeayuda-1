<?php 
	@session_start();
	include("funciones_mysql.php");
	$conexion=conectar();
	
	$usuario=$_SESSION['usuario'];
	
	$area=$_POST['area'];
	

?>

<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="images/icono.ico">
<meta http-equiv="Content-Type" content="text/html"/>
  <title>Usuario</title>
  <link rel="stylesheet" type="text/css" href="estiloUsuario.css" />
</head>
<body>
<form>
<?
                $sql = "SELECT `area` FROM `Trabajador` ORDER BY `area`";
                $resultado = query($sql, $conexion);
				
                //Generamos el menu desplegable
                echo '<select id=bajaselect name=area>';
                while ($campo = mysql_fetch_array($resultado)) {
                    echo '<option>' . $campo["area"] ;
                }
                echo '</select>';
				?>
				
<body>
</html>