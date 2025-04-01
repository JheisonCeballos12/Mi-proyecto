<?php
include '../conexion/conexion.php'; // Se dirige al archivo de conexión para conectarse a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Esto es para ver si el formulario fue enviado en método POST
    // Comprobamos si los valores están presentes en $_POST
    $id_students = isset($_POST['id_students']) ? $_POST['id_students'] : null;
    $id_grado = isset($_POST['id_grado']) ? $_POST['id_grado'] : null;

    if (!empty($id_students) && !empty($id_grado)) {
        $sql = "INSERT INTO students_grado (id_students, id_grado) VALUES (?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            // Aquí se usan las variables correctas, id_students y id_grado
            $stmt->bind_param("ii", $id_students, $id_grado);
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



