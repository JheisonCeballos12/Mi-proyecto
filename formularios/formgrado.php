<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Grados</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <div class="container">
        <h2>Registrar Grado</h2>
        <form action="../controladores/controllergrado.php" method="POST">
            <label for="grados">Nombre del Grado:</label>
            <input type="text" id="grados" name="grados" required>
            <button type="submit">Registrar</button>
        </form>
    </div>

    <div class="container">
        <h2>Panel de Control</h2>
        <nav>
            <ul>
                <li><a href="../panel.php">panel</a></li>
                <li><a href="formstudents.php">Registro de estudiantes</a></li>
                <li><a href="enlaces.php">Registro de Enlaces</a></li>              
            </ul>
        </nav>
    </div>

    <div class="container">
        <h2>Lista de grados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Grados</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                include '../conexion/conexion.php';

                $sql = "SELECT * FROM grado";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['grados']}</td>
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
