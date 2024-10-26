<?php
function uploadFile($categoria, $producto, $file) {
    // Limpiar el nombre de la categoría y el producto
    $categoria = preg_replace('/[^a-zA-Z0-9_-]/', '', $categoria);
    $producto = preg_replace('/[^a-zA-Z0-9_-]/', '', $producto);
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
    $file_name = basename($file['name']);
    $file_tmp = $file['tmp_name'];
    $file_type = $file['type'];
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

    // Generar un nuevo nombre para el archivo usando un ID (por ejemplo, un timestamp)
    $new_file_name = uniqid() . '.' . $file_ext;
    $target_file = $target_dir . $new_file_name;

    // Mover el archivo subido al directorio de destino
    if (move_uploaded_file($file_tmp, $target_file)) {
        return [
            'success' => true,
            'path' => $target_file,
            'type' => $file_type,
            'name' => $file_name,
            'newname' => $new_file_name
        ];
    } else {
        return [
            'success' => false,
            'error' => 'Error al subir el archivo.'
        ];
    }
}

if (isset($_POST['submit'])) {
    $result = uploadFile($_POST['categoria'], $_POST['producto'], $_FILES['file']);
    if ($result['success']) {
        // Redirigir después de la subida exitosa
        header("Location: upload.php?success=1&path=" . urlencode($result['path']) . "&type=" . urlencode($result['type']) . "&name=" . urlencode($result['name']) . "&newname=" . urlencode($result['newname']));
        exit();
    } else {
        echo "<p>" . htmlspecialchars($result['error']) . "</p>";
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