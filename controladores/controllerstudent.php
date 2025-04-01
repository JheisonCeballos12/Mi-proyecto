<?php
include '../conexion/conexion.php'; // Importamos la conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $celular = $_POST['celular'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];

    // Preparamos la consulta SQL para insertar los datos
    $sql = "INSERT INTO students (nombre, apellido, celular, fecha_nacimiento) 
            VALUES ('$nombre', '$apellido', '$celular', '$fecha_nacimiento')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
