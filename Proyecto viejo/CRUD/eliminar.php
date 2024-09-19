<?php
// eliminar.php

require('../conexion.php');

// Iniciar sesión
session_start();

// Resto del código de inicio de sesión y verificación de credenciales
$usuario_valido = "admin";
$contrasena_valida = "1234";

// Verificar si ya hay una sesión iniciada
if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == $usuario_valido) {
    // El usuario ya está autenticado, proceder con la eliminación
    if (isset($_POST['accion']) && $_POST['accion'] === 'eliminar') {
        $id = $conectar->real_escape_string($_POST['id']);

        // Consulta para eliminar el registro
        $sql = "DELETE FROM alumno WHERE id = $id";
        $result = mysqli_query($conectar, $sql);

        // Manejo de errores o éxito
        if ($result) {
            // Acciones adicionales después de eliminar el registro (si es necesario)
        } else {
            echo "Error al eliminar el registro: " . mysqli_error($conectar);
        }
    }

    // Cerrar la conexión antes de la redirección
    mysqli_close($conectar);

    // Redirigir a index.php usando JavaScript
    echo '<html>
            <head>
                <title>Redireccionando...</title>
            </head>
            <body>
                <form id="hiddenForm" action="index.php" method="post">
                    <!-- Agrega los campos ocultos para el inicio de sesión -->
                    <input type="hidden" name="usuario" value="admin">
                    <input type="hidden" name="contrasena" value="1234">
                    <!-- Agrega un botón submit oculto para enviar automáticamente el formulario -->
                    <input type="submit" style="display:none;">
                </form>
                <script>
                    // Envía automáticamente el formulario al cargar la página
                    document.getElementById("hiddenForm").submit();
                </script>
            </body>
        </html>';
    exit();
} else {
    // Si no hay una sesión iniciada, redirigir al formulario de inicio de sesión
    header("Location: ../admin.html");
    exit();
}
?>

