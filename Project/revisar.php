<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario PHP</title>
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/revisarstyle.css">

</head>
    <h1>Verifica tus datos </h1>
<body>

<?php

$servername = "localhost";
$username = "root";
$password = "";

// Crear conexión
$conn = new mysqli($servername, $username, $password);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Nombre de la base de datos que deseas verificar y crear si no existe
$database = "examen_2024";

// Consulta para verificar si la base de datos existe
$consulta = "CREATE DATABASE IF NOT EXISTS $database";

if ($conn->query($consulta) === TRUE) {
    
} else {
    echo "Error al crear la base de datos: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>

<?php

include("conexion.php");

// Nombre de la tabla que deseas verificar y crear si no existe
$tabla = "alumno";

// Consulta para verificar si la tabla existe
$consulta = "SHOW TABLES LIKE '$tabla'";
$resultado = $conectar->query($consulta);

// Si la tabla no existe, la creamos
if ($resultado->num_rows == 0) {
    $crearTabla = "CREATE TABLE $tabla (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        boleta VARCHAR(30) NOT NULL UNIQUE,
        nombre VARCHAR(30) NOT NULL,
        primerApe VARCHAR(30) NOT NULL,
        segundoApe VARCHAR(30) NOT NULL,
        correo VARCHAR(30) NOT NULL,
        fechaNac DATE DEFAULT NULL,
        curp VARCHAR(30) NOT NULL UNIQUE,
        genero VARCHAR(20) NOT NULL,
        discapacidad VARCHAR(50) NULL,
        calle VARCHAR(40) NOT NULL,
        colonia VARCHAR(40) NOT NULL,
        alcaldia VARCHAR(30) NOT NULL,
        postal VARCHAR(10) NOT NULL,
        telefono VARCHAR(15) NOT NULL,
        escuela VARCHAR(50) NOT NULL,
        entidad VARCHAR(30) NOT NULL,
        promedio VARCHAR(5) NOT NULL,
        opcion VARCHAR(20) NOT NULL,
        salon VARCHAR(15) NOT NULL,
        horario VARCHAR(20) NOT NULL
    )";
    

    if ($conectar->query($crearTabla) === TRUE) {
        
    } else {
        echo "Error al crear la tabla: " . $conn->error;
    }
} else {
    
}

?>

<?php

include("conexion.php");

// Nombre de la tabla que deseas verificar y crear si no existe
$tabla = "salon";

// Consulta para verificar si la tabla existe
$consulta = "SHOW TABLES LIKE '$tabla'";
$resultado = $conectar->query($consulta);

// Si la tabla no existe, la creamos
if ($resultado->num_rows == 0) {
    $crearTabla = "CREATE TABLE $tabla (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        boleta VARCHAR(20) NOT NULL
    )";

    if ($conectar->query($crearTabla) === TRUE) {
        
    } else {
        echo "Error al crear la tabla: " . $conn->error;
    }
} else {
    
}

?>

<?php

include("conexion.php");

// Nombre de la tabla que deseas verificar y crear si no existe
$tabla = "salon_disc";

// Consulta para verificar si la tabla existe
$consulta = "SHOW TABLES LIKE '$tabla'";
$resultado = $conectar->query($consulta);

// Si la tabla no existe, la creamos
if ($resultado->num_rows == 0) {
    $crearTabla = "CREATE TABLE $tabla (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        boleta VARCHAR(20) NOT NULL
    )";

    if ($conectar->query($crearTabla) === TRUE) {
        
    } else {
        echo "Error al crear la tabla: " . $conn->error;
    }
} else {
    
}

?>








<?php
if ($_POST) {
    $boleta = isset($_POST["noBoleta"]) ? $_POST["noBoleta"] : '';
    $fecha = isset($_POST["fechaNacimiento"]) ? $_POST["fechaNacimiento"] : '';
    $curp = isset($_POST["curp"]) ? $_POST["curp"] : '';
    $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : '';
    $apellidoP = isset($_POST["apellidoPaterno"]) ? $_POST["apellidoPaterno"] : '';
    $apellidoM = isset($_POST["apellidoMaterno"]) ? $_POST["apellidoMaterno"] : '';
    $telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : '';
    $email = isset($_POST["email"]) ? $_POST["email"] : '';
    $escuela = isset($_POST["escuela"]) ? $_POST["escuela"] : '';
    $escuela2 = isset($_POST["escuela2"]) ? $_POST["escuela2"] : '';
    $entidad = isset($_POST["entidad"]) ? $_POST["entidad"] : '';
    $opcion = isset($_POST["opcion"]) ? $_POST["opcion"] : '';
    $genero = isset($_POST["genero"]) ? $_POST["genero"] : '';
    $calle = isset($_POST["cyn"]) ? $_POST["cyn"] : '';
    $colonia = isset($_POST["colonia"]) ? $_POST["colonia"] : '';
    $alcaldia = isset($_POST["alcaldia"]) ? $_POST["alcaldia"] : '';
    $codigo = isset($_POST["codigo"]) ? $_POST["codigo"] : '';
    $promedio = isset($_POST["promedio"]) ? $_POST["promedio"] : '';
    $tieneDiscapacidad = isset($_POST["tieneDiscapacidad"]) ? $_POST["tieneDiscapacidad"] : '';
    $discapacidad = isset($_POST["discapacidad"]) ? $_POST["discapacidad"] : '';
    $discapacidad2 = isset($_POST["discapacidad2"]) ? $_POST["discapacidad2"] : '';

    $discapacidad .= $discapacidad2;

    echo '<div class="info-container" id="nombreCompleto">Tu nombre completo es ' . $nombre . ' ' . $apellidoP . ' ' . $apellidoM . '</div>';
    echo '<div class="info-container" id="boleta">Tu numero de boleta es ' . $boleta . '</div>';
    echo '<div class="info-container" id="fecha">Tu fecha de nacimiento es ' . $fecha . '</div>';
    echo '<div class="info-container" id="curp">Tu curp es ' . $curp . '</div>';
    echo '<div class="info-container" id="genero">Tu genero es ' . $genero . '</div>';
    if ($tieneDiscapacidad == 'on') {
        echo '<div class="info-container" id="discapacidad">Cuentas con la siguiente discapacidad ' . $discapacidad . '</div>';
    }
    echo '<div class="info-container" id="calle">Tu calle es ' . $calle . '</div>';
    echo '<div class="info-container" id="colonia">Tu colonia es ' . $colonia . '</div>';
    echo '<div class="info-container" id="alcaldia">Tu alcaldia es ' . $alcaldia . '</div>';
    echo '<div class="info-container" id="codigo">Tu codigo postal es ' . $codigo . '</div>';

    echo '<div class="info-container" id="telefono">Tu telefono es ' . $telefono . '</div>';
    echo '<div class="info-container" id="email">Tu email es ' . $email . '</div>';

    if ($escuela == 'otro'){
        echo '<div class="info-container" id="escuela">Tu escuela de procedencia es ' . $escuela2 . '</div>';
    } else {
        echo '<div class="info-container" id="escuela">Tu escuela de procedencia es ' . $escuela . '</div>';
    }
    
    echo '<div class="info-container" id="entidad">La entidad donde vives es ' . $entidad . '</div>';
    echo '<div class="info-container" id="promedio">Tu promedio es ' . $promedio . '</div>';
    echo '<div class="info-container" id="opcion">Escom fue tu: ' . $opcion . '</div>';

    
}

