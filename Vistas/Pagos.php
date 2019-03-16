<?php include 'headerUser.php';  ?>

<body>
	<br>

				<div class="container col-md-12 col-lg-12 col-sm-12 col-xl-12">
		  <div class="row">
				<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12">

					<button class="btn btn-primary" id="btnAgregar">Agregar Pago</button>
					<br>
					<br>
						<?php 
						  require_once "../Datos/DaoPagos.php";
			    require_once "../Pojos/PojoPagosMos.php";

			    $idUsuario = 1;
			    $obj = new PojoPagosMos();
			    $dao = new DaoPagos();
			    $lista = $dao->obtenerTodos($idUsuario); 
						  ?>

						  				<table id="tableVideos" class="display nowrap table table-bordered table-hover table-responsive-sm table-responsive-md text-center">
					<thead class="thead-inverse text-white" style="background-color: #c3497f;">
						<tr>
							 <th scope="col">índice</th>
							<th scope="col">Folio de reservacion</th>
		 					<th scope="col">Monto</th>
		 					<th scope="col">Total a pagar</th>
		 					<th scope="col">Fecha de pago</th>
		 					<th scope="col">Destino</th>
		 					<th scope="col">Estado</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						foreach ($lista as $clave) {
						 ?>
						<tr>
							<td> <?php echo ($clave->{"idPagos"}); ?> </td>
							<td> <?php echo ($clave->{"idReservacion"}); ?> </td>
							<td> <?php echo ($clave->{"monto"}); ?> </td>
							<td> <?php echo ($clave->{"total"}); ?> </td>
							<td> <?php echo ($clave->{"fecha_pago"}); ?> </td>
							<td> <?php echo ($clave->{"destino"}); ?> </td>
							<td> <?php echo ($clave->{"estado"}); ?> </td>

						</tr>
						<?php
					}
						 ?>
					</tbody>
				</table>


				</div>
			</div>
		</div>

</body>
<footer></footer>
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
		$("#tableVideos").dataTable({
		  "aoColumnDefs": [{"bSortable": false, "aTargets": [6,0] }],
		  "order": [[0,"desc"], [1,"desc"]],
		  "language": {
			 "url" : "JS/datatables/jquery.dataTables_i18n.spanish.json"
		  }
		});


		});
  </script>
	 
</html>