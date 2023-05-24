<?php
	//administradores_elimina.php
	require "conecta.php";
	$con = conecta();

	//Recibe variables
	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$pass = $_POST['password'];
	$archivo = '';
	$archivo_n = '';
	
	$url = $_POST['url'];
	if($pass != "")
	{
		$passEnc = md5($pass);
		$sql = "UPDATE usuarios
			SET pass = '$passEnc'
			WHERE id = '$id'
			AND eliminado = 0;";
	
		$num = $con->query($sql);
	}

	$file_name = $_FILES['archivo']['name'];    //Nombre real del archivo
	

	if($file_name != '')
	{
		$file_tmp = $_FILES['archivo']['tmp_name']; //Nombre temporal del archivo
		$cadena = explode(".", $file_name);         //Tomar solo el ultimo substrings tras "."
		$ext = $cadena[1];
		$dir = "../../FrontAdministrador/Usuarios/Archivos/";
		$file_enc = md5_file($file_tmp);

		$fileName1 = "$file_enc" . "." . "$ext";
		copy($file_tmp, $dir.$fileName1);

		$archivo_n = $file_name;
		$archivo = $file_enc . "." . $ext; 

		$sql = "UPDATE usuarios
		SET archivo_perfil = '$archivo',
		archivo_perfil_n = '$archivo_n'
		WHERE id = '$id'
		AND eliminado = 0;";
		$num = $con->query($sql);
	}

	$file_nam3 = $_FILES['archivo_cv']['name'];    //Nombre real del archivo

	if($file_nam3 != '')
	{
		$file_tmp = $_FILES['archivo_cv']['tmp_name']; //Nombre temporal del archivo
		$cadena = explode(".", $file_nam3);         //Tomar solo el ultimo substrings tras "."
		$ext = $cadena[1];
		$dir = "../../FrontAdministrador/Usuarios/Archivos/";
		$file_enc = md5_file($file_tmp);

		$fileName1 = "$file_enc" . "." . "$ext";
		copy($file_tmp, $dir.$fileName1);

		$archivo_n = $file_nam3;
		$archivo = $file_enc . "." . $ext; 

		$sql = "UPDATE usuarios
		SET archivo_cv = '$archivo',
		archivo_cv_n = '$archivo_n'
		WHERE id = '$id'
		AND eliminado = 0;";
		$num = $con->query($sql);
	}

	if($url != '')
	{
		$sql = "UPDATE usuarios
				SET url = '$url'
				WHERE id = '$id'
				AND eliminado = 0;";
		$num = $con->query($sql);
	}
	$sql = "UPDATE usuarios
		SET nombre = '$nombre',
		correo = '$correo'
				WHERE id = '$id'
		AND eliminado = 0;";
	
	$num = $con->query($sql);
	header("Location: ../Usuarios/usuarios_lista.php");
?> 