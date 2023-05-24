<?php

	//Variables para buscar
	$para = "cuentaskillup@gmail.com";
	$titulo = $_REQUEST['titulo'];
	$mensaje = $_REQUEST['comentarios'];
    $nombre = $_REQUEST['nombre'];

	$header = "From: cuentaskillup@gmail.com" . "\r\n";
	$header.= "Reply-To: cuentaskillup@gmail.com" . "\r\n";
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