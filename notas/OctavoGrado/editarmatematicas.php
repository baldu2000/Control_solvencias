<?php
// Conexión a la base de datos
$servername = "localhost"; // Cambia esto si es necesario
$username = "root"; // Cambia esto por tu usuario
$password = ""; // Cambia esto por tu contraseña
$dbname = "solvencias"; // Cambia esto por el nombre de tu base de datos

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Manejar la edición de notas
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actualizar'])) {
    $id = $_POST['id'];
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
    
    $sql = "UPDATE notas SET nombre_estudiante='$nombre', nota_febrero='$febrero', nota_marzo='$marzo', nota_abril='$abril', nota_mayo='$mayo', nota_junio='$junio', nota_julio='$julio', nota_agosto='$agosto', nota_septiembre='$septiembre', nota_octubre='$octubre', nota_noviembre='$noviembre' WHERE id='$id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Notas actualizadas correctamente";
        header('Location: matematicas.php'); // Redirigir a la página de matemáticas
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

// Obtener el id de la nota a editar
$id = $_GET['id'];
$query = "SELECT * FROM notas WHERE id='$id'";
$result = $conn->query($query);
$nota = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Nota de Matemáticas</title>
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
        form {
            margin: 20px auto;
            width: 90%;
            display: flex;
            flex-direction: column;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        label {
            margin-top: 10px;
        }
        input[type="text"], input[type="number"] {
            padding: 10px;
            margin: 5px 0;
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
            margin-top: 10px;
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
    </style>
</head>
<body>
    <h1>Editar Nota de Matemáticas</h1>

    <!-- Formulario para editar las notas -->
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $nota['id']; ?>">
        <label for="nombre_estudiante">Nombre del estudiante:</label>
        <input type="text" id="nombre_estudiante" name="nombre_estudiante" value="<?php echo $nota['nombre_estudiante']; ?>" required>

        <label for="nota_febrero">Febrero:</label>
        <input type="number" id="nota_febrero" name="nota_febrero" value="<?php echo $nota['nota_febrero']; ?>">

        <label for="nota_marzo">Marzo:</label>
        <input type="number" id="nota_marzo" name="nota_marzo" value="<?php echo $nota['nota_marzo']; ?>">

        <label for="nota_abril">Abril:</label>
        <input type="number" id="nota_abril" name="nota_abril" value="<?php echo $nota['nota_abril']; ?>">

        <label for="nota_mayo">Mayo:</label>
        <input type="number" id="nota_mayo" name="nota_mayo" value="<?php echo $nota['nota_mayo']; ?>">

        <label for="nota_junio">Junio:</label>
        <input type="number" id="nota_junio" name="nota_junio" value="<?php echo $nota['nota_junio']; ?>">

        <label for="nota_julio">Julio:</label>
        <input type="number" id="nota_julio" name="nota_julio" value="<?php echo $nota['nota_julio']; ?>">

        <label for="nota_agosto">Agosto:</label>
        <input type="number" id="nota_agosto" name="nota_agosto" value="<?php echo $nota['nota_agosto']; ?>">

        <label for="nota_septiembre">Septiembre:</label>
        <input type="number" id="nota_septiembre" name="nota_septiembre" value="<?php echo $nota['nota_septiembre']; ?>">

        <label for="nota_octubre">Octubre:</label>
        <input type="number" id="nota_octubre" name="nota_octubre" value="<?php echo $nota['nota_octubre']; ?>">

        <label for="nota_noviembre">Noviembre:</label>
        <input type="number" id="nota_noviembre" name="nota_noviembre" value="<?php echo $nota['nota_noviembre']; ?>">
        <button type="submit" name="actualizar">Actualizar Notas</button>
    </form>

    <a href="matematicas.php">Volver a Notas de Matemáticas</a>
</body>
</html>

<?php $conn->close(); ?>
