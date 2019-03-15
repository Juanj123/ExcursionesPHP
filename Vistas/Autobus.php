<?php include 'header.php';  ?>

<body>
	<div class="container col-md-12 col-lg-12 col-sm-12 col-xl-12">
		<div class="row">
			<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12">
				<br>
				 <button class="btn btn-primary" id="btnAgregar" onClick="abrir()">Agregar Autobus</button>

				 <script type="text/javascript">

					function abrir(){
						window.location ="AgregarAutobus.php";
					}
				 </script>

				 <br>
				 <br>
				 <?php 
					require_once "../Datos/DaoAutobus.php";
					require_once "../Pojos/PojoAutobus.php";
					$obj = new PojoAutobus();
					$dao = new DaoAutobus();
					$lista = $dao->obtenerTodos();

					if (isset($_GET['delete'])) {
						$id = $_GET['id'];
						var_dump($id);
						
						if($dao->eliminar($id))
						{

						echo "<script> alertify.success('Actualizado con exito :)');</script>";
						
						}else
						{
							echo "<script> alertify.error('Fallo el servidor :('); </script>";
							
						}

						echo "<script> window.location = 'Autobus.php' </script>";
						

					}


				?>
					 <table id="tableAutobus" class="display nowrap table table-bordered table-hover table-responsive-sm table-responsive-md text-center">
						  <thead class="thead-inverse text-white" style="background-color: #c3497f;">

								<tr>
									 <th scope="col">Numero de autobus</th>
									 <th scope="col">Autobus</th>
									 <th scope="col">Numero de asientos</th>
									 <th scope="col">Eliminar</th>
								</tr>
						  </thead>
						  <tbody>
						  	<?php
						  	foreach ($lista as $clave) { 
						  		
						  	 ?>
						  	<tr>

								<td> <?php echo ($clave->{"idAutobus"}); ?> </td>
								<td> <?php echo ($clave->{"nombre"});  ?> </td>
								<td> <?php echo ($clave->{"nAsientos"}); ?> </td>
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
<footer>
	
</footer>


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
		$("#tableAutobus").dataTable({
		  "aoColumnDefs": [{"bSortable": false, "aTargets": [3,3] }],
		  "order": [[0,"asc"], [1,"asc"]],
		  "language": {
			 "url" : "JS/datatables/jquery.dataTables_i18n.spanish.json"
		  }
		});


		});
  </script>
</html>