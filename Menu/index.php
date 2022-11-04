<?php
	
	session_start();
	
	if(!isset($_SESSION['id'])){
		header("Location: ../../index.php");
	}
	
    $id_u = $_SESSION['id'];
    $username = $_SESSION['username'];
	
?>


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

        <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
            <div class="col">
                <div class="text-center d-flex flex-column align-items-center align-items-xl-center">
                    <h1>Vehiculos</h1>
                    <div class="bs-icon-lg bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon lg" style="background: rgba(13,110,253,0);">
                        <img src="assets/img/logovehiculo.png" style="transform: scale(0.11);background: rgba(253,126,20,0);opacity: 1;">
                    </div>
                    <div class="px-3">

                        
                       
                        <form action="../herramientas/agregarHerramientas/index.php">
                            <button class="btn btn-primary" type="submit" style="background: rgb(253,114,13);border-color: rgba(255,255,255,0);border-radius: 27px;width: 225px;margin: 5px;">Agregar vehiculo</button>
                        </form>
                        <form action="../herramientas/estadoHerramientas/index.php">
                            <button class="btn btn-primary" type="submit" style="background: rgb(253,114,13);border-color: rgba(255,255,255,0);border-radius: 27px;width: 225px;margin: 5px;">Ver Vehiculo</button>
                        </form>
                        
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="text-center d-flex flex-column align-items-center align-items-xl-center">
                    <h1>Refacciones</h1>
                    <div class="bs-icon-lg bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon lg" style="background: rgba(13,110,253,0);">
                        <img src="assets/img/logovehiculo.png" style="transform: scale(0.13);">
                    </div>
                    <div class="px-3">

                        <form action="../Refacciones/usarRefacciones/index.php">
                            <button class="btn btn-primary" type="submit" style="background: rgb(253,114,13);border-color: rgba(255,255,255,0);border-radius: 27px;width: 225px;margin: 5px;">Usar Refacción</button>
                        </form>
                        <form action="../Refacciones/agregarRefacciones/index.php">
                            <button class="btn btn-primary" type="submit" style="background: rgb(253,114,13);border-color: rgba(255,255,255,0);border-radius: 27px;width: 225px;margin: 5px;">Agregar Refacción</button>
                        </form>
                        <form action="../Refacciones/verRefacciones/index.php">
                            <button class="btn btn-primary" type="submit" style="background: rgb(253,114,13);border-color: rgba(255,255,255,0);border-radius: 27px;width: 225px;margin: 5px;">Ver Refacciones</button>
                        </form>

                    </div>
                </div>
            </div>

            <div class="col">
                <div class="text-center d-flex flex-column align-items-center align-items-xl-center">
                    <h1>Usuarios</h1>
                    <div class="bs-icon-lg bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-3 bs-icon lg" style="background: rgba(13,110,253,0);">
                        <img src="assets/img/USUARIOS%20SOLO%20LOGO.png" style="transform: scale(0.17);">
                    </div>
                    <div class="px-3">

                        <form action="../Usuarios/agregarUsuarios/index.php">
                            <button class="btn btn-primary" type="submit" style="background: rgb(253,114,13);border-color: rgba(255,255,255,0);border-radius: 27px;width: 225px;margin: 5px;">Agregar usuario</button>
                        </form>
                        <form action="../Usuarios/verUsuarios/index.php">
                            <button class="btn btn-primary" type="submit" style="background: rgb(253,114,13);border-color: rgba(255,255,255,0);border-radius: 27px;width: 225px;margin: 5px;">Ver Usuarios</button>
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