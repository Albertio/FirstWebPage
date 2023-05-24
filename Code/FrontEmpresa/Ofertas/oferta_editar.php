<html>
	<head>
		<title> Editar Oferta </title>

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
		<script>			
			function Valida(id, nombreA, descripcionA, sueldoA, archivoA, archivo_nA)
			{
				nombre = document.getElementById("nombre").value;
				descripcion = document.getElementById("descripcion").value;
				stock = document.getElementById("sueldo").value;
				archivo = document.getElementById("archivo").value;
				sueldo = document.getElementById("sueldo").value;
				if(nombre == "" || descripcion == "" || sueldo == "")
				{
					var contenido = document.getElementById("mensajeCampos");
					contenido.style.opacity = '1';
					setTimeout("$('#mensajeCampos').html('')", 5000);
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
					if(descripcion != descripcionA)
					{
						descripcionA = descripcion;
						change = true;
					}
					if(sueldo != sueldoA)
					{
						sueldoA = sueldo;
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
							"descripcion" : descripcionA,
							"stock" : sueldo,
							"archivo" : archivoA,
							"archivo_n" : archivo_nA,
						};

						$.ajax(
						{
							url : "../Funciones/actualizarInformacionOfertas.php",
							type : 'post',
							dataType : 'text',
							data : parametros,

							success : function(res)
							{
								if(res == 1)
								{
									var contenido = document.getElementById("mensajeExito");
									contenido.style.opacity = '1';
									setTimeout("$('#mensajeCampos').html('')", 5000);
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
			function comprobarSueldo(sueldo)
			{
                if(isNaN(sueldo.value))
				{
					var contenido = document.getElementById("mensajeSueldo");
					contenido.style.opacity = '1';
					setTimeout("$('#mensajeSueldo').html('')", 5000);
					document.getElementById("Button"). disabled = true;
				}
				else
				{
					if(sueldo.value < 0)
					{
						var contenido = document.getElementById("mensajeOtroSueldo");
						contenido.style.opacity = '1';
						setTimeout("$('#mensajeOtroSueldo').html('')", 5000);
						document.getElementById("Button"). disabled = true;
					}
					else
					{
						document.getElementById("Button").disabled = false;
					}
				}
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
			echo "<a class='boton-opcion' style='bottom:10%;right:20%;' href=\"ofertas.php\">Regresar</a>";
		?> 
		<?php
			//Recibe variables
			$id = $_REQUEST['id'];
			
			$sql = "SELECT * FROM ofertas
					WHERE id_primary = $id";
			$res = $con->query($sql);

			//$row = $res->fetch(PDO::FETCH_ASSOC); 
			$row = mysqli_fetch_array($res);
			
			$nombre = $row["nombre"];
			$descripcion = $row["descripcion"];
			$sueldo = $row["sueldo"];
			$status = $row["estado"];
			$archivo = $row["archivo"];
			$archivo_n = $row["archivo_n"];
	
			echo "
			<div class='left-imagen' style='background-image: url(../Styles/editar-usuario.jpg);top:25%;left:5%;'></div>
			<div class='right'>
			<form enctype = 'multipart/form-data', onSubmit = 'return Valida($id,\"$nombre\",\"$descripcion\",\"$sueldo\",\"$archivo\", \"$archivo_n\")', method = 'post', action = '../Funciones/actualizarInformacionOfertas.php'>
				<input type = 'hidden' name = 'id', id = 'id', value = '$id'><br>
				<a class='label-formulario' style='color:#fff;font-size:130%;top:35%;left:37%;margin:auto;'>Nombre:</a>
				<br>
					<input class='input-formulario' style='top:43%;left:37%;margin:auto;' type = 'text', name = 'nombre', id = 'nombre', value = '$nombre', />
				<br>

				<a class='label-formulario' style='color:#fff;font-size:130%;top:55%;left:37%;margin:auto;'>Descripción:</a>
				<br>
					<textarea class='recuadro-texto' style='top:60%;left:37%;margin:auto;' id = 'descripcion', name = 'descripcion', cols=40, rows=10>$descripcion </textarea>
				<br>

				<a class='label-formulario' style='color:#fff;font-size:130%;top:35%;right:30%;'>Sueldo:</a>
				<br>
					<input class='input-formulario' style='top:43%;right:20%;' onblur = 'comprobarSueldo(sueldo);', type = 'text', name = 'sueldo', id = 'sueldo', value = '$sueldo', />
				<br>
				<div class='label-formulario' style='color:red;opacity: 0;transition: opacity 1s;font-size:130%;top:25%;right:15%;margin:auto;' id = 'mensajeSueldo', name = 'mensajeSueldo'>El sueldo debe ser un valor númerico </div>
				<div class='label-formulario' style='color:red;opacity: 0;transition: opacity 1s;font-size:130%;top:25%;right:15%;margin:auto;' id = 'mensajeOtroSueldo', name = 'mensajeOtroSueldo'>El sueldo no puede ser negativo</div>
				
				<a class='label-formulario' style='color:#fff;font-size:130%;top:55%;right:27%;margin:auto;'>Fotografia:</a>
				<br>
					<input style='position:fixed;top:60%;right:10%;margin:auto;' type = 'file', id = 'archivo', name = 'archivo'>
				<br>

				<div class='label-formulario' style='color:red;opacity: 0;transition: opacity 1s;font-size:130%;top:25%;right:15%;margin:auto;' id = 'mensajeCampos', name = 'mensajeCampos'>Faltan campos por llenar </div>
				<div class='label-formulario' style='color:#1AF113;opacity: 0;font-size:130%;top:25%;right:15%;margin:auto;' id = 'mensajeExito', name = 'mensajeExito'>Registro Exitoso </div>
				<input class='boton-opcion' style=' border: 2px solid #00aeef;bottom:10%;right:8%;' type = 'submit', value = 'Guardar', id = 'Button', onclick = 'Valida($id,\"$nombre\",\"$descripcion\",\"$sueldo\",\"$archivo\", \"$archivo_n\"); ' />

			</form>
			</div>";
		?>
		</form>
	</body>
	
</html>