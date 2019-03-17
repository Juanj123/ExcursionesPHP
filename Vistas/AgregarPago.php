<?php include 'headerUser.php';  ?>
<body>
	<div class="container col-md-12 col-lg-12 col-sm-12 col-xl-12">
		<div class="row">
			<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12">
				<form name="frmAgregarPago" method="POST" enctype="multipart/form-data" action="AgregarPago.php">
					<br>
					<label>Viaje</label>
					<select class="form-control" name="cbViaje">
						<?php 
						require_once "../Datos/DaoPagos.php";
						require_once "../Pojos/PojoViaje.php";
						$obj = new PojoViaje();
						$dao = new DaoPagos();
						$usuario = 1;
						$lista = $dao->obtenerViajes($usuario);
						foreach ($lista as $clave) {
						 ?>
						 <option value="<?php echo ($clave->{"idViaje"}); ?>" > <?php echo ($clave->{"destino"});  ?> </option>
						<?php 
				    }
					 ?>
					</select>
					<label>Monto</label>
					<input class="form-control" type="text" name="txtMonto" placeholder="Monto">
					<label>Fecha</label>
					<div class="input-group date fj-date">
 					 	<input type="text" class="form-control" name="txtFecha"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
					</div>
					<label>Imagen</label>
					<br>
					<input type="file" name="imagen">
					<br>
					<br>
					<button name="btnAgregar" type="submint" class="btn btn-success">Agregar</button>
					<button id="btnCancelar" class="btn btn-danger">Cancelar</button>
				</form>

				<?php 
				require_once "../Datos/DaoPagos.php";
    			require_once "../Pojos/PojoPagos.php";
    			require_once "../Pojos/PojoViaje.php";
    			require_once "../Pojos/PojoReservacion.php";


    			$pojo = new PojoPagos();
    			$pojoV = new PojoViaje();
    			$dao = new DaoPagos();
    			$pojoR = new PojoReservacion();
    			$idUsuario = $dao-> obtenerIdUsuario($_SESSION['login']);

    			$monto = $dao-> obtenerMonto($idUsuario);

    			if(isset($_POST['btnAgregar']))
    			{
    				$nombreImagen =$_FILES['imagen']['name'];//obtiene el nombre
    				$ima=$_FILES['imagen']['tmp_name'];//obtiene el archivo
    				$ruta = "img/tickets";
    				$ruta= $ruta."/".$nombreImagen;
 
    				move_uploaded_file($ima, $ruta);

    			$pojoV-> idViaje = $_POST['cbViaje'];
    			$idViaje = $pojoV-> idViaje;
    			echo "idViaje= ".$idViaje;
    			$pojoR-> idReservacion = $dao-> obtenerIdReserva($idViaje);
    			$idReservacion = $pojoR-> idReservacion;
    			echo "idReservacion= ".$pojoR-> idReservacion;
    			$pojoR-> totalApagar = $dao-> obtenerTotal($idReservacion);
    			$total = $pojoR-> totalApagar;
    			echo "total= ".$pojoR-> totalApagar;

    				$pojo-> idReservacion = $pojoR-> idReservacion; /* $dao-> obtenerIdReservacion($_POST['cbViaje']);*/
    				$pojo-> idUsuario = $idUsuario; //$dao-> obtenerIdUsuario("angel");
    				$pojo-> monto = $_POST['txtMonto'];
    				$pojo-> fecha_pago = $_POST['txtFecha'];
    				
    			
    				$pojo-> img_ticket = $ruta;

    				

    				if($pojoR-> totalApagar<=$monto)
    				{
    					$pojo-> estado = "Pagado";
    				}else
    				{
    					$pojo-> estado = "por pagar";
    				}
    				

    				$dao-> Agregar($pojo);

    			}

				 ?>

				 <form name="frmFactura" method="POST" enctype="multipart/form-data" action="Factura.php">
				 	
				 </form>
			</div>
		</div>
	</div>

</body>

	 <script type="text/javascript" src="JS/jquery-3.3.1.min.js"></script>
	 <script type="text/javascript" src="JS/popper.min.js"></script>
	 <script type="text/javascript" src="JS/bootstrap.min.js"></script>
	 <script type="text/javascript" src="JS/jquery.scrollUp.js"></script>
	 <script type="text/javascript" src="JS/alertify.js"></script>
	 <script type="text/javascript" src="JS/bootstrap-datepicker.js"></script>
	 <script type="text/javascript" src="JS/bootstrap-datepicker.es.min.js"></script>
    <link rel="stylesheet" type="text/css" href="CSS/bootstrap-datepicker.css">

	 
	 <script>
	 $(document).ready(function(){
		$('.fj-date').datepicker({
    	format: "dd/mm/yyyy",
    	language: "es"
			});
		});
  	</script>
</html>