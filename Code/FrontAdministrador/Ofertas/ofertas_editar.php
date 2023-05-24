<?php
	session_start();
				
	if (!isset($_SESSION['nombre']) || (trim($_SESSION['nombre']) == '')) 
	{
		header("location: ../../index.php");
		exit();
	}
?>
<html>
	<head>
		<title> Editar Administrador</title>

		<meta charset="utf-8">
      	<meta http-equiv="X-UA-Compatible" content="IE=edge">
      	<!-- mobile metas -->
      	<meta name="viewport" content="width=device-width, initial-scale=1">
      	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
      	<!-- site metas -->
      	<title>SkillUp</title>
      	<meta name="keywords" content="">
      	<meta name="description" content="">
      	<meta name="author" content="">
      	<!-- bootstrap css -->
      	<link rel="stylesheet" href="../Styles/css/bootstrap.min.css">
		  <link rel="stylesheet" href="../Styles/css/responsive.css">
      	<!-- fevicon -->
      	<link rel="icon" href="images/fevicon.png" type="image/gif" />
      	<!-- Scrollbar Custom CSS -->
      	<link rel="stylesheet" href="../Styles/css/jquery.mCustomScrollbar.min.css">
      	<!-- Tweaks for older IEs-->
      	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      	<link rel="stylesheet" type="text/css" href="../Styles/css/stylenose.css"/>
		
      	<link rel="stylesheet" type="text/css" href="../Styles/css/style.css"/>

		<script src = "../Librerias/jquery-3.3.1.min.js"></script>
		<script src = "../Librerias/jquery.md5.js"></script>
		<script>
			
			function Valida(id, nombreA, descripcionA, sueldoA, archivoA, archivo_nA)
			{
				nombre = document.getElementById("nombre").value;
				descripcion = document.getElementById("descripcion").value;
				stock = document.getElementById("sueldo").value;
				archivo = document.getElementById("archivo").value;

				if(nombre == "" || descripcion == "" || sueldo == "")
				{
					$('#mensajeCampos').html('Faltan campos por llenar');
					setTimeout("$('#mensajeCampos').html('')", 5000);
					return false;
				}
				else
				{
					var change = false;
					if(nombre != nombreA)
					{
						nombreA = nombre;
						change = true;
					}
					if(descripcion != descripcionA)
					{
						descripcionA = descripcion;
						change = true;
					}
					if(sueldo != sueldoA)
					{
						sueldoA = sueldo;
						change = true;
					}
					if(archivo.length > 0)
					{
						archivoA = archivo;
						change = true;
					}
					if(change == true)
					{
						return true;
						var parametros = 
						{
							"id" : id,
							"nombre" : nombreA,
							"descripcion" : descripcionA,
							"stock" : sueldo,
							"archivo" : archivoA,
							"archivo_n" : archivo_nA,
						};

						$.ajax(
						{
							url : "../Funciones/actualizarInformacionOfertas.php",
							type : 'post',
							dataType : 'text',
							data : parametros,

							success : function(res)
							{
								if(res == 1)
								{
									$('#mensajeCampos').html('Datos Actualizados con exito');
									setTimeout("$('#mensajeCampos').html('')", 5000);
								}
							}
						});
					}
					else
					{
						return false;
					}
				}
			}
			function comprobarSueldo(sueldo)
			{
                if(isNaN(sueldo.value))
				{
					$('#mensajeSueldo').html('El sueldo ' + stock.value + ' debe ser un valor numerico');
					setTimeout("$('#mensajeSueldo').html('')", 5000);
					document.getElementById("Button"). disabled = true;
				}
				else
				{
					if(sueldo.value < 0)
					{
						$('#mensajeSueldo').html('El sueldo ' + sueldo.value + ' no puede ser negativo');
						setTimeout("$('#mensajeSueldo').html('')", 5000);
						document.getElementById("Button"). disabled = true;
					}
					else
					{
						document.getElementById("Button").disabled = false;
					}
				}
			}
		</script>
	</head>
	<body>
		<?php
			if (!isset($_SESSION['nombre']) || (trim($_SESSION['nombre']) == '')) 
			{
				header("location: ../../index.php");
				exit();
			}
		?>
		<header>
         <!-- header inner -->
         <div class="header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="../index.php"><img src="../Styles/logo.png" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <div class="header_information">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon"></span>
                           </button>
                           <div class="collapse navbar-collapse" id="navbarsExample04">
                              <ul class="navbar-nav mr-auto">
                                 <li class="nav-item">
                                    <a class="nav-link" href="Bienvenido.php"> Inicio </a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="../Usuarios/usuarios_lista.php">Usuarios</a>
                                 </li>
								 <li class="nav-item">
                                    <a class="nav-link" href="../Ofertas/ofertas_lista.php">Ofertas</a>
                                 </li>
								 <li class="nav-item">
                                    <a class="nav-link" href="../Ofertas/ofertas_lista.php">Postulaciones</a>
                                 </li>
								 <li class="nav-item">
                                    <a class="nav-link" href="../Banners/banners_lista.php">Anuncios</a>
								</li>
                              </ul>
                              <div class="sign_btn"><a href="../CerrarSesion.php">Cerrar Sesión</a></div>
                           </div>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
    </header>
		<?php
			//ofertas_edita.php
			require "../Funciones/conecta.php";
			$con = conecta();

			//Recibe variables
			$id = $_REQUEST['id'];
			
			$sql = "SELECT * FROM ofertas
					WHERE id = $id
					AND eliminado = 0;";
			$res = $con->query($sql);

			//$row = $res->fetch(PDO::FETCH_ASSOC); 
			$row = mysqli_fetch_array($res);
			
			$nombre = $row["nombre"];
			$descripcion = $row["descripcion"];
			$sueldo = $row["sueldo"];
			$status = $row["estado"];
			$archivo = $row["archivo"];
			$archivo_n = $row["archivo_n"];
	
			echo "
			
			<div class='fondo' style='top:21%;left:5%;'>
			
			<a class='boton-opcion' style='bottom:10%;right:20%;' href=\"ofertas_lista.php\">Regresar</a>
			<form enctype = 'multipart/form-data', onSubmit = 'return Valida($id,\"$nombre\",\"$descripcion\",\"$sueldo\",\"$archivo\", \"$archivo_n\")', method = 'post', action = '../Funciones/actualizarInformacionOfertas.php'>
				<input type = 'hidden' name = 'id', id = 'id', value = '$id'><br>
				<a class='label-formulario' style='color:#fff;font-size:130%;top:15%;left:15%;margin:auto;'>Nombre:</a>
				<br>
					<input class='input-formulario' style='top:40%;left:18%;margin:auto;' type = 'text', name = 'nombre', id = 'nombre', value = '$nombre', />
				<br>

				<a class='label-formulario' style='color:#fff;font-size:130%;top:50%;left:15%;margin:auto;'>Descripción:</a>
				<br>
					<textarea class='recuadro-texto' style='top:65%;left:18%;margin:auto;' id = 'descripcion', name = 'descripcion', cols=40, rows=10>$descripcion </textarea>
				<br>

				<a class='label-formulario' style='color:#fff;font-size:130%;top:15%;left:45%;margin:auto;'>Sueldo:</a>
				<br>
					<input class='input-formulario' style='top:40%;left:44%;margin:auto;' onblur = 'comprobarSueldo(sueldo);', type = 'text', name = 'sueldo', id = 'sueldo', value = '$sueldo', />
				<br>
				<div id = 'mensajeSueldo', name = 'mensajeSueldo'> </div>
				
				<a class='label-formulario' style='color:#fff;font-size:130%;top:15%;right:20%;margin:auto;'>Fotografia:</a>
				<br>
					<input class='input-formulario' style='top:40%;right:13%;' type = 'file', id = 'archivo', name = 'archivo'>
				<br>

				<div id = 'mensajeCampos', name = 'mensajeCampos'> </div>
				<input class='boton-opcion' style='border: 2px solid #00aeef;bottom:10%;right:8%;' type = 'submit', value = 'Guardar', id = 'Button', onclick = 'Valida($id,\"$nombre\",\"$descripcion\",\"$sueldo\",\"$archivo\", \"$archivo_n\"); ' />

			</form></div>";
		?>

		</form>

		<script src = "../Librerias/jquery-3.3.1.min.js"></script>
			<script id="rendered-js">
			var chain = $("#chains")[0];
			$(".img-wrapper").mouseenter(
				function () 
				{
				chain.currentTime = 0;
				chain.play();
				});
		</script>
		
	</body>
	
</html>