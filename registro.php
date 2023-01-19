<?php
include("db.php");

/*
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            V E H I C U L O S
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
*/

/*
---------------------------------------------------------------------------------------------------------------
    Agregar Vehiculo
---------------------------------------------------------------------------------------------------------------
*/
if (isset($_POST['agregar_v'])){
    if (strlen($_POST['economico_v']) >= 1 && strlen($_POST['tipounidad_v']) >= 1 && strlen($_POST['modelo_v']) >= 1 && strlen($_POST['placas_v']) >= 1 && strlen($_POST['carga_util_v']) >= 1
    // && strlen($_POST['id_costo_v']) >= 1){
    && strlen($_POST['precio_dia_v']) >= 1 && strlen($_POST['precio_semana_v']) >= 1 && strlen($_POST['precio_mes_v']) >= 1){
        $economico_v = trim($_POST['economico_v']);
        $tipounidad_v = trim($_POST['tipounidad_v']);
        $modelo_v = trim($_POST['modelo_v']);
        $clase_vehiculo = trim($_POST['clase_vehiculo']);
        $tipo_vehiculo = trim($_POST['tipo_vehiculo']);
        $adaptacion_v = trim($_POST['adaptacion_v']);
        $placas_v = trim($_POST['placas_v']);
        $noserie_v = trim($_POST['noserie_v']);
        $carga_util_v = trim($_POST['carga_util_v']);
        $precio_dia_v = trim($_POST['precio_dia_v']);
        $precio_semana_v = trim($_POST['precio_semana_v']);
        $precio_mes_v = trim($_POST['precio_mes_v']);

        $checkdata_q = "SELECT * from vehiculos WHERE economico = '$economico_v' OR placas = '$placas_v' OR numero_serie = '$noserie_v';";
        $resultado = mysqli_query($conex,$checkdata_q);
        if($resultado) {
            if (mysqli_num_rows($resultado) > 0) {
                header ("Location:/Vehiculos/agregarVehiculos/index.php?error=Ingreso un dato existente en la base de datos.");
                exit;
            } else {
                $consulta = "INSERT INTO Costos (precio_dia, precio_sem, precio_mes) VALUES ('$precio_dia_v', '$precio_semana_v', '$precio_mes_v');
                SELECT id_Costo INTO @costov from Costos order by id_Costo DESC limit 1;
                INSERT INTO Vehiculos (tipo_unidad, modelo, id_Cat_Clase_Vehiculo, id_Cat_Tipo, id_Cat_Adaptacion, placas, economico, numero_serie, carga_uti, id_Costo, id_VEstatus, id_DEstatus)
                VALUES ('$tipounidad_v','$modelo_v', '$clase_vehiculo', '$tipo_vehiculo', '$adaptacion_v', '$placas_v', '$economico_v', '$noserie_v', '$carga_util_v', @costov, 1, 1);
                ";
                $resultado = mysqli_multi_query($conex,$consulta);
                if ($resultado){
                    header ("Location:/Vehiculos/consultaVehiculos/index.php");
                    exit;
                } else {
                    header ("Location:/Vehiculos/agregarVehiculos/index.php?error=Hubo un error al registrar el vehiculo nuevo.");
                    exit;
                }
            }
        } else {
            header ("Location:/Vehiculos/agregarVehiculos/index.php?error=Hubo un error al registrar el vehiculo nuevo.");
            exit;
        }
    } else {
        header ("Location:/Vehiculos/agregarVehiculos/index.php?error=Llene todos los campos por favor.");
        exit;
    }
    memory_free_result($resultado);
    mysqli_close($conex);
    
};
/*
---------------------------------------------------------------------------------------------------------------
    Disponibilidad de Vehiculo
---------------------------------------------------------------------------------------------------------------
*/

if (isset($_POST['disponible_v'])){

    $iid = $_POST['disponible_v'];
    $disp_check = "SELECT * from Vehiculos WHERE Vehiculos.id_Vehiculo = '$iid';";
    $resultado = mysqli_query($conex,$disp_check);
    $disp_grab = mysqli_fetch_array($resultado);
    $econ_value = $disp_grab['economico'];
    $tipo_value = $disp_grab['tipo_unidad'];
    $disp_value = $disp_grab['id_VEstatus'];
    if ($disp_value > 1){
        $disp_update = "UPDATE Vehiculos SET id_VEstatus = 1 WHERE Vehiculos.id_Vehiculo = '$iid';";
        $resultado = mysqli_query($conex,$disp_update);
        if ($resultado){
            header ("location:/Vehiculos/consultaVehiculos/index.php?error=El vehiculo " . $tipo_value . " (".$econ_value.") " . " esta disponible otra vez.");
        } else {
            header ("location:/Vehiculos/consultaVehiculos/index.php?error=Hubo un error al restaurar el vehiculo.");
        }
    } else {
        header ("location:/Vehiculos/consultaVehiculos/index.php?error=El vehiculo " . $tipo_value . " (".$econ_value.") " . "sigue disponible.");
    }
    memory_free_result($resultado);
    mysqli_close($conex);
};

