<?php
include("../../db.php");

	session_start();
	
	if(!isset($_SESSION['id'])){
		header("Location: ../../index.php");
	}
	
    $id_u = $_SESSION['id'];
    $username = $_SESSION['username'];

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
        <div class="container"><a class="navbar-brand logo" href="../../Menu/index.php">CAMINOSA | Mi Taller</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="../verUsuarios/index.php">VER USUARIOS</a></li>
                    <li class="nav-item"><a class="nav-link active" href="../../Menu/index.php">INICIO</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../logout.php">CERRAR SESION</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="clean-block clean-form dark" style="background: url(&quot;assets/img/clipboard-image-1.png&quot;);">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info" style="color: var(--bs-blue);border-top-color: rgb(253,114,13);border-bottom-color: rgba(59,153,224,0);">Modificar Usuario</h2>
                <p></p>
            </div>
            <?php if(isset($_GET['error'])){ ?>
                <div id="error" style="width: 100%; background: lightsalmon; text-align: center; border-radius: 2px; padding: 4px; ">
                    <label style="color: whitesmoke;"><?php echo $_GET['error']; ?></label>
                    <span class="close" style="font-size: 24px; color: whitesmoke; margin: auto;" onclick="getElementById('error').style.display = 'none' ">&times;</span>
                </div>
            <?php } ?>
            <form action="/registro.php" method="POST" style="color: rgb(255,15,0);background: rgba(253,114,13,0.11);border-top-color: rgb(253,114,13);">
                <div class="mb-3"><label class="form-label" for="id_mod">ID</label>
                    <select class="form-select" id="id_mod" name="id_mod">
                        <?php 
                            $consulta = "SELECT id, username, nombres, password
                            FROM cat_usuarios
                            WHERE estatus ='visible'
                            ORDER BY id ASC
                            ";
                            $resultado = mysqli_query($conex,$consulta);
                            while($mostrar = mysqli_fetch_array($resultado)){
                        ?>
                            <option id="id_mod" name="id_mod" value="<?php echo $mostrar['id'] ?>"><?php echo $mostrar['id'] ?> : <?php echo $mostrar['nombres'] ?></option>
                            
                        <?php }?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="username_mod">Nombre de Usuario</label>
                    <input class="form-control" type="text" id="username_mod" name="username_mod" value=""
                        maxlength="15" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122))">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="nombres_mod">Nombres</label>
                    <input class="form-control" type="text" id="nombres_mod" name="nombres_mod" value=""
                        maxlength="50" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32)">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password_mod">Contraseña</label>
                    <input class="form-control" type="text" id="password_mod" name="password_mod" value=""
                        maxlength="8" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                </div>
                <div class="mb-3"><label class="form-label" for="id_nivel_acceso_mod">Permisos</label>
                    <select class="form-select" id="id_nivel_acceso_mod" name="id_nivel_acceso_mod">
                        <option id="id_nivel_acceso_mod" name="id_nivel_acceso_mod" value="2" selected>Trabajador</option>
                        <option id="id_nivel_acceso_mod" name="id_nivel_acceso_mod" value="1">Administrador</option>
                    </select>
                </div>
                <div class="mb-3">
                    <input class="btn btn-primary" method="post" type="submit" style="background: rgb(253,114,13);" id="modificar_u" name="modificar_u" value="Modificar">
                </div>
            </form>
        </div>
    </section>
    <div class="text-center d-flex flex-column align-items-center align-items-xl-center">
        <form action="../verUsuarios/index.php">
            <button class="btn btn-primary" type="submit" style="background: rgb(253,114,13);border-color: rgba(255,255,255,255);border-radius: 27px;width: 225px;margin: 5px;">Volver a lista</button>
        </form>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>