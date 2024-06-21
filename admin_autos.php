<?php
session_start();
include('db.php');

if (!isset($_SESSION['id_usuario']) || empty($_SESSION['id_usuario'])) {
    header("Location: index.html");
    exit();
}

$consulta_autos = "SELECT * FROM autos";
$resultado_autos = mysqli_query($conexion, $consulta_autos);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Autos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Administración de Autos</h1>
    
    <h2>Listado de Autos</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Precio</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
        <?php while ($fila_auto = mysqli_fetch_assoc($resultado_autos)) { ?>
            <tr>
                <td><?php echo $fila_auto['id']; ?></td>
                <td><?php echo $fila_auto['marca']; ?></td>
                <td><?php echo $fila_auto['modelo']; ?></td>
                <td>$<?php echo number_format($fila_auto['precio'], 2); ?></td>
                <td><?php echo $fila_auto['descripcion']; ?></td>
                <td>
                    <a href="editar_auto.php?id=<?php echo $fila_auto['id']; ?>">Editar</a>
                    <a href="eliminar_auto.php?id=<?php echo $fila_auto['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    
    <h2>Crear Nuevo Auto</h2>
    <form action="crear_auto.php" method="post">
        <p>Marca: <input type="text" name="marca" required></p>
        <p>Modelo: <input type="text" name="modelo" required></p>
        <p>Precio: <input type="number" step="0.01" name="precio" required></p>
        <p>Descripción: <textarea name="descripcion" rows="4" required></textarea></p>
        <input type="submit" value="Crear Auto">
    </form>
    
    <p><a href="logout.php">Cerrar sesión</a></p>
</body>
</html>
