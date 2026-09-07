<?php
session_start();
if (isset($_SESSION['id_usuario'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso a Usuarios | Tactical Mind</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header>
        <div class="logo">TACTICAL MIND & SHOOTING</div>
        <nav>
            <a href="index.php">Inicio</a>
            <a href="instructor.php">Instructor</a>
            <a href="programas.php">Programas</a>
            <a href="consultoria.php">Consultorías</a>
            <a href="login.php" class="btn-primary active">Acceso Usuarios</a>
        </nav>
    </header>

    <main class="container">
        <h1 class="page-title">Plataforma de Usuarios</h1>
        <p class="subtitle">Inicia sesión para acceder a tus capacitaciones o regístrate como nuevo cliente.</p>

        <div class="auth-container">
            <!-- INICIO DE SESIÓN -->
            <div class="card">
                <h2>Iniciar Sesión</h2>
                <form action="procesar_login.php" method="POST">
                    <div class="form-group">
                        <label for="login_correo">Correo Electrónico:</label>
                        <input type="email" id="login_correo" name="correo" placeholder="ejemplo@correo.com" required>
                    </div>
                    <div class="form-group">
                        <label for="login_password">Contraseña:</label>
                        <input type="password" id="login_password" name="contrasena" placeholder="********" required>
                    </div>
                    <button type="submit" class="btn-primary btn-block">Ingresar</button>
                </form>
            </div>

            <!-- REGISTRO -->
            <div class="card">
                <h2>Crear Cuenta</h2>
                <form action="procesar_registro.php" method="POST">
                    <div class="form-group">
                        <label for="reg_nombre">Nombre Completo:</label>
                        <input type="text" id="reg_nombre" name="nombre" placeholder="Tu nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="reg_correo">Correo Electrónico:</label>
                        <input type="email" id="reg_correo" name="correo" placeholder="ejemplo@correo.com" required>
                    </div>
                    <div class="form-group">
                        <label for="reg_telefono">Teléfono:</label>
                        <input type="tel" id="reg_telefono" name="telefono" placeholder="+57 300 000 0000" required>
                    </div>
                    <div class="form-group">
                        <label for="reg_password">Contraseña:</label>
                        <input type="password" id="reg_password" name="contrasena" placeholder="Mínimo 8 caracteres" required>
                    </div>
                    <button type="submit" class="btn-primary btn-block">Registrarse</button>
                </form>
            </div>
        </div>
    </main>

    <footer>
        <p>© 2026 Tactical Mind & Shooting. Todos los derechos reservados.</p>
    </footer>
</body>
</html>