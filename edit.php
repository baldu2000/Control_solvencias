<?php
include 'db.php'; // Archivo que contiene la conexión a la base de datos

// Obtener el ID del estudiante a editar
$id = $_GET['id'] ?? '';

// Si se envían datos para editar
if (isset($_POST['edit'])) {
    $nombre = $_POST['nombre'] ?? '';
    $grado = $_POST['grado'] ?? '';
    
    // Validar que si el valor está vacío o es 0 se le asigne 'pendiente'
    $matricula = (!empty($_POST['matricula']) && $_POST['matricula'] != 0) ? $_POST['matricula'] : 'pendiente';
    $enero = (!empty($_POST['enero']) && $_POST['enero'] != 0) ? $_POST['enero'] : 'pendiente';
    $febrero = (!empty($_POST['febrero']) && $_POST['febrero'] != 0) ? $_POST['febrero'] : 'pendiente';
    $marzo = (!empty($_POST['marzo']) && $_POST['marzo'] != 0) ? $_POST['marzo'] : 'pendiente';
    $abril = (!empty($_POST['abril']) && $_POST['abril'] != 0) ? $_POST['abril'] : 'pendiente';
    $mayo = (!empty($_POST['mayo']) && $_POST['mayo'] != 0) ? $_POST['mayo'] : 'pendiente';
    $junio = (!empty($_POST['junio']) && $_POST['junio'] != 0) ? $_POST['junio'] : 'pendiente';
    $julio = (!empty($_POST['julio']) && $_POST['julio'] != 0) ? $_POST['julio'] : 'pendiente';
    $agosto = (!empty($_POST['agosto']) && $_POST['agosto'] != 0) ? $_POST['agosto'] : 'pendiente';
    $septiembre = (!empty($_POST['septiembre']) && $_POST['septiembre'] != 0) ? $_POST['septiembre'] : 'pendiente';
    $octubre = (!empty($_POST['octubre']) && $_POST['octubre'] != 0) ? $_POST['octubre'] : 'pendiente';
    $noviembre = (!empty($_POST['noviembre']) && $_POST['noviembre'] != 0) ? $_POST['noviembre'] : 'pendiente';
    $diciembre = (!empty($_POST['diciembre']) && $_POST['diciembre'] != 0) ? $_POST['diciembre'] : 'pendiente';

    // Validar y sanitizar datos
    $nombre = mysqli_real_escape_string($conn, $nombre);
    $grado = mysqli_real_escape_string($conn, $grado);
    $matricula = mysqli_real_escape_string($conn, $matricula);

    // Actualizar los datos del estudiante
    $query = "UPDATE estudiantes 
              SET nombre='$nombre', grado='$grado', matricula='$matricula', enero='$enero', febrero='$febrero', marzo='$marzo', 
                  abril='$abril', mayo='$mayo', junio='$junio', julio='$julio', agosto='$agosto', 
                  septiembre='$septiembre', octubre='$octubre', noviembre='$noviembre', diciembre='$diciembre'
              WHERE id='$id'";
    
    mysqli_query($conn, $query) or die(mysqli_error($conn));

    header("Location: solvencias.php");
}

// Obtener los datos del estudiante para mostrar en el formulario
$query = "SELECT * FROM estudiantes WHERE id='$id'";
$result = mysqli_query($conn, $query);
$estudiante = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Estudiante</title>
    <link rel="stylesheet" href="styles/add_student.css">
</head>
<body>
    <h1>Editar Estudiante</h1>
    <form action="edit.php?id=<?php echo $id; ?>" method="POST">
        <input type="text" name="nombre" placeholder="Nombre" value="<?php echo htmlspecialchars($estudiante['nombre']); ?>" required>
        <input type="text" name="grado" placeholder="Grado" value="<?php echo htmlspecialchars($estudiante['grado']); ?>" required>
        <input type="text" name="matricula" placeholder="Matrícula" value="<?php echo htmlspecialchars($estudiante['matricula']); ?>">
        <input type="number" name="enero" step="0.01" placeholder="Enero" value="<?php echo htmlspecialchars($estudiante['enero']); ?>">
        <input type="number" name="febrero" step="0.01" placeholder="Febrero" value="<?php echo htmlspecialchars($estudiante['febrero']); ?>">
        <input type="number" name="marzo" step="0.01" placeholder="Marzo" value="<?php echo htmlspecialchars($estudiante['marzo']); ?>">
        <input type="number" name="abril" step="0.01" placeholder="Abril" value="<?php echo htmlspecialchars($estudiante['abril']); ?>">
        <input type="number" name="mayo" step="0.01" placeholder="Mayo" value="<?php echo htmlspecialchars($estudiante['mayo']); ?>">
        <input type="number" name="junio" step="0.01" placeholder="Junio" value="<?php echo htmlspecialchars($estudiante['junio']); ?>">
        <input type="number" name="julio" step="0.01" placeholder="Julio" value="<?php echo htmlspecialchars($estudiante['julio']); ?>">
        <input type="number" name="agosto" step="0.01" placeholder="Agosto" value="<?php echo htmlspecialchars($estudiante['agosto']); ?>">
        <input type="number" name="septiembre" step="0.01" placeholder="Septiembre" value="<?php echo htmlspecialchars($estudiante['septiembre']); ?>">
        <input type="number" name="octubre" step="0.01" placeholder="Octubre" value="<?php echo htmlspecialchars($estudiante['octubre']); ?>">
        <input type="number" name="noviembre" step="0.01" placeholder="Noviembre" value="<?php echo htmlspecialchars($estudiante['noviembre']); ?>">
        <input type="number" name="diciembre" step="0.01" placeholder="Diciembre" value="<?php echo htmlspecialchars($estudiante['diciembre']); ?>">
        <input type="submit" name="edit" value="Guardar Cambios">
    </form>
    <a href="solvencias.php">Volver a Solvencias</a>
</body>
</html>
