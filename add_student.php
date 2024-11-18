<?php
include 'db.php'; // Archivo que contiene la conexión a la base de datos

if (isset($_POST['add'])) {
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

    $query = "INSERT INTO estudiantes (nombre, grado, matricula, enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre)
              VALUES ('$nombre', '$grado', '$matricula', '$enero', '$febrero', '$marzo', '$abril', '$mayo', '$junio', '$julio', '$agosto', '$septiembre', '$octubre', '$noviembre', '$diciembre')";
    
    mysqli_query($conn, $query) or die(mysqli_error($conn));

    header("Location: solvencias.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Estudiante</title>
    <link rel="stylesheet" href="styles/add_student.css">
</head>
<body>
    <h1>Agregar Estudiante</h1>
    <form action="add_student.php" method="POST">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="grado" placeholder="Grado" required>
        <input type="text" name="matricula" placeholder="Matrícula">
        <input type="number" name="enero" step="0.01" placeholder="Enero">
        <input type="number" name="febrero" step="0.01" placeholder="Febrero">
        <input type="number" name="marzo" step="0.01" placeholder="Marzo">
        <input type="number" name="abril" step="0.01" placeholder="Abril">
        <input type="number" name="mayo" step="0.01" placeholder="Mayo">
        <input type="number" name="junio" step="0.01" placeholder="Junio">
        <input type="number" name="julio" step="0.01" placeholder="Julio">
        <input type="number" name="agosto" step="0.01" placeholder="Agosto">
        <input type="number" name="septiembre" step="0.01" placeholder="Septiembre">
        <input type="number" name="octubre" step="0.01" placeholder="Octubre">
        <input type="number" name="noviembre" step="0.01" placeholder="Noviembre">
        <input type="number" name="diciembre" step="0.01" placeholder="Diciembre">
        <input type="submit" name="add" value="Agregar">
    </form>
    <a href="solvencias.php">Volver a Solvencias</a>
</body>
</html>
