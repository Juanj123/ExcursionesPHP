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

  <title>Hello, world!</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-12 col-sm-12 col-xl-12">
        <h2>Viajes</h2>
        <br />
        <button type="button" class="btn btn-success" style="margin-left: 50%;">Agregar Viaje</button>
        <br />
        <?php 
        require_once "../Datos/DaoViaje.php";
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
             ?>

             <tr>
              <td><?php echo($clave->{"destino"}); ?></td>
              <td><?php echo($clave->{"hora"}); ?></td>
              <td><?php echo($clave->{"dia"})."/".$clave->{"mes"}."/".$clave->{"año"}; ?></td>
              <td><?php echo($clave->{"costo"}); ?></td>
              <td><?php echo($clave->{"descripcion"}); ?></td>
              <td>
                <div class="btn-group btn-group-lg" role="group" aria-label="...">
                  <?php echo('<button id="btnEliminar" value="Eliminar" title="Eliminar" class="btn btn-danger btn-delete">Eliminar</button>'); ?>
                  <?php echo('<button id="btnModificar" value="Modificar" title="Modificar" class="btn btn-success btn-delete">Modificar</button>'); ?>
                </div>
              </td>
            </tr>
          </tbody>

          <?php 
        }
        function add($id,$ida){

        }
        ?>

      </table>
    </div>
  </div>
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
</script>

</body>
</html>