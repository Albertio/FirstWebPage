<html>
<head>

<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <!-- site metas -->
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- bootstrap css -->
  <link rel="stylesheet" href="../Styles/css/bootstrap.min.css">
  <link rel="stylesheet" href="../Styles/css/responsive.css">
  <!-- fevicon -->
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet" href="../Styles/css/jquery.mCustomScrollbar.min.css">
  <!-- Tweaks for older IEs-->
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
  <link rel="stylesheet" type="text/css" href="../Styles/css/styles.css"/>

  <link rel="stylesheet" type="text/css" href="../Styles/css/style.css"/>

  <style>
  body {
    background-image: url("../Styles/proximamente.png");
    background-repeat: no-repeat;
    background-size: cover;
  }
</style>


</head>


<script src = "../Librerias/jquery-3.3.1.min.js"></script>
<script>
function ocultar(id)
{
	if(id)
	{
		if(confirm("Esta seguro que desea eliminar el producto"))
		{
			$.ajax(
			{
				url : 'ofertas_elimina.php',
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
				  <a href="../index.php"><img src="../Styles/logo.png" alt="#" /></a>
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
						<a class="nav-link" href="../Usuarios/usuarios_lista.php">Usuarios</a>
					 </li>
					 <li class="nav-item">
						<a class="nav-link" href="../Ofertas/ofertas_lista.php">Ofertas</a>
					 </li>
					 <li class="nav-item">
						<a class="nav-link" href="../Postulaciones/postulaciones_lista.php">Postulaciones</a>
					 </li>
					 <li class="nav-item">
						<a class="nav-link" href="../Banners/banners_lista.php">Anuncios</a>
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
		/*
			//banners_lista.php
			require "Funciones/conecta.php";
			$con = conecta();
			
			//Seleccionamos el registro
			$sql = "SELECT * FROM banners
					WHERE status = 1 AND eliminado = 0";

			$res = $con->query($sql);
			
			echo "<audio id = 'chains', preload = 'auto'> <source src = '../Styles/DesingResources/SelectSound.mp3', controls = ''> </audio>";
			echo '<div class = "Tabla">';

			
			//Mostrar informacion
			echo "<div class = 'TitleBox'> <div class = 'text'> LISTADO DE BANNERS </div> </div> <br><br> ";

			echo "<a class='link-wrapper' href=\"../Bienvenido.php\">
					<span class='fallback'>Index</span>
					<div class='img-wrapper'>
						<img class='normal' src='../Styles/FontResources/Buttons/RegresarNormal.png'>
						<img class='active' src='../Styles/FontResources/Buttons/RegresarActive.png'>
					</div>
					<div class='shape-wrapper'>
						<div class='shape red-fill jelly'><svg x='0px' y='0px' viewBox='0 0 108.1 47' enable-background='new 0 0 108.1 47'>
							<polygon fill='#FF0000' points='29.5,8.5 150.7,0 108.1,32.7 3.1,47 '></polygon>
						</svg></div>
						<div class='shape cyan-fill jelly'><svg x='0px' y='0px' viewBox='0 0 108.1 47' enable-background='new 0 0 108.1 47'>
							<polygon fill='#00FFFF' points='0.3,17 125.1,0 68.8,45.6 24.3,39 '></polygon>
						</svg></div>
					</div>
				</a><br><br><br>";

			echo "<a class='link-wrapper' href=\"banners_alta.php\">
						<span class='fallback'>Index</span>
						<div class='img-wrapper'>
							<img class='normal' src='../Styles/FontResources/Buttons/CrearNormal.png'>
							<img class='active' src='../Styles/FontResources/Buttons/CrearActive.png'>
						</div>
						<div class='shape-wrapper'>
							<div class='shape red-fill jelly'><svg x='0px' y='0px' viewBox='0 0 108.1 47' enable-background='new 0 0 108.1 47'>
								<polygon fill='#FF0000' points='29.5,8.5 150.7,0 108.1,32.7 3.1,47 '></polygon>
							</svg></div>
							<div class='shape cyan-fill jelly'><svg x='0px' y='0px' viewBox='0 0 108.1 47' enable-background='new 0 0 108.1 47'>
								<polygon fill='#00FFFF' points='0.3,17 125.1,0 68.8,45.6 24.3,39 '></polygon>
							</svg></div>
						</div>
					</a><br><br><br>";
			
			//Tabla
			echo '<div class = "Fila1">';
					echo '<div class = "CajaId">' . "<h1> ID </h1>" . '</div>';
					echo '<div class = "CajaNombre">' . "<h1> NOMBRE </h1>" . '</div>';
					echo '<div class = "CajaCorreo">' . "<h1> IMAGEN </h1>" . '</div>';
					echo '<div class = "CajaBoton">' . "<h1> ACCIONES </h1>" . '</div>';
				echo '</div>';

			
			foreach ($res as $row )
			{
				$id = $row["id"];
				$nombre = $row["nombre"];
				$archivo = $row["archivo"];

				echo '<div class = "Fila2", id = "'.$id.'">';
					echo '<div class = "CajaId">' . "<h4>$id</h4>" . '</div>';
					echo '<div class = "CajaNombre">' . "$nombre" . '</div>';
					echo '<div class = "CajaCorreo">
						<img src = "Archivos/'.$archivo.'", style="width:80%;">
					</div>';
					
					echo '<div class = "CajaBoton">';

					echo "<a class='link-wrapper' href = 'javascript:void(0);' onClick = 'ocultar($id);'>
							<span class='fallback'>Index</span>
							<div class='img-wrapper'>
								<img class='normal' src='../Styles/FontResources/Buttons/EliminarNormal.png'>
								<img class='active' src='../Styles/FontResources/Buttons/EliminarActive.png'>
							</div>
							<div class='shape-wrapper'>
								<div class='shape red-fill jelly'><svg x='0px' y='0px' viewBox='0 0 108.1 47' enable-background='new 0 0 108.1 47'>
									<polygon fill='#FF0000' points='29.5, 8.5 150.7, 0 108.1, 32.7 3.1, 47 '></polygon>
								</svg></div>
								<div class='shape cyan-fill jelly'><svg x='0px' y='0px' viewBox='0 0 108.1 47' enable-background='new 0 0 108.1 47'>
									<polygon fill='#00FFFF' points='0.3,17 125.1,0 68.8,45.6 24.3,39 '></polygon>
								</svg></div>
							</div>
						</a><br><br><br>";
					
					echo "<a class='link-wrapper' href =\"banners_consultar.php?id=$id\"'>
						<span class='fallback'>Index</span>
						<div class='img-wrapper'>
							<img class='normal' src='../Styles/FontResources/Buttons/DetalleNormal.png'>
							<img class='active' src='../Styles/FontResources/Buttons/DetalleActive.png'>
						</div>
						<div class='shape-wrapper'>
							<div class='shape red-fill jelly'><svg x='0px' y='0px' viewBox='0 0 108.1 47' enable-background='new 0 0 108.1 47'>
								<polygon fill='#FF0000' points='29.5,8.5 150.7,0 108.1,32.7 3.1,47 '></polygon>
							</svg></div>
							<div class='shape cyan-fill jelly'><svg x='0px' y='0px' viewBox='0 0 108.1 47' enable-background='new 0 0 108.1 47'>
								<polygon fill='#00FFFF' points='0.3,17 125.1,0 68.8,45.6 24.3,39 '></polygon>
							</svg></div>
						</div>
					</a><br><br>";

					echo "<a class='link-wrapper' href=\"banners_editar.php?id=$id\"'>
						<span class='fallback'>Index</span>
						<div class='img-wrapper'>
							<img class='normal' src='../Styles/FontResources/Buttons/EditarNormal.png'>
							<img class='active' src='../Styles/FontResources/Buttons/EditarActive.png'>
						</div>
						<div class='shape-wrapper'>
							<div class='shape red-fill jelly'><svg x='0px' y='0px' viewBox='0 0 108.1 47' enable-background='new 0 0 108.1 47'>
								<polygon fill='#FF0000' points='29.5,8.5 150.7,0 108.1,32.7 3.1,47 '></polygon>
							</svg></div>
							<div class='shape cyan-fill jelly'><svg x='0px' y='0px' viewBox='0 0 108.1 47' enable-background='new 0 0 108.1 47'>
								<polygon fill='#00FFFF' points='0.3,17 125.1,0 68.8,45.6 24.3,39 '></polygon>
							</svg></div>
						</div>
					</a><br><br>";
					
					echo '</div>';


				echo '</div>';
				
			}
			echo "</div>";
			*/
		?>
	</body>
</html>
