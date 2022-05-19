<?php
include("db.php");


if (isset($_POST['enviar'])){
    if (strlen($_POST['username']) >= 1 && strlen($_POST['nombres']) >= 1 && strlen($_POST['id_nivel_accesso']) >= 1 ){
        $username = trim($_POST['username']);
        $password = 1234;
        $nombres = trim($_POST['nombres']);
        $id_nivel_accesso = trim($_POST['id_nivel_accesso']);
        $consulta = "INSERT INTO cat_usuarios(username, password, nombres, id_nivel_acceso) 
            VALUES ('$username','$password','$nombres','$id_nivel_accesso')";
        $resultado = mysqli_query($conex,$consulta);
        if ($resultado){
            ?>
            <h3> Se registro correctamente el usuario </h3>
            <?php
        }
        else {
            ?>
            <h3> hay un error al registral al usuario </h3>
            <?php
        }
    }
    else {
        ?>
        <h3> Complete los campos por favor </h3>
        <?php
    }
}
?>