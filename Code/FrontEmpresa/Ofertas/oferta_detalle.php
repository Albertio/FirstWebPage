<html>
    <head>
        <title>Detalle Oferta</title>

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
			
            $oferta = $_GET['id'];

            require "../Funciones/conecta.php";
			$con = conecta();
			
            //Ofertas
			$sql = "SELECT * FROM ofertas
					WHERE estado = 1 AND id = $id_usuario AND id_primary = $oferta";

			$res = $con->query($sql);
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
                                    <a class="nav-link" href="ofertas.php?pagina=1&">Mis Ofertas</a>
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
        
        <?php
            $sql1 = "SELECT * FROM ofertas_solicitadas WHERE id_usuario = $id_usuario";

            $num1 = $con->query($sql1);
        
            $count1 = $num1->fetch_array();

            $id_pedido = 0;
            foreach($num1 as $row)
            {
                if($row["id_usuario"] > 0)
                {
                    $id_pedido = $row["id_usuario"];
                }
            }
    
            foreach($res as $row)
            {
                $id = $row["id"];
                $archivo = $row["archivo"];
                $nombre = $row["nombre"];
                $sueldo = $row["sueldo"];
                $descripcion = $row["descripcion"];
                $eliminado = $row["eliminado"];
            }

            echo " <div class='left-segundo' style='top:25%;left:10%;'>
            <img style='border-radius:2em;width:25%;height:45%;position:fixed;top:30%;left:12%;' src = '../../FrontAdministrador/Ofertas/Archivos/$archivo'>
            </div>
            <div class='right-segundo' style='top:25%;right:10%;'>
             
            <br>
            <a class='label-formulario' style='color:#fff;font-size:130%;top:40%;left:48%;'>Oferta:</a>
            <br>
            <a class='label-formulario' style='z-index:1000;color:#00aeef;font-size:130%;top:45%;left:51%;'>$nombre</a>
            <br>
            <a class='label-formulario' style='color:#fff;font-size:130%;top:40%;right: 25%;'>Sueldo:</a>
            <br>
            <a class='label-formulario' style='color:#00aeef;font-size:130%;top:45%;right:25%;'> $ $sueldo</a>
            <br>
            <div class='mini-rectangulo' style='width: 20%;height: 10%;top:67%;left:45%;'>
            <a class='label-formulario' style='color:#fff;font-size:130%;top:60%;left: 45%;'>Descripcion:</a>
            <br>
            <a class='label-formulario' style='color:#00aeef;font-size:100%;top:69%;left: 47%;'>$descripcion</a></div>

            <a class='label-formulario' style='color:#fff;font-size:130%;top:60%;right:25%;'>Estado:</a>
            <a class='label-formulario' style='color:#00aeef;font-size:130%;top:65%;right:25%;'> $eliminado</a>

            <a class='boton-opcion' style='bottom:10%;right:12%;' href='ofertas.php?pagina=1&'>Regresar</a>  
                    <br>";
            
        ?>
    </body>    
<html>