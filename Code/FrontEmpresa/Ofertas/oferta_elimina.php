<?php
	//productos_elimina.php
	require "../Funciones/conecta.php";
	$con = conecta();

	//Recibe variables
	$id_primary = $_POST['primary'];
	$id_usuario = $_POST['usuario'];
	$sql = "SELECT COUNT(id) FROM ofertas WHERE id_primary = $id_primary AND eliminado = 0 and id = $id_usuario";
	$num = $con->query($sql);

	$count = $num->fetch_array()[0];

	if($count > 0)
	{
		$sql = "UPDATE ofertas SET eliminado = 1 WHERE id_primary = $id_primary and id = $id_usuario";
		$res = $con->query($sql);	
		$retorno = 1;
	}
	else
	{
		$retorno = 0;
	}

	echo $retorno;
?> 