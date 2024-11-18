<!DOCTYPE html>
<html>
<head>
    <title>Editar Expediente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        input[type="text"], input[type="date"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        a {
            display: block;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Expediente</h1>

        <?php
        // Obtener el ID del expediente a editar desde la URL
        $expediente_id = $_GET["id"];

        // Conectar a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "solvencias";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("<p class='error'>Error al conectar con la base de datos: " . $conn->connect_error . "</p>");
        }

        // Consulta SQL para obtener los datos del expediente
        $sql = "SELECT * FROM Expediente WHERE id = $expediente_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        ?>

        <form action="procesar_editar.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="text" name="nombre_completo" value="<?php echo $row['nombre_completo']; ?>" placeholder="Nombre Completo" required><br>
            <input type="date" name="fecha_nacimiento" value="<?php echo $row['fecha_nacimiento']; ?>" required><br>
            <input type="text" name="edad" value="<?php echo $row['edad']; ?>" placeholder="Edad" required><br>
            <input type="text" name="grado" value="<?php echo $row['grado']; ?>" placeholder="Grado" required><br>
            <input type="text" name="direccion_residencia" value="<?php echo $row['direccion_residencia']; ?>" placeholder="Dirección de Residencia"><br>
            <input type="text" name="nombre_padre" value="<?php echo $row['nombre_padre']; ?>" placeholder="Nombre del Padre"><br>
            <input type="text" name="nombre_madre" value="<?php echo $row['nombre_madre']; ?>" placeholder="Nombre de la Madre"><br>
            <input type="text" name="telefono_emergencia" value="<?php echo $row['telefono_emergencia']; ?>" placeholder="Teléfono de Emergencia"><br>
            <input type="submit" value="Guardar Cambios">
        </form>

        <?php
        } else {
            echo "<p class='error'>Expediente no encontrado.</p>";
        }

        // Cerrar la conexión a la base de datos
        $conn->close();
        ?>
        <a href="index.php">Regresar al Menú Principal</a>
    </div>
</body>
</html>