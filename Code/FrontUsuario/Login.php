
<html>
	<head>
        <title>Login</title>
		<link rel="icon" href="Styles/logo-pequeno.png" type="image/gif" />
		<link rel="stylesheet" type="text/css" href="Styles/css/style2.css"/>
        
        <script src = "Librerias/jquery-3.3.1.min.js"></script>
        <script>
			//Validar los campos
			
			function Valida()
			{
				var correo = document.getElementById("correo").value;
				var password = document.getElementById("password").value;
				if(correo == "" || password == "")
				{
					var contenido = document.getElementById("mensajeCampos");
					contenido.style.opacity = '1';
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
						url : 'Funciones/comprobarLogin.php',
						type : 'post',
						dataType : 'text',
						data : parametros,

						success : function(res)
						{
							if(res == 1)
							{
								$.ajax(
								{
									url : 'Sesion/Sesion.php',
									type : 'post',
									dataType : 'text',
									data : parametros,
									success : function(res)
									{
										if(res == 1)
										{
											window.location.href = '../index.php';
										}
										else
										{
											alert("Error Desconocido");
										}
									}
								});
								
							}
							else
							{
								var contenido = document.getElementById("mensajeCampos2");
								contenido.style.opacity = '1';	
								setTimeout("$('#mensajeCampos2').html('')", 5000);
								return false;
							}
							
						}
					});
				}
				return false;
			}
        </script>
    </head>
	<body>
		<?php

			if (isset($_SESSION['nombre']) != null) 
			{
				if((trim($_SESSION['rol']) == "1"))
				{
					header("location: ../index.php");
					exit();
				}
				if((trim($_SESSION['rol']) == "2"))
				{
					header("location: ../(Admin)index.php");
					exit();
				}
				if((trim($_SESSION['rol']) == "0"))
				{
					header("location: ../(Empresa)index.php");
					exit();
				}
			}
			
		?>

	
		<img src='Styles/login.jpg' style='z-index:0;position:absolute' alt="banner" width="99%" height="98%">
			
        <div class="container">
          	<div class="left" style='top:40%'>
            	<div class="login">SkillUp</div>
            
					<form onSubmit = "return Valida()", method = 'post', id = "myform">
					<a class=labels>Nombre de Usuario:</a>
					<br>
						<input class='input-login' type = 'text', name = 'correo', id = 'correo', placeholder = 'Correo@Dominio'/> <br>
					<br>

					<a class=labels>Contraseña:</a>
					<br>
						<input type="password" class="form-control", class='input-login' name = 'password', id = 'password', placeholder = 'Contraseña'/><br>
					<br>
					<br>

					<a id = 'mensajeCampos', name = 'mensajeCampos' class=labels style='opacity: 0;transition: opacity 1s;position:absolute;top:80%;left:32%;'>Faltan campos por llenar</a>
					<a id = 'mensajeCampos2', name = 'mensajeCampos2' class=labels style='opacity: 0;transition: opacity 1s;position:absolute;top:80%;left:32%;'>Datos Invalidos</a>

					<button onclick = "return Valida()" class='boton-ingresar' style='left:26%;top:67%'>Ingresar</a>
					</form>
          	</div>
       			<div class="right" style='top:35%'>
            		
                		<a style='margin:auto;top:30%;left:53%; font-family: "Inter UI", sans-serif;position: fixed;font-size:100%;'><strong>O crea una cuenta gratuita</strong></a>
              			<a class="boton-AE" style="right:34%;top:42%;" href ="RegistroUsuario.php"><strong>Estudiante</strong></a>
              			<a class="boton-AE" style="right:34%; top:57%;" href ="RegistroEmpresa.php"><strong>Empresa</strong></a>
            	
				</div>	
		
    	</div>

	 
	

	</body>
</html>