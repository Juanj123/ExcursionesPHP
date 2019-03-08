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
        <form action="?add" method="post">
          <label for="cmbIdAutobus">Numero del ID autobus</label>
          <select class="form-control" id="cmbIdAutobus">
            <option>11</option>
            <option>12</option>
          </select>
          <div class="form-group">
            <label for="txtDestino">Destino</label>
            <input type="text" class="form-control" id="txtDestino" placeholder="Destino">
          </div>
          <div class="form-group">
            <label for="txtHoraSalida">Hora de Salida</label>
            <input type="text" class="form-control" id="txtHoraSalida" placeholder="Hora de Salida">
          </div>
          <div class="form-group">
            <label for="txtCostoAdulto">Costo Adulto</label>
            <input type="text" class="form-control" id="txtCostoAdulto" placeholder="Costo Adulto">
          </div>
          <div class="form-group">
            <label for="txtCostoNiño">Costo Mayores de 6 años</label>
            <input type="text" class="form-control" id="txtCostoNiño" placeholder="Costo Mayores de 6 años">
          </div>
          <div class="form-group">
            <label for="txtCostoMay6">Costo Mayores de 6 años</label>
            <input type="text" class="form-control" id="txtCostoMay6" placeholder="Costo Mayores de 6 años">
          </div>
          <div class="form-group">
            <label for="txtDescripcion">Descripcion</label>
            <textarea class="form-control" id="txtDescripcion" rows="4" placeholder="Descripcion"></textarea>
          </div>
          <label>Fecha del Viaje</label>
          <br>
          <div class="btn-group" role="group" aria-label="Basic example">
            <input type="text" class="form-control" id="txtDia" placeholder="Dia">
            <input type="text" class="form-control" id="txtMes" placeholder="Mes">
            <input type="text" class="form-control" id="txtAño" placeholder="Año">
          </div>
          <div class="form-group">
            <label for="txtNota">Nota</label>
            <textarea class="form-control" id="txtNota" rows="4" placeholder="Nota"></textarea>
          </div>
          <div class="form-group">
            <label for="txtItinerario">Itinerario</label>
            <textarea class="form-control" id="txtItinerario" rows="4" placeholder="Itinerario"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Guardar Viaje</button>
          <button type="button" class="btn btn-secondary">Cancelar</button>
        </form>
      </div>
    </div>
  </div>

  <?php 
  $pojo = new PojoApartaTuLugar();
  if (isset($_GET['add'])) {
    if (isset($_POST)) {    
      $pojo-> totalPagar= $_COOKIE["Total"];
      $pojo-> idAutobus= $idAutobus;
      $_SESSION['Nombre']="bmxpc7";
      $pojo-> idUsuario= $objDaoAparta->getIdUsuario($_SESSION['Nombre']);
      $pojo-> idViaje=   $idViaje;
      $arregloAsientos = array();
      $arregloFinal = array();
      $valores = $_COOKIE["Asientos"];
      $arr1 = str_split($valores);
      var_dump($arr1);
      $contador = 0;
      $arregloAsientos = preg_split("[,]", $valores);
      $remp = array("Asiento","[","]","{","}",":",'"');
      $arregloFinal = str_replace($remp, "", $arregloAsientos);
      var_dump($arregloFinal);

      foreach ($arregloFinal as $asiento)
      {
        $pojo-> n_Asiento = $asiento;
        $objDaoAparta->registrarAsientos($pojo);
      }
      $objDaoAparta->registrarReservacion($pojo);
      $pojo-> idReservacion=$objDaoAparta->getIdReservacion();
      $objDaoAparta->registrarReservacionUsuario($pojo);
      echo "<script>location.href='apartaTuLugar.php'</script>";
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