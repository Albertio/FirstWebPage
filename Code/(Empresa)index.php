
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
      	<link rel="stylesheet" href="FrontUsuario/Styles/css/bootstrap.min.css">
		  <link rel="stylesheet" href="FrontUsuario./Styles/css/responsive.css">
      	<!-- fevicon -->
      	<link rel="icon" href="FrontUsuario/Styles/logo-pequeno.png" type="image/gif" />
      	<!-- Scrollbar Custom CSS -->
      	<link rel="stylesheet" href="FrontUsuario/Styles/css/jquery.mCustomScrollbar.min.css">
      	<!-- Tweaks for older IEs-->
      	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      	<link rel="stylesheet" type="text/css" href="../Styles/css/stylenose.css"/>
		
      	<link rel="stylesheet" type="text/css" href="FrontUsuario/Styles/css/style.css"/>
        
        <script src = "Librerias/jquery-3.3.1.min.js"></script>
        <script>
			function Agrega(id_usuario, id_oferta)
			{
                var parametros = 
                {
                    "id_usuario" : id_usuario,
                    "id_oferta" : id_oferta,
                };
                $.ajax(
                {
                    url : 'FrontEmpresa/Ofertas/AgregaOferta.php',
                    type : 'post',
                    dataType : 'text',
                    data : parametros,

                    success : function(res)
                    {
                        if(res)
                        {
                            $.ajax(
                            {
                                url : 'FrontEmpresa/EstadoCarrito.php',
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
                            alert("Agregado al carrito con Exito");
                        }

                    }
                });
                
			}
            function Detalle(id)
			{
				window.location.href = 'FrontEmpresa/Ofertas/oferta_detalle.php?id='+ id;
			}
        </script>
    </head>
    
    <body>
		<?php
			session_start();
            
			if (!isset($_SESSION['nombre']) || (trim($_SESSION['nombre']) == '')) 
			{
				header("location: FrontEmpresa/Login.php");
				exit();
			}
            else if((trim($_SESSION['rol']) == "2"))
            {
                header("(Admin)index.php");
                exit();
            }
            $id_usuario = $_SESSION['id'];
			
            function randomGen($min, $max, $quantity) 
            {
                $numbers = range($min, $max);
                shuffle($numbers);
                return array_slice($numbers, 0, $quantity);
            }

            require "FrontEmpresa/Funciones/conecta.php";
			$con = conecta();
			
            //OFERTAS
			$sql = "SELECT * FROM ofertas
					WHERE estado = 1 AND eliminado = 0";

            $res = $con->query($sql);

            $max = mysqli_num_rows($res);
            $numbersList = randomGen(0,$max - 1,8);

            //BANNERS
            $sql = "SELECT * FROM ads
            WHERE status = 1 AND eliminado = 0";

            $banners = $con->query($sql);

            $maxO = mysqli_num_rows($banners);

            $Banner = rand(0, $maxO - 1);
		?>

         <!-- header inner -->
		<div class="header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="(Empresa)index.php"><img src="FrontUsuario/Styles/logo.png" alt="#" /></a>
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
                                    <a class="nav-link" href="(Empresa)index.php"> Inicio </a>
                                 </li>
								 <li class="nav-item">
								 <?php echo "<a class='nav-link' href =\"FrontEmpresa/Perfil/usuarios_consultar.php?id=$id_usuario\"'>Perfil</a>";?>
                                 </li>
								 <li class="nav-item">
                                    <a class="nav-link" href="FrontEmpresa/Ofertas/ofertas.php?pagina=1&">Mis Ofertas</a>
                                 </li>
								 <li class="nav-item">
                                    <a class="nav-link" href="FrontEmpresa/Contacto/contacto_formulario.php">Contacto</a>
                                 </li>
                              </ul>
                              <div class="sign_btn"><a href="FrontEmpresa/CerrarSesion.php">Cerrar Sesión</a></div>
                           </div>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      	</header>
        <div class='banner'>
            <img src='FrontUsuario/Styles/fondo3.jpg' alt="banner"> 
            <div class='texto-banner' style='z-index:2;font-size:50px;text-align: center; font-family: "Inter UI", sans-serif;
            font-weight: bold; color:#00aeef; position:absolute;top:40%;left:33%;'>Expande a tu equipo</div>
            <a style='z-index:2;background-color: #00aeef;width: 10%;height: 10%;color: #000;font-weight: bold;font-family: "Inter UI", sans-serif;
            cursor: pointer; border-radius: 30px;position:absolute;display: flex;justify-content: center;align-items: center;
            top:60%;left:46%;'href='FrontEmpresa/Ofertas/ofertas.php?pagina=1&'>Ver Ofertas</a>
        </div>
        <?php
            $sql1 = "SELECT * FROM ofertas_solicitadas WHERE id_oferta = $id_usuario AND estado = 0 ";

            $num1 = $con->query($sql1);
        
            $count1 = $num1->fetch_array();

            $id_oferta = 0;
            foreach($num1 as $row)
            {
                if($row["id_oferta"] > 0)
                {
                    $id_oferta = $row["id_oferta"];
                }
            }
            $sql1 = "SELECT * FROM ofertas_solicitadas
            WHERE id_oferta = $id_oferta AND eliminado = 0";

            $res1 = $con->query($sql1);

            if($res1)
            {
                $count1 = mysqli_num_rows($res1);
            }
            else
            {
                $count1 = 0;
            }
        ?>
        <div id = 'textModify'> </div>
        <?php
            $i = 0;
            foreach($banners as $row)
            {
                if($i == $Banner)
                {
                    $archivo = $row["archivo"];
                }
                $i += 1;
            }
            //echo"<img class='normal' src='FrontAdministrador/Banners/Archivos/".$archivo."', style = 'height: auto; max-width: 600px; padding-left: 10%;'>";
            $i = 0;
            
            foreach($res as $row)
            {
                if($maxO > 7)
                {
                    if($i == $numbersList[7]) 
                    {
                        $id1 = $row["id"];
                        $archivo = $row["archivo"];
                        $nombre = $row["nombre"];
                        $sueldo1 = $row["sueldo"];
                        $eliminado = $row["eliminado"];

                        
                        echo "<div id='ofertas'></div>";
                        
                        echo '
                        <div style="z-index:3;background-color: #D8D8D8;width:500px; height:400px; object-fit: cover;
                        border-radius: 2em; position: absolute;top:130%;left:5%;border: 2px solid #474A59;"></div>';
                        
                        echo '<img style="z-index:4;width: 30%;
                        height: 50%;position: absolute; top:135%;left:9%;display: block;margin:0 auto;border-radius:2em;" src = "FrontAdministrador/Ofertas/Archivos/'.$archivo.'">';
        
                        echo '<div style="font-size:20px;z-index: 4; color: #000; font-family: \'Inter UI\', sans-serif; font-weight: bold; position: absolute; top: 187%; left: 9%;" href="javascript:void(0);" onclick="return Detalle('.$id1.')">'.$nombre.'</div>';
                        echo'<div style="font-size:20px;z-index: 4; color: #000; font-family: \'Inter UI\', sans-serif; position: absolute; top: 193%; left: 9%;",id = "'.$id1.'"> '."$ ".$sueldo1.' </div>';
                    }
                }
                
                $i += 1;
            }
            $i = 0;
            foreach($res as $row)
            {
                if($maxO > 0)
                {
                    if($i == $numbersList[0])
                    {
                        $id2 = $row["id"];
                        $archivo = $row["archivo"];
                        $nombre = $row["nombre"];
                        $sueldo2 = $row["sueldo"];

                        echo "<div id='ofertas'></div>";
                        
                        echo '
                        <div style="z-index:3;background-color: #D8D8D8;width:500px; height:400px; object-fit: cover;
                        border-radius: 2em; position: absolute;top:130%;left:5%;border: 2px solid #474A59;"></div>';
                        
                        echo '<img style="z-index:4;width: 30%;
                        height: 50%;position: absolute; top:135%;left:9%;display: block;margin:0 auto;border-radius:2em;" src = "FrontAdministrador/Ofertas/Archivos/'.$archivo.'">';
        
                        echo '<div style="font-size:20px;z-index: 4; color: #000; font-family: \'Inter UI\', sans-serif; font-weight: bold; position: absolute; top: 187%; left: 9%;" href="javascript:void(0);" onclick="return Detalle('.$id2.')">'.$nombre.'</div>';
                        echo'<div style="font-size:20px;z-index: 4; color: #000; font-family: \'Inter UI\', sans-serif; position: absolute; top: 193%; left: 9%;",id = "'.$id2.'"> '."$ ".$sueldo2.' </div>';

                    }
                }
                $i += 1;
            }
            $i = 0;
            foreach($res as $row)
            {
                if($maxO > 1)
                {
                    if($i == $numbersList[1])
                    {
                        $id3 = $row["id"];
                        $archivo = $row["archivo"];
                        $nombre = $row["nombre"];
                        $sueldo3 = $row["sueldo"];

                        echo "<div id='ofertas'></div>";
                        
                        echo '
                        <div style="z-index:3;background-color: #D8D8D8;width:500px; height:400px; object-fit: cover;
                        border-radius: 2em; position: absolute;top:130%;right:5%;border: 2px solid #474A59;"></div>';
                        
                        echo '<img style="z-index:4;width: 30%;
                        height: 50%;position: absolute; top:135%;right:9%;display: block;margin:0 auto;border-radius:2em;" src = "FrontAdministrador/Ofertas/Archivos/'.$archivo.'">';
        
                        echo '<div style="font-size:20px;z-index: 4; color: #000; font-family: \'Inter UI\', sans-serif; font-weight: bold; position: absolute; top: 187%; left:62%;" href="javascript:void(0);" onclick="return Detalle('.$id3.')">'.$nombre.'</div>';
                        echo'<div style="font-size:20px;z-index: 4; color: #000; font-family: \'Inter UI\', sans-serif; position: absolute; top: 193%; left:62%;",id = "'.$id3.'"> '."$ ".$sueldo3.' </div>';
                    }
                }
                $i += 1;
            }
            $i = 0;
            foreach($res as $row)
            {
                if($maxO > 2)
                {
                    if($i == $numbersList[2])
                    {
                        $id4 = $row["id"];
                        $archivo = $row["archivo"];
                        $nombre = $row["nombre"];
                        $sueldo4 = $row["sueldo"];

                        echo '
                        <div style="z-index:3;background-color: #D8D8D8;width:500px; height:400px; object-fit: cover;
                        border-radius: 2em; position: absolute;top:210%;left:5%;border: 2px solid #474A59;"></div>';
                        
                        echo '<img style="z-index:4;width: 30%;
                        height: 50%;position: absolute; top:215%;left:9.5%;display: block;margin:0 auto;border-radius:2em;" src = "FrontAdministrador/Ofertas/Archivos/'.$archivo.'">';
        
                        echo '<div style="font-size:20px;z-index: 4; color: #000; font-family: \'Inter UI\', sans-serif; font-weight: bold; position: absolute; top: 265%; left: 9%;" href="javascript:void(0);" onclick="return Detalle('.$id4.')">'.$nombre.'</div>';
                        echo'<div style="font-size:20px;z-index: 4; color: #000; font-family: \'Inter UI\', sans-serif; position: absolute; top: 270%; left: 9%;",id = "'.$id4.'"> '."$ ".$sueldo4.' </div>';
                    }
                }
                $i += 1;
            }
            $i = 0;
            foreach($res as $row)
            {
                if($maxO > 3)
                {
                    if($i == $numbersList[3])
                    {
                        $id5 = $row["id"];
                        $archivo = $row["archivo"];
                        $nombre = $row["nombre"];
                        $sueldo5 = $row["sueldo"];
                        
                        echo '
                        <div style="z-index:3;background-color: #D8D8D8;width:500px; height:400px; object-fit: cover;
                        border-radius: 2em; position: absolute;top:210%;right:5%;border: 2px solid #474A59;"></div>';
                        
                        echo '<img style="z-index:4;width: 30%;
                        height: 50%;position: absolute; top:215%;right:9%;display: block;margin:0 auto;border-radius:2em;" src = "FrontAdministrador/Ofertas/Archivos/'.$archivo.'">';
        
                        echo '<div style="font-size:20px;z-index: 4; color: #000; font-family: \'Inter UI\', sans-serif; font-weight: bold; position: absolute; top: 265%; left:62%;" href="javascript:void(0);" onclick="return Detalle('.$id5.')">'.$nombre.'</div>';
                        echo'<div style="font-size:20px;z-index: 4; color: #000; font-family: \'Inter UI\', sans-serif; position: absolute; top: 270%; left:62%;",id = "'.$id5.'"> '."$ ".$sueldo5.' </div>';
                    }
                }
                $i += 1;
            }
            $i = 0;
            foreach($res as $row)
            {
                if($maxO > 4)
                {
                    if($i == $numbersList[4])
                    {
                        $id6 = $row["id"];
                        $archivo = $row["archivo"];
                        $nombre = $row["nombre"];
                        $sueldo6 = $row["sueldo"];

                        echo '
                        <div style="z-index:3;background-color: #D8D8D8;width:500px; height:400px; object-fit: cover;
                        border-radius: 2em; position: absolute;top:310%;left:5%;border: 2px solid #474A59;"></div>';
                        
                        echo '<img style="z-index:4;width: 30%;
                        height: 50%;position: absolute; top:315%;left:9.5%;display: block;margin:0 auto;border-radius:2em;" src = "FrontAdministrador/Ofertas/Archivos/'.$archivo.'">';
        
                        echo '<div style="font-size:20px;z-index: 4; color: #000; font-family: \'Inter UI\', sans-serif; font-weight: bold; position: absolute; top: 365%; left: 9%;" href="javascript:void(0);" onclick="return Detalle('.$id6.')">'.$nombre.'</div>';
                        echo'<div style="font-size:20px;z-index: 4; color: #000; font-family: \'Inter UI\', sans-serif; position: absolute; top: 370%; left: 9%;",id = "'.$id6.'"> '."$ ".$sueldo6.' </div>';
                    }
                }
                $i += 1;
            }
        ?>
    </body>    
<html>