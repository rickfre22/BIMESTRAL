<?php
// Configuración para LOCALHOST (XAMPP / WAMP)
$host = "localhost";
$db   = "tirap_consultoria";
$user = "root";
$pass = "";

// Configuración para INFINITYFREE (Descomenta cuando subas al servidor)
/*
$host = "sqlXXX.infinityfree.com";
$db   = "if0_XXXXXXXX_tirap_consultoria";
$user = "if0_XXXXXXXX";
$pass = "TU_CONTRASEÑA";
*/

try {
    $conexion = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
}
?>