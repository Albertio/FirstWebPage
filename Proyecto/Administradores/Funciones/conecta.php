<?php
	define("HOST", 'localhost');
	define("BD", 'administradores');
	define("USER_BD", 'root');
	define("PASS_BD", '');
	
	function conecta()
	{
		//$con = new mysqli(HOST, USER_BD, PASS_BD, BD);
		$con = new PDO('mysql:host=localhost;dbname=administradores', USER_BD, PASS_BD);
		
		return $con;
	}
	
?>