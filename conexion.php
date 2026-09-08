<?php
// Configuración para LOCALHOST (XAMPP / WAMP)
$host = "localhost";
$db   = "tirap_consultoria";
$user = "root";
$pass = "";

// Configuración para INFINITYFREE (Descomenta cuando subas al servidor)
/*
$host = "sql203.infinityfree.com";
$db   = "if0_42858141_tirap_consultoria";
$user = "if0_42858141";
$pass = "TU_CONTRASEÑA";
*/

try {
    $conexion = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
}
?>
