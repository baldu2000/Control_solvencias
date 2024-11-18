<!DOCTYPE html>
<html>
<head>
    <title>Agregar Expediente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        input[type="text"], input[type="date"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        a {
            display: block;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Agregar Nuevo Expediente</h1>
        <form action="procesar_agregar.php" method="post">
            <input type="text" name="nombre_completo" placeholder="Nombre Completo" required><br>
            <input type="date" name="fecha_nacimiento" required><br>
            <input type="text" name="edad" placeholder="Edad" required><br>
            <input type="text" name="grado" placeholder="Grado" required><br>
            <input type="text" name="direccion_residencia" placeholder="Dirección de Residencia"><br>
            <input type="text" name="nombre_padre" placeholder="Nombre del Padre"><br>
            <input type="text" name="nombre_madre" placeholder="Nombre de la Madre"><br>
            <input type="text" name="telefono_emergencia" placeholder="Teléfono de Emergencia"><br>
            <input type="submit" value="Agregar Expediente">
        </form>
        <a href="index.php">Regresar al Menú Principal</a>
    </div>
</body>
</html>
