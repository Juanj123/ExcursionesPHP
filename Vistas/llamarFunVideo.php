<?php

require_once "../Datos/DaoVideo.php";
require_once "../Pojos/PojoVideo.php";


$pojo = new PojoVideo();
$dao = new DaoVideo();
	
$lista = $dao-> obtenerTodos();

		echo '<script type="text/javascript"> alert("hola"); </script>';

		
			return $lista;


?>