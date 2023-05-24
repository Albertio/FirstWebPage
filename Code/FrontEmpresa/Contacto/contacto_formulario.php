
<html>
	<head>
        <title>Contacto</title>

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
			//Validar los campos
			
			function Enviar(comentarios)
			{
				var correo = document.getElementById("password").value;
				var nombre = document.getElementById("correo").value;
				var parametros = 
				{
					"titulo" : correo,
					"mensaje" : comentarios,
					"nombre" : nombre,
				};
				$.ajax(
				{
					url : 'contacto_envia.php',
					type : 'post',
					dataType : 'text',
					data : parametros,

					success : function(res)
					{
						if(res == 1)
						{
							alert("Correo Enviado con exito!");
						}
						else
						{
							alert("Correo Enviado sin exito!");
						}
						
					}
					
				});
				return true;
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
                                    <a class="nav-link" href="../Ofertas/ofertas.php?pagina=1&">Ofertas</a>
                                 </li>
								 <li class="nav-item">
                                    <a class="nav-link" href="contacto_formulario.php">Contacto</a>
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

				$id_pedido = 0;
				foreach($num1 as $row)
				{
					if($row["id_usuario"] > 0)
					{
						$id_pedido = $row["id_usuario"];
					}
				}
			?>
		
		<div class="right">
			<form action = "cuentaskillup@gmail.com", method = 'post', id = "myform">
            	<br>
				<a class='label-formulario' style='font-size:130%;right:60%;'>Contactanos:</a>
				<br>
				<a class='label-formulario' style="top:40%;left:35%;">Nombre:</a>
				<br>
				<input class='input-formulario' style='top:45%;left:35%;'type = 'text', name = 'correo', id = 'correo', placeholder = 'Tu nombre'/>
				<br>
				<a class='label-formulario' style="top:40%;right:25%;">Correo:</a>
				<br>
				<input class='input-formulario' style='top:45%;right:15%;' type = 'text', name = 'password', id = 'password', placeholder = 'Correo@Dominio'/>
				<br>
            	<a class='label-formulario' style="top:60%;left:35%;">Comentarios</a>
				<br>
				<textarea class='recuadro-texto' style="top:65%;left:35%;" id = "comentarios", name = 'comentarios', cols="40", rows="10"> </textarea>
				<br>
				<button class='boton-opcion' style='bottom:10%;right:8%;' href='javascript:void(0);' onclick = "return Enviar(comentarios)">Enviar</a>
			</form>
		</div>
		<div class="left-imagen" style="background-image: url(../Styles/contacto.jpg);top:25%;left:5%;"></div>
	</body>
</html>