/*
---------------------------------------------------------------------------------------------------------------
    Eliminar  Vehiculo
---------------------------------------------------------------------------------------------------------------
*/

if (isset($_POST['eliminar_v'])){

    $iid = $_POST['eliminar_v'];
    $delete = "UPDATE Vehiculos SET id_DEstatus = 2 WHERE Vehiculos.id_Vehiculo = '$iid';";
    $resultado = mysqli_query($conex,$delete);
        
    if ($resultado){
        header ("location:/Vehiculos/consultaVehiculos/index.php?error=Se borro " . $iid . ".");
    } else {
        header ("location:/Vehiculos/consultaVehiculos/index.php?error=Hubo un error al eliminar el vehiculo.");
    }

    memory_free_result($resultado);
    mysqli_close($conex);
};

/*
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            M A N T E N I M I E N T O
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
*/

/*
---------------------------------------------------------------------------------------------------------------
    Agregar Mantenimiento
---------------------------------------------------------------------------------------------------------------
*/
if (isset($_POST['detmant_insert'])){
    if (strlen($_POST['costo_det']) >= 1 && strlen($_POST['dias_mant']) >= 1){
        $idVehiculo_det = trim($_POST['idVehiculo_det']);
        $mantenimiento_det = trim($_POST['mantenimiento_det']);
        $costo_det = trim($_POST['costo_det']);
        $dias_mant = trim($_POST['dias_mant']);
        $fecha_hecho = trim($_POST['fecha_hecho']);
        if ($dias_mant > 0){
            $datecheck = "select * from detalle_mantenimiento
            where fecha_hecho BETWEEN '$fecha_hecho' and date_add('$fecha_hecho', INTERVAL '$dias_mant' DAY)
            AND fecha_regreso BETWEEN '$fecha_hecho' and date_add('$fecha_hecho', INTERVAL '$dias_mant' DAY)
            AND id_Vehiculo = '$idVehiculo_det';
            ";
            $resultado = mysqli_query($conex,$datecheck);
            $dateexist1 = mysqli_num_rows($resultado);
            $datecheck2 = "select * from renta INNER JOIN detalle_renta on renta.id_detalleRenta = detalle_renta.id_detalleRenta
            where fecha_hecho BETWEEN '$fecha_hecho' and date_add('$fecha_hecho', INTERVAL '$caldias' DAY)
            AND fecha_regreso BETWEEN '$fecha_hecho' and date_add('$fecha_hecho', INTERVAL '$caldias' DAY)
            AND id_Vehiculo = '$idVehiculo_i';
            ";
            $resultado = mysqli_query($conex,$datecheck2);
            $dateexist2 = mysqli_num_rows($resultado);
            if ($dateexist1 > 0 || $dateexist2 > 0) {
                header ("Location:/Mantenimientos/nuevoMantenimiento/index.php?error=El vehiculo seleccionado no esta disponible durante la fecha seleccionada.");
                exit;
            } elseif ($dateexist1 == 0 || $dateexist2 == 0) {
                $consulta = "INSERT INTO detalle_mantenimiento (id_Mantenimiento, id_Vehiculo, costo, fecha_registro, fecha_hecho, fecha_regreso)
                VALUES ('$mantenimiento_det', '$idVehiculo_det', '$costo_det', CURDATE(), '$fecha_hecho', date_add('$fecha_hecho', INTERVAL '$dias_mant' DAY));
                UPDATE Vehiculos SET id_VEstatus = 3 WHERE id_Vehiculo = '$idVehiculo_det';
                ";
                $resultado = mysqli_multi_query($conex,$consulta);
                if ($resultado){
                    header ("Location:/Mantenimientos/verMantenimientos/index.php");
                    exit;
                } else {
                    header ("Location:/Mantenimientos/nuevoMantenimiento/index.php?error=Hubo un error al registrar el nuevo mantenimiento.");
                    exit;
                }
            } else {
                header ("Location:/Mantenimientos/nuevoMantenimiento/index.php?error=Hubo un error al registrar el nuevo mantenimiento.");
                exit;
            }
        } else {
            header ("Location:/Mantenimientos/nuevoMantenimiento/index.php?error=El minimo de dias en mantenimiento es 1 dia.");
            exit;
        }
    } else {
        header ("Location:/Mantenimientos/nuevoMantenimiento/index.php?error=Llene todos los campos por favor.");
        exit;
    }
    memory_free_result($resultado);
    mysqli_close($conex);
    
};

