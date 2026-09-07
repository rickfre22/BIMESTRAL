<?php
$host = "localhost";
$db   = "tirap_consultoria";
$user = "root";       // Cambia según tu configuración local/servidor
$pass = "";           // Contraseña de tu MySQL

try {
    $conexion = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
}
?>