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
    if (strlen($_POST['id_v']) >= 1 && strlen($_POST['tipounidad_v']) >= 1 && strlen($_POST['modelo_v']) >= 1 && strlen($_POST['placas_v']) >= 1){
        $id_v = trim($_POST['id_v']);
        $tipounidad_v = trim($_POST['tipounidad_v']);
        $modelo_v = trim($_POST['modelo_v']);
        $clase_vehiculo = trim($_POST['clase_vehiculo']);
        $tipo_vehiculo = trim($_POST['tipo_vehiculo']);
        $adaptacion_v = trim($_POST['adaptacion_v']);
        $placas_v = trim($_POST['placas_v']);
        $consulta = "INSERT INTO Vehiculos (id_Vehiculo, tipo_unidad, modelo, id_Cat_Clase_Vehiculo, id_Cat_Tipo, id_Cat_Adaptacion, placas) 
            VALUES ('$id_v','$tipounidad_v','$modelo_v', '$clase_vehiculo', '$tipo_vehiculo', '$adaptacion_v', '$placas_v')";
        $resultado = mysqli_query($conex,$consulta);
        if ($resultado){
            header ("location:/Vehiculos/consultaVehiculos/index.php");
        } else {
            header ("location:/Vehiculos/agregarVehiculos/index.php?error=Hubo un error al registrar el vehiculo nuevo.");
        }
    } else {
        header ("location:/Vehiculos/agregarVehiculos/index.php?error=Llene todos los campos por favor.");
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