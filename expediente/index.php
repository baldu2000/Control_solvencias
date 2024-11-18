<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Expedientes por Grado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            padding: 20px;
            text-align: center;
        }
        h1 {
            text-align: center;
        }
        .grados {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }
        .grados a {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            color: #333;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }
        .grados a:hover {
            background-color: #007bff;
            color: #fff;
        }
        .grados a:active {
            background-color: #0056b3;
        }
        .menu {
            text-align: center;
            margin-top: 20px;
        }
        .menu a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
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
    <img src="../imagen/logo_colegio.png" alt="Logo" class="logo">
    <h1>Expedientes por Grado</h1>
    
    <div class="grados">
        <a href="parvularia.php">Parvularia</a>
        <a href="preparatoria.php">Preparatoria</a>
        <a href="primero.php">Primer Grado</a>
        <a href="segundo.php">Segundo Grado</a>
        <a href="tercero.php">Tercer Grado</a>
        <a href="cuarto.php">Cuarto Grado</a>
        <a href="quinto.php">Quinto Grado</a>
        <a href="sexto.php">Sexto Grado</a>
        <a href="septimo.php">Septimo Grado</a>
        <a href="octavo.php">Octavo Grado</a>
        <a href="noveno.php">Noveno Grado</a>
    </div>
    </div>

    <div class="menu">
        <a href="/control_solvencias/dashboard.php">Volver a inicio</a>
    </div>

    <?php
    // Conectar a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "solvencias";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error al conectar con la base de datos: " . $conn->connect_error);
    }


    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
</body>
</html>