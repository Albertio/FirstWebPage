<html>
	<head>
		<title> Alta de Ofertas</title>

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
      	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

         <link rel="stylesheet" type="text/css" href="../Styles/css/stylenose.css"/>
		
      	<link rel="stylesheet" type="text/css" href="../Styles/css/style.css"/>

		<script src = "../Librerias/jquery-3.3.1.min.js"></script>
		
	</head>
	<body>
	<script>
			function Valida()
			{
				nombre = document.getElementById("nombre").value;
				descripcion = document.getElementById("descripcion").value;
				codigo = document.getElementById("sueldo").value;
				archivo = document.getElementById("archivo").value;

				if(nombre == "" || descripcion == "" || sueldo == "" || archivo.length <= 0)
				{
					var contenido = document.getElementById("mensajeCampos");
					contenido.style.opacity = '1';
					setTimeout("$('#mensajeCampos').html('')", 5000);

					return false;
				}
				else
				{
					var contenido = document.getElementById("mensajeExito");
					contenido.style.opacity = '1';
					setTimeout("$('#mensajeCampos').html('')", 5000);
					return true;

				}
			}
		</script>
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

            require "../Funciones/conecta.php";
			$con = conecta();
			
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
			echo "<a class='boton-segundo' style='bottom:10%;right:20%;' href=\"ofertas.php\">Regresar</a>";
		?> 
				
		<div class='left-imagen' style='background-image: url(../Styles/oferta-alta.jpg); top:25%; left:5%;'></div>
		<div class='right-segundo' style='top:25%;right:5%;'>
		<form enctype = "multipart/form-data", onSubmit = "return Valida()", method = 'post', action = "oferta_salva.php?id=$id_usuario&">
		
		<br>
		<a class='label-formulario' style='color:#fff;font-size:130%;top:30%;left:45%;'>Nombre:<a>
		<br>
			<input class='input-formulario' style='top:38%;left:45%;' type = 'text', name = 'nombre', id = 'nombre', placeholder = 'Nombre', />
		<br>

		<a class='label-formulario' style='color:#fff;font-size:130%;top:55%;left:45%;'>Descripción:</a>
		<br>
			<textarea class='recuadro-texto' style='top:63%;left:45%;' id = "descripcion", name = 'descripcion', cols="40", rows="10"> </textarea>
		<br>

		<a class='label-formulario' style='color:#fff;font-size:130%;top:30%;left:70%;'>Sueldo:</a>
		<br>
			<input class='input-formulario' style='top:38%;left:70%;'type = 'text', name = 'sueldo', id = 'sueldo', placeholder = '$', />
		<br>
		
		<a class='label-formulario' style='color:#fff;font-size:130%;top:55%;left:70%;'>Fotografia:</a>
		<br>
			<input style='position:absolute;top:55%;left:55%;' type = "file", id = "archivo", name = "archivo">
		<br>
		
		<div id = 'mensajeCampos', name = 'mensajeCampos'> </div>

		<input class='boton-segundo' style='border: 2px solid #00aeef; bottom:10%;right:7%;' type = "submit", value = "Enviar", id = "Button">
		
		</form>	
		</div>

		
	</body>
	
</html>