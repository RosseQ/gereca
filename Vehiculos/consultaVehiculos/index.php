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
        <div class="container"><a class="navbar-brand logo" href="../../Menu/index.php">RECESA</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="../../Menu/index.php">INICIO</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="clean-block clean-form dark" style="background: url(&quot;assets/img/clipboard-image-1.png&quot;);">
        <section class="clean-block clean-form dark" style="background: rgba(246,246,246,0);">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Ver Vehiculos</h2>
                    <p></p>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="background: rgb(253,114,13);border-color: rgb(0,0,0);border-top-color: rgb(0,0,0);">Codigo de Barras</th>
                            <th style="background: rgb(253,114,13);">Economico</th>
                            <th style="background: rgb(253,114,13);">Tipo de unidad</th>
                            <th style="background: rgb(253,114,13);">Modelo</th>
                            <th style="background: rgb(253,114,13);">Clase de vehiculo</th>
                            <th style="background: rgb(253,114,13);">Categoria</th>
                            <th style="background: rgb(253,114,13);">Tipo de adaptacion</th>
                            <th style="background: rgb(253,114,13);">Placas</th>
                            <th style="background: rgb(253,114,13);">Eliminar</th>
                        </tr>
                    </thead>
                    <?php 
                            $consulta = "SELECT cH.id, cH.cod_barra, cH.desc_h, cH.estado, cU.username from cat_Vehiculos cH 
                            LEFT JOIN movimientos_Vehiculos mH ON cH.id = mH.id_herramienta 
                            LEFT JOIN cat_usuarios cU ON cU.id = mH.id_usuario 
                            WHERE cH.estatus = 'visible' 
                            GROUP BY cH.desc_h ORDER BY fecha_uh;";
                            $resultado = mysqli_query($conex,$consulta);
                        while($mostrar = mysqli_fetch_array($resultado)){
                    ?>
                        <tbody>
                            <tr>
                                <td style="background: rgba(253,114,13,0.36);"><?php echo $mostrar['cod_barra'] ?></td>
                                <td style="background: rgba(253,114,13,0.36);"><?php echo $mostrar['desc_h'] ?></td>
                                <td style="background: rgba(253,114,13,0.36);"><?php echo $mostrar['estado']?></td>
                                <td style="background: rgba(253,114,13,0.36);"><?php echo $mostrar['username']?></td>
                                <td style="background: rgba(253,114,13,0.36);" >
                                    <form action="../../registro.php" method="post" style="padding: 0 !important; margin: 0 !important; background: none; border: none;">
                                        <button type="submit" name="eliminar_h" id="eliminar_h" value="<?php echo $mostrar['id']; ?>" 
                                            style="background: none !important; border: none !important;" onclick="return ConfirmarDelete()">
                                            <!-- <img src="/assets/img/deletear.png" width="50" height="50" />-->
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