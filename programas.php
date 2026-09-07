<?php
session_start();
require_once 'conexion.php';

$stmt = $conexion->query("SELECT * FROM programas");
$programas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programas de Formación | Tactical Mind</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header>
        <div class="logo">TACTICAL MIND & SHOOTING</div>
        <nav>
            <a href="index.php">Inicio</a>
            <a href="instructor.php">Instructor</a>
            <a href="programas.php" class="active">Programas</a>
            <a href="consultoria.php">Consultorías</a>
            <?php if (isset($_SESSION['id_usuario'])): ?>
                <a href="logout.php" class="btn-primary">Salir (<?php echo htmlspecialchars($_SESSION['nombre']); ?>)</a>
            <?php else: ?>
                <a href="login.php" class="btn-primary">Acceso Usuarios</a>
            <?php endif; ?>
        </nav>
    </header>

    <main class="container">
        <h1 class="page-title">Catálogo de Programas Tácticos</h1>
        <div class="cards-grid">
            <?php if (empty($programas)): ?>
                <p>No hay programas registrados en la base de datos.</p>
            <?php else: ?>
                <?php foreach ($programas as $prog): ?>
                    <div class="card">
                        <div>
                            <span class="badge <?php echo $prog['tipo'] === 'Táctico' ? 'badge-danger' : ($prog['tipo'] === 'Mixto' ? 'badge-success' : ''); ?>">
                                Tipo: <?php echo htmlspecialchars($prog['tipo']); ?>
                            </span>
                            <h3><?php echo htmlspecialchars($prog['titulo']); ?></h3>
                            <p class="card-desc"><?php echo htmlspecialchars($prog['descripcion']); ?></p>
                        </div>
                        <div>
                            <div class="price">$<?php echo number_format($prog['precio'], 2); ?> USD</div>
                            <a href="<?php echo isset($_SESSION['id_usuario']) ? 'consultoria.php' : 'login.php'; ?>" class="btn-primary btn-block">Inscribirse Ahora</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </main>

    <footer>
        <p>© 2026 Tactical Mind & Shooting. Todos los derechos reservados.</p>
    </footer>
</body>
</html>