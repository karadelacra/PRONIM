<?php
include ("conexion.php");

$noBoleta = trim($_POST['noBoleta']);
$fechaNacimiento = "";
$curp = trim($_POST['curp']);
$nombre = "";
$apellidoP = "";
$apellidoM ="";
$telefono = "";
$email = "";
$escuelab = "";
$entidad = "";
$promedio = "";
$discapacidad = "";
$opcion = "";
$genero = "";
$calle = "";
$colonia = "";
$alcaldia = "";
$codigo = "";
$horario = "";
$salon = "";
$ficha = "";
?>



<?php

$sql = "SELECT id FROM alumno WHERE boleta = '$noBoleta' AND curp = '$curp'";
$compro = $conectar->query($sql);
// Verificar si hay resultados
if ($compro->num_rows > 0) {



include ("conexion.php");
// Consulta SQL para obtener el valor deseado (reemplaza 'tu_tabla' y 'tu_columna' con los nombres correctos)
$sql = "SELECT id FROM alumno WHERE boleta = '$noBoleta' AND curp = '$curp'";
$result = $conectar->query($sql);
$row = $result->fetch_assoc();
$ficha = $row['id'];



include ("conexion.php");
// Consulta SQL para obtener el valor deseado (reemplaza 'tu_tabla' y 'tu_columna' con los nombres correctos)
$sql = "SELECT nombre FROM alumno WHERE boleta = '$noBoleta' AND curp = '$curp'";
$result = $conectar->query($sql);
$row = $result->fetch_assoc();
$nombre = $row['nombre'];




include ("conexion.php");
// Consulta SQL para obtener el valor deseado (reemplaza 'tu_tabla' y 'tu_columna' con los nombres correctos)
$sql = "SELECT primerApe FROM alumno WHERE boleta = '$noBoleta' AND curp = '$curp'";
$result = $conectar->query($sql);
$row = $result->fetch_assoc();
$apellidoP = $row['primerApe'];



include ("conexion.php");
// Consulta SQL para obtener el valor deseado (reemplaza 'tu_tabla' y 'tu_columna' con los nombres correctos)
$sql = "SELECT segundoApe FROM alumno WHERE boleta = '$noBoleta' AND curp = '$curp'";
$result = $conectar->query($sql);
$row = $result->fetch_assoc();
$apellidoM = $row['segundoApe'];



include ("conexion.php");
// Consulta SQL para obtener el valor deseado (reemplaza 'tu_tabla' y 'tu_columna' con los nombres correctos)
$sql = "SELECT correo FROM alumno WHERE boleta = '$noBoleta' AND curp = '$curp'";
$result = $conectar->query($sql);
$row = $result->fetch_assoc();
$email = $row['correo'];


include ("conexion.php");
// Consulta SQL para obtener el valor deseado (reemplaza 'tu_tabla' y 'tu_columna' con los nombres correctos)
$sql = "SELECT fechaNac FROM alumno WHERE boleta = '$noBoleta' AND curp = '$curp'";
$result = $conectar->query($sql);
$row = $result->fetch_assoc();
$fechaNacimiento = $row['fechaNac'];



include ("conexion.php");
// Consulta SQL para obtener el valor deseado (reemplaza 'tu_tabla' y 'tu_columna' con los nombres correctos)
$sql = "SELECT curp FROM alumno WHERE boleta = '$noBoleta' AND curp = '$curp'";
$result = $conectar->query($sql);
$row = $result->fetch_assoc();
$curp = $row['curp'];



include ("conexion.php");
// Consulta SQL para obtener el valor deseado (reemplaza 'tu_tabla' y 'tu_columna' con los nombres correctos)
$sql = "SELECT genero FROM alumno WHERE boleta = '$noBoleta' AND curp = '$curp'";
$result = $conectar->query($sql);
$row = $result->fetch_assoc();
$genero = $row['genero'];


include ("conexion.php");
// Consulta SQL para obtener el valor deseado (reemplaza 'tu_tabla' y 'tu_columna' con los nombres correctos)
$sql = "SELECT discapacidad FROM alumno WHERE boleta = '$noBoleta' AND curp = '$curp'";
$result = $conectar->query($sql);
$row = $result->fetch_assoc();

if($row['discapacidad'] == '-'){
    $discapacidad = "No tienes discapacidad";
}else{
$discapacidad = $row['discapacidad'];
}


include ("conexion.php");
// Consulta SQL para obtener el valor deseado (reemplaza 'tu_tabla' y 'tu_columna' con los nombres correctos)
$sql = "SELECT calle FROM alumno WHERE boleta = '$noBoleta' AND curp = '$curp'";
$result = $conectar->query($sql);
$row = $result->fetch_assoc();
$calle = $row['calle'];


include ("conexion.php");
// Consulta SQL para obtener el valor deseado (reemplaza 'tu_tabla' y 'tu_columna' con los nombres correctos)
$sql = "SELECT colonia FROM alumno WHERE boleta = '$noBoleta' AND curp = '$curp'";
$result = $conectar->query($sql);
$row = $result->fetch_assoc();
$colonia = $row['colonia'];


include ("conexion.php");
// Consulta SQL para obtener el valor deseado (reemplaza 'tu_tabla' y 'tu_columna' con los nombres correctos)
$sql = "SELECT alcaldia FROM alumno WHERE boleta = '$noBoleta' AND curp = '$curp'";
$result = $conectar->query($sql);
$row = $result->fetch_assoc();
$alcaldia = $row['alcaldia'];


include ("conexion.php");
// Consulta SQL para obtener el valor deseado (reemplaza 'tu_tabla' y 'tu_columna' con los nombres correctos)
$sql = "SELECT postal FROM alumno WHERE boleta = '$noBoleta' AND curp = '$curp'";
$result = $conectar->query($sql);
$row = $result->fetch_assoc();
$codigo = $row['postal'];



include ("conexion.php");
// Consulta SQL para obtener el valor deseado (reemplaza 'tu_tabla' y 'tu_columna' con los nombres correctos)
$sql = "SELECT telefono FROM alumno WHERE boleta = '$noBoleta' AND curp = '$curp'";
$result = $conectar->query($sql);
$row = $result->fetch_assoc();
$telefono = $row['telefono'];



include ("conexion.php");
// Consulta SQL para obtener el valor deseado (reemplaza 'tu_tabla' y 'tu_columna' con los nombres correctos)
$sql = "SELECT escuela FROM alumno WHERE boleta = '$noBoleta' AND curp = '$curp'";
$result = $conectar->query($sql);
$row = $result->fetch_assoc();
$escuelab = $row['escuela'];


include ("conexion.php");
// Consulta SQL para obtener el valor deseado (reemplaza 'tu_tabla' y 'tu_columna' con los nombres correctos)
$sql = "SELECT entidad FROM alumno WHERE boleta = '$noBoleta' AND curp = '$curp'";
$result = $conectar->query($sql);
$row = $result->fetch_assoc();
$entidad = $row['entidad'];


include ("conexion.php");
// Consulta SQL para obtener el valor deseado (reemplaza 'tu_tabla' y 'tu_columna' con los nombres correctos)
$sql = "SELECT promedio FROM alumno WHERE boleta = '$noBoleta' AND curp = '$curp'";
$result = $conectar->query($sql);
$row = $result->fetch_assoc();
$promedio = $row['promedio'];


include ("conexion.php");
// Consulta SQL para obtener el valor deseado (reemplaza 'tu_tabla' y 'tu_columna' con los nombres correctos)
$sql = "SELECT opcion FROM alumno WHERE boleta = '$noBoleta' AND curp = '$curp'";
$result = $conectar->query($sql);
$row = $result->fetch_assoc();
$opcion = $row['opcion'];



include ("conexion.php");
// Consulta SQL para obtener el valor deseado (reemplaza 'tu_tabla' y 'tu_columna' con los nombres correctos)
$sql = "SELECT salon FROM alumno WHERE boleta = '$noBoleta' AND curp = '$curp'";
$result = $conectar->query($sql);
$row = $result->fetch_assoc();
$salon = $row['salon'];

include ("conexion.php");
// Consulta SQL para obtener el valor deseado (reemplaza 'tu_tabla' y 'tu_columna' con los nombres correctos)
$sql = "SELECT horario FROM alumno WHERE boleta = '$noBoleta' AND curp = '$curp'";
$result = $conectar->query($sql);
$row = $result->fetch_assoc();
$horario = $row['horario'];

} else {
    // Mostrar mensaje si curp y boleta no coinciden
    echo "Curp y boleta no coinciden";
    
    session_start(); // Inicia la sesión
    $_SESSION['mensaje'] = "Boleta y CURP erroneos";
    header("Location: ../recuperacion.php");
    exit();

}

?>

