<?php
session_start();
require_once 'conexion.php';

if (isset($_SESSION['id_usuario']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_reserva = $_POST['id_reserva'] ?? null;

    if ($id_reserva) {
        try {
            // Garantizamos que solo el dueño de la reserva pueda eliminarla
            $stmt = $conexion->prepare("DELETE FROM reservas WHERE id_reserva = :id_reserva AND id_usuario = :id_usuario");
            $stmt->execute([
                ':id_reserva' => $id_reserva,
                ':id_usuario' => $_SESSION['id_usuario']
            ]);
        } catch (PDOException $e) {
            // Manejo de excepción
        }
    }
}

header('Location: index.php');
exit;
?>