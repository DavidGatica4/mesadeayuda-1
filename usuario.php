<?php 
	@session_start();
	include("funciones_mysql.php");
	$conexion=conectar();
	
	$usuario=$_SESSION['usuario'];
	
	 $sql = "SELECT * FROM `Usuario` WHERE `id_usuario`='$usuario'";
     $resultado = query($sql, $conexion);
     $campo = mysql_fetch_array($resultado);
     $correo = $campo['correo'];
	 $nombre = $campo['nombre'];
	 $apellidos = $campo['apellidos'];
	 $nombre_completo=$nombre . " " . $apellidos; 
?>

<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="images/icono.ico">
<meta http-equiv="Content-Type" content="text/html"/>
  <title>Usuario</title>
  <link rel="stylesheet" type="text/css" href="estiloUsuario.css" />
</head>
 <script type="text/javascript">


function valida_envia(){

//Validaciones de todo
var regexp = /^[0-9a-zA-Z._.-]+\@[0-9a-zA-Z._.-]+\.[0-9a-zA-Z]+$/;


if (document.form.espec.selectedIndex==0){
alert("Tiene que seleccionar una especialidad ")
document.form.espc.focus()
return 0;
}

if (document.form.desc.selectedIndex==0){
alert("Tiene que seleccionar una descripcion")
document.form.espc.focus()
return 0;
}


//PAra enviar el formulario
document.form.submit();
alert("tu consulta fue enviada ")
}


</script>
 
 
<body>
 <div id="centro">
<h1>Mesa de ayuda secci&oacute;n usuario</h1>
 
<div id="columna">
<h2>Men&uacute;</h2>
<ul>
  <li><a href="#marco1">Consultas Anteriores</a></li>
  <br>
  <li><a href="#marco2">Realizar consulta</a></li>
  <br>
  <li><a href="#marco3">Cerrar sesi&oacute;n </a></li>
</ul>
</div>
 
 
 
 

<div id="contenido">
<div id="marco1">
<br />
<h2>Consultas anteriores </h2>
<?php

?>


</div> 
 
<div id="marco2">
<h2>Realizar consulta </h2>
<form id="form" name="form" method="POST" action="especialidad.php">


<table width="600" border="0" align="center" cellpadding="0" cellspacing="0" top= "80px">
<tr>
<td width="504"><table width="560" border="0" align="left" cellpadding="0" cellspacing="0">
<tr>
<td width="270" align="left" valign="top">
<label>*Nombre:<br />
<input name="nombre" type="text" class="campo" id="nombre" value="<?php echo $nombre_completo;?>" disabled="disabled"/>
</label>
</td>
<td width="20" align="left" valign="top">&nbsp;</td>
<td width="270" align="left" valign="top">
</tr>


<tr>
<td width="270" align="left" valign="top">
<label>*Email:<br />
<input name="email" type="text" class="campo" id="email" value="<?php echo $correo;?>" disabled="disabled"/>
</label>
</td>
</tr>


<tr>
<td width="270" align="left" valign="top">
<label for="area">*&Aacute;rea:</label>
<?
                $sql = "SELECT `area` FROM `Trabajador` ORDER BY `area`";
                $resultado = query($sql, $conexion);
				
                //Generamos el menu desplegable
                echo '<select id="bajaselect" name="area">';
                while ($campo = mysql_fetch_array($resultado)) {
                    echo '<option>' . $campo["area"] ;
                }
                echo '</select>';
				?>
</td>
</tr>

<tr>

</tr>

<tr>
<td width="250" align="left" valign="top">&nbsp;
<label for="message">Descripci&oacute;n:</label> 
<textarea name="descripcion" cols="40" rows="6"></textarea>	
</label>
</td>
</tr>

</table></td>
</tr>

<td width="504"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
<tr>

<td width="20" align="left" valign="top">&nbsp;</td>
<td align="center" valign="top"><input name="Bot&oacute;n" type="submit" onclick="valida_envia()" class="bt" id="Enviar" value="Enviar" / />
<br /></td>
</tr>
</table></td>
</tr>
</table>
<input type="hidden" name="MM_insert" value="form1" />

</form>




</div>


<div id="marco3">
<br />
<h2>Cerrar sesi&oacute;n</h2>
 </div>
</div>
 </div>
</body>
</html>