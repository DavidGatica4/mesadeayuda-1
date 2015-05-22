
<?php
@session_start();
//incluimos el archivo con las funciones
include ("funciones_mysql.php");


$conexion = conectar();
			
$tipo = $_POST['tipo'];

$id_usuario=$_POST['id_usuario'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$area = $_POST['area'];
$especialidad = $_POST['especialidad'];
$domicilio = $_POST['estado'];
$password= $_POST['password'];
if($tipo==Trabajador){
	
	$sqla = "INSERT INTO `Trabajador` (id_trabajador, nombre, apellidos, correo, telefono, domicilio, password, area, especialidad) values ('$id_usuario', '$nombre', '$apellidos', '$correo','$telefono','$domicilio','$password', '$area','$especialidad')";
$resultadoa = query($sqla, $conexion);
}
else{
$sqla = "INSERT INTO `Usuario` (id_usuario, nombre, apellidos, correo, telefono, domicilio, password) values ('$id_usuario', '$nombre', '$apellidos', '$correo', '$telefono', '$domicilio', '$password')";
$resultadoa = query($sqla, $conexion);
}
?>

<style type="text/css">

*
{
	
}

input:focus
{
	border-color: #85CCEA;
	box-shadow: 0 0 2px #5cd053;
	padding: 0.4em 1em 0.4em 0.5em;
	
}

.verdesin:focus
{
	border-color: #85CCEA;
	box-shadow: 0 0 2px #5cd053;
	padding: 0.4em 1em 0.4em 0.5em;
}

#caja
{
margin: 0 auto;
margin-top: 8em;
width: 37.7em;
height: auto;
padding: 2em;
box-sizing: border-box;
background: #EDF1FC;
border-radius: 10px;
}

#botonc
{
	margin: 0 auto;
	text-align: center;
}

body
{
background: #85CCEA;
font-family: Century Gothic,CenturyGothic,AppleGothic,sans-serif;
font-size: 16px;
}

h1
{
	color: black;
	text-align: center;
}

h2
{
	color: black;
	text-align: center;
}

h4
{
	color: white;
	text-align: center;
}

.inputform
{
	border-color: #BEC4D3;
	width: 15em;
padding: 4px 8px;
border-style: solid;
border-width: 2px;
margin-right: 2em;
transition: padding .25s;

}

.inputform2
{
	border-color: #BEC4D3;
	width: 33.4em;
padding: 4px 8px;
border-style: solid;
border-width: 2px;
margin-right: 2em;
transition: padding .25s;

}

.inputform3
{
	border-color: #BEC4D3;
	width: 8em;
padding: 4px 8px;
border-style: solid;
border-width: 2px;
margin-left: 0.5em;
transition: padding .25s;

}

.izqder
{
	float: left;
}

.centrar
{
	text-align: center;
	margin: 0 auto;
}

#base
{
	color: white;
	font-size: 0.8em;
	float: right;
	font-weight: bold;	
}

.break
{
clear: both;
}

.letracolor
{
	color: #BEC5D3;
}

#boton
{
	border: none;
	background: #F26F4B;
	padding: 1em;
	border-radius: 50px;
	font-weight: bold;
	transition: padding .5s;
	text-decoration: none;
	color: black;
}

#boton:active
{
	border-color: #85CCEA;
	box-shadow: 0 0 5px black;
	padding: 1.1em;
}

.bold
{
	font-weight: bold;
}

</style>

<body>

<div id="caja">
<h1>Usted se ha registrado</h1>
</div>
<br />
<br />
<div class="centrar">
<a href="index.html" id="boton">Regresar</a>
</div>
</body>


