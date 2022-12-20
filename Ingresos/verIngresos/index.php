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
    <link rel="stylesheet" type="text/css" href="/assets/css/otros.css" />
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
                    <h2 class="text-info">Ver Ingresos</h2>
                    <p></p>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="background: rgb(0, 0, 255);border-color: rgb(0,0,0);border-top-color: rgb(0,0,0); color: whitesmoke; margin: auto;">Cliente</th>
                            <th style="background: rgb(0, 0, 255); color: whitesmoke; margin: auto;">Vehiculo</th>
                            <th style="background: rgb(0, 0, 255); color: whitesmoke; margin: auto;">Economico</th>
                            <th style="background: rgb(0, 0, 255); color: whitesmoke; margin: auto;">Dias de Uso</th>
                            <th style="background: rgb(0, 0, 255); color: whitesmoke; margin: auto;">Total Neto</th>
                            <th style="background: rgb(0, 0, 255); color: whitesmoke; margin: auto;">Fecha</th>
                        </tr>
                    </thead>
                    <?php 

                        $consulta = "select clientes.nombre as 'NAME', clientes.appaterno as 'FSURNAME',
                        clientes.apmaterno as 'MSURNAME', vehiculos.tipo_unidad as 'CAR', vehiculos.economico as 'ECON',
                        detalle_renta.cantidad as 'QUANTITY', renta.total as 'TOTAL',
                        renta.fecha as 'DATE'
                        from renta
                        INNER JOIN clientes on renta.id_cliente = clientes.id_cliente
                        INNER JOIN detalle_renta on renta.id_detalleRenta = detalle_renta.id_detalleRenta
                        INNER JOIN vehiculos on detalle_renta.id_Vehiculo = vehiculos.id_Vehiculo";
                            $resultado = mysqli_query($conex,$consulta);
                        while($mostrar = mysqli_fetch_array($resultado)){
                    ?>
                        <tbody>
                            <tr>
                                <!-- <td style="background: rgba(13,114,255,0.36);">$</td> -->
                                <td style="background: rgba(13,114,255,0.36);"><?php echo $mostrar['NAME']?> <?php echo $mostrar['FSURNAME']?> <?php echo $mostrar['MSURNAME']?></td>
                                <td style="background: rgba(13,114,255,0.36);"><?php echo $mostrar['CAR'] ?></td>
                                <td style="background: rgba(13,114,255,0.36);"><?php echo $mostrar['ECON']?></td>
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
    <!-- <div class="text-center row gy-3 row-cols-md-2">
        <form action="../usarRefacciones/index.php">
            <button class="btn btn-primary" type="submit" style="background: rgb(0, 0, 255);border-color: rgba(255,255,255,255);border-radius: 27px;width: 225px;margin: 5px;">Usar Refaccion</button>
        </form>
        <form action="../agregarRefacciones/index.php">
            <button class="btn btn-primary" type="submit" style="background: rgb(0, 0, 255);border-color: rgba(255,255,255,255);border-radius: 27px;width: 225px;margin: 5px;">Agregar Refaccion</button>
        </form>
    </div> -->
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