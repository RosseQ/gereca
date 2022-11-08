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
                <h2 class="text-info" style="color: var(--bs-blue);border-top-color: rgb(253,114,13);border-bottom-color: rgba(59,153,224,0);">Agregar Vehiculo</h2>
                <p></p>
            </div>

            <?php if(isset($_GET['error'])){ ?>
            <div id="error" style="width: 100%; background: rgb(0,15,255); text-align: center; border-radius: 2px; padding: 4px; ">
                <label style="color: whitesmoke;"><?php echo $_GET['error']; ?></label>
                <span class="close" style="font-size: 24px; color: whitesmoke; margin: auto;" onclick="getElementById('error').style.display = 'none' ">&times;</span>
            </div>
            <?php } ?>

            <form action="/registro.php" method="POST" style="color: rgb(0,15,255);background: rgba(13,114,255,0.11);border-top-color: rgb(13,114,255);">
                <div class="mb-3">
                    <label class="form-label" for="id_v">Economico</label>
                    <input class="form-control" type="text" id="id_v" name="id_v"
                        maxlength="11" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="tipounidad_v">Tipo de unidad</label>
                    <input class="form-control" type="text" id="tipounidad_v" name="tipounidad_v"
                        maxlength="50" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32)">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="modelo_v">Modelo</label>
                    <input class="form-control" type="text" id="modelo_v" name="modelo_v"
                        maxlength="50" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32)">
                </div>
                <!-- <div class="mb-3">
                    <label class="form-label" for="desc_h">Clase de vehiculo</label>
                    <input class="form-control" type="text" id="desc_h" name="desc_h"
                        maxlength="50" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32)">
                </div> -->
                <div class="mb-3"><label class="form-label" for="clase_vehiculo">Clase de vehiculo</label>
                    <select class="form-select" id="clase_vehiculo" name="clase_vehiculo">
                        <?php 
                            $consulta = "SELECT id_Cat_Clase_Vehiculo, descripcion
                            FROM cat_clase_Vehiculo";
                            $resultado = mysqli_query($conex,$consulta);
                            while($mostrar = mysqli_fetch_array($resultado)){
                        ?>
                            <option id="clase_vehiculo" name="clase_vehiculo" value="<?php echo $mostrar['id_Cat_Clase_Vehiculo'] ?>"><?php echo $mostrar['descripcion'] ?></option>
                        <?php }?>
                    </select>
                </div>
                <!-- <div class="mb-3">
                    <label class="form-label" for="desc_h">Categoria</label>
                    <input class="form-control" type="text" id="desc_h" name="desc_h"
                        maxlength="50" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32)">
                </div> -->
                <div class="mb-3"><label class="form-label" for="tipo_vehiculo">Tipo</label>
                    <select class="form-select" id="tipo_vehiculo" name="tipo_vehiculo">
                        <?php 
                            $consulta = "SELECT id_Cat_Tipo, descripcion
                            FROM cat_tipo";
                            $resultado = mysqli_query($conex,$consulta);
                            while($mostrar = mysqli_fetch_array($resultado)){
                        ?>
                            <option id="tipo_vehiculo" name="tipo_vehiculo" value="<?php echo $mostrar['id_Cat_Tipo'] ?>"><?php echo $mostrar['descripcion'] ?></option>
                        <?php }?>
                    </select>
                </div>
                <!-- <div class="mb-3">
                    <label class="form-label" for="desc_h">Adaptacion</label>
                    <input class="form-control" type="text" id="desc_h" name="desc_h"
                        maxlength="50" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32)">
                </div> -->
                <div class="mb-3"><label class="form-label" for="adaptacion_v">Adaptacion</label>
                    <select class="form-select" id="adaptacion_v" name="adaptacion_v">
                        <?php 
                            $consulta = "SELECT id_Cat_Adaptacion, descripcion
                            FROM cat_adaptacion";
                            $resultado = mysqli_query($conex,$consulta);
                            while($mostrar = mysqli_fetch_array($resultado)){
                        ?>
                            <option id="adaptacion_v" name="adaptacion_v" value="<?php echo $mostrar['id_Cat_Adaptacion'] ?>"><?php echo $mostrar['descripcion'] ?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="placas_v">Placas</label>
                    <input class="form-control" type="text" id="placas_v" name="placas_v"
                        maxlength="7" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32)">
                </div>
                <div class="mb-3">
                    <input class="btn btn-primary" type="submit" style="background: rgb(0, 0, 255);" id="agregar_v" name="agregar_v" value="Enviar">
                </div>
            </form>

        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>