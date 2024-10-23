<?php
// fetch_users.php
include_once 'models/model.php';

$query = "SELECT id, email, nombre FROM usuarios";
$res = mysqli_query($con, $query);

if (!$res) {
    die("Query failed: " . mysqli_error($con));
}

while ($row = mysqli_fetch_assoc($res)) {
    echo '<tr>
            <td>' . htmlspecialchars($row['nombre']) . '</td>
            <td>' . htmlspecialchars($row['email']) . '</td>
            <td>
                <a href="panel.php?modulo=editarUsuario&id=' . htmlspecialchars($row['id']) . '" style="margin-right: 2em;">
                    <li class="fas fa-edit"></li>
                </a>
                <a href="panel.php?modulo=usuarios&idBorrar=' . htmlspecialchars($row['id']) . '" class="text-danger borrar">
                    <li class="fas fa-trash"></li>
                </a>
            </td>
          </tr>';
}
?>