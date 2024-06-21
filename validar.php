<?php
session_start();
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
    $password = mysqli_real_escape_string($conexion, $_POST['password']);

    $consulta = "SELECT * FROM personal WHERE usuario = '$usuario' AND password = '$password'";
    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) == 1) {
        $fila_usuario = mysqli_fetch_assoc($resultado);
        $_SESSION['id_usuario'] = $fila_usuario['id'];
        $_SESSION['nombre_usuario'] = $fila_usuario['usuario'];
        header("Location: home.php");
        exit();
    } else {
        header("Location: index.html?error=Credenciales incorrectas");
        exit();
    }
} else {
    header("Location: index.html");
    exit();
}
?>
