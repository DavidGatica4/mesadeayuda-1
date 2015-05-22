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
<div id="barra">
        <div class="CSSTableGenerator" >
 <table>

                <tr>

                    <td width="15%">Consulta No.</td>
                    <td width="50%">Nombre</td>
                    <td width="15%">Fecha</td>
                    <td width="20%">Revisar</td>


                </tr>

                <?php
//Obtener Datos de la empresa a cambiar "tabla clientes"
                $sql = "SELECT * FROM `Enlace` WHERE `id_usuario` = '$usuario' ORDER BY id_enlace DESC";
                $resultado = query($sql, $conexion);
                while ($campo = mysql_fetch_array($resultado)) {
					$id_enlace = $campo['id_enlace'];
                    $id_trabajador = $campo['id_trabajador'];
                    $fecha = $campo['fecha'];
					
					$sql2 = "SELECT * FROM `Trabajador` WHERE `id_trabajador` = '$id_trabajador'";
					$resultado2 = query($sql2, $conexion);
					$campo = mysql_fetch_array($resultado2);
					
						$nombre = $campo['nombre'];
						$apellidos = $campo['apellidos'];

                    echo "<tr>";

                    echo "<td align='center'>" . $id_enlace . "</td>";

                    echo "<td align='center'>" . $nombre . " " . $apellidos . "</td>";

                    echo "<td>" . $fecha . "</td>";

                    echo "<td height='35px'> " . "<a href='usuario.php?id_enlace=$id_enlace#marco4'>Revisar</a></td>";
                    echo "</tr>";
					
                }
                ?>
            </table>
</div>
</div>
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

    <body>		
				<br />
				<br />
				<br />
                <h2>Realmente desea cerrar sesi&oacute;n?</h2>
				<div class="centrar">
				<br />
				<br />
				<br />
				<a href="cerrarsesion.php" class="bt">Si</a>
				</div>

                </body>
                </html>
 </div>
 
 <div id="marco4"> 
 <br />
<h2>Revisi&oacute;n </h2>

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
				$id_enlace = $_GET['id_enlace'];
                $sql = "SELECT * FROM `Enlace` WHERE id_enlace='$id_enlace'";
                $resultado = query($sql, $conexion); 
				$campo = mysql_fetch_array($resultado);
				$id_trabajador = $campo['id_trabajador'];
				$descripcion = $campo['descripcion'];				
				
				$sql = "SELECT * FROM `Trabajador` WHERE `id_trabajador`='$id_trabajador'";
                $resultado = query($sql, $conexion);
				$campo = mysql_fetch_array($resultado);
				$area = $campo['area'];
				$especialidad = $campo['especialidad'];
				
                //Generamos el menu desplegable
                echo '<input type="text" id="bajaselect" value="'.$area.'" disabled>';
                echo '<br/><br/><label for="area">*Especialidad:</label> <input type="text" id="bajaselect" value="'.$especialidad.'" disabled>';
				?>

</tr>

<tr>

</tr>

<tr>
<td width="250" align="left" valign="top">&nbsp;
<label for="message">Mensajes:</label>
<?php 

	$_SESSION['id_enlace']=$id_enlace;
echo '<form action="actualizac_usuario.php" method="POST">';
?>
<textarea name="descripcion" cols="40" rows="6"><?php echo $descripcion;?></textarea>	
</label>
</td>
</tr>

</table></td>
</tr>

<td width="504"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
<tr>

<td width="20" align="left" valign="top">&nbsp;</td>
<td align="center" valign="top">
<input  type="submit" id="Enviar" class="bt" value="Enviar" / />
<br /></td>
</tr>
</table></td>
</tr>
</table>
<input type="hidden" name="MM_insert" value="form1" />

</form>


<?php 
 
	$id_enlace = $_GET['id_enlace'];	
 
 ?>
</div>
 </div>
</body>
</html>