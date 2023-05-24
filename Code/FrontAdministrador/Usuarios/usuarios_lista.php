<html>
	<head>
		<title>Listado de usuarios</title>

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
      	<link rel="stylesheet" type="text/css" href="../Styles/css/style-bueno.css"/>
		
      	<link rel="stylesheet" type="text/css" href="../Styles/css/style.css"/>
		
		<script src = "../Librerias/jquery-3.3.1.min.js"></script>
		<script>
			function ocultar(id)
            {
                if(id)
                {
					if(confirm("Esta seguro que desea eliminar el administrador"))
					{
						$.ajax(
						{
							url : 'usuarios_elimina.php',
							type : 'post',
							dataType : 'text',
							data : 'id=' + id,

							success : function(res)
							{
								if(res == 1)
								{
									
									$("#"+id).hide();
								}
								else
								{
									alert("ID ERROR");
								}
							}
						});
					}
                    
                }else
                {
                    $('#mensaje').html('Llena campo');
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
                                    <a class="nav-link" href="usuarios_lista.php">Usuarios</a>
                                 </li>
								 <li class="nav-item">
                                    <a class="nav-link" href="../Ofertas/ofertas_lista.php">Ofertas</a>
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
			//usuarios_lista.php
			require "../Funciones/conecta.php";
			$con = conecta();
			
			//Seleccionamos el registro
			$sql = "SELECT * FROM usuarios
					WHERE eliminado = 0";

			$res = $con->query($sql);
			
			//Mostrar informacion
			echo "<a class='boton-siguiente' style='top:19%;right:10%;' href=\"../Bienvenido.php\">Regresar</a>
				  <a class='boton-siguiente' style='top:19%;right:1%;' href=\"usuarios_alta.php\">Alta</a>";

			
			$x1 = 8;
			$x2 = 15;
			$x3 = 9;
			$x4 = 9;

			$y1 = 30;
			$y2 = 42;
			$y3 = 31;
			$y4 = 60;
			$y5 = 67;
			$y6 = 74;
			$y7 = 80;
			$w1 = 55;
			$w2 = 19;

			$count = 0;
			
			foreach ($res as $row )
			{
				$id = $row["id"];
				$nombre = $row["nombre"];
				$correo = $row["correo"];
				if($row["rol"] == "0")
				{
					$rol = "Empresa";
				}
				else if($row["rol"] == "1")
				{
					$rol = "Usuario";
				}
				else if($row["rol"] == "2")
				{
					$rol = "Administrador";
				}
				else
				{
					$rol = "Undefined";

				}

				echo "<div class='cuadro-perfilsuperior' style='top:".$y1."%;left:".$x1."%;'></div>";
				echo "<div class='cuadro-perfilinferior' style='top:".$y2."%;left:".$x1."%; id = ".$id."'></div>";
				
				echo"      <div class='otro-imagen-perfil'>";
				echo"     <img style='border-radius:0%; top:".$y3."%;left:".$x2."%;' src='../Styles/usuario.png'>";
				echo"     </div>";
				echo"	<div class = 'otro-label-formulario' style='color:#000;top:".$w1."%;left:".$w2."%;'>".$id."</div>";
					echo"<div class = 'otro-label-formulario'style='font-size:15px;color:#fff;top:".$y4."%;left:".$x3."%;'>".$nombre."</div>";
					
					echo"<div class = 'otro-label-formulario'style='font-size:15px;color:#fff;top:".$y5."%;left:".$x3."%;'>".$correo."</div>";
				
					echo"<div class = 'otro-label-formulario'style='font-size:15px;color:#fff;top:".$y6."%;left:".$x3."%;'>".$rol."</div>";
						echo"<a class='otro-botonsiguiente' style='top:".$y7."%;left:".$x4."%;' href = 'javascript:void(0);' onClick = 'ocultar($id);'>Eliminar</a><br>";
						$x4 = $x4 + 7.5;
						echo"<a class='otro-botonsiguiente' style='top:".$y7."%;left:".$x4."%;' href =\"usuarios_consultar.php?id=$id\"'>Detalle</a><br>";
						$x4 = $x4 + 7.5;
						echo"<a class='otro-botonsiguiente' style='top:".$y7."%;left:".$x4."%;' href=\"usuarios_editar.php?id=$id\"'>Editar</a><br>";
				

				$count = $count + 1;
				$x1 = $x1 + 30;
				$x2 = $x2 + 30;
				$w2 = $w2 +30;
				$x3 = $x3 + 30;
				$x4 = $x4 + 15;

				if($count % 3 == 0)
				{
					$x1 = 8;
					$x2 = 15;
					$x3 = 9;
					$x4 = 9;
					$w2 = 19;

					$y1 = $y1 + 70;
					$y2 = $y2 + 70;
					$y3 = $y3 + 70;
					$y4 = $y4 + 70;
					$y5 = $y5 + 70;
					$y6 = $y6 + 70;
					$y7 = $y7 + 70;
					$w1 = $w1 + 70;
				}
				
			}
		?>
	</body>
</html>
