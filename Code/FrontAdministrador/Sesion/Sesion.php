<?php
	//Sesion.php
	require "../Administradores/Funciones/conecta.php";
	$con = conecta();

	//Variables para buscar
	$correo = $_REQUEST['correo'];
	$pass = $_REQUEST['pass'];

	$passEnc = md5($pass);
	
	//Variables a encontrar
	$nombre = "";
	$apellido = "";

	
	$sql = "SELECT nombre FROM usuarios WHERE correo = \"$correo\" AND eliminado = 0 AND pass = \"$passEnc\"";

	$nombre = $con->query($sql);

	$sql = "SELECT apellidos FROM usuarios WHERE correo = \"$correo\" AND eliminado = 0 AND pass = \"$passEnc\"";

	$apellido = $con->query($sql);

	session_start();

	$_SESSION['nombre'] = $nombre->fetch_array()[0];
	$_SESSION['apellido'] = $apellido->fetch_array()[0];

	$retorno = 1;

	echo $retorno;
?>