/*
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            R E N T A S
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
*/

/*
---------------------------------------------------------------------------------------------------------------
    Agregar Renta
---------------------------------------------------------------------------------------------------------------
*/

if (isset($_POST['nuevarenta'])){
    if (strlen($_POST['dias_i']) >= 1){
        $idCliente_i = trim($_POST['idCliente_i']);
        $idVehiculo_i = trim($_POST['idVehiculo_i']);
        $tipoRenta_i = trim($_POST['tipoRenta_i']);
        $dias_i = trim($_POST['dias_i']);
        $fecha_hecho = trim($_POST['fecha_hecho']);

        $pricecheck = "select * from costos
        INNER JOIN vehiculos on costos.id_costo = vehiculos.economico
        WHERE costos.id_costo = vehiculos.economico
        AND Vehiculos.id_Vehiculo = '$idVehiculo_i'
        limit 1;";
        $resultado = mysqli_query($conex,$pricecheck);
        $pricegrab = mysqli_fetch_array($resultado);
        
        $calcdias = 0;
        $truprice = 0;
        if ($tipoRenta_i == 1){
            $caldias = $dias_i * 1;
            $truprice = $pricegrab['precio_dia'];
        } elseif ($tipoRenta_i == 2) {
            $caldias = $dias_i * 7;
            $truprice = $pricegrab['precio_sem'];
        } elseif ($tipoRenta_i == 3) {
            $caldias = $dias_i * 30;
            $truprice = $pricegrab['precio_mes'];
        }
        // $truprice = floatval($truprice);

        if ($dias_i > 0)
        {
            $datecheck = "select * from renta INNER JOIN detalle_renta on renta.id_detalleRenta = detalle_renta.id_detalleRenta
            where fecha_hecho BETWEEN '$fecha_hecho' and date_add('$fecha_hecho', INTERVAL '$caldias' DAY)
            AND fecha_regreso BETWEEN '$fecha_hecho' and date_add('$fecha_hecho', INTERVAL '$caldias' DAY)
            AND id_Vehiculo = '$idVehiculo_i';
            ";
            $resultado = mysqli_query($conex,$datecheck);
            $dateexist1 = mysqli_num_rows($resultado);
            $datecheck2 = "select * from detalle_mantenimiento
            where fecha_hecho BETWEEN '$fecha_hecho' and date_add('$fecha_hecho', INTERVAL '$caldias' DAY)
            AND fecha_regreso BETWEEN '$fecha_hecho' and date_add('$fecha_hecho', INTERVAL '$caldias' DAY)
            AND id_Vehiculo = '$idVehiculo_i';
            ";
            $resultado = mysqli_query($conex,$datecheck2);
            $dateexist2 = mysqli_num_rows($resultado);
            if ($dateexist1 > 0 || $dateexist2 > 0) {
                header ("Location:/Ingresos/nuevoIngreso/index.php?error=El vehiculo seleccionado no esta disponible durante la fecha seleccionada.");
                exit;
            } elseif ($dateexist1 == 0 || $dateexist2 == 0) {
                $consulta = "INSERT INTO detalle_renta (id_Vehiculo,cantidad) VALUES ('$idVehiculo_i', '$caldias');
        
                SELECT id_detalleRenta INTO @rent_det from detalle_renta order by id_detalleRenta DESC limit 1;
        
                INSERT INTO renta (id_cliente,id_detalleRenta,total,fecha_registro,fecha_hecho,fecha_regreso)
                VALUES ('$idCliente_i', (SELECT @rent_det), ('$truprice' * '$dias_i'),
                CURDATE(), '$fecha_hecho', date_add('$fecha_hecho', INTERVAL '$caldias' DAY));
    
                UPDATE Vehiculos SET id_VEstatus = 2 WHERE Vehiculos.id_Vehiculo = '$idVehiculo_i';
                ";
        
                $resultado = mysqli_multi_query($conex,$consulta);
                if ($resultado){
                    header ("Location:/Ingresos/verIngresos/index.php");
                    exit;
                } else {
                    header ("Location:/Ingresos/nuevoIngreso/index.php?error=Hubo un error al registrar la renta (QUERY).");
                    exit;
                }
            } else {
                header ("Location:/Ingresos/nuevoIngreso/index.php?error=Hubo un error al registrar la renta (PHP).");
                exit;
            }
        } else {
            header ("Location:/Ingresos/nuevoIngreso/index.php?error=No puede rentar por 0 dias.");
            exit;
        }
    } else {
        header ("Location:/Ingresos/nuevoIngreso/index.php?error=Llene todos los campos por favor.");
        exit;
    }
    memory_free_result($resultado);
    mysqli_close($conex);
    
};

