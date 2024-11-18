<?php 
// Inicializa la variable para almacenar el mensaje de error
$error = "";

// Conexión a la base de datos (ajusta los parámetros según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "solvencias"; // Cambia el nombre de la base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Establece el nombre del colegio directamente
$nombre_colegio = "Colegio Luterano Salvadoreño";

// Manejo del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario']; // Cambiado a 'usuario'
    $contraseña = $_POST['contraseña'];

    // Verifica que se hayan ingresado ambos campos
    if (empty($usuario) || empty($contraseña)) {
        $error = "Por favor ingrese ambos campos.";
    } else {
        // Consulta a la base de datos para buscar el usuario en lugar del correo
        $sql = "SELECT * FROM usuarios WHERE usuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        // Verifica si el usuario existe
        if ($result->num_rows > 0) {
            $usuario_data = $result->fetch_assoc();

            // Verifica la contraseña (usa password_verify si usas hash)
            if ($contraseña === $usuario_data['contraseña']) { // Cambia esto a password_verify si usas hashing
                session_start();
                $_SESSION['usuario'] = $usuario; // Guarda el usuario en la sesión
                header("Location: ./dashboard.php"); // Cambia esto a la página de destino
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

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($nombre_colegio); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-blue-100 flex items-center justify-center min-h-screen">
    <div class="bg-gray-200 w-full lg:w-1/2 xl:w-1/3 p-10 rounded-lg shadow-lg flex flex-col">
        <div class="bg-white p-20 flex flex-col justify-center w-full">
            <h2 class="text-xl font-bold mb-6 text-center"><?php echo htmlspecialchars($nombre_colegio); ?></h2>

            <img src="imagen/logo_colegio.png" alt="Logo del Colegio Luterano Salvadoreño" class="mb-4 mx-auto" width="120" height="120">
            <h2 class="text-xl font-bold mb-6 text-center">Sistema de Gestión Docente (SGD)</h2>

            <!-- Mensaje de error si hay fallos en la autenticación -->
            <?php if (!empty($error)): ?>
                <div class="text-red-500 mb-4 text-center">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <!-- Formulario de inicio de sesión -->
            <form action="" method="POST" class="flex flex-col items-center">
                <div class="flex items-center mb-4 w-full">
                    <i class="fas fa-user mr-2 text-gray-500"></i>
                    <input type="text" name="usuario" placeholder="Usuario" class="border border-gray-300 p-2 rounded w-full" required> <!-- Cambiado a 'usuario' -->
                </div>
                <div class="flex items-center mb-6 w-full">
                    <i class="fas fa-lock mr-2 text-gray-500"></i>
                    <input type="password" name="contraseña" placeholder="Contraseña" class="border border-gray-300 p-2 rounded w-full" required>
                </div>
                <button type="submit" class="bg-blue-500 text-white p-2 rounded w-full">INICIAR SESIÓN</button>
            </form>

            <a href="contraseña/olvide_contra.php" class="text-sm text-blue-700 mt-4 text-center">¿Olvidaste tu contraseña?</a>
        </div>
    </div>
</body>
</html>
