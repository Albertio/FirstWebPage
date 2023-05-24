
<html>
	<head>
		<title> Consultar Producto</title>

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
		
      	<link rel="stylesheet" type="text/css" href="../Styles/css/style.css"/>
		<link rel="stylesheet" type="text/css" href="../Styles/css/stylenose.css"/>
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
                                    <a class="nav-link" href="../Bienvenido.php"> Inicio </a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="../Usuarios/usuarios_lista.php">Usuarios</a>
                                 </li>
								 <li class="nav-item">
                                    <a class="nav-link" href="../Ofertas/ofertas_lista.php">Ofertas</a>
                                 </li>
								 <li class="nav-item">
                                    <a class="nav-link" href="../Postulaciones/postulaciones_lista.php">Postulaciones</a>
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
			//ofertas_elimina.php
			require "../Funciones/conecta.php";
			$con = conecta();

			//Recibe variables
			$id = $_REQUEST['id'];
			
			$sql = "SELECT * FROM ofertas
					WHERE id = $id
					AND eliminado = 0;";
			$res = $con->query($sql);

			$row = mysqli_fetch_array($res);
			
			$id = $row["id"];
			$nombre = $row["nombre"];
			$descripcion = $row["descripcion"];
			$sueldo = $row["sueldo"];
			$archivo = $row["archivo"];
			$archivo_n = $row["archivo_n"];

			if($row["estado"] == "1")
			{
				$status = "Activo";
			}
			else
			{
				$status = "Inactivo";
			}

			echo "<a class='link-wrapper' href=\"ofertas_lista.php\"><span style='font-size: 50px; font-weight: bold; vertical-align: middle; line-height: 0;margin-left: 25px;'>&larr;</span></a>";

				//ID
				echo " <div class='left-segundo' style='top:25%;left:10%;'>
				<img style='border-radius:2em;width:25%;height:45%;position:fixed;top:30%;left:12%;' src = '../../FrontAdministrador/Ofertas/Archivos/$archivo'>
				</div>
				<div class='right-segundo' style='top:25%;right:10%;'>
				 
				<br>
				<a class='label-formulario' style='color:#fff;font-size:130%;top:15%;left:30%;'>Oferta:</a>
				<br>
				<a class='label-formulario' style='z-index:1000;color:#00aeef;font-size:130%;top:25%;left:33%;'>$nombre</a>
				<br>
				<a class='label-formulario' style='color:#fff;font-size:130%;top:15%;right: 25%;'>Sueldo:</a>
				<br>
				<a class='label-formulario' style='color:#00aeef;font-size:130%;top:25%;right:25%;'> $ $sueldo</a>
				<br>
				<div class='mini-rectangulo' style='width: 50%;height: 10%;top:57%;left:30%;'>
				<a class='label-formulario' style='color:#fff;font-size:130%;top:-80%;left: 5%;'>Descripción:</a>
				<br>
				<a class='label-formulario' style='color:#00aeef;font-size:100%;top:19%;left:8%;'>$descripcion</a></div>
			
						<br>";
					

		?>
		</form>
		
	</body>
	
</html>
