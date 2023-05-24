<html>
    <head>
        <title>Bienvenido</title>

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
      	<link rel="stylesheet" href="Styles/css/bootstrap.min.css">
		  <link rel="stylesheet" href="Styles/css/responsive.css">
      	<!-- fevicon -->
      	<link rel="icon" href="Styles/logo-pequeno.png" type="image/gif" />
      	<!-- Scrollbar Custom CSS -->
      	<link rel="stylesheet" href="Styles/css/jquery.mCustomScrollbar.min.css">
      	<!-- Tweaks for older IEs-->
      	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      	<link rel="stylesheet" type="text/css" href="Styles/css/style-bueno.css"/>
		
      	<link rel="stylesheet" type="text/css" href="Styles/css/style.css"/>
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
                              <a href="../Bienvenido.php"><img src="Styles/logo.png" alt="#" /></a>
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
                                    <a class="nav-link" href="Usuarios/usuarios_lista.php">Usuarios</a>
                                 </li>
								 <li class="nav-item">
                                    <a class="nav-link" href="Ofertas/ofertas_lista.php">Ofertas</a>
                                 </li>
								 <li class="nav-item">
                                    <a class="nav-link" href="Postulaciones/postulaciones_lista.php">Postulaciones</a>
                                 </li>
								 <li class="nav-item">
                                    <a class="nav-link" href="Banners/banners_lista.php">Publicidad</a>
								</li>
                              </ul>
                              <div class="sign_btn"><a href="CerrarSesion.php">Cerrar Sesión</a></div>
                           </div>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>

		 <div class='banner'>
    		<img src='Styles/fondo1.jpg' alt="banner"> 
    		
    		</div>
		</div>
		<img src='Styles/robot2.png' style='z-index:2;position:fixed;top:25%;left:10%;' width='60%' height='80'>


		<div style='font-weight:bold;font-size:30px;position:fixed;z-index:3;color:#fff;top:55%;right:20%;'> !Bienvenido¡ <br>
        	<?php
       			 $aux = $_SESSION['nombre'];
       		 	echo  $aux;
        	?>


	
    </body>    
<html>