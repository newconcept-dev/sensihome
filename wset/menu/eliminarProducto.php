<?php
include_once './models/model.php';

if (isset($_GET['id'])) {
    $producto_id = intval($_GET['id']);

    // Eliminar el producto de la base de datos
    $sql = "DELETE FROM productos WHERE id = ?";
    $stmt = $con->prepare($sql);
    if (!$stmt) {
        die("Error en la preparación: " . $con->error);
    }
    $stmt->bind_param("i", $producto_id);
    if (!$stmt->execute()) {
        die("Error en la ejecución: " . $stmt->error);
    }
    $stmt->close();

    // Redirigir de vuelta a la página de productos con un mensaje de éxito
    header("Location: panel.php?modulo=productos&mensaje=Producto eliminado exitosamente");
    exit();
} else {
    die("ID de producto no proporcionado.");
}
?>