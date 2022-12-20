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
        <div class="container"><a class="navbar-brand logo" href="../../Menu/index.php">RECESA</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="../../Menu/index.php">soy un estatus</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="clean-block clean-form dark" style="background: url(&quot;assets/img/clipboard-image-1.png&quot;);">
        <section class="clean-block clean-form dark" style="background: rgba(246,246,246,0);">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">soy un estatus</h2>
                    <p></p>
                </div>
            </div>

            <?php if(isset($_GET['error'])){ ?>
            <div id="error" style="width: 100%; background: rgb(0,15,255); text-align: center; border-radius: 2px; padding: 4px; ">
                <label style="color: whitesmoke;"><?php echo $_GET['error']; ?></label>
                <span class="close" style="font-size: 24px; color: whitesmoke; margin: auto;" onclick="getElementById('error').style.display = 'none' ">&times;</span>
            </div>
            <?php } ?>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                        <th style="background: rgb(0, 0, 255);border-color: rgb(0,0,0);border-top-color: rgb(0,0,0);color: whitesmoke; margin: auto;">Id</th>
                            <th style="background: rgb(0, 0, 255);color: whitesmoke; margin: auto;">Economico</th>
                            <th style="background: rgb(0, 0, 255);color: whitesmoke; margin: auto;">Tipo de unidad</th>
                            <th style="background: rgb(0, 0, 255);color: whitesmoke; margin: auto;">Placas</th>
                            <th style="background: rgb(0, 0, 255);color: whitesmoke; margin: auto;">Economico</th>
                            <th style="background: rgb(0, 0, 255);color: whitesmoke; margin: auto;">Numero de Serie</th>
                            <th style="background: rgb(0, 0, 255);color: whitesmoke; margin: auto;">Cliente</th>
                            <th style="background: rgb(0, 0, 255);color: whitesmoke; margin: auto;">Fecha de ultima renta</th>
                        </tr>
                    </thead>
                    <?php 
                            $consulta = "select Vehiculos.id_Vehiculo as 'Economico',
                            Vehiculos.tipo_unidad as 'Tipo de Unidad',
                            Vehiculos.modelo as 'Modelo',
                            Cat_Clase_Vehiculo.descripcion as 'Clase de Vehiculo',
                            Cat_Tipo.descripcion as 'Tipo',
                            Cat_Adaptacion.descripcion as 'Adaptación',
                            Vehiculos.placas as 'Placas'
                            from Vehiculos
                            inner join Cat_Clase_Vehiculo on Vehiculos.id_Cat_Clase_Vehiculo = Cat_Clase_Vehiculo.id_Cat_Clase_Vehiculo
                            inner join Cat_Tipo on Vehiculos.id_Cat_Tipo = Cat_Tipo.id_Cat_Tipo
                            inner join Cat_Adaptacion on Vehiculos.id_Cat_Adaptacion = Cat_Adaptacion.id_Cat_Adaptacion;";
                            $resultado = mysqli_query($conex,$consulta);
                        while($mostrar = mysqli_fetch_array($resultado)){
                    ?>
                        <tbody>
                            <tr>
                                <td style="background: rgba(13,114,255,0.36);"><?php echo $mostrar['Economico'] ?></td>
                                <td style="background: rgba(13,114,255,0.36);"><?php echo $mostrar['Tipo de Unidad'] ?></td>
                                <td style="background: rgba(13,114,255,0.36);"><?php echo $mostrar['Modelo']?></td>
                                <td style="background: rgba(13,114,255,0.36);"><?php echo $mostrar['Clase de Vehiculo']?></td>
                                <td style="background: rgba(13,114,255,0.36);"><?php echo $mostrar['Tipo']?></td>
                                <td style="background: rgba(13,114,255,0.36);"><?php echo $mostrar['Adaptación']?></td>
                                <td style="background: rgba(13,114,255,0.36);"><?php echo $mostrar['Placas']?></td>
                                <td style="background: rgba(13,114,255,0.36);" >
                                    <form action="/registro.php" method="post" style="padding: 0 !important; margin: 0 !important; background: none; border: none;">
                                        <button type="submit" name="eliminar_v" id="eliminar_v" value="<?php echo $mostrar['Economico'] ?>" 
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