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
                    <li class="nav-item"><a class="nav-link active" href="../../Menu/index.php">INICIO</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="clean-block clean-form dark" style="background: url(&quot;assets/img/clipboard-image-1.png&quot;);">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info" style="color: var(--bs-blue);border-top-color: rgb(13,114,253);border-bottom-color: rgba(59,153,224,0);">Registrar Mantenimiento</h2>
            </div>

            <?php if(isset($_GET['error'])){ ?>
            <div id="error" style="width: 100%; background: rgb(0,15,255); text-align: center; border-radius: 2px; padding: 4px; ">
                <label style="color: whitesmoke;"><?php echo $_GET['error']; ?></label>
                <span class="close" style="font-size: 24px; color: whitesmoke; margin: auto;" onclick="getElementById('error').style.display = 'none' ">&times;</span>
            </div>
            <?php } ?>
            <form action="/registro.php" method="POST" style="color: rgb(0,15,255);background: rgba(13,114,255,0.11);border-top-color: rgb(13,114,255);">
                <!-- <div class="mb-3">
                    <label class="form-label" for="cod_barra">ID ingreso</label>
                    <input class="form-control" type="number" id="cod_barra" name="cod_barra"
                        maxlength="10" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                </div> -->
                <!-- <div class="mb-3">
                    <label class="form-label" for="idVehiculo_i">Economico</label>
                    <input class="form-control" type="text" id="idVehiculo_i" name="idVehiculo_i"
                        maxlength="150" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32)">
                </div> -->
                <div class="mb-3"><label class="form-label" for="idVehiculo_i">Vehiculo</label>
                    <select class="form-select" id="idVehiculo_i" name="idVehiculo_i">
                        <?php 
                            $consulta = "SELECT id_Vehiculo, tipo_unidad
                            FROM vehiculos";
                            $resultado = mysqli_query($conex,$consulta);
                            while($mostrar = mysqli_fetch_array($resultado)){
                        ?>
                            <option id="idVehiculo_i" name="idVehiculo_i" value="<?php echo $mostrar['id_Vehiculo'] ?>"><?php echo $mostrar['tipo_unidad'] ?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="mb-3"><label class="form-label" for="tipoRenta_i">Tipo de Renta</label>
                    <select class="form-select" id="tipoRenta_i" name="tipoRenta_i">
                        <?php 
                            $consulta = "SELECT id_Cat_Tipo_Renta, descripcion
                            FROM cat_tipo_renta";
                            $resultado = mysqli_query($conex,$consulta);
                            while($mostrar = mysqli_fetch_array($resultado)){
                        ?>
                            <option id="tipoRenta_i" name="tipoRenta_i" value="<?php echo $mostrar['id_Cat_Tipo_Renta'] ?>"><?php echo $mostrar['descripcion'] ?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="dias_i">Dias</label>
                    <input class="form-control" type="text" id="dias_i" name="dias_i" min="1" value=0
                        maxlength="4" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="tarifa_i">Tarifa</label>
                    <input class="form-control" type="text" id="tarifa_i" name="tarifa_i" value=0
                        maxlength="255" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="costo_i">Costo del Mantenimiento</label>
                    <input class="form-control" type="text" id="costo_i" name="costo_i" value=0
                        maxlength="255" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                </div>
                <!-- <div class="mb-3">
                    <label class="form-label" for="utilidad_i">Total Neto</label>
                    <h2 id="utilidad_i"></h2>
                </div> -->
                <!-- <div class="mb-3">
                    <label class="form-label" for="fecha_i">Fecha de Ingreso</label>
                    <input class="form-control" type="Date" id="fecha_i" name="fecha_i">
                </div> -->
                <div class="mb-3">
                    <input class="btn btn-primary" type="submit" style="background: rgb(0, 0, 255);" id="nuevoingreso" name="nuevoingreso" value="Enviar">
                </div>
            </form>
            
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>
    <!-- <script type="application/javascript">
        function calcularcosto() {
            var xtarifa = document.getElementById('tarifa_i').value;
            var xcosto = document.getElementById('costo_i').value;
            var xutilidad = xtarifa - xcosto;
            document.getElementById('utilidad_i').value = xutilidad;
        }
    </script> -->
</body>

</html>