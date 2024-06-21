<?php
session_start();
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marca = mysqli_real_escape_string($conexion, $_POST['marca']);
    $modelo = mysqli_real_escape_string($conexion, $_POST['modelo']);
    $precio = mysqli_real_escape_string($conexion, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);

    $consulta = "INSERT INTO autos (marca, modelo, precio, descripcion) 
                 VALUES ('$marca', '$modelo', '$precio', '$descripcion')";
    
    if (mysqli_query($conexion, $consulta)) {
        header("Location: admin_autos.php"); // Redireccionar a la página de administración de autos
        exit();
    } else {
        echo "Error al crear el auto: " . mysqli_error($conexion);
    }
}

mysqli_close($conexion);
?>
