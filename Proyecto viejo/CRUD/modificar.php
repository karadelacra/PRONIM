<?php
    session_start();
    
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include '../conexion.php';


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_GET['id']; // Obtener el ID del parámetro GET
        
        // Recuperar todos los campos del formulario
        $noBoleta = trim($_POST['noBoleta']);
        $fechaNacimiento = trim($_POST['fechaNacimiento']);
        $curp = trim($_POST['curp']);
        $nombre = trim($_POST['nombre']);
        $apellidoPaterno = trim($_POST['apellidoPaterno']);
        $apellidoMaterno = trim($_POST['apellidoMaterno']);
        $telefono = trim($_POST['telefono']);
        $correo = trim($_POST['email']);
        $escuela = trim($_POST['escuela']);
        $escuela2 = isset($_POST['escuela2']) ? trim($_POST['escuela2']) : '';
        $entidad = trim($_POST['entidad']);
        $promedio = trim($_POST['promedio']);
        $tieneDiscapacidad = trim($_POST['opcion1_' . $id]);
        
        // Verificar si la opción de discapacidad está marcada
        if ($tieneDiscapacidad === 'Primera opcion') {
            // Recuperar y actualizar la información de la discapacidad
            $discapacidad = trim($_POST['discapacidad_' . $id]);
            $discapacidad2 = isset($_POST['discapacidad2_' . $id]) ? trim($_POST['discapacidad2_' . $id]) : '';
        } else {
            // Si la opción de discapacidad no está marcada, establecer valores vacíos
            $discapacidad = '';
            $discapacidad2 = '';
        }

        // Verificar si la opción de discapacidad es "Otra" y actualizar la columna
        if ($tieneDiscapacidad === 'Primera opcion' && $discapacidad === 'Otra' && !empty($discapacidad2)) {
            $discapacidad = $discapacidad2;
            $discapacidad2 = ''; // Limpiar discapacidad2 si se ha movido a discapacidad
        }

        $opcion = trim($_POST['opcion']);
        $genero = trim($_POST['genero']);
        $calle = trim($_POST['cyn']);
        $colonia = trim($_POST['colonia']);
        $alcaldia = trim($_POST['alcaldia']);
        $codigo = trim($_POST['codigo']);

        // Actualizar la información en la base de datos
        $sql = "UPDATE alumno SET 
            boleta='$noBoleta', 
            curp='$curp', 
            nombre='$nombre', 
            primerApe='$apellidoPaterno', 
            segundoApe='$apellidoMaterno', 
            fechaNac='$fechaNacimiento', 
            genero='$genero', 
            discapacidad='$discapacidad',
            calle='$calle', 
            colonia='$colonia', 
            alcaldia='$alcaldia', 
            postal='$codigo', 
            telefono='$telefono', 
            correo='$correo', 
            escuela='$escuela', 
            entidad='$entidad', 
            promedio='$promedio', 
            opcion='$opcion' 
            WHERE id=$id";

        if(mysqli_query($conectar, $sql)){
            
        } else{
        }
    }
?>


<!-- Ahora, crea un formulario HTML oculto con los valores de inicio de sesión y envíalo automáticamente con JavaScript -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Oculto</title>
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
        document.getElementById('hiddenForm').submit();
    </script>

</body>
</html>