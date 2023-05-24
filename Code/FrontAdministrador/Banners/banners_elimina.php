<?php
	//banners_elimina.php
	require "Funciones/conecta.php";
	$con = conecta();

	//Recibe variables
	$id = $_REQUEST['id'];

	$sql = "SELECT COUNT(id) FROM banners WHERE id = $id AND eliminado = 0";
	$num = $con->query($sql);

	//$result = $num->fetch();
	//$count = $result[0];

	$count = $num->fetch_array()[0];

	if($count > 0) {
		$sql = "UPDATE banners SET eliminado = 1 WHERE id = $id";
		$res = $con->query($sql);
		
		$retorno = 1;

	}else{
		$retorno = 0;

	}

	echo $retorno;
	

	//Redirecciona a otro archivo
	//header("Location: banners_lista.php");
?> 