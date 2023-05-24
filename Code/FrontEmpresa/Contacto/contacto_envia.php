<?php

	//Variables para buscar
	$para = "cuentaskillup@gmail.com";
	$titulo = $_REQUEST['titulo'];
	$mensaje = $_REQUEST['comentarios'];
    $nombre = $_REQUEST['nombre'];

	$header = "From: noreply@example.com" . "\r\n";
	$header.= "Reply-To: noreply@example.com" . "\r\n";
	$header.= "X-Mailer: PHP/". phpversion();

	$mail = @mail($para, $titulo, $mensaje, $header)
	if($mail)
	{
		$retorno = 1;
	}
	else
	{
		$retorno = 0;
	}
	

	echo $retorno;
?>