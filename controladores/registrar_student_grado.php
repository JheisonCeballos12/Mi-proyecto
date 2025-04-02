<?php
include '../conexion/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_students = isset($_POST['id_students']) ? $_POST['id_students'] : null;
    $id_grado = isset($_POST['id_grado']) ? $_POST['id_grado'] : null;

    if (!empty($id_students) && !empty($id_grado)) {
        $sql = "INSERT INTO students_grado (id_students, id_grado) VALUES (?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ii", $id_students, $id_grado);
            if ($stmt->execute()) {
                echo "Registro exitoso.";
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




