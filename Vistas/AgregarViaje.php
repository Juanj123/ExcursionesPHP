<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href=" css/bootstrap.min.css" rel="stylesheet" />

  <title>Hello, world!</title>
</head>
<body>
  <?php 
  require_once "../Datos/DaoViaje.php";
  require_once "../Pojos/PojoViaje.php";
  $daoViaje = new DaoViaje();
  $pojo = new PojoViaje();
  $lista = $daoViaje->getDatosViaje();

  ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-12 col-sm-12 col-xl-12">
        <h2>Agregar Viaje</h2>
        <form method="POST" action="?add">
          <label for="cmbIdAutobus">Numero del ID autobus</label>
          <select class="form-control" name="cmbIdAutobus">
            <option>11</option>
            <option>12</option>
          </select>
          <div class="form-group">
            <label for="txtDestino">Destino</label>
            <input type="text" class="form-control" name="txtDestino" placeholder="Destino">
          </div>
          <div class="form-group">
            <label for="txtHoraSalida">Hora de Salida</label>
            <input type="text" class="form-control" name="txtHoraSalida" placeholder="Hora de Salida">
          </div>
          <div class="form-group">
            <label for="txtCostoAdulto">Costo Adulto</label>
            <input type="text" class="form-control" name="txtCostoAdulto" placeholder="Costo Adulto">
          </div>
          <div class="form-group">
            <label for="txtCostoNiño">Costo Menores de 6 años</label>
            <input type="text" class="form-control" name="txtCostoNiño" placeholder="Costo Mayores de 6 años">
          </div>
          <div class="form-group">
            <label for="txtCostoMay">Costo Mayores de 6 años</label>
            <input type="text" class="form-control" name="txtCostoMay" placeholder="Costo Mayores de 6 años">
          </div>
          <div class="form-group">
            <label for="txtDescripcion">Descripcion</label>
            <textarea class="form-control" name ="txtDescripcion" rows="4" placeholder="Descripcion"></textarea>
          </div>
          <label>Fecha del Viaje</label>
          <br>
          <div class="btn-group" role="group" aria-label="Basic example">
            <input type="text" class="form-control" name="txtDia" placeholder="Dia">
            <input type="text" class="form-control" name="txtMes" placeholder="Mes">
            <input type="text" class="form-control" name="txtAnio" placeholder="Año">
          </div>
          <div class="form-group">
            <label for="txtNota">Nota</label>
            <textarea class="form-control" name="txtNota" rows="4" placeholder="Nota"></textarea>
          </div>
          <div class="form-group">
            <label for="txtItinerario">Itinerario</label>
            <textarea class="form-control" name="txtItinerario" rows="4" placeholder="Itinerario"></textarea>
          </div>
          <div class="form-group">
            <label for="btnSubirImagen">Guardar Imagen</label>
            <input type="file" class="form-control-file" name="btnSubirImagen" accept="image/*">
          </div>
          <button type="submit" class="btn btn-primary">Guardar Viaje</button>
          <button type="button" class="btn btn-secondary">Cancelar</button>
        </form>
      </div>
    </div>
  </div>

  <?php 
  if (isset($_GET['add'])) {
    if (isset($_POST)) {
      $pojo-> idAutobus=$_POST['cmbIdAutobus'];
      $pojo-> destino=$_POST['txtDestino'];
      $pojo-> hora=$_POST['txtHoraSalida'];
      $pojo-> costo=$_POST['txtCostoAdulto'];
      $pojo-> costoNinio=$_POST['txtCostoNiño'];
      $pojo-> costoAd=$_POST['txtCostoMay'];
      $pojo-> descripcion=$_POST['txtDescripcion'];
      $pojo-> dia=$_POST['txtDia'];
      $pojo-> mes=$_POST['txtMes'];
      $pojo-> años=$_POST['txtAnio'];
      $pojo-> nota=$_POST['txtNota'];
      $pojo-> itinerario=$_POST['txtItinerario'];
      $pojo-> idAutobus=$_POST['btnSubirImagen'];
      $daoViaje->registrarViaje($pojo);
      echo "<script>alert('Datos Guardados')</script>";
    }
  }
  ?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script type="text/javascript" src="JS/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="JS/popper.min.js"></script>
  <script type="text/javascript" src="JS/bootstrap.min.js"></script>
</body>
</html>