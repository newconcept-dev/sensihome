<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_FILES['file']) || $_FILES['file']['error'] != UPLOAD_ERR_OK) {
        echo json_encode(['error' => 'Error al subir el archivo.']);
        return;
    }

    $userId = $_POST['userId'] ?? null;
    $categoria = $_POST['categoria'] ?? null;
    $producto = $_POST['producto'] ?? null;
    $prefijo = $_POST['prefijo'] ?? null;
    $prevImagePath = $_POST['prevImagePath'] ?? null;
    if (!$userId || !$categoria || !$producto || !$prefijo) {
        echo json_encode(['error' => 'Datos insuficientes proporcionados.']);
        return;
    }

    // Ruta relativa al directorio de destino
    $productFolder = sprintf('./cloud/data/products/%s/%s', $categoria, $producto);
    if (!is_dir($productFolder)) {
        if (!mkdir($productFolder, 0777, true)) {
            echo json_encode(['error' => 'Error al crear el directorio del producto.']);
            return;
        }
    }

    $imageFileType = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
    $imageFileName = $prefijo . '_' . uniqid() . '.' . $imageFileType;
    $imageFilePath = $productFolder . '/' . $imageFileName;

    if (!move_uploaded_file($_FILES['file']['tmp_name'], $imageFilePath)) {
        echo json_encode(['error' => 'Error al mover el archivo.']);
        return;
    }

    // Eliminar la imagen previa si existe
    if ($prevImagePath && file_exists($prevImagePath)) {
        unlink($prevImagePath);
    }

    // Convertir la ruta del sistema de archivos a una URL accesible con el prefijo api
    $imageUrl = str_replace('./', 'https://cloud-dev.sensihome.com.mx/api/', $imageFilePath);

    echo json_encode(['success' => true, 'filePath' => $imageUrl, 'productFolder' => realpath($productFolder)]);
} else {
    echo json_encode(['error' => 'Método no permitido.']);
}
?>