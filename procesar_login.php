<?php
session_start();
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = trim($_POST['correo'] ?? '');
    $pass   = trim($_POST['contrasena'] ?? '');

    if (!empty($correo) && !empty($pass)) {
        try {
            $stmt = $conexion->prepare("SELECT id_usuario, nombre, contrasena, rol FROM usuarios WHERE correo = :correo");
            $stmt->execute([':correo' => $correo]);
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario && password_verify($pass, $usuario['contrasena'])) {
                $_SESSION['id_usuario'] = $usuario['id_usuario'];
                $_SESSION['nombre']     = $usuario['nombre'];
                $_SESSION['rol']        = $usuario['rol'];

                header('Location: index.php');
                exit;
            } else {
                die("Credenciales incorrectas. <a href='login.php'>Intentar de nuevo</a>");
            }
        } catch (PDOException $e) {
            die("Error en el sistema: " . $e->getMessage());
        }
    } else {
        die("Por favor completa todos los campos. <a href='login.php'>Volver</a>");
    }
} else {
    header('Location: login.php');
    exit;
}
?>