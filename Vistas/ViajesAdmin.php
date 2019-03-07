<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="CSS/bootstrap.min.css">
  <link rel="stylesheet" href="CSS/animate.min.css">

  <title>Hello, world!</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-12 col-sm-12 col-xl-12">
        <h2>Viajes</h2>
        <br />
        <button type="button" class="btn btn-success">Agregar Viaje</button>
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
          </tbody>
          <?php 
          foreach ($lista as $clave) {
           ?>

           <tr>
            <td><?php echo($clave->{"destino"}); ?></td>
            <td><?php echo($clave->{"hora"}); ?></td>
            <td><?php echo($clave->{"dia"})."/".$clave->{"mes"}."/".$clave->{"año"}; ?></td>
            <td><?php echo($clave->{"costo"}); ?></td>
            <td><?php echo($clave->{"descripcion"}); ?></td>
            <td><?php echo('<button value="Eliminar" title="Eliminar" class="btn btn-danger btn-delete">Eliminar</button>'); ?>
            </td>   
          </tr>
          <?php 
        }
        function add($id,$ida){

        }
        ?>
      }
    </table>
  </div>
</div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="JS/jquery-3.3.1.min.js"></script>
<script src="JS/popper.min.js"></script>
<script src="JS/bootstrap.min.js"></script>
<script src="JS/bootbox.min.js"></script>
<script src="JS/datatables.js"></script>
<script src="JS/Viajes.js"></script>
</body>
</html>