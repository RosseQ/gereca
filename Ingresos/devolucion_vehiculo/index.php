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
    <link rel="stylesheet" type="text/css" href="/assets/css/otros.css" />
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
        body{
            background-color: #ffffff;
            font-family: Arial;
        }

        #main-container{
            margin: 150px auto;
            width: 600px;
        }

        table{
            background-color: white;
            text-align: left;
            border-collapse: collapse;
            width: 100%;
        }

        th, td{
            padding: 20px;
            text-indent: 10px;
            font-size: 20px;
        }

        thead{
            background-color: #246355;
            border-bottom: solid 5px #0F362D;
            color: white;
        }

        tr:nth-child(even){
            background-color: #ddd;
        }

        tr:hover td{
            background-color: #f3ffaa;
            color: black;
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
        <section class="clean-block clean-form dark" style="background: rgba(246,246,246,0);">
            <div class="container">
                <div class="block-heading">
                &nbsp
                    <h2 class="text-info">RENTAS EN PROCESO</h2>
                    <p></p>
                </div>
            </div>

            <div class="table-responsive">

                <?php if(isset($_GET['error'])){ ?>
                <div id="error" style="width: 100%; background: rgb(0,15,255); text-align: center; border-radius: 2px; padding: 4px; ">
                    <label style="color: whitesmoke;"><?php echo $_GET['error']; ?></label>
                    <span class="close" style="font-size: 24px; color: whitesmoke; margin: auto;" onclick="getElementById('error').style.display = 'none' ">&times;</span>
                </div>
                <?php } ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th style="background: rgb(0, 0, 255);border-color: rgb(0,0,0);border-top-color: rgb(0,0,0); color: whitesmoke; margin: auto;">Cliente</th>
                            <th style="background: rgb(0, 0, 255); color: whitesmoke; margin: auto;">Vehiculo</th>
                            <th style="background: rgb(0, 0, 255); color: whitesmoke; margin: auto;">Economico</th>
                            <th style="background: rgb(0, 0, 255); color: whitesmoke; margin: auto;">Fecha de renta</th>
                            <th style="background: rgb(0, 0, 255); color: whitesmoke; margin: auto;">Fecha de regreso</th>
                            <th style="background: rgb(0, 0, 255); color: whitesmoke; margin: auto;">Estatus</th>
                            <th style="background: rgb(0, 0, 255); color: whitesmoke; margin: auto;">Registrar Devolucion</th>
                        </tr>
                    </thead>
                    <?php 

                        $consulta = "select clientes.nombre as 'NAME', clientes.appaterno as 'FSURNAME',
                        clientes.apmaterno as 'MSURNAME', vehiculos.tipo_unidad as 'CAR', vehiculos.economico as 'ECON',
                        renta.fecha_hecho as 'DATE_1', renta.fecha_regreso as 'DATE_2', Cat_VEstatus.descripcion as 'estatus'
                        from renta 
                        INNER JOIN clientes on renta.id_cliente = clientes.id_cliente
                        INNER JOIN detalle_renta on renta.id_detalleRenta = detalle_renta.id_detalleRenta
                        INNER JOIN vehiculos on detalle_renta.id_Vehiculo = vehiculos.id_Vehiculo
                        INNER JOIN Cat_VEstatus on vehiculos.id_VEstatus = Cat_VEstatus.id_VEstatus 
                        
                        where Cat_VEstatus.descripcion = 'Rentado'
                        ORDER BY clientes.nombre asc;
                        ";
                            $resultado = mysqli_query($conex,$consulta);
                        while($mostrar = mysqli_fetch_array($resultado)){
                    ?>
                        <tbody>
                            <tr>
                                <!-- <td style="">$</td> -->
                                <td style=""><?php echo $mostrar['NAME']?> <?php echo $mostrar['FSURNAME']?> <?php echo $mostrar['MSURNAME']?></td>
                                <td style=""><?php echo $mostrar['CAR'] ?></td>
                                <td style=""><?php echo $mostrar['ECON']?></td>
                                <td style=""><?php echo $mostrar['DATE_1']?></td>
                                <td style=""><?php echo $mostrar['DATE_2']?></td>
                                <td style=""><?php echo $mostrar['estatus']?></td>
                                <td style="">
                                    <form action="/ingresos/devolucion_vehiculo/devolucion_registro.php" method="post" style="padding: 0 !important; margin: 0 !important; background: none; border: none;">
                                        <button type="submit" name="modifacar_r" id="modifacar_r"
                                                    style="background: none !important; border: none !important;" onclick="">
                                                    <img src="/assets/img/modificar.png" width="50" height="50" />
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