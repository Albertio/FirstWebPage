<?php
	define("HOST", 'localhost');
	define("BD", '508119');
	define("USER_BD", 'root');
	define("PASS_BD", '');

	function conecta()
	{
		//$con = new mysqli(HOST, USER_BD, PASS_BD, BD);
		//$con = new PDO('mysql:host=localhost;dbname=administradores', USER_BD, PASS_BD);
		$con = new mysqli(HOST, USER_BD, PASS_BD, BD);
		
		return $con;
	}
	
?>