
<html>
	<head>
		<title> Consultar Banners</title>
	</head>
		<link rel="icon" href="../Styles/icon.webp">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
		<link rel="stylesheet" href="../Styles/style.css">
		<style>
			@font-face
			{
				font-family: expose; src: url('../Styles/Persona5.ttf');
			}
			@font-face
			{
				font-family: hatty; src: url('../Styles/p5hatty.ttf');		
			}
			@font-face
			{
				font-family: regular; src: url('../Styles/Expose-Regular.otf');		
			}
		</style> 
	<body>
		<?php
			session_start();

			if (!isset($_SESSION['nombre']) || (trim($_SESSION['nombre']) == '')) 
			{
				header("location: ../../index.php");
				exit();
			}
			?>
			<div class = "MT">
				<div class = "MF1">
					<div class = "MCI">
						<a class='link-wrapper'href ="../Bienvenido.php">
							<span class='fallback'>Index</span>
							<div class='img-wrapper'>
								<img class='normal' src='../Styles/FontResources/Buttons/InicioNormal.png'>
								<img class='active' src='../Styles/FontResources/Buttons/InicioActive.png'>
							</div>
							<div class='shape-wrapper'>
								<div class='shape red-fill jelly'><svg x='0px' y='0px' viewBox='0 0 108.1 47' enable-background='new 0 0 108.1 47'>
									<polygon fill='#FF0000' points='29.5,8.5 150.7,0 108.1,32.7 3.1,47 '></polygon>
								</svg></div>
								<div class='shape cyan-fill jelly'><svg x='0px' y='0px' viewBox='0 0 108.1 47' enable-background='new 0 0 108.1 47'>
									<polygon fill='#00FFFF' points='0.3,17 125.1,0 68.8,45.6 24.3,39 '></polygon>
								</svg></div>
							</div>
						</a>
					</div>
					<div class = "MCA">
						<a class='link-wrapper' href ="../Administradores/administradores_lista.php">
							<span class='fallback'>Index</span>
							<div class='img-wrapper'>
								<img class='normal' src='../Styles/FontResources/Buttons/AdministradoresNormal.png'>
								<img class='active' src='../Styles/FontResources/Buttons/AdministradoresActive.png'>
							</div>
							<div class='shape-wrapper'>
								<div class='shape red-fill jelly'><svg x='0px' y='0px' viewBox='0 0 108.1 47' enable-background='new 0 0 108.1 47'>
									<polygon fill='#FF0000' points='29.5,8.5 150.7,0 108.1,32.7 3.1,47 '></polygon>
								</svg></div>
								<div class='shape cyan-fill jelly'><svg x='0px' y='0px' viewBox='0 0 108.1 47' enable-background='new 0 0 108.1 47'>
									<polygon fill='#00FFFF' points='0.3,17 125.1,0 68.8,45.6 24.3,39 '></polygon>
								</svg></div>
							</div>
						</a>
					</div>
					<div class = "MCPr">
						<a class='link-wrapper' href ="../Productos/productos_lista.php">
							<span class='fallback'>Index</span>
							<div class='img-wrapper'>
								<img class='normal' src='../Styles/FontResources/Buttons/ProductosNormal.png'>
								<img class='active' src='../Styles/FontResources/Buttons/ProductosActive.png'>
							</div>
							<div class='shape-wrapper'>
								<div class='shape red-fill jelly'><svg x='0px' y='0px' viewBox='0 0 108.1 47' enable-background='new 0 0 108.1 47'>
									<polygon fill='#FF0000' points='29.5,8.5 150.7,0 108.1,32.7 3.1,47 '></polygon>
								</svg></div>
								<div class='shape cyan-fill jelly'><svg x='0px' y='0px' viewBox='0 0 108.1 47' enable-background='new 0 0 108.1 47'>
									<polygon fill='#00FFFF' points='0.3,17 125.1,0 68.8,45.6 24.3,39 '></polygon>
								</svg></div>
							</div>
						</a>
					</div>
					<div class = "MCPe">
						<a class='link-wrapper' href ="../Pedidos/pedidos_lista.php">
							<span class='fallback'>Index</span>
							<div class='img-wrapper'>
								<img class='normal' src='../Styles/FontResources/Buttons/PedidosNormal.png'>
								<img class='active' src='../Styles/FontResources/Buttons/PedidosActive.png'>
							</div>
							<div class='shape-wrapper'>
								<div class='shape red-fill jelly'><svg x='0px' y='0px' viewBox='0 0 108.1 47' enable-background='new 0 0 108.1 47'>
									<polygon fill='#FF0000' points='29.5,8.5 150.7,0 108.1,32.7 3.1,47 '></polygon>
								</svg></div>
								<div class='shape cyan-fill jelly'><svg x='0px' y='0px' viewBox='0 0 108.1 47' enable-background='new 0 0 108.1 47'>
									<polygon fill='#00FFFF' points='0.3,17 125.1,0 68.8,45.6 24.3,39 '></polygon>
								</svg></div>
							</div>
						</a>
					</div>
					<div class = "MCPe">
						<a class='link-wrapper' href ="banners_lista.php">
							<span class='fallback'>Index</span>
							<div class='img-wrapper'>
								<img class='normal' src='../Styles/FontResources/Buttons/BannersNormal.png'>
								<img class='active' src='../Styles/FontResources/Buttons/BannersActive.png'>
							</div>
							<div class='shape-wrapper'>
								<div class='shape red-fill jelly'><svg x='0px' y='0px' viewBox='0 0 108.1 47' enable-background='new 0 0 108.1 47'>
									<polygon fill='#FF0000' points='29.5,8.5 150.7,0 108.1,32.7 3.1,47 '></polygon>
								</svg></div>
								<div class='shape cyan-fill jelly'><svg x='0px' y='0px' viewBox='0 0 108.1 47' enable-background='new 0 0 108.1 47'>
									<polygon fill='#00FFFF' points='0.3,17 125.1,0 68.8,45.6 24.3,39 '></polygon>
								</svg></div>
							</div>
						</a>
					</div>
					<div class = "MCB">
						<a class='link-wrapper' href ="../CerrarSesion.php">
							<span class='fallback'>Index</span>
							<div class='img-wrapper'>
								<img class='normal' src='../Styles/FontResources/Buttons/CerrarSesionNormal.png'>
								<img class='active' src='../Styles/FontResources/Buttons/CerrarSesionActive.png'>
							</div>
							<div class='shape-wrapper'>
								<div class='shape red-fill jelly'><svg x='0px' y='0px' viewBox='0 0 108.1 47' enable-background='new 0 0 108.1 47'>
									<polygon fill='#FF0000' points='29.5,8.5 150.7,0 108.1,32.7 3.1,47 '></polygon>
								</svg></div>
								<div class='shape cyan-fill jelly'><svg x='0px' y='0px' viewBox='0 0 108.1 47' enable-background='new 0 0 108.1 47'>
									<polygon fill='#00FFFF' points='0.3,17 125.1,0 68.8,45.6 24.3,39 '></polygon>
								</svg></div>
							</div>
						</a>
					</div>
				</div>
			<?php
			//banners_elimina.php
			require "Funciones/conecta.php";
			$con = conecta();

			//Recibe variables
			$id = $_REQUEST['id'];
			
			$sql = "SELECT * FROM banners
					WHERE id = $id
					AND eliminado = 0;";
			$res = $con->query($sql);

			$row = mysqli_fetch_array($res);
			
			$id = $row["id"];
			$nombre = $row["nombre"];
			$archivo = $row["archivo"];


			echo "<audio id = 'chains', preload = 'auto'> <source src = '../Styles/DesingResources/SelectSound.mp3', controls = ''> </audio>";
			echo "<div class = 'TitleBox'> <div class = 'text'> CONSULTA DE BANNERS </div> </div> <br>";

			echo "<a class='link-wrapper' href=\"banners_lista.php\">
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
/*
			echo "<a class='link-wrapper' href=\"../Bienvenido.php\">
					<span class='fallback'>Index</span>
					<div class='img-wrapper'>
						<img class='normal' src='../Styles/FontResources/Buttons/MenuNormal.png'>
						<img class='active' src='../Styles/FontResources/Buttons/MenuActive.png'>
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
*/
				//ID
				echo "<div class = 'Container' >
						<img src='../Styles/FontResources/TextBox.png', style='width:20%;'>
						<div class= 'text-centered', style = 'font-size: 26;'>ID:</div>
					</div>

					<div class = 'Container', style = 'bottom: 4%; right: 2%'>
						<img src='../Styles/FontResources/TextBox.png', style='width:20%; transform: scaleX(-1); filter: invert(100%); padding-right: 10%;'>
						<div class= 'text-centered', style = 'left: 19%;'>
						<div class= 'text-centered', style = 'color: black; font-size: 26;'>$id</div>
						</div>
					</div>";

				//Imagen
				echo "<div class = 'Container'>
						<img src='Archivos/$archivo', style='width:20%;'>
					</div>

					<div class = 'Container', style = 'bottom: 5%'>
						<img src='../Styles/FontResources/TextBox.png', style='width:20%;'>
						<div class= 'text-centered', style = 'font-size: 26;'>Nombre del Archivo:</div>
					</div>

					<div class = 'Container', style = 'bottom: 9%; right: 2%'>
						<img src='../Styles/FontResources/TextBox.png', style='width:20%; transform: scaleX(-1); filter: invert(100%); padding-right: 10%;'>
						<div class= 'text-centered', style = 'left: 19%;'>
						<div class= 'text-centered', style = 'color: green; font-size: 14;'>$archivo</div>
						</div>
					</div>";

				
				//Nombre
				echo "<div class = 'Container', style = 'bottom: 10%'>
						<img src='../Styles/FontResources/TextBox.png', style='width:20%;'>
						<div class= 'text-centered', style = 'font-size: 26;'>Nombre:</div>
					</div>

					<div class = 'Container', style = 'bottom: 14%; right: 2%'>
						<img src='../Styles/FontResources/TextBox.png', style='width:20%; transform: scaleX(-1); filter: invert(100%); padding-right: 10%;'>
						<div class= 'text-centered', style = 'left: 19%; text-align: left; white-space: nowrap;'>
						<div class= 'text-centered', style = 'color: black; font-size: 20;'> $nombre</div>
						</div>
					</div>";
			    echo '</div>';
		?>
		</form>

		<script src = "../Librerias/jquery-3.3.1.min.js"></script>
			<script id="rendered-js">
			var chain = $("#chains")[0];
			$(".img-wrapper").mouseenter(
				function () 
				{
				chain.currentTime = 0;
				chain.play();
				});
		</script>
		
	</body>
	
</html>
