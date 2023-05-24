<?php
	//Meter al carrito.php
	require "../Funciones/conecta.php";
	$con = conecta();
    
	//Recibe Variables
	$id_usuario = $_POST['id_usuario'];
	$id = $_POST['id_oferta'];
    $id_primary = $_POST['id_primary'];
    $fecha = date('Y-m-d H:i:s');
    
	$sql = "SELECT * FROM ofertas_solicitadas WHERE id_usuario = $id_usuario and id_primary = $id_primary and eliminado = 0 and id_oferta = $id";

	$res = $con->query($sql);

	$count = 0;
	$count = mysqli_num_rows($res);
	if($count <= 0)
	{
		//Agremos a ofertas_solicitadas
		$sql = "INSERT INTO ofertas_solicitadas (fecha, id_usuario, estado, eliminado, id_oferta, id_primary)
		VALUES ('$fecha', '$id_usuario', '0', '0', '$id', '$id_primary')";

		$res = $con->query($sql);
	}
    
    $retorno = 1;
    echo $retorno;
?>