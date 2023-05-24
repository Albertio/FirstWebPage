<?php
	//comprobarCorreoEditado.php
	require "conecta.php";
	$con = conecta();

	//Recibe variables
	$correo = $_REQUEST['correo'];
	$id = $_REQUEST['id'];
	$retorno = 0;

	$sql = "SELECT COUNT(id)
		 	FROM usuarios 
			WHERE correo = '$correo' 
			AND eliminado = 0
			AND id != '$id'";

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