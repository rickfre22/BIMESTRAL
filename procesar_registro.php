<?php
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre     = trim($_POST['nombre']);
    $correo     = trim($_POST['correo']);
    $telefono   = trim($_POST['telefono']);
    $contrasena = password_hash(trim($_POST['contrasena']), PASSWORD_BCRYPT); // Encriptación segura

    try {
        $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, correo, contrasena, telefono) VALUES (:nombre, :correo, :contrasena, :telefono)");
        $stmt->execute([
            ':nombre'     => $nombre,
            ':correo'     => $correo,
            ':contrasena' => $contrasena,
            ':telefono'   => $telefono
        ]);

        echo "<script>alert('Registro exitoso. Inicia sesión.'); window.location.href='login.php';</script>";
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) { // Error de correo duplicado
            echo "<script>alert('El correo ya está registrado.'); window.location.href='login.php';</script>";
        } else {
            echo "Error al registrar: " . $e->getMessage();
        }
    }
}
?>