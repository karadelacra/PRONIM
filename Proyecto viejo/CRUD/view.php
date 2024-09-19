<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Modal con Checkboxes - Ejemplo</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="adminstyle.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php 
    include '../conexion.php';

    $sql="SELECT * FROM alumno";
    $result=mysqli_query($conectar,$sql);
    while($mostrar = mysqli_fetch_array($result)){
?>

<div class="modal fade" id="VModal<?php echo $mostrar['id']; ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Datos del usuario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th style="text-align: center;"> Boleta</th>
                        <th> Nombre</th>
                        <th> Apellido P</th>
                        <th> Apellido M </th>
                        <th style="text-align: center;"> E-mail</th>
                        <th> Promedio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $selected_id = $mostrar['id'];
                        $sql_selected = "SELECT * FROM alumno WHERE id = $selected_id";
                        $result_selected = mysqli_query($conectar, $sql_selected);

                        while($selected_user = mysqli_fetch_array($result_selected)){
                    ?>
                        <tr>
                            <td style="text-align: center;"><?php echo $selected_user['boleta']?></td>
                            <td style="text-align: center;"><?php echo $selected_user['nombre']?></td>
                            <td style="text-align: center;"><?php echo $selected_user['primerApe']?></td>
                            <td style="text-align: center;"> <?php echo $selected_user['segundoApe']?></td>
                            <td style="text-align: center;"><?php echo $selected_user['correo']?></td>
                            <td style="text-align: center;"><?php echo $selected_user['promedio']?></td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
            <table>
                <thead>
                    <tr>
                        <th style="text-align: center;">Fecha de Nacimiento</th>
                        <th>Curp</th>
                        <th>Genero</th>
                        <th>Discapacidad</th>
                        <th style="text-align: center;">Calle</th>
                        <th>Colonia</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $selected_id = $mostrar['id'];
                        $sql_selected = "SELECT * FROM alumno WHERE id = $selected_id";
                        $result_selected = mysqli_query($conectar, $sql_selected);

                        while($selected_user = mysqli_fetch_array($result_selected)){
                            
                    ?>
                        <tr>
                            <td style="text-align: center;"><?php echo $selected_user['fechaNac']?></td>
                            <td style="text-align: center;"><?php echo $selected_user['curp']?></td>
                            <td style="text-align: center;"><?php echo $selected_user['genero']?></td>
                            <td style="text-align: center;"> <?php echo $selected_user['discapacidad']?></td>
                            <td style="text-align: center;"><?php echo $selected_user['calle']?></td>
                            <td style="text-align: center;"><?php echo $selected_user['colonia']?></td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
            <table>
                <thead>
                    <tr>
                        <th style="text-align: center;">Alcaldia</th>
                        <th>CP</th>
                        <th>Telefono</th>
                        <th>Escuela</th>
                        <th style="text-align: center;">Entidad</th>
                        <th>Opción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $selected_id = $mostrar['id'];
                        $sql_selected = "SELECT * FROM alumno WHERE id = $selected_id";
                        $result_selected = mysqli_query($conectar, $sql_selected);

                        while($selected_user = mysqli_fetch_array($result_selected)){
                    ?>
                        <tr>
                            <td style="text-align: center;"><?php echo $selected_user['alcaldia']?></td>
                            <td style="text-align: center;"><?php echo $selected_user['postal']?></td>
                            <td style="text-align: center;"><?php echo $selected_user['telefono']?></td>
                            <td style="text-align: center;"> <?php echo $selected_user['escuela']?></td>
                            <td style="text-align: center;"><?php echo $selected_user['entidad']?></td>
                            <td style="text-align: center;"><?php echo $selected_user['opcion']?></td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </section>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<?php } ?>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>
