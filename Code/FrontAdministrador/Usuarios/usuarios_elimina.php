<?php
	//usuarios_elimina.php
	require "../Funciones/conecta.php";
	$con = conecta();

	//Recibe variables
	$id = $_REQUEST['id'];

	//Generar instruccion SQL
	$sql = "SELECT COUNT(id) FROM usuarios WHERE id = $id AND eliminado = 0";
	$num = $con->query($sql);

	//Cuantos regreso
	$count = $num->fetch_array()[0];

	if($count > 0) {
		//Eliminar el registro
		//$sql = "DELETE FROM usuarios WHERE id = $id";
		//Actualizar el registro
		
		$sql = "UPDATE usuarios SET eliminado = 1 WHERE id = $id";
		$res = $con->query($sql);
		
		$retorno = 1;

	}else{
		$retorno = 0;

	}

	echo $retorno;
?> 