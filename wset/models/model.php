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



// Resto del código...
?>