<?php
$host = "localhost";
$user = "u224160417_devsensiprbt";
$pwd = "LcQQXN3";
$db = "";

/* Automatizar la conexion para incluirlo en mas archivos */

function connect(){
    global $host, $user, $pwd, $db;
    $access = new mysqli($host, $user, $pwd, $db);
    if($access->connect_error){
        die("Error de conexion: " . $access->connect_error);
    }
    return $access;
}





?>