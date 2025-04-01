<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Estudiantes</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>

    <div class="container">
        <h2>Registro de Estudiantes</h2>
        <form action="../controladores/controllerstudent.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required>

            <label for="celular">Celular:</label>
            <input type="text" id="celular" name="celular" required>

            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required> /*

            <button type="submit">Registrar</button>
        </form>
        

        
    </div>
     <h1>titulo</h1>

    <div class="container">
        <nav>
            <ul>
                <li><a href="../panel.php">panel</a></li>
                <li><a href="formgrado.php">Registro de Grados</a></li>
                <li><a href="enlaces.php">Registro de Enlaces</a></li>
            </ul>
        </nav>
    </div>
    <a type="button" role="button" href="../panel.php">volver</a>

    

    <div class="container">
        <h2>Lista de Estudiantes</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Celular</th>
                    <th>Fecha de Nacimiento</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../conexion/conexion.php';

                $sql = "SELECT * FROM students"; /* hace llamado a toda la tabla de students*/
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['nombre']}</td>
                                <td>{$row['apellido']}</td>
                                <td>{$row['celular']}</td>
                                <td>{$row['fecha_nacimiento']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No hay registros</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>
