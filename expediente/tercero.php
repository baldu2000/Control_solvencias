<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Expedientes de Tercer Grado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        .expediente {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 10px;
        }
        .expediente p {
            margin: 5px 0;
        }
        .expediente a {
            text-decoration: none;
            color: #007bff;
            margin-left: 10px;
        }
        .expediente a:hover {
            text-decoration: underline;
        }
        .agregar {
            text-align: center;
            margin-top: 20px;
        }
        .agregar a {
            text-decoration: none;
            color: #28a745;
            font-weight: bold;
            padding: 10px 20px;
            border: 1px solid #28a745;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }
        .agregar a:hover {
            background-color: #28a745;
            color: #fff;
        }
        .agregar a:active {
            background-color: #218838;
            border-color: #1e7e34;
        }
    </style>
</head>
<body>
    <h1>Expedientes de Tercer Grado</h1>

    <?php
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "solvencias";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error al conectar con la base de datos: " . $conn->connect_error);
    }

    // Consulta SQL para obtener expedientes de Parvularia
    $sql = "SELECT * FROM Expediente WHERE grado = 'Tercer Grado'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='expediente'>
                <p><strong>Nombre Completo:</strong> " . $row["nombre_completo"] . "</p>
                <p><strong>Fecha de Nacimiento:</strong> " . $row["fecha_nacimiento"] . "</p>
                <p><strong>Edad:</strong> " . $row["edad"] . "</p>
                <p><strong>Grado:</strong> " . $row["grado"] . "</p>
                <p><strong>Dirección de Residencia:</strong> " . $row["direccion_residencia"] . "</p>
                <p><strong>Nombre del Padre:</strong> " . $row["nombre_padre"] . "</p>
                <p><strong>Nombre de la Madre:</strong> " . $row["nombre_madre"] . "</p>
                <p><strong>Teléfono de Emergencia:</strong> " . $row["telefono_emergencia"] . "</p>
                <p>
                    <a href='editar.php?id=" . $row["id"] . "'>Editar</a>
                    <a href='eliminar.php?id=" . $row["id"] . "' onclick='return confirm(\"¿Estás seguro que deseas eliminar este expediente?\")'>Eliminar</a>
                </p>
            </div>";
        }
    } else {
        echo "<p>No se encontraron expedientes de Tercer Grado.</p>";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
    
    <div class="agregar">
        <a href="agregar.php">Agregar Expediente</a>
    </div>

    <div style="text-align: center; margin-top: 20px;">
        <a href="index.php">Volver al Inicio</a>
    </div>
</body>
</html>

