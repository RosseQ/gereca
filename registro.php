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
---------------------------------------------------------------------------------------------------------------
    Eliminar  Vehiculo
---------------------------------------------------------------------------------------------------------------
*/

if (isset($_POST['eliminar_h'])){

    $id = $_POST['eliminar_h'];  
    $update = "UPDATE cat_Vehiculos SET estatus = 'invisible'  WHERE id = '$id';";
    $resultado = mysqli_query($conex,$update);
        
    if ($resultado){

        $fecha_uh = date("y/m/d H:i:s");

        $inser = "INSERT INTO movimientos_Vehiculos(id_usuario, id_herramienta, id_acciones_h, fecha_uh)
            VALUES ('1','$id','4', '$fecha_uh');";
        $resultado = mysqli_query($conex,$inser);
        

        header ("location:Vehiculos/consultaVehiculos");
    } else {
        header ("location:/Vehiculos/consultaVehiculos/index.php?error=Error al eliminar la herramienta.");
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
        $idVehiculo_i = trim($_POST['idVehiculo_i']);
        $tipoRenta_i = trim($_POST['tipoRenta_i']);
        $dias_i = trim($_POST['dias_i']);
        $tarifa_i = floatval(trim($_POST['tarifa_i']));
        $costo_i = floatval(trim($_POST['costo_i']));
        $utilidad_i = $tarifa_i - $costo_i;
        $fecha_i = date("y-m-d");
        $consulta = "insert into ingresos (id_Vehiculo, id_Cat_Tipo_Renta, dias, tarifa, costmantenimiento, totalneto, fecha_ingreso) values
        ('$idVehiculo_i','$tipoRenta_i','$dias_i','$tarifa_i','%costo_i', '$utilidad_i', CURDATE())";
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