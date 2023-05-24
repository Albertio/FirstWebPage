<html>
    <head>
        <title>SkillUp</title>

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
			function ocultar(id, id_oferta, id_usuario)
            {
                if(id_usuario)
                {
					if(confirm("Esta seguro que desea eliminar la oferta?: "))
					{
                        var parametros = 
                        {
                            "id_usuario" : id_usuario,
                            "id_oferta" : id_oferta,
                        };
						$.ajax(
						{
							url : 'pedidos_elimina.php',
							type : 'post',
							dataType : 'text',
							data : parametros,

							success : function(res)
							{
								if(res == 1)
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
                                    $("#"+id).hide();
                                    $('#1234').html(res + " $");
                                    if(res == 0)
                                    {
                                        setTimeout("$('#siguiente').html('')", 10);
                                    }
									
								}
								else
								{
									alert("ID ERROR: " + res);
								}
							}
						});
					}
                }
			}
            function Detalle(id)
			{
				window.location.href = '../Ofertas/oferta_detalle.php?id='+ id;
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
            $i = 0;
            $subtotal = 0 ;

			$total = 0;
            $id_usuario = $_SESSION['id'];

            require "../Funciones/conecta.php";
			$con = conecta();
			
            $sql = "SELECT * FROM ofertas_solicitadas WHERE id_usuario = $id_usuario AND eliminado = 0";

            $num = $con->query($sql);
        
            $count = $num->fetch_array();
    
            
            $id_pedido = 0;
            if($count > 0)
            {
                foreach($num as $row)
                {
                    if($row["id_oferta"] > 0)
                    {
                        $id_pedido = $row["id_oferta"];
                    }
                }

                $sql = "SELECT * FROM ofertas_solicitadas
					WHERE id_usuario = $id_usuario AND eliminado = 0";

			    $res = $con->query($sql);

            }
            else
            {
                $res = null;
            }
		?>
        
        <?php
        
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
            $sql1 = "SELECT * FROM ofertas_solicitadas WHERE id_usuario = $id_usuario AND eliminado = 0";

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
            WHERE id_usuario = $id_pedido AND eliminado = 0";

            $res1 = $con->query($sql1);

            $count1 = mysqli_num_rows($res1);
        ?>
        <br>
        <a class="titulo" style="color: #000;top:20%;left:5%;">Postulaciones</a>
        <a class="fila-izquierda" style="background-color:#00aeef ;color:#000;top:32%;left:10%;">Número </a>
        <a class="fila-medio" style="background-color:#00aeef ;color:#000;top:32%;left:30%;">Código</a>
        <a class="fila-medio" style="background-color:#00aeef ;color:#000;top:32%;left:52%;">Fecha</a>
        <a class="fila-derecha" style="background-color:#00aeef ;color:#000;top:32%;right:10%;">Estado</a>
        <br>
            <?php
            if($res != null)
            {
                $x1 = 10;
                $x2 = 100;
                $y1 = 45;
                $y2 = 35;
                $y3 = 55;
                $y4 = 15;

                $test = "";
                
                foreach ($res as $row )
                {
                    $i += 1;
                    $id = $row["id_primary"];
                    $id_oferta = $row["id_oferta"];
                    $id_usuario = $row["id_usuario"];
                    $fecha = $row["fecha"];
                    $estado = $row["estado"];
                    
                    if($estado == 0)
                    {
                        $estado = "Revision";
                    }
                    if($estado == 1)
                    {
                        $estado = "Aceptado";
                    }
                    if($estado == 2)
                    {
                        $estado = "Rechazado";
                    }

                    
                    echo "<div style=' background-color: #D8D8D8;
                    width: 80%;
                    height: 10%;
                    font-weight: bold;
                    position: absolute;
                    border-radius: 2em 2em 2em 2em;
                    top:$y1%;
                    left:10%;' id = ".$i.">";
                    echo "<a style='position:absolute;color:#000; top:".$y2."%; left: ".$x1."%;'>$i</a>";
                    $x1 = $x1 + 25;
                    echo"<a style='position:absolute;color:#000; top:".$y2."%; left: ".$x1."%;'>$id_oferta</a>";
                    $x1 = $x1 + 19;
                    echo "<a style='position:absolute;color:#000; top:".$y2."%; left: ".$x1."%;'>$fecha</a>";
                    $x1 = $x1 + 29;
                    echo"<a style='position:absolute;color:#000; top:".$y2."%; left: ".$x1."%;'>$estado</a>";
                    echo "<a class='boton-dos' style='top:".$y3."%;left:".$x2."%;' href = 'javascript:void(0);' onClick = 'ocultar($i, $id, $id_usuario);'>Eliminar</a>";
                    echo "<a class='boton-dos' style='top:".$y4."%;left:".$x2."%;' href = 'javascript:void(0);' onclick = 'return Detalle($id)'>Detalle</a><br>";
                    echo "</div>";
                    $x1  = 10;
                    $y1 = $y1 + 15;
                    $y2 = $y2 + 10;
                    $y3 = $y3 + 3;
                    $y4 = $y4 + 3;
                                 
                }

                echo $test;
            }
            else
            {
                echo"</div>";
                echo"<div style='background-image: url(../Styles/cheems.jpg);
                background-size: 50% 90%;
                background-repeat: no-repeat;
                position:fixed;
                width: 50%;
                height: 50%;
                z-index: 1;
                top:50%;left:20%;'></div>";
                
                
                
                echo "<a class='label-formulario' style='font-size:20px;color:#000;top:50%;left:50%;'>Parece que no hay nada aquí...</a>";
                echo "<a class='label-formulario' style='font-size:20px;color:#000;top:60%;left:50%;'>Vamos, ve a ver alguna oferta <br> o puede que te ansiedad... </a>";
                echo "<a class='boton-segundo' style='color:#000; bottom:10%;right:30%;' href='../Ofertas/ofertas.php?pagina=1&'>Ofertas</a>";
            }
            
            ?>
    </body>    
<html>