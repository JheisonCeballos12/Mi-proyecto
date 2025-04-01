<?php
include '../conexion/conexion.php'; // se dirige al archivo conexion para conectarse a la base de datos 

if ($_SERVER["REQUEST_METHOD"] == "POST") { //esto es para ver si el formulario fue enviado en metodo post
    $student_id = $_POST['student_id']; //Extrae los valores enviados a través del formulario HTML con los campos student_id y grado_id.
    $grado_id = $_POST['grado_id'];//Extrae los valores enviados a través del formulario HTML con los campos student_id y grado_id.

    // Verificar que los valores no estén vacíos
    if (!empty($student_id) && !empty($grado_id)) {
        $sql = "INSERT INTO student_grado (student_id, grado_id) VALUES (?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ii", $student_id, $grado_id);
            if ($stmt->execute()) {
                echo "Relación agregada correctamente.";
            } else {
                echo "Error al insertar: " . $stmt->error;
            }
            $stmt->close();
        }
    } else {
        echo "Todos los campos son obligatorios.";
    }

    $conn->close();
}
?>

