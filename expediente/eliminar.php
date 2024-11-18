<!-- eliminar.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Eliminar Expediente</title>
</head>
<body>
    <h1>Eliminar Expediente</h1>

    <?php
    // Obtener el ID del expediente a eliminar desde la URL
    $expediente_id = $_GET["id"];

    // Conectar a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "solvencias";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error al conectar con la base de datos: " . $conn->connect_error);
    }

    // Consulta SQL para eliminar el expediente
    $sql = "DELETE FROM Expediente WHERE id = $expediente_id";

    if ($conn->query($sql) === TRUE) {
        echo "Expediente eliminado correctamente.";
        // Botón de regresar al menú principal
    echo '<br><a href="index.php">Regresar al menú principal</a>';
    } else {
        echo "Error al eliminar expediente: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
</body>
</html>
