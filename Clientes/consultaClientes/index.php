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

<body style="background: url(&quot;assets/img/clipboard-image-1.png&quot;), #fd720d;">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="../../Menu/index.php">RECESA</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            
            <div class="collapse navbar-collapse" id="navcol-1">
                <div id="header">
                    <nav> <!-- Aqui estamos iniciando la nueva etiqueta nav -->
                        <ul class="nav">
                            <li><a href="">Inicio</a></li>
                            <li><a href="">Status</a>
                                
                            </li>
                            <li><a href="">Clientes</a>
                                <ul>
                                    <li><a href="../Clientes/AgregarClientes/index.php">Resgistrar Cliente</a></li>
                                    <li><a href="../Clientes/ConsultaClientes/index.php">Ver Clientes</a></li>
                                </ul>
                            </li>
                            <li><a href="../Unidades/index.php">Unidades</a></li>
                            <li><a href="../Unidades/index.php">Ususarios</a></li>
                        </ul>
                    </nav><!-- Aqui estamos cerrando la nueva etiqueta nav -->
                </div>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="../../Menu/index.php">INICIO</a></li>
                    <li class="nav-item"><a class="nav-link" href="../logout.php">CERRAR SESION</a></li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <section class="clean-block clean-form dark" style="background: url(&quot;assets/img/clipboard-image-1.png&quot;);">
        <section class="clean-block clean-form dark" style="background: rgba(246,246,246,0);">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Ver Clientes</h2>
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
                            <th style="background: rgb(0, 0, 255);color: whitesmoke; margin: auto;">Nombres</th>
                            <th style="background: rgb(0, 0, 255);color: whitesmoke; margin: auto;">Telefono</th>
                            <th style="background: rgb(0, 0, 255);color: whitesmoke; margin: auto;">Correo Electronico</th>
                            <th style="background: rgb(0, 0, 255);color: whitesmoke; margin: auto;">Direccion</th>
                            <th style="background: rgb(0, 0, 255);color: whitesmoke; margin: auto;">RFC</th>
                            <th style="background: rgb(0, 0, 255);color: whitesmoke; margin: auto;">Curp</th>
                            <th style="background: rgb(0, 0, 255);color: whitesmoke; margin: auto;">Numero de documento</th>
                            <th style="background: rgb(0, 0, 255);color: whitesmoke; margin: auto;">OCR</th>
                            <th style="background: rgb(0, 0, 255);color: whitesmoke; margin: auto;">Eliminar</th>
                        </tr>
                    </thead>
                    <?php 
                     
                            $consulta = "SELECT clientes.id_cliente as 'IID',
                            clientes.nombre as 'NAME1', clientes.appaterno as 'NAME2', clientes.appaterno as 'NAME3',
                            clientes.telefono as 'TEL', clientes.email as 'MAIL', clientes.direccion as 'ADDR',
                            clientes.rfc as 'RFC', clientes.curp as 'CURP', clientes.num_doc as 'NDOC', clientes.ocr as 'OCR'
                            FROM clientes ORDER BY clientes.id_cliente ASC";
                            $resultado = mysqli_query($conex,$consulta);
                        while($mostrar = mysqli_fetch_array($resultado)){
                            
                    ?>
                        <tbody>
                            <tr dtyle="opacity: 1.0">
                                <td style="background: rgba(13,114,255,0.36);"><?php echo $mostrar['NAME1'] ?> <?php echo $mostrar['NAME2'] ?> <?php echo $mostrar['NAME3'] ?></td>
                                <td style="background: rgba(13,114,255,0.36);"><?php echo $mostrar['TEL'] ?></td>
                                <td style="background: rgba(13,114,255,0.36);"><?php echo $mostrar['MAIL'] ?></td>
                                <td style="background: rgba(13,114,255,0.36);"><?php echo $mostrar['ADDR'] ?></td>
                                <td style="background: rgba(13,114,255,0.36);"><?php echo $mostrar['RFC'] ?></td>
                                <td style="background: rgba(13,114,255,0.36);"><?php echo $mostrar['CURP'] ?></td>
                                <td style="background: rgba(13,114,255,0.36);"><?php echo $mostrar['NDOC'] ?></td>
                                <td style="background: rgba(13,114,255,0.36);"><?php echo $mostrar['OCR'] ?></td>
                                <td style="background: rgba(13,114,255,0.36);" >
                                    <form action="/registro.php" method="post" style="padding: 0 !important; margin: 0 !important; background: none; border: none;">
                                        <button type="submit" name="eliminar_Cli" id="eliminar_Cli" value="<?php echo $mostrar['IID'] ?>" 
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