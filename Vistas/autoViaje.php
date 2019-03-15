<?php include 'header.php';  ?>
<body>
<div class="container col-md-12 col-lg-12 col-sm-12 col-xl-12">
		<div class="row">
			<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12">
				<form name="AutoViaje" method="POST">
					<br>

					<label>Viajes</label>
					<select class="form-control" name="cbViaje">
  					<option>Selecciona</option>
  					<?php 
  					require_once "../Datos/DaoAutoViaje.php";
					require_once "../Pojos/PojoViaje.php";
					$obj = new PojoViaje();
					$dao = new DaoAutoViaje();
					$lista = $dao->obtenerViajes(); 
					foreach ($lista as $clave) {
					
					?>
					<option value="<?php echo ($clave->{"idViaje"}); ?>" > <?php echo ($clave->{"destino"});  ?> </option>
					<?php 
				    }
					 ?>
					</select>
					<br>
					<label>Autobus</label>

					<select class="form-control" name="cbAutobus">
  					<option>Selecciona</option>
  					<?php 
  					require_once "../Datos/DaoAutoViaje.php";
					require_once "../Pojos/PojoAutobus.php";
					$obj = new PojoAutobus;
					$dao = new DaoAutoViaje();
					$lista = $dao->obtenerAutobus(); 
					foreach ($lista as $clave) {
					
					?>
					<option value="<?php echo ($clave->{"idAutobus"}); ?>" > <?php echo ($clave->{"nombre"});  ?> </option>
					<?php 
				    }
					 ?>
					</select>

					<br>
					<button name="btnAgregar" id="btAgregar" type="submint" class="btn btn-success">Agregar</button>
					<button name="btnCancelar" class="btn btn-danger">cancelar</button>
				</form>


				<?php 
					require_once "../Datos/DaoAutoViaje.php";
    				require_once "../Pojos/PojoAutoViaje.php";
    				$pojo = new autoViaje();
    				$dao = new DaoAutoViaje();
    				if(isset($_POST['btnAgregar']))
    				{
    					$pojo-> idAutobus = $_POST['cbAutobus'];
    					$pojo-> idViaje = $_POST['cbViaje'];

    					echo 'idViaje= ', $pojo-> idViaje;
    					echo '<br> idAutobus= ', $pojo-> idAutobus;

    					$dao-> Agregar($pojo);
    					echo "<script> window.location = 'AutoViajeAdmin.php' </script>";
    			

    				}

    				if(isset($_POST['btnCancelar'])){
    					echo "<script> window.location = 'AutoViajeAdmin.php' </script>";
    				}
				?>
			</div>
		</div>
</div>
</body>
</html>