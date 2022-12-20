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
                            <th style="background: rgb(0, 0, 255);border-color: rgb(0,0,0);border-top-color: rgb(0,0,0); color: whitesmoke; margin: auto;">Cliente</th>
                            <!-- <th style="background: rgb(0, 0, 255); color: whitesmoke; margin: auto;">Cliente</th> -->
                            <th style="background: rgb(0, 0, 255); color: whitesmoke; margin: auto;">Vehiculo</th>
                            <th style="background: rgb(0, 0, 255); color: whitesmoke; margin: auto;">Economico</th>
                            <th style="background: rgb(0, 0, 255); color: whitesmoke; margin: auto;">Renta</th>
                            <th style="background: rgb(0, 0, 255); color: whitesmoke; margin: auto;">Tarifa</th>
                            <th style="background: rgb(0, 0, 255); color: whitesmoke; margin: auto;">Dias de Uso</th>
                            <th style="background: rgb(0, 0, 255); color: whitesmoke; margin: auto;">Total Neto</th>
                            <th style="background: rgb(0, 0, 255); color: whitesmoke; margin: auto;">Fecha</th>
                        </tr>
                    </thead>
                    <?php 
                        $consulta = "select clientes.nombre as 'NAME', clientes.appaterno as 'FSURNAME',
                        clientes.apmaterno as 'MSURNAME', vehiculos.tipo_unidad as 'CAR', vehiculos.economico as 'ECON',
                        costos.tipo_prestamo as 'RENTAL', costos.precio as 'PRICE',
                        detalle_renta.cantidad as 'QUANTITY', renta.total as 'TOTAL',
                        renta.fecha as 'DATE'
                        from renta
                        INNER JOIN clientes on renta.id_cliente = clientes.id_cliente
                        INNER JOIN detalle_renta on renta.id_detalleRenta = detalle_renta.id_detalleRenta
                        INNER JOIN vehiculos on detalle_renta.id_Vehiculo = vehiculos.id_Vehiculo
                        INNER JOIN costos on detalle_renta.id_costo = costos.id_costo";
                        $resultado = mysqli_query($conex,$consulta);
                        while($mostrar = mysqli_fetch_array($resultado)){
                    ?>
                        <tbody>
                            <tr>
                                <!-- <td style="background: rgba(13,114,255,0.36);">$<?php echo $mostrar['RID']?></td> -->
                                <td style="background: rgba(13,114,255,0.36);"><?php echo $mostrar['NAME']?> <?php echo $mostrar['FSURNAME']?> <?php echo $mostrar['MSURNAME']?></td>
                                <td style="background: rgba(13,114,255,0.36);"><?php echo $mostrar['CAR'] ?></td>
                                <td style="background: rgba(13,114,255,0.36);"><?php echo $mostrar['ECON']?></td>
                                <td style="background: rgba(13,114,255,0.36);"><?php echo $mostrar['RENTAL']?></td>
                                <td style="background: rgba(13,114,255,0.36);">$<?php echo $mostrar['PRICE']?></td>
                                <td style="background: rgba(13,114,255,0.36);"><?php echo $mostrar['QUANTITY']?></td>
                                <td style="background: rgba(13,114,255,0.36);">$<?php echo $mostrar['TOTAL']?></td>
                                <td style="background: rgba(13,114,255,0.36);"><?php echo $mostrar['DATE']?></td>
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