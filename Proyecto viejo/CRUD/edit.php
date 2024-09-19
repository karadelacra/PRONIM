<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Modal con Checkboxes - Ejemplo</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php 
    include '../conexion.php';

    $sql="SELECT * FROM alumno";
    $result=mysqli_query($conectar,$sql);
    while($mostrar = mysqli_fetch_array($result)){
?>

<!-- Modal -->
<div class="modal fade" id="EditModal<?php echo $mostrar['id']; ?>" tabindex="-1" aria-labelledby="editaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editaModalLabel">Editar</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="modificar.php?id=<?php echo $mostrar['id']; ?>" class="diseño" id="registroForm" method="post">
                    <input type="hidden" id="id" name="id">
                    <h3 class="d-flex justify-content-center">Identidad</h3>
                    <div class="form-group">
                    <label for="noBoleta" class="form-label " >No. de Boleta: </label>
                    <input type="text" id="noBoleta" class="form-control border border-primary " name="noBoleta" required placeholder="Ej.PP22014658" value="<?php echo $mostrar ['boleta']; ?>">
                    </div>
                    <div class="form-group">
                    <label for="curp" class="form-label" >CURP: </label>
                    <input type="text" id="curp" class="form-control border border-primary" name="curp" required placeholder="Ej.IRSD040997HDFRNSA9" value="<?php echo $mostrar ['curp']; ?>">
                    </div>
                    <div class="form-group">
                    <label for="nombre" class="form-label " >Nombre: </label>
                    <input type="text" id="nombre" class="form-control border border-primary" name="nombre" required placeholder="Nombre o Nombres" value="<?php echo $mostrar ['nombre']; ?>">
                    </div>
                    <div class="form-group">
                    <label for="apellidoPaterno" class="form-label"  >Apellido Paterno: </label>
                    <input type="text" id="apellidoPaterno" name="apellidoPaterno" required class="form-control border border-primary" value="<?php echo $mostrar ['primerApe']; ?>">
                    </div>
                    <div class="form-group">
                    <label for="apellidoMaterno" class="form-label" >Apellido Materno: </label>
                    <input type="text" id="apellidoMaterno" required name="apellidoMaterno"  value="<?php echo $mostrar ['segundoApe']; ?>"  class="form-control border border-primary" required>
                    </div>
                    <div class="form-group">
                    <label for="fechaNacimiento" class="form-label ">Fecha de nacimiento: </label>
                    <input type="date" id="fechaNacimiento" required class="form-control border border-primary" value="<?php echo $mostrar ['fechaNac']; ?>" name="fechaNacimiento" required>
                    </div><br>
                    <div class="form-group justify-content-center">
                      <label for="genero" class="form-check-label">Género</label><br><br>
                      <input type="radio" required name="genero" id="genero" class="form-check-input" value="Femenino" <?php if ($mostrar['genero'] === 'Femenino') echo 'checked'; ?>> Femenino &nbsp;&nbsp;&nbsp;
                      <input type="radio" name="genero" id="genero" class="form-check-input" value="Masculino" <?php if ($mostrar['genero'] === 'Masculino') echo 'checked'; ?>> Masculino &nbsp;&nbsp;&nbsp;
                      <input type="radio" name="genero" id="genero" class="form-check-input" value="Otro" <?php if ($mostrar['genero'] === 'Otro') echo 'checked'; ?>> Otro <br>
                    </div>
                    
                    <br>
                    <div class="form-group">
    <label for="opcion1" class="form-check-label">¿Tiene alguna discapacidad?:</label><br>
    <input type="radio" required name="opcion1_<?php echo $mostrar['id']; ?>" id="opcion1_si_<?php echo $mostrar['id']; ?>" class="form-check-input" value="Primera opcion" <?php echo (isset($mostrar['discapacidad']) && $mostrar['discapacidad'] !== null && $mostrar['discapacidad'] !== '' && $mostrar['discapacidad'] !== 'Otra') ? 'checked' : ''; ?>> Si&nbsp;&nbsp;&nbsp;
    <input type="radio" name="opcion1_<?php echo $mostrar['id']; ?>" id="opcion1_no_<?php echo $mostrar['id']; ?>" class="form-check-input" value="Segunda opcion" <?php echo (!isset($mostrar['discapacidad']) || $mostrar['discapacidad'] === null || $mostrar['discapacidad'] === '' || $mostrar['discapacidad'] === 'Otra') ? 'checked' : ''; ?>> No&nbsp;&nbsp;&nbsp;
</div>
<div id="tipoDiscapacidadContainer_<?php echo $mostrar['id']; ?>" <?php echo (isset($mostrar['discapacidad']) && $mostrar['discapacidad'] !== null && $mostrar['discapacidad'] !== '' && $mostrar['discapacidad'] !== 'Otra') ? 'style="display: block;"' : 'style="display: none;"'; ?>>
    <label for="tipoDiscapacidad" class="form-label">Tipo de discapacidad: </label>
    <select id="tipoDiscapacidad_<?php echo $mostrar['id']; ?>" class="form-select form-select-sm tipoDiscapacidad" name="discapacidad_<?php echo $mostrar['id']; ?>" aria-label=".form-select-sm example">
        <option value="">De click para desplegar opciones</option>
        <option value="Discapacidad auditiva" <?php echo (isset($mostrar['discapacidad']) && $mostrar['discapacidad'] === 'Discapacidad auditiva') ? 'selected' : ''; ?>>Con discapacidad auditiva</option>
                            <option value="">De click para desplegar opciones</option>
                            <option value="Discapacidad auditiva" <?php echo ($mostrar['discapacidad'] === 'Discapacidad auditiva') ? 'selected' : ''; ?>>Con discapacidad auditiva</option>
                            <option value="Discapacidad motriz con silla de ruedas" <?php echo ($mostrar['discapacidad'] === 'Discapacidad motriz con silla de ruedas') ? 'selected' : ''; ?>>Con discapacidad motriz (usuaria de silla de ruedas)</option>
                            <option value="Discapacidad motriz con muletas" <?php echo ($mostrar['discapacidad'] === 'Discapacidad motriz con muletas') ? 'selected' : ''; ?>>Con discapacidad motriz usuaria de muletas</option>
                            <option value="Discapacidad motriz con bastón" <?php echo ($mostrar['discapacidad'] === 'Discapacidad motriz con bastón') ? 'selected' : ''; ?>>Con discapacidad motriz usuaria de bastón</option>
                            <option value="Discapacidad visual" <?php echo ($mostrar['discapacidad'] === 'Discapacidad visual') ? 'selected' : ''; ?>>Con discapacidad visual</option>
                            <option value="Otra" <?php echo ($mostrar['discapacidad'] === 'Otra') ? 'selected' : ''; ?>>Otra</option>
                        </select>

                        <div id="otraDiscapacidadContainer_<?php echo $mostrar['id']; ?>" <?php echo (isset($mostrar['discapacidad']) && $mostrar['discapacidad'] === 'Otra') ? 'style="display: block;"' : 'style="display: none;"'; ?>>
        <br>
        <label for="otraDiscapacidad" class="form-label">Especificar otra discapacidad: </label>
        <input type="text" id="otraDiscapacidad_<?php echo $mostrar['id']; ?>" name="discapacidad2_<?php echo $mostrar['id']; ?>" value="<?php echo isset($mostrar['discapacidad2']) ? $mostrar['discapacidad2'] : ''; ?>">
    </div>
                    </div>

                            
                                
                    <br>
                        <!-- Otros campos de identidad -->
                    <h3 class=" d-flex justify-content-center">Contacto</h3>
                    <div class="form-gruop">
                      <label for="cyn" class="form-label">Calle y número: </label>
                      <input type="text" id="cyn" class="form-control border border-danger" name="cyn" placeholder="Nombre de calle y número exterior" value="<?php echo $mostrar ['calle']; ?>" required >
                    </div>
                    <div class="form-group">
                      <label for="colonia" class="form-label">Colonia: </label>
                      <input type="text" id="colonia" class="form-control border border-danger" name="colonia" placeholder="Nombre completo" value="<?php echo $mostrar ['colonia']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="alcaldia" class="form-label">Alcaldia: </label>
                      <select name="alcaldia" id="alcaldia" class="form-select form-select-sm border border-danger" required>
                          <option value="">Seleccione una opción</option>
                          <option value="Alvaro Obregon" <?php if ($mostrar['alcaldia'] === 'Alvaro Obregon') echo 'selected'; ?>>Alvaro Obregon</option>
                          <option value="Azcapotzalco" <?php if ($mostrar['alcaldia'] === 'Azcapotzalco') echo 'selected'; ?>>Azcapotzalco</option>
                          <option value="Benito Juarez" <?php if ($mostrar['alcaldia'] === 'Benito Juarez') echo 'selected'; ?>>Benito Juarez</option>
                          <option value="Coyoacan" <?php if ($mostrar['alcaldia'] === 'Coyoacan') echo 'selected'; ?>>Coyoacan</option>
                          <option value="Cuajimalpa de Morelos" <?php if ($mostrar['alcaldia'] === 'Cuajimalpa de Morelos') echo 'selected'; ?>>Cuajimalpa de Morelos</option>
                          <option value="Cuauhtemoc" <?php if ($mostrar['alcaldia'] === 'Cuauhtemoc') echo 'selected'; ?>>Cuauhtemoc</option>
                          <option value="Gustavo A. Madero" <?php if ($mostrar['alcaldia'] === 'Gustavo A. Madero') echo 'selected'; ?>>Gustavo A. Madero</option>
                          <option value="Iztacalco" <?php if ($mostrar['alcaldia'] === 'Iztacalco') echo 'selected'; ?>>Iztacalco</option>
                          <option value="Iztapalapa" <?php if ($mostrar['alcaldia'] === 'Iztapalapa') echo 'selected'; ?>>Iztapalapa</option>
                          <option value="La Magdalena Contreras" <?php if ($mostrar['alcaldia'] === 'La Magdalena Contreras') echo 'selected'; ?>>La Magdalena Contreras</option>
                          <option value="Miguel Hidalgo" <?php if ($mostrar['alcaldia'] === 'Miguel Hidalgo') echo 'selected'; ?>>Miguel Hidalgo</option>
                          <option value="Milpa Alta" <?php if ($mostrar['alcaldia'] === 'Milpa Alta') echo 'selected'; ?>>Milpa Alta</option>
                          <option value="Tlahuac" <?php if ($mostrar['alcaldia'] === 'Tlahuac') echo 'selected'; ?>>Tlahuac</option>
                          <option value="Tlalpan" <?php if ($mostrar['alcaldia'] === 'Tlalpan') echo 'selected'; ?>>Tlalpan</option>
                          <option value="Venustiano Carranza" <?php if ($mostrar['alcaldia'] === 'Venustiano Carranza') echo 'selected'; ?>>Venustiano Carranza</option>
                          <option value="Xochimilco" <?php if ($mostrar['alcaldia'] === 'Xochimilco') echo 'selected'; ?>>Xochimilco</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="CodigoPost" class="form-label">Codigo Postal: </label> 
                      <input type="number" maxlength="5" name="codigo" id= "CodigoPost" class="form-control border border-danger" value="<?php echo $mostrar ['postal']; ?>" placeholder="Solo 5 dígitos" required>
                    </div>
                    <div class="form-group">
                      <label for="telefono" class="form-label ">Teléfono: </label>
                      <input type="text" id="telefono" class="form-control border border-danger" name="telefono" placeholder="10 dígitos" value="<?php echo $mostrar ['telefono']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="correo" class="form-label">Correo electrónico: </label>
                      <input type="email" id="correo" class="form-control border border-danger" name="email" placeholder="Example@gmail.com" value="<?php echo $mostrar ['correo']; ?>" required>
                    </div>  
                    <br>
                    <!-- Otros campos de contacto -->   
                    <div class="form-group">
                      <h3 class="d-flex justify-content-center">Procedencia</h3>
                      <label for="escuelaProcedencia" class="form-label">Escuela de procedencia: </label>
                      <select id="escuelaProcedencia" class="form-select form-select-sm border border-success" name="escuela" required>
                          <option value="">De click para desplegar opciones</option>
                          <option value="CECyT 1 «Gonzalo Vázquez Vela»" <?php if ($mostrar['escuela'] === 'CECyT 1 «Gonzalo Vázquez Vela»') echo 'selected'; ?>>CECyT 1 «Gonzalo Vázquez Vela»</option>
                          <option value="CECyT 2 «Miguel Bernard»" <?php if ($mostrar['escuela'] === 'CECyT 2 «Miguel Bernard»') echo 'selected'; ?>>CECyT 2 «Miguel Bernard»</option>
                          <option value="CECyT 3 «Estanislao Ramírez Ruiz»" <?php if ($mostrar['escuela'] === 'CECyT 3 «Estanislao Ramírez Ruiz»') echo 'selected'; ?>>CECyT 3 «Estanislao Ramírez Ruiz»</option>
                          <option value="CECyT 4 «Lázaro Cárdenas»" <?php if ($mostrar['escuela'] === 'CECyT 4 «Lázaro Cárdenas»') echo 'selected'; ?>>CECyT 4 «Lázaro Cárdenas»</option>
                          <option value="CECyT 5 «Benito Juárez García»" <?php if ($mostrar['escuela'] === 'CECyT 5 «Benito Juárez García»') echo 'selected'; ?>>CECyT 5 «Benito Juárez García» </option>
                          <option value="CECyT 6 «Miguel Othón de Mendizábal»" <?php if ($mostrar['escuela'] === 'CECyT 6 «Miguel Othón de Mendizábal»') echo 'selected'; ?>>CECyT 6 «Miguel Othón de Mendizábal»</option>
                          <option value="CECyT 7 «Cuauhtémoc»" <?php if ($mostrar['escuela'] === 'CECyT 7 «Cuauhtémoc»') echo 'selected'; ?>>CECyT 7 «Cuauhtémoc»</option>
                          <option value="CECyT 8 «Narciso Bassols García»" <?php if ($mostrar['escuela'] === 'CECyT 8 «Narciso Bassols García»') echo 'selected'; ?>>CECyT 8 «Narciso Bassols García» </option>
                          <option value="CECyT 9 «Juan de Dios Bátiz»" <?php if ($mostrar['escuela'] === 'CECyT 9 «Juan de Dios Bátiz»') echo 'selected'; ?>>CECyT 9 «Juan de Dios Bátiz»</option>
                          <option value="CECyT 10 «Carlos Vallejo Márquez»" <?php if ($mostrar['escuela'] === 'CECyT 10 «Carlos Vallejo Márquez»') echo 'selected'; ?>>CECyT 10 «Carlos Vallejo Márquez»</option>
                          <option value="CECyT 11 «Wilfrido Massieu Pérez»" <?php if ($mostrar['escuela'] === 'CECyT 11 «Wilfrido Massieu Pérez»') echo 'selected'; ?>>CECyT 11 «Wilfrido Massieu Pérez»</option>
                          <option value="CECyT 12 «José María Morelos y Pavón»" <?php if ($mostrar['escuela'] === 'CECyT 12 «José María Morelos y Pavón»') echo 'selected'; ?>>CECyT 12 «José María Morelos y Pavón» </option>
                          <option value="CECyT 13 «Ricardo Flores Magón»" <?php if ($mostrar['escuela'] === 'CECyT 13 «Ricardo Flores Magón»') echo 'selected'; ?>>CECyT 13 «Ricardo Flores Magón»</option>
                          <option value="CECyT 14 «Luis Enrique Erro»" <?php if ($mostrar['escuela'] === 'CECyT 14 «Luis Enrique Erro»') echo 'selected'; ?>>CECyT 14 «Luis Enrique Erro»</option>
                          <option value="CECyT 15 «Diódoro Antúnez Echegaray»" <?php if ($mostrar['escuela'] === 'CECyT 15 «Diódoro Antúnez Echegaray»') echo 'selected'; ?>>CECyT 15 «Diódoro Antúnez Echegaray»</option>
                          <option value="CECyT 16 «Hidalgo»" <?php if ($mostrar['escuela'] === 'CECyT 16 «Hidalgo»') echo 'selected'; ?>>CECyT 16 «Hidalgo»</option>
                          <option value="CECyT 17 «León Guanajuato»" <?php if ($mostrar['escuela'] === 'CECyT 17 «León Guanajuato»') echo 'selected'; ?>>CECyT 17 «León Guanajuato»</option>
                          <option value="CECyT 18 «Zacatecas»" <?php if ($mostrar['escuela'] === 'CECyT 18 «Zacatecas»') echo 'selected'; ?>>CECyT 18 «Zacatecas»</option>
                          <option value="CECyT 19 «Leona Vicario»" <?php if ($mostrar['escuela'] === 'CECyT 19 «Leona Vicario»') echo 'selected'; ?>>CECyT 19 «Leona Vicario»</option>
                          <option value="CET 1 «Walter Cross Buchanan»" <?php if ($mostrar['escuela'] === 'CET 1 «Walter Cross Buchanan»') echo 'selected'; ?>>CET 1 «Walter Cross Buchanan»</option>
                          <option value="Otro" <?php if ($mostrar['escuela'] === 'Otro') echo 'selected'; ?>>Otro</option>
                      </select>
                    </div>
                    <div id="Escuelita" <?php if ($mostrar['escuela'] !== 'Otro') echo 'style="display: none;"'; ?>>
                      <label for="nombreEscuela" class="form-label">Nombre de la escuela: </label>
                      <input type="text" id="nombreEscuela" class="form-control border border-success" name="escuela2" <?php if ($mostrar['escuela'] !== 'Otro') echo 'disabled'; ?>>
                    </div>
                    <div class="form-group">
                      <label for="entidadProcedencia" class="form-label">Entidad Federativa de Procedencia: </label>
                      <select id="entidadProcedencia" class="form-select form-select-sm border border-success" name="entidad" required>
                          <option value="">De click para desplegar opciones</option>
                          <option value="Aguascalientes" <?php if ($mostrar['entidad'] === 'Aguascalientes') echo 'selected'; ?>>Aguascalientes</option>
                          <option value="Baja California" <?php if ($mostrar['entidad'] === 'Baja California') echo 'selected'; ?>>Baja California</option>
                          <option value="Baja California Sur" <?php if ($mostrar['entidad'] === 'Baja California Sur') echo 'selected'; ?>>Baja California Sur</option>
                          <option value="Campeche" <?php if ($mostrar['entidad'] === 'Campeche') echo 'selected'; ?>>Campeche</option>
                          <option value="Chiapas" <?php if ($mostrar['entidad'] === 'Chiapas') echo 'selected'; ?>>Chiapas</option>
                          <option value="Chihuahua" <?php if ($mostrar['entidad'] === 'Chihuahua') echo 'selected'; ?>>Chihuahua</option>
                          <option value="Coahuila" <?php if ($mostrar['entidad'] === 'Coahuila') echo 'selected'; ?>>Coahuila</option>
                          <option value="Colima" <?php if ($mostrar['entidad'] === 'Colima') echo 'selected'; ?>>Colima</option>
                          <option value="Durango" <?php if ($mostrar['entidad'] === 'Durango') echo 'selected'; ?>>Durango</option>
                          <option value="Estado de México" <?php if ($mostrar['entidad'] === 'Estado de México') echo 'selected'; ?>>Estado de México</option>
                          <option value="Guanajuato" <?php if ($mostrar['entidad'] === 'Guanajuato') echo 'selected'; ?>>Guanajuato</option>
                          <option value="Guerrero" <?php if ($mostrar['entidad'] === 'Guerrero') echo 'selected'; ?>>Guerrero</option>
                          <option value="Hidalgo" <?php if ($mostrar['entidad'] === 'Hidalgo') echo 'selected'; ?>>Hidalgo</option>
                          <option value="Jalisco" <?php if ($mostrar['entidad'] === 'Jalisco') echo 'selected'; ?>>Jalisco</option>
                          <option value="Michoacán" <?php if ($mostrar['entidad'] === 'Michoacán') echo 'selected'; ?>>Michoacán</option>
                          <option value="Morelos" <?php if ($mostrar['entidad'] === 'Morelos') echo 'selected'; ?>>Morelos</option>
                          <option value="Nayarit" <?php if ($mostrar['entidad'] === 'Nayarit') echo 'selected'; ?>>Nayarit</option>
                          <option value="Nuevo León" <?php if ($mostrar['entidad'] === 'Nuevo León') echo 'selected'; ?>>Nuevo León</option>
                          <option value="Oaxaca" <?php if ($mostrar['entidad'] === 'Oaxaca') echo 'selected'; ?>>Oaxaca</option>
                          <option value="Puebla" <?php if ($mostrar['entidad'] === 'Puebla') echo 'selected'; ?>>Puebla</option>
                          <option value="Querétaro" <?php if ($mostrar['entidad'] === 'Querétaro') echo 'selected'; ?>>Querétaro</option>
                          <option value="Quintana Roo" <?php if ($mostrar['entidad'] === 'Quintana Roo') echo 'selected'; ?>>Quintana Roo</option>
                          <option value="San Luis Potosí" <?php if ($mostrar['entidad'] === 'San Luis Potosí') echo 'selected'; ?>>San Luis Potosí</option>
                          <option value="Sinaloa" <?php if ($mostrar['entidad'] === 'Sinaloa') echo 'selected'; ?>>Sinaloa</option>
                          <option value="Sonora" <?php if ($mostrar['entidad'] === 'Sonora') echo 'selected'; ?>>Sonora</option>
                          <option value="Tabasco" <?php if ($mostrar['entidad'] === 'Tabasco') echo 'selected'; ?>>Tabasco</option>
                          <option value="Tamaulipas" <?php if ($mostrar['entidad'] === 'Tamaulipas') echo 'selected'; ?>>Tamaulipas</option>
                          <option value="Tlaxcala" <?php if ($mostrar['entidad'] === 'Tlaxcala') echo 'selected'; ?>>Tlaxcala</option>
                          <option value="Veracruz" <?php if ($mostrar['entidad'] === 'Veracruz') echo 'selected'; ?>>Veracruz</option>
                          <option value="Yucatán" <?php if ($mostrar['entidad'] === 'Yucatán') echo 'selected'; ?>>Yucatán</option>
                          <option value="Zacatecas" <?php if ($mostrar['entidad'] === 'Zacatecas') echo 'selected'; ?>>Zacatecas</option>
                          <option value="Ciudad de México" <?php if ($mostrar['entidad'] === 'Ciudad de México') echo 'selected'; ?>>Ciudad de México</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="promedio" class="form-label">Promedio: </label>
                      <input type="number" id="promedio" class="form-control border border-success" value="<?php echo $mostrar ['promedio']; ?>" name="promedio" step="0.01"
                                placeholder="Ej.10.0" required>
                    </div>   <br>
                    <!-- Otros campos de procedencia -->
                    <br>
                    <div class="form-group">
                      <label for="opcion" class="form-check-label">ESCOM fue tu:</label><br>
                      <input type="radio" required name="opcion" id="opcion1" class="form-check-input" value="Primera opcion" <?php if ($mostrar['opcion'] === 'Primera opcion') echo 'checked'; ?>> 1er. opcion&nbsp;&nbsp;&nbsp;
                      <input type="radio" name="opcion" id="opcion2" class="form-check-input" value="Segunda opcion" <?php if ($mostrar['opcion'] === 'Segunda opcion') echo 'checked'; ?>> 2da. opcion&nbsp;&nbsp;&nbsp;
                      <input type="radio" name="opcion" id="opcion3" class="form-check-input" value="Tercera opcion" <?php if ($mostrar['opcion'] === 'Tercera opcion') echo 'checked'; ?>> 3ra. opcion&nbsp;&nbsp;&nbsp;
                      <input type="radio" name="opcion" id="opcion4" class="form-check-input" value="Cuarta opcion" <?php if ($mostrar['opcion'] === 'Cuarta opcion') echo 'checked'; ?>> 4ta. opcion
                    </div><br>
                    <!-- Otros campos de otros -->
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                            crossorigin="anonymous">
                    </script>
                    <!-- Bootstrap JS -->
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                                $(document).ready(function() {
                                    // Evento de escucha para el cambio del select "escuelaProcedencia"
                                    $("#escuelaProcedencia").change(function() {
                                        // Limpiar el contenido de los campos de texto si la opción no es "otro"
                                        if ($(this).val().toLowerCase() !== "otro") {
                                            $("#nombreEscuela").val(""); // Limpiar el contenido del campo "nombreEscuela"
                                        }

                                        // Verifica si la opción seleccionada incluye la palabra "otro"
                                        if ($(this).val().toLowerCase().includes("otro")) {
                                            // Muestra todo el div "Escuelita" si la opción incluye "otro"
                                            $("#Escuelita<?php echo $mostrar['id']; ?>").show();
                                        } else {
                                            // Oculta todo el div "Escuelita" y limpia el campo si la opción no incluye "otro"
                                            $("#Escuelita<?php echo $mostrar['id']; ?>").hide();
                                        }
                                    });
                                });
                            </script>

<script>
$(document).ready(function () {
    // Evento de escucha para el cambio del RADIO BUTTON "opcion1"
    $('input[name^="opcion1_"]').change(function () {
        var tipoDiscapacidadContainer = $(this).closest('.form-group').next("[id^='tipoDiscapacidadContainer_']");
        var tipoDiscapacidad = tipoDiscapacidadContainer.find("[id^='tipoDiscapacidad_']");
        var otraDiscapacidadContainer = tipoDiscapacidadContainer.find("[id^='otraDiscapacidadContainer_']");

        if ($(this).val() === "Primera opcion") {
            tipoDiscapacidadContainer.show();
            // Mostrar la opción guardada en la base de datos
            var selectedOption = tipoDiscapacidadContainer.find('select.tipoDiscapacidad').val();
            if (selectedOption === "Otra") {
                otraDiscapacidadContainer.show();
            } else {
                otraDiscapacidadContainer.hide();
                tipoDiscapacidad.val("");
            }
        } else {
            tipoDiscapacidadContainer.hide();
            tipoDiscapacidad.val("");
            otraDiscapacidadContainer.hide();
            otraDiscapacidadContainer.find("[id^='otraDiscapacidad']").val("");
        }
    });

    // Llamar a la función para manejar el estado del formulario inicialmente
    handleFormState();
});

// Función para manejar el estado del formulario
function handleFormState() {
    $('[id^="tipoDiscapacidadContainer_"]').each(function () {
        var tipoDiscapacidadContainer = $(this);
        var tipoDiscapacidad = tipoDiscapacidadContainer.find("[id^='tipoDiscapacidad_']");
        var otraDiscapacidadContainer = tipoDiscapacidadContainer.find("[id^='otraDiscapacidadContainer_']");
        var opcionSi = tipoDiscapacidadContainer.prev('.form-group').find("[id^='opcion1_si']");
        var selectedOption = tipoDiscapacidadContainer.find('select.tipoDiscapacidad').val();

        // Verificar el estado inicial del radio button "Si"
        if (opcionSi.is(":checked")) {
            tipoDiscapacidadContainer.show();
            // Mostrar la opción guardada en la base de datos
            if (selectedOption === "Otra") {
                otraDiscapacidadContainer.show();
            } else {
                otraDiscapacidadContainer.hide();
                tipoDiscapacidad.val(selectedOption); // Establecer la opción guardada por defecto
            }
        } else {
            tipoDiscapacidadContainer.hide();
            tipoDiscapacidad.val("");
            otraDiscapacidadContainer.hide();
            otraDiscapacidadContainer.find("[id^='otraDiscapacidad']").val("");
        }

        // Verificar si la opción guardada es "Otra" y mostrar el input correspondiente
        if (selectedOption === "Otra") {
            otraDiscapacidadContainer.show();
        }
    });

    // Manejar el caso cuando se selecciona la opción "Otra" inicialmente
    $('[id^="tipoDiscapacidadContainer_"]').find('select.tipoDiscapacidad').change(function() {
        var otraDiscapacidadContainer = $(this).closest('[id^="tipoDiscapacidadContainer_"]').find("[id^='otraDiscapacidadContainer_']");
        if ($(this).val() === "Otra") {
            otraDiscapacidadContainer.show();
        } else {
            otraDiscapacidadContainer.hide();
            otraDiscapacidadContainer.find("[id^='otraDiscapacidad']").val("");
        }
    });
}
</script>






                    <script>
                        function limpiarFormulario() {
                            // Encontrar el contenedor del botón de limpieza
                            var container = $("#EditModal<?php echo $mostrar['id']; ?>");
                            // Encontrar los elementos relacionados dentro del contenedor actual
                            var tipoDiscapacidadContainer = container.find(".tipoDiscapacidadContainer");
                            var tipoDiscapacidad = container.find(".tipoDiscapacidad");
                            var otraDiscapacidadContainer = container.find(".otraDiscapacidadContainer");

                            // Limpiar los campos de texto y ocultar los contenedores relevantes
                            $("#nombreEscuela").val("");
                            tipoDiscapacidad.val("");
                            otraDiscapacidadContainer.hide();
                            $("#otraDiscapacidad").val("");
                            tipoDiscapacidadContainer.hide();
                            $("input[name='opcion1']").prop('checked', false);
                            $("#Escuelita").hide();
                        }
                    </script>
                    <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Modificar</button>
                            <button type="button" class="btn btn-secundary" onclick="limpiarFormulario()">Limpiar</button>
                    </div>
                    </div>
                </form>
            </div>
    </div>
  </div>
</div>

<?php 
    }
?>


</body>
</html>


