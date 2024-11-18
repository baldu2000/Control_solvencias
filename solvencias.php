<?php
include 'db.php'; // Archivo que contiene la conexión a la base de datos

// Eliminar estudiante
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM estudiantes WHERE id='$id'";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
}

// Obtener todos los estudiantes
$result = mysqli_query($conn, "SELECT * FROM estudiantes");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solvencias de Estudiantes</title>
    <style>
    body {
    font-family: Arial, sans-serif;
    margin: 20px;
    background-color: #f4f4f4;
    text-align: center;

}

h1 {
    color: #333;
    text-align: center;
}

a {
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

.table-container {
    margin: 20px auto;
    width: 90%;
    max-width: 1200px;
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
}

th {
    background-color: #f2f2f2;
    color: #333;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #eaeaea;
}

.btn-add {
    display: inline-block;
    padding: 10px 20px;
    margin-bottom: 20px;
    font-size: 16px;
    color: #fff;
    background-color: #28a745;
    border: none;
    border-radius: 5px;
    text-align: center;
    text-decoration: none;
}

.btn-add:hover {
    background-color: #218838;
}

a.back-button {
    display: inline-block;
    margin-top: 20px;
    font-size: 16px;
    color: #fff;
    background-color: #007bff;
    padding: 10px 20px;
    border-radius: 5px;
    text-align: center;
    text-decoration: none;
}

a.back-button:hover {
    background-color: #0056b3;
}

 /* Logo */
 .logo {
    width: 300px; /* Ajusta el tamaño según sea necesario */
    height: auto;
    margin-bottom: 20px;
}
</style>
</head>
<body>
<div class="container">
    <!-- Logo -->
    <img src="imagen/logo_colegio.png" alt="Logo" class="logo">
    <h1>Gestión de Solvencias</h1>

    <!-- Botón para agregar estudiante -->
    <a href="add_student.php" class="btn-add">Agregar Estudiante</a>

    <!-- Lista de estudiantes -->
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Grado</th>
                <th>Matrícula</th>
                <th>Enero</th>
                <th>Febrero</th>
                <th>Marzo</th>
                <th>Abril</th>
                <th>Mayo</th>
                <th>Junio</th>
                <th>Julio</th>
                <th>Agosto</th>
                <th>Septiembre</th>
                <th>Octubre</th>
                <th>Noviembre</th>
                <th>Diciembre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($row['grado']); ?></td>
                    <td><?php echo htmlspecialchars($row['matricula']); ?></td>
                    <td><?php echo htmlspecialchars($row['enero']); ?></td>
                    <td><?php echo htmlspecialchars($row['febrero']); ?></td>
                    <td><?php echo htmlspecialchars($row['marzo']); ?></td>
                    <td><?php echo htmlspecialchars($row['abril']); ?></td>
                    <td><?php echo htmlspecialchars($row['mayo']); ?></td>
                    <td><?php echo htmlspecialchars($row['junio']); ?></td>
                    <td><?php echo htmlspecialchars($row['julio']); ?></td>
                    <td><?php echo htmlspecialchars($row['agosto']); ?></td>
                    <td><?php echo htmlspecialchars($row['septiembre']); ?></td>
                    <td><?php echo htmlspecialchars($row['octubre']); ?></td>
                    <td><?php echo htmlspecialchars($row['noviembre']); ?></td>
                    <td><?php echo htmlspecialchars($row['diciembre']); ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>">Editar</a>
                        <a href="solvencias.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('¿Estás seguro de que quieres eliminar este registro?')">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Botón para volver a la página principal -->
    <a href="dashboard.php">Volver a la Página Principal</a>
    </div>
</body>
</html>
