
<html>
	<head>
		<title> Editar Usuario</title>

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
		<script src = "../Librerias/jquery.md5.js"></script>
		
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
            else if((trim($_SESSION['rol']) == "2"))
            {
                header("../../(Empresa)index.php");
                exit();
            }
			$id = $_REQUEST['id'];
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
								 <?php echo "<a class='nav-link' href =\"usuarios_consultar.php?id=$id\">Perfil</a>";?>
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
			//usuarios_edita.php
			require "../Funciones/conecta.php";
			$con = conecta();
			
			$sql = "SELECT * FROM usuarios
					WHERE id = $id
					AND eliminado = 0;";
			$res = $con->query($sql);

			//$row = $res->fetch(PDO::FETCH_ASSOC); 
			$row = mysqli_fetch_array($res);
			
			$nombre = $row["nombre"];
			$correo = $row["correo"];
			$password = $row["pass"];
			$archivo = $row["archivo_cv"];
			$archivo_n = $row["archivo_cv_n"];

			$archivo_perfil = $row["archivo_perfil"];
			$archivo_perfil_n = $row["archivo_perfil_n"]; 
			
			$archivo = $row["archivo_cv"];
			$archivo_n = $row["archivo_cv_n"];

			$url = $row["url"];

			echo "<a class='boton-segundo' style='bottom:7%;right:18%;' href =\"usuarios_consultar.php?id=$id\">Regresar</a>
			
			
			<div class='left-imagen' style='background-image: url(../Styles/editar-usuario.jpg); top:25%;left:5%;'></div>
			<div class='right-segundo' style='top:25%;right:5%;'>
			<form enctype = 'multipart/form-data', onSubmit = 'return Valida($id,\"$nombre\",\"$correo\",\"$password\",\"$archivo\", \"$archivo_n\")', method = 'post', action = '../Funciones/actualizarInformacionUsuarios.php'>
			<input type = 'hidden' name = 'id', id = 'id', value = '$id'><br>

				<a class='label-formulario' style='color:#fff;font-size:130%;top:15%;left:8%;'>Nombre:</a>
				<br>
				<input class='input-formulario' style='top:43%;right:46%;' type = 'text', name = 'nombre', id = 'nombre', value = '$nombre', />
				<br>

				<a class='label-formulario' style='color:#fff;font-size:130%;top:15%;left:38%;'>Correo:</a>
				<br>
				<input class='input-formulario' style='top:43%;right:27.5%;' onblur = 'ComprobarCorreo(correo,$id);', type = 'text', name = 'correo', id = 'correo', value = '$correo' />
				<br>
				<div class='label-formulario' style='color:red;opacity: 0;transition: opacity 1s;font-size:130%;top:5%;right:15%;margin:auto;' id = 'mensajeCorreo'> El correo ya existe</div>
				<br>
				<a class='label-formulario' style='color:#fff;font-size:130%;top:15%;right:17%;'>Contraseña:</a>
					<br>
					<input  class='input-formulario' style='top:43%;right:9%;'type = 'text', name = 'password', id = 'password', , placeholder = '***********'/>
					<br>
				<br>

				<a class='label-formulario' style='color:#fff;font-size:130%;top:45%;left:8%;'>Foto de Perfil:</a>
					<br>
					<input style='position: fixed;top:62%;right:36%;' type = 'file', id = 'archivo', name = 'archivo'>
					<br>
				
					<a class='label-formulario' style='color:#fff;font-size:130%;top:45%;right:42%;'>CV:</a>
					<br>
					<input style='position: fixed;top:62%;right:8%;' type = 'file', id = 'archivo_cv', name = 'archivo_cv'>
					<br>

				<a class='label-formulario' style='color:#fff;font-size:130%;top:72%;left:8%;'>Url:</a>
					<br>
					<input class='input-formulario' style='top:82%;right:46%;' type = 'text', name = 'url', id = 'url', , placeholder = 'Pagina Web'/>
					<br>
					<div class='label-formulario' style='color:red;opacity: 0;transition: opacity 1s;font-size:130%;top:5%;right:15%;margin:auto;' id = 'mensajeCampos', name = 'mensajeCampos'>Faltan campos por llenar </div>
					<div class='label-formulario' style='color:#1AF113;opacity: 0;font-size:130%;top:5%;right:15%;margin:auto;' id = 'mensajeExito', name = 'mensajeExito'>Registro Actualizado </div>
				<br>
				<input class='boton-segundo' style='border: 2px solid #00aeef;bottom:7%;right:7%;' type = 'submit', value = 'Guardar', id = 'Button', onclick = 'Valida($id,\"$nombre\",\"$correo\",\"$password\",\"$archivo\", \"$archivo_n\"); ' />
				</form></div>";
		?>
	</body>

	<script>
			
			function Valida(id, nombreA, correoA, passwordA, archivoA, archivo_nA, cv)
			{
				nombre = document.getElementById("nombre").value;
				correo = document.getElementById("correo").value;
				password = document.getElementById("password").value;
				archivo = document.getElementById("archivo").value;
				cv = document.getElementById("archivo_cv").value;
				url = document.getElementById("url").value;
				if(nombre == "" || apellidos == "" || correo == "")
				{
					var contenido = document.getElementById("mensajeCampos");
					contenido.style.opacity = '1';
					setTimeout("$('#mensajeCampos').html('')", 5000);
					return false;
				}
				if(url.length > 50)
					{
						alert("Este URL es demasiado largo!");
						return false;
					}
				else
				{
					var change = false;
					if(nombre != nombreA)
					{
						nombreA = nombre;
						change = true;
					}
					if(correo != correoA)
					{
						correoA = correo;
						change = true;
					}
					if(password != "")
					{
						passEnc = $.md5(password);
						passwordA = passEnc;
						change = true;
					}
					if(archivo.length > 0)
					{
						archivoA = archivo;
						change = true;
					}
					if(change == true)
					{
						return true;
						var parametros = 
						{
							"id" : id,
							"nombre" : nombreA,
							"correo" : correoA,
							"password" : passwordA,
							"archivo" : archivoA,
							"archivo_n" : archivo_nA,
							"archivo_cv" : cv,
							"url" : url,
						};

						$.ajax(
						{
							url : "../../FrontAdministrador/Funciones/actualizarInformacionUsuarios.php",
							type : 'post',
							dataType : 'text',
							data : parametros,

							success : function(res)
							{
								if(res == 1)
								{
									var contenido = document.getElementById("mensajeExito");
									contenido.style.opacity = '1';
									setTimeout("$('#mensajeExito').html('')", 5000);
								}
							}
						});
					}
					else
					{
						return false;
					}
				}
			}
			function ComprobarCorreo(correo, id)
			{
                if(correo.value)
                {
					var parametros = 
					{
						"correo" : correo.value,
						"id" : id
					};
					$.ajax(
					{

						url : '../../FrontAdministrador/Funciones/comprobarCorreoEditado.php',
						type : 'post',
						dataType : 'text',
						data : parametros,

						success : function(res)
						{
							if(res == 1)
							{
								var contenido = document.getElementById("mensajeCorreo");
								contenido.style.opacity = '1';
								setTimeout("$('#mensajeCorreo').html('')", 5000);
								document.getElementById("Button"). disabled = true;
							}
							else
							{
								document.getElementById("Button").disabled = false;
							}
						}
					});
				}
			}
		</script>
	
</html>