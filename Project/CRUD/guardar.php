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
}

// Cerrar la conexión
$conn->close();
?>

<?php

include("../conexion.php");

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
        telefono INT(15) NOT NULL,
        escuela VARCHAR(50) NOT NULL,
        entidad VARCHAR(30) NOT NULL,
        promedio VARCHAR(5) NOT NULL,
        opcion VARCHAR(20) NOT NULL,
        salon VARCHAR(15) NOT NULL,
        horario VARCHAR(20) NOT NULL
    )";
    

    if ($conectar->query($crearTabla) === TRUE) {
        
    } else {
        
    }
} else {
    
}

?>

<?php

include("../conexion.php");

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
        
    }
} else {
    
}

?>

<?php

include("../conexion.php");

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
        
    }
} else {
    
}

?>

<?php

include ("../conexion.php");

session_start();

$noBoleta = trim($_POST['noBoleta']);
$fechaNacimiento = trim($_POST['fechaNacimiento']);
$curp = trim($_POST['curp']);
$nombre = trim($_POST['nombre']);
$apellidoPaterno = trim($_POST['apellidoPaterno']);
$apellidoMaterno = trim($_POST['apellidoMaterno']);
$telefono = trim($_POST['telefono']);
$email = trim($_POST['email']);
$escuela = trim($_POST['escuela']);
$escuela2 = trim($_POST['escuela2']);
$entidad = trim($_POST['entidad']);
$promedio = trim($_POST['promedio']);
$tieneDiscapacidad = trim($_POST['opcion1']);
$discapacidad = trim($_POST['discapacidad']);
$discapacidad2 = trim($_POST['discapacidad2']);
$opcion = trim($_POST['opcion']);
$genero = trim($_POST['genero']);
$calle = trim($_POST['cyn']);
$colonia = trim($_POST['colonia']);
$alcaldia = trim($_POST['alcaldia']);
$codigo = trim($_POST['codigo']);

$escuelab = "";
$salon = ""; 
$horario = "";

if ($escuela == 'otro') {
    $escuelab .= $escuela2;
} else {
    $escuelab .= $escuela;
}
?>

<?php

$valor = "";
include("../conexion.php");

