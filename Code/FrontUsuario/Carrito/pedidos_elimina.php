<?php
	require "../Funciones/conecta.php";
	$con = conecta();

	//Recibe variables
	$id_oferta = $_REQUEST['id_oferta'];
	$id_usuario = $_REQUEST['id_usuario'];

	$sql = "SELECT COUNT(id_oferta) FROM ofertas_solicitadas WHERE id_oferta = $id_oferta AND eliminado = 0";
	$num = $con->query($sql);

	$count = mysqli_num_rows($num);
	
	if($count > 0){
		$sql = "UPDATE ofertas_solicitadas SET eliminado = 1 WHERE id_oferta = $id_oferta";
		$res = $con->query($sql);
		
		$retorno = 1;

	}else{
		$retorno = 0;

	}
	$res = $con->query($sql);

	echo $retorno;
	
?> 