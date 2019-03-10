<?php 
require_once "../Datos/DaoPromociones.php";
$dao = new DaoPromociones();
if (isset($_GET['delete'])) {
	$idViaje = $_GET["idOferta"];
	echo $dao->eliminarOferta();
	echo "<script>location.href='ViajesAdmin.php'</script>";
}
?>