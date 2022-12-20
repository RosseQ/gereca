<?php

//  $conex = mysqli_connect("localhost", "root", "", "recesanew1"); // PARA FUNCION EN SISTEMA DE PABLO
 $conex = mysqli_connect("localhost", "root", "rootpass", "recesanew1"); //PARA FUNCION EN SISTEMA DE ORLANDO (temporal)

 if($conex === false){
    echo 'Error en la conexion',mysqli_connect_error();
 }
//  $path_archivo  = './registro.php'
//  $ruta_absoluta = realpath($path_archivo)

//  echo ruta_absoluta

//  var_dump(ruta_absoluta)
 
 ?>
 