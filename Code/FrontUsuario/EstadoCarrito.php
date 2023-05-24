<?php
	require "Funciones/conecta.php";
	$con = conecta();

	$id_usuario = $_REQUEST['id_usuario'];

	$sql = "SELECT * FROM ofertas_solicitadas WHERE id_usuario = $id_usuario AND eliminado = 0 ";

	$num = $con->query($sql);

	$count = $num->fetch_array();
	foreach($num as $row)
	{
		if($row["id_usuario"] > 0)
		{
			$id_usuario = $row["id_usuario"];
		}
	}
	$sql = "SELECT * FROM ofertas_solicitadas
	WHERE id_usuario = $id_usuario AND eliminado = 0";

	$res = $con->query($sql);

	$count = mysqli_num_rows($res);
	echo "$count";

	?>