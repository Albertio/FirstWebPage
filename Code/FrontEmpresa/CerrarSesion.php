<?php
	session_start();
	session_destroy();

	Header("Location: ../FrontUsuario/Login.php")
?>