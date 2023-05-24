<html>
    <head>
        <title>Skill Up</title>

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
                            alert("Solicitud enviada con exito!");
                        }
                    }
                });
			}
            function Detalle(id)
			{
				window.location.href = '../Ofertas/oferta_detalle.php?id='+ id;
			}
        </script>
    </head>
    
    <body styele='overflow-y: scroll;'>
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
            else if((trim($_SESSION['rol']) == "2"))
            {
                header("../../(Empresa)index.php");
                exit();
            }
            $id_usuario = $_SESSION['id'];        
            $oferta = $_GET['pagina'];

            $i = 0;
            //"ofertas/ofertas.php?pagina=1&"
            $anterior = $oferta - 1;
            $siguiente = $oferta + 1;
            $inicio = (2 * ($oferta - 1)) - 1;
            $final = (2 * $oferta);
            
            require "../Funciones/conecta.php";
			$con = conecta();
			
            //ofertaS
			$sql = "SELECT * FROM ofertas
					WHERE eliminado = 0";

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
                                    <a class="nav-link" href="../Ofertas/ofertas.php?pagina=1&">Ofertas</a>
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

            if($anterior > 0)
            {
                echo"<a class='boton-siguiente' style='top:21%;right:12%;' href='ofertas.php?pagina=$anterior&'>Anterior</a>";
            }
            echo"<a class='boton-siguiente' style='top:21%;right:3%;' href='ofertas.php?pagina=$siguiente&'>Siguiente</a>";

        $count = 0;
        $contador = 0;
        $x1 = 5;
        $x2 = 20;
        $x3 = 8;
        $x4 = 32;
        $y1 = 27;
        $y2 = 40;
        $y3 = 3;
        $y4 = 83;
        $y5 = 87;
        $y6 = 85;
        foreach($res as $row)
        {
            
            if($count > $inicio && $count < $final)
            {
                $id = $row["id_primary"];
                $id_oferta = $row["id"];
                $id_primary = $row["id_primary"];
                $estado = $row["estado"];
                $archivo = $row["archivo"];
                $nombre = $row["nombre"];
                $sueldo = $row["sueldo"];
                $eliminado = $row["eliminado"];

                echo"
                    <div style='border: 2px solid #474A59; background-color: #D8D8D8;width:500px; height:400px; object-fit: cover;
                    border-radius: 2em; position: absolute;top:".$y1."%;left:".$x1."%;'>";
                    $x1 = $x1 + 50;
                echo"<img style='width: 90%;
                    height: 70%;position: absolute; top: ".$y2."px;left:".$x2."px;display: block;margin:0 auto;border-radius:2em;'src = '../../FrontAdministrador/Ofertas/Archivos/$archivo'>";
                    
                echo"<a class='label-formulario' style='top:".$y3."%;left:".$x3."%;' href='javascript:void(0);' onclick = 'return Detalle($id)'>$nombre</a> <br>";
        
                echo"<a class='label-formulario' style='color:#000;top:".$y4."%;left:".$x3."%;'>Sueldo:</a> <br>";
                echo "<a class='label-formulario' style='color:#000;top:".$y5."%;left:".$x3."%;'>$ $sueldo</a> <br>";
                    if($eliminado == 0)
                    {
                        echo "<button class='boton-segundo' style='border: 2px solid #00aeef;top:".$y6."%;left:".$x4."%;' onclick = 'return Agrega($id_usuario, $id_oferta, $id_primary)'>Postularse</button><br><br></div>";
                        $i += 1;
                    }

                    $x3 = $x3 + 5;
                    $x4 = $x4 + 50;
            }
            $count ++;
        }
        ?>
    </body>    
<html>