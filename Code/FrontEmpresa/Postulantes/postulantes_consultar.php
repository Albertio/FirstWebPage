
<html>
	<head>
		<title> Perfil</title>

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
	</head>
	<body>
		<?php
			session_start();

			if (!isset($_SESSION['nombre']) || (trim($_SESSION['nombre']) == '')) 
			{
                header("location: ../Login.php");
                exit();
            }
            else if((trim($_SESSION['rol']) == "2"))
            {
                header("../../(Admin)index.php");
                exit();
            }
            else if((trim($_SESSION['rol']) == "1"))
            {
                header("../../index.php");
                exit();
            }
            $id_usuario = $_SESSION['id'];

			?>
	
		 <!-- header inner -->
		 <div class="header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="../../(Empresa)index.php"><img src="../Styles/css/logo.png" alt="#" /></a>
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
                                    <a class="nav-link" href="../../(Empresa)index.php"> Inicio </a>
                                 </li>
								 <li class="nav-item">
								 <?php echo "<a class='nav-link' href =\"../Perfil/usuarios_consultar.php?id=$id_usuario\"'>Perfil</a>";?>
                                 </li>
								 <li class="nav-item">
                                    <a class="nav-link" href="../Ofertas/ofertas.php?pagina=1&">Mis Ofertas</a>
                                 </li>
								 <li class="nav-item">
                                    <a class="nav-link" href="../Contacto/contacto_formulario.php">Contacto</a>
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
		<a class=boton-opcion style='bottom:7%;right:10%;' href='../Ofertas/ofertas.php'>Regresar</a>
		<?php
			//usuarios_elimina.php
			require "../Funciones/conecta.php";
			$con = conecta();

			//Recibe variables
			$id = $_REQUEST['id'];
			
			$sql = "SELECT * FROM usuarios
					WHERE id = $id
					AND eliminado = 0;";
			$res = $con->query($sql);

			$row = mysqli_fetch_array($res);
			
			$id = $row["id"];
			$nombre = $row["nombre"];
			$correo = $row["correo"];

			$archivo_perfil = $row["archivo_perfil"];
			$archivo_perfil_n = $row["archivo_perfil_n"];
			
			$archivo = $row["archivo_cv"];
			$archivo_n = $row["archivo_cv_n"];

			$verificado = $row["verificado"];

			$url = $row["url"];
			echo "
			<div class=left-segundo style='top:25%;left:5%;'>
			
			<div class='imagen-perfil'>
			<img style='border-radius:100%;' src='../../FrontAdministrador/Usuarios/Archivos/".$archivo_perfil."' >
			<br> </div>	

				<a class='label-formulario' style='color:#000;font-size:35px;position:fixed;bottom:15%;left:12%;'>".$nombre."</a>
				<br>
			</div>
			<div class=right-segundo style='top:25%;right:5%;'>
				<br>

				<a class='label-formulario' style='color:#fff;font-size:18px;position:fixed;top:35%;left:40%;'>Correo:</a>
				<br>
				<a class='label-formulario' style='color:#00aeef;font-size:15px;position:fixed;top:40%;left:41%;'>".$correo."</a>
				<br>


				<a class='label-formulario' style='color:#fff;font-size:15px;position:fixed;top:35%;left:60%;'>Nombre del Archivo (Perfil):</a>
				<br>
				<a class='label-formulario' style='width:10%;color:#00aeef;font-size:15px;position:fixed;top:40%;left:61%;'>".$archivo_perfil_n."</a>
				<br>

				<a class='label-formulario' style='color:#fff;font-size:15px;position:fixed;top:60%;left:40%;'>Nombre del Archivo (CF):</a>
				<br>
				<a class='label-formulario' style='width:10%;color:#00aeef;font-size:15px;position:fixed;top:65%;left:41%;'>".$archivo_n."</a>
				<br>

				<a class='label-formulario' style='color:#fff;font-size:15px;position:fixed;top:60%;left:61%;'>Archivo (CF):</a>
				<br>";
				echo "<a class='label-formulario' style='color:#00aeef;font-size:15px;position:fixed;top:65%;left:63%;' href =\"../../FrontAdministrador/Usuarios/usuarios_cv.php?id=$id\"'>Ver CV</a>
			
				<br>
			
				<a class='label-formulario' style='color:#fff;font-size:15px;position:fixed;top:60%;left:78%;'>URL:</a>
				<br>
				<a class='label-formulario' style='width:10%;color:#00aeef;font-size:15px;position:fixed;top:65%;left:79%;' href =".$url.">".$url."</a>
				<br>
			</div>";
			
		?>
		</form>
	</body>
	
</html>
