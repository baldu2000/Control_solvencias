<?php
// Procesar datos del formulario de agregar
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_completo = $_POST["nombre_completo"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $edad = $_POST["edad"];
    $grado = $_POST["grado"];
    $direccion_residencia = $_POST["direccion_residencia"];
    $nombre_padre = $_POST["nombre_padre"];
    $nombre_madre = $_POST["nombre_madre"];
    $telefono_emergencia = $_POST["telefono_emergencia"];

    // Conectar a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "solvencias";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error al conectar con la base de datos: " . $conn->connect_error);
    }

    // Preparar la consulta SQL para insertar datos
    $sql = "INSERT INTO Expediente (nombre_completo, fecha_nacimiento, edad, grado, direccion_residencia, nombre_padre, nombre_madre, telefono_emergencia)
            VALUES ('$nombre_completo', '$fecha_nacimiento', '$edad', '$grado', '$direccion_residencia', '$nombre_padre', '$nombre_madre', '$telefono_emergencia')";

    if ($conn->query($sql) === TRUE) {
        echo "Expediente agregado correctamente.";
    } else {
        echo "Error al agregar expediente: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
    // Botón de regresar al menú principal
    echo '<br><a href="index.php">Regresar al menú principal</a>';
}
?>
