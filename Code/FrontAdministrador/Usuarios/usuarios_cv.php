
<html>
	<head>
		<title> CV Usuario</title>
	</head>
	<body>
		<?php
			session_start();

			if (!isset($_SESSION['nombre']) || (trim($_SESSION['nombre']) == '')) 
			{
				header("location: ../../index.php");
				exit();
			}
			?>
		<?php
			require "../Funciones/conecta.php";
			$con = conecta();

			//Recibe variables
			$id = $_REQUEST['id'];
			
			$sql = "SELECT * FROM usuarios
					WHERE id = $id
					AND eliminado = 0;";
			$res = $con->query($sql);

			$row = mysqli_fetch_array($res);
			
			$url = $row["url"];
			$archivo = $row["archivo_cv"];
			echo "".$archivo."";
			header('Content-type: application/pdf');

			header('Content-Disposition: inline; filename="' . "Archivos/".$archivo . '"');

			header('Content-Transfer-Encoding: binary');

			header('Accept-Ranges: bytes');

			@readfile("Archivos/".$archivo);
		?>
		</form>
	</body>
	
</html>
