<?php
	//banners_salva.php

	require "Funciones/conecta.php";
	$con = conecta();

	//Recibe Variables
	$nombre = $_POST['nombre'];
	$archivo_n = '';
	$archivo = '';

////////////////////////////////////////////////////////////////////////////////////
    $file_name = $_FILES['archivo']['name'];    //Nombre real del archivo
    $file_tmp = $_FILES['archivo']['tmp_name']; //Nombre temporal del archivo
    $cadena = explode(".", $file_name);         //Tomar solo el ultimo substrings tras "."
    $ext = $cadena[1];
    $dir = "Archivos/";
    $file_enc = md5_file($file_tmp);

    if($file_name != '')
    {
        $fileName1 = "$file_enc" . "." . "$ext";
        copy($file_tmp, $dir.$fileName1);
    }
////////////////////////////////////////////////////////////////////////////////////
	$archivo_n = $file_name;
	$archivo = $file_enc . "." . $ext; 
	
	$sql = "INSERT INTO banners
			(nombre, archivo)
			VALUES ('$nombre', '$archivo')";
					 
	$res= $con->query($sql);
	header("Location: banners_lista.php");
?>