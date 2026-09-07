<?php
session_start();
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
        <div class="hero-buttons">
            <a href="programas.php" class="btn-primary">Ver Programas de Formación</a>
            <a href="consultoria.php" class="btn-primary btn-secondary-action">Agendar Consultoría</a>
        </div>
    </main>

    <footer>
        <p>© 2026 Tactical Mind & Shooting. Todos los derechos reservados.</p>
    </footer>
</body>
</html>