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
<div class="modal fade" id="DModal<?php echo $mostrar['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class ="container">
            <div class="row">
              <div class="col-12 text-center">
                <div class="alert alert-danger">
                  <p>¿Desea eliminar este registro? <b><?php echo $mostrar['nombre']; ?></b></p>
                </div>
              </div>
            </div>    
          </div>
          
      </div>
      <div class="modal-footer">
      <div class="row">
              <div class="col-12 text-center">
              <form action="eliminar.php" method="post">
              <input type="hidden" name="accion" value="eliminar">
              <input type="hidden" name="id" value="<?php echo $mostrar['id']; ?>">
              <button type="submit" class="btn btn-danger">Eliminar</button>
              </form>

              </div>
            </div>   
      </div>
    </div>
  </div>
</div>

<?php } ?>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>


