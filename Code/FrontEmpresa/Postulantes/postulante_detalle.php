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
					WHERE estado = 1 AND eliminado = 0 AND id = $id_usuario and id_primary = $oferta;";

			$res = $con->query($sql);
		?>
        
        <a class='otro-botonopcion' style='top:19%;right:3%;' href='../Ofertas/ofertas.php'>Regresar</a>

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
        <?php
            $sql1 = "SELECT * FROM ofertas_solicitadas WHERE id_oferta = $id_usuario and id_primary = $oferta AND estado = 0 AND eliminado = 0";

            $num1 = $con->query($sql1);

            $x1 = 3;
            $y1 = 28;
            $x2 = 20;
            $y2 = 5;
            $x3 = 150;
            $y3 = 87;
            $x4 = 380;
            $y4 = -50;
            $x5 = 70;
            $cont = 0;

            $id_usuario = 0;
            foreach($num1 as $row)
            {
                if($row["id_usuario"] > 0)
                {
                    $id_usuario = $row["id_usuario"];

                    $sql1 = "SELECT * FROM usuarios WHERE id = $id_usuario AND eliminado = 0";

                    $res1 = $con->query($sql1);

                   

                    foreach($res1 as $row)
                    {
                        $archivo = $row["archivo_perfil"];
                        $nombre = $row["nombre"];
                        $correo = $row["correo"];
                        echo "
                        <div class='otro-minirectangulo' style='top:".$y1."%;left:".$x1."%;'>";
                        echo"<div class='container'>";
                            echo"<div class='otro-imagen-perfil'>";
                            echo"<img style='border-radius:100%;top:".$y2."%;left:".$x2."%;' src = '../../FrontAdministrador/Usuarios/Archivos/$archivo'>";
                            echo"</div>";
                            echo"<a class='otro-label-formulario' style='transform: translate(".$y4."%, ".$x3."%);font-size:20px;color:#000;top:50%;left:50%;'>".$nombre."</a>";
                            echo"<br>";
                            echo"<a class='otro-label-formulario' style='transform: translate(".$y4."%, ".$x4."%);top:50%;left:50%;font-size:15px;color:#000;'>Correo: ".$correo."</a>";
                            echo"<br>";
                            echo"<a class='otro-botonsiguiente' style='top:".$y3."%;left:".$x5."%;' href =\"postulantes_consultar.php?id=$id_usuario\"'>Ver Perfil</a>";
                            echo"<br></div>";
                        echo"</div>";

                        $cont = $cont + 1;
                        $x1 = $x1 + 32;
                        $x2 = $x2 + 1;
                        $x3 = $x3 + 30;
                        $x4 = $x4 + 30;
                        $x5 = $x5 + 1;

                        if($cont % 3 == 0)
                        {
                            $x1 = 3;
                            $y1 = $y1 + 70;
                            $x2 = 20;
                            $y2 = $y2 + 1;
                            $x3 = 150;
                            $y3 = $y3 + 1;
                            $x4 = 380;
                            $x5 = 70;
                        }
                            /*PROXIMAMENTE
                            <a class='link-wrapper' href = 'javascript:void(0);' onClick = 'ChangeState(1);'>Aceptar</a>
                            <br>
                            <a class='link-wrapper' href = 'javascript:void(0);' onClick = 'ChangeState(0);'>Rechazar</a>
                            */
                    }
                }
            }
            
            
        ?>
    </body>    
<html>