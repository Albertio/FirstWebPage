<?php
	//Meter al carrito.php
	require "../Funciones/conecta.php";
	$con = conecta();
    
	//Recibe Variables
	$id_usuario = $_POST['id_usuario'];
    $id_oferta = $_POST['id_oferta'];
    $fecha = date('Y-m-d H:i:s');
    

    //Agremos a ofertas_solicitadas
	$sql = "INSERT INTO ofertas_solicitadas (fecha, id_usuario, estado, eliminado, id_oferta)
			VALUES ('$fecha', '$id_usuario', '0', '0', '$id_oferta')";

	$res = $con->query($sql);
    
    $retorno = 1;
    echo $retorno;
?>