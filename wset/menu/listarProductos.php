<?php
    include_once "db.php";

    $sqlQuery = "SELECT id, nombre_producto,descripcion,precio,existencia,categoria_id,precioVenta,garantia,proveedor_id, color_id, status, promocionar FROM productos";
    $queryResult = $con->query($sqlQuery);


    echo $queryResult;

    

?>