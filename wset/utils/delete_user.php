<?php
// delete_user.php
include_once 'models/model.php';

// Iniciar la sesión si no está ya iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Obtener el ID del usuario autenticado
$currentUserId = $_SESSION['id'] ?? null;

// Obtener el ID del usuario a eliminar
$id = mysqli_real_escape_string($con, $_REQUEST['idBorrar'] ?? '');

// Verificar si el usuario está intentando eliminarse a sí mismo
if ($id == $currentUserId) {
    echo '<div class="alert alert-danger float-right" role="alert">
            No puedes eliminar tu propia cuenta.
          </div>';
} else {
    // Proceder con la eliminación del usuario
    $query = "DELETE FROM usuarios WHERE id = '$id'";
    $res = mysqli_query($con, $query);

    if ($res) {
        echo '<div class="alert alert-warning float-right" role="alert">
                Usuario eliminado exitosamente
              </div>';
    } else {
        echo '<div class="alert alert-danger float-right" role="alert">
                Error al eliminar el usuario ' . mysqli_error($con) . '
              </div>';
    }
}
?>