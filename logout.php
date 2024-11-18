<?php
session_start();
// Incluir archivo de conexión
require 'db.php';
session_destroy(); // Destruir la sesión
header("Location: index.php"); // Redirigir a la página de inicio de sesión
exit();
?>