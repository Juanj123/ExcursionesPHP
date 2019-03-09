<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href=" css/bootstrap.min.css" rel="stylesheet" />

  <title>agregar Promociones</title>
</head>
<body>
  <?php 
  require_once "../Datos/DaoViaje.php";
  require_once "../Pojos/PojoViaje.php";
  $daoViaje = new DaoViaje();
  $pojo = new PojoViaje();
  $lista = $daoViaje->obtenerDestinos();


  ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-12 col-sm-12 col-xl-12">
        <h2>Agregar Viaje</h2>
        <form method="POST" action="?add">
          <label for="cmbIdAutobus">Destino al cual aplicaremos la promocion</label>
          <select class="form-control" name="cmbDestinos">
            <?php
            foreach ($lista as $clave) {
            ?>
            <option><?php echo $clave->{"destino"};?></option>
            <?php
            }
            ?>
          </select>
          <div class="form-group">
            <label for="txtCostoAdulto">Costo Adulto</label>
            <input type="text" class="form-control" name="txtCostoAdulto" placeholder="Costo Adulto">
          </div>
          <div class="form-group">
            <label for="txtCostoNiño">Costo <b>Menores</b> de 6 años</label>
            <input type="text" class="form-control" name="txtCostoNiño" placeholder="Costo Menores de 6 años">
          </div>
          <div class="form-group">
            <label for="txtCostoMay">Costo <b>Mayores</b> de 6 años</label>
            <input type="text" class="form-control" name="txtCostoMay" placeholder="Costo Mayores de 6 años">
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
      $pojo-> idViaje=$daoViaje->getIdViaje($_POST['cmbDestinos']);
      var_dump($pojo->idViaje);
      $pojo-> costo=$_POST['txtCostoAdulto'];
      $pojo-> costoNinio=$_POST['txtCostoNiño'];
      $pojo-> costoAd=$_POST['txtCostoMay'];
      $daoViaje->registrarPromocion($pojo);
      #echo "<script>location.href ='AgregarViaje.php';</script>";
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