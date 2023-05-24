

<html>
	<head>
		<title>Alta de usuarios</title>

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
      	<link rel="stylesheet" type="text/css" href="../Styles/css/stylenose.css"/>
		
      	<link rel="stylesheet" type="text/css" href="../Styles/css/style.css"/>
		<script src = "../Librerias/jquery-3.3.1.min.js"></script>
		<script>
			function Valida()
			{
				nombre = document.getElementById("nombre").value;
				apellidos = document.getElementById("apellidos").value;
				correo = document.getElementById("correo").value;
				password = document.getElementById("password").value;
				rol = document.getElementById("rol").value;
				archivo = document.getElementById("archivo").value;

				if(nombre == "" || apellidos == "" || correo == "" || password == "" || rol == "0" || archivo.length <= 0)
				{
					$('#mensajeCampos').html('Faltan campos por llenar');
					setTimeout("$('#mensajeCampos').html('')", 5000);
					return false;
				}
				else
				{
					$('#mensajeCampos').html('Registro Exitoso!');
					setTimeout("$('#mensajeCampos').html('')", 5000);
					return true;

				}
			}
			function ComprobarCorreo(correo)
			{
                if(correo.value)
                {
					$.ajax(
					{
						url : '../Funciones/comprobarCorreo.php',
						type : 'post',
						dataType : 'text',
						data : 'correo=' + correo.value,

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
								 	<a class="nav-link" href="usuarios_lista.php"> Usuarios</a>
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
			//usuarios_alta.php
			require "../Funciones/conecta.php";
			$con = conecta();
			echo "<a class='boton-segundo' style='bottom:10%;right:18%;' href=\"usuarios_lista.php\">Regresar</a>";
		?> 
				
		<div class='left-imagen' style='background-image: url(../Styles/usuario-alta.jpg); top:25%; left:5%;'></div>
		<div class='right-segundo' style='top:25%;right:5%;'>
		
		<form enctype = "multipart/form-data", onSubmit = "return Valida()", method = 'post', action = "usuarios_salva.php">
		
		<a class='label-formulario' style='color:#fff;font-size:130%;top:15%;left:8%;'>Nombre:</a>
		<br>
		<input class='input-formulario' style='top:43%;left:39%;' type = 'text', name = 'nombre', id = 'nombre', placeholder = 'Nombre', />
		<br>

		<a class='label-formulario' style='color:#fff;font-size:130%;top:15%;left:40%;'>Apellidos:</a>
		<br>
		<input class='input-formulario' style='top:43%;left:58%;' type = 'text', name = 'apellidos', id = 'apellidos', placeholder = 'Apellidos', />
		<br>

		<a class='label-formulario' style='color:#fff;font-size:130%;top:15%;left:73%;'>Correo:</a>
		<br>
		<input class='input-formulario' style='top:43%;left:78%;'onblur = 'ComprobarCorreo(correo);', type = 'text', name = 'correo', id = 'correo', placeholder = 'Correo@Dominio', />
		<br>
		<div id = 'mensajeCorreo'> </div>
		<br>

		<a class='label-formulario' style='color:#fff;font-size:130%;top:45%;left:8%;'>Contraseña:</a>
		<br>
		<input class='input-formulario' style='top:63%;left:39%;' type = 'text', name = 'password', id = 'password', , placeholder = 'Contrasena'/>
		<br>

		<a class='label-formulario' style='color:#fff;font-size:130%;top:45%;left:40%;'>Rol:</a>
		<br>
		<select style='font-weight:bold;position:absolute; top:56%; left: 40%;background-color:#00aeef;border-radius:2em;' name = 'rol', id = 'rol'>
			<option value = '0'> Selecciona </option>
			<option value = '1'> Empresa </option>
			<option value = '2'> Usuario </option>
			<option value = '3'> Administrador </option>
		</select>
		<br>
			
		<a class='label-formulario' style='color:#fff;font-size:130%;top:68%;left:8%;'>Fotografía:</a>
		<br>
		<input style='position:absolute;top:75%;left:5%;' type = "file", id = "archivo", name = "archivo">
		<br>
		<div id = 'mensajeCampos', name = 'mensajeCampos'> </div>
		<br>

		<input class='boton-segundo' style='border: 2px solid #00aeef;bottom:10%;right:7%;' type = "submit", value = "Enviar", id = "Button">
		
		</form>
		</div>
	</body>
	
</html>