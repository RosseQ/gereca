<?php
include("db.php");

/*
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
Validar Login De Usuario
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
*/

if (isset($_POST['entrar'])){
    if (strlen($_POST['username']) >= 1 && strlen($_POST['password']) >= 1 ){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $consulta = "SELECT * FROM cat_usuarios WHERE username ='$username' AND password = '$password'";
        $resultado = mysqli_query($conex,$consulta);

        $fila = mysqli_num_rows ($resultado);

        if ($fila == 1){
            header ("location:/Menu/index.html");
        } else {
            header ("location:/index.html");
            /*
            ?>
            <h3> Error al autenticar </h3>
            <?php
            */
        }
    } else {
        header ("location:/index.html");
        /*
        ?>
        <h3> Complete los campos por favor </h3>
        <?php
        */
    }
    memory_free_result($resultado);
    mysqli_close($conex);
}




/*
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
Agregar Usuario
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
*/

if (isset($_POST['enviar_u'])){
    if (strlen($_POST['username']) >= 1 && strlen($_POST['nombres']) >= 1 && strlen($_POST['password']) >= 1 && strlen($_POST['id_nivel_accesso']) >= 1 ){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $nombres = trim($_POST['nombres']);
        $id_nivel_accesso = trim($_POST['id_nivel_accesso']);
        $consulta = "INSERT INTO cat_usuarios(username, password, nombres, id_nivel_acceso) 
            VALUES ('$username','$password','$nombres','$id_nivel_accesso')";
        $resultado = mysqli_query($conex,$consulta);
        if ($resultado){
            header ("location:/Menu/index.html");
        } else {
            ?>
            <h3> Hay un error al registral al usuario </h3>
            <?php
        }
    } else {
        ?>
        <h3> Complete los campos por favor </h3>
        <?php
    }
    memory_free_result($resultado);
    mysqli_close($conex);
}



/*
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
Agregar Herramienta
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
*/


if (isset($_POST['enviar_h'])){
    if (strlen($_POST['cod_barra']) >= 1 && strlen($_POST['tipo_h']) >= 1 && strlen($_POST['desc_h']) >= 1){
        $cod_barra = trim($_POST['cod_barra']);
        $tipo_h = trim($_POST['tipo_h']);
        $desc_h = trim($_POST['desc_h']);
        $consulta = "INSERT INTO cat_herramientas(cod_barra,tipo_h, desc_h) 
            VALUES ('$cod_barra','$tipo_h','$desc_h')";
        $resultado = mysqli_query($conex,$consulta);
        if ($resultado){
            header ("location:/Menu/index.html");
        } else {
            ?>
            <h3> Hay un error al agregar la Herramienta </h3>
            <?php
        }
    } else {
        ?>
        <h3> Complete los campos por favor </h3>
        <?php
    }
    memory_free_result($resultado);
    mysqli_close($conex);
}



/*
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
Agregar Refaccion
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
*/

if (isset($_POST['enviar_r'])){
    if (strlen($_POST['desc_r']) >= 1 && strlen($_POST['precio_r']) >= 1 && strlen($_POST['existencias_r']) >= 1){
        $desc_r = trim($_POST['desc_r']);
        $precio_r = trim($_POST['precio_r']);
        $existencias_r = trim($_POST['existencias_r']);
        $consulta = "INSERT INTO cat_refacciones(desc_r, precio_r, existencias_r) 
            VALUES ('$desc_r','$precio_r','$existencias_r')";
        $resultado = mysqli_query($conex,$consulta);
        if ($resultado){
            header ("location:/Menu/index.html");
        } else {
            ?>
            <h3> Hay un error al agregar la Refaccion </h3>
            <?php
        }
    } else {
        ?>
        <h3> Complete los campos por favor </h3>
        <?php
    }
    memory_free_result($resultado);
    mysqli_close($conex);
}



/*
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
Eliminar usuarios
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
*/



/*
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
if (isset($_POST['eliminar_u'])){
    if (strlen($_POST['username']) >= 1 && strlen($_POST['nombres']) >= 1 && strlen($_POST['password']) >= 1 && strlen($_POST['id_nivel_accesso']) >= 1 ){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $nombres = trim($_POST['nombres']);
        $id_nivel_accesso = trim($_POST['id_nivel_accesso']);
        $consulta = "INSERT INTO cat_usuarios(username, password, nombres, id_nivel_acceso) 
            VALUES ('$username','$password','$nombres','$id_nivel_accesso')";
        $resultado = mysqli_query($conex,$consulta);
        if ($resultado){
            header ("location:/Menu/index.html");
        } else {
            ?>
            <h3> Hay un error al registral al usuario </h3>
            <?php
        }
    } else {
        ?>
        <h3> Complete los campos por favor </h3>
        <?php
    }
    memory_free_result($resultado);
    mysqli_close($conex);
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
*/





/*

<?php 
echo "<script> {window.alert ('Publicado correctamente'); location.href = 'aa.html'} </ script>";
?>

*/
?>