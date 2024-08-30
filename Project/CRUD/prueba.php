<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Modal con Checkboxes - Ejemplo</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Registro</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <form action="guardar.php" class="diseño" id="registroForm" method="post">
                          <h3 class="d-flex justify-content-center">Identidad</h3>
                    <div class="form-group">
                      <label for="noBoleta" class="form-label">No. de Boleta:</label>
                      <input type="text" id="noBoleta" class="form-control border border-primary" name="noBoleta" required placeholder="Ej.PP22014658">
                    </div>
                    <div class="form-group">
                      <label for="curp" class="form-label">CURP:</label>
                      <input type="text" id="curp" class="form-control border border-primary" name="curp" required placeholder="Ej.IRSD040997HDFRNSA9">
                    </div>
                    <div class="form-group">
                      <label for="nombre" class="form-label">Nombre:</label>
                      <input type="text" id="nombre" class="form-control border border-primary" name="nombre" required placeholder="Nombre o Nombres">
                    </div>
                    <div class="form-group">
                      <label for="apellidoPaterno" class="form-label">Apellido Paterno:</label>
                      <input type="text" id="apellidoPaterno" name="apellidoPaterno" required class="form-control border border-primary">
                    </div>
                    <div class="form-group">
                      <label for="apellidoMaterno" class="form-label">Apellido Materno:</label>
                      <input type="text" id="apellidoMaterno" required name="apellidoMaterno" class="form-control border border-primary" required>
                    </div>
                    <div class="form-group">
                      <label for="fechaNacimiento" class="form-label">Fecha de nacimiento:</label>
                      <input type="date" id="fechaNacimiento" required class="form-control border border-primary" name="fechaNacimiento" required>
                    </div><br>
                    <div class="form-group justify-content-center">
                      <label for="genero" class="form-check-label">Género</label> <br><br>
                      <input type="radio" required name="genero" id="generoFemenino" class="form-check-input" value="Femenino"> Femenino &nbsp;&nbsp;&nbsp;
                      <input type="radio" name="genero" id="generoMasculino" class="form-check-input" value="Masculino"> Masculino &nbsp;&nbsp;&nbsp;
                      <input type="radio" name="genero" id="generoOtro" class="form-check-input" value="Otro"> Otro <br>
                    </div>

                    <br>
                    <div class="form-group">
                      <label for="opcion1" class="form-check-label">¿Tiene alguna discapacidad?:</label><br>
                      <input type="radio" required name="opcion1" id="opcion1" class="form-check-input" value="Primera opcion"> Si&nbsp;&nbsp;&nbsp;
                      <input type="radio" name="opcion1" id="opcion2" class="form-check-input" value="Segunda opcion"> No&nbsp;&nbsp;&nbsp;
                    </div>
                    </br>

                    <div id="tipoDiscapacidadContainer" style="display: none;">
                      <label for="tipoDiscapacidad" class="form-label">Tipo de discapacidad:</label>
                      <select id="tipoDiscapacidad" class="form-select form-select-sm" name="discapacidad" aria-label=".form-select-sm example">
                        <option value="">De clic para desplegar opciones</option>
                        <option value="Discapacidad auditiva">Con discapacidad auditiva</option>
                        <option value="Discapacidad motriz con silla de ruedas">Con discapacidad motriz (usuaria de silla de ruedas)</option>
                        <option value="Con discapacidad motriz con muletas">Con discapacidad motriz usuaria de muletas</option>
                        <option value="Con discapacidad motriz con bastón">Con discapacidad motriz usuaria de bastón</option>
                        <option value="Discapacidad visual">Con discapacidad visual</option>
                        <option value="">Otra</option>
                      </select>

                      <div id="otraDiscapacidadContainer" style="display: none;">
                        <br>
                        <label for="otraDiscapacidad" class="form-label">Especificar otra discapacidad:</label>
                        <input type="text" id="otraDiscapacidad" name="discapacidad2">
                      </div>
                    </div>

                    <br>

                                        <!-- Otros campos de identidad -->
                    <h3 class="d-flex justify-content-center">Contacto</h3>
                    <div class="form-group">
                        <label for="cyn" class="form-label">Calle y número:</label>
                        <input type="text" id="cyn" class="form-control border border-danger" name="cyn" placeholder="Nombre de calle y número exterior" required>
                    </div>
                    <div class="form-group">
                        <label for="colonia" class="form-label">Colonia:</label>
                        <input type="text" id="colonia" class="form-control border border-danger" name="colonia" placeholder="Nombre completo" required>
                    </div>
                    <div class="form-group">
                        <label for="alcaldia" class="form-label">Alcaldía:</label>
                        <select name="alcaldia" id="alcaldia" class="form-select form-select-sm border border-danger" required>
                            <option value="">Seleccione una opción</option>
                            <option value="Álvaro Obregón">Álvaro Obregón</option>
                            <option value="Azcapotzalco">Azcapotzalco</option>
                            <option value="Benito Juárez">Benito Juárez</option>
                            <option value="Coyoacán">Coyoacán</option>
                            <option value="Cuajimalpa de Morelos">Cuajimalpa de Morelos</option>
                            <option value="Cuauhtémoc">Cuauhtémoc</option>
                            <option value="Gustavo A. Madero">Gustavo A. Madero</option>
                            <option value="Iztacalco">Iztacalco</option>
                            <option value="Iztapalapa">Iztapalapa</option>
                            <option value="La Magdalena Contreras">La Magdalena Contreras</option>
                            <option value="Miguel Hidalgo">Miguel Hidalgo</option>
                            <option value="Milpa Alta">Milpa Alta</option>
                            <option value="Tláhuac">Tláhuac</option>
                            <option value="Tlalpan">Tlalpan</option>
                            <option value="Venustiano Carranza">Venustiano Carranza</option>
                            <option value="Xochimilco">Xochimilco</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="CodigoPost" class="form-label">Código Postal:</label>
                        <input type="number" maxlength="5" name="codigo" id="CodigoPost" class="form-control border border-danger" placeholder="Solo 5 dígitos" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono" class="form-label">Teléfono:</label>
                        <input type="text" id="telefono" class="form-control border border-danger" name="telefono" placeholder="10 dígitos" required>
                    </div>
                    <div class="form-group">
                        <label for="correo" class="form-label">Correo electrónico:</label>
                        <input type="email" id="correo" class="form-control border border-danger" name="email" placeholder="Example@gmail.com" required>
                    </div>
                    <br>

                        <!-- Otros campos de contacto -->
                       
                    <div class="form-group">
                    <h3 class="d-flex justify-content-center">Procedencia</h3>
                    <label for="escuelaProcedencia" class="form-label">Escuela de procedencia: </label>
                    <select id="escuelaProcedencia" class="form-select form-select-sm border border-success" name="escuela" required>
                            <option value="">De click para desplegar opciones</option>
                            <option value="CECyT 1 «Gonzalo Vázquez Vela»">CECyT 1 «Gonzalo Vázquez Vela»</option>
                            <option value="CECyT 2 «Miguel Bernard»">CECyT 2 «Miguel Bernard»</option>
                            <option value="CECyT 3 «Estanislao Ramírez Ruiz»">CECyT 3 «Estanislao Ramírez Ruiz»</option>
                            <option value="CECyT 4 «Lázaro Cárdenas»">CECyT 4 «Lázaro Cárdenas»</option>
                            <option value="CECyT 5 «Benito Juárez García»">CECyT 5 «Benito Juárez García» </option>
                            <option value="CECyT 6 «Miguel Othón de Mendizábal»">CECyT 6 «Miguel Othón de Mendizábal»</option>
                            <option value="CECyT 7 «Cuauhtémoc»">CECyT 7 «Cuauhtémoc»</option>
                            <option value="CECyT 8 «Narciso Bassols García»">CECyT 8 «Narciso Bassols García» </option>
                            <option value="CECyT 9 «Juan de Dios Bátiz»">CECyT 9 «Juan de Dios Bátiz»</option>
                            <option value="CECyT 10 «Carlos Vallejo Márquez»">CECyT 10 «Carlos Vallejo Márquez»</option>
                            <option value="CECyT 11 «Wilfrido Massieu Pérez»">CECyT 11 «Wilfrido Massieu Pérez»</option>
                            <option value="CECyT 12 «José María Morelos y Pavón»">CECyT 12 «José María Morelos y Pavón» </option>
                            <option value="CECyT 13 «Ricardo Flores Magón»">CECyT 13 «Ricardo Flores Magón»</option>
                            <option value="CECyT 14 «Luis Enrique Erro»">CECyT 14 «Luis Enrique Erro»</option>
                            <option value="CECyT 15 «Diódoro Antúnez Echegaray»">CECyT 15 «Diódoro Antúnez Echegaray»</option>
                            <option value="CECyT 16 «Hidalgo»">CECyT 16 «Hidalgo»</option>
                            <option value="CECyT 17 «León Guanajuato»">CECyT 17 «León Guanajuato»</option>
                            <option value="CECyT 18 «Zacatecas»">CECyT 18 «Zacatecas»</option>
                            <option value="CECyT 19 «Leona Vicario»">CECyT 19 «Leona Vicario»</option>
                            <option value="CET 1 «Walter Cross Buchanan»">CET 1 «Walter Cross Buchanan»</option>
                            <option value="otro">Otro</option>
                    </select>
                    </div>
                    <div id="Escuelita" style="display: none;">     
                    <label for="nombreEscuela" class="form-label">Nombre de la escuela: </label>
                    <input type="text" id="nombreEscuela" class=" form-control border border-success" name="escuela2">
                    </div>
                    <div class="form-group">
                    <label for="entidadProcedencia" class="form-label">Entidad Federativa de Procedencia: </label>
                    <select id="entidadProcedencia" class="form-select form-select-sm border border-success" name="entidad" required>
                            <option value="">De click para desplegar opciones</option>
                            <option value="Aguascalientes">Aguascalientes</option>
                            <option value="Baja California">Baja California</option>
                            <option value="Baja California Sur">Baja California Sur</option>
                            <option value="Campeche">Campeche</option>
                            <option value="Chiapas">Chiapas</option>
                            <option value="Chihuahua">Chihuahua</option>
                            <option value="Coahuila">Coahuila</option>
                            <option value="Colima">Colima</option>
                            <option value="Durango">Durango</option>
                            <option value="Estado de México">Estado de México</option>
                            <option value="Guanajuato">Guanajuato</option>
                            <option value="Guerrero">Guerrero</option>
                            <option value="Hidalgo">Hidalgo</option>
                            <option value="Jalisco">Jalisco</option>
                            <option value="Michoacán">Michoacán</option>
                            <option value="Morelos">Morelos</option>
                            <option value="Nayarit">Nayarit</option>
                            <option value="Nuevo León">Nuevo León</option>
                            <option value="Oaxaca">Oaxaca</option>
                            <option value="Puebla">Puebla</option>
                            <option value="Querétaro">Querétaro</option>
                            <option value="Quintana Roo">Quintana Roo</option>
                            <option value="San Luis Potosí">San Luis Potosí</option>
                            <option value="Sinaloa">Sinaloa</option>
                            <option value="Sonora">Sonora</option>
                            <option value="Tabasco">Tabasco</option>
                            <option value="Tamaulipas">Tamaulipas</option>
                            <option value="Tlaxcala">Tlaxcala</option>
                            <option value="Veracruz">Veracruz</option>
                            <option value="Yucatán">Yucatán</option>
                            <option value="Zacatecas">Zacatecas</option>
                            <option value="Ciudad de México">Ciudad de México</option>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="promedio" class="form-label">Promedio: </label>
                    <input type="number" id="promedio" class="form-control border border-success" name="promedio" step="0.01"
                                placeholder="Ej.10.0" required>
                    </div>   <br>
                        <!-- Otros campos de procedencia -->
                        <br>
                    <div class="form-group">
                        <label for="opcion" class="form-check-label">ESCOM fue tu:</label><br>
                        <input type="radio" required name="opcion" id="opcion1" class="form-check-input" value="Primera opción"> 1ra. opción&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="opcion" id="opcion2" class="form-check-input" value="Segunda opción"> 2da. opción&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="opcion" id="opcion3" class="form-check-input" value="Tercera opción"> 3ra. opción&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="opcion" id="opcion4" class="form-check-input" value="Cuarta opción"> 4ta. opción
                    </div><br>
                    <!-- Otros campos de otros -->
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                        crossorigin="anonymous">
                    </script>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                        <button type="button" class="btn btn-secondary" onclick="limpiarFormulario()">Limpiar</button>
                    </div>
                    </div>
                </form>
      </div>
      
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
    // Evento de escucha para el cambio del select "escuelaProcedencia"
    $("#escuelaProcedencia").change(function () {
      // Limpiar el contenido de los campos de texto si la opción no es "otro"
      if ($(this).val().toLowerCase() !== "otro") {
        $("#nombreEscuela").val("");  // Limpiar el contenido del campo "nombreEscuela"
      }

      // Verifica si la opción seleccionada incluye la palabra "otro"
      if ($(this).val().toLowerCase().includes("otro")) {
        // Muestra todo el div "Escuelita" si la opción incluye "otro"
        $("#Escuelita").show();
      } else {
        // Oculta todo el div "Escuelita" y limpia el campo si la opción no incluye "otro"
        $("#Escuelita").hide();
      }
    });
  });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
