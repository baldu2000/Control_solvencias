<?php
session_start();

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

// Conexión a la base de datos
$servername = "localhost";
$username = "root"; // Ajusta según tu configuración
$password = ""; // Ajusta según tu configuración
$dbname = "solvencias"; // Ajusta según tu base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtén el nombre y el rol del usuario
$usuario = $_SESSION['usuario'];
$sql = "SELECT nombre, rol FROM usuarios WHERE usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();
$nombreUsuario = "Usuario"; // Valor predeterminado
$rolUsuario = "docente"; // Rol por defecto

if ($result->num_rows > 0) {
    $fila = $result->fetch_assoc();
    $nombreUsuario = $fila['nombre'] ? $fila['nombre'] : $usuario;
    $rolUsuario = $fila['rol']; // Guarda el rol del usuario
}

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal</title>
    <style>
        /* Estilos generales del cuerpo */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        /* Contenedor principal */
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        /* Menú */
        .menu {
            background-color: #007bff;
            padding: 10px;
            color: #fff;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .menu a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
            font-size: 18px;
            font-weight: bold;
        }

        .menu a:hover {
            text-decoration: underline;
        }

        /* Encabezado */
        h1 {
            color: #333;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
            margin-bottom: 20px;
            font-size: 2em;
        }

        /* Logo */
        .logo {
            width: 300px; /* Ajusta el tamaño según sea necesario */
            height: auto;
            margin-bottom: 20px;
        }

        /* Botones */
        .btn {
            display: inline-block;
            background-color: #28a745;
            color: #fff;
            padding: 15px 30px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            margin: 0 10px;
            text-align: center;
        }

        .btn:hover {
            background-color: #218838;
        }

        /* Botón de cerrar sesión */
        .logout-btn {
            background-color: #dc3545;
            padding: 10px 20px;
            text-decoration: none;
            color: white;
            font-weight: bold;
            border-radius: 4px;
            margin-top: 20px;
            display: inline-block;
        }

        .logout-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Logo -->
        <img src="imagen/logo_colegio.png" alt="Logo" class="logo">
        <h1>¡Bienvenido, <?php echo htmlspecialchars($nombreUsuario); ?>, al Control de Estudiantes 2025!</h1>

        <!-- Menú -->
        <div class="menu">
            <?php if ($rolUsuario === 'administrador' || $rolUsuario === 'director'): ?>
                <a href="solvencias.php" class="btn">Solvencias</a>
                <a href="expediente/index.php" class="btn">Expedientes</a>
            <?php endif; ?>
            <a href="notas/index.php" class="btn">Notas</a>
        </div>

        <!-- Botón de Cerrar Sesión fuera del menú -->
        <a href="logout.php" class="logout-btn">Cerrar Sesión</a>
    </div>
</body>
</html>
