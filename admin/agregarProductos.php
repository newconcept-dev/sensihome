<?php
include_once 'db.php';

// Función para obtener datos de una tabla
function obtenerDatos($con, $tabla)
{
    $campos = ($tabla === 'color') ? 'id, nombre, hex_color' : 'id, nombre';
    $sql = "SELECT $campos FROM $tabla";
    $result = $con->query($sql);
    if (!$result) {
        throw new Exception("Error al obtener datos de $tabla: " . $con->error);
    }
    return $result;
}

// Función genérica para insertar materiales
function insertarMaterial($con, $nombre, $tipo)
{
    $sql = "INSERT INTO materiales (nombre, tipo) VALUES (?, ?)";
    $stmt = $con->prepare($sql);
    if (!$stmt) {
        throw new Exception("Error en la preparación: " . $con->error);
    }
    $stmt->bind_param("ss", $nombre, $tipo);
    if (!$stmt->execute()) {
        throw new Exception("Error en la ejecución: " . $stmt->error);
    }
    $material_id = $stmt->insert_id;
    $stmt->close();
    return $material_id;
}

// Función para insertar un producto
function insertarProducto($con, $datos)
{
    $sql = "INSERT INTO productos (nombre_producto, categoria_id, existencia, descripcion, tipoProducto_id, color_id, relleno_id, madera_id, patas_id, telas_id, precio, precioVenta, proveedor_id, fechaCompra, garantia, status, promocionar) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    if (!$stmt) {
        throw new Exception("Error en la preparación: " . $con->error);
    }
    $stmt->bind_param("siissiiiiidisssss", ...array_values($datos));
    if (!$stmt->execute()) {
        throw new Exception("Error en la ejecución: " . $stmt->error);
    }
    $producto_id = $stmt->insert_id;
    $stmt->close();
    return $producto_id;
}

