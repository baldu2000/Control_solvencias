<?php
// Inicializa la variable para almacenar el mensaje de error
$error = "";

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "solvencias";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Manejo del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario']; // Cambiado a 'usuario'
    $contraseña = $_POST['contraseña'];

    // Verifica que se hayan ingresado ambos campos
    if (empty($usuario) || empty($contraseña)) {
        $error = "Por favor ingrese ambos campos.";
    } else {
        // Consulta a la base de datos buscando por usuario
        $sql = "SELECT * FROM usuarios WHERE usuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        // Verifica si el usuario existe
        if ($result->num_rows > 0) {
            $usuario_data = $result->fetch_assoc();

            // Verifica la contraseña
            if ($contraseña === $usuario_data['contraseña']) {
                session_start();
                $_SESSION['usuario'] = $usuario; // Cambiado a 'usuario'
                header("Location: ./dashboard.php");
                exit();
            } else {
                $error = "Usuario y/o contraseña incorrectos.";
            }
        } else {
            $error = "Usuario y/o contraseña incorrectos.";
        }

        $stmt->close();
    }
}

$conn->close();
?>
