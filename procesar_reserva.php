<?php
session_start();
require_once 'conexion.php';

if (!isset($_SESSION['id_usuario'])) {
    echo "<script>alert('Debes iniciar sesión para agendar una consultoría.'); window.location.href='login.php';</script>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_usuario = $_SESSION['id_usuario'];
    $fecha_hora = $_POST['fecha_hora'];
    $modalidad  = $_POST['modalidad'];

    try {
        $stmt = $conexion->prepare("INSERT INTO reservas (id_usuario, fecha_hora, modalidad) VALUES (:id_usuario, :fecha_hora, :modalidad)");
        $stmt->execute([
            ':id_usuario' => $id_usuario,
            ':fecha_hora' => $fecha_hora,
            ':modalidad'  => $modalidad
        ]);

        echo "<script>alert('Reserva agendada exitosamente.'); window.location.href='consultoria.php';</script>";
    } catch (PDOException $e) {
        echo "Error al procesar la reserva: " . $e->getMessage();
    }
}
?>