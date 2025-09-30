<?php

// ------------------------------------
// 1. Definir las credenciales de la BD
// ------------------------------------
$servername = "localhost"; // O la dirección de tu servidor de BD
$username = "root";        // Tu usuario de BD
$password = "";            // Tu contraseña (vacía en XAMPP por defecto)
$dbname = "corevota"; // ¡Importante! Cámbialo

// ------------------------------------
// 2. Crear la conexión
// ------------------------------------
// El constructor de mysqli intenta conectar de inmediato
$conn = new mysqli($servername, $username, $password, $dbname);

// ------------------------------------
// 3. Verificar si hay errores en la conexión
// ------------------------------------
if ($conn->connect_error) {
    // Si connect_error no está vacío, significa que hubo un error.
    // Usamos die() para detener la ejecución y mostrar el error.
    die("Conexión fallida: " . $conn->connect_error);
}

// Si la ejecución llega aquí, la conexión fue exitosa
echo "Conexión exitosa a la base de datos: " . $dbname;

// ------------------------------------
// 4. Cierre de la conexión (Buena Práctica)
// ------------------------------------
// Se recomienda cerrar la conexión una vez que hayas terminado de usarla.
// Aunque PHP la cierra automáticamente al final del script, es una buena práctica.
$conn->close();

?>