// Evento de escucha para el cambio del RADIO BUTTTON "tieneDiscapacidad"
$(document).ready(function() {
        $('input[name="opcion1"]').change(function() {
            if ($(this).is(":checked") && $(this).val() === "Primera opcion") {
                $("#tipoDiscapacidadContainer").show();
            } else {
                $("#tipoDiscapacidadContainer").hide();
            }
        });
    });

// Evento de escucha para el cambio del select "tipoDiscapacidad"
$("#tipoDiscapacidad").change(function () {
  // Limpiar el contenido del campo de texto "otraDiscapacidad" si la opción no es "otra"
  if ($(this).val() !== "") {
      $("#otraDiscapacidad").val("");  // Limpiar el contenido del campo "otraDiscapacidad"
  }
              
  // Verifica si la opción seleccionada es "otra"
  if ($(this).val() === "") {
  // Muestra el div "Otra discapacidad" si la opción es "otra"
    $("#otraDiscapacidadContainer").show();
  } else {
    // Oculta el div "Otra discapacidad" y limpia el campo si la opción no es "otra"
    $("#otraDiscapacidadContainer").hide();
  }
 });
</script>

<script>
  function limpiarFormulario() {
    // Obtener referencias a los campos del formulario
    const campos = [
      'noBoleta',
      'curp',
      'nombre',
      'apellidoPaterno',
      'apellidoMaterno',
      'fechaNacimiento',
      'genero',
      'tieneDiscapacidad',
      'tipoDiscapacidad',
      'otraDiscapacidad',
      'cyn',
      'colonia',
      'alcaldia',
      'CodigoPost',
      'telefono',
      'correo',
      'escuelaProcedencia',
      'nombreEscuela',
      'entidadProcedencia',
      'promedio',
      'opcion'
    ];

    // Limpiar cada campo del formulario
    campos.forEach(campoId => {
      const campo = document.getElementById(campoId);
      if (campo.tagName === 'INPUT' || campo.tagName === 'SELECT') {
        campo.value = '';
      } else if (campo.tagName === 'DIV') {
        campo.style.display = 'none';
      } else if (campo.tagName === 'LABEL') {
        campo.innerHTML = '';
      }
    });
  }
</script>



</body>
</html>


