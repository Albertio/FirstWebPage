

<html>
	<head>
		<title> Alta de administradores</title>
		
		<style>
            #mensajeCorreo
            {
                height:  : 10px;
                line-height: 10px;
                border: 1px solid #ccc;
                background: #FEFEFE;
                color: #F00F00;
                font-size: 12px;
                width: 25%;
                text-align: center;
            }
			#mensajeCampos
            {
                height:  : 10px;
                line-height: 10px;
                border: 1px solid #ccc;
                background: #FEFEFE;
                color: #F00F00;
                font-size: 12px;
                width: 25%;
                text-align: center;
            }
        </style>

		<script src = "Librerias/jquery-3.3.1.min.js"></script>
		<script>
			function Valida()
			{
				nombre = document.getElementById("nombre").value;
				apellidos = document.getElementById("apellidos").value;
				correo = document.getElementById("correo").value;
				password = document.getElementById("password").value;
				rol = document.getElementById("rol").value;
				archivo = document.getElementById("archivo").value;

				if(nombre == "" || apellidos == "" || correo == "" || password == "" || rol == "0" || archivo.length <= 0)
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
								$('#mensajeCorreo').html('El correo ' + correo.value + ' ya existe');
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
	</head>
	<body>
		<?php
			//administradores_alta.php
			require "Funciones/conecta.php";
			$con = conecta();
			
			echo "<a href=\"administradores_lista.php\">Regresar al listado</a><br><br>";

		?> 
				
		<form enctype = "multipart/form-data", onSubmit = "return Valida()", method = 'post', action = "administradores_salva.php">
		
		<input type = 'text', name = 'nombre', id = 'nombre', placeholder = 'Nombre', /><br><br>
		<input type = 'text', name = 'apellidos', id = 'apellidos', placeholder = 'Apellidos', /><br><br>

		<input onblur = 'ComprobarCorreo(correo);', type = 'text', name = 'correo', id = 'correo', placeholder = 'Correo@Dominio', />
		<div id = 'mensajeCorreo'></div><br>
		<input type = 'text', name = 'password', id = 'password', , placeholder = 'Contrasena'/><br><br>
		Rol:<br>
		<select name = 'rol', id = 'rol'>
		<option value = '0'> Selecciona </option>
		<option value = '1'> Gerente </option>
		<option value = '2'> Ejecutivo </option>
		</select><br><br>
		
		Fotografia:<br>
		<input type = "file", id = "archivo", name = "archivo"><br><br>

		<input type = "submit", value = "Enviar", id = "Button">
		<div id = 'mensajeCampos', name = 'mensajeCampos'> </div>
		</form>
	</body>
	
</html>