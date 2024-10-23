<?php 
include_once 'db.php';

// Función para obtener datos de una tabla
function obtenerDatos($con, $tabla) {
   // Verificar si la tabla es 'color' para incluir el campo 'hex_color'
   $campos = ($tabla === 'color') ? 'id, nombre, hex_color' : 'id, nombre';
   $sql = "SELECT $campos FROM $tabla";
   $result = $con->query($sql);
   if (!$result) {
       throw new Exception("Error al obtener datos de $tabla: " . $con->error);
   }
   return $result;
}

// Función para insertar un producto
function insertarProducto($con, $datos) {
    $sql = "INSERT INTO productos (nombre_producto, categoria_id, existencia, descripcion, tipoProducto_id, color_id, relleno_id, madera_id, patas_id, telas_id, precio, precioVenta, proveedor_id, fechaCompra, garantia) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    if (!$stmt) {
        throw new Exception("Error en la preparación: " . $con->error);
    }
    $stmt->bind_param("siissiiiiidisss", ...array_values($datos));
    if (!$stmt->execute()) {
        throw new Exception("Error en la ejecución: " . $stmt->error);
    }
    $producto_id = $stmt->insert_id;
    $stmt->close();
    return $producto_id;
}

// Función para insertar una categoría
function insertarCategoria($con, $nombre, $n_modulos) {
    $sql = "INSERT INTO categorias (nombre, n_modulos) VALUES (?, ?)";
    $stmt = $con->prepare($sql);
    if (!$stmt) {
        throw new Exception("Error en la preparación: " . $con->error);
    }
    $stmt->bind_param("si", $nombre, $n_modulos);
    if (!$stmt->execute()) {
        throw new Exception("Error en la ejecución: " . $stmt->error);
    }
    $categoria_id = $stmt->insert_id;
    $stmt->close();
    return $categoria_id;
}

// Función para insertar un tipo de producto
function insertarTipoProducto($con, $nombre) {
    $sql = "INSERT INTO tipoproducto (nombre) VALUES (?)";
    $stmt = $con->prepare($sql);
    if (!$stmt) {
        throw new Exception("Error en la preparación: " . $con->error);
    }
    $stmt->bind_param("s", $nombre);
    if (!$stmt->execute()) {
        throw new Exception("Error en la ejecución: " . $stmt->error);
    }
    $tipoProducto_id = $stmt->insert_id;
    $stmt->close();
    return $tipoProducto_id;
}

// Función para insertar un color
function insertarColor($con, $nombre, $hex_color) {
    $sql = "INSERT INTO color (nombre, hex_color) VALUES (?, ?)";
    $stmt = $con->prepare($sql);
    if (!$stmt) {
        throw new Exception("Error en la preparación: " . $con->error);
    }
    $stmt->bind_param("ss", $nombre, $hex_color);
    if (!$stmt->execute()) {
        throw new Exception("Error en la ejecución: " . $stmt->error);
    }
    $color_id = $stmt->insert_id;
    $stmt->close();
    return $color_id;
}

// Función para insertar una imagen
function insertarImagen($con, $ruta, $producto_id, $frontend_id) {
    $sql_image = "INSERT INTO imagenes_productos (ruta, producto_id, frontend_id) VALUES (?, ?, ?)";
    $stmt_image = $con->prepare($sql_image);
    if (!$stmt_image) {
        throw new Exception("Error en la preparación de la imagen: " . $con->error);
    }
    $stmt_image->bind_param("sis", $ruta, $producto_id, $frontend_id);
    if (!$stmt_image->execute()) {
        throw new Exception("Error en la ejecución de la imagen: " . $stmt_image->error);
    }
    $stmt_image->close();
}

