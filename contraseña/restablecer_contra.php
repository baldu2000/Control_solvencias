<?php
require '../db.php'; // Incluir la conexión a la base de datos

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Validar el token aquí
    $sql = "SELECT * FROM usuarios WHERE token = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Mostrar formulario para restablecer contraseña
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Restablecer Contraseña</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    margin: 0;
                    padding: 20px;
                    text-align: center;
                }
                h1 {
                    color: #333;
                }
                form {
                    background: white;
                    padding: 20px;
                    border-radius: 5px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    display: inline-block;
                }
                label {
                    display: block;
                    margin: 10px 0 5px;
                    color: #555;
                }
                input[type="password"] {
                    width: 100%;
                    padding: 10px;
                    margin-bottom: 10px;
                    border: 1px solid #ccc;
                    border-radius: 4px;
                }
                button {
                    background-color: #007bff;
                    color: white;
                    padding: 10px 15px;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                }
                button:hover {
                    background-color: #0056b3;
                }
                .logo {
                    max-width: 150px;
                    margin-bottom: 20px;
                }
            </style>
        </head>
        <body>
            <img src="../imagen/logo_colegio.png" alt="Logo" class="logo">
            <h1>Restablecer Contraseña</h1>
            <form method="post" action="actualizar_contra.php">
                <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
                <label for="nueva_contra">Nueva Contraseña:</label>
                <input type="password" name="nueva_contra" required>
                <button type="submit">Cambiar Contraseña</button>
            </form>
        </body>
        </html>
        <?php
    } else {
        // Token no válido: Mostrar botón flotante centrado
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Token no válido</title>
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
                    overflow: hidden;
                }
                .floating-button {
                    background-color: #f44336;
                    color: white;
                    padding: 15px 30px;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                    font-size: 16px;
                    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
                    position: absolute;
                }
                .floating-button:hover {
                    background-color: #d32f2f;
                }
            </style>
        </head>
        <body>
            <button class="floating-button" onclick="window.location.href='../index.php'">
                Token no válido. Volver a Iniciar Sesión
            </button>
        </body>
        </html>
        <?php
    }
} else {
    // Token no válido: Mostrar botón flotante centrado
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Token no válido</title>
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
                overflow: hidden;
            }
            .floating-button {
                background-color: #f44336;
                color: white;
                padding: 15px 30px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
                box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
                position: absolute;
            }
            .floating-button:hover {
                background-color: #d32f2f;
            }
        </style>
    </head>
    <body>
        <button class="floating-button" onclick="window.location.href='../index.php'">
            Token no válido. Volver a Iniciar Sesión
        </button>
    </body>
    </html>
    <?php
}
?>