if($tieneDiscapacidad == 'on'){
  
    $valor = 0;
    $tabla = "salon_disc";
    $columna = "id";

    // Consulta para obtener la cantidad de elementos en la tabla
    $consulta = "SELECT COUNT(*) as cantidad FROM $tabla";
    $resultado = $conectar->query($consulta);

    if ($resultado) {
        $fila = $resultado->fetch_assoc();
        $cantidadElementos = $fila['cantidad'];

        // Establecer el valor de $salon según la cantidad de elementos
        if ($cantidadElementos >= 0 && $cantidadElementos <= 30) {
            $salon = 1001;
            $horario = "7:00am - 8:30am";
        } elseif ($cantidadElementos >= 31 && $cantidadElementos <= 60) {
            $salon = 1001;
            $horario = "8:30am - 10:15";
        } elseif ($cantidadElementos >= 61 && $cantidadElementos <= 90) {
            $salon = 1001;
            $horario = "10:30 - 12:00";
        } 
        
    } else {
        
    }
} else {
    $valor = 1;
    // Nombre de la tabla y columna que deseas verificar
    $tabla = "salon";
    $columna = "id";

    // Consulta para obtener la cantidad de elementos en la tabla
    $consulta = "SELECT COUNT(*) as cantidad FROM $tabla";
    $resultado = $conectar->query($consulta);

    if ($resultado) {
        $fila = $resultado->fetch_assoc();
        $cantidadElementos = $fila['cantidad'];

        // Establecer el valor de $salon según la cantidad de elementos
        if ($cantidadElementos >= 0 && $cantidadElementos <= 30) {
            $salon = 2001;
            $horario = "7:00am - 8:30am";
        } elseif ($cantidadElementos >= 31 && $cantidadElementos <= 60) {
            $salon = 2002;
            $horario = "7:00am - 8:30am";
        } elseif ($cantidadElementos >= 61 && $cantidadElementos <= 90) {
            $salon = 2003;
            $horario = "7:00am - 8:30am";
        } elseif ($cantidadElementos >= 91 && $cantidadElementos <= 120) {
            $salon = 2004;
            $horario = "7:00am - 8:30am";
        } elseif ($cantidadElementos >= 121 && $cantidadElementos <= 150) {
            $salon = 2005;
            $horario = "7:00am - 8:30am";
        } elseif ($cantidadElementos >= 151 && $cantidadElementos <= 180) {
            $salon = 2006;
            $horario = "7:00am - 8:30am";
        } elseif ($cantidadElementos >= 181 && $cantidadElementos <= 210) {
            $salon = 2001;
            $horario = "8:45am - 10:15am";
        } elseif ($cantidadElementos >= 211 && $cantidadElementos <= 240) {
            $salon = 2002;
            $horario = "8:45am - 10:15am";
        } elseif ($cantidadElementos >= 241 && $cantidadElementos <= 270) {
            $salon = 2003;
            $horario = "8:45am - 10:15am";
        } elseif ($cantidadElementos >= 271 && $cantidadElementos <= 300) {
            $salon = 2004;
            $horario = "8:45am - 10:15am";
        } elseif ($cantidadElementos >= 301 && $cantidadElementos <= 330) {
            $salon = 2005;
            $horario = "8:45am - 10:15am";
        } elseif ($cantidadElementos >= 331 && $cantidadElementos <= 360) {
            $salon = 2006;
            $horario = "8:45am - 10:15am";
        } elseif ($cantidadElementos >= 361 && $cantidadElementos <= 390) {
            $salon = 2001;
            $horario = "10:30am - 12:00am";
        } elseif ($cantidadElementos >= 391 && $cantidadElementos <= 420) {
            $salon = 2002;
            $horario = "10:30am - 12:00am";
        } elseif ($cantidadElementos >= 421 && $cantidadElementos <= 450) {
            $salon = 2003;
            $horario = "10:30am - 12:00am";
        } elseif ($cantidadElementos >= 451 && $cantidadElementos <= 480) {
            $salon = 2004;
            $horario = "10:30am - 12:00am";
        } elseif ($cantidadElementos >= 481 && $cantidadElementos <= 510) {
            $salon = 2005;
            $horario = "10:30am - 12:00am";
        } elseif ($cantidadElementos >= 511 && $cantidadElementos <= 540) {
            $salon = 2006;
            $horario = "10:30am - 12:00am";
        } else {

        }
    } else {

    }



}

?>

<?php
// Verificar si la boleta ya está registrada
$boletaExistente = mysqli_query($conectar, "SELECT * FROM alumno WHERE boleta='$noBoleta'");
if (mysqli_num_rows($boletaExistente) > 0) {
    
} else {
    // Verificar si el CURP ya está registrado
    $curpExistente = mysqli_query($conectar, "SELECT * FROM alumno WHERE curp='$curp'");
    if (mysqli_num_rows($curpExistente) > 0) {
        
    } else {
        // Insertar datos en la tabla 'alumno'
        $consulta = "INSERT INTO alumno(boleta, nombre, primerApe, segundoApe, correo, fechaNac, curp, genero, discapacidad, calle, colonia, alcaldia, postal, telefono, escuela, entidad, promedio, opcion, salon, horario) 
        VALUES ('$noBoleta','$nombre','$apellidoPaterno','$apellidoMaterno','$email','$fechaNacimiento','$curp','$genero', '$discapacidad', '$calle', '$colonia', '$alcaldia', '$codigo', '$telefono', '$escuelab', '$entidad', '$promedio', '$opcion' , '$salon', '$horario')";
        
        $resultado = mysqli_query($conectar, $consulta);

        if ($resultado) {
            
        } else {
            
        }

        if ($valor == 1) {
            $salones = "INSERT INTO salon(boleta) VALUES ('$noBoleta')";
            $actualizacion = mysqli_query($conectar, $salones);

            if ($actualizacion) {
                
            } else {
                
            }
        } elseif ($valor == 0) {
            $salones = "INSERT INTO salon_disc(boleta) VALUES ('$noBoleta')";
            $actualizacion = mysqli_query($conectar, $salones);

            if ($actualizacion) {
                
            } else {
                
            }
        }
    }
}

?>

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