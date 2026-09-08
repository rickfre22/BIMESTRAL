<?php
session_start();
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre   = trim($_POST['nombre'] ?? '');
    $correo   = trim($_POST['correo'] ?? '');
    $pass     = trim($_POST['contrasena'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');

    if (!empty($nombre) && !empty($correo) && !empty($pass)) {
        try {
            // Verificar si el correo ya existe
            $check = $conexion->prepare("SELECT id_usuario FROM usuarios WHERE correo = :correo");
            $check->execute([':correo' => $correo]);
            
            if ($check->rowCount() > 0) {
                die("El correo ya está registrado. <a href='login.php'>Iniciar Sesión</a>");
            }

            // Encriptar contraseña e insertar
            $pass_hashed = password_hash($pass, PASSWORD_DEFAULT);
            $stmt = $conexion->prepare("
                INSERT INTO usuarios (nombre, correo, contrasena, telefono, rol) 
                VALUES (:nombre, :correo, :pass, :telefono, 'usuario')
            ");
            
            $stmt->execute([
                ':nombre'   => $nombre,
                ':correo'   => $correo,
                ':pass'     => $pass_hashed,
                ':telefono' => $telefono
            ]);

            // Iniciar sesión automáticamente tras el registro
            $_SESSION['id_usuario'] = $conexion->lastInsertId();
            $_SESSION['nombre']     = $nombre;
            $_SESSION['rol']        = 'usuario';

            header('Location: index.php');
            exit;

        } catch (PDOException $e) {
            die("Error en el registro: " . $e->getMessage());
        }
    } else {
        die("Por favor completa los campos requeridos. <a href='login.php'>Volver</a>");
    }
} else {
    header('Location: login.php');
    exit;
}
?>