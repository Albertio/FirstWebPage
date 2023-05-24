

<html>
	<head>
		<title> Alta de Banners</title>
		
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

		<script src = "../Librerias/jquery-3.3.1.min.js"></script>
		<script>
			function Valida()
			{
				nombre = document.getElementById("nombre").value;
				archivo = document.getElementById("archivo").value;

				if(nombre == "" || archivo.length <= 0)
				{
					$('#mensajeCampos').html('Faltan campos por llenar');
					setTimeout("$('#mensajeCampos').html('')", 5000);

					return false;
				}
				else
				{
					$('#mensajeCampos').html('Registro Exitoso!');
					setTimeout("$('#mensajeCampos').html('')", 5000);
					return true;

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
			//banners_alta.php
			require "Funciones/conecta.php";
			$con = conecta();
			echo "<audio id = 'chains', preload = 'auto'> <source src = '../Styles/DesingResources/SelectSound.mp3', controls = ''> </audio>";
			echo "<div class = 'TitleBox'> <div class = 'text'> ALTA DE BANNERS </div> </div> <br>";

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
				</a><br>";
*/
		?> 
	
		<form enctype = "multipart/form-data", onSubmit = "return Valida()", method = 'post', action = "banners_salva.php">
		
		<div class = 'Container'>
			<img src="../Styles/FontResources/TextBox.png", style="width:20%;">
			<div class= 'text-centered'>Nombre:</div>
		</div>

		<div class = 'Container'>
			<img src="../Styles/FontResources/TextBox.png", style="width:20%; transform: scaleX(-1); filter: invert(100%); padding-right: 10%;">
			<div class= 'text-centered', style = "left: 19%;">
				<input type = 'text', name = 'nombre', id = 'nombre', placeholder = 'Nombre', />
			</div>
		</div>
		
		<div class = 'Container'>
			<img src="../Styles/FontResources/TextBox.png", style="width:20%;">
			<div class= 'text-centered'>Fotografia:</div>
		</div>

		<div class = 'Container'>
			<img src="../Styles/FontResources/TextBox.png", style="width:20%; transform: scaleX(-1); filter: invert(100%); padding-right: 10%;">
			<div class= 'text-centered', style = "left: 25%;">
				<input type = "file", id = "archivo", name = "archivo", style = "color: #c0b256; font-size: 18px; padding-left: 30px;">
			</div>
		</div>

		<div class = 'Container'>
			<img src="../Styles/FontResources/TextBox.png", style="position: absolute; width:20%; top: 15px; transform: scaleX(-1); 
			transform: scaleZ(-1); filter: invert(100%); padding-left: 20%; filter: opacity(0.4) drop-shadow(0 0 0 red); ">
			<div class = 'text', style = "padding-top: 2%;">
				<div id = 'mensajeCampos', name = 'mensajeCampos'> </div>
			</div>
		</div>

		<div class = 'Container'>
			<img src="../Styles/FontResources/TextBox.png", , style="width:20%; transform: scaleX(-1); padding-bottom: 15px;">
			<input type = "submit", value = "Enviar", id = "Button">
		</div>
		
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