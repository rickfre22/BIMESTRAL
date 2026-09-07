<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Consultoría | Tactical Mind</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header>
        <div class="logo">TACTICAL MIND & SHOOTING</div>
        <nav>
            <a href="index.php">Inicio</a>
            <a href="instructor.php">Instructor</a>
            <a href="programas.php">Programas</a>
            <a href="consultoria.php" class="active">Consultorías</a>
            <?php if (isset($_SESSION['id_usuario'])): ?>
                <a href="logout.php" class="btn-primary">Salir (<?php echo htmlspecialchars($_SESSION['nombre']); ?>)</a>
            <?php else: ?>
                <a href="login.php" class="btn-primary">Acceso Usuarios</a>
            <?php endif; ?>
        </nav>
    </header>

    <main class="container container-narrow">
        <h1 class="page-title">Reserva de Consultoría Personalizada</h1>
        <form action="procesar_reserva.php" method="POST" class="form-card">
            <div class="form-group">
                <label for="fecha_hora">Fecha y Hora de la Sesión:</label>
                <input type="datetime-local" id="fecha_hora" name="fecha_hora" required>
            </div>
            <div class="form-group">
                <label for="modalidad">Modalidad:</label>
                <select id="modalidad" name="modalidad" required>
                    <option value="Virtual">Virtual (En línea)</option>
                    <option value="Presencial">Presencial (Campo de entrenamiento)</option>
                </select>
            </div>
            <button type="submit" class="btn-primary btn-block">Confirmar Reserva</button>
        </form>
    </main>

    <footer>
        <p>© 2026 Tactical Mind & Shooting. Todos los derechos reservados.</p>
    </footer>
</body>
</html>