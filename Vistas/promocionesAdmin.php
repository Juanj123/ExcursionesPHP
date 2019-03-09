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

  <title>Promociones</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-12 col-sm-12 col-xl-12">
        <h2>Promociones</h2>
        <br />
        <button id="btnAgregar" type="button" class="btn btn-success" style="margin-left: 50%;">Agregar Viaje</button>
        <br />
        <?php 
        require_once "../Datos/DaoPromociones.php";
        require_once "../Datos/DaoViaje.php";
        require_once "../Pojos/PojoOfertas.php";
        $daoPromociones = new DaoPromociones();
        $pojo = new PojoOfertas();
        $daoViaje = new DaoViaje();
        $lista = $daoPromociones->obtenerPromociones();
        $listaDes = $daoPromociones->obtenerDestinos();

        ?>
        <table id="tableViajes" class="table table-bordered table-hover table-responsive-sm table-responsive-md text-center">
          <thead class=" text-white" style="background-color: #c3497f;">

            <tr>
              <th scope="col">Destino</th>
              <th scope="col">costo Adulto</th>
              <th scope="col">Costo Niño Menos de 6 Años</th>
              <th scope="col">Costo Niño Mayor de 6 Años</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
           <?php 
           foreach ($lista as $clave) {
            $datos = $clave->{"destino"}."||".
            $clave->{"costo"}."||".
            $clave->{"costoNinio"}."||".
            $clave->{"costoAd"};
            ?>

            <tr>
              <td><?php echo($clave->{"destino"}); ?></td>
              <td><?php echo($clave->{"costo"}); ?></td>
              <td><?php echo($clave->{"costoNinio"}); ?></td>
              <td><?php echo($clave->{"costoAd"}); ?></td>
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
          <h5 class="modal-title" id="exampleModalLabel">Modificar Promociones</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="txtDestino">Destino</label>
            <input type="text" class="form-control" name="txtDestino" placeholder="Costo Adulto" id="txtDestino">
          </div>
          <div class="form-group">
            <label for="txtCostoAdulto">Costo Adulto</label>
            <input type="text" class="form-control" name="txtCostoAdulto" placeholder="Costo Adulto" id="txtCostoAdulto">
          </div>
          <div class="form-group">
            <label for="txtCostoNiño">Costo Menores de 6 años</label>
            <input type="text" class="form-control" name="txtCostoNiño" placeholder="Costo Mayores de 6 años" id="txtCostoNiño">
          </div>
          <div class="form-group">
            <label for="txtCostoMay">Costo Mayores de 6 años</label>
            <input type="text" class="form-control" name="txtCostoMay" placeholder="Costo Mayores de 6 años" id="txtCostoMay">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
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
    location.href ="agregarPromocion.php";
  });

  function agregarForm(datos)
  {
    d=datos.split('||');
    $("#txtDestino").val(d[0]);
    $("#txtCostoAdulto").val(d[1]);
    $("#txtCostoNiño").val(d[2]);
    $("#txtCostoMay").val(d[3]);

  }

</script>

<?php 
if (isset($_GET['add'])) {
  if (isset($_POST)) {
    var_dump($_POST["txtDestino"]);
    $idViaje = $daoViaje->getIdViaje($_POST["txtDestino"]);
    $pojo-> idOferta= $daoPromociones-> obtenerIdOferta($idViaje);
    $pojo-> costo=$_POST['txtCostoAdulto'];
    $pojo-> costoNinio=$_POST['txtCostoNiño'];
    $pojo-> costoAd=$_POST['txtCostoMay'];
    $daoPromociones->editarPromocion($pojo);
    echo "<script>alert('Datos Guardados')</script>";
  }
}
?>
</body>
</html>