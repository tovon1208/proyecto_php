<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'crud';

$conexion = mysqli_connect($host, $username, $password, $database);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
