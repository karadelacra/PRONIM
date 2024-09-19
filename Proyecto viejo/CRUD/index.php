<?php
session_start();

// Resto del código de inicio de sesión y verificación de credenciales
$usuario_valido = "admin";
$contrasena_valida = "1234";

// Verificar los valores proporcionados por el script
if ($_POST['usuario'] == $usuario_valido && $_POST['contrasena'] == $contrasena_valida) {
    // Credenciales válidas, permitir el acceso al contenido de index.php
} else {
    // Credenciales inválidas, redirigir al formulario de inicio de sesión
    header("Location: ../admin.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Convertir | Exportar tabla HTML a archivos CSV y EXCEL</title>
    <link rel="stylesheet" type="text/css" href="adminstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/dce333249f.js" crossorigin="anonymous"></script>
</head>

<body>
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Escuela Superior de Cómputo</h1>
            <div class="input-group">
                <input type="search" placeholder="Buscar">
            </div>
        </section>

        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th style="text-align: center;"> Boleta <span class="icon-arrow"></span></th>
                        <th> Nombre <span class="icon-arrow"></span></th>
                        <th> Apellido P <span class="icon-arrow"></span></th>
                        <th> Apellido M <span class="icon-arrow"></span></th>
                        <th style="text-align: center;"> E-mail <span class="icon-arrow"></span></th>
                        <th> Promedio <span class="icon-arrow"></span></th>
                        <th></th>
                        <th><a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-user-plus"></i></a></th>
                        <th><button><a href="../admin.html"><i class="fa-solid fa-right-from-bracket"></i></a></button></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include '../conexion.php';

                        $sql = "SELECT * FROM alumno";
                        $result = mysqli_query($conectar, $sql);

                        while ($mostrar = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td style="text-align: center;"><?php echo $mostrar['boleta'] ?></td>
                            <td style="text-align: center;"><?php echo $mostrar['nombre'] ?></td>
                            <td style="text-align: center;"><?php echo $mostrar['primerApe'] ?></td>
                            <td style="text-align: center;"> <?php echo $mostrar['segundoApe'] ?></td>
                            <td style="text-align: center;"><?php echo $mostrar['correo'] ?></td>
                            <td style="text-align: center;"><?php echo $mostrar['promedio'] ?></td>
                            <td><a href="" data-bs-toggle="modal" data-bs-target="#EditModal<?php echo $mostrar['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td><a href="" data-bs-toggle="modal" data-bs-target='#DModal<?php echo $mostrar['id']; ?>'><i class="fa-solid fa-trash"></i></a></td>
                            <td><a href="" data-bs-toggle="modal" data-bs-target='#VModal<?php echo $mostrar['id']; ?>' ><i class="fa-solid fa-eye"></i></a></td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </section>
    </main>

    <?php require 'edit.php'; ?>
    <?php require 'prueba.php'; ?>
    <?php require 'delete.php'; ?>
    <?php require 'view.php'; ?>

    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>
