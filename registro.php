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
        // $id_costo_v = mysql_query($conex,"SELECT id_Costo from Costos order by id_Costo DESC limit 1;");
        // $id_costo_v = mysql_fetch_row($id_costo_q);

        $consulta = "INSERT INTO Costos (precio_dia, precio_sem, precio_mes) VALUES ('$precio_dia_v', '$precio_semana_v', '$precio_mes_v');
        SELECT id_Costo INTO @costov from Costos order by id_Costo DESC limit 1;
        INSERT INTO Vehiculos (tipo_unidad, modelo, id_Cat_Clase_Vehiculo, id_Cat_Tipo, id_Cat_Adaptacion, placas, economico, numero_serie, carga_uti, id_Costo)
        VALUES ('$tipounidad_v','$modelo_v', '$clase_vehiculo', '$tipo_vehiculo', '$adaptacion_v', '$placas_v', '$economico_v', '$noserie_v', '$carga_util_v', @costov);
        ";

        $resultado = mysqli_multi_query($conex,$consulta);
        if ($resultado){
            // http://localhost/Vehiculos/agregarVehiculos/index.php?
            // header ("Location: C:\Users\ernes\Documents\GitHub\gereca\Vehiculos\agregarVehiculos\index.php");
            header ("Location:/Vehiculos/consultaVehiculos/index.php");
            exit;
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
    Eliminar  Vehiculo
---------------------------------------------------------------------------------------------------------------
*/

if (isset($_POST['eliminar_v'])){

    $Economicoo = $_POST['eliminar_v'];
    $delete = "delete from vehiculos where id_Vehiculo = '$Economicoo';";
    $resultado = mysqli_query($conex,$delete);
        
    if ($resultado){
        header ("location:/Vehiculos/consultaVehiculos/index.php?error=Se borro " . $Economicoo . ".");
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
    if (strlen($_POST['costo_det']) >= 1){
        $idVehiculo_det = trim($_POST['idVehiculo_det']);
        $mantenimiento_det = trim($_POST['mantenimiento_det']);
        $costo_det = trim($_POST['costo_det']);

        $consulta = "INSERT INTO detalle_mantenimiento (id_Mantenimiento, id_Vehiculo, costo, fecha) VALUES ('$mantenimiento_det', '$idVehiculo_det', '$costo_det', CURDATE())";

        $resultado = mysqli_query($conex,$consulta);
        if ($resultado){
            // http://localhost/Vehiculos/agregarVehiculos/index.php?
            // header ("Location: C:\Users\ernes\Documents\GitHub\gereca\Vehiculos\agregarVehiculos\index.php");
            header ("Location:/Mantenimientos/verMantenimientos/index.php");
            exit;
        } else {
            header ("Location:/Mantenimientos/nuevoMantenimiento/index.php?error=Hubo un error al registrar el vehiculo nuevo.");
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

//ESTA VERSION ISNERTA PERO SIGUE SIN ALMACENAR EL VALOR DEL PRECIO
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
        AND Vehiculos.id_Vehiculo = @idveh_price_choose
        limit 1;";
        $resultado = mysqli_query($conex,$pricecheck);
        $pricegrab = mysqli_fetch_array($resultado);
        
        $calcdias = 0;
        $cost_prec = 0;
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
        // $truprice = $pricegrab['costos.precio_dia'];

        if ($dias_i > 0)
        {
            $consulta = "INSERT INTO detalle_renta (id_Vehiculo,cantidad) VALUES ('$idVehiculo_i', '$caldias');
    
            SELECT id_detalleRenta INTO @rent_det from detalle_renta order by id_detalleRenta DESC limit 1;
    
            INSERT INTO renta (id_cliente,id_detalleRenta,total,fecha_registro,fecha_hecho,fecha_regreso)
            VALUES ('$idCliente_i', (SELECT @rent_det), (SELECT '$truprice' * '$dias_i'),
            CURDATE(), '$fecha_hecho', date_add('$fecha_hecho', INTERVAL '$caldias' DAY));
            ";
    
            $resultado = mysqli_multi_query($conex,$consulta);
            if ($resultado){
                header ("Location:/Ingresos/verIngresos/index.php?error=Needs" . $truprice);
                exit;
            } else {
                header ("Location:/Ingresos/nuevoIngreso/index.php?error=Hubo un error al registrar la renta.");
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

//ESTA VERSION INSERTA PERO NO ALMACENA VALOR EN @cost_prec
// if (isset($_POST['nuevarenta'])){
//     if (strlen($_POST['dias_i']) >= 1){
//         $idCliente_i = trim($_POST['idCliente_i']);
//         $idVehiculo_i = trim($_POST['idVehiculo_i']);
//         $tipoRenta_i = trim($_POST['tipoRenta_i']);
//         $dias_i = trim($_POST['dias_i']);
//         $fecha_hecho = trim($_POST['fecha_hecho']);
//         $calcdias = 0;
//         if ($tipoRenta_i == 1){
//             $caldias = $dias_i * 1;
//         } elseif ($tipoRenta_i == 2) {
//             $caldias = $dias_i * 7;
//         } elseif ($tipoRenta_i == 3) {
//             $caldias = $dias_i * 30;
//         }
//         if ($dias_i > 0)
//         {
//             $consulta = "INSERT INTO detalle_renta (id_Vehiculo,cantidad) VALUES ('$idVehiculo_i', '$caldias');
    
//             SELECT id_detalleRenta INTO @rent_det from detalle_renta order by id_detalleRenta DESC limit 1;

//             SELECT
//             CASE
//                 WHEN '$idVehiculo_i' = 1 THEN
//                     costos.precio_dia 
//                 WHEN '$idVehiculo_i' = 2 THEN
//                     costos.precio_sem
//                 WHEN '$idVehiculo_i' = 3 THEN
//                     costos.precio_mes
//                 ELSE 0
//             END
//             INTO @cost_prec from costos
//             INNER JOIN vehiculos on costos.id_costo = vehiculos.economico
//             WHERE costos.id_costo = vehiculos.economico
//             AND Vehiculos.id_Vehiculo = '$idVehiculo_i'
//             limit 1;
    
//             INSERT INTO renta (id_cliente,id_detalleRenta,total,fecha_registro,fecha_hecho,fecha_regreso)
//             VALUES ('$idCliente_i', (SELECT @rent_det), (SELECT @cost_prec * '$dias_i'),
//             CURDATE(), '$fecha_hecho', date_add('$fecha_hecho', INTERVAL '$caldias' DAY));
//             ";
    
//             $resultado = mysqli_multi_query($conex,$consulta);
//             if ($resultado){
//                 header ("Location:/Ingresos/verIngresos/index.php");
//                 exit;
//             } else {
//                 header ("Location:/Ingresos/nuevoIngreso/index.php?error=Hubo un error al registrar el vehiculo nuevo.");
//                 exit;
//             }
//         } else {
//             header ("Location:/Ingresos/nuevoIngreso/index.php?error=No puede rentar por 0 dias.");
//             exit;
//         }
//     } else {
//         header ("Location:/Ingresos/nuevoIngreso/index.php?error=Llene todos los campos por favor.");
//         exit;
//     }
//     memory_free_result($resultado);
//     mysqli_close($conex);  
// };

?>