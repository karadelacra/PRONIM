<?php
    session_start(); // Inicia la sesión en la página de destino
    $mensaje = isset($_SESSION['mensaje']) ? $_SESSION['mensaje'] : "";
    unset($_SESSION['mensaje']); // Limpia la variable de sesión para que el mensaje no se muestre de nuevo en recargas
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/estylecab.css">
    <title>Recuperación de Horario</title>
</head>
<body>
    
    <div class="container">
        <!--ENCABEZADO-->>
        <header id="header">
            <img src="images/escom.jpg" alt="" class="logo">
            <span class="brand-txt">Recuperación de Horario</span>
          <ul class="main-menu">
            <li class="menu-item"><a href="index.html">Inicio</a></li>
          </ul>
        </header>
        <!---FIN DEL ENCABEZADO-->
        <div class="row justify-content-center pt-5 mt-5 m-1">
            <div class="col-md-6 col-sm-8 col-xl-4 col-lg-5 formulario">
                <form action="fpdf186/EXAMEN.php" method="post" id="recuperacionForm" onsubmit="return validarFormulario">
                    <div class="form-group text-center pt-3">
                    </div>
                    <div class="form-group mx-sm-4 pt-3">
                        <p id="parrafo">Favor de ingresar su boleta</p>
                        <input type="text"  class="form-control" id="boleta" name="noBoleta" pattern="^(PE|PP)?\d{8}$|(?!.*\d{11})\d{10}$" placeholder="Ej. PE12345678" required>
                    </div>
                    
                    <div class="form-group mx-sm-4 pt-3">
                        <p id="parrafo">Favor de ingresar su curp</p>
                        <input type="text"  class="form-control" id="curp" name="curp" pattern="^[a-zA-Z]{4}\d{6}[a-zA-Z]{6}[\d\w]{2}$" placeholder="Ej. PE12345678" required>
                    </div>
                    
                    <div class="form-group mx-sm-4 pb-2">
                        <input type="submit" class="btn btn-block ingresar" name="" value="Recuperar Horario">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>


    <script>
        function validarFormulario() {
            var boleta = document.getElementById("boleta").value;

            // Validar la boleta según el patrón especificado
            var boletaPattern = /^(PE|PP)?[0-9]{8}$/;
            if (boleta.match(boletaPattern)) {
                alert("Recuperación exitosa. Número de boleta válido.");
                return true; // Envía el formulario
            } else {
                alert("Formato de boleta incorrecto. Inténtalo de nuevo.");
                return false; // Evita que el formulario se envíe
            }
        }
    </script>
    <script>
    // Muestra el mensaje en un alert si está presente
    <?php if (!empty($mensaje)) : ?>
        alert("<?php echo $mensaje; ?>");
    <?php endif; ?>

    // Otro código JavaScript u HTML que puedas tener en la página.

</script>


</body>
</html>
