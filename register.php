<?php
session_start();
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
    $password = mysqli_real_escape_string($conexion, $_POST['password']);

    $consulta = "SELECT * FROM personal WHERE usuario = '$usuario'";
    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        header("Location: register.html?error=El usuario ya existe");
        exit();
    }

    $consulta = "INSERT INTO personal (usuario, password) VALUES ('$usuario', '$password')";
    if (mysqli_query($conexion, $consulta)) {
        header("Location: index.html");
        exit();
    } else {
        header("Location: register.html?error=Error al registrar el usuario");
        exit();
    }
} else {
    header("Location: register.html");
    exit();
}
?>
