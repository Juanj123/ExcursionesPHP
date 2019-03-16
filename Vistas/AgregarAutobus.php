<?php include 'header.php';  ?>
<body>
	<div class="container col-md-12 col-lg-12 col-sm-12 col-xl-12">
		<div class="row">
			<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12">
				<form name="frmAgregarAutobus" method="POST">
				<h2>Agregar Autobus</h2>
				<label>Nombre</label>
				<select class="form-control" name="cbNombre">
  					<option>Volvo</option>
  					<option>Irizar</option>
				</select>
				<label>Numero de Asientos</label>
				<input class="form-control" type="text" name="txtNumero" placeholder="Numero de Asientos">
				<br>
				<br>
				<button name="btnAgregar" type="submint" class="btn btn-success">Agregar</button>
				<button name="btnCancelar" class="btn btn-danger">Cancelar</button>
				</form>
				<?php 
				require_once "../Datos/DaoAutobus.php";
				require_once "../Pojos/PojoAutobus.php";
				$pojo = new PojoAutobus();
    			$dao = new DaoAutobus();
    			if(isset($_POST['btnAgregar']))
    			{
    				$pojo-> nAsientos = $_POST['txtNumero'];
    				$pojo-> nombre = $_POST['cbNombre'];
    				if($pojo-> nombre=="Volvo")
    				{
    					$pojo-> img = "img/Autobus-Volvo.png";
    				}elseif ($pojo-> nombre=="Irizar") {
    					$pojo-> img = "img/Autobus-Irizar.png";
    				}
    				$dao-> registrarAutobus($pojo);
    				echo "<script> window.location = 'Autobus.php' </script>";
    			}

    			if (isset($_POST['btnCancelar'])) {
    				echo "<script> window.location = 'Autobus.php' </script>";
    			}
				 ?>
    			
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
</html>