<?php 
// Conectar a la base de datos
$conn = new mysqli('localhost', 'root', '', 'solvencias');

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Insertar nuevas notas
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['agregar'])) {
    $nombre = $_POST['nombre_estudiante'];
    $febrero = $_POST['nota_febrero'] ?? 0;
    $marzo = $_POST['nota_marzo'] ?? 0;
    $abril = $_POST['nota_abril'] ?? 0;
    $mayo = $_POST['nota_mayo'] ?? 0;
    $junio = $_POST['nota_junio'] ?? 0;
    $julio = $_POST['nota_julio'] ?? 0;
    $agosto = $_POST['nota_agosto'] ?? 0;
    $septiembre = $_POST['nota_septiembre'] ?? 0;
    $octubre = $_POST['nota_octubre'] ?? 0;
    $noviembre = $_POST['nota_noviembre'] ?? 0;
    
    $sql = "INSERT INTO notas (nombre_estudiante, grado, materia, nota_febrero, nota_marzo, nota_abril, nota_mayo, nota_junio, nota_julio, nota_agosto, nota_septiembre, nota_octubre, nota_noviembre)
            VALUES ('$nombre', 'Cuarto Grado', 'Ingles', '$febrero', '$marzo', '$abril', '$mayo', '$junio', '$julio', '$agosto', '$septiembre', '$octubre', '$noviembre')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Notas agregadas correctamente";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Manejar eliminación de notas
if (isset($_POST['confirmar_eliminar'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM notas WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Nota eliminada correctamente";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Consulta para obtener las notas de Ingles para Cuarto grado
$query = "SELECT * FROM notas WHERE materia = 'Ingles' AND grado = 'Cuarto Grado'";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas de Inglés - Cuarto Grado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        h1 {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            text-align: center;
        }
        table { 
            width: 90%; 
            margin: 20px auto;
            border-collapse: collapse; 
            background-color: white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        th, td { 
            border: 1px solid #ddd; 
            padding: 12px; 
            text-align: center; 
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        form {
            margin: 20px auto;
            width: 90%;
            display: flex;
            justify-content: space-between;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        input[type="text"], input[type="number"] {
            padding: 10px;
            width: calc(100% / 12); /* Divide el ancho en columnas */
            margin: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #45a049;
        }
        a {
            text-decoration: none;
            color: #4CAF50;
            display: inline-block;
            margin: 20px auto;
            padding: 10px 15px;
            border: 1px solid #4CAF50;
            border-radius: 5px;
            background-color: white;
        }
        a:hover {
            background-color: #4CAF50;
            color: white;
        }
        .actions button {
            background-color: #f44336;
        }
        .actions button:hover {
            background-color: #d32f2f;
        }
    </style>
    <script>
        function confirmDelete() {
            return confirm("¿Estás seguro de que deseas eliminar esta nota?");
        }
    </script>
</head>
<body>
    <h1>Notas de Inglés - Cuarto Grado</h1>

    <!-- Formulario para agregar nuevas notas -->
    <form method="POST">
        <input type="text" name="nombre_estudiante" placeholder="Nombre del estudiante" required>
        <input type="number" name="nota_febrero" placeholder="Febrero" value="0">
        <input type="number" name="nota_marzo" placeholder="Marzo" value="0">
        <input type="number" name="nota_abril" placeholder="Abril" value="0">
        <input type="number" name="nota_mayo" placeholder="Mayo" value="0">
        <input type="number" name="nota_junio" placeholder="Junio" value="0">
        <input type="number" name="nota_julio" placeholder="Julio" value="0">
        <input type="number" name="nota_agosto" placeholder="Agosto" value="0">
        <input type="number" name="nota_septiembre" placeholder="Septiembre" value="0">
        <input type="number" name="nota_octubre" placeholder="Octubre" value="0">
        <input type="number" name="nota_noviembre" placeholder="Noviembre" value="0">
        <button type="submit" name="agregar">Agregar Notas</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Nombre del Estudiante</th>
                <th>Grado</th>
                <th>Febrero</th>
                <th>Marzo</th>
                <th>Abril</th>
                <th>Mayo</th>
                <th>Junio</th>
                <th>Julio</th>
                <th>Agosto</th>
                <th>Septiembre</th>
                <th>Octubre</th>
                <th>Noviembre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['nombre_estudiante']}</td>";
                    echo "<td>{$row['grado']}</td>";
                    echo "<td>{$row['nota_febrero']}</td>";
                    echo "<td>{$row['nota_marzo']}</td>";
                    echo "<td>{$row['nota_abril']}</td>";
                    echo "<td>{$row['nota_mayo']}</td>";
                    echo "<td>{$row['nota_junio']}</td>";
                    echo "<td>{$row['nota_julio']}</td>";
                    echo "<td>{$row['nota_agosto']}</td>";
                    echo "<td>{$row['nota_septiembre']}</td>";
                    echo "<td>{$row['nota_octubre']}</td>";
                    echo "<td>{$row['nota_noviembre']}</td>";
                    echo "<td class='actions'>";
                    // Enlace a la página de edición
                    echo "<a href='editaringles.php?id={$row['id']}'>Editar</a>";
                    // Formulario para eliminar
                    echo "<form method='POST' style='display:inline;' onsubmit='return confirmDelete();'>";
                    echo "<input type='hidden' name='id' value='{$row['id']}'>";
                    echo "<button type='submit' name='confirmar_eliminar'>Eliminar</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='13'>No hay notas disponibles.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="../index.php">Volver a la página principal</a>
</body>
</html>

<?php
$conn->close();
?>