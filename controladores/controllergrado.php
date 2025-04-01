<?php
include '../conexion/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $grados = $_POST['grados'];

    $sql = "INSERT INTO grado (grados) VALUES ('$grados')";

    if ($conn->query($sql) === TRUE) {
        echo "Grado registrado con éxito";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
