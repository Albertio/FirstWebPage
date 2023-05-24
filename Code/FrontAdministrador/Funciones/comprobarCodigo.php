<?php
	//comprobarCorreo.php
	require "conecta.php";
	$con = conecta();

	//Recibe variables
	$codigo = $_REQUEST['codigo'];
	$retorno = 0;

	$sql = "SELECT COUNT(id) FROM productos WHERE codigo = '$codigo' AND eliminado = 0";
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