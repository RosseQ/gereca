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
        <div class="container"><a class="navbar-brand logo" href="../../Menu/index.php">RECESA</a>
            <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1">
                <span class="visually-hidden">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php">INICIO</a></li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-4 py-xl-5">
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h2>Heading</h2>
                <p class="w-lg-50"></p>
            </div>
        </div>

        <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-2">
            <div class="col">
                <div class="text-center d-flex flex-column align-items-center align-items-xl-center">
                    <h1>Vehiculos</h1>
                    <div class="bs-icon-lg bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon lg" style="background: rgba(13,110,253,0);">
                        
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
                <div class="text-center d-flex flex-column align-items-center align-items-xl-center">
                    <h1>Ver Mantenimientos</h1>
                    <div class="bs-icon-lg bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon lg" style="background: rgba(13,110,253,0);">
                        
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
                <div class="text-center d-flex flex-column align-items-center align-items-xl-center">
                    <h1>Ver Ingresos</h1>
                    <div class="bs-icon-lg bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon lg" style="background: rgba(13,110,253,0);">
                        
                    </div>
                    <div class="px-3">
                        <form action="../Ingresos/nuevoIngreso/index.php">
                            <button class="btn btn-primary" type="submit" style="background: rgb(0, 0, 255);border-color: rgba(255,255,255,0);border-radius: 27px;width: 225px;margin: 5px;">Agregar Ingreso</button>
                        </form>
                        <form action="../Ingresos/verIngresos/index.php">
                            <button class="btn btn-primary" type="submit" style="background: rgb(0, 0, 255);border-color: rgba(255,255,255,0);border-radius: 27px;width: 225px;margin: 5px;">Ver Ingresos</button>
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
    
</body>

</html>