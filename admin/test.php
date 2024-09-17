<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Obtener y sanitizar los valores del formulario
        $nombre_producto = htmlspecialchars($_POST['nombre_producto']);

        // Manejar la subida de la imagen
        if (isset($_FILES['imageUpload-product']) && $_FILES['imageUpload-product']['error'] == UPLOAD_ERR_OK) {
            $imagen = $_FILES['imageUpload-product'];
            $extension = pathinfo($imagen['name'], PATHINFO_EXTENSION);
            $nombre_imagen = uniqid() . '.' . $extension;
            $ruta_carpeta = "../backend/media/admin/product/linea/" . $nombre_producto;
            $ruta_imagen = $ruta_carpeta . "/" . $nombre_imagen;

            // Verificar si la carpeta existe, si no, crearla
            if (!is_dir($ruta_carpeta)) {
                mkdir($ruta_carpeta, 0777, true);
            }

            if (!move_uploaded_file($imagen['tmp_name'], $ruta_imagen)) {
                throw new Exception("Error al mover la imagen subida.");
            }

            // Redirigir a una página de confirmación o mostrar un mensaje de éxito
            echo "<script>
                alert('Imagen subida exitosamente.');
                window.location.href = 'panel.php?modulo=test';
            </script>";
        } else {
            throw new Exception("Error en la subida de la imagen.");
        }
    } catch (Exception $e) {
        die($e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Prueba de inserción</title>
</head>
<body>
   

   <form action="panel.php?modulo=test" method="POST" enctype="multipart/form-data">
      <img src="../backend/media/admin/product/linea/acercad.jpg" alt="">

      <label for="nombre_producto">Nombre del Producto</label>
      <input type="text" name="nombre_producto" id="nombre_producto" class="form-control" required>
                                 
      <label for="imagen">Sube aquí</label>
      <input type="file" name="imageUpload-product" id="imageUpload-product" required>

      <input type="submit" value="Subir">
   </form>
</body>
</html>