// Función para insertar una imagen
function insertarImagen($con, $ruta, $producto_id, $frontend_id)
{
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

// Función para insertar un accesorio
function insertarAccesorio($con, $producto_id, $accesorio_id, $cantidad)
{
    $sql = "INSERT INTO productos_accesorios (producto_id, accesorio_id, cantidad) VALUES (?, ?, ?)";
    $stmt = $con->prepare($sql);
    if (!$stmt) {
        throw new Exception("Error en la preparación: " . $con->error);
    }
    $stmt->bind_param("iii", $producto_id, $accesorio_id, $cantidad);
    if (!$stmt->execute()) {
        throw new Exception("Error en la ejecución: " . $stmt->error);
    }
    $stmt->close();
}

// Función para insertar un color
function insertarColor($con, $nombre, $hex_color)
{
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
        // Función para verificar y agregar nuevos materiales
        function verificarYAgregarMaterial($con, $input_name, $nuevo_nombre, $tipo)
        {
            if (isset($_POST[$input_name]) && $_POST[$input_name] == 'on') {
                $nombre = htmlspecialchars($_POST[$nuevo_nombre]);
                return insertarMaterial($con, $nombre, $tipo);
            } else {
                return filter_var($_POST["{$tipo}_id"], FILTER_VALIDATE_INT);
            }
        }

        // Verificar y agregar nuevos materiales
        $relleno_id = verificarYAgregarMaterial($con, 'material-relleno-input', 'nuevo_relleno', 'relleno');
        $madera_id = verificarYAgregarMaterial($con, 'material-madera-input', 'nueva_madera', 'madera');
        $patas_id = verificarYAgregarMaterial($con, 'material-patas-input', 'nueva_pata', 'patas');
        $telas_id = verificarYAgregarMaterial($con, 'material-telas-input', 'nueva_tela', 'telas');

        // Verificar y agregar otros datos
        $categoria_id = isset($_POST['hidden-category']) && $_POST['hidden-category'] == 'on' ? insertarCategoria($con, htmlspecialchars($_POST['nombreCategoria']), filter_var($_POST['n_modulos'], FILTER_VALIDATE_INT)) : filter_var($_POST['categoria_id'], FILTER_VALIDATE_INT);
        $tipoProducto_id = isset($_POST['hidden-type-product']) && $_POST['hidden-type-product'] == 'on' ? insertarTipoProducto($con, htmlspecialchars($_POST['name_new_type'])) : filter_var($_POST['tipoProducto_id'], FILTER_VALIDATE_INT);
        $color_id = isset($_POST['hidden-color-select']) && $_POST['hidden-color-select'] == 'on' ? insertarColor($con, htmlspecialchars($_POST['nombre_color']), htmlspecialchars($_POST['hex_color'])) : filter_var($_POST['color_id'], FILTER_VALIDATE_INT);

        // Determinar el valor de los campos status y promocionar
        $status = 'INA'; // Valor predeterminado
        $promocionar = 'NO'; // Valor predeterminado
        if (isset($_POST['active_venta']) && $_POST['active_venta'] == 'on') {
            $status = 'ENV';
        }
        if (isset($_POST['marketadd_product']) && $_POST['marketadd_product'] == 'on') {
            $promocionar = 'PRO';
        }

        // Obtener y sanitizar los valores del formulario
        $datos = [
            'nombre_producto' => htmlspecialchars($_POST['nombre_producto']),
            'categoria_id' => $categoria_id,
            'existencia' => filter_var($_POST['existencia'], FILTER_VALIDATE_INT),
            'descripcion' => htmlspecialchars($_POST['descripcion']),
            'tipoProducto_id' => $tipoProducto_id,
            'color_id' => $color_id,
            'relleno_id' => $relleno_id,
            'madera_id' => $madera_id,
            'patas_id' => $patas_id,
            'telas_id' => $telas_id,
            'precio' => filter_var($_POST['precio'], FILTER_VALIDATE_FLOAT),
            'precioVenta' => filter_var($_POST['precioVenta'], FILTER_VALIDATE_FLOAT),
            'proveedor_id' => filter_var($_POST['proveedor_id'], FILTER_VALIDATE_INT),
            'fechaCompra' => htmlspecialchars($_POST['fechaCompra']),
            'garantia' => htmlspecialchars($_POST['garantia']),
            'status' => $status,
            'promocionar' => $promocionar
        ];

        // Insertar el producto
        $producto_id = insertarProducto($con, $datos);

        // Verificar y agregar accesorios
        if (isset($_POST['plugins-inputs']) && $_POST['plugins-inputs'] == 'on') {
            $accesorio_id = filter_var($_POST['accesorios_select'], FILTER_VALIDATE_INT);
            $cantidad = filter_var($_POST['accesorios_cantidad'], FILTER_VALIDATE_INT);
            if ($accesorio_id && $cantidad) {
                insertarAccesorio($con, $producto_id, $accesorio_id, $cantidad);
            }
        }

        // Función para manejar la subida de imágenes con prefijo
        function manejarSubidaImagen($con, $input_name, $producto_id, $nombre_producto, $prefijo)
        {
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
        $imagenes = [
            'imageUpload-front' => 'front',
            'left-view-product' => 'left',
            'module-intermediate-li' => 'mili',
            'right-view-product' => 'right',
            'module-intermediate-ld' => 'mild',
            'detail-product' => 'dt',
            'back-view-product' => 'back',
            'complete-product' => 'cmp',
            'box-view-product' => 'box',
            'backrest-view-product' => 'backrest',
            'furnitureset-view-product' => 'furnitureset'
        ];
        foreach ($imagenes as $input_name => $prefijo) {
            if (isset($_FILES[$input_name]) && $_FILES[$input_name]['error'] == UPLOAD_ERR_OK) {
                manejarSubidaImagen($con, $input_name, $producto_id, $datos['nombre_producto'], $prefijo);
            }
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
<link rel="stylesheet" href="./css/agregarProdcutos.css">

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<!-- <link rel="stylesheet" href="./agregarProducto.css"> -->



<!-- Bootstrap Switch -->

<div class="content-wrapper">

    <div class="alert alert-success backup" role="alert">
        <i class="fa fa-pencil"></i>
        Editando con informacion recuperada
    </div>

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
                                                            while ($row = $showCategory->fetch_assoc()) {
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
                                            <div class="hidden-container-info" id="hidden-container-info">
                                                <div class="container-info" style="max-width: 100%;  margin-top: -1vh; " id="container-info">
                                                    <div class="product-edit">

                                                        <label for="imageUpload-front"></label>
                                                    </div>
                                                    <div class="" style="width: 100%; height: 36vh; border-radius: 5px;">
                                                        <div class="image-preview dropzone-desc" style="border-radius: 5px;">

                                                            <p>Seleccione una seccion para subir imagen</p>
                                                            <i class="fa fa-arrow-down"></i>
                                                        </div>

                                                    </div>
                                                </div> <!-- Fin del contendor puntedo -->
                                            </div>

                                            <!-- Añadir más instancias aquí -->
                                            <div class="product-upload" style="max-width: 100%;  margin-top: -1vh; display:none;" id="container-imageUpload-front">
                                                <div class="product-edit">
                                                    <input type="file" name="imageUpload-front" id="imageUpload-front" class="image-upload-input" accept=".png, .jpg, .jpeg">
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
                                                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                                                            </svg>
                                                        </div>
                                                        <div class="error-container" style="display: none;">
                                                            <svg class="error-mark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                                <circle class="error-mark__circle" cx="26" cy="26" r="25" fill="none" />
                                                                <line class="error-mark__line" x1="16" y1="16" x2="36" y2="36" />
                                                                <line class="error-mark__line" x1="36" y1="16" x2="16" y2="36" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- Fin del contendor puntedo -->


                                            <!-- Añadir más instancias aquí -->
                                            <div class="product-upload" style="max-width: 100%; display: none; margin-top: -1vh;" id="container-left-view-product">
                                                <div class="product-edit">
                                                    <input type="file" name="left-view-product" id="left-view-product" class="image-upload-input" accept=".png, .jpg, .jpeg">
                                                    <label for="left-view-product"></label>
                                                </div>
                                                <div class="product-preview drop-area" style="width: 100%; height: 36vh; border-radius: 5px;">
                                                    <div class="image-preview dropzone-desc" style="border-radius: 5px;">
                                                        <i class="fa fa-image"></i>
                                                        <p>Modulo lateral Izquierdo</p>
                                                    </div>
                                                    <div class="loading-container" style="display: none;">
                                                        <div></div>
                                                        <div class="checkmark-container" style="display: none;">
                                                            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                                                            </svg>
                                                        </div>
                                                        <div class="error-container" style="display: none;">
                                                            <svg class="error-mark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                                <circle class="error-mark__circle" cx="26" cy="26" r="25" fill="none" />
                                                                <line class="error-mark__line" x1="16" y1="16" x2="36" y2="36" />
                                                                <line class="error-mark__line" x1="36" y1="16" x2="16" y2="36" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- Fin del contendor puntedo -->


                                            <!-- Añadir más instancias aquí -->
                                            <div class="product-upload" style="max-width: 100%; display: none; margin-top: -1vh;" id="container-module-intermediate-li">
                                                <div class="product-edit">
                                                    <input type="file" name="module-intermediate-li" id="module-intermediate-li" class="image-upload-input" accept=".png, .jpg, .jpeg">
                                                    <label for="module-intermediate-li"></label>
                                                </div>
                                                <div class="product-preview drop-area" style="width: 100%; height: 36vh; border-radius: 5px;">
                                                    <div class="image-preview dropzone-desc" style="border-radius: 5px;">
                                                        <i class="fa fa-image"></i>
                                                        <p>Modulo Intermedio</p>
                                                    </div>
                                                    <div class="loading-container" style="display: none;">
                                                        <div></div>
                                                        <div class="checkmark-container" style="display: none;">
                                                            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                                                            </svg>
                                                        </div>
                                                        <div class="error-container" style="display: none;">
                                                            <svg class="error-mark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                                <circle class="error-mark__circle" cx="26" cy="26" r="25" fill="none" />
                                                                <line class="error-mark__line" x1="16" y1="16" x2="36" y2="36" />
                                                                <line class="error-mark__line" x1="36" y1="16" x2="16" y2="36" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- Fin del contendor puntedo -->

                                            <!-- Añadir más instancias aquí -->
                                            <div class="product-upload" style="max-width: 100%; display: none; margin-top: -1vh;" id="container-right-view-product">
                                                <div class="product-edit">
                                                    <input type="file" name="right-view-product" id="right-view-product" class="image-upload-input" accept=".png, .jpg, .jpeg">
                                                    <label for="right-view-product"></label>
                                                </div>
                                                <div class="product-preview drop-area" style="width: 100%; height: 36vh; border-radius: 5px;">
                                                    <div class="image-preview dropzone-desc" style="border-radius: 5px;">
                                                        <i class="fa fa-image"></i>
                                                        <p>Modulo lateral derecho</p>
                                                    </div>
                                                    <div class="loading-container" style="display: none;">
                                                        <div></div>
                                                        <div class="checkmark-container" style="display: none;">
                                                            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                                                            </svg>
                                                        </div>
                                                        <div class="error-container" style="display: none;">
                                                            <svg class="error-mark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                                <circle class="error-mark__circle" cx="26" cy="26" r="25" fill="none" />
                                                                <line class="error-mark__line" x1="16" y1="16" x2="36" y2="36" />
                                                                <line class="error-mark__line" x1="36" y1="16" x2="16" y2="36" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- Fin del contendor puntedo -->

                                            <!-- Añadir más instancias aquí -->
                                            <div class="product-upload" style="max-width: 100%; display: none; margin-top: -1vh;" id="container-module-intermediate-ld">
                                                <div class="product-edit">
                                                    <input type="file" name="module-intermediate-ld" id="module-intermediate-ld" class="image-upload-input" accept=".png, .jpg, .jpeg">
                                                    <label for="module-intermediate-ld"></label>
                                                </div>
                                                <div class="product-preview drop-area" style="width: 100%; height: 36vh; border-radius: 5px;">
                                                    <div class="image-preview dropzone-desc" style="border-radius: 5px;">
                                                        <i class="fa fa-image"></i>
                                                        <p>Modulo intermedio</p>
                                                    </div>
                                                    <div class="loading-container" style="display: none;">
                                                        <div></div>
                                                        <div class="checkmark-container" style="display: none;">
                                                            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                                                            </svg>
                                                        </div>
                                                        <div class="error-container" style="display: none;">
                                                            <svg class="error-mark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                                <circle class="error-mark__circle" cx="26" cy="26" r="25" fill="none" />
                                                                <line class="error-mark__line" x1="16" y1="16" x2="36" y2="36" />
                                                                <line class="error-mark__line" x1="36" y1="16" x2="16" y2="36" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- Fin del contendor puntedo -->

                                            <!-- Añadir más instancias aquí -->
                                            <div class="product-upload" style="max-width: 100%; display: none; margin-top: -1vh;" id="container-complete-product">
                                                <div class="product-edit">
                                                    <input type="file" name="complete-product" id="complete-product" class="image-upload-input" accept=".png, .jpg, .jpeg">
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
                                                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                                                            </svg>
                                                        </div>
                                                        <div class="error-container" style="display: none;">
                                                            <svg class="error-mark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                                <circle class="error-mark__circle" cx="26" cy="26" r="25" fill="none" />
                                                                <line class="error-mark__line" x1="16" y1="16" x2="36" y2="36" />
                                                                <line class="error-mark__line" x1="36" y1="16" x2="16" y2="36" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- Fin del contendor puntedo -->

                                            <!-- Añadir más instancias aquí -->
                                            <div class="product-upload" style="max-width: 100%; display: none; margin-top: -1vh;" id="container-detail-product">
                                                <div class="product-edit">
                                                    <input type="file" name="detail-product" id="detail-product" class="image-upload-input" accept=".png, .jpg, .jpeg">
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
                                                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                                                            </svg>
                                                        </div>
                                                        <div class="error-container" style="display: none;">
                                                            <svg class="error-mark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                                <circle class="error-mark__circle" cx="26" cy="26" r="25" fill="none" />
                                                                <line class="error-mark__line" x1="16" y1="16" x2="36" y2="36" />
                                                                <line class="error-mark__line" x1="36" y1="16" x2="16" y2="36" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- Fin del contendor puntedo -->

                                            <!-- Añadir más instancias aquí -->
                                            <div class="product-upload" style="max-width: 100%; display: none; margin-top: -1vh;" id="container-back-view-product">
                                                <div class="product-edit">
                                                    <input type="file" name="back-view-product" id="back-view-product" class="image-upload-input" accept=".png, .jpg, .jpeg">
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
                                                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                                                            </svg>
                                                        </div>
                                                        <div class="error-container" style="display: none;">
                                                            <svg class="error-mark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                                <circle class="error-mark__circle" cx="26" cy="26" r="25" fill="none" />
                                                                <line class="error-mark__line" x1="16" y1="16" x2="36" y2="36" />
                                                                <line class="error-mark__line" x1="36" y1="16" x2="16" y2="36" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- Fin del contendor puntedo -->


                                            <!-- Añadir más instancias aquí -->
                                            <div class="product-upload" style="max-width: 100%; display: none; margin-top: -1vh;" id="container-box-view-product">
                                                <div class="product-edit">
                                                    <input type="file" name="back-view-product" id="back-view-product" class="image-upload-input" accept=".png, .jpg, .jpeg">
                                                    <label for="back-view-product"></label>
                                                </div>
                                                <div class="product-preview drop-area" style="width: 100%; height: 36vh; border-radius: 5px;">
                                                    <div class="image-preview dropzone-desc" style="border-radius: 5px;">
                                                        <i class="fa fa-image"></i>
                                                        <p>Box</p>
                                                    </div>
                                                    <div class="loading-container" style="display: none;">
                                                        <div></div>
                                                        <div class="checkmark-container" style="display: none;">
                                                            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                                                            </svg>
                                                        </div>
                                                        <div class="error-container" style="display: none;">
                                                            <svg class="error-mark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                                <circle class="error-mark__circle" cx="26" cy="26" r="25" fill="none" />
                                                                <line class="error-mark__line" x1="16" y1="16" x2="36" y2="36" />
                                                                <line class="error-mark__line" x1="36" y1="16" x2="16" y2="36" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- Fin del contendor puntedo -->

                                            <!-- Añadir más instancias aquí -->
                                            <div class="product-upload" style="max-width: 100%; display: none; margin-top: -1vh;" id="container-backrest-view-product">
                                                <div class="product-edit">
                                                    <input type="file" name="backrest-view-product" id="backrest-view-product" class="image-upload-input" accept=".png, .jpg, .jpeg">
                                                    <label for="backrest-view-product"></label>
                                                </div>
                                                <div class="product-preview drop-area" style="width: 100%; height: 36vh; border-radius: 5px;">
                                                    <div class="image-preview dropzone-desc" style="border-radius: 5px;">
                                                        <i class="fa fa-image"></i>
                                                        <p>Respaldo</p>
                                                    </div>
                                                    <div class="loading-container" style="display: none;">
                                                        <div></div>
                                                        <div class="checkmark-container" style="display: none;">
                                                            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                                                            </svg>
                                                        </div>
                                                        <div class="error-container" style="display: none;">
                                                            <svg class="error-mark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                                <circle class="error-mark__circle" cx="26" cy="26" r="25" fill="none" />
                                                                <line class="error-mark__line" x1="16" y1="16" x2="36" y2="36" />
                                                                <line class="error-mark__line" x1="36" y1="16" x2="16" y2="36" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- Fin del contendor puntedo -->


                                            <!-- Añadir más instancias aquí -->
                                            <div class="product-upload" style="max-width: 100%; display: none; margin-top: -1vh;" id="container-furnitureset-view-product">
                                                <div class="product-edit">
                                                    <input type="file" name="furnitureset-view-product" id="furnitureset-view-product" class="image-upload-input" accept=".png, .jpg, .jpeg">
                                                    <label for="furnitureset-view-product"></label>
                                                </div>
                                                <div class="product-preview drop-area" style="width: 100%; height: 36vh; border-radius: 5px;">
                                                    <div class="image-preview dropzone-desc" style="border-radius: 5px;">
                                                        <i class="fa fa-image"></i>
                                                        <p>Mueble en conjunto</p>
                                                    </div>
                                                    <div class="loading-container" style="display: none;">
                                                        <div></div>
                                                        <div class="checkmark-container" style="display: none;">
                                                            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                                                            </svg>
                                                        </div>
                                                        <div class="error-container" style="display: none;">
                                                            <svg class="error-mark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                                                <circle class="error-mark__circle" cx="26" cy="26" r="25" fill="none" />
                                                                <line class="error-mark__line" x1="16" y1="16" x2="36" y2="36" />
                                                                <line class="error-mark__line" x1="36" y1="16" x2="16" y2="36" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- Fin del contendor puntedo -->

                                            <div class="row justify-content-around" style="margin-top: -3vh; " id="btn-imagesUploads">

                                                <div class="button-status" id="btn-left-view-product">
                                                    <div class="col mb-3 d-flex justify-content-center">
                                                        <button id="btnLeftViewProductToSuccess" type="button" class="image-btn btn btn-secondary w-100 text-truncate d-flex align-items-center justify-content-center" style="height: auto;" data-target="container-left-view-product">
                                                            <div class="d-flex flex-md-row flex-column align-items-center">
                                                                <span class="fa fa-image"></span>
                                                                <span class="d-md-inline d-none ml-1">LI</span>
                                                                <span class="d-md-none d-inline">LI</span>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="button-status" id="btn-module-intermediate-li">
                                                    <div class="col mb-3 d-flex justify-content-center">
                                                        <button id="btnModuleIntermediateLiToSuccess" type="button" class="image-btn btn btn-secondary w-100 text-truncate d-flex align-items-center justify-content-center" style="height: auto;" data-target="container-module-intermediate-li">
                                                            <div class="d-flex flex-md-row flex-column align-items-center">
                                                                <span class="fa fa-image"></span>
                                                                <span class="d-md-inline d-none ml-1">M+</span>
                                                                <span class="d-md-none d-inline">M+</span>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="button-status" id="btn-imageUpload-front">
                                                    <div class="col mb-3 d-flex justify-content-center">
                                                        <button id="btnImageUploadFrontToSuccess" type="button" class="image-btn btn btn-secondary w-100 text-truncate d-flex align-items-center justify-content-center" style="height: auto;" data-target="container-imageUpload-front">
                                                            <div class="d-flex flex-md-row flex-column align-items-center">
                                                                <span class="fa fa-image"></span>
                                                                <span class="d-md-inline d-none ml-1">F</span>
                                                                <span class="d-md-none d-inline">F</span>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="button-status" id="btn-module-intermediate-ri">
                                                    <div class="col mb-3 d-flex justify-content-center">
                                                        <button id="btnModuleIntermediateRiToSuccess" type="button" class="image-btn btn btn-secondary w-100 text-truncate d-flex align-items-center justify-content-center" style="height: auto;" data-target="container-module-intermediate-ri">
                                                            <div class="d-flex flex-md-row flex-column align-items-center">
                                                                <span class="fa fa-image"></span>
                                                                <span class="d-md-inline d-none ml-1">M+</span>
                                                                <span class="d-md-none d-inline">M+</span>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="button-status" id="btn-right-view-product">
                                                    <div class="col mb-3 d-flex justify-content-center">
                                                        <button id="btnRightViewProductToSuccess" type="button" class="image-btn btn btn-secondary w-100 text-truncate d-flex align-items-center justify-content-center" style="height: auto;" data-target="container-right-view-product">
                                                            <div class="d-flex flex-md-row flex-column align-items-center">
                                                                <span class="fa fa-image"></span>
                                                                <span class="d-md-inline d-none ml-1">LD</span>
                                                                <span class="d-md-none d-inline">LD</span>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="button-status" id="btn-back-view-product">
                                                    <div class="col mb-3 d-flex justify-content-center">
                                                        <button id="btnBackViewProductToSuccess" type="button" class="image-btn btn btn-secondary w-100 text-truncate d-flex align-items-center justify-content-center" style="height: auto;" data-target="container-back-view-product">
                                                            <div class="d-flex flex-md-row flex-column align-items-center">
                                                                <span class="fa fa-image"></span>
                                                                <span class="d-md-inline d-none ml-1">T</span>
                                                                <span class="d-md-none d-inline">T</span>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="button-status" id="btn-box-view-product">
                                                    <div class="col mb-3 d-flex justify-content-center">
                                                        <button id="btnBoxViewProductToSuccess" type="button" class="image-btn btn btn-secondary w-100 text-truncate d-flex align-items-center justify-content-center" style="height: auto;" data-target="container-box-view-product">
                                                            <div class="d-flex flex-md-row flex-column align-items-center">
                                                                <span class="fa fa-image"></span>
                                                                <span class="d-md-inline d-none ml-1">VC</span>
                                                                <span class="d-md-none d-inline">VC</span>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="button-status" id="btn-backrest-view-product">
                                                    <div class="col mb-3 d-flex justify-content-center">
                                                        <button id="btnBackrestViewProductToSuccess" type="button" class="image-btn btn btn-secondary w-100 text-truncate d-flex align-items-center justify-content-center" style="height: auto;" data-target="container-backrest-view-product">
                                                            <div class="d-flex flex-md-row flex-column align-items-center">
                                                                <span class="fa fa-image"></span>
                                                                <span class="d-md-inline d-none ml-1">VR</span>
                                                                <span class="d-md-none d-inline">VR</span>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="button-status" id="btn-furnitureset-view-product">
                                                    <div class="col mb-3 d-flex justify-content-center">
                                                        <button id="btnFurnituresetViewProductToSuccess" type="button" class="image-btn btn btn-secondary w-100 text-truncate d-flex align-items-center justify-content-center" style="height: auto;" data-target="container-furnitureset-view-product">
                                                            <div class="d-flex flex-md-row flex-column align-items-center">
                                                                <span class="fa fa-image"></span>
                                                                <span class="d-md-inline d-none ml-1">MC</span>
                                                                <span class="d-md-none d-inline">MC</span>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="button-status" id="btn-complete-product">
                                                    <div class="col mb-3 d-flex justify-content-center d-none">
                                                        <button id="btnCompleteProductToSuccess" type="button" class="image-btn btn btn-secondary w-100 text-truncate d-flex align-items-center justify-content-center" style="height: auto;" data-target="container-complete-product">
                                                            <div class="d-flex flex-md-row flex-column align-items-center">
                                                                <span class="fa fa-image"></span>
                                                                <span class="d-md-inline d-none ml-1">C</span>
                                                                <span class="d-md-none d-inline">CMP</span>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="button-status" id="btn-detail-product">
                                                    <div class="col mb-3 d-flex justify-content-center d-none">
                                                        <button id="btnDetailProductToSuccess" type="button" class="image-btn btn btn-secondary w-100 text-truncate d-flex align-items-center justify-content-center" style="height: auto;" data-target="container-detail-product">
                                                            <div class="d-flex flex-md-row flex-column align-items-center">
                                                                <span class="fa fa-image"></span>
                                                                <span class="d-md-inline d-none ml-1">DT</span>
                                                                <span class="d-md-none d-inline">DT</span>
                                                            </div>
                                                        </button>
                                                    </div>
                                                </div>


                                            </div>




                                        </div> <!-- Fin del grupo form -->


                                        <div id="adds-imgs-especifics" style="display: none; padding-bottom: 1em;">

                                            <div class="form-check form-switch ml-2 d-inline-block">
                                                <input class="form-check-input" type="checkbox" role="switch" id="check-complete-product" name="check-complete-product">
                                                <label class="form-check-label" for="check-complete-product">¿Configuracion completa?</label>
                                            </div>

                                            <div class="form-check form-switch mr-3 d-inline-block">
                                                <input class="form-check-input" type="checkbox" role="switch" id="check-detail-product" name="check-detail-product">
                                                <label class="form-check-label" for="check-detail-product">¿Detalle en tela?</label>
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
                                            <input type="text" name="existencia" id="existencia" class="form-control" min="1" maxlength="5" required>
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
                                                        while ($row = $showTypeProduct->fetch_assoc()) {
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

                                    <div class="col-md-5 ">
                                        <div class="form-group active-full">
                                            <label for="color_id">Color</label>
                                            <div id="color-select-main">
                                                <div class="input-group">
                                                    <select name="color_id" id="color_id" class="form-control" required>
                                                        <option value="" selected disabled>Selecciona el color</option>

                                                        <?php
                                                        if ($showColors->num_rows > 0) {
                                                            // Salida de datos de cada fila
                                                            while ($row = $showColors->fetch_assoc()) {
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
                                                        <small class="d-inline-block text-truncate" style="max-width: 100%;">¿Desea añadir otro relleno?</small>
                                                        <input type="checkbox" id="material-relleno-input" name="material-relleno-input" class="form-control ml-2" style="height: auto; width: auto;">
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <select name="relleno_id" id="relleno_id" class="form-control select2bs4 w-100">
                                                            <option value="" selected disabled>Busca el relleno</option>
                                                            <?php
                                                            if ($showStuffed->num_rows > 0) {
                                                                while ($row = $showStuffed->fetch_assoc()) {
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
                                                    <div class="form-group d-flex align-items-center">
                                                        <p id="text-nuevo-relleno" class="mb-0 mr-2" style="white-space: nowrap;">Nuevo relleno:</p>
                                                        <input id="nuevo_relleno" type="text" name="nuevo_relleno" class="form-control flex-grow-1">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Fin de relleno -->

                                            <!-- Madera -->
                                            <div class="form-group">
                                                <div class="row align-items-center">
                                                    <div class="col-md-2 col-6">
                                                        <p class="mb-0" for="madera_id">Madera</p>
                                                    </div>
                                                    <div class="col-md-4 col-6 text-md-right d-flex align-items-center justify-content-between">
                                                        <small class="d-inline-block text-truncate" style="max-width: 100%;">¿Desea añadir otra madera?</small>
                                                        <input type="checkbox" id="material-madera-input" name="material-madera-input" class="form-control ml-2" style="height: auto; width: auto;">
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <select name="madera_id" id="madera_id" class="form-control select2bs4 w-100">
                                                            <option value="" selected disabled>Busca la madera</option>
                                                            <?php
                                                            if ($showWood->num_rows > 0) {
                                                                while ($row = $showWood->fetch_assoc()) {
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
                                                    <div class="form-group d-flex align-items-center">
                                                        <p id="text-nueva-madera" class="mb-0 mr-2" style="white-space: nowrap;">Nueva madera:</p>
                                                        <input id="nueva_madera" type="text" name="nueva_madera" class="form-control flex-grow-1">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Fin de madera -->

                                            <!-- Patas -->
                                            <div class="form-group">
                                                <div class="row align-items-center">
                                                    <div class="col-md-2 col-6">
                                                        <p class="mb-0" for="patas_id">Patas</p>
                                                    </div>
                                                    <div class="col-md-4 col-6 text-md-right d-flex align-items-center justify-content-between">
                                                        <small class="d-inline-block text-truncate" style="max-width: 100%;">¿Desea añadir otra pata?</small>
                                                        <input type="checkbox" id="material-patas-input" name="material-patas-input" class="form-control ml-2" style="height: auto; width: auto;">
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <select name="patas_id" id="patas_id" class="form-control select2bs4 w-100">
                                                            <option value="" selected disabled>Busca la pata</option>
                                                            <?php
                                                            if ($showLegs->num_rows > 0) {
                                                                while ($row = $showLegs->fetch_assoc()) {
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
                                                    <div class="form-group d-flex align-items-center">
                                                        <p id="text-nueva-pata" class="mb-0 mr-2" style="white-space: nowrap;">Nueva pata:</p>
                                                        <input id="nueva_pata" type="text" name="nueva_pata" class="form-control flex-grow-1">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Fin de patas -->

                                            <!-- Telas -->
                                            <div class="form-group">
                                                <div class="row align-items-center">
                                                    <div class="col-md-2 col-6">
                                                        <p class="mb-0" for="telas_id">Telas</p>
                                                    </div>
                                                    <div class="col-md-4 col-6 text-md-right d-flex align-items-center justify-content-between">
                                                        <small class="d-inline-block text-truncate" style="max-width: 100%;">¿Desea añadir otra tela?</small>
                                                        <input type="checkbox" id="material-telas-input" name="material-telas-input" class="form-control ml-2" style="height: auto; width: auto;">
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <select name="telas_id" id="telas_id" class="form-control select2bs4 w-100">
                                                            <option value="" selected disabled>Busca la tela</option>
                                                            <?php
                                                            if ($showFabrics->num_rows > 0) {
                                                                while ($row = $showFabrics->fetch_assoc()) {
                                                                    echo "<option value='" . $row["id"] . "'>" . $row["nombre"] . "</option>";
                                                                }
                                                            } else {
                                                                echo "<option value='' disabled>No hay telas disponibles</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div id="telas-container" class="mt-2" style="display: none;">
                                                    <div class="form-group d-flex align-items-center">
                                                        <p id="text-nueva-tela" class="mb-0 mr-2" style="white-space: nowrap;">Nueva tela:</p>
                                                        <input id="nueva_tela" type="text" name="nueva_tela" class="form-control flex-grow-1">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Fin de telas -->
                                        </div>
                                        <!-- Fin de formulario de materiales -->
                                        <!-- Fin de formulario de materiales -->


                                        <div class="form-group">
                                            <label>¿Tiene accesorios?</label>
                                            <input type="checkbox" id="plugins-inputs" name="plugins-inputs" class="form-control" style="height: auto; width: auto; display: inline-block; margin-left: 10px;">
                                        </div>
                                        <div id="plugins-inputs-container">
                                            <div class="form-group">
                                                <label>Tipo de accesorio</label>
                                                <select id="accesorios_select" name="accesorios_select" class="form-control select2bs4 ml-3" style="width: 100%;">
                                                    <option value="" selected disabled>Seleccion el accesorio</option>
                                                    <?php
                                                    if ($showAccesories->num_rows > 0) {
                                                        while ($row = $showAccesories->fetch_assoc()) {
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
                                                <input type="number" name="accesorios_cantidad" id="accesorios_cantidad" class="form-control">
                                            </div>
                                        </div>

                                        <!-- Aqui precio compra y venta -->
                                        <div class="form-group d-flex justify-content-between">
                                            <div class="form-group active-full">
                                                <label>Precio Compra</label>
                                                <div class="input-group">
                                                    <input type="number" name="precio" id="precio" class="form-control input-change" min="100" maxlength="10">
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
                                                    <input type="number" name="precioVenta" id="precioVenta" class="form-control input-change" min="4000" maxlength="10">
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
                                                    while ($row = $showProviders->fetch_assoc()) {
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
                                            <input type="text" name="garantia" id="garantia" class="form-control" required placeholder="90 dias">
                                        </div>
                                        <div class="form-group">
                                            <label>Fecha de registro</label>
                                            <p><?php echo date('Y-m-d H:i:s'); ?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-3 flex flex-column justify-content-center align-items-center ">
                                        <div class="phoneView">
                                            <div class="detailPhone">
                                                <div class="markPhone">
                                                    <div class="contentPage">
                                                        <div class="title-preview">
                                                            <img src="../backend/media/pages/sensi.png" alt="">
                                                            <h1>Sensi Home</h1>
                                                        </div>

                                                        <div class="viewProduct">
                                                            <div class="product__container">
                                                                <div class="product__image">
                                                                    <img id="imgPreviewPhone" src="../backend/media/pages/productDefault.png" alt="">
                                                                </div>
                                                                <div class="product__info">
                                                                    <div class="product__info--title">
                                                                        <h2 id="name_previewPhone">Esperando datos ⚙️</h2>
                                                                    </div>

                                                                    <div class="product__info--price">
                                                                        <i class="fas fa-heart cora-edit"></i>
                                                                        <h3 id="pricePreviewPhone">$</h3>
                                                                        <i class="fas fa-shopping-cart cart-edit"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="d-flex justify-content-center">
                                        <button type="submit" name="guardar" class="btn btn-primary mt-2 justify-center" >Guardar</button>
                                        </div>
                                        
                                        
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

   <script src="./middleware/selectColor.js"></script>



<script src="./middleware/limitCharacters.js"></script>

<!-- Persistencia de datos -->
<script src="./middleware/persisten.js"></script>

<!-- Preview -->
<script src="./middleware/previewPhone.js"></script>

</section>










</div>