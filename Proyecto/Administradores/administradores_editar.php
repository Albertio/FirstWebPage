
<html>
	<head>
		<title> Editar Administrador</title>
		
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
		<script src = "Librerias/jquery.md5.js"></script>
		<script>
			
			function Valida(id, nombreA, apellidosA, correoA, passwordA, rolA, archivoA, archivo_nA)
			{
				nombre = document.getElementById("nombre").value;
				apellidos = document.getElementById("apellidos").value;
				correo = document.getElementById("correo").value;
				password = document.getElementById("password").value;
				rol = document.getElementById("rol").value;
				archivo = document.getElementById("archivo").value;

				if(nombre == "" || apellidos == "" || correo == "")
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
					if(apellidos != apellidosA)
					{
						apellidosA = apellidos;
						change = true;
					}
					if(correo != correoA)
					{
						correoA = correo;
						change = true;
					}
					if(password != "")
					{
						passEnc = $.md5(password);
						passwordA = passEnc;
						change = true;
					}
					if(rol != rolA && rol != "0")
					{
						rolA = rol;
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
							"correo" : correoA,
							"apellidos" : apellidosA,
							"password" : passwordA,
							"rol" : rolA,
							"archivo" : archivoA,
							"archivo_n" : archivo_nA,
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
			function ComprobarCorreo(correo, id)
			{
                if(correo.value)
                {
					var parametros = 
					{
						"correo" : correo.value,
						"id" : id
					};
					$.ajax(
					{

						url : 'Funciones/comprobarCorreoEditado.php',
						type : 'post',
						dataType : 'text',
						data : parametros,

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
			//administradores_edita.php
			require "Funciones/conecta.php";
			$con = conecta();

			//Recibe variables
			$id = $_REQUEST['id'];
			
			//Redirecciona a otro archivo
			echo "<a href=\"administradores_lista.php\">Regresar a Lista</a><br><br>";
			
			$sql = "SELECT * FROM administradores
					WHERE id = $id
					AND eliminado = 0;";
			$res = $con->query($sql);

			$row = $res->fetch(PDO::FETCH_ASSOC); 
			$nombre = $row["nombre"];
			$apellidos = $row["apellidos"];
			$rol = $row["rol"];
			$correo = $row["correo"];
			$password = $row["pass"];
			$status = $row["status"];
			$archivo = $row["archivo"];
			$archivo_n = $row["archivo_n"];

			if($rol == 1)
			{
				$rolName = "Gerente";
			}
			if($rol == 2)
			{
				$rolName = "Ejecutivo";
			}
	
			
			echo "Edicion de administradores<br><br>";
			echo "<form enctype = 'multipart/form-data', onSubmit = 'return Valida($id,\"$nombre\",\"$apellidos\",\"$correo\",\"$password\",$rol,\"$archivo\", \"$archivo_n\")', method = 'post', action = 'Funciones/actualizarInformacion.php'>";
				echo "<input type = 'hidden' name = 'id', id = 'id', value = '$id'><br>";
				echo "Nombre:<br>";
				echo "<input type = 'text', name = 'nombre', id = 'nombre', value = '$nombre' /><br>";
				
				echo "Apellidos:<br>";
				echo "<input type = 'text', name = 'apellidos', id = 'apellidos', value = '$apellidos' /><br>";

				echo "Correo:<br>";
				echo "<input onblur = 'ComprobarCorreo(correo,$id);', type = 'text', name = 'correo', id = 'correo', , value = '$correo' />";
				echo "<div id = 'mensajeCorreo'></div>";
				
				echo "Contraseña:<br>";
				echo "<input type = 'text', name = 'password', id = 'password' /><br>";

				echo "Rol:<br>";
					echo "<select name = 'rol', id = 'rol'>";
					if($rol == 1)
					{
						echo "<option value = '1', selected> Gerente </option>";
					}
					else
					{
						echo "<option value = '1'> Gerente </option>";
					}
					if($rol == 2)
					{
						echo "<option value = '2', selected> Ejecutivo </option>";
					}
					else
					{
						echo "<option value = '2'> Ejecutivo </option>";
					}
					
					
				echo "</select><br>";
				
				echo "Fotografia:<br>";
				echo "<input type = 'file', id = 'archivo', name = 'archivo'><br><br>";
				
			echo "<input type = 'submit', value = 'Guardar', id = 'Button', onclick = 'Valida($id,\"$nombre\",\"$apellidos\",\"$correo\",\"$password\",$rol,\"$archivo\", \"$archivo_n\"); ' />";
				echo "<div id = 'mensajeCampos'></div>";
			echo "</form>";
		?> 
	</body>
	
</html>