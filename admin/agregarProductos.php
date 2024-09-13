<?php 
   include_once 'db.php';
   
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
   
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       // Obtener los valores del formulario
       $nombre_producto = $_POST['nombre_producto'];
       $categoria_id = $_POST['categoria_id'];
       $existencia = $_POST['existencia'];
       $descripcion = $_POST['descripcion'];
       $tipoProducto_id = $_POST['tipoProducto_id'];
       $color_id = $_POST['color_id'];
       $relleno_id = $_POST['relleno_id'];
       $madera_id = $_POST['madera_id'];
       $patas_id = $_POST['patas_id'];
       $telas_id = $_POST['telas_id'];
       $precio = $_POST['precio'];
       $precioVenta = $_POST['precioVenta'];
       $proveedor_id = $_POST['proveedor_id'];
       $fechaCompra = $_POST['fechaCompra'];
       $garantia = $_POST['garantia'];
   
       // Preparar la consulta SQL para insertar el nuevo producto
       $sql = "INSERT INTO productos (nombre_producto, categoria_id, existencia, descripcion, tipoProducto_id, color_id, relleno_id, madera_id, patas_id, telas_id, precio, precioVenta, proveedor_id, fechaCompra, garantia) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
   
       // Preparar la declaración
       if ($stmt = $con->prepare($sql)) {
           // Vincular los parámetros
           $stmt->bind_param("siissiiiiidissi", $nombre_producto, $categoria_id, $existencia, $descripcion, $tipoProducto_id, $color_id, $relleno_id, $madera_id, $patas_id, $telas_id, $precio, $precioVenta, $proveedor_id, $fechaCompra, $garantia);
   
           // Ejecutar la declaración
           if ($stmt->execute()) {
               // Generar el script de JavaScript para mostrar los datos insertados
               echo "<script>
                   alert('Producto agregado exitosamente.\\n\\n" .
                   "Nombre del Producto: $nombre_producto\\n" .
                   "Categoría ID: $categoria_id\\n" .
                   "Existencia: $existencia\\n" .
                   "Descripción: $descripcion\\n" .
                   "Tipo Producto ID: $tipoProducto_id\\n" .
                   "Color ID: $color_id\\n" .
                   "Relleno ID: $relleno_id\\n" .
                   "Madera ID: $madera_id\\n" .
                   "Patas ID: $patas_id\\n" .
                   "Telas ID: $telas_id\\n" .
                   "Precio: $precio\\n" .
                   "Precio Venta: $precioVenta\\n" .
                   "Proveedor ID: $proveedor_id\\n" .
                   "Fecha de Compra: $fechaCompra\\n" .
                   "Garantía: $garantia');
                   window.location.href = 'panel.php?modulo=agregarProductos';
               </script>";
           } else {
               echo "Error en la ejecución: " . $stmt->error;
           }
   
           // Cerrar la declaración
           $stmt->close();
       } else {
           echo "Error en la preparación: " . $con->error;
       }
   
       // Cerrar la conexión
       $con->close();
   }
   ?>
