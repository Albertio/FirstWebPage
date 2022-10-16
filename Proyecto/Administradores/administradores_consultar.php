<?php
	//administradores_elimina.php
	require "Funciones/conecta.php";
	$con = conecta();

	//Recibe variables
	$id = $_REQUEST['id'];

	//Redirecciona a otro archivo
	echo "<a href=\"administradores_lista.php\">Regresar a Lista</a><br><br>";
	
	$sql = "SELECT * FROM administradores
			WHERE id = $id
			AND eliminado = 0;";
	$res = $con->query($sql);


	$row = $res->fetch(PDO::FETCH_ASSOC); 

	$id = $row["id"];
	$nombre = $row["nombre"];
	$apellidos = $row["apellidos"];
	$correo = $row["correo"];
	$archivo = $row["archivo"];
	$archivo_n = $row["archivo_n"];

	if($row["rol"] == "1")
	{
		$rol = "Gerente";
	}
	else if($row["rol"] == "2")
	{
		$rol = "Ejecutivo";
	}
	else
	{
		$rol = "Undefinied";

	}

	if($row["status"] == "1")
	{
		$status = "Activo";
	}
	else
	{
		$status = "Inactivo";
	}

	echo '<div class = "Fila2", id = "'.$id.'">';
		echo '<h3>ID: </h3>' . "$id" . '<br>';
		echo "<img src='Archivos/$archivo', width = 200, height = 200>" . '<br>';
	    echo '<h3>Nombre del Archivo: </h3>' . "$archivo_n" . '<br>';
 		
		echo '<h3>Nombre: </h3>' . "$nombre" . " " . "$apellidos" . '<br>';
		echo '<h3>Correo: </h3>' . "$correo" . '<br>';
		echo '<h3>Rol: </h3>' . "$rol" . '<br>';
		echo '<h3>Status: </h3>' . "$status" . '<br>';
	echo '</div>';

	
?>