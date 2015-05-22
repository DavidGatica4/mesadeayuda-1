<?php
session_start();

//incluimos el archivo con las funciones
include ("funciones_mysql.php");

$conexion = conectar();

$_SESSION['usuario'] = $_POST['usuario'];
$_SESSION['password'] = $_POST['password'];

$id_usuario = $_SESSION['usuario'];
$password = $_SESSION['password'];

$usuario = 'ninguno';
$pass = 'ninguno';

    if ($usuario == "ninguno" AND $pass=="ninguno") {
		header("Location: index.html");
    }
	else{

$query = "SELECT * FROM `Usuario` WHERE `id_usuario`='$id_usuario' and `password`='$password'";
$result = mysql_query($query, $conexion);
while ($row = mysql_fetch_assoc($result)) {
    if ($row['id_usuario'] == $id_usuario) {
        $usuario = $row['id_usuario'];
        $pass = $row['password'];
		@header("Location: usuario.php");
    }
}

$query = "SELECT * FROM `Trabajador` WHERE `id_trabajador`='$id_usuario' and `password`='$password'";
$result = mysql_query($query, $conexion);
while ($row = mysql_fetch_assoc($result)) {
    if ($row['id_trabajador'] == $id_usuario) {
        $usuario = $row['id_trabajador'];
        $pass = $row['password'];
		header("Location: trabajador.php");
    }
}

	}

?>