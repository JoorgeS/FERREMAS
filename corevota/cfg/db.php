<?php
// Configuración de conexión a la base de datos
$host = "localhost";
$user = "root";       // usuario de MySQL en XAMPP
$password = "";       // contraseña (vacía por defecto en XAMPP)
$dbname = "corevota"; // nombre de tu base de datos

// Crear conexión
$conn = new mysqli($host, $user, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión a la BD: " . $conn->connect_error);
}

// Opcional: setear charset para acentos y ñ
$conn->set_charset("utf8mb4");
?>
