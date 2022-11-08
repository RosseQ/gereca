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
                            <th style="background: rgb(0, 0, 255);border-color: rgb(0,0,0);border-top-color: rgb(0,0,0); color: whitesmoke; margin: auto;">ID</th>
                            <th style="background: rgb(0, 0, 255); color: whitesmoke; margin: auto;">Tipo de Unidad</th>
                            <th style="background: rgb(0, 0, 255); color: whitesmoke; margin: auto;">Tipo de Renta</th>
                            <th style="background: rgb(0, 0, 255); color: whitesmoke; margin: auto;">Dias de Uso</th>
                            <th style="background: rgb(0, 0, 255); color: whitesmoke; margin: auto;">Tarifa</th>
                            <th style="background: rgb(0, 0, 255); color: whitesmoke; margin: auto;">Costos de Mantenimiento</th>
                            <th style="background: rgb(0, 0, 255); color: whitesmoke; margin: auto;">Total Neto</th>
                            <th style="background: rgb(0, 0, 255); color: whitesmoke; margin: auto;">Fecha de Ingreso</th>
                        </tr>
                    </thead>
                    <?php 
                        $consulta = "select Ingresos.id_Ingresos as 'ID',
                        Vehiculos.tipo_unidad as 'TipoUnidad',
                        Cat_Tipo_Renta.descripcion as 'TipoRenta',
                        Ingresos.dias as 'Dias',
                        Ingresos.tarifa as 'Tarifa',
                        Ingresos.costmantenimiento as 'Costo',
                        Ingresos.totalneto as 'Total',
                        Ingresos.fecha_ingreso as 'FechaIngreso'
                        from Ingresos
                        inner join Vehiculos ON Ingresos.id_Vehiculo = Vehiculos.id_Vehiculo
                        inner join Cat_Tipo_Renta ON Ingresos.id_Cat_Tipo_Renta = Cat_Tipo_Renta.id_Cat_Tipo_Renta";
                        $resultado = mysqli_query($conex,$consulta);
                        while($mostrar = mysqli_fetch_array($resultado)){
                    ?>
                        <tbody>
                            <tr>
                                <td style="background: rgba(13,114,255,0.36);"><?php echo $mostrar['ID'] ?></td>
                                <td style="background: rgba(13,114,255,0.36);"><?php echo $mostrar['TipoUnidad'] ?></td>
                                <td style="background: rgba(13,114,255,0.36);"><?php echo $mostrar['TipoRenta'] ?></td>
                                <td style="background: rgba(13,114,255,0.36);"><?php echo $mostrar['Dias'] ?></td>
                                <td style="background: rgba(13,114,255,0.36);">$<?php echo $mostrar['Tarifa'] ?></td>
                                <td style="background: rgba(13,114,255,0.36);">$<?php echo $mostrar['Costo'] ?></td>
                                <td style="background: rgba(13,114,255,0.36);">$<?php echo $mostrar['Total'] ?></td>
                                <td style="background: rgba(13,114,255,0.36);"><?php echo $mostrar['FechaIngreso'] ?></td>
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