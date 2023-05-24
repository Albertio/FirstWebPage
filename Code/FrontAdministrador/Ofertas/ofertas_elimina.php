<?php
	//productos_elimina.php
	require "../Funciones/conecta.php";
	$con = conecta();

	//Recibe variables
	$id = $_REQUEST['id'];

	$sql = "SELECT COUNT(id) FROM ofertas WHERE id = $id AND eliminado = 0";
	$num = $con->query($sql);
	$count = $num->fetch_array()[0];

	if($count > 0)
	{
		$sql = "UPDATE ofertas SET eliminado = 1 WHERE id = $id";
		$res = $con->query($sql);	
		$retorno = 1;
	}
	else
	{
		$retorno = 0;
	}

	echo $retorno;
?> 