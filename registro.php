<?php
include("db.php");


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
    if (strlen($_POST['username']) >= 1 && strlen($_POST['nombres']) >= 1 && strlen($_POST['password']) >= 1){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $nombres = trim($_POST['nombres']);
        $id_nivel_accesso = trim($_POST['id_nivel_accesso']);
        if ($username == $user_validation){
            header ("location:/Usuarios/agregarUsuarios/index.php?error=Ya hay un usuario con este nombre.");
        } else {
            header ("location:/Usuarios/agregarUsuarios/index.php");
            $consulta = "INSERT INTO cat_usuarios(username, password, nombres, id_nivel_acceso, estatus) 
                VALUES ('$username','$password','$nombres','$id_nivel_accesso','visible')";
            $resultado = mysqli_query($conex,$consulta);
        }
        if ($resultado){
            header ("location:/Usuarios/verUsuarios");
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
    if (strlen($_POST['username_mod']) >= 1 && strlen($_POST['nombres_mod']) >= 1 && strlen($_POST['password_mod']) >= 1 ){
        $id = trim($_POST['id_mod']);
        $username = trim($_POST['username_mod']);
        $nombres = trim($_POST['nombres_mod']);
        $password = trim($_POST['password_mod']);
        $id_nivel_acceso = trim($_POST['id_nivel_acceso_mod']);

        $consulta_mod = "UPDATE cat_usuarios
            SET username = '$username', nombres = '$nombres',
            password = '$password', id_nivel_acceso = '$id_nivel_acceso'
            WHERE id = '$id'"
        ;
        $resultado_mod = mysqli_query($conex,$consulta_mod);
        if ($resultado_mod){
            header ("location:/Usuarios/verUsuarios");
        } else {
            header ("location:/Usuarios/modificarUsuarios/index.php?error=Hubo un error al modificar usuario.");
        }
    } else {
        header ("location:/Usuarios/modificarUsuarios/index.php?error=Llene todos los campos por favor.");
    }
    memory_free_result($resultado_mod);
    mysqli_close($conex);
};



/*
---------------------------------------------------------------------------------------------------------------
    Eliminar usuarios
---------------------------------------------------------------------------------------------------------------
*/

if (isset($_POST['eliminar_u'])){

    $id = $_POST['eliminar_u'];
    $consulta = "UPDATE cat_usuarios SET estatus='invisible' WHERE id = '$id'";        
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
        $consulta = "INSERT INTO cat_herramientas(cod_barra,tipo_h, desc_h, estado, estatus) 
            VALUES ('$cod_barra','$tipo_h','$desc_h', 'Disponible', 'visible')";
        $resultado = mysqli_query($conex,$consulta);
        if ($resultado){

            $fecha_uh = date("y/m/d H:i:s");

            $inser = "INSERT INTO movimientos_herramientas(id_usuario, id_herramienta, id_acciones_h, fecha_uh)
                VALUES ('1','$id','3', '$fecha_uh');";
            $resultado = mysqli_query($conex,$inser);
            

            header ("location:herramientas/estadoHerramientas");
        } else {
            header ("location:/herramientas/agregarHerramientas/index.php?error=Hubo un error al registrar la Herramienta.");
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
    $update = "UPDATE cat_herramientas SET estatus = 'invisible'  WHERE id = '$id';";
    $resultado = mysqli_query($conex,$update);
        
    if ($resultado){

        $fecha_uh = date("y/m/d H:i:s");

        $inser = "INSERT INTO movimientos_herramientas(id_usuario, id_herramienta, id_acciones_h, fecha_uh)
            VALUES ('1','$id','4', '$fecha_uh');";
        $resultado = mysqli_query($conex,$inser);
        

        header ("location:herramientas/estadoHerramientas");
    } else {
        header ("location:/herramientas/estadoHerramientas/index.php?error=Error al eliminar la herramienta.");
    }

    memory_free_result($resultado);
    mysqli_close($conex);
};



/*
---------------------------------------------------------------------------------------------------------------
    Prestar Herramienta
---------------------------------------------------------------------------------------------------------------
*/

if (isset($_POST['usar_h'])){
    
    if (strlen($_POST['username_h']) >= 1 && strlen($_POST['cod_barra']) >= 1){
        $username_h = $_POST['username_h'];
        $cod_barra = $_POST['cod_barra'];
        
        $consulta_h = "SELECT * FROM cat_herramientas WHERE cod_barra = '$cod_barra';";
        $resultado = mysqli_query($conex,$consulta_h);
        $mostrar_h = mysqli_fetch_array($resultado);

        $id_h = $mostrar_h['id'];

        $consulta = "SELECT * FROM cat_usuarios WHERE username = '$username_h';";
        $resultado = mysqli_query($conex,$consulta);
        $mostrar_u = mysqli_fetch_array($resultado);
    
        $id_u = $mostrar_u['id'];
        $fecha_uh = date("y/m/d H:i:s");

        $inser = "INSERT INTO movimientos_herramientas(id_usuario, id_herramienta, id_acciones_h, fecha_uh)
            VALUES ('$id_u','$id_h','1', '$fecha_uh');";
        $resultado = mysqli_query($conex,$inser);
        if ($resultado){

            $update = "UPDATE cat_herramientas SET estado = 'Prestada'  WHERE cod_barra = '$cod_barra';";
            $resultado = mysqli_query($conex,$update);

            header ("location:herramientas/estadoHerramientas");
        } else {
            header ("location:/herramientas/estadoHerramientas/index.php?error=Error al solicitar la Herramienta.");
        }

    } else {
        header ("location:/herramientas/estadoHerramientas/index.php?error=Error, Complete todos los campos por favor.");
    }
    memory_free_result($resultado);
    mysqli_close($conex);
};



/*
---------------------------------------------------------------------------------------------------------------
    Regresar Herramienta
---------------------------------------------------------------------------------------------------------------
*/

if (isset($_POST['regresar_h'])){
    
    if (strlen($_POST['cod_barra']) >= 1){
        $cod_barra = $_POST['cod_barra'];
        
        $consulta_h = "SELECT * FROM cat_herramientas WHERE cod_barra = '$cod_barra';";
        $resultado = mysqli_query($conex,$consulta_h);
        $mostrar_h = mysqli_fetch_array($resultado);

        $id_h = $mostrar_h['id'];

        $fecha_uh = date("y/m/d H:i:s");

        $inser = "INSERT INTO movimientos_herramientas(id_usuario, id_herramienta, id_acciones_h, fecha_uh)
            VALUES ('1','$id_h','2', '$fecha_uh');";
        $resultado = mysqli_query($conex,$inser);
        if ($resultado){

            $update = "UPDATE cat_herramientas SET estado = 'Disponible'  WHERE cod_barra = '$cod_barra';";
            $resultado = mysqli_query($conex,$update);

            header ("location:herramientas/estadoHerramientas");
        } else {
            header ("location:/herramientas/estadoHerramientas/index.php?error=Error al solicitar la Herramienta.");
        }

    } else {
        header ("location:/herramientas/estadoHerramientas/index.php?error=Error, Complete todos los campos por favor.");
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
    if (strlen($_POST['cod_barra']) >= 1 && strlen($_POST['desc_r']) >= 1 && strlen($_POST['precio_r']) >= 1 && strlen($_POST['existencias_r']) >= 1){

        $cod_barra_rn = trim($_POST['cod_barra']);
        $desc_rn = trim($_POST['desc_r']);
        $precio_rn = trim($_POST['precio_r']);
        $cantidad_rn = trim($_POST['existencias_r']);
        $cantidad_rn = (int)$cantidad_rn;

        $consulta = "SELECT * FROM cat_refacciones WHERE cod_barra = '$cod_barra_rn';";
        $resultado = mysqli_query($conex,$consulta);
        $mostrar_r = mysqli_fetch_array($resultado);

        $id_r = $mostrar_r['id'];
        $cod_barra_r = $mostrar_r['cod_barra'];
        $existencias_r = $mostrar_r['existencias_r'];
        
        $con_f = ($existencias_r + $cantidad_rn);
        
        if($cod_barra = $cod_barra_r){

            $update = "UPDATE cat_refacciones SET existencias_r = '$con_f', estatus = 'visible'  WHERE cod_barra = '$cod_barra_rn';";
            $resultado = mysqli_query($conex,$update);

            if ($resultado){
    
                $fecha_ur = date("y/m/d H:i:s");

                $inser = "INSERT INTO movimientos_refaccion(id_usuario, id_refaccion, id_accion_refaccion, fecha_ur)
                VALUES (1,'$id_r', 1, '$fecha_ur');";
                $resultado = mysqli_query($conex,$inser);

                header ("location:Refacciones/verRefacciones");
            } else {
                header ("location:/Refacciones/agregarRefacciones/index.php?error=Error al añadir la Refaccion.");
            }

        } else {

            $consulta = "INSERT INTO cat_refacciones(cod_barra, desc_r, precio_r, existencias_r,estatus) 
                VALUES ('$cod_barra_rn', '$desc_rn','$precio_rn','$cantidad_rn','visible')";
            $resultado = mysqli_query($conex,$consulta);

            if ($resultado){

                $inser = "INSERT INTO movimientos_refaccion(id_usuario, id_refaccion, id_accion_refaccion, fecha_ur)
                VALUES ('1','$id_r','1', '$fecha_ur');";
                $resultado = mysqli_query($conex,$inser);

                header ("location:Refacciones/verRefacciones");
            } else {
                header ("location:/Refacciones/agregarRefacciones/index.php?error=Error al añadir la Refaccion.");
            }
            
        }

    } else {
        header ("location:/Refacciones/agregarRefacciones/index.php?error=Error, Complete los campos por favor.");
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

    $id = $_POST['eliminar_r'];
    $update = "UPDATE cat_refacciones SET estatus = 'invisible'  WHERE id = '$id';";
    $resultado = mysqli_query($conex,$update);
        
    if ($resultado){
        $fecha_ur = date("y/m/d H:i:s");

        $inser = "INSERT INTO movimientos_refaccion(id_usuario, id_refaccion, id_accion_refaccion, fecha_ur)
            VALUES ('1','$id','3', '$fecha_ur');";
        $resultado = mysqli_query($conex,$inser);
        

        header ("location:Refacciones/verRefacciones");
    } else {
        header ("location:/Refacciones/verRefacciones/index.php?error=Error al eliminar la Refaccion.");
    }
    memory_free_result($resultado);
    mysqli_close($conex);
};



/*
---------------------------------------------------------------------------------------------------------------
    Usar Refaccion
---------------------------------------------------------------------------------------------------------------
*/

if (isset($_POST['usar_r'])){
    
    if (strlen($_POST['cod_barra']) >= 1 && strlen($_POST['cantidad']) >= 1){
        $username_r = $_POST['username_r'];
        $cod_barra = $_POST['cod_barra'];
        $cantidad = $_POST['cantidad'];

        $cantidad = (int)$cantidad;
        
        $consulta = "SELECT id, existencias_r FROM cat_refacciones WHERE cod_barra = '$cod_barra' AND estatus = 'visible' ;";
        $resultado = mysqli_query($conex,$consulta);

        $fila = mysqli_num_rows ($resultado);

        if ($fila == 1){
            $mostrar_r = mysqli_fetch_array($resultado);
            
            $id_r = $mostrar_r['id'];
            $existencias_r = $mostrar_r['existencias_r'];
            
            if ($existencias_r < $cantidad) {
                header ("location:/Refacciones/usarRefacciones/index.php?error=Error, no hay suficientes existencias.");
            } else {

                $con_f = ($existencias_r - $cantidad);

                if($con_f >= 0){
                
                    $update = "UPDATE cat_refacciones SET existencias_r = '$con_f'  WHERE cod_barra = '$cod_barra';";
                    $resultado = mysqli_query($conex,$update);
    
                    if ($resultado){
    
                        $consulta = "SELECT * FROM cat_usuarios WHERE username = '$username_r';";
                        $resultado = mysqli_query($conex,$consulta);
                        $mostrar_u = mysqli_fetch_array($resultado);
            
                        $id_u = $mostrar_u['id'];
                        $fecha_ur = date("y/m/d H:i:s");
    
                        $inser = "INSERT INTO movimientos_refaccion(id_usuario, id_refaccion, id_accion_refaccion, fecha_ur)
                        VALUES ('$id_u','$id_r','2', '$fecha_ur');";
                        $resultado = mysqli_query($conex,$inser);
    
                        header ("location:Refacciones/verRefacciones");
                    } else {
                        header ("location:/Refacciones/usarRefacciones/index.php?error=Error al solicitar la Refaccion.");
                    }
    
                }
            }
            
            
        }else{
            header ("location:/Refacciones/usarRefacciones/index.php?error=Error, Refaccion no encontrada.");
        }
    } else {
        header ("location:/Refacciones/usarRefacciones/index.php?error=Error, Complete todos los campos por favor.");
    }
    memory_free_result($resultado);
    mysqli_close($conex);
};



?>