<!-- Estilos para los inputs tipo imagenes --> 
<link rel="stylesheet" href="./css/files.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<!-- <link rel="stylesheet" href="./agregarProducto.css"> -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Agregar producto</h1>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body">
                     <form id="formValidated" action="panel.php?modulo=agregarProductos" method="POST">
                        <div class="row ">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <div class="">
                                    <h2>Información del producto</h2>
                                 </div>
                                 
                                 <!-- contenedor con bordes tipo punteado -->
                                 <div class="product-upload" style="max-width: 100%;">
                                       <div class="product-edit">
                                          <input type="file" id="imageUpload-product" accept=".png, .jpg, .jpeg" required>
                                          <label for="imageUpload-product"></label>
                                       </div>
                                       <div class="product-preview" id="drop-area-product" style="width: 100%; height: 36vh; border-radius: 5px;">
                                          <div id="imagePreview-product" class="dropzone-desc" style="border-radius: 5px;">
                                             <i class="fa fa-image"></i>
                                             <p>Producto</p>
                                          </div>
                                          <div class="loading-container" id="loadingContainer-product" style="display: none;">
                                             <div></div>
                                             <div class="checkmark-container" id="checkmarkContainer-product" style="display: none;">
                                                <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                   <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                                                   <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                                                </svg>
                                             </div>
                                             <div class="error-container" id="errorContainer-product" style="display: none;">
                                                <svg class="error-mark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                   <circle class="error-mark__circle" cx="26" cy="26" r="25" fill="none"/>
                                                   <line class="error-mark__line" x1="16" y1="16" x2="36" y2="36"/>
                                                   <line class="error-mark__line" x1="36" y1="16" x2="16" y2="36"/>
                                                </svg>
                                             </div>
                                          </div>
                                       </div>
                                    </div>

                                 
                              
                                  </div>

                              
                              <div class="form-group active-full">
                                 <label for="nombre_producto">Nombre del Producto</label>
                                 <input type="text" name="nombre_producto" id="nombre_producto" class="form-control" required>
                              </div>
                              <div class="form-group active-full">
                                 <div id="category-input-main">
                                    <label for="categoria_id">Categoría</label>
                                    <select name="categoria_id" id="categoria_id" class="form-control" required>
                                       <option value="" selected disabled>Selecciona el tipo de producto</option>
                                       <?php
                                          if ($showCategory->num_rows > 0) {
                                              // Salida de datos de cada fila
                                              while($row = $showCategory->fetch_assoc()) {
                                                  echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . "</option>";
                                              }
                                          } else {
                                              echo "<option value='' disabled>No hay categorías disponibles</option>";
                                          }
                                          ?>
                                    </select>
                                 </div>
                                 <div class="form-group d-flex align-items-center">
                                    <small class="toggle-color">¿Desea añadir otra categoria?</small>
                                    <input type="checkbox" id="hidden-category" name="hidden-category" class="form-control" style="height: auto; width: auto; display: inline-block; margin-left: 10px;">
                                 </div>
                                 <div id="category-container">
                                    <div class="form-group">
                                       <label>Nombre de la categoria</label>
                                       <input type="text" name="nameNewCategory" class="form-control">
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label>Darle promoción a este producto</label>
                                 <div><input type="checkbox" name="my-checkbox" unchecked data-bootstrap-switch></div>
                              </div>
                              <div class="form-group">
                                 <label>En venta</label>
                                 <div><input type="checkbox" name="my-checkbox" unchecked data-bootstrap-switch></div>
                              </div>
                              <div class="form-group active-full">
                                 <label for="existencia">Stock</label>
                                 <input type="number" name="existencia" id="existencia" class="form-control" required>
                              </div>
                              <div class="form-group active-full">
                                 <label for="descripcion">Descripción</label>
                                 <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
                              </div>
                              <div class="form-group active-full">
                                 <div id="type-input-main">
                                    <label for="tipoProducto_id">Tipo de Producto</label>
                                    <select name="tipoProducto_id" id="tipoProducto_id" class="form-control" required>
                                       <option value="" selected disabled>Selecciona el tipo de producto</option>
                                       <!-- aqui  -->
                                       <?php
                                          if ($showTypeProduct->num_rows > 0) {
                                              // Salida de datos de cada fila
                                              while($row = $showTypeProduct->fetch_assoc()) {
                                                  echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . "</option>";
                                              }
                                          } else {
                                              echo "<option value='' disabled>No hay tipos de productos disponibles</option>";
                                          }
                                          ?>
                                    </select>
                                 </div>
                                 <div class="form-group d-flex align-items-center">
                                    <small class="label-type-product">¿Desea añadir otro tipo de producto?</small>
                                    <input type="checkbox" id="hidden-type-product" name="hidden-type-product" class="form-control" style="height: auto; width: auto; display: inline-block; margin-left: 10px;">
                                 </div>
                                 <div id="type-product-container" style="display: none;">
                                    <div class="form-group">
                                       <label>Nombre del tipo de producto</label>
                                       <input type="text" name="nameNewProduct" class="form-control">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group active-full">
                                 <label for="color_id">Color</label>
                                 <div id="color-select-main">
                                    <div class="input-group">
                                       <select name="color_id" id="color_id" class="form-control" required>
                                          <option value="" selected disabled>Selecciona el tipo de medida</option>
                                          <?php
                                             if ($showColors->num_rows > 0) {
                                                 // Salida de datos de cada fila
                                                 while($row = $showColors->fetch_assoc()) {
                                                     echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . "</option>";
                                                 }
                                             } else {
                                                 echo "<option value='' disabled>No hay colores disponibles</option>";
                                             }
                                             ?>
                                       </select>
                                       <div class="input-group-append">
                                          <span class="input-group-text"><i class="fas fa-circle"></i></span>
                                       </div>
                                    </div>
                                    <div class="form-group d-flex align-items-center">
                                       <small class="label-color-select">¿Desea añadir otra color?</small>
                                       <input type="checkbox" id="hidden-color-select" name="hidden-color-select" class="form-control" style="height: auto; width: auto; display: inline-block; margin-left: 10px;">
                                    </div>
                                    <div id="color-container">
                                       <div class="form-group">
                                          <label>Color nuevo</label>
                                          <input type="text" name="nombre" class="form-control">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label>Materiales</label>
                                 <div class="form-group">
                                    <!-- Relleno -->
                                    <div class="row align-items-center">
                                       <div class="col-md-2 col-6">
                                          <p class="mb-0" for="relleno_id">Relleno</p>
                                       </div>
                                       <div class="col-md-4 col-6 text-md-right d-flex align-items-center justify-content-between">
                                          <small class="d-inline-block text-truncate" style="max-width: 100%;">¿Desea añadir otra relleno?</small>
                                          <input type="checkbox" id="material-relleno-input" name="material-relleno-input" class="form-control ml-2" style="height: auto; width: auto;">
                                       </div>
                                       <div class="col-md-6 col-12">
                                          <select name="relleno_id" id="relleno_id" class="form-control select2bs4 w-100" required>
                                             <option value="" selected disabled>Busca el relleno</option>
                                             <?php
                                                if ($showStuffed->num_rows > 0) {
                                                    // Salida de datos de cada fila
                                                    while($row = $showStuffed->fetch_assoc()) {
                                                        echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . "</option>";
                                                    }
                                                } else {
                                                    echo "<option value='' disabled>No hay rellenos disponibles</option>";
                                                }
                                                ?>
                                          </select>
                                       </div>
                                    </div>
                                    <div id="relleno-container" class="mt-2" style="display: none;">
                                       <!-- Aqui lo que se oculta -->
                                       <div class="form-group d-flex align-items-center">
                                          <p id="text-nuevo-relleno" class="mb-0 mr-2" style="white-space: nowrap;">Nuevo relleno:</p>
                                          <input id="nuevo-relleno" type="text" name="nuevo-relleno-input" class="form-control flex-grow-1">
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Fin de relleno -->
                                 <div class="form-group">
                                    <!-- Madera -->
                                    <div class="row align-items-center">
                                       <div class="col-md-2 col-6">
                                          <p class="mb-0" for="madera_id">Madera</p>
                                       </div>
                                       <div class="col-md-4 col-6 text-md-right d-flex align-items-center justify-content-between">
                                          <small class="d-inline-block text-truncate" style="max-width: 100%;">¿Desea añadir otra madera?</small>
                                          <input type="checkbox" id="material-madera-input" name="showWood-input" class="form-control ml-2" style="height: auto; width: auto;">
                                       </div>
                                       <div class="col-md-6 col-12">
                                          <select name="madera_id" id="madera_id" class="form-control select2bs4 w-100" required>
                                             <option value="" selected disabled>Busca la madera</option>
                                             <?php
                                                if ($showWood->num_rows > 0) {
                                                    // Salida de datos de cada fila
                                                    while($row = $showWood->fetch_assoc()) {
                                                        echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . "</option>";
                                                    }
                                                } else {
                                                    echo "<option value='' disabled>No hay maderas disponibles</option>";
                                                }
                                                ?>
                                          </select>
                                       </div>
                                    </div>
                                    <div id="madera-container" class="mt-2" style="display: none;">
                                       <!-- Aqui lo que se oculta -->
                                       <div class="form-group d-flex align-items-center">
                                          <p id="text-nueva-madera" class="mb-0 mr-2" style="white-space: nowrap;">Nueva madera:</p>
                                          <input id="nueva-madera" type="text" name="nueva-madera-input" class="form-control flex-grow-1">
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Fin de madera -->
                                 <div class="form-group">
                                    <!-- Patas -->
                                    <div class="row align-items-center">
                                       <div class="col-md-2 col-6">
                                          <p class="mb-0" for="patas_id">Patas</p>
                                       </div>
                                       <div class="col-md-4 col-6 text-md-right d-flex align-items-center justify-content-between">
                                          <small class="d-inline-block text-truncate" style="max-width: 100%;">¿Desea añadir otra pata?</small>
                                          <input type="checkbox" id="material-patas-input" name="legs-input" class="form-control ml-2" style="height: auto; width: auto;">
                                       </div>
                                       <div class="col-md-6 col-12">
                                          <select name="patas_id" id="patas_id" class="form-control select2bs4 w-100" required>
                                             <option value="" selected disabled>Busca la pata</option>
                                             <?php
                                                if ($showLegs->num_rows > 0) {
                                                    // Salida de datos de cada fila
                                                    while($row = $showLegs->fetch_assoc()) {
                                                        echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . "</option>";
                                                    }
                                                } else {
                                                    echo "<option value='' disabled>No hay patas disponibles</option>";
                                                }
                                                ?>
                                          </select>
                                       </div>
                                    </div>
                                    <div id="patas-container" class="mt-2" style="display: none;">
                                       <!-- Aqui lo que se oculta -->
                                       <div class="form-group d-flex align-items-center">
                                          <p id="text-nueva-pata" class="mb-0 mr-2" style="white-space: nowrap;">Nueva pata:</p>
                                          <input id="nueva-pata" type="text" name="nueva-pata-input" class="form-control flex-grow-1">
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Fin de patas -->
                                 <div class="form-group">
                                    <!-- Telas -->
                                    <div class="row align-items-center">
                                       <div class="col-md-2 col-6">
                                          <p class="mb-0" for="telas_id">Telas</p>
                                       </div>
                                       <div class="col-md-4 col-6 text-md-right d-flex align-items-center justify-content-between">
                                          <small class="d-inline-block text-truncate" style="max-width: 100%;">¿Desea añadir otra tela?</small>
                                          <input type="checkbox" id="material-telas-input" name="fabrics-input" class="form-control ml-2" style="height: auto; width: auto;">
                                       </div>
                                       <div class="col-md-6 col-12">
                                          <div class="input-group">
                                             <select name="telas_id" id="telas_id" class="form-control select2bs4" required>
                                                <option value="" selected disabled>Busca la tela</option>
                                                <?php
                                                   if ($showFabrics->num_rows > 0) {
                                                       // Salida de datos de cada fila
                                                       while($row = $showFabrics->fetch_assoc()) {
                                                           echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . "</option>";
                                                       }
                                                   } else {
                                                       echo "<option value='' disabled>No hay telas disponibles</option>";
                                                   }
                                                   
                                                   ?>
                                             </select>
                                             <div class="input-group-append">
                                                <span class="input-group-text p-0">
                                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSK_i51UEwk-sYPTgLpK4Ok87gZTUrhqTrtxQ&s" alt="" class="img-fluid zoom" style="height: 38px; border-radius: 0 5px 5px 0;">
                                                </span>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div id="telas-container" class="mt-2" style="display: none;">
                                       <!-- Aqui lo que se oculta -->
                                       <div class="form-group d-flex align-items-center">
                                          <p id="text-nueva-tela" class="mb-0 mr-2" style="white-space: nowrap;">Nueva tela:</p>
                                          <input id="nueva-tela" type="text" name="nueva-tela-input" class="form-control flex-grow-1">
                                       </div>
                                       <div class="form-group">
                                          <div class="container mt-0" id="upload-tela-img-sg-1" data-width="100%" data-height="300" data-icon="fa-image" data-accept=".png, .jpg, .jpeg" data-valid-types="image/jpeg, image/png, image/jpg" data-text="Añadir imagen de la tela" data-border-radius="5px"></div>
                                       </div>
                                       <div class="form-group text-center">
                                          <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#cameraModal">
                                             <!-- icono de camara -->
                                             Tomar foto <i class="fas fa-camera"></i>
                                          </button>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Fin de telas -->
                              </div>
                              <!-- Fin de formulario de materiales -->     
                              <div class="form-group">
                                 <label>Medidas</label>
                                 <input type="checkbox" id="measures-inputs" name="measures-inputs" class="form-control" style="height: auto; width: auto; display: inline-block; margin-left: 10px;">
                                 <!-- Contenedor para los inputs -->
                                 <div id="medidas-container">
                                    <!-- Largos -->
                                    <div class="form-group">
                                       <label>Largo</label>
                                       <div class="input-group">
                                          <input type="number" name="largo" class="form-control input-change">
                                          <div class="input-group-append">
                                             <span class="input-group-text">
                                             <small class="mr-2">Cm</small>
                                             <i class="fas fa-ruler icon-color-change"></i>
                                             </span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label>Largo asiento</label>
                                       <div class="input-group">
                                          <input type="number" name="largo-asiento" class="form-control input-change">
                                          <div class="input-group-append">
                                             <span class="input-group-text">
                                             <small class="mr-2">Cm</small>
                                             <i class="fas fa-ruler icon-color-change"></i>
                                             </span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label>Fondo</label>
                                       <div class="input-group">
                                          <input type="number" name="fondo" class="form-control input-change">
                                          <div class="input-group-append">
                                             <span class="input-group-text">
                                             <small class="mr-2">Cm</small>
                                             <i class="fas fa-ruler icon-color-change"></i>
                                             </span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label>Fondo del asiento</label>
                                       <div class="input-group">
                                          <input type="number" name="fondo-asiento" class="form-control input-change">
                                          <div class="input-group-append">
                                             <span class="input-group-text">
                                             <small class="mr-2">Cm</small>
                                             <i class="fas fa-ruler icon-color-change"></i>
                                             </span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label>Ancho del Brazo</label>
                                       <div class="input-group">
                                          <input type="number" name="ancho-brazo" class="form-control input-change">
                                          <div class="input-group-append">
                                             <span class="input-group-text">
                                             <small class="mr-2">Cm</small>
                                             <i class="fas fa-ruler icon-color-change"></i>
                                             </span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label>Ancho del respaldo</label>
                                       <div class="input-group">
                                          <input type="number" name="ancho-respaldo" class="form-control input-change">
                                          <div class="input-group-append">
                                             <span class="input-group-text">
                                             <small class="mr-2">Cm</small>
                                             <i class="fas fa-ruler icon-color-change"></i>
                                             </span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label>Altura</label>
                                       <div class="input-group">
                                          <input type="number" name="altura" class="form-control input-change">
                                          <div class="input-group-append">
                                             <span class="input-group-text">
                                             <small class="mr-2">Cm</small>
                                             <i class="fas fa-ruler icon-color-change"></i>
                                             </span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label>Altura al casco</label>
                                       <div class="input-group">
                                          <input type="number" name="altura-casco" class="form-control input-change">
                                          <div class="input-group-append">
                                             <span class="input-group-text">
                                             <small class="mr-2">Cm</small>
                                             <i class="fas fa-ruler icon-color-change"></i>
                                             </span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label>Altura al brazo</label>
                                       <div class="input-group">
                                          <input type="number" name="altura-brazo" class="form-control input-change">
                                          <div class="input-group-append">
                                             <span class="input-group-text">
                                             <small class="mr-2">Cm</small>
                                             <i class="fas fa-ruler icon-color-change"></i>
                                             </span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label>Altura al asiento</label>
                                       <div class="input-group">
                                          <input type="number" name="altura-asiento" class="form-control input-change">
                                          <div class="input-group-append">
                                             <span class="input-group-text">
                                             <small class="mr-2">Cm</small>
                                             <i class="fas fa-ruler icon-color-change"></i>
                                             </span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label>Altura a la pata</label>
                                       <div class="input-group">
                                          <input type="number" name="altura-casco" class="form-control input-change">
                                          <div class="input-group-append">
                                             <span class="input-group-text">
                                             <small class="mr-2">Cm</small>
                                             <i class="fas fa-ruler icon-color-change"></i>
                                             </span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label>Altura al respaldo</label>
                                       <div class="input-group">
                                          <input type="number" name="altura-respaldo" class="form-control input-change">
                                          <div class="input-group-append">
                                             <span class="input-group-text">
                                             <small class="mr-2">Cm</small>
                                             <i class="fas fa-ruler icon-color-change"></i>
                                             </span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group active-full">
                                 <label>Peso</label>
                                 <div class="input-group">
                                    <input type="number" name="peso" class="form-control input-change">
                                    <div class="input-group-append">
                                       <span class="input-group-text">
                                       <small class="mr-2">Kg</small>
                                       <i class="fas fa-ruler icon-color-change"></i>
                                       </span>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label>¿Tiene accesorios?</label>
                                 <input type="checkbox" id="plugins-inputs" name="plugins-inputs" class="form-control" style="height: auto; width: auto; display: inline-block; margin-left: 10px;">
                              </div>
                              <div id="plugins-inputs-container">
                                 <div class="form-group">
                                    <label>Tipo de accesorio</label>
                                    <select id="" name="accesories" class="form-control select2bs4 ml-3" style="width: 100%;">
                                       <option value="" selected disabled>Seleccion el accesorio</option>
                                       <?php
                                          if ($showAccesories->num_rows > 0) {
                                              // Salida de datos de cada fila
                                              while($row = $showAccesories->fetch_assoc()) {
                                                  echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . "</option>";
                                              }
                                          } else {
                                              echo "<option value='' disabled>No hay accesorios disponibles</option>";
                                          }
                                          ?>
                                    </select>
                                 </div>
                                 <div class="form-group">
                                    <label>¿Cuantos accesorios serán?</label>
                                    <input type="number" name="accesorios" class="form-control">
                                 </div>
                              </div>
                              <!-- Aqui precio compra y venta -->
                              <div class="form-group active-full">
                                 <label>Precio Compra</label>
                                 <div class="input-group">
                                    <input type="number" name="precio" id="precio" class="form-control input-change">
                                    <div class="input-group-append">
                                       <span class="input-group-text">
                                       <i class="fas fa-dollar-sign icon-color-change"></i>
                                       </span>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group active-full">
                                 <label>Precio de venta</label>
                                 <div class="input-group">
                                    <input type="number" name="precioVenta" id="precioVenta" class="form-control input-change">
                                    <div class="input-group-append">
                                       <span class="input-group-text">
                                       <i class="fas fa-dollar-sign icon-color-change"></i>
                                       </span>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="proveedor_id">Proveedor</label>
                                 <select name="proveedor_id" id="proveedor_id" class="form-control select2bs4" style="width: 100%;" required>
                                    <option value="" selected disabled>Selecciona el proveedor</option>
                                    <?php
                                       if ($showProviders->num_rows > 0) {
                                           // Salida de datos de cada fila
                                           while($row = $showProviders->fetch_assoc()) {
                                               echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . "</option>";
                                           }
                                       } else {
                                           echo "<option value='' disabled>No hay proveedores disponibles</option>";
                                       }
                                       
                                       
                                       ?>
                                 </select>
                              </div>
                              <div class="form-group active-full">
                                 <label for="fechaCompra">Fecha de Compra</label>                    
                                 <input type="date" name="fechaCompra" id="fechaCompra" class="form-control" required>
                              </div>
                              <div class="form-group active-full">
                                 <label>Garantía</label>
                                 <input type="text" name="garantia" id="garantia" class="form-control" required>
                              </div>
                              <div class="form-group">
                                 <label>Fecha de registro</label>
                                 <p><?php echo date('Y-m-d H:i:s'); ?></p>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <!-- Div con bordes 100% del ancho y 60vh de alto -->
                              <div class="d-flex flex-column justify-content-center align-items-center" style="padding: 1em;">
                                 <!-- Contenido del div -->
                                 <div id="phone-view-1" data-src="http://localhost/sensi/view.e.html" class="d-none d-md-block" style="width: 70%; height: 100%;"></div>
                                 <!-- <button type="submit" class="btn btn-primary btn-smg mt-0 mt-md-3" name="guardar">Agregar producto</button> -->
                                 <button type="submit" name="guardar" class="btn btn-primary">Guardar</button>
                                 <!-- C:\xampp\htdocs\sensi\view.e.html -->
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
                  <!-- /.card-body -->
               </div>
               <!-- /.card -->
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
      <!-- Modal para tomar fotos -->
      <div class="modal fade" id="cameraModal" tabindex="-1" role="dialog" aria-labelledby="cameraModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="cameraModalLabel">Añadiendo tela</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body p-0">
                  <div class="video-container w-100 h-100">
                     <video id="video" class="w-100 h-100" autoplay></video>
                  </div>
                  <canvas id="canvas" style="display: none;"></canvas>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-primary" id="capture">Tomar Foto</button>
               </div>
            </div>
         </div>
      </div>
   </section>

   <script src="./middleware/inputs.products.js"></script>
   <script src="./middleware/hidden.material.form.js"></script>
   <script src="./middleware/hidden.select.color.js"></script>
   <script src="./middleware/hidden.measures.js"></script>
   <script src="./middleware/status.input.js"></script>
   <script src="./middleware/strong.view.pwd.js"></script>
   <script src="./middleware/change.Icons.colors.js"></script>
   <script src="./middleware/hidden.plugins.js"></script>
   <script src="./middleware/hidden.category.js"></script>
   <script src="./middleware/hidden.type.product.js"></script>
   <!-- modal de la camara -->
   <script src="./middleware/modal.cam.js"></script>
</div>