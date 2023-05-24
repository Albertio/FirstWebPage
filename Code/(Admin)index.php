
<html>
	<head>
        <title>Bienvenido</title>

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
      	<link rel="stylesheet" href="FrontUsuario/Styles/css/bootstrap.min.css">
		  <link rel="stylesheet" href="FrontUsuario./Styles/css/responsive.css">
      	<!-- fevicon -->
      	<link rel="icon" href="FrontUsuario/Styles/logo.png" type="image/gif" />
      	<!-- Scrollbar Custom CSS -->
      	<link rel="stylesheet" href="FrontUsuario/Styles/css/jquery.mCustomScrollbar.min.css">
      	<!-- Tweaks for older IEs-->
      	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      	<link rel="stylesheet" type="text/css" href="../Styles/css/stylenose.css"/>
		
      	<link rel="stylesheet" type="text/css" href="FrontUsuario/Styles/css/style.css"/>
        
        <script src = "FrontAdministrador/Librerias/jquery-3.3.1.min.js"></script>
        <script>
			//Validar los campos
			
			function Valida()
			{
				var correo = document.getElementById("correo").value;
				var password = document.getElementById("password").value;

				if(correo == "" || password == "")
				{
					$('#mensajeCampos').html('Faltan campos por llenar');
					setTimeout("$('#mensajeCampos').html('')", 5000);

					return false;
				}
				else
				{
					var parametros = 
					{
						"correo" : correo,
						"pass" : password,
					};
					$.ajax(
					{
						url : 'FrontAdministrador/Funciones/comprobarLogin.php',
						type : 'post',
						dataType : 'text',
						data : parametros,

						success : function(res)
						{
							if(res == 1)
							{
								$.ajax(
								{
									url : 'FrontAdministrador/Sesion/Sesion.php',
									type : 'post',
									dataType : 'text',
									data : parametros,
								
									success : function(res)
									{
										if(res == 1)
										{
											window.location.href = 'FrontAdministrador/Bienvenido.php';
										}
									}
								});
								
							}
							else
							{
								$('#mensajeCampos').html('Datos No Validos');
								setTimeout("$('#mensajeCampos').html('')", 5000);
								return false;
							}
							
						}
					});
				}
				return false;
			}
        </script>

        <link rel="icon" href="FrontAdministrador/Styles/icon.webp">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
		<link rel="stylesheet" href="FrontAdministrador/Styles/style.css">
		<style>
			@font-face
			{
				font-family: expose; src: url('FrontAdministrador/Styles/Persona5.ttf');
			}
			@font-face
			{
				font-family: hatty; src: url('FrontAdministrador/Styles/p5hatty.ttf');		
			}
			@font-face
			{
				font-family: regular; src: url('FrontAdministrador/Styles/Expose-Regular.otf');		
			}
			

		</style> 
    </head>
	<body>
		<?php
			session_start();

			if (isset($_SESSION['nombre']) != null) 
			{
				header("location: FrontAdministrador/Bienvenido.php");
				exit();
			}
		?>
		<audio id = 'chains', preload = 'auto'> <source src = 'FrontAdministrador/Styles/DesingResources/SelectSound.mp3', controls = ''> </audio>
		
		<form onSubmit = "return Valida()", method = 'post', id = "myform">
			<div class = 'TitleBox'> <div class = 'text'> Login </div> </div> <br>

			<div class = 'Container'>
				<img src="FrontAdministrador/Styles/FontResources/TextBox.png", style="width:20%;">
				<div class= 'text-centered'>Nombre de Usuario:</div>
			</div>
			<div class = 'Container'>
				<img src="FrontAdministrador/Styles/FontResources/TextBox.png", style="width:20%; transform: scaleX(-1); filter: invert(100%); padding-right: 10%;">
			<div class= 'text-centered', style = "left: 19%;">
					<input type = 'text', name = 'correo', id = 'correo', placeholder = 'Correo@Dominio'/> <br><br>
				</div>
			</div>
			
			<div class = 'Container'>
				<img src="FrontAdministrador/Styles/FontResources/TextBox.png", style="width:20%;">
				<div class= 'text-centered'>Contrasena:</div>
			</div>
			<div class = 'Container'>
				<img src="FrontAdministrador/Styles/FontResources/TextBox.png", style="width:20%; transform: scaleX(-1); filter: invert(100%); padding-right: 10%;">
			<div class= 'text-centered', style = "left: 19%;">
					<input type = 'text', name = 'password', id = 'password', , placeholder = 'Contrasena'/><br><br>
				</div>
			</div>
		
			
			<div class = 'Container'>
				<img src="FrontAdministrador/Styles/FontResources/TextBox.png", style="position: absolute; width:20%; top: 10px; transform: scaleX(-1); 
				transform: scaleZ(-1); filter: invert(100%); padding-left: 12%; filter: opacity(0.4) drop-shadow(0 0 0 red); ">
				<div class = 'text', style = "position: absolute; padding-top: 1.8%; padding-left: 75%;">
					<div id = 'mensajeCampos', name = 'mensajeCampos'> </div>
				</div>
			</div>
			
			<a class='link-wrapper',  onclick = "return Valida()", style = "position: absolute; top: 61%; left:3%">
				<span class='fallback'>Index</span>
				<div class='img-wrapper'>
					<img class='normal' src='FrontAdministrador/Styles/FontResources/Buttons/EnviarNormal.png'>
					<img class='active' src='FrontAdministrador/Styles/FontResources/Buttons/EnviarActive.png'>
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

			<!--
			<input type = "submit", value = "Enviar", id = "Button">
			-->
		</form>

		<script src = "FrontAdministrador/Librerias/jquery-3.3.1.min.js"></script>
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