
<html>
	<head>
		<title> Editar Usuario</title>

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
      	<link rel="icon" href="../Styles/logo-pequeno.png" type="image/gif" />
      	<!-- Scrollbar Custom CSS -->
      	<link rel="stylesheet" href="../Styles/css/jquery.mCustomScrollbar.min.css">
      	<!-- Tweaks for older IEs-->
      	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      	<link rel="stylesheet" type="text/css" href="../Styles/css/style.css"/>
      	<link rel="stylesheet" type="text/css" href="../Styles/css/style-bueno.css"/>
		<link rel="stylesheet" type="text/css" href="../Styles/css/style-usuarios-editar.css"/>

		<script src = "../Librerias/jquery-3.3.1.min.js"></script>
		<script src = "../Librerias/jquery.md5.js"></script>
		<script>
			
			function Valida(id, nombreA, correoA, passwordA, archivoA, archivo_nA)
			{
				nombre = document.getElementById("nombre").value;
				correo = document.getElementById("correo").value;
				password = document.getElementById("password").value;
				archivo = document.getElementById("archivo").value;

				if(nombre == "" || apellidos == "" || correo == "")
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
					if(correo != correoA)
					{
						correoA = correo;
						change = true;
					}
					if(password != "")
					{
						passEnc = $.md5(password);
						passwordA = passEnc;
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
							"correo" : correoA,
							"password" : passwordA,
							"archivo" : archivoA,
							"archivo_n" : archivo_nA,
						};

						$.ajax(
						{
							url : "../Funciones/actualizarInformacionUsuarios.php",
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
			function ComprobarCorreo(correo, id)
			{
                if(correo.value)
                {
					var parametros = 
					{
						"correo" : correo.value,
						"id" : id
					};
					$.ajax(
					{

						url : '../Funciones/comprobarCorreoEditado.php',
						type : 'post',
						dataType : 'text',
						data : parametros,

						success : function(res)
						{
							if(res == 1)
							{
								$('#mensajeCorreo').html('El correo ' + correo.value + ' ya existe');
								setTimeout("$('#mensajeCorreo').html('')", 5000);
								document.getElementById("Button"). disabled = true;
							}
							else
							{
								document.getElementById("Button").disabled = false;
							}
						}
					});
				}
			}
		</script>
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

		<header>
			<!-- header inner -->
			<div class="header">
				<div class="container-fluid">
				<div class="row">
					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
						<div class="full">
							<div class="center-desk">
							<div class="logo">
								<a href="../Bienvenido.php"><img src="../Styles/logo.png" alt="#" /></a>
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
										<a class="nav-link" href="../Bienvenido.php"> Inicio </a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="usuarios_lista.php">Usuarios</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="../Ofertas/ofertas_lista.php">Ofertas</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="../Postulaciones/postulaciones_lista.php">Postulaciones</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="../Banners/banners_lista.php">Publicidad</a>
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
			//usuarios_edita.php
			require "../Funciones/conecta.php";
			$con = conecta();

			//Recibe variables
			$id = $_REQUEST['id'];
			
			$sql = "SELECT * FROM usuarios
					WHERE id = $id
					AND eliminado = 0;";
			$res = $con->query($sql);

			//$row = $res->fetch(PDO::FETCH_ASSOC); 
			$row = mysqli_fetch_array($res);
			
			$nombre = $row["nombre"];
			$rol = $row["rol"];
			$correo = $row["correo"];
			$password = $row["pass"];
			$archivo = $row["archivo_cv"];
			$archivo_n = $row["archivo_cv_n"];

			if($rol == 0)
			{
				$rolName = "Empresa";
			}
			if($rol == 1)
			{
				$rolName = "Usuario";
			}
			if($rol == 2)
			{
				$rolName = "Administrador";
			}
			else
			{
				$rolName = "Undefined";

			}
			echo "<a class='boton-siguiente' style='top:19%;right:10%;' href=\"../usuarios/usuarios_lista.php\">Regresar</a><br>
			
			<div class='left-imagen' style='background-image: url(../Styles/imagen-edicion.jpeg); top:30%; left:5%;'></div>
			<div class='right-segundo' style='top:30%;right:5%;'>
			<form enctype = 'multipart/form-data', onSubmit = 'return Valida($id,\"$nombre\",\"$correo\",\"$password\",\"$archivo\", \"$archivo_n\")', method = 'post', action = '../Funciones/actualizarInformacionUsuarios.php'>
			<input type = 'hidden' name = 'id', id = 'id', value = '$id'><br>

				<a class='label-formulario' style='color:#fff;font-size:130%;top:20%;left:8%;'>Nombre:</a>
				<br>
				<input class='input-formulario' style='top:48%;right:46%;' type = 'text', name = 'nombre', id = 'nombre', value = '$nombre', />
				<br>

				<a class='label-formulario' style='color:#fff;font-size:130%;top:20%;left:38%;'>Correo:</a>
				<br>
				<input class='input-formulario' style='top:48%;right:27.5%;' onblur = 'ComprobarCorreo(correo,$id);', type = 'text', name = 'correo', id = 'correo', value = '$correo' />
				<br>
				<div id = 'mensajeCorreo'> </div>
				<br>
				<a class='label-formulario' style='color:#fff;font-size:130%;top:20%;right:17%;'>Contraseña:</a>
					<br>
					<input  class='input-formulario' style='top:48%;right:9%;'type = 'text', name = 'password', id = 'password', , placeholder = '***********'/>
					<br>
				<br>

				<a class='label-formulario' style='color:#fff;font-size:130%;top:50%;left:8%;'>Foto de Perfil:</a>
					<br>
					<input style='position: fixed;top:70%;right:36%;' type = 'file', id = 'archivo', name = 'archivo'>
					<br>
				
					<a class='label-formulario' style='color:#fff;font-size:130%;top:50%;right:42%;'>CV:</a>
					<br>
					<input style='position: fixed;top:70%;right:8%;' type = 'file', id = 'archivo_cv', name = 'archivo_cv'>
					<br>

				<a class='label-formulario' style='color:#fff;font-size:130%;top:77%;left:8%;'>Url:</a>
					<br>
					<input class='input-formulario' style='top:87%;right:46%;' type = 'text', name = 'url', id = 'url', , placeholder = 'Pagina Web'/>
					<br>
				<div id = 'mensajeCampos', name = 'mensajeCampos'> </div>
				<br>
				<input class='boton-segundo' style='border: 2px solid #00aeef;bottom:7%;right:7%;' type = 'submit', value = 'Guardar', id = 'Button', onclick = 'Valida($id,\"$nombre\",\"$correo\",\"$password\",\"$archivo\", \"$archivo_n\"); ' />
				</form></div>";
		?>
	</body>
	
</html>