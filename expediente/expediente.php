<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Detalles del Expediente</title>
    <style>
        .expediente {
            border: 1px solid black;
            padding: 15px;
            margin: 20px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .expediente h2 {
            margin-top: 0;
        }
        .expediente a {
            text-decoration: none;
            color: #007BFF;
        }
    </style>
</head>
<body>
    <h1>Detalles del Expediente</h1>

    <?php
    // Conectar a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "solvencias";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error al conectar con la base de datos: " . $conn->connect_error);
    }

    // Obtener el ID del expediente de la URL
    $id = $_GET['id'];

    // Consulta SQL para obtener el expediente específico
    $sql = "SELECT * FROM Expediente WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Mostrar los detalles del expediente
        echo "<div class='expediente'>
            <h2>ID: " . $row["id"] . "</h2>
            <p><strong>Nombre Completo:</strong> " . $row["nombre_completo"] . "</p>
            <p><strong>Fecha de Nacimiento:</strong> " . $row["fecha_nacimiento"] . "</p>
            <p><strong>Edad:</strong> " . $row["edad"] . "</p>
            <p><strong>Grado:</strong> " . $row["grado"] . "</p>
            <p><strong>Dirección de Residencia:</strong> " . $row["direccion_residencia"] . "</p>
            <p><strong>Nombre del Padre:</strong> " . $row["nombre_padre"] . "</p>
            <p><strong>Nombre de la Madre:</strong> " . $row["nombre_madre"] . "</p>
            <p><strong>Teléfono de Emergencia:</strong> " . $row["telefono_emergencia"] . "</p>
            <p>
                <a href='editar.php?id=" . $row["id"] . "'>Editar</a> | 
                <a href='eliminar.php?id=" . $row["id"] . "'>Eliminar</a> | 
                <a href='index.php'>Volver a la lista</a>
            </p>
        </div>";
    } else {
        echo "<p>No se encontró el expediente.</p>";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
</body>
</html>