<?php
session_start();
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $consulta_auto = "SELECT * FROM autos WHERE id = $id";
    $resultado_auto = mysqli_query($conexion, $consulta_auto);
    $fila_auto = mysqli_fetch_assoc($resultado_auto);
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $marca = mysqli_real_escape_string($conexion, $_POST['marca']);
    $modelo = mysqli_real_escape_string($conexion, $_POST['modelo']);
    $precio = mysqli_real_escape_string($conexion, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);

    $consulta = "UPDATE autos 
                 SET marca = '$marca', modelo = '$modelo', precio = '$precio', descripcion = '$descripcion' 
                 WHERE id = $id";
    
    if (mysqli_query($conexion, $consulta)) {
        header("Location: admin_autos.php"); // Redireccionar a la página de administración de autos
        exit();
    } else {
        echo "Error al actualizar el auto: " . mysqli_error($conexion);
    }
}

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Auto</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Editar Auto</h1>
    <form action="editar_auto.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <p>Marca: <input type="text" name="marca" value="<?php echo $fila_auto['marca']; ?>" required></p>
        <p>Modelo: <input type="text" name="modelo" value="<?php echo $fila_auto['modelo']; ?>" required></p>
        <p>Precio: <input type="number" step="0.01" name="precio" value="<?php echo $fila_auto['precio']; ?>" required></p>
        <p>Descripción: <textarea name="descripcion" rows="4" required><?php echo $fila_auto['descripcion']; ?></textarea></p>
        <input type="submit" value="Actualizar Auto">
    </form>
    <p><a href="admin_autos.php">Cancelar</a></p>
</body>
</html>
