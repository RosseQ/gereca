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
    <link rel="icon" href="/assets/img/logo-icono.png">
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
                    <h2 class="text-info">Estado de Herramientas</h2>
                    <p></p>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="background: rgb(253,114,13);border-color: rgb(0,0,0);border-top-color: rgb(0,0,0);">Herramienta</th>
                            <th style="background: rgb(253,114,13);">Estatus</th>
                            <th style="background: rgb(253,114,13);">Usuario</th>
                            <th style="background: rgb(253,114,13);">Eliminar</th>
                        </tr>
                    </thead>
                    <?php 
                            $consulta = "SELECT DISTINCT cH.id, cH.desc_h, cH.estado, cU.username from cat_herramientas cH 
                            LEFT JOIN movimientos_herramientas mH ON cH.id = mH.id_herramienta 
                            LEFT JOIN cat_usuarios cU ON cU.id = mH.id_usuario
                            WHERE cH.estatus = 'visible';";
                            $resultado = mysqli_query($conex,$consulta);
                        while($mostrar = mysqli_fetch_array($resultado)){
                    ?>
                        <tbody>
                            <tr>
                                <td style="background: rgba(253,114,13,0.36);"><?php echo $mostrar['desc_h'] ?></td>
                                <td style="background: rgba(253,114,13,0.36);"><?php echo $mostrar['estado']?></td>
                                <td style="background: rgba(253,114,13,0.36);"><?php echo $mostrar['username']?></td>
                                <td style="background: rgba(253,114,13,0.36);" >
                                    <form action="../../registro.php" method="post" style="padding: 0 !important; margin: 0 !important; background: none; border: none;">
                                        <button type="submit" name="eliminar_h" id="eliminar_h" value="<?php echo $mostrar['id']; ?>" 
                                            style="background: none !important; border: none !important;" onclick="return ConfirmarDelete()">
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
    <div style=" display: flex; justify-content: center; align-items: center;">
        <form action="../prestarHerramientas/index.php">
            <button class="btn btn-primary" type="submit" style="background: rgb(253,114,13);border-color: rgba(255,255,255,255);border-radius: 27px;width: 225px;margin: 5px;">Prestar Herramienta</button>
        </form>
        <form action="../agregarRefacciones/index.php">
            <button class="btn btn-primary" type="submit" style="background: rgb(253,114,13);border-color: rgba(255,255,255,255);border-radius: 27px;width: 225px;margin: 5px;">Agregar Herramienta</button>
        </form>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>

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