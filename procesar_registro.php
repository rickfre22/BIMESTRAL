<?php
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre     = trim($_POST['nombre']);
    $correo     = trim($_POST['correo']);
    $telefono   = trim($_POST['telefono']);
<<<<<<< HEAD
    $contrasena = password_hash(trim($_POST['contrasena']), PASSWORD_BCRYPT);
=======
    $contrasena = password_hash(trim($_POST['contrasena']), PASSWORD_BCRYPT); // Encriptación segura
>>>>>>> 41adec8345cbb38faafb14cbf8ead12aa915f277

    try {
        $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, correo, contrasena, telefono) VALUES (:nombre, :correo, :contrasena, :telefono)");
        $stmt->execute([
            ':nombre'     => $nombre,
            ':correo'     => $correo,
            ':contrasena' => $contrasena,
            ':telefono'   => $telefono
        ]);

<<<<<<< HEAD
        echo "<script>alert('Registro exitoso. Inicia sesión para continuar.'); window.location.href='login.php';</script>";
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
=======
        echo "<script>alert('Registro exitoso. Inicia sesión.'); window.location.href='login.php';</script>";
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) { // Error de correo duplicado
>>>>>>> 41adec8345cbb38faafb14cbf8ead12aa915f277
            echo "<script>alert('El correo ya está registrado.'); window.location.href='login.php';</script>";
        } else {
            echo "Error al registrar: " . $e->getMessage();
        }
    }
}
?>