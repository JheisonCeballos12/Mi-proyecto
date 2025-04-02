<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Asignar Estudiante a Grado</title>
    <link rel="stylesheet" href="../styles/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Biblioteca para AJAX -->
</head>
<body>
    <div class="container">
        <h2>Asignar Estudiante a Grado</h2>
        <form id="registroForm">
            <label for="id_students">Selecciona un Estudiante:</label>
            <select id="id_students" name="id_students" required>
                <?php
                include '../conexion/conexion.php';
                $sql = "SELECT id, nombre, apellido FROM students";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['nombre']} {$row['apellido']}</option>";
                }
                ?>
            </select>

            <label for="id_grado">Selecciona un Grado:</label>
            <select id="id_grado" name="id_grado" required>
                <?php
                $sql = "SELECT id, grados FROM grado";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['grados']}</option>";
                }
                ?>
            </select>

            <button type="submit">Registrar</button>
        </form>

        <p id="mensaje"></p> <!-- Mensaje de confirmación -->
    </div>

    <div class="container">
        <h2>Enlaces</h2>
        <nav>
            <ul>
                <li><a href="../panel.php">Panel</a></li>
                <li><a href="formgrado.php">Registro de Grados</a></li>
                <li><a href="formstudents.php">Registro de Estudiantes</a></li>
            </ul>
        </nav>
    </div>

    <div class="container">
        <h2>Lista de Estudiantes y Grados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>id_Estudiante</th>
                    <th>id_Grado</th>
                </tr>
            </thead>
            <tbody id="tablaRegistros">
                <?php 
                include '../conexion/conexion.php';
                $sql = "SELECT sg.id, s.nombre, s.apellido, g.grados 
                        FROM students_grado sg
                        JOIN students s ON sg.id_students = s.id
                        JOIN grado g ON sg.id_grado = g.id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['nombre']} {$row['apellido']}</td>
                                <td>{$row['grados']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No hay registros</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $("#registroForm").submit(function(event) {
                event.preventDefault(); // Evita que la página se recargue

                $.ajax({
                    url: "../controladores/registrar_student_grado.php",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(response) {
                        $("#mensaje").html(response); // Muestra el mensaje de éxito o error
                        actualizarTabla(); // Llama a la función para actualizar la tabla
                    }
                });
            });

            function actualizarTabla() {
                $.ajax({
                    url: "../controladores/cargar_registros.php",
                    type: "GET",
                    success: function(data) {
                        $("#tablaRegistros").html(data); // Actualiza la tabla con los nuevos datos
                    }
                });
            }
        });
    </script>
</body>
</html>
