<?php

require "db.php";

session_start();

if ($_POST){

    if (strlen($_POST['username']) >= 1 && strlen($_POST['password']) >= 1 ){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $consulta = "SELECT * FROM cat_usuarios WHERE username ='$username' AND password = '$password'";
        $resultado = $conex->query($consulta);
		$num = $resultado->num_rows;
        $mostrar = mysqli_fetch_array($resultado);

        $id_u = $mostrar['id'];

        if ($num>0){
            $row = $resultado->fetch_assoc();
			$password_bd = $row['password'];

            if($password_bd == $pass_c){
				
				$_SESSION['id'] = $mostrar['id'];
                $_SESSION['username'] = $mostrar['username'];
				
                $consulta = "INSERT INTO bitacora_acceso(id_usuario, fecha_ingreso) 
                    VALUES ('$username','$password','$nombres','$id_nivel_accesso')";
                $resultado = mysqli_query($conex,$consulta);
            
				header ("location:Menu/");
				
			} else {
                header ("location:index.php?error=El usuario o contraseña no validos.");
            }
        } else {
            header ("location:index.php?error=El usuario o contraseña no validos.");
        }
    }
}


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
        <div class="container"><a class="navbar-brand logo" >CAMINOSA | Mi Taller</a>
            <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1">
                <span class="visually-hidden">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto"></ul>
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
    </div>
    <section class="position-relative py-4 py-xl-5">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4" style="background: rgba(13,110,253,0);"><img src="assets/img/logo-header.png"></div>
                            <?php if(isset($_GET['error'])){ ?>
                            <div id="error" style="width: 100%; background: lightsalmon; text-align: center; border-radius: 2px; padding: 4px; ">
                                <label style="color: whitesmoke;"><?php echo $_GET['error']; ?></label>
                                <span class="close" style="font-size: 24px; color: whitesmoke; margin: auto;" onclick="getElementById('error').style.display = 'none' ">&times;</span>
                            </div>
                            <?php } ?>
                            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="text-center">
                                <div class="mb-3">
                                    <label class="form-label" for="username" required>Usuario:</label>
                                    <input class="form-control" type="text" id="username" name="username"
                                        maxlength="10" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122))">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="password" required>Contraseña:<br></label>
                                    <input class="form-control" type="password" id="password" name="password" 
                                        maxlength="8" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                                </div>
                                <div class="mb-3">
                                    <input class="btn btn-primary d-block w-100" type="submit" id="entrar" name="entrar" value="Entrar" onsubmit="return ValidarVacio()">
                                </div>
                                <p class="text-muted"></p>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>
</body>

</html>