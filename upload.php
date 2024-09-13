<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pruebas de creacion y subido de archivos y seccionamiento por carpetas</title>


</head>
<body>
    <h1>Gestor automata de archivos</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label>Categoria</label>
        <select name="categoria" required>
            <option value="Sala">Sala</option>
            <option value="Comedor">Comedor</option>
            <option value="Recamara">Recamara</option>
            <option value="Cocina">Cocina</option>
        </select>
        
        <label>Producto</label>
        <input type="text" name="producto" required>
        <input type="file" name="file" required>
        <button type="submit" name="submit">Subir archivo</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        // Obtener la categoría y el nombre del producto desde el input
        $categoria = preg_replace('/[^a-zA-Z0-9_-]/', '', $_POST['categoria']); // Limpiar el nombre de la categoría
        $producto = preg_replace('/[^a-zA-Z0-9_-]/', '', $_POST['producto']); // Limpiar el nombre del producto
        $target_dir = "backend/media/admin/product/linea/" . $categoria . "/" . $producto . "/";

        // Crear la carpeta de la categoría si no existe
        if (!is_dir("backend/media/admin/product/linea/" . $categoria)) {
            mkdir("backend/media/admin/product/linea/" . $categoria, 0777, true);
        }

        // Crear la carpeta del producto si no existe
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // Información del archivo subido
        $file = $_FILES['file'];
        $file_name = basename($file['name']);
        $file_tmp = $file['tmp_name'];
        $file_type = $file['type'];
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

        // Generar un nuevo nombre para el archivo usando un ID (por ejemplo, un timestamp)
        $new_file_name = uniqid() . '.' . $file_ext;
        $target_file = $target_dir . $new_file_name;

        // Mover el archivo subido al directorio de destino
        if (move_uploaded_file($file_tmp, $target_file)) {
            // Redirigir después de la subida exitosa
            header("Location: upload.php?success=1&path=" . urlencode($target_file) . "&type=" . urlencode($file_type) . "&name=" . urlencode($file_name) . "&newname=" . urlencode($new_file_name));
            exit();
        } else {
            echo "<p>Error al subir el archivo.</p>";
        }
    }

    // Mostrar información del archivo subido si se redirige con éxito
    if (isset($_GET['success']) && $_GET['success'] == 1) {
        echo "<p><span class='description'>Ruta:</span> <span class='value'>" . htmlspecialchars($_GET['path']) . "</span></p>";
        echo "<p><span class='description'>Tipo de archivo:</span> <span class='value'>" . htmlspecialchars($_GET['type']) . " " . htmlspecialchars(pathinfo($_GET['name'], PATHINFO_EXTENSION)) . "</span></p>";
        echo "<p><span class='description'>Nombre del archivo:</span> <span class='value'>" . htmlspecialchars($_GET['name']) . "</span></p>";
        echo "<p><span class='description'>Nombre del archivo con ID:</span> <span class='value'>" . htmlspecialchars($_GET['newname']) . "</span></p>";

        // Redirigir para limpiar la URL
        echo "<script>
            setTimeout(function() {
                window.location.href = 'upload.php';
            }, 5000); // Redirigir después de 5 segundos
        </script>";
    }
    ?>
</body>
</html>