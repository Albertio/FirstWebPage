<html>
	<head>
		<title> Registro de Usuarios </title>
		<link rel="stylesheet" type="text/css" href="Styles/css/style2.css"/>

		<script src = "Librerias/jquery-3.3.1.min.js"></script>
		<script>
			function Valida()
			{
				nombre = document.getElementById("nombre").value;
				correo = document.getElementById("correo").value;
				password = document.getElementById("password").value;

				archivo = document.getElementById("archivo").value;
				cv = document.getElementById("cv").value;

				if(nombre == "" || correo == "" || password == "" || archivo.length <= 0 || cv.length <= 0)
				{
					var contenido = document.getElementById("mensajeCampos");
					contenido.style.opacity = '1';
					setTimeout("$('#mensajeCampos').html('')", 5000);
					return false;
				}
				else
				{
					if(password.length < 8)
					{
						alert("Asegurate de usar una contraseña con longitud mayor a 8 caracteres");
						return false;
					}
					

					var contenido = document.getElementById("mensajeCampos2");
					contenido.style.opacity = '1';
					setTimeout("$('#mensajeCampos').html('')", 5000);
					return true;

				}
			}
			function ComprobarCorreo(correo)
			{
                if(correo.value)
                {
					$.ajax(
					{
						url : 'Funciones/comprobarCorreo.php',
						type : 'post',
						dataType : 'text',
						data : 'correo=' + correo.value,

						success : function(res)
						{
							if(res == 1)
							{
								var contenido = document.getElementById("mensajeCorreo");
								contenido.style.opacity = '1';
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
	</head>
	<body>	
		<?php
			//Registro
			require "Funciones/conecta.php";
			$con = conecta();

			echo "<a class='boton-regresar' style='color:#000;text-decoration: none;
			display: flex;
			justify-content: center;
			align-items: center;
			bottom:16%;right:35%;' href=\"Login.php\">Regresar</a>";
		?> 
		<div class="fondo">	
			<div class="container">
				<div class="right-login" style="top:15%;right:34%;">
					<form enctype = "multipart/form-data", onSubmit = "return Valida()", method = 'post', action = "Funciones/AltaUsuario.php">
						<br>
						<a class="labels" style="color:#fff;">Nombre:</a>
						<br>
						<input class="input-registro" type = 'text', name = 'nombre', id = 'nombre', placeholder = 'Nombre', />
						<br>
						<a class="labels" style="color:#fff;">Correo:</a>
						<br>
						<input class="input-registro" onblur = 'ComprobarCorreo(correo);', type = 'text', name = 'correo', id = 'correo', placeholder = 'Correo@Dominio', />
						<br>
						<br>
						<a class="labels" style="color:#fff;">Contraseña:</a>
						<br>
						<input input type="password" class="form-control" name = 'password', id = 'password', , placeholder = 'Contrasena'/>
						<br>
						<br>
						<a class="labels" style="color:#fff;">Foto de Perfil:</a>
						<br>
						<input type = "file", id = "archivo", name = "archivo">
						<br>
						<div class=labels style='color:red;opacity: 0;transition: opacity 1s;position:absolute;top:-5%;left:45%;' id = 'mensajeCampos', name = 'mensajeCampos'>Faltan campos por llenar</div>
						<div class=labels style='color:red;opacity: 0;transition: opacity 1s;position:absolute;top:-4%;left:45%;' id = 'mensajeCorreo', name = 'mensajeCorreo'>Ese correo ya existe</div>
						<div class=labels style='color:green;opacity: 0;transition: opacity 1s;position:absolute;top:-4%;left:45%;' id = 'mensajeCampos2', name = 'mensajeCampos2'>¡Registro Exitoso!</div>
						<br>
						<a class="labels" style="color:#fff;">CV (pdf):</a>
						<br>
						<input type = "file", id = "cv", name = "cv">
						<br>
						<br>
						<a class="labels" style="color:#fff;">Url:</a>
						<br>
						<input class="input-registro" type = 'text', name = 'url', id = 'url', placeholder = 'Url (opcional)', />
						<br>
						<br>
						<input class="boton-ingresar" style="bottom:16%;right:44%;" type = "submit", value = "Enviar", id = "Button">
						<br>
					</form>
				</div>
			</div>
		</div>
	</body>
	
</html>