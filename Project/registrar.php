<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario PHP</title>
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/revisarstyle.css">

</head>

<body>


<?php

include ("conexion.php");

$noBoleta = trim($_POST['noBoleta']);
$fechaNacimiento = trim($_POST['fechaNacimiento']);
$curp = trim($_POST['curp']);
$nombre = trim($_POST['nombre']);
$apellidoP = trim($_POST['apellidoP']);
$apellidoM = trim($_POST['apellidoM']);
$telefono = trim($_POST['telefono']);
$email = trim($_POST['email']);
$escuela = trim($_POST['escuela']);
$escuela2 = trim($_POST['escuela2']);
$entidad = trim($_POST['entidad']);
$promedio = trim($_POST['promedio']);
$tieneDiscapacidad = trim($_POST['tieneDiscapacidad']);
$discapacidad = trim($_POST['discapacidad']);
$discapacidad2 = trim($_POST['discapacidad2']);
$opcion = trim($_POST['opcion']);
$genero = trim($_POST['genero']);
$calle = trim($_POST['calle']);
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
include("conexion.php");

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
        echo "Error al obtener la cantidad de elementos: " . $conn->error;
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
            echo "hola";
        }

    } else {
        echo "Error al obtener la cantidad de elementos: " . $conn->error;
    }



}

?>

<?php
// Verificar si la boleta ya está registrada
$boletaExistente = mysqli_query($conectar, "SELECT * FROM alumno WHERE boleta='$noBoleta'");
if (mysqli_num_rows($boletaExistente) > 0) {
    echo "<h1>Proceso de registro completado, si desea volver a obtener su horario por favor dirijase al menú principal en el apartado de recuperación</h1>";
    $continuar = "0";
} else {
    // Verificar si el CURP ya está registrado
    $curpExistente = mysqli_query($conectar, "SELECT * FROM alumno WHERE curp='$curp'");
    if (mysqli_num_rows($curpExistente) > 0) {
        echo "Este CURP ya está registrado";
    } else {
        // Insertar datos en la tabla 'alumno'
        $consulta = "INSERT INTO alumno(boleta, nombre, primerApe, segundoApe, correo, fechaNac, curp, genero, discapacidad, calle, colonia, alcaldia, postal, telefono, escuela, entidad, promedio, opcion, salon, horario) 
        VALUES ('$noBoleta','$nombre','$apellidoP','$apellidoM','$email','$fechaNacimiento','$curp','$genero', '$discapacidad', '$calle', '$colonia', '$alcaldia', '$codigo', '$telefono', '$escuelab', '$entidad', '$promedio', '$opcion' , '$salon', '$horario')";
        
        $resultado = mysqli_query($conectar, $consulta);

        if ($resultado) {
        
        } else {
            echo "Ocurrió un error";
        }

        if ($valor == 1) {
            $salones = "INSERT INTO salon(boleta) VALUES ('$noBoleta')";
            $actualizacion = mysqli_query($conectar, $salones);

            if ($actualizacion) {
                
            } else {
                echo "Ocurrió un error al actualizar los salones";
            }
        } elseif ($valor == 0) {
            $salones = "INSERT INTO salon_disc(boleta) VALUES ('$noBoleta')";
            $actualizacion = mysqli_query($conectar, $salones);

            if ($actualizacion) {
            } else {
                echo "Ocurrió un error al actualizar los salones de discapacitados";
            }
        }
    ?>
        <h1>Registro completado exitosamente </h1>
    <form action="fpdf186/EXAMEN.php" method="post">
    <!-- Tus campos actuales -->

    <div class="button-container">
        <input type="submit" name="generar_PDF" value="Generar PDF" >
    </div>
    <div class="NoMostrar">
    <input type="hidden" name="noBoleta" value="<?php echo isset($noBoleta) ? $noBoleta : ''; ?>"><br>
    <input type="hidden" name="curp" value="<?php echo isset($curp) ? $curp : ''; ?>"><br>
    </div>
    
    <?php
    
    }
}

?>
</form>

<div class="button-container">;
<input type="button" onclick="window.location.href='index.html';"  value="Regresar al inicio" />
</div>;


<script>
    function goBack() {
        history.go(-3);
    }
</script>
</body>
</html>

