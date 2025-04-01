<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Asignar Estudiante a Grado</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <div class="container">
        <h2>Asignar Estudiante a Grado</h2>
        <form action="../controladores/registrar_student_grado.php" method="POST">
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

            <button type="submit">Asignar</button>
        </form>
    </div>
    <select name="" id=""></select>

    <div class="container">
        <h2>enlaces</h2>
        <nav>
            <ul>
                <li><a href="../panel.php">panel</a></li>
                <li><a href="formgrado.php">Registro de Grados</a></li>
                <li><a href="formstudents.php">Registro de estudiantes</a></li>
                
            </ul>
        </nav>
    </div>

    <div class="container">
        <h2>Lista de Estudiantes y Grados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Grado</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include '../conexion/conexion.php';

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['nombre']}</td>
                                <td>{$row['apellido']}</td>
                                <td>{$row['grados']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No hay registros</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>


