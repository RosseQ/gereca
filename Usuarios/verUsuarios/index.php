<?php
include("../../db.php");
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
</head>

<body style="background: url(&quot;assets/img/clipboard-image-1.png&quot;), #fd720d;">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="../../Menu/index.html">CAMINOSA | Mi Taller</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="../../Menu/index.html">INICIO</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../index.php">CERRAR SESION</a></li>
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
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="background: rgb(253,114,13);border-color: rgb(0,0,0);border-top-color: rgb(0,0,0);">Nombre de USUARIO</th>
                            <th style="background: rgb(253,114,13);">Nombres</th>
                            <th style="background: rgb(253,114,13);">Nivel de permiso</th>
                            <th style="background: rgb(253,114,13);">Modificar</th>
                            <th style="background: rgb(253,114,13);">Eliminar</th>
                        </tr>
                    </thead>
                        <?php 
                            $consulta = "SELECT id, username, nombres, id_nivel_acceso FROM cat_usuarios";
                            $resultado = mysqli_query($conex,$consulta);
                        while($mostrar = mysqli_fetch_array($resultado)){
                        ?>
                        <tbody>
                            <tr>
                                <td style="background: rgba(253,114,13,0.36);" ><?php echo $mostrar['username'] ?></td>
                                <td style="background: rgba(253,114,13,0.36);" ><?php echo $mostrar['nombres'] ?></td>
                                <td style="background: rgba(253,114,13,0.36);" ><?php echo $mostrar['id_nivel_acceso'] ?></td>
                                <td style="background: rgba(253,114,13,0.36);" ><a href="">
                                    <img src="/assets/img/modificar.png" alt="" width="50" height="50" align="center"/>
                                <td style="background: rgba(253,114,13,0.36);" ><a href="">
                                <form action="../../registro.php" method="post" style="padding: 0 !important; margin: 0 !important; background: none; border: none;">
                                <button type="submit" name="eliminar_u" id="eliminar_u" value="<?php echo $mostrar['id']; ?>" style="background: none !important; border: none !important;">
                                            <img src="/assets/img/deletear.png" width="50" height="50" />
                                </button>
                                </form>
                            </tr>
                        </tbody>
                        <?php 
                        }
                        ?>
                </table>
            </div>
        </section>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>