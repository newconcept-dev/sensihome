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
    // Obtener la ruta de la carpeta del usuario
    $query = "SELECT profileImage FROM usuarios WHERE id = '$id'";
    $res = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($res);
    $profileImagePath = $row['profileImage'];
    $userFolder = dirname($profileImagePath);

    // Proceder con la eliminación del usuario
    $query = "DELETE FROM usuarios WHERE id = '$id'";
    $res = mysqli_query($con, $query);

    if ($res) {
        // Eliminar la carpeta del usuario y su contenido
        function deleteDirectory($dir) {
            if (!file_exists($dir)) {
                return true;
            }
            if (!is_dir($dir)) {
                return unlink($dir);
            }
            foreach (scandir($dir) as $item) {
                if ($item == '.' || $item == '..') {
                    continue;
                }
                if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
                    return false;
                }
            }
            return rmdir($dir);
        }

        if (deleteDirectory($userFolder)) {
            echo '<div class="alert alert-warning float-right" role="alert">
                    Usuario eliminado exitosamente
                  </div>';
        } else {
            echo '<div class="alert alert-danger float-right" role="alert">
                    Error al eliminar la carpeta del usuario.
                  </div>';
        }
    } else {
        echo '<div class="alert alert-danger float-right" role="alert">
                Error al eliminar el usuario ' . mysqli_error($con) . '
              </div>';
    }
}
?>