/*
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
            C L I E N T E S
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
*/

/*
---------------------------------------------------------------------------------------------------------------
    Agregar Clientes
---------------------------------------------------------------------------------------------------------------
*/
if (isset($_POST['agregar_cli'])){
    if (strlen($_POST['nombre_cli']) >= 1 && strlen($_POST['appat_cli']) >= 1 && strlen($_POST['apmat_cli']) >= 1 && strlen($_POST['tel_cli']) >= 1 && strlen($_POST['email_cli']) >= 1
    && strlen($_POST['dir_cli']) >= 1 && strlen($_POST['rfc_cli']) >= 1 && strlen($_POST['curp_cli']) >= 1 && strlen($_POST['nodoc_cli']) >= 1 && strlen($_POST['ocr_cli']) >= 1){
        $nombre_cli = trim($_POST['nombre_cli']);
        $appat_cli = trim($_POST['appat_cli']);
        $apmat_cli = trim($_POST['apmat_cli']);
        $tel_cli = trim($_POST['tel_cli']);
        $email_cli = trim($_POST['email_cli']);
        $dir_cli = trim($_POST['dir_cli']);
        $rfc_cli = trim($_POST['rfc_cli']);
        $curp_cli = trim($_POST['curp_cli']);
        $nodoc_cli = trim($_POST['nodoc_cli']);
        $ocr_cli = trim($_POST['ocr_cli']);

        $checkdata_q = "SELECT * from Clientes
        WHERE rfc = '$rfc_cli'
        OR curp = '$curp_cli'
        OR num_doc = '$nodoc_cli'
        OR ocr = '$ocr_cli';";
        $resultado = mysqli_query($conex,$checkdata_q);
        if ($resultado){
            if (mysqli_num_rows($resultado) > 0) {
                header ("Location:/Clientes/agregarClientes/index.php?error=Estos datos pertenecen a un cliente que ya existe.");
                exit;
            } else  {
                $consulta = "INSERT INTO Clientes (nombre,appaterno,apmaterno,telefono,email,direccion,rfc,curp,num_doc,ocr) VALUES
                ('$nombre_cli','$appat_cli','$apmat_cli','$tel_cli','$email_cli','$dir_cli','$rfc_cli','$curp_cli','$nodoc_cli','$ocr_cli')
                ";
                $resultado = mysqli_multi_query($conex,$consulta);
                if ($resultado){
                    header ("Location:/Clientes/consultaClientes/index.php");
                    exit;
                } else {
                    header ("Location:/Clientes/agregarClientes/index.php?error=Hubo un error al registrar el cliente nuevo.");
                    exit;
                }
            }
        } else {
            header ("Location:/Clientes/agregarClientes/index.php?error=Hubo un error al registrar el cliente nuevo.");
            exit;
        }
    } else {
        header ("Location:/Clientes/agregarClientes/index.php?error=Llene todos los campos por favor.");
        exit;
    }
    memory_free_result($resultado);
    mysqli_close($conex);
    
};

/*
---------------------------------------------------------------------------------------------------------------
    Eliminar  Cliente
---------------------------------------------------------------------------------------------------------------
*/

if (isset($_POST['eliminar_cli'])){

    $iid = $_POST['eliminar_cli'];
    $delete = "delete from Clientes where id_Cliente = '$iid';";
    $resultado = mysqli_query($conex,$delete);
    if ($resultado){
        header ("location:/Clientes/consultaClientes/index.php?error=Se borro " . $iid . ".");
    } else {
        header ("location:/Clientes/consultaClientes/index.php?error=Hubo un error al eliminar este cliente.");
    }

    memory_free_result($resultado);
    mysqli_close($conex);
};

?>