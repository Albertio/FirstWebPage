<?php
	//Sesion.php
	require "../Funciones/conecta.php";
	$con = conecta();

	//Variables para buscar
	$correo = $_REQUEST['correo'];
	$pass = $_REQUEST['pass'];
	$rol = "0";

	$passEnc = md5($pass);
	
	//Variables a encontrar
	$nombre = "";
	$id = "";
	
	$sql = "SELECT nombre FROM usuarios WHERE correo = \"$correo\" AND pass = \"$passEnc\"";
	$nombre = $con->query($sql);

	$sql = "SELECT id FROM usuarios WHERE correo = \"$correo\" AND pass = \"$passEnc\"";
	$id = $con->query($sql);

	$sql = "SELECT rol FROM usuarios WHERE correo = \"$correo\" AND pass = \"$passEnc\"";
	$rol = $con->query($sql);

	session_start();

	$_SESSION['nombre'] = $nombre->fetch_array()[0];
	$_SESSION['id'] = $id->fetch_array()[0];
	$_SESSION['rol'] = $rol->fetch_array()[0];

	$retorno = 1;

	echo $retorno;
?>