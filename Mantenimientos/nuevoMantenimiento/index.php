<?php
include("../../db.php");

    session_start();
        
    if(!isset($_SESSION['id'])){
        header("Location: ../../index.php");
    }

    $id_u = $_SESSION['id'];
    $username = $_SESSION['username'];

?>

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
    <style type="text/css">
        * {
            margin:0px;
            padding:0px;
        }
        #header {
            margin:auto;
            width:500px;
            font-family:Arial, Helvetica, sans-serif;
        }
        ul, ol {
            list-style:none;
        }
        .nav {
            width:500px; /*Le establecemos un ancho*/
            margin:0 auto; /*Centramos automaticamente*/
        }
        .nav > li {
            float:left;
        }
        .nav li a {
            background-color: #ffffff  ;
            color: #000000 ;  /*color de letras*/
            text-decoration:none;
            padding:20px 12px;
            display:block;p
            
        }
        .nav li a:hover {
            background-color:  #8c8cff  ;
        }
        .nav li ul {
            display:none;
            position:absolute;
            min-width:140px;
        }
        .nav li:hover > ul {
            display:block;
        }
        .nav li ul li {
            position:relative;
        }
        .nav li ul li ul {
            right:-140px;
            top:0px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="../../Menu/index.php">RECESA|IDEALEASE</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            
            <div class="collapse navbar-collapse" id="navcol-1">
            <div id="header">
                    <nav> <!-- Aqui estamos iniciando la nueva etiqueta nav -->
                        <ul class="nav">
                            <li><a >Renta</a>
                                <ul>
                                    <li><a href="/ingresos/nuevoIngreso/index.php">Realizar renta</a></li>
                                    <li><a href="/ingresos/verIngresos/index.php">Ver rentas</a></li>
                                    <li><a href="/ingresos/devolucion_vehiculo/index.php">Camiones en renta</a></li>
                                </ul> 
                            </li>
                            <li><a >Clientes</a>
                                <ul>
                                    <li><a href="/Clientes/AgregarClientes/index.php">Resgistrar Cliente</a></li>
                                    <li><a href="/Clientes/ConsultaClientes/index.php">Ver Clientes</a></li>
                                </ul>
                            </li>
                            <li><a >Vehiculos</a>
                                <ul>
                                    <li><a href="/Vehiculos/agregarVehiculos/index.php">Registrar vehiculo</a></li>
                                    <li><a href="/Vehiculos/consultaVehiculos/index.php">Ver vehiculos</a></li>
                                </ul>
                            </li>
                            <li><a>Mantenimiento</a>
                                <ul>
                                    <li><a href="/Mantenimientos/nuevoMantenimiento/index.php">Registrar mantenimiento</a></li>
                                    <li><a href="/Mantenimientos/verMantenimientos/index.php">Ver mantenimiento</a></li>    
                                </ul>
                            </li>
                        </ul>
                    </nav><!-- Aqui estamos cerrando la nueva etiqueta nav -->
                </div>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="../../Menu/index.php">INICIO</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../logout.php">CERRAR SESION</a></li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <section class="clean-block clean-form dark">
        <div class="container">
        &nbsp
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
                <div class="mb-3"><label class="form-label" for="idVehiculo_det">Vehiculo</label>
                    <select class="form-select" id="idVehiculo_det" name="idVehiculo_det">
                        <?php
                            $consulta = "SELECT id_Vehiculo, tipo_unidad, economico
                            FROM vehiculos WHERE Vehiculos.id_DEstatus = 1 AND Vehiculos.id_VEstatus = 1;";
                            $resultado = mysqli_query($conex,$consulta);
                            while($mostrar = mysqli_fetch_array($resultado)){
                        ?>
                            <option id="idVehiculo_det" name="idVehiculo_det" value="<?php echo $mostrar['id_Vehiculo'] ?>">
                                <?php echo $mostrar['economico'] ?> - <?php echo $mostrar['tipo_unidad'] ?>
                            </option>
                        <?php }?>
                    </select>
                </div>
                <div class="mb-3"><label class="form-label" for="mantenimiento_det">Tipo de Mantenimiento</label>
                    <select class="form-select" id="mantenimiento_det" name="mantenimiento_det">
                        <?php 
                            $consulta = "SELECT id_Mantenimiento, nombre_mantenimiento
                            FROM mantenimiento";
                            $resultado = mysqli_query($conex,$consulta);
                            while($mostrar = mysqli_fetch_array($resultado)){
                        ?>
                            <option id="mantenimiento_det" name="mantenimiento_det" value="<?php echo $mostrar['id_Mantenimiento'] ?>"><?php echo $mostrar['nombre_mantenimiento'] ?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="costo_det">Costo del Mantenimiento</label>
                    <input class="form-control" type="text" id="costo_det" name="costo_det" value=0
                        maxlength="255" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="dias_mant">Dias en mantenimiento</label>
                    <input class="form-control" type="text" id="dias_mant" name="dias_mant" min="1" value=1
                        maxlength="4" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                </div>
                <?php
                    date_default_timezone_set('America/Phoenix');
                    $month = date('m');
                    $day = date('d');
                    $year = date('Y');
                    $today = $year . '-' . $month . '-' . $day;
                ?>
                <div class="mb-3">
                    <label class="form-label" for="fecha_hecho">Fecha de Mantenimiento</label>
                    <input class="form-control" type="date" id="fecha_hecho" name="fecha_hecho" value="<?php echo $today;?>">
                </div>
                <div class="mb-3">
                    <input class="btn btn-primary" type="submit" style="background: rgb(0, 0, 255);" id="detmant_insert" name="detmant_insert" value="Enviar">
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