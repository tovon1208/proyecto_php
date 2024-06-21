<?php
session_start();

if (!isset($_SESSION['id_usuario']) || empty($_SESSION['id_usuario'])) {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION['nombre_usuario']; ?></h1>
    <p><a href="admin_autos.php">Administrar Autos</a></p>
    <p><a href="logout.php">Cerrar sesión</a></p>
</body>
</html>
