<?php
session_start();
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo     = trim($_POST['correo']);
    $contrasena = trim($_POST['contrasena']);

    $stmt = $conexion->prepare("SELECT id_usuario, nombre, contrasena, rol FROM usuarios WHERE correo = :correo");
    $stmt->execute([':correo' => $correo]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

<<<<<<< HEAD
=======
    // Verificar si el usuario existe y comprobar la contraseña encriptada
>>>>>>> 41adec8345cbb38faafb14cbf8ead12aa915f277
    if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {
        $_SESSION['id_usuario'] = $usuario['id_usuario'];
        $_SESSION['nombre']     = $usuario['nombre'];
        $_SESSION['rol']        = $usuario['rol'];

<<<<<<< HEAD
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('Correo o contraseña incorrectos.'); window.location.href='login.php';</script>";
=======
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>alert('Credenciales incorrectas'); window.location.href='login.php';</script>";
>>>>>>> 41adec8345cbb38faafb14cbf8ead12aa915f277
    }
}
?>