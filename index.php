<?php
session_start();
require_once 'conexion.php';

$reservas_usuario = [];

// Si el usuario inició sesión, consultamos sus reservas activas o pendientes
if (isset($_SESSION['id_usuario'])) {
    try {
        $stmt = $conexion->prepare("
            SELECT fecha_hora, modalidad, estado 
            FROM reservas 
            WHERE id_usuario = :id_usuario 
            ORDER BY fecha_hora DESC
        ");
        $stmt->execute([':id_usuario' => $_SESSION['id_usuario']]);
        $reservas_usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Manejo silencioso o log de error si es necesario
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tactical Mind & Shooting | Inicio</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header>
        <div class="logo">TACTICAL MIND & SHOOTING</div>
        <nav>
            <a href="index.php" class="active">Inicio</a>
            <a href="instructor.php">Instructor</a>
            <a href="programas.php">Programas</a>
            <a href="consultoria.php">Consultorías</a>
            <?php if (isset($_SESSION['id_usuario'])): ?>
                <a href="logout.php" class="btn-primary">Salir (<?php echo htmlspecialchars($_SESSION['nombre']); ?>)</a>
            <?php else: ?>
                <a href="login.php" class="btn-primary">Acceso Usuarios</a>
            <?php endif; ?>
        </nav>
    </header>

    <main class="container hero">
        <h1>Dominio Absoluto Bajo Presión Extrema</h1>
        <p class="hero-subtitle">
            Plataforma especializada en acondicionamiento mental, respiración diafragmática y tiro de alta precisión para personal de seguridad y operadores tácticos.
        </p>

        <?php if (isset($_SESSION['id_usuario'])): ?>
            <!-- SECCIÓN DE RESERVAS PARA USUARIOS LOGUEADOS -->
            <div class="user-reservations" style="margin-top: 2rem; background: rgba(0,0,0,0.6); padding: 1.5rem; border-radius: 8px; border: 1px solid var(--border-subtle, #2a3a2a);">
                <h2 style="color: #4caf50; font-size: 1.3rem; margin-bottom: 1rem;">Tus Consultorías Agendadas</h2>
                
                <?php if (!empty($reservas_usuario)): ?>
                    <div style="display: grid; gap: 1rem;">
                        <?php foreach ($reservas_usuario as $reserva): ?>
                            <div style="background: rgba(255,255,255,0.05); padding: 1rem; border-radius: 5px; text-align: left; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 0.5rem;">
                                <div>
                                    <strong>Fecha:</strong> <?php echo date('d/m/Y H:i', strtotime($reserva['fecha_hora'])); ?><br>
                                    <strong>Modalidad:</strong> <?php echo htmlspecialchars($reserva['modalidad']); ?>
                                </div>
                                <div>
                                    <span style="background: #2e7d32; padding: 0.3rem 0.8rem; border-radius: 4px; font-size: 0.85rem; font-weight: bold;">
                                        <?php echo htmlspecialchars($reserva['estado']); ?>
                                    </span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p style="color: #ccc; margin-bottom: 1rem;">No tienes ninguna reserva agendada actualmente.</p>
                <?php endif; ?>

                <div class="hero-buttons" style="margin-top: 1.5rem;">
                    <a href="consultoria.php" class="btn-primary">Agendar Nueva Consultoría</a>
                </div>
            </div>
        <?php else: ?>
            <!-- BOTONES POR DEFECTO PARA VISITANTES SIN SESIÓN -->
            <div class="hero-buttons">
                <a href="programas.php" class="btn-primary">Ver Programas de Formación</a>
                <a href="consultoria.php" class="btn-primary btn-secondary-action">Agendar Consultoría</a>
            </div>
        <?php endif; ?>
    </main>

    <footer>
        <p>© 2026 Tactical Mind & Shooting. Todos los derechos reservados.</p>
    </footer>
</body>
</html>