echo '<div class="button-container">';
echo '<input type="button" onclick="history.back();" value="Regresar" />';
echo '</div>';

?>


<?php
include ('conexion.php');

$boletaExistente = mysqli_query($conectar, "SELECT * FROM alumno WHERE boleta='$boleta'");
if (mysqli_num_rows($boletaExistente) > 0) {
    echo "<script>alert('Esta boleta ya está registrada'); window.history.back();</script>";
} else {
    // Verificar si el CURP ya está registrado
    $curpExistente = mysqli_query($conectar, "SELECT * FROM alumno WHERE curp='$curp'");
    if (mysqli_num_rows($curpExistente) > 0) {
        echo "<script>alert('Este CURP ya está registrado'); window.history.back();</script>";
    } else {
?>

<form action="registrar.php" method="post">
    <!-- Tus campos actuales -->

    <div class="button-container">
        <input type="submit" name="register" value="Registrar">
    </div>
    <div class="NoMostrar">
    <input type="hidden" name="noBoleta" value="<?php echo isset($boleta) ? $boleta : ''; ?>"><br>
    <input type="hidden" name="fechaNacimiento" value="<?php echo isset($fecha) ? $fecha : ''; ?>"><br>
    <input type="hidden" name="curp" value="<?php echo isset($curp) ? $curp : ''; ?>"><br>
    <input type="hidden" name="nombre" value="<?php echo isset($nombre) ? $nombre : ''; ?>"><br>
    <input type="hidden" name="apellidoP" value="<?php echo isset($apellidoP) ? $apellidoP : ''; ?>"><br>
    <input type="hidden" name="apellidoM" value="<?php echo isset($apellidoM) ? $apellidoM : ''; ?>"><br>
    <input type="hidden" name="telefono" value="<?php echo isset($telefono) ? $telefono : ''; ?>"><br>
    <input type="hidden" name="email" value="<?php echo isset($email) ? $email : ''; ?>"><br>
    <input type="hidden" name="escuela" value="<?php echo isset($escuela) ? $escuela : ''; ?>"><br>
    <input type="hidden" name="escuela2" value="<?php echo isset($escuela2) ? $escuela2 : ''; ?>"><br>
    <input type="hidden" name="entidad" value="<?php echo isset($entidad) ? $entidad : ''; ?>"><br>
    <input type="hidden" name="promedio" value="<?php echo isset($promedio) ? $promedio : ''; ?>"><br>
    <input type="hidden" name="tieneDiscapacidad" value="<?php echo isset($tieneDiscapacidad) ? $tieneDiscapacidad : ''; ?>"><br>
    <input type="hidden" name="discapacidad" value="<?php echo isset($discapacidad) ? $discapacidad : ''; ?>"><br>
    <input type="hidden" name="discapacidad2" value="<?php echo isset($discapacidad2) ? $discapacidad2 : ''; ?>"><br>
    <input type="hidden" name="opcion" value="<?php echo isset($opcion) ? $opcion : ''; ?>"><br>
    <input type="hidden" name="genero" value="<?php echo isset($genero) ? $genero : ''; ?>"><br>
    <input type="hidden" name="calle" value="<?php echo isset($calle) ? $calle : ''; ?>"><br>
    <input type="hidden" name="colonia" value="<?php echo isset($colonia) ? $colonia : ''; ?>"><br>
    <input type="hidden" name="alcaldia" value="<?php echo isset($alcaldia) ? $alcaldia : ''; ?>"><br>
    <input type="hidden" name="codigo" value="<?php echo isset($codigo) ? $codigo : ''; ?>"><br>
    </div>
</form>

<?php
    }
}
?>

</body>
</html>
