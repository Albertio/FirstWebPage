<?php
	//productos_salva.php
	session_start();

	$id_usuario = $_SESSION['id'];

	require "../Funciones/conecta.php";
	$con = conecta();

	//Recibe Variables
	$nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
	$sueldo = $_POST['sueldo'];
	$archivo_n = '';
	$archivo = '';

    $file_name = $_FILES['archivo']['name'];    //Nombre real del archivo
    $file_tmp = $_FILES['archivo']['tmp_name']; //Nombre temporal del archivo
    $cadena = explode(".", $file_name);         //Tomar solo el ultimo substrings tras "."
    $ext = $cadena[1];
    $dir = "../../FrontAdministrador/Ofertas/Archivos/";
    $file_enc = md5_file($file_tmp);

    if($file_name != '')
    {
        $fileName1 = "$file_enc" . "." . "$ext";
        //Conseguir el ID
        //$IDArchivo = 1;
        //$fileName1 = "Fx$IDArchivo.$ext";
        copy($file_tmp, $dir.$fileName1);
    }

	$archivo_n = $file_name;
	$archivo = $file_enc . "." . $ext; 
	
	$sql = "INSERT INTO ofertas
			(id, nombre, descripcion, sueldo, archivo_n, archivo)
			VALUES ('$id_usuario','$nombre', '$descripcion', '$sueldo', '$archivo_n', '$archivo')";
					 
	$res= $con->query($sql);
	header("Location: ofertas.php");
?>