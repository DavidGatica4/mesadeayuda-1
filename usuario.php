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


if (document.form.nombre.value.length==0){
alert("Tiene que escribir su nombre")
document.form.nombre.focus()
return 0;
}
if ((regexp.test(document.form.email.value) == 0) || (document.form.email.value.length = 0)){
alert("Introduzca una dirección de email válida");
document.form.email.focus();
return 0;
} else {
var c_email=true;
}


if (document.form.area.selectedIndex==0){
alert("Tiene que seleccionar un Area ")
document.form.area.focus()
return 0;
}

if (document.form.espec.selectedIndex==0){
alert("Tiene que seleccionar una especialidad ")
document.form.espc.focus()
return 0;
}






//PAra enviar el formulario
document.form.submit();
alert("tu consulta fue enviada ")
}


</script>
 
 
<body>
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
/*
$sql="select * from tabla";
$result= mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)==0) die("No hay registros para mostrar");


echo "<table border=1 cellpadding=4 cellspacing=0>";


 echo "<tr>
         <th colspan=5> Consultas </th>
       <tr>
         <th> IDc </th><th>fecha  </th><th>&Aacute;rea  </th>
         <th> Especialidad</th><th> Respuesta</th>
      </tr>";


while($row=mysql_fetch_array($result))
{
 echo "<tr>
         <td align='right'> $row[idc] </td>
         <td> $row[fecha] </td>
         <td> $row[Area] </td>
         <td> $row[especialidad] </td>
         <td> $row[Respuesta] </td>
      </tr>";
}
echo "</table>";
*/
?>


</div> 
 
<div id="marco2">
<h2>Realizar consulta </h2>
<form id="form" name="form" method="POST" action="nueva_consulta.php">


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
                echo '<select id=bajaselect name=area>';
                while ($campo = mysql_fetch_array($resultado)) {
                    echo '<option>' . $campo["area"] ;
                }
                echo '</select>';
				?>
</td>
</tr>

<tr>
<td width="270" align="left" valign="top">
<label for="espec">*Especialidad:</label>
<?
                $sql = "SELECT `especialidad` FROM `Trabajador` ORDER BY `especialidad`";
                $resultado = query($sql, $conexion);
				
                //Generamos el menu desplegable
                echo '<select id=bajaselect name=area>';
                while ($campo = mysql_fetch_array($resultado)) {
                    echo '<option>' . $campo["especialidad"] ;
                }
                echo '</select>';
				?>
</td>
</tr>

<tr>
<td width="250" align="left" valign="top">&nbsp;
<label for="message">Descripci&oacute;n:</label> 
<textarea name="message" cols="40" rows="6" required></textarea>	
</label>
</td>
</tr>

</table></td>
</tr>

<td width="504"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
<tr>

<td width="20" align="left" valign="top">&nbsp;</td>
<td align="right" valign="top"><input name="Bot&oacute;n" type="button" onclick="valida_envia()" class="bt" id="Enviar" value="Enviar" / />
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
 
</body>
</html>