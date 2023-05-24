<?php
	//banners_elimina.php
	require "conecta.php";
	$con = conecta();

	//Recibe variables
	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$archivo = '';

	$file_name = $_FILES['archivo']['name'];    //Nombre real del archivo
	

	if($file_name != '')
	{
		$file_tmp = $_FILES['archivo']['tmp_name']; //Nombre temporal del archivo
		$cadena = explode(".", $file_name);         //Tomar solo el ultimo substrings tras "."
		$ext = $cadena[1];
		$dir = "../Archivos/";
		$file_enc = md5_file($file_tmp);

		$fileName1 = "$file_enc" . "." . "$ext";
		copy($file_tmp, $dir.$fileName1);

		$archivo_n = $file_name;
		$archivo = $file_enc . "." . $ext; 

		$sql = "UPDATE banners
		SET archivo = '$archivo'
		WHERE id = '$id'
		AND eliminado = 0;";
		$num = $con->query($sql);
	}

	$sql = "UPDATE banners
		SET nombre = '$nombre'
		WHERE id = '$id'
		AND eliminado = 0;";
	
	$num = $con->query($sql);

	header("Location: ../banners_lista.php");
?> 