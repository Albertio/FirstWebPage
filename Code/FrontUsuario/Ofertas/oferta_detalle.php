<html>
    <head>
        <title>Oferta Detalle</title>

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
			function Agrega(id_usuario, id_oferta, id_primary)
			{
                var parametros = 
                {
                    "id_usuario" : id_usuario,
                    "id_oferta" : id_oferta,
                    "id_primary" : id_primary,
                };
                $.ajax(
                {
                    url : 'AgregaOferta.php',
                    type : 'post',
                    dataType : 'text',
                    data : parametros,

                    success : function(res)
                    {
                        if(res)
                        {
                            $.ajax(
                            {
                                url : '../EstadoCarrito.php',
                                type : 'post',
                                dataType : 'text',
                                data : parametros,

                                success : function(res)
                                {
                                    if(res)
                                    {
                                        
                                        $('#textModify').html(res);
                                    }
                                }
                            });
                            alert("Solicitud enviada con exito");
                        }
                    }
                });
			}
        </script>

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
            else if((trim($_SESSION['rol']) == "0"))
            {
                header("../../(Empresa)index.php");
                exit();
            }
            $id_usuario = $_SESSION['id'];
			
            $oferta = $_GET['id'];

            require "../Funciones/conecta.php";
			$con = conecta();
			
            //ofertaS
			$sql = "SELECT * FROM ofertas
					WHERE eliminado = 0 AND id_primary = $oferta;";

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
                              <a href="../../index.php"><img src="../Styles/css/logo.png" alt="#" /></a>
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
                                    <a class="nav-link" href="../../index.php"> Inicio </a>
                                 </li>
								 <li class="nav-item">
								 <?php echo "<a class='nav-link' href =\"../Perfil/usuarios_consultar.php?id=$id_usuario\"'>Perfil</a>";?>
                                 </li>
								 <li class="nav-item">
                                    <a class="nav-link" href="ofertas.php?pagina=1&">Ofertas</a>
                                 </li>
								 <li class="nav-item">
                                    <a class="nav-link" href="../Contacto/contacto_formulario.php">Contacto</a>
                                 </li>
								 <li class="nav-item">
                                    <a class="nav-link" href="../Carrito/carrito_paso01.php">Postulaciones</a>
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
            $sql1 = "SELECT * FROM ofertas_solicitadas WHERE id_usuario = $id_usuario AND eliminado = 0 ";

            $num1 = $con->query($sql1);
        
            $count1 = $num1->fetch_array();

            $id_pedido1 = 0;
            foreach($num1 as $row)
            {
                if($row["id_usuario"] > 0)
                {
                    $id_pedido = $row["id_usuario"];
                }
            }
            $sql1 = "SELECT * FROM ofertas_solicitadas
            WHERE id_usuario = $id_usuario AND eliminado = 0";

            $res1 = $con->query($sql1);

            if($res1)
            {
                $count1 = mysqli_num_rows($res1);
            }
            else
            {
                $count1 = 0;
            }
            echo "<div id = 'textModify'> $count1 </div>";
            
            foreach($res as $row)
            {
                    $id_oferta = $row["id"];
                    $id = $row["id"];
                    $id_primary = $row["id_primary"]; 
                    $archivo = $row["archivo"];
                    $nombre = $row["nombre"];
                    $sueldo = $row["sueldo"];
                    $descripcion = $row["descripcion"];
                    $eliminado = $row["eliminado"];
            }

            echo "
            <div class='left-segundo' style='top:25%;left:10%;'>
            <img style='border-radius:2em;width:25%;height:45%;position:fixed;top:30%;left:12%;' src = '../../FrontAdministrador/Ofertas/Archivos/$archivo'>
            </div>
            <div class='right-segundo' style='top:25%;right:10%;'>
             
            <br>
            <a class='label-formulario' style='color:#fff;font-size:130%;top:15%;left:30%;'>Oferta:</a>
            <br>
            <a class='label-formulario' style='color:#00aeef;font-size:130%;top:25%;left:35%;'>$nombre</a>
            <br>
            <a class='label-formulario' style='color:#fff;font-size:130%;top:15%;right: 25%;'>Sueldo:</a>
            <br>
            <a class='label-formulario' style='color:#00aeef;font-size:130%;top:25%;right:23%;'> $ $sueldo</a>
            <br>
            <div class='mini-rectangulo' style='z-index:8;height: 10%;top:65%;left:35%;'>
            <a class='label-formulario' style='color:#fff;font-size:130%;top:-80%;left: -20%;'>Descripción:</a>
            <br>
            <a class='label-formulario' style='color:#00aeef;font-size:100%;top:20%;left: 12%;'>$descripcion</a></div>
            <a class='boton-segundo' style='bottom:10%;right:12%;' href='ofertas.php?pagina=1&'>Regresar</a>   
            <br>";
            if($eliminado == 0)
            {
                echo"<button class='boton-segundo' style='bottom:10%;right:23%;' id = 'mybottom', onclick = 'return Agrega($id_usuario, $id_oferta, $id_primary)'>Postularse </></div>";

            }
        ?>
    </body>    
<html>