// Obtener datos de las tablas necesarias
try {
   $showCategory = obtenerDatos($con, 'categorias');
   $showTypeProduct = obtenerDatos($con, 'tipoproducto');
   $showColors = obtenerDatos($con, 'color');
   $showStuffed = obtenerDatos($con, "materiales WHERE tipo = 'relleno'");
   $showWood = obtenerDatos($con, "materiales WHERE tipo = 'madera'");
   $showLegs = obtenerDatos($con, "materiales WHERE tipo = 'patas'");
   $showFabrics = obtenerDatos($con, "materiales WHERE tipo = 'telas'");
   $showAccesories = obtenerDatos($con, 'accesorios');
   $showProviders = obtenerDatos($con, 'proveedores');
} catch (Exception $e) {
   die($e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Verificar si se debe agregar una nueva categoría
        if (isset($_POST['hidden-category']) && $_POST['hidden-category'] == 'on') {
            $nombreCategoria = htmlspecialchars($_POST['nombreCategoria']);
            $n_modulos = filter_var($_POST['n_modulos'], FILTER_VALIDATE_INT);
            $categoria_id = insertarCategoria($con, $nombreCategoria, $n_modulos);
        } else {
            $categoria_id = filter_var($_POST['categoria_id'], FILTER_VALIDATE_INT);
        }

        // Verificar si se debe agregar un nuevo tipo de producto
        if (isset($_POST['hidden-type-product']) && $_POST['hidden-type-product'] == 'on') {
            $nombreTipoProducto = htmlspecialchars($_POST['name_new_type']);
            $tipoProducto_id = insertarTipoProducto($con, $nombreTipoProducto);
        } else {
            $tipoProducto_id = filter_var($_POST['tipoProducto_id'], FILTER_VALIDATE_INT);
        }

        // Verificar si se debe agregar un nuevo color
        if (isset($_POST['hidden-color-select']) && $_POST['hidden-color-select'] == 'on') {
            $nombreColor = htmlspecialchars($_POST['nombre_color']);
            $hex_color = htmlspecialchars($_POST['hex_color']);
            $color_id = insertarColor($con, $nombreColor, $hex_color);
        } else {
            $color_id = filter_var($_POST['color_id'], FILTER_VALIDATE_INT);
        }

        // Obtener y sanitizar los valores del formulario
        $datos = [
            'nombre_producto' => htmlspecialchars($_POST['nombre_producto']),
            'categoria_id' => $categoria_id,
            'existencia' => filter_var($_POST['existencia'], FILTER_VALIDATE_INT),
            'descripcion' => htmlspecialchars($_POST['descripcion']),
            'tipoProducto_id' => $tipoProducto_id,
            'color_id' => $color_id,
            'relleno_id' => filter_var($_POST['relleno_id'], FILTER_VALIDATE_INT),
            'madera_id' => filter_var($_POST['madera_id'], FILTER_VALIDATE_INT),
            'patas_id' => filter_var($_POST['patas_id'], FILTER_VALIDATE_INT),
            'telas_id' => filter_var($_POST['telas_id'], FILTER_VALIDATE_INT),
            'precio' => filter_var($_POST['precio'], FILTER_VALIDATE_FLOAT),
            'precioVenta' => filter_var($_POST['precioVenta'], FILTER_VALIDATE_FLOAT),
            'proveedor_id' => filter_var($_POST['proveedor_id'], FILTER_VALIDATE_INT),
            'fechaCompra' => htmlspecialchars($_POST['fechaCompra']),
            'garantia' => htmlspecialchars($_POST['garantia'])
        ];

        // Insertar el producto
        $producto_id = insertarProducto($con, $datos);

        // Función para manejar la subida de imágenes con prefijo
        function manejarSubidaImagen($con, $input_name, $producto_id, $nombre_producto, $prefijo) {
            if (isset($_FILES[$input_name]) && $_FILES[$input_name]['error'] == UPLOAD_ERR_OK) {
                $imagen = $_FILES[$input_name];
                $extension = pathinfo($imagen['name'], PATHINFO_EXTENSION);
                $nombre_imagen = $prefijo . '_' . uniqid() . '.' . $extension;
                $ruta_carpeta = "../backend/media/admin/product/linea/" . $nombre_producto;
                $ruta_imagen = $ruta_carpeta . "/" . $nombre_imagen;
                $ruta_imagen_bd = "backend/media/admin/product/linea/" . $nombre_producto . "/" . $nombre_imagen;

                // Verificar si la carpeta existe, si no, crearla
                if (!is_dir($ruta_carpeta)) {
                    mkdir($ruta_carpeta, 0777, true);
                }

                if (!move_uploaded_file($imagen['tmp_name'], $ruta_imagen)) {
                    throw new Exception("Error al mover la imagen subida.");
                }

                // Insertar la imagen en la tabla imagenes_productos
                insertarImagen($con, $ruta_imagen_bd, $producto_id, $nombre_imagen);
            }
        }

        // Manejar la subida de las imágenes con prefijos
        manejarSubidaImagen($con, 'imageUpload-front', $producto_id, $datos['nombre_producto'], 'front');
        manejarSubidaImagen($con, 'left-view-product', $producto_id, $datos['nombre_producto'], 'left');
        manejarSubidaImagen($con, 'straight-view-product', $producto_id, $datos['nombre_producto'], 'straight');
        manejarSubidaImagen($con, 'right-view-product', $producto_id, $datos['nombre_producto'], 'right');
        manejarSubidaImagen($con, 'back-view-product', $producto_id, $datos['nombre_producto'], 'back');
        /* Opcionales  */
        if (isset($_FILES['detail-product']) && $_FILES['detail-product']['error'] == UPLOAD_ERR_OK) {
            manejarSubidaImagen($con, 'detail-product', $producto_id, $datos['nombre_producto'], 'dt');
        }
        if (isset($_FILES['complete-product']) && $_FILES['complete-product']['error'] == UPLOAD_ERR_OK) {
            manejarSubidaImagen($con, 'complete-product', $producto_id, $datos['nombre_producto'], 'cmp');
        }

        // Redirigir a una página de confirmación
        echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=productos&mensaje=Producto agregado exitosamente">';

    } catch (Exception $e) {
        die($e->getMessage());
    } 

    // Cerrar la conexión
    $con->close();
}
?>


<!-- Estilos para los inputs tipo imagenes --> 
<link rel="stylesheet" href="./css/files.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<!-- <link rel="stylesheet" href="./agregarProducto.css"> -->

<!-- Bootstrap Switch -->

<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
   

   <!-- <div class="alert alert-danger" role="alert">
      Procesando.. 
    </div> -->

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
                     <form id="formValidated" action="panel.php?modulo=agregarProductos" method="POST" enctype="multipart/form-data">
                        <div class="row ">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <div class="">
                                    <h2>Información del producto</h2>
                                 </div>
                                 
                                 <div class="form-group active-full">
                                    <label for="nombre_producto">Nombre del Producto</label>
                                    <input type="text" name="nombre_producto" id="nombre_producto" class="form-control" required>
                                 </div>

                                 <div class="form-group active-full" style="margin-top: -1vh;">
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
                                 
                                 <div id="category-container" class="w-100">
                                     <div class="form-group d-flex justify-content-between w-100">
                                         <div class="form-group w-50" style="margin-top: -1vh;">
                                             <label class="category-iluminate">Nombre de la categoria</label>
                                             <input type="text" name="nombreCategoria" class="form-control">
                                         </div>
                                         <div class="form-group w-10" style="margin-top: -1vh;">
                                             <label class="category-iluminate">Cantidad de modulos</label>
                                             <input type="number" name="n_modulos" class="form-control" min="1">
                                         </div>
                                     </div>
                                 </div>

                                 

                              </div>
                              
                                 
                                 <!-- Añadir más instancias aquí -->
                                 <div class="product-upload" style="max-width: 100%;  margin-top: -1vh;" id="container-imageUpload-front">
                                    <div class="product-edit">
                                       <input type="file" name="imageUpload-front" id="imageUpload-front" class="image-upload-input" accept=".png, .jpg, .jpeg" required>
                                       <label for="imageUpload-front"></label>
                                    </div>
                                    <div class="product-preview drop-area" style="width: 100%; height: 36vh; border-radius: 5px;">
                                       <div class="image-preview dropzone-desc" style="border-radius: 5px;">
                                          <i class="fa fa-image"></i>
                                          <p>Frontal</p>
                                       </div>
                                       <div class="loading-container" style="display: none;">
                                          <div></div>
                                          <div class="checkmark-container" style="display: none;">
                                             <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                                             </svg>
                                          </div>
                                          <div class="error-container" style="display: none;">
                                             <svg class="error-mark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                <circle class="error-mark__circle" cx="26" cy="26" r="25" fill="none"/>
                                                <line class="error-mark__line" x1="16" y1="16" x2="36" y2="36"/>
                                                <line class="error-mark__line" x1="36" y1="16" x2="16" y2="36"/>
                                             </svg>
                                          </div>
                                       </div>
                                    </div>
                                 </div> <!-- Fin del contendor puntedo -->

                                 <!-- Añadir más instancias aquí -->
                                 <div class="product-upload" style="max-width: 100%; display: none; margin-top: -1vh;" id="container-left-view-product">
                                    <div class="product-edit">
                                       <input type="file" name="left-view-product" id="left-view-product" class="image-upload-input" accept=".png, .jpg, .jpeg" required>
                                       <label for="left-view-product"></label>
                                    </div>
                                    <div class="product-preview drop-area" style="width: 100%; height: 36vh; border-radius: 5px;">
                                       <div class="image-preview dropzone-desc" style="border-radius: 5px;">
                                          <i class="fa fa-image"></i>
                                          <p>Vista lateral Izquierda</p>
                                       </div>
                                       <div class="loading-container" style="display: none;">
                                          <div></div>
                                          <div class="checkmark-container" style="display: none;">
                                             <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                                             </svg>
                                          </div>
                                          <div class="error-container" style="display: none;">
                                             <svg class="error-mark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                <circle class="error-mark__circle" cx="26" cy="26" r="25" fill="none"/>
                                                <line class="error-mark__line" x1="16" y1="16" x2="36" y2="36"/>
                                                <line class="error-mark__line" x1="36" y1="16" x2="16" y2="36"/>
                                             </svg>
                                          </div>
                                       </div>
                                    </div>
                                 </div> <!-- Fin del contendor puntedo -->


                              <!-- Añadir más instancias aquí -->
                                 <div class="product-upload" style="max-width: 100%; display: none; margin-top: -1vh;" id="container-straight-view-product">
                                    <div class="product-edit">
                                       <input type="file" name="straight-view-product" id="straight-view-product" class="image-upload-input" accept=".png, .jpg, .jpeg" required>
                                       <label for="straight-view-product"></label>
                                    </div>
                                    <div class="product-preview drop-area" style="width: 100%; height: 36vh; border-radius: 5px;">
                                       <div class="image-preview dropzone-desc" style="border-radius: 5px;">
                                          <i class="fa fa-image"></i>
                                          <p>Vista recta</p>
                                       </div>
                                       <div class="loading-container" style="display: none;">
                                          <div></div>
                                          <div class="checkmark-container" style="display: none;">
                                             <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                                             </svg>
                                          </div>
                                          <div class="error-container" style="display: none;">
                                             <svg class="error-mark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                <circle class="error-mark__circle" cx="26" cy="26" r="25" fill="none"/>
                                                <line class="error-mark__line" x1="16" y1="16" x2="36" y2="36"/>
                                                <line class="error-mark__line" x1="36" y1="16" x2="16" y2="36"/>
                                             </svg>
                                          </div>
                                       </div>
                                    </div>
                                 </div> <!-- Fin del contendor puntedo -->

                                 <!-- Añadir más instancias aquí -->
                                 <div class="product-upload" style="max-width: 100%; display: none; margin-top: -1vh;" id="container-right-view-product">
                                    <div class="product-edit">
                                       <input type="file" name="right-view-product" id="right-view-product" class="image-upload-input" accept=".png, .jpg, .jpeg" required>
                                       <label for="right-view-product"></label>
                                    </div>
                                    <div class="product-preview drop-area" style="width: 100%; height: 36vh; border-radius: 5px;">
                                       <div class="image-preview dropzone-desc" style="border-radius: 5px;">
                                          <i class="fa fa-image"></i>
                                          <p>Vista lateral derecha</p>
                                       </div>
                                       <div class="loading-container" style="display: none;">
                                          <div></div>
                                          <div class="checkmark-container" style="display: none;">
                                             <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                                             </svg>
                                          </div>
                                          <div class="error-container" style="display: none;">
                                             <svg class="error-mark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                <circle class="error-mark__circle" cx="26" cy="26" r="25" fill="none"/>
                                                <line class="error-mark__line" x1="16" y1="16" x2="36" y2="36"/>
                                                <line class="error-mark__line" x1="36" y1="16" x2="16" y2="36"/>
                                             </svg>
                                          </div>
                                       </div>
                                    </div>
                                 </div> <!-- Fin del contendor puntedo -->

                                 <!-- Añadir más instancias aquí -->
                                    <div class="product-upload" style="max-width: 100%; display: none; margin-top: -1vh;" id="container-back-view-product">
                                    <div class="product-edit">
                                       <input type="file" name="back-view-product" id="back-view-product" class="image-upload-input" accept=".png, .jpg, .jpeg" required>
                                       <label for="back-view-product"></label>
                                    </div>
                                    <div class="product-preview drop-area" style="width: 100%; height: 36vh; border-radius: 5px;">
                                       <div class="image-preview dropzone-desc" style="border-radius: 5px;">
                                          <i class="fa fa-image"></i>
                                          <p>Vista trasera</p>
                                       </div>
                                       <div class="loading-container" style="display: none;">
                                          <div></div>
                                          <div class="checkmark-container" style="display: none;">
                                             <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                                             </svg>
                                          </div>
                                          <div class="error-container" style="display: none;">
                                             <svg class="error-mark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                <circle class="error-mark__circle" cx="26" cy="26" r="25" fill="none"/>
                                                <line class="error-mark__line" x1="16" y1="16" x2="36" y2="36"/>
                                                <line class="error-mark__line" x1="36" y1="16" x2="16" y2="36"/>
                                             </svg>
                                          </div>
                                       </div>
                                    </div>
                                 </div> <!-- Fin del contendor puntedo -->

                                    <!-- Añadir más instancias aquí -->
                                          <div class="product-upload" style="max-width: 100%; display: none; margin-top: -1vh;" id="container-complete-product">
                                             <div class="product-edit">
                                                <input type="file" name="complete-product" id="complete-product" class="image-upload-input" accept=".png, .jpg, .jpeg" >
                                                <label for="complete-product"></label>
                                             </div>
                                             <div class="product-preview drop-area" style="width: 100%; height: 36vh; border-radius: 5px;">
                                                <div class="image-preview dropzone-desc" style="border-radius: 5px;">
                                                   <i class="fa fa-image"></i>
                                                   <p>Sala completa</p>
                                                </div>
                                                <div class="loading-container" style="display: none;">
                                                   <div></div>
                                                   <div class="checkmark-container" style="display: none;">
                                                      <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                         <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                                                         <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                                                      </svg>
                                                   </div>
                                                   <div class="error-container" style="display: none;">
                                                      <svg class="error-mark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                         <circle class="error-mark__circle" cx="26" cy="26" r="25" fill="none"/>
                                                         <line class="error-mark__line" x1="16" y1="16" x2="36" y2="36"/>
                                                         <line class="error-mark__line" x1="36" y1="16" x2="16" y2="36"/>
                                                      </svg>
                                                   </div>
                                                </div>
                                             </div>
                                          </div> <!-- Fin del contendor puntedo -->
                                          
                                          <!-- Añadir más instancias aquí -->
                                          <div class="product-upload" style="max-width: 100%; display: none; margin-top: -1vh;" id="container-detail-product">
                                             <div class="product-edit">
                                                <input type="file" name="detail-product" id="detail-product" class="image-upload-input" accept=".png, .jpg, .jpeg" >
                                                <label for="detail-product"></label>
                                             </div>
                                             <div class="product-preview drop-area" style="width: 100%; height: 36vh; border-radius: 5px;">
                                                <div class="image-preview dropzone-desc" style="border-radius: 5px;">
                                                   <i class="fa fa-image"></i>
                                                   <p>Foto detalle</p>
                                                </div>
                                                <div class="loading-container" style="display: none;">
                                                   <div></div>
                                                   <div class="checkmark-container" style="display: none;">
                                                      <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                         <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                                                         <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                                                      </svg>
                                                   </div>
                                                   <div class="error-container" style="display: none;">
                                                      <svg class="error-mark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                         <circle class="error-mark__circle" cx="26" cy="26" r="25" fill="none"/>
                                                         <line class="error-mark__line" x1="16" y1="16" x2="36" y2="36"/>
                                                         <line class="error-mark__line" x1="36" y1="16" x2="16" y2="36"/>
                                                      </svg>
                                                   </div>
                                                </div>
                                             </div>
                                          </div> <!-- Fin del contendor puntedo -->  

                                                                        
                                       <div class="row justify-content-around" style="margin-top: -3vh;">
                                           <div class="col mb-3 d-flex justify-content-center">
                                               <button type="button" class="image-btn btn btn-secondary w-100 text-truncate d-flex align-items-center justify-content-center" style="height: auto;" data-target="container-imageUpload-front">
                                                   <div class="d-flex flex-md-row flex-column align-items-center">
                                                       <span class="fa fa-image"></span>
                                                       <span class="d-md-inline d-none ml-1">F</span>
                                                       <span class="d-md-none d-inline">F</span>
                                                   </div>
                                               </button>
                                           </div>
                                           <div class="col mb-3 d-flex justify-content-center">
                                               <button type="button" class="image-btn btn btn-secondary w-100 text-truncate d-flex align-items-center justify-content-center" style="height: auto;" data-target="container-left-view-product">
                                                   <div class="d-flex flex-md-row flex-column align-items-center">
                                                       <span class="fa fa-image"></span>
                                                       <span class="d-md-inline d-none ml-1">LI</span>
                                                       <span class="d-md-none d-inline">LI</span>
                                                   </div>
                                               </button>
                                           </div>
                                           <div class="col mb-3 d-flex justify-content-center">
                                               <button type="button" class="image-btn btn btn-secondary w-100 text-truncate d-flex align-items-center justify-content-center" style="height: auto;" data-target="container-straight-view-product">
                                                   <div class="d-flex flex-md-row flex-column align-items-center">
                                                       <span class="fa fa-image"></span>
                                                       <span class="d-md-inline d-none ml-1">R</span>
                                                       <span class="d-md-none d-inline">R</span>
                                                   </div>
                                               </button>
                                           </div>
                                           <div class="col mb-3 d-flex justify-content-center">
                                               <button type="button" class="image-btn btn btn-secondary w-100 text-truncate d-flex align-items-center justify-content-center" style="height: auto;" data-target="container-right-view-product">
                                                   <div class="d-flex flex-md-row flex-column align-items-center">
                                                       <span class="fa fa-image"></span>
                                                       <span class="d-md-inline d-none ml-1">LD</span>
                                                       <span class="d-md-none d-inline">LD</span>
                                                   </div>
                                               </button>
                                           </div>
                                           <div class="col mb-3 d-flex justify-content-center">
                                               <button type="button" class="image-btn btn btn-secondary w-100 text-truncate d-flex align-items-center justify-content-center" style="height: auto;" data-target="container-back-view-product">
                                                   <div class="d-flex flex-md-row flex-column align-items-center">
                                                       <span class="fa fa-image"></span>
                                                       <span class="d-md-inline d-none ml-1">T</span>
                                                       <span class="d-md-none d-inline">T</span>
                                                   </div>
                                               </button>
                                           </div>
                                           <div class="col mb-3 d-flex justify-content-center d-none" id="button-complete-product-container">
                                               <button type="button" class="image-btn btn btn-secondary w-100 text-truncate d-flex align-items-center justify-content-center" style="height: auto;" data-target="container-complete-product">
                                                   <div class="d-flex flex-md-row flex-column align-items-center">
                                                       <span class="fa fa-image"></span>
                                                       <span class="d-md-inline d-none ml-1">C</span>
                                                       <span class="d-md-none d-inline">CMP</span>
                                                   </div>
                                               </button>
                                           </div>
                                           <div class="col mb-3 d-flex justify-content-center d-none" id="button-detail-product-container">
                                               <button type="button" class="image-btn btn btn-secondary w-100 text-truncate d-flex align-items-center justify-content-center" style="height: auto;" data-target="container-detail-product">
                                                   <div class="d-flex flex-md-row flex-column align-items-center">
                                                       <span class="fa fa-image"></span>
                                                       <span class="d-md-inline d-none ml-1">DT</span>
                                                       <span class="d-md-none d-inline">DT</span>
                                                   </div>
                                               </button>
                                           </div>
                                       </div>
                                                               
                                 
                              
                             
                                    </div> <!-- Fin del grupo form -->


                                    <div class="form-group d-flex justify-content-between" style="margin-top: -2vh;">
                                       <div class="form-check form-switch ml-2 d-inline-block">
                                          <input class="form-check-input" type="checkbox" role="switch" id="check-complete-product" name="check-complete-product">
                                          <label class="form-check-label" for="check-complete-product">¿Es una sala completa?</label>
                                       </div>

                                       <div class="form-check form-switch mr-3 d-inline-block">
                                          <input class="form-check-input" type="checkbox" role="switch" id="check-detail-product" name="check-detail-product">
                                          <label class="form-check-label" for="check-detail-product">¿Tiene detalle en la tela?</label>
                                       </div>
                                    </div>                                                


                              <div class="form-group">
                                       <label>Estado del producto</label>
                                      <div class="form-group d-flex justify-content-between">
                                        <div class="form-check form-switch ml-2 d-inline-block">
                                          <input class="form-check-input" type="checkbox" role="switch" id="active_venta" name="active_venta">
                                          <label class="form-check-label" for="active_venta">Activar venta del producto</label>
                                        </div>

                                        <div class="form-check form-switch mr-3 d-inline-block">
                                          <input class="form-check-input" type="checkbox" role="switch" id="marketadd_product" name="marketadd_product">
                                          <label class="form-check-label" for="marketadd_product">Promocionar</label>
                                        </div>
                                      </div>
                              </div>

                              <div class="form-group active-full">
                                 <label for="existencia">Existencias</label>
                                 <input type="number" name="existencia" id="existencia" class="form-control" min="1" required>
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
                                    <div class="form-group" style="margin-top: -1vh;">
                                       <label>Nombre del tipo de producto</label>
                                       <input type="text" name="name_new_type" class="form-control">
                                    </div>
                                 </div>
                              </div>
                           </div>

                           <div class="col-md-4 ml-md-3 ml-0">
                              <div class="form-group active-full">
                                  <label for="color_id">Color</label>
                                  <div id="color-select-main">
                                      <div class="input-group">
                                          <select name="color_id" id="color_id" class="form-control" required>
                                              <option value="" selected disabled>Selecciona el color</option>
            
                                                   <?php
                                                   if ($showColors->num_rows > 0) {
                                                      // Salida de datos de cada fila
                                                      while($row = $showColors->fetch_assoc()) {
                                                         echo "<option value='" . $row["id"] . "' data-hex='" . $row["hex_color"] . "'>" . $row["nombre"] . "</option>";
                                                      }
                                                   } else {
                                                      echo "<option value='' disabled>No hay colores disponibles</option>";
                                                   }
                                                   ?>
                                          </select>
                                          <div class="input-group-append">
                                              <span class="input-group-text"><i class="selectColor" style="font-size: 80px; margin-top:-13px; line-height: 0;">&#8226;</i></span>
                                          </div>
 
                                    </div>
                                    <div class="form-group d-flex align-items-center">
                                       <small class="label-color-select">¿Desea añadir otra color?</small>
                                       <input type="checkbox" id="hidden-color-select" name="hidden-color-select" class="form-control" style="height: auto; width: auto; display: inline-block; margin-left: 10px;">
                                    </div>

                                    <div id="color-container">
                                       <div class="d-flex justify-content-between">
                                       <div class="form-group" style="margin-top: -1vh;">  
                                         <label>Color nuevo</label>
                                         <input type="text" name="nombre_color" class="form-control">
                                       </div>

                                       <div class="form-group" style="margin-top: -1vh;">
                                         <label>Aproxima el tono de color</label>
                                         <div class="input-group my-colorpicker2">
                                           <input type="text" class="form-control" name="hex_color">
                                           <div class="input-group-append">
                                             <span class="input-group-text"><i class="fas fa-square"></i></span>
                                           </div>
                                         </div>
                                         <!-- /.input group -->
                                       </div>
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
                                    <div class="form-group d-flex justify-content-between">

                                       <div class="form-group mr-4">
                                       <label>Largo</label>
                                       <div class="input-group">
                                          <input type="number" name="largo" class="form-control input-change" min="0">
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
                                          <input type="number" name="largo-asiento" class="form-control input-change" min="0">
                                          <div class="input-group-append">
                                             <span class="input-group-text">
                                             <small class="mr-2">Cm</small>
                                             <i class="fas fa-ruler icon-color-change"></i>
                                             </span>
                                          </div>
                                       </div>
                                       </div>

                                    </div>


                                    <div class="form-group d-flex justify-content-between">
                                    <div class="form-group mr-4">
                                       <label>Fondo</label>
                                       <div class="input-group">
                                          <input type="number" name="fondo" class="form-control input-change" min="0">
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
                                          <input type="number" name="fondo-asiento" class="form-control input-change" min="0">
                                          <div class="input-group-append">
                                             <span class="input-group-text">
                                             <small class="mr-2">Cm</small>
                                             <i class="fas fa-ruler icon-color-change"></i>
                                             </span>
                                          </div>
                                       </div>
                                    </div>
                                    </div>


                                    <div class="form-group d-flex justify-content-between">
                                    <div class="form-group mr-4">
                                       <label>Ancho del Brazo</label>
                                       <div class="input-group">
                                          <input type="number" name="ancho-brazo" class="form-control input-change" min="0">
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
                                          <input type="number" name="ancho-respaldo" class="form-control input-change" min="0">
                                          <div class="input-group-append">
                                             <span class="input-group-text">
                                             <small class="mr-2">Cm</small>
                                             <i class="fas fa-ruler icon-color-change"></i>
                                             </span>
                                          </div>
                                       </div>
                                    </div>
                                    </div>

                                    <div class="form-group d-flex justify-content-between">
                                    <div class="form-group mr-4">
                                       <label>Altura</label>
                                       <div class="input-group">
                                          <input type="number" name="altura" class="form-control input-change" min="0">
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
                                          <input type="number" name="altura-casco" class="form-control input-change" min="0">
                                          <div class="input-group-append">
                                             <span class="input-group-text">
                                             <small class="mr-2">Cm</small>
                                             <i class="fas fa-ruler icon-color-change"></i>
                                             </span>
                                          </div>
                                       </div>
                                    </div>
                                    </div>

                                    <div class="form-group d-flex justify-between">
                                    <div class="form-group mr-4">
                                       <label>Altura al brazo</label>
                                       <div class="input-group">
                                          <input type="number" name="altura-brazo" class="form-control input-change" min="0">
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
                                          <input type="number" name="altura-asiento" class="form-control input-change" min="0">
                                          <div class="input-group-append">
                                             <span class="input-group-text">
                                             <small class="mr-2">Cm</small>
                                             <i class="fas fa-ruler icon-color-change"></i>
                                             </span>
                                          </div>
                                       </div>
                                    </div>
                                    </div>

                                    <div class="form-group d-flex justify-content-between">
                                    <div class="form-group mr-4">
                                       <label>Altura a la pata</label>
                                       <div class="input-group">
                                          <input type="number" name="altura-casco" class="form-control input-change" min="0">
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
                                          <input type="number" name="altura-respaldo" class="form-control input-change" min="0">
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

                              </div> <!-- Fin medidas -->

                              <div class="form-group active-full">
                                 <label>Peso</label>
                                 <div class="input-group">
                                    <input type="number" name="peso" class="form-control input-change" min="0">
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
                              <div class="form-group d-flex justify-content-between">
                              <div class="form-group active-full">
                                 <label>Precio Compra</label>
                                 <div class="input-group">
                                    <input type="number" name="precio" id="precio" class="form-control input-change" min="100">
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
                                    <input type="number" name="precioVenta" id="precioVenta" class="form-control input-change" min="4000">
                                    <div class="input-group-append">
                                       <span class="input-group-text">
                                       <i class="fas fa-dollar-sign icon-color-change"></i>
                                       </span>
                                    </div>
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
                           <div class="col-md-4" style="margin-left: -1.5vw;">
                              <!-- Div con bordes 100% del ancho y 60vh de alto -->
                              <div class="d-flex flex-column justify-content-center align-items-center" style="padding: 1em;">
                                 <!-- Contenido del div -->
                                 <div id="phone-view-1" data-src="http://localhost/sensi/view.e.html" class="d-none d-md-block" style="width: 70%; height: 100%;"></div>
                                 <!-- <button type="submit" class="btn btn-primary btn-smg mt-0 mt-md-3" name="guardar">Agregar producto</button> -->
                                 <button type="submit" name="guardar" class="btn btn-secondary mt-2">Guardar</button>
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
   <script src="./middleware/show.complete.product.js"></script>
   
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

   <script src="./middleware/hidden.inputs.images.js"></script>

   <script>
        // Función para cambiar el color de la clase .selectColor
        function changeColor(hexColor) {
            const elements = document.querySelectorAll('.selectColor');
            elements.forEach(element => {
                element.style.color = hexColor;
            });
        }

        // Cambiar el color del icono basado en la selección del usuario
        document.getElementById('color_id').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const hexColor = selectedOption.getAttribute('data-hex');
            changeColor(hexColor);
        });
    </script>
   
   <!-- RDLS -->
    


   
</div>