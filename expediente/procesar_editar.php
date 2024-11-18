<?php
// Procesar datos del formulario de editar
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
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

    // Preparar la consulta SQL para actualizar datos
    $sql = "UPDATE Expediente SET
            nombre_completo = '$nombre_completo',
            fecha_nacimiento = '$fecha_nacimiento',
            grado = '$grado',
            edad = '$edad',
            direccion_residencia = '$direccion_residencia',
            nombre_padre = '$nombre_padre',
            nombre_madre = '$nombre_madre',
            telefono_emergencia = '$telefono_emergencia'
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Expediente actualizado correctamente.";
    } else {
        echo "Error al actualizar expediente: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
    echo '<br><a href="index.php">Regresar al menú principal</a>';

}
?>
