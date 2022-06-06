<?php
include("db.php");


/*
---------------------------------------------------------------------------------------------------------------
    Validar Login De Usuario
---------------------------------------------------------------------------------------------------------------
*/

if (isset($_POST['entrar'])){
    if (strlen($_POST['username']) >= 1 && strlen($_POST['password']) >= 1 ){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $consulta = "SELECT * FROM cat_usuarios WHERE username ='$username' AND password = '$password'";
        $resultado = mysqli_query($conex,$consulta);

        $fila = mysqli_num_rows ($resultado);

        if ($fila == 1){
            header ("location:menu/index.html");
        } else {
            header ("location:index.php?error=El usuario o contraseña no validos.");
        }
    } else {
        header ("location:index.php?error=El usuario o contraseña no validos.");
    }
    memory_free_result($resultado);
    mysqli_close($conex);
};



/*
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            U  S  U  A  R  I  O  S
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
*/

/*
---------------------------------------------------------------------------------------------------------------
    Agregar Usuario
---------------------------------------------------------------------------------------------------------------
*/

if (isset($_POST['enviar_u'])){
    if (strlen($_POST['username']) >= 1 && strlen($_POST['nombres']) >= 1 && strlen($_POST['password']) >= 1 && strlen($_POST['id_nivel_accesso']) >= 1 ){
        $username = trim($_POST['username']);
        // $user_db = "SELECT username FROM cat_usuarios WHERE username LIKE '$username'";
        // $user_case = strcasecmp($username,$user_validation);
        // $user_validation = mysqli_query($conex,$user_db);
        // memory_free_result($user_validation);
        // mysqli_close($conex;)
        $password = trim($_POST['password']);
        $nombres = trim($_POST['nombres']);
        $id_nivel_accesso = trim($_POST['id_nivel_accesso']);
        if (($username == $user_validation) && ($user_case == 0)){
            header ("location:/Usuarios/agregarUsuarios/index.php?error=Ya hay un usuario con este nombre.");
        } else {
            header ("location:/Usuarios/agregarUsuarios/index.php");
            $consulta = "INSERT INTO cat_usuarios(username, password, nombres, id_nivel_acceso) 
                VALUES ('$username','$password','$nombres','$id_nivel_accesso')";
            $resultado = mysqli_query($conex,$consulta);
        }
        if ($resultado){
            header ("location:/Usuarios/verUsuarios/index.php");
        } else {
            header ("location:/Usuarios/agregarUsuarios/index.php?error=Hubo un error al registrar usuario.");
        }
    } else {
        header ("location:/Usuarios/agregarUsuarios/index.php?error=Llene todos los campos por favor.");
    }
    // memory_free_result($resultado);
    memory_free_result($resultado);
    mysqli_close($conex);
};

/*
---------------------------------------------------------------------------------------------------------------
    Modificar Usuario
---------------------------------------------------------------------------------------------------------------
*/

if (isset($_POST['modificar_u'])){

    $id = $_POST['modificar_u'];

    if (strlen($_POST['username']) >= 1 && strlen($_POST['nombres']) >= 1 && strlen($_POST['password']) >= 1 && strlen($_POST['id_nivel_accesso']) >= 1 ){
        $username = trim($_POST['username']);
        $nombres = trim($_POST['nombres']);
        $password = trim($_POST['password']);
        $id_nivel_accesso = trim($_POST['id_nivel_accesso']);
        if (($username == $user_validation) && ($user_case == 0)){
            header ("location:/Usuarios/modificarUsuarios/index.php?error=Ya hay un usuario con este nombre.");
        } else {
            header ("location:/Usuarios/modificarUsuarios/index.php");
            $consulta = "UPDATE cat_usuarios
            SET username = '$username', nombres = '$nombres', password = '$password', id_nivel_accesso = $id_nivel_accesso
            WHERE id = '$id'";
            $resultado = mysqli_query($conex,$consulta);
        }
        if ($resultado){
            header ("location:/Usuarios/verUsuarios/index.php");
        } else {
            header ("location:/Usuarios/modificarUsuarios/index.php?error=Hubo un error al registrar usuario.");
        }
    } else {
        header ("location:/Usuarios/modificarUsuarios/index.php?error=Llene todos los campos por favor.");
    }
    memory_free_result($resultado);
    mysqli_close($conex);
};


/*
---------------------------------------------------------------------------------------------------------------
    Eliminar usuarios
---------------------------------------------------------------------------------------------------------------
*/

if (isset($_POST['eliminar_u'])){

    $username = $_POST['eliminar_u'];
    $consulta = "DELETE FROM cat_usuarios WHERE id = '$username'";        
    $resultado = mysqli_query($conex,$consulta);
        
    if ($resultado){
        header ("location:Usuarios/verUsuarios");
    } else {
        header ("location:/Usuarios/verUsuarios/index.php?error=Error al eliminar usuario.");
    }
    memory_free_result($resultado);
    mysqli_close($conex);
};

/*
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            H  E  R  R  A  M  I  N  E  T  A  S
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
*/

/*
---------------------------------------------------------------------------------------------------------------
    Agregar Herramienta
---------------------------------------------------------------------------------------------------------------
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
            header ("location:/herramientas/agregarHerramientas/index.php?error=Llene todos los campos por favor.");
        }
    } else {
        header ("location:/herramientas/agregarHerramientas/index.php?error=Llene todos los campos por favor.");
    }
    memory_free_result($resultado);
    mysqli_close($conex);
};

/*
---------------------------------------------------------------------------------------------------------------
    Eliminar  Herramienta
---------------------------------------------------------------------------------------------------------------
*/

if (isset($_POST['eliminar_h'])){

    $id = $_POST['eliminar_h'];
    $consulta = "DELETE FROM cat_herramientas WHERE id = '$id'";        
    $resultado = mysqli_query($conex,$consulta);
        
    if ($resultado){
        header ("location:herramientas/estadoHerramientas");
    } else {
        header ("location:/herramientas/estadoHerramientas/index.php?error=Error al eliminar la herramienta.");
    }
    memory_free_result($resultado);
    mysqli_close($conex);
};


/*
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            R  E  F  A  C  C  I  O  N  E  S
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
*/

/*
---------------------------------------------------------------------------------------------------------------
    Agregar Refaccion
---------------------------------------------------------------------------------------------------------------
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
};


/*
---------------------------------------------------------------------------------------------------------------
    Eliminar Refaccion
---------------------------------------------------------------------------------------------------------------
*/

if (isset($_POST['eliminar_r'])){

    $desc_r = $_POST['eliminar_r'];
    $consulta = "DELETE FROM cat_refacciones WHERE id = '$desc_r'";        
    $resultado = mysqli_query($conex,$consulta);
        
    if ($resultado){
        header ("location:Refacciones/verRefacciones");
    } else {
        ?>
        <h3> Hay un error al eliminar la Refaccion </h3>
        <?php
    }
    memory_free_result($resultado);
    mysqli_close($conex);
};



?>