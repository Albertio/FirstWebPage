<?php
	//Alta.php

	require "conecta.php";
	$con = conecta();

	//Recibe Variables
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$pass = $_POST['password'];
	$url = $_POST['url'];

	$passEnc = md5($pass);

	$foto_n = '';
	$foto = '';

	$cv_n = '';
	$cv = '';

	//Foto
	$file_name = $_FILES['archivo']['name'];    //Nombre real del archivo
    $file_tmp = $_FILES['archivo']['tmp_name']; //Nombre temporal del archivo
    $cadena = explode(".", $file_name);         //Tomar solo el ultimo substrings tras "."
    $ext = $cadena[1];
    $dir = "../../FrontAdministrador/Usuarios/Archivos/";
    $file_enc = md5_file($file_tmp);

    if($file_name != '')
    {
        $fileName1 = "$file_enc" . "." . "$ext";
        copy($file_tmp, $dir.$fileName1);
    }
	$foto_n = $file_name;
	$foto = $file_enc . "." . $ext; 

	//CV
	$file_name = $_FILES['cv']['name'];    //Nombre real del archivo
    $file_tmp = $_FILES['cv']['tmp_name']; //Nombre temporal del archivo
    $cadena = explode(".", $file_name);         //Tomar solo el ultimo substrings tras "."
    $ext = $cadena[1];
    $dir = "../../FrontAdministrador/Usuarios/Archivos/";
    $file_enc = md5_file($file_tmp);

    if($file_name != '')
    {
        $fileName1 = "$file_enc" . "." . "$ext";
        copy($file_tmp, $dir.$fileName1);
    }
	$cv_n = $file_name;
	$cv = $file_enc . "." . $ext; 


	$sql = "INSERT INTO usuarios
			(nombre, correo, pass, rol, archivo_perfil_n, archivo_perfil, archivo_cv_n, archivo_cv, url)
			VALUES ('$nombre', '$correo', '$passEnc', '1', '$foto_n', '$foto', '$cv_n', '$cv', '$url')";
					 
	$res= $con->query($sql);
	header("Location: ../Login.php");
?>