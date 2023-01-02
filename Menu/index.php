<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="assets/css/Features-Centered-Icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <link rel="icon" href="/assets/img/logo-icono.png">
</head>

<body style="background: url(&quot;assets/img/clipboard-image-1.png&quot;), #fd720d;">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="../../Menu/index.php">RECESA | GERECA</a>
            <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1">
                <span class="visually-hidden">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php">INICIO </a></li>
                    <li class="nav-item"><a class="nav-link active" href="index.php">CERRAR SECION</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-4 py-xl-5">
    &nbsp
        <div class="row mb-5">
        
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                
                <title>Menu Desplegable</title>
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
                        </ul>
                    </nav><!-- Aqui estamos cerrando la nueva etiqueta nav -->
                </div>
            
            </div>
        </div>
           
        
        <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
            <div class="col">
            &nbsp
                <div class="text-center d-flex flex-column align-items-center align-items-xl-center">
                &nbsp
                    <h1>Vehiculos</h1>
                    <div class="bs-icon-lg bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon lg" style="background: rgba(13,110,253,0);">
                    <img src="assets/img/CAMION.png" style="transform: scale(.32);background: rgba(253,126,20,0);opacity: 1;">   
                    </div>
                    <div class="px-3">
                        <form action="../Vehiculos/agregarVehiculos/index.php">
                            <button class="btn btn-primary" type="submit" style="background: rgb(0, 0, 255);border-color: rgba(255,255,255,0);border-radius: 27px;width: 225px;margin: 5px;">Agregar vehiculo</button>
                        </form>
                        <form action="../Vehiculos/consultaVehiculos/index.php">
                            <button class="btn btn-primary" type="submit" style="background: rgb(0, 0, 255);border-color: rgba(255,255,255,0);border-radius: 27px;width: 225px;margin: 5px;">Ver Vehiculo</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col">
            &nbsp
                <div class="text-center d-flex flex-column align-items-center align-items-xl-center">
                &nbsp
                    <h1>Ver Mantenimientos</h1>
                    <div class="bs-icon-lg bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon lg" style="background: rgba(13,110,253,0);">
                    <img src="assets/img/mantenimiento.png" style="transform: scale(.24);background: rgba(253,126,20,0);opacity: 1;">     
                    </div>
                    <div class="px-3">
                        <form action="../Mantenimientos/nuevoMantenimiento/index.php">
                            <button class="btn btn-primary" type="submit" style="background: rgb(0, 0, 255);border-color: rgba(255,255,255,0);border-radius: 27px;width: 225px;margin: 5px;">Registrar Mantenimiento</button>
                        </form>
                        <form action="../Mantenimientos/verMantenimientos/index.php">
                            <button class="btn btn-primary" type="submit" style="background: rgb(0, 0, 255);border-color: rgba(255,255,255,0);border-radius: 27px;width: 225px;margin: 5px;">Ver Mantenimientos</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col">
            &nbsp
                <div class="text-center d-flex flex-column align-items-center align-items-xl-center">
                &nbsp
                    <h1>Renta</h1>
                    <div class="bs-icon-lg bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon lg" style="background: rgba(13,110,253,0);">
                    <img src="assets/img/rentaca.png" style="transform: scale(.34);background: rgba(253,126,20,0);opacity: 1;">    
                    </div>
                    <div class="px-3">
                        <form action="../Ingresos/nuevoIngreso/index.php">
                            <button class="btn btn-primary" type="submit" style="background: rgb(0, 0, 255);border-color: rgba(255,255,255,0);border-radius: 27px;width: 225px;margin: 5px;">Realizar Renta</button>
                        </form>
                        <form action="../Ingresos/verIngresos/index.php">
                            <button class="btn btn-primary" type="submit" style="background: rgb(0, 0, 255);border-color: rgba(255,255,255,0);border-radius: 27px;width: 225px;margin: 5px;">ver rentas</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>
    <div>
            <center>
            <img src="assets/img/vista.png" style="transform: scale(1.32);background: rgba(253,126,20,0);opacity: 1;">   
            </center>
            </div>
</body>

</html>