<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href=" css/bootstrap.min.css" rel="stylesheet" />
  <link href=" css/estilosMaster.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="JS/datatables/dataTables.bootstrap4.min.css">

  <link rel="stylesheet" type="text/css" href="CSS/alertify.css">
  <link rel="stylesheet" type="text/css" href="CSS/default.css">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
  <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>

  <title>Viajes</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-12 col-sm-12 col-xl-12">
        <h2>Viajes</h2>
        <br />
        <button id="btnAgregar" type="button" class="btn btn-success" style="margin-left: 50%;">Agregar Viaje</button>
        <br />
        <?php 
        require_once "../Datos/DaoViaje.php";
        require_once "../Pojos/PojoViaje.php";
        $pojo = new PojoViaje();
        $daoViaje = new DaoViaje();
        $lista = $daoViaje->getDatosViaje();

        ?>
        <table id="tableViajes" class="table table-bordered table-hover table-responsive-sm table-responsive-md text-center">
          <thead class=" text-white" style="background-color: #c3497f;">

            <tr>
              <th scope="col">Destino</th>
              <th scope="col">Hora</th>
              <th scope="col">fecha</th>
              <th scope="col">Costo</th>
              <th scope="col">Descripcion</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
           <?php 
           foreach ($lista as $clave) {
            $datos = $clave->{"destino"}."||".
            $clave->{"hora"}."||".
            $clave->{"costo"}."||".
            $clave->{"costoNinio"}."||".
            $clave->{"costoAd"}."||".
            $clave->{"descripcion"}."||".
            $clave->{"dia"}."||".
            $clave->{"mes"}."||".
            $clave->{"anio"}."||".
            $clave->{"nota"}."||".
            $clave->{"itinerario"}."||".
            $clave->{"img"};
            ?>

            <tr>
              <td><?php echo($clave->{"destino"}); ?></td>
              <td><?php echo($clave->{"hora"}); ?></td>
              <td><?php echo($clave->{"dia"})."/".$clave->{"mes"}."/".$clave->{"anio"}; ?></td>
              <td><?php echo($clave->{"costo"}); ?></td>
              <td><?php echo($clave->{"descripcion"}); ?></td>
              <td>
                <button class="btn btn-success" data-target="#ModalModificar" data-toggle="modal" onclick="agregarForm(' <?php echo $datos ?>')">Editar</button>
                <button class="btn btn-danger" onclick="preguntarSiNo('<?php echo ($clave->{"idViaje"}); ?>')">Eliminar</button>
              </td>
            </tr>
          </tbody>

          <?php 
        }
        ?>

      </table>
    </div>
  </div>
</div>
<div class="modal fade" id="ModalModificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form action="?add" method="POST" accept-charset="utf-8">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modificar Viaje</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <label for="cmbIdAutobus">Numero del ID autobus</label>
          <select class="form-control" name="cmbIdAutobus">
            <option>11</option>
            <option>12</option>
          </select>
          <div class="form-group">
            <label for="txtDestino">Destino</label>
            <input type="text" class="form-control" name="txtDestino" id="txtDestino" placeholder="Destino">
          </div>
          <div class="form-group">
            <label for="txtHoraSalida">Hora de Salida</label>
            <input type="text" class="form-control" name="txtHoraSalida" id="txtHoraSalida" placeholder="Hora de Salida">
          </div>
          <div class="form-group">
            <label for="txtCostoAdulto">Costo Adulto</label>
            <input type="text" class="form-control" name="txtCostoAdulto" id="txtCostoAdulto" placeholder="Costo Adulto">
          </div>
          <div class="form-group">
            <label for="txtCostoNiño">Costo Menores de 6 años</label>
            <input type="text" class="form-control" name="txtCostoNiño" id="txtCostoNiño" placeholder="Costo Mayores de 6 años">
          </div>
          <div class="form-group">
            <label for="txtCostoMay">Costo Mayores de 6 años</label>
            <input type="text" class="form-control" name="txtCostoMay" id="txtCostoMay" placeholder="Costo Mayores de 6 años">
          </div>
          <div class="form-group">
            <label for="txtDescripcion">Descripcion</label>
            <textarea class="form-control" name ="txtDescripcion" id="txtDescripcion" rows="4" placeholder="Descripcion"></textarea>
          </div>
          <label>Fecha del Viaje</label>
          <br>
          <div class="btn-group" role="group" aria-label="Basic example">
            <input type="text" class="form-control" name="txtDia" id="txtDia" placeholder="Dia">
            <input type="text" class="form-control" name="txtMes" id="txtMes" placeholder="Mes">
            <input type="text" class="form-control" name="txtAnio" id="txtAnio" placeholder="Año">
          </div>
          <div class="form-group">
            <label for="txtNota">Nota</label>
            <textarea class="form-control" name="txtNota" id="txtNota" rows="4" placeholder="Nota"></textarea>
          </div>
          <div class="form-group">
            <label for="txtItinerario">Itinerario</label>
            <textarea class="form-control" name="txtItinerario" id="txtItinerario" rows="4" placeholder="Itinerario"></textarea>
          </div>
          <div class="form-group">
            <label for="btnSubirImagen">Guardar Imagen</label>
            <input type="file" class="form-control-file" name="btnSubirImagen" accept="image/*">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </form>
</div>

<script type="text/javascript" src="JS/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="JS/popper.min.js"></script>
<script type="text/javascript" src="JS/bootstrap.min.js"></script>
<script type="text/javascript" src="JS/datatables.min.js"></script>
<script type="text/javascript" src="JS/dataTables.bootstrap4.js"></script>
<script type="text/javascript" src="JS/jquery.scrollUp.js"></script>
<script type="text/javascript" src="JS/funciones.js"></script>
<script type="text/javascript" src="JS/alertify.js"></script>

<script>
  $(function () {
    $.scrollUp({
      scrollImg: true
    });
  });
</script>

<script>
  $(document).ready(function(){
    $("#tableViajes").dataTable({
      dom: 'Bfrtip',
      buttons: [
      'copy', 'csv', 'excel', 'pdf', 'print'
      ],
      "aoColumnDefs": [{"bSortable": false, "aTargets": [4,3] }],
      "order": [[0,"asc"], [1,"asc"]],
      "language": {
        "url" : "JS/datatables/jquery.dataTables_i18n.spanish.json"
      }
    });


  });

  $("#btnModificar").click(function () {
    $('#ModalModificar').modal('show');
  });

  $("#btnAgregar").click(function () {
    location.href ="agregarViaje.php";
  });

  function agregarForm(datos)
  {
    d=datos.split('||');
    $("#cmbIdAutobus").val(d[0]);
    $("#txtDestino").val(d[0]);
    $("#txtHoraSalida").val(d[1]);
    $("#txtCostoAdulto").val(d[2]);
    $("#txtCostoNiño").val(d[3]);
    $("#txtCostoMay").val(d[4]);
    $("#txtDescripcion").val(d[5]);
    $("#txtDia").val(d[6]);
    $("#txtMes").val(d[7]);
    $("#txtAnio").val(d[8]);
    $("#txtNota").val(d[9]);
    $("#txtItinerario").val(d[10]);
  }

</script>

<?php 
if (isset($_GET['add'])) {
  if (isset($_POST)) {
    $pojo-> idViaje=$daoViaje->getIdViaje(trim($_POST["txtDestino"]," "));
    $pojo-> idAutobus=$_POST['cmbIdAutobus'];
    $pojo-> destino=$_POST['txtDestino'];
    $pojo-> hora=$_POST['txtHoraSalida'];
    $pojo-> costo=$_POST['txtCostoAdulto'];
    $pojo-> costoNinio=$_POST['txtCostoNiño'];
    $pojo-> costoAd=$_POST['txtCostoMay'];
    $pojo-> descripcion=$_POST['txtDescripcion'];
    $pojo-> dia=$_POST['txtDia'];
    $pojo-> mes=$_POST['txtMes'];
    $pojo-> anio=$_POST['txtAnio'];
    $pojo-> nota=$_POST['txtNota'];
    $pojo-> itinerario=$_POST['txtItinerario'];
    $pojo-> img=$_POST['btnSubirImagen'];
    $daoViaje->editarViaje($pojo);
    echo "<script>location.href='ViajesAdmin.php'</script>";
  }
}
?>
</body>
</html>