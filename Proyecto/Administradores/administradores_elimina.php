<?php
	//administradores_elimina.php
	require "Funciones/conecta.php";
	$con = conecta();

	//Recibe variables
	$id = $_REQUEST['id'];
	$retorno = 0;

	$sql = "SELECT COUNT(id) FROM administradores WHERE id = $id AND eliminado = 0";
	$num = $con->query($sql);

	$result = $num->fetch();
	$count = $result[0];

	if($count > 0) {
		//Eliminar el registro
		//$sql = "DELETE FROM administradores WHERE id = $id";
		//Actualizar el registro
		
		$sql = "UPDATE administradores SET eliminado = 1 WHERE id = $id";
		$res = $con->query($sql);
		
		$retorno = 1;
	}else {
		$retorno = 0;
	}

	echo $retorno;

	//Redirecciona a otro archivo
	//header("Location: administradores_lista.php");
?> 