<?php
	session_start();
				
	if (!isset($_SESSION['nombre']) || (trim($_SESSION['nombre']) == '')) 
	{
		header("location: ../../index.php");
		exit();
	}
?>
<html>
	<head>
		<title> Editar Administrador</title>

		<script src = "../Librerias/jquery-3.3.1.min.js"></script>
		<script src = "../Librerias/jquery.md5.js"></script>
		<script>
			
			function Valida(id, archivoA)
			{
				nombre = document.getElementById("nombre").value;
				archivo = document.getElementById("archivo").value;

				if(nombre == "")
				{
					$('#mensajeCampos').html('Faltan campos por llenar');
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
							"archivo" : archivoA,
						};

						$.ajax(
						{
							url : "Funciones/actualizarInformacion.php",
							type : 'post',
							dataType : 'text',
							data : parametros,

							success : function(res)
							{
								if(res == 1)
								{
									$('#mensajeCampos').html('Datos Actualizados con exito');
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
		</script>
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
			//banners_edita.php
			require "Funciones/conecta.php";
			$con = conecta();

			//Recibe variables
			$id = $_REQUEST['id'];
			
			$sql = "SELECT * FROM banners
					WHERE id = $id
					AND eliminado = 0;";
			$res = $con->query($sql);

			//$row = $res->fetch(PDO::FETCH_ASSOC); 
			$row = mysqli_fetch_array($res);
			
			$nombre = $row["nombre"];
			$archivo = $row["archivo"];

			echo "<audio id = 'chains', preload = 'auto'> <source src = '../Styles/DesingResources/SelectSound.mp3', contstocks = ''> </audio>";
			echo "<div class = 'TitleBox'> <div class = 'text'> EDICION DE BANNERS </div> </div> <br>";

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
			echo "<form enctype = 'multipart/form-data', onSubmit = 'return Valida($id,\"$archivo\")', method = 'post', action = 'Funciones/actualizarInformacion.php'>";
				echo "<input type = 'hidden' name = 'id', id = 'id', value = '$id'><br>";

				//Nombre
				echo "<div class = 'Container'>
						<img src='../Styles/FontResources/TextBox.png', style='width:20%;'>
						<div class= 'text-centered'>Nombre:</div>
					</div>

					<div class = 'Container'>
						<img src='../Styles/FontResources/TextBox.png', style='width:20%; transform: scaleX(-1); filter: invert(100%); padding-right: 10%;'>
						<div class= 'text-centered', style = 'left: 19%;''>
							<input type = 'text', name = 'nombre', id = 'nombre', value = '$nombre', />
						</div>
					</div>";

				//descripcion

				//codigo

				//Costo

				//stock
				
				//Fotografia
				echo "<div class = 'Container'>
						<img src='../Styles/FontResources/TextBox.png', style='width:20%;'>
						<div class= 'text-centered'>Fotografia:</div>
					</div>
					<div class = 'Container'>
						<img src='../Styles/FontResources/TextBox.png', style='width:20%; transform: scaleX(-1); filter: invert(100%); padding-right: 10%;''>
						<div class= 'text-centered', style = 'left: 25%;'>
							<input type = 'file', id = 'archivo', name = 'archivo', style = 'color: #c0b256; font-size: 18px; padding-left: 30px;'>
						</div>
					</div>";
					
				//Enviar
				echo "<div class = 'Container'>
						<img src='../Styles/FontResources/TextBox.png', style='position: absolute; width:20%; top: 15px; transform: scaleX(-1); 
						transform: scaleZ(-1); filter: invert(100%); padding-left: 20%; filter: opacity(0.4) drop-shadow(0 0 0 red);'>
						<div class = 'text', style = 'padding-top: 2%;''>
							<div id = 'mensajeCampos', name = 'mensajeCampos'> </div>
						</div>
					</div>

					<div class = 'Container'>
						<img src='../Styles/FontResources/TextBox.png', , style='width:20%; transform: scaleX(-1); padding-bottom: 15px;'>
						<input type = 'submit', value = 'Guardar', id = 'Button', onclick = 'Valida($id,\"$nombre\",\"$archivo\"); ' />
					</div>";

			echo "</form>";
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