<?php
	//usuariosLogin.php
	require "conecta.php";
	$con = conecta();

	//Recibe variables
	$correo = $_REQUEST['correo'];
	$pass = $_REQUEST['pass'];
	$retorno = 0;
    $passEnc = md5($pass);
	
	$sql = "SELECT COUNT(correo) FROM usuarios WHERE correo = \"$correo\" AND pass = \"$passEnc\"";
	$num = $con->query($sql);

	$count = $num->fetch_array()[0];

	if($count > 0)
    {	
		$retorno = 1;

	}
	else
    {
		$retorno = 0;
	}

	echo $retorno;
?> 