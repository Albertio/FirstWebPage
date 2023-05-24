<html>
    <head>
        <title>SkillUp</title>

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
            function Detalle(id)
			{
				window.location.href = 'oferta_detalle.php?id='+ id;
			}
            function ocultar(primary, usuario)
            {
                if(primary)
                {
                  if(confirm("Esta seguro que desea eliminar la oferta"))
                  {
                     var parametros = 
                     {
                        "primary" : primary,
                        "usuario" : usuario,
                     };
                     $.ajax(
                     {
                        url : 'oferta_elimina.php',
                        type : 'post',
                        dataType : 'text',
                        data : parametros,

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
                     
                }
			}
        </script>
    </head>
    
    <body>
		<?php
            session_start();

            if (!isset($_SESSION['nombre']) || (trim($_SESSION['nombre']) == '')) 
            {
                header("location: ../Login.php");
                exit();
            }
            else if((trim($_SESSION['rol']) == "2"))
            {
                header("../../(Admin)index.php");
                exit();
            }
            else if((trim($_SESSION['rol']) == "1"))
            {
                header("../../index.php");
                exit();
            }
            $id_usuario = $_SESSION['id'];        

            require "../Funciones/conecta.php";
			$con = conecta();
			
            //OFERTAS
			$sql = "SELECT * FROM ofertas
					WHERE id = $id_usuario";

			$res = $con->query($sql);

		?>

      <header>
         <!-- header inner -->
		   <div class="header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="../../(Empresa)index.php"><img src="../Styles/css/logo.png" alt="#" /></a>
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
                                    <a class="nav-link" href="../../(Empresa)index.php"> Inicio </a>
                                 </li>
								 <li class="nav-item">
								 <?php echo "<a class='nav-link' href =\"../Perfil/usuarios_consultar.php?id=$id_usuario\"'>Perfil</a>";?>
                                 </li>
								 <li class="nav-item">
                                    <a class="nav-link" href="../Ofertas/ofertas.php?pagina=1&">Mis Ofertas</a>
                                 </li>
								 <li class="nav-item">
                                    <a class="nav-link" href="../Contacto/contacto_formulario.php">Contacto</a>
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
        <?php
			echo "
            <br>
            <a class='boton-opcion' style='top:18%;right:3%;' href=\"oferta_alta.php?id=$id_usuario\">Alta</a>";

			foreach ($res as $row )
			{
				$id = $row["id_primary"];
				$nombre = $row["nombre"];
				$estado = $row["estado"];
            $eliminado = $row["eliminado"];

                echo "<div class='Fila2' id=".$id.">
                <div class='CajaId'>".$id."</div>
                <div class='CajaNombre'>".$nombre."</div>
                <div class='CajaBoton'>
                    <a class='link-wrapper delete' href='javascript:void(0);' onClick='ocultar($id, $id_usuario);'><i class='fa-solid fa-trash-can'></i>
                    <a class='link-wrapper detail' href =\"oferta_detalle.php?id=$id\"><i class='fas fa-eye'></i></a>
                    <a class='link-wrapper edit' href=\"oferta_editar.php?id=$id\"><i class='fas fa-edit'></i></a>
                    <a class='link-wrapper view' href=\"../Postulantes/postulante_detalle.php?id=$id\"><i class='fas fa-address-book'></i></a>
                </div>
               </div>";
                            
			};
		?>
    </body>    
<html>