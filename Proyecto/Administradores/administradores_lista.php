<html>
	<head>
		<title>Listado de Administradores</title>
		
		<script src = "Librerias/jquery-3.3.1.min.js"></script>
		<script>
			function ocultar(id)
            {
                if(id)
                {
					if(confirm("Esta seguro que desea eliminar el administrador"))
					{
						$.ajax(
						{
							url : 'administradores_elimina.php',
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
		<link rel="icon" href="Styles/icon.webp">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
		<link rel="stylesheet" href="Styles/style.css">
		<style>
			@font-face
			{
				font-family: expose; src: url('Styles/Persona5.ttf');
			}
			@font-face
			{
				font-family: hatty; src: url('Styles/p5hatty.ttf');		
			}
			@font-face
			{
				font-family: regular; src: url('Styles/Expose-Regular.otf');		
			}
			

		</style> 
	<body>
		<?php
			//administradores_lista.php
			require "Funciones/conecta.php";
			$con = conecta();
			
			//Seleccionamos el registro
			$sql = "SELECT * FROM administradores
					WHERE status = 1 AND eliminado = 0";

			$res = $con->query($sql);
			
			echo "<audio id = 'chains', preload = 'auto'> <source src = 'Styles/DesingResources/SelectSound.mp3', controls = ''> </audio>";
			echo '<div class = "Tabla">';

			
			//Mostrar informacion
			echo "<div class = 'cuadrado'> <div class = 'text'> LISTADO DE ADMINISTRADORES </div> </div> <br><br> ";
			
			echo "<a class='link-wrapper' href=\"administradores_alta.php\">
						<span class='fallback'>Index</span>
						<div class='img-wrapper'>
							<img class='normal' src='Styles/FontResources/Buttons/CrearNormal.png'>
							<img class='active' src='Styles/FontResources/Buttons/CrearActive.png'>
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
					echo '<div class = "CajaNombre">' . "<h1> NOMBRE COMPLETO </h1>" . '</div>';
					echo '<div class = "CajaCorreo">' . "<h1> CORREO </h1>" . '</div>';
					echo '<div class = "CajaRol">' . "<h1> ROL </h1>" . '</div>';
					echo '<div class = "CajaBoton">' . "<h1> ACCIONES </h1>" . '</div>';
				echo '</div>';

			while($row = $res->fetch(PDO::FETCH_ASSOC))
			{
				$id = $row["id"];
				$nombre = $row["nombre"];
				$apellidos = $row["apellidos"];
				$correo = $row["correo"];
				if($row["rol"] == "1")
				{
					$rol = "Gerente";
				}
				else if($row["rol"] == "2")
				{
					$rol = "Ejecutivo";
				}
				else
				{
					$rol = "Undefinied";

				}

				echo '<div class = "Fila2", id = "'.$id.'">';
					echo '<div class = "CajaId">' . "<h4>$id</h4>" . '</div>';
					echo '<div class = "CajaNombre">' . "$nombre" . " " . "$apellidos" . '</div>';
					echo '<div class = "CajaCorreo">' . "$correo" . '</div>';
					echo '<div class = "CajaRol">' . "$rol" . '</div>';
					
					echo '<div class = "CajaBoton">';

					echo "<a class='link-wrapper' href = 'javascript:void(0);' onClick = 'ocultar($id);'>
							<span class='fallback'>Index</span>
							<div class='img-wrapper'>
								<img class='normal' src='Styles/FontResources/Buttons/EliminarNormal.png'>
								<img class='active' src='Styles/FontResources/Buttons/EliminarActive.png'>
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
					
					echo "<a class='link-wrapper' href =\"administradores_consultar.php?id=$id\"'>
						<span class='fallback'>Index</span>
						<div class='img-wrapper'>
							<img class='normal' src='Styles/FontResources/Buttons/DetalleNormal.png'>
							<img class='active' src='Styles/FontResources/Buttons/DetalleActive.png'>
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

					echo "<a class='link-wrapper' href=\"administradores_editar.php?id=$id\"'>
						<span class='fallback'>Index</span>
						<div class='img-wrapper'>
							<img class='normal' src='Styles/FontResources/Buttons/EditarNormal.png'>
							<img class='active' src='Styles/FontResources/Buttons/EditarActive.png'>
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

			//Para reproducir el sonido
			echo ' <script src = "Librerias/jquery-3.3.1.min.js"></script>
					<script id="rendered-js">
					var chain = $("#chains")[0];
					$(".img-wrapper").mouseenter(
						function () 
						{
						chain.currentTime = 0;
						chain.play();
						});
					</script>';
		?>
	</body>
</html>
