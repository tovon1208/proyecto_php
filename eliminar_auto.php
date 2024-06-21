<?php
session_start();
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $consulta = "DELETE FROM autos WHERE id = $id";
    
    if (mysqli_query($conexion, $consulta)) {
        header("Location: admin_autos.php"); // Redireccionar a la página de administración de autos
        exit();
    } else {
        echo "Error al eliminar el auto: " . mysqli_error($conexion);
    }
}

mysqli_close($conexion);
?>
