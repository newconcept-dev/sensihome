<?php
    /* Archivo de conexion para base de datos que devuelva si se pudo conectar */

    $host = 'localhost';
    $user = 'u224160417_devsensi';
    $pass = '{array1Fetch@True}';
    $db = 'sensihome';

    $con= mysqli_connect($host,$user,$pass,$db);

    if($con){
        echo "Conectado";
    }else{
        /* Muestre porque*/
        echo "No se pudo conectar";
        




    }


?>