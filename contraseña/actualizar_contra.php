<?php 
require '../db.php'; // Incluir la conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = $_POST['token'];
    $nueva_contra = $_POST['nueva_contra'];

    // Preparar la consulta para actualizar la contraseña y limpiar el token
    $sql = "UPDATE usuarios SET contraseña = ?, token = NULL WHERE token = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        // Si la preparación falla, muestra el error
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    // Asignar los parámetros
    $stmt->bind_param("ss", $nueva_contra, $token);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            mostrarBotonExitoso();
        } else {
            echo 'No se encontró un usuario con ese token.';
        }
    } else {
        echo "Error al actualizar la contraseña: " . $stmt->error;
    }

    // Cerrar la declaración
    $stmt->close();
} else {
    echo 'Método no permitido.';
}

// Función para mostrar el botón flotante y centrado
function mostrarBotonExitoso() {
    echo '
    <div style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
        <a href="../index.php">
            <button style="padding: 15px 30px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;">
                Contraseña actualizada exitosamente. Volver a Iniciar Sesión
            </button>
        </a>
    </div>
    ';
}
?>
