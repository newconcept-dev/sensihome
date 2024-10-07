<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* Contraseña: LcQQXN3:;
Usuario: u224160417_devsensiprb;
base de datos: u224160417_u224160417_prb
 */

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'u224160417_u224160417_prb';

$con = mysqli_connect($host, $user, $password, $db);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}



// Resto del código...
?>