<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = 'localhost';
$user = 'u224160417_sensi_auth';
$password = 'n4=x!E8]p2NQ';
$db = 'u224160417_dev_model';

$con = mysqli_connect($host, $user, $password, $db);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$mensajes = [];

if (isset($_POST['crear_carpetas'])) {
    $ruta_base = './cloud/data/products/';
    
    // Obtener las categorías de la base de datos
    $query = "SELECT nombre FROM categorias";
    $result = mysqli_query($con, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $nombre_categoria = $row['nombre'];
            $ruta_categoria = $ruta_base . $nombre_categoria;

            // Crear la carpeta si no existe
            if (!is_dir($ruta_categoria)) {
                if (mkdir($ruta_categoria, 0777, true)) {
                    $mensajes[] = "Carpeta creada: $ruta_categoria";
                } else {
                    $mensajes[] = "Error al crear la carpeta: $ruta_categoria";
                }
            } else {
                $mensajes[] = "La carpeta ya existe: $ruta_categoria";
            }
        }
    } else {
        $mensajes[] = "Error al obtener las categorías: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Carpetas</title>
</head>
<body>
    <form method="post">
        <button type="submit" name="crear_carpetas">Crear Carpetas</button>
    </form>

    <?php if (!empty($mensajes)): ?>
        <div>
            <?php foreach ($mensajes as $mensaje): ?>
                <p><?php echo $mensaje; ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</body>
</html>