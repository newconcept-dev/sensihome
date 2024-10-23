<?php

   include_once '../db.php';

/* Obteniendo las categorias */
   $getCategory = "SELECT id, nombre FROM categorias";
   $showCategory = $con->query($getCategory);
   if (!$showCategory) {
       die("Error al obtener categorías: " . $con->error);
   }
   
   /* Obtiendo tipoProducto */
   $getTypeProduct = "SELECT id, nombre FROM tipoProducto";
   $showTypeProduct = $con->query($getTypeProduct);
   if (!$showTypeProduct) {
       die("Error al obtener tipo de producto: " . $con->error);
   }
   
   /* Obtener colores */
   $getColors = "SELECT id, nombre FROM color";
   $showColors = $con->query($getColors);
   if (!$showColors) {
       die("Error al obtener colores: " . $con->error);
   }
   
   /* Conjunto de valores de Materiales, para cada select */
   
   /* Obteniendo relleno */
   $getStuffed = "SELECT id, nombre FROM materiales WHERE tipo = 'relleno'";
   $showStuffed = $con->query($getStuffed);
   if (!$showStuffed) {
       die("Error al obtener relleno: " . $con->error);
   }
   
   /* Obteniendo madera */
   $getWood = "SELECT id, nombre FROM materiales WHERE tipo = 'madera'";
   $showWood = $con->query($getWood);
   if (!$showWood) {
       die("Error al obtener madera: " . $con->error);
   }
   
   /* Obteniendo patas */
   $getLegs = "SELECT id, nombre FROM materiales WHERE tipo = 'patas'";
   $showLegs = $con->query($getLegs);
   if (!$showLegs) {
       die("Error al obtener patas: " . $con->error);
   }
   
   /* Obteniendo telas */
   $getFabrics = "SELECT id, nombre FROM materiales WHERE tipo = 'telas'";
   $showFabrics = $con->query($getFabrics);
   if (!$showFabrics) {
       die("Error al obtener telas: " . $con->error);
   }
   
   /* ----> Aqui termino materiales */
   
   /* Obteniendo de accesorios el nombre */
   $getAccesories = "SELECT id, nombre FROM accesorios";
   $showAccesories = $con->query($getAccesories);
   if (!$showAccesories) {
       die("Error al obtener accesorios: " . $con->error);
   }
   
   /* Obtieniendo proveedores el nombre */
   $getProviders = "SELECT id, nombre FROM proveedores";
   $showProviders = $con->query($getProviders);
   if (!$showProviders) {
       die("Error al obtener proveedores: " . $con->error);
   }
   
   ?>