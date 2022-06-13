<?php
include("../../db.php");

	session_start();
	
	if(!isset($_SESSION['id'])){
		header("Location: ../../index.php");
	}
	
    $id_u = $_SESSION['id'];
    $username = $_SESSION['username'];

?>


<!DOCTYPE html>
<html style="background: rgba(255,255,255,0);">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="assets/css/Articles-Badges.css">
    <link rel="stylesheet" href="assets/css/Features-Centered-Icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <link rel="icon" href="/assets/img/logo-icono.png">
</head>

<body style="background: url(&quot;assets/img/clipboard-image-1.png&quot;), #fd720d;">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="../../Menu/index.php">CAMINOSA | Mi Taller</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="../../Menu/index.php">INICIO</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../logout.php">CERRAR SESION</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="clean-block clean-form dark" style="background: url(&quot;assets/img/clipboard-image-1.png&quot;);">
        <section class="clean-block clean-form dark" style="background: rgba(246,246,246,0);">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Ver Usuarios</h2>
                    <p></p>
                </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="background: rgb(253,114,13);border-color: rgb(0,0,0);border-top-color: rgb(0,0,0);">Nombre de USUARIO</th>
                            <th style="background: rgb(253,114,13);">Nombres</th>
                            <th style="background: rgb(253,114,13);">Nivel de permiso</th>
                            <!-- <th style="background: rgb(253,114,13);">Modificar</th> -->
                            <th style="background: rgb(253,114,13);">Eliminar</th>
                        </tr>
                    </thead>
                        <?php 
                            $consulta = "SELECT cat_usuarios.id, username, nombres, cat_nivel_acceso.desc FROM cat_usuarios
                            INNER JOIN cat_nivel_acceso
                            ON cat_usuarios.id_nivel_acceso = cat_nivel_acceso.id
                            WHERE estatus ='visible'";
                            $resultado = mysqli_query($conex,$consulta);
                            while($mostrar = mysqli_fetch_array($resultado)){
                        ?>
                        <tbody>
                            <tr>
                                <td style="background: rgba(253,114,13,0.36);" ><?php echo $mostrar['username'] ?></td>
                                <td style="background: rgba(253,114,13,0.36);" ><?php echo $mostrar['nombres'] ?></td>
                                <td style="background: rgba(253,114,13,0.36);" ><?php echo $mostrar['desc'] ?></td>
                                <!-- <td style="background: rgba(253,114,13,0.36);" >
                                    <form action="../modificarUsuarios/index.php" method="post" style="padding: 0 !important; margin: 0 !important; background: none; border: none;">
                                        <button type="submit" name="edituser" id="edituser" value="<?php echo $mostrar['id']; ?>" style="background: none !important; border: none !important;">
                                            <img src="/assets/img/modificar.png" width="50" height="50" />
                                        </button>
                                    </form>
                                </td> -->
                                <td style="background: rgba(253,114,13,0.36);">
                                    <form action="../../registro.php" method="post" style="padding: 0 !important; margin: 0 !important; background: none; border: none;">
                                        <button type="submit" name="eliminar_u" id="eliminar_u" value="<?php echo $mostrar['id']; ?>" 
                                            style="background: none !important; border: none !important;" onclick="return ConfirmarDelete()" >
                                            <img src="/assets/img/deletear.png" width="50" height="50" />
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        <?php 
                        }
                        ?>
                </table>
            </div>
        </section>
    </section>
    <!-- <div class="text-center d-flex flex-column align-items-center align-items-xl-center">
        <form action="../agregarUsuarios/index.php">
            <button class="btn btn-primary" type="submit" style="background: rgb(253,114,13);border-color: rgba(255,255,255,255);border-radius: 27px;width: 225px;margin: 5px;">Agregar usuario</button>
        </form>
    </div> -->
    <div class="text-center row gy-3 row-cols-md-2">
        <form action="../agregarUsuarios/index.php">
            <button class="btn btn-primary" type="submit" style="background: rgb(253,114,13);border-color: rgba(255,255,255,255);border-radius: 27px;width: 225px;margin: 5px;">Agregar usuario</button>
        </form>
        <form action="../modificarUsuarios/index.php">
            <button class="btn btn-primary" type="submit" style="background: rgb(253,114,13);border-color: rgba(255,255,255,255);border-radius: 27px;width: 225px;margin: 5px;">Modificar usuario</button>
        </form>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>

    <script type="text/javascript">
        function ConfirmarDelete()
        {
            var respuesta = confirm("¿Estas seguro que Deceas Eliminarlo?");

            if (respuesta == true){
                return true;
            } else {
                return false;
            }

        }
    </script>

</body>

</html>