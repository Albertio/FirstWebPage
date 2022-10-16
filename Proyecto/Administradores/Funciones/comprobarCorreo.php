<?php
	//comprobarCorreo.php
	require "conecta.php";
	$con = conecta();

	//Recibe variables
	$correo = $_REQUEST['correo'];
	$retorno = 0;

	$sql = "SELECT COUNT(id) FROM administradores WHERE correo = '$correo' AND eliminado = 0";
	$num = $con->query($sql);

	$result = $num->fetch();
	$count = $result[0];
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