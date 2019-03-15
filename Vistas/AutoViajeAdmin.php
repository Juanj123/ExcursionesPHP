<?php include 'header.php';  ?>
<body>

	<div class="container col-md-12 col-lg-12 col-sm-12 col-xl-12">
		<div class="row">
			<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12">
				<br>
				<button class="btn btn-primary" id="btnAgregar" onClick="abrir()">Agregar Autobus a viaje</button>
				<script type="text/javascript">
					function abrir(){
						window.location ="autoViaje.php";

					}
					 </script>

				<br>
				<br>

				<?php
				require_once "../Datos/DaoAutoViaje.php";
			    require_once "../Pojos/PojoAutoViaje.php";
			    $obj = new autoViaje();
			    $dao = new DaoAutoViaje();
			    $lista = $dao->obtenerTodos(); 
			    if (isset($_GET['delete'])) {
					$id = $_GET['id'];
						
						
					if($dao->eliminar($id))
					{

						echo "<script> alertify.success('Actualizado con exito :)');</script>";
						echo "<script> window.location = 'AutoViajeAdmin.php' </script>";
						
					}else
					{
						echo "<script> alertify.error('Fallo el servidor :('); </script>";
						echo "<script> window.location = 'AutoViajeAdmin.php' </script>";
							
					}

						
						

					}
				 ?>
				<table id="tableVideos" class="display nowrap table table-bordered table-hover table-responsive-sm table-responsive-md text-center">
					<thead class="thead-inverse text-white" style="background-color: #c3497f;">
						<tr>
							<th scope="col">Numero de Autobus</th>
							<th scope="col">Numero de Viaje</th>
		 					<th scope="col">Eliminar</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						foreach ($lista as $clave) {
						 ?>
						<tr>
							<td> <?php echo ($clave->{"idAutobus"}); ?> </td>
							<td> <?php echo ($clave->{"idViaje"}); ?> </td>
							<td>
								<?php echo '<a href="?delete&id='.$clave->{"idAutobus"}.'" class="btn btn-danger">Eliminar</a>';;?>

							 </td>
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
		  "aoColumnDefs": [{"bSortable": false, "aTargets": [2,1] }],
		  "order": [[0,"asc"], [1,"asc"]],
		  "language": {
			 "url" : "JS/datatables/jquery.dataTables_i18n.spanish.json"
		  }
		});


		});
  </script>
</html>