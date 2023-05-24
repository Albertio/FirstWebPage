<html>
	<head>
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
      	<link rel="stylesheet" href="../Styles/css/bootstrap.min.css">
		  <link rel="stylesheet" href="../Styles/css/responsive.css">
      	<!-- fevicon -->
      	<link rel="icon" href="../Styles/logo-pequeno.png" type="image/gif" />
      	<!-- Scrollbar Custom CSS -->
      	<link rel="stylesheet" href="../Styles/css/jquery.mCustomScrollbar.min.css">
      	<!-- Tweaks for older IEs-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      	<link rel="stylesheet" type="text/css" href="../Styles/css/styled.css"/>
		
      	<link rel="stylesheet" type="text/css" href="../Styles/css/style.css"/>
        
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
		<div class="header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="../../index.php"><img src="../Styles/logo.png" alt="#" /></a>
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
								 	<a class="nav-link" href ="../Bienvenido.php"> Inicio </a>
                                 </li>
								 <li class="nav-item">
								 	<a class="nav-link" href ="../Usuarios/usuarios_lista.php"> Usuarios </a>
                                 </li>
								 <li class="nav-item">
								 	<a class="nav-link" href ="ofertas_lista.php">Ofertas</a>
                                 </li>
								 <li class="nav-item">
                                    <a class="nav-link" href ="../Postulaciones/postulaciones_lista.php"> Postulaciones </a>
                                 </li>
								 <li class="nav-item">
								 	<a class="nav-link" href ="../Banners/banners_lista.php"> Publicidad </a>
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
		
		  <div class="Resultados">
    <?php
        //productos_lista.php
        require "../Funciones/conecta.php";
        $con = conecta();
        
        //Seleccionamos el registro
        $sql = "SELECT * FROM ofertas
                WHERE eliminado = 0";

        $res = $con->query($sql);

        //Mostrar informacion
        echo "<a class='link-wrapper' href=\"../Bienvenido.php\">Regresar</a>";
        echo "<a class='link-wrapper' href=\"ofertas_alta.php\">Alta</a>";

        foreach ($res as $row )
        {
            $id = $row["id"];
            $nombre = $row["nombre"];
            $estado = $row["estado"];

            echo "<div class='Fila2' id=".$id.">
                <div class='CajaId'>".$id."</div>
                <div class='CajaNombre'>".$nombre."</div>
                <div class='CajaBoton'>
                    <a class='link-wrapper delete' href='javascript:void(0);' onClick='ocultar($id);'><i class='fa-solid fa-trash-can'></i>
                    <a class='link-wrapper detail' href=\"ofertas_consultar.php?id=$id\"><i class='fas fa-eye'></i></a>
                    <a class='link-wrapper edit' href=\"ofertas_editar.php?id=$id\"><i class='fas fa-edit'></i></a>
                </div>
            </div>";
        };
    ?>
</div>
	
	</body>
</html>
