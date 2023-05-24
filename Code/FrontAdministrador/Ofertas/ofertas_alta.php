

<html>
	<head>
		<title> Alta de Ofertas</title>

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
				descripcion = document.getElementById("descripcion").value;
				codigo = document.getElementById("sueldo").value;
				archivo = document.getElementById("archivo").value;

				if(nombre == "" || descripcion == "" || sueldo == "" || archivo.length <= 0)
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
								 	<a class="nav-link" href="../Usuarios/usuarios_lista.php"> Usuarios</a>
                                 </li>
								 <li class="nav-item">
                                    <a class="nav-link" href="ofertas_lista.php">Ofertas</a>
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
			echo "<a class='boton-segundo' style='bottom:10%;right:20%;' href=\"ofertas_lista.php\">Regresar</a>";
		?> 
			<?php

			require "../Funciones/conecta.php";
			$con = conecta();
		?> 
				
		<div class='left-imagen' style='background-image: url(../Styles/oferta-alta.jpg);top:25%;left:5%;'></div>
		<div class='right'>
		
		<form enctype = "multipart/form-data", onSubmit = "return Valida()", method = 'post', action = "ofertas_salva.php?id=$id_usuario&">
		
		<a class='label-formulario' style='color:#fff;font-size:130%;top:18%;left:12%;margin:auto;'>Nombre:</a>
		<br>
			<input class='input-formulario' style='top:43%;left:37%;margin:auto;' type = 'text', name = 'nombre', id = 'nombre', value = '', />
		<br>

		<a class='label-formulario' style='color:#fff;font-size:130%;top:40%;left:12%;margin:auto;'>Descripción:</a>
		<br>
			<textarea class='recuadro-texto' style='top:60%;left:37%;margin:auto;' id = 'descripcion', name = 'descripcion', cols=40, rows=10> </textarea>
		<br>

		<a class='label-formulario' style='color:#fff;font-size:130%;top:18%;left:55%;'>Sueldo:</a>
		<br>
			<input class='input-formulario' style='top:45%;right:20%;' onblur = 'comprobarSueldo(sueldo);', type = 'text', name = 'sueldo', id = 'sueldo', placeholder = '$ ', />
		<br>
				
		<a class='label-formulario' style='color:#fff;font-size:130%;top:40%;left:55%;margin:auto;'>Fotografia:</a>
		<br>
			<input style='position:fixed;top:60%;right:10%;margin:auto;' type = 'file', id = 'archivo', name = 'archivo'>
		<br>

		<div class='label-formulario' style='color:red;opacity: 0;transition: opacity 1s;font-size:130%;top:25%;right:15%;margin:auto;' id = 'mensajeCampos', name = 'mensajeCampos'>Faltan campos por llenar </div>
		<div class='label-formulario' style='color:#1AF113;opacity: 0;font-size:130%;top:25%;right:15%;margin:auto;' id = 'mensajeExito', name = 'mensajeExito'>Registro Exitoso </div>
		<input  class='boton-segundo' style=' border: 2px solid #00aeef;bottom:10%;right:8%;' type = "submit", value = "Enviar", id = "Button">
		
		</form>
		</div>
	</body>
	
</html>