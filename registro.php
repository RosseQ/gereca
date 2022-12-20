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

        $consulta = "INSERT INTO Vehiculos (tipo_unidad, modelo, id_Cat_Clase_Vehiculo, id_Cat_Tipo, id_Cat_Adaptacion, placas, economico, numero_serie, carga_uti, id_costo)
        VALUES ('$tipounidad_v','$modelo_v', '$clase_vehiculo', '$tipo_vehiculo', '$adaptacion_v', '$placas_v', '$economico_v', '$noserie_v', '$carga_util_v', 11);
        ";

        $resultado = mysqli_query($conex,$consulta);
        if ($resultado){
            // http://localhost/Vehiculos/agregarVehiculos/index.php?
            // header ("Location: C:\Users\ernes\Documents\GitHub\gereca\Vehiculos\agregarVehiculos\index.php");
            header ("Location: http://localhost/Vehiculos/verVehiculos/index.php");
            exit;
        } else {
            header ("Location: http://localhost/Vehiculos/agregarVehiculos/index.php?error=Hubo un error al registrar el vehiculo nuevo.");
            exit;
        }
    } else {
        header ("Location: http://localhost/Vehiculos/agregarVehiculos/index.php?error=Llene todos los campos por favor.");
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
            I N G R E S O S
----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
*/

/*
---------------------------------------------------------------------------------------------------------------
    Agregar Ingreso
---------------------------------------------------------------------------------------------------------------
*/
if (isset($_POST['nuevoingreso'])){
    if (strlen($_POST['dias_i']) >= 1 && strlen($_POST['tarifa_i']) >= 1 && strlen($_POST['costo_i']) >= 1){
        
        $idVehiculo_in = trim($_POST['idVehiculo_i']);
        $tipoRenta_in = trim($_POST['tipoRenta_i']);

        $dias_in = trim($_POST['dias_i']);
        $dias_in = (int)$dias_in;

        $tarifa_in = trim($_POST['tarifa_i']);
        $tarifa_in = (int)$tarifa_in;

        $costo_in = trim($_POST['costo_i']);
        $costo_in = (int)$costo_in;

        $utilidad_in = ($tarifa_in - $costo_in);

        $consulta = "INSERT INTO Ingresos (id_Vehiculo, id_Cat_Tipo_Renta, dias, tarifa, costmantenimiento, totalneto, fecha_ingreso)
        VALUES ('$idVehiculo_in','$tipoRenta_in','$dias_in','$tarifa_in','$costo_in', '$utilidad_in', CURDATE())";

        $resultado = mysqli_query($conex,$consulta);
        if ($resultado){
            header ("location:/Ingresos/verIngresos/index.php");
        } else {
            header ("location:/Ingresos/nuevoIngreso/index.php?error=Hubo un error al registrar el ingreso.");
        }
    } else {
        header ("location:/Ingresos/nuevoIngreso/index.php?error=Llene todos los campos por favor.");
    }
    memory_free_result($resultado);
    mysqli_close($conex);
};

?>