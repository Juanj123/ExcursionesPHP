<?php 
require_once "../Datos/DaoViaje.php";
$dao = new DaoViaje();
if (isset($_GET['delete'])) {
	$idViaje = $_GET["idViaje"];
	echo $dao-> eliminarViaje($idViaje);
	echo "<script>location.href='ViajesAdmin.php'</script>";
}
?>