<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CONTACTO</title>
	<link href="estilos2.css" rel="stylesheet" >
</head>
<body>
<div id="ini"><h1 align="center">CONTACTANOS</h1><img src="imagenes/icon8.png"><img src="imagenes/icon9.png"><img src="imagenes/icon10.png"><img src="imagenes/icon11.png"></div>
<?php
$mysqli = new mysqli("localhost", "root", "", "empdosificador");
if ($mysqli === false) {
die("ERROR: No fue posible conectarse con la base de datos. " .
mysqli_connect_error());
}
// si el formulario ha sido enviado
// procesa los datos del formulario
if (isset($_POST['submit'])) {
// abre bloque de mensaje
// recupera y verifica los valores de entrada
$inputError = false;
if (empty($_POST['emp_nombres'])) {
echo 'ERROR: Por favor ingrese un nombre de empleado válido';
$inputError = true;
} else {
$nombres = $mysqli->escape_string($_POST['emp_nombres']);
}
if ($inputError != true && empty($_POST['emp_apellidos'])) {
echo 'ERROR: Por favor ingrese los apellidos válido';
$inputError = true;
} else {
	$apellidos = $mysqli->escape_string($_POST['emp_apellidos']);
}
if ($inputError != true && empty($_POST['emp_correo'])) {
echo 'ERROR: Por favor ingrese un correo válido';
$inputError = true;
} else {
	$correo = $mysqli->escape_string($_POST['emp_correo']);
}
if ($inputError != true && empty($_POST['emp_telefono'])) {
echo 'ERROR: Por favor ingrese un telefono válido';
$inputError = true;
} else {
	$telefono = $mysqli->escape_string($_POST['emp_telefono']);
}
if ($inputError != true && empty($_POST['emp_mensaje'])) {
echo 'ERROR: Por favor ingrese un mensaje válido';
$inputError = true;
} else {
	$mensaje = $mysqli->escape_string($_POST['emp_mensaje']);
}
// añade valores a la base de datos utilizando el consulta INSERT
if ($inputError != true) {
$sql = "INSERT INTO contacto (nombres, apellidos,correo,telefono,mensaje)
VALUES ('$nombres', '$apellidos','$correo', '$telefono','$mensaje')";
if ($mysqli->query($sql) === false) {
echo "ERROR " .$mysqli->error;
} else{
	echo "<center><b>!Mensaje enviado!</b></center>";
}
}
}
?>
<form id="contenidos" action="contacto2.php" method="POST">
<center>
<h3>¡Contactanos para más información¡</h3>
<label>Nombres:</label> <br />
<input type="text" REQUIRED name="emp_nombres" size="40" placeholder="Nombres..." /> <br /> <br />
<label>Apellidos:</label><br />
<input type="text" REQUIRED name="emp_apellidos" size="40"placeholder="Apellidos..." /> <br /> <br />
<label>Correro:</label><br />
<input type="text" REQUIRED name="emp_correo" size="40"placeholder="Correo..." /> <br /> <br />
<label>Teléfono:</label><br />
<input type="text" REQUIRED name="emp_telefono" size="40"placeholder="Teléfono..." /> <br /> <br />
<label>Mensaje:</label><br />
<input type="text" REQUIRED name="emp_mensaje" size="40"placeholder="Mensaje..." /> <br /> <br />
</center>
<input id="bu" type="submit" REQUIRED name="submit" value="ENVIAR">
<a href="index2.html"><input id="bu2" type="button" value="REGRESAR"></a>
</form>
</body>
</html>
