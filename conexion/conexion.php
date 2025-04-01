<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Configurar codificación de caracteres
$conn->set_charset("utf8");

// Mensaje de éxito opcional (puedes comentarlo)
echo "Conexión exitosa";
?>

