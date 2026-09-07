<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor Miguel Galvis | Tactical Mind</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header>
        <div class="logo">TACTICAL MIND & SHOOTING</div>
        <nav>
            <a href="index.php">Inicio</a>
            <a href="instructor.php" class="active">Instructor</a>
            <a href="programas.php">Programas</a>
            <a href="consultoria.php">Consultorías</a>
            <?php if (isset($_SESSION['id_usuario'])): ?>
                <a href="logout.php" class="btn-primary">Salir (<?php echo htmlspecialchars($_SESSION['nombre']); ?>)</a>
            <?php else: ?>
                <a href="login.php" class="btn-primary">Acceso Usuarios</a>
            <?php endif; ?>
        </nav>
    </header>

    <main class="container">
        <span class="badge">Instructor Principal y Creador</span>
        <h1 class="instructor-name">Miguel Galvis</h1>
        <h3 class="instructor-title">Soldado de Fuerzas Especiales | Tirador de Alta Precisión (Francotirador)</h3>
        
        <div class="card card-wide">
            <h2>Trayectoria y Experiencia Operativa</h2>
            <p>
                Con más de 2 años de experiencia directa en el campo de operaciones de combate, Miguel Galvis se ha especializado en misiones de alta precisión donde la toma de decisiones bajo estrés extremo determina el éxito de la misión.
            </p>
            <p>
                Su metodología combina la disciplina de las Fuerzas Especiales con técnicas neurofisiológicas aplicadas para el control del ritmo cardíaco, eliminación de la visión de túnel y estabilización del pulso en tiradores de élite.
            </p>
            <a href="consultoria.php" class="btn-primary">Solicitar Consultoría Privada con Miguel</a>
        </div>
    </main>

    <footer>
        <p>© 2026 Tactical Mind & Shooting. Todos los derechos reservados.</p>
    </footer>
</body>
</html>