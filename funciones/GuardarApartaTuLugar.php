<?php
if (isset($_POST)) {
	$pojo-> totalPagar= $_COOKIE["Total"];
	$pojo-> idAutobus= $objDaoAparta->getTipoAutobus($_COOKIE["idViaje"]);
	$_SESSION['Nombre']="bmxpc7";
	$pojo-> idUsuario= $objDaoAparta->getIdUsuario($_SESSION['Nombre']);
	$pojo-> idViaje= $_COOKIE["idViaje"];
	$arregloAsientos = array();
	$arregloFinal = array();
	$valores = $_COOKIE["Asientos"];
	$arr1 = str_split($valores);
	$contador = 0;
	$arregloAsientos = preg_split("[,]", $valores);
	$remp = array("Asiento","[","]","{","}",":",'"');
	$arregloFinal = str_replace($remp, "", $arregloAsientos);
	foreach ($arregloFinal as $asiento)
	{
		$pojo-> n_Asiento = $asiento;
		$objDaoAparta->registrarAsientos($pojo);
	}
	$objDaoAparta->registrarReservacion($pojo);
	$pojo-> idReservacion=$objDaoAparta->getIdReservacion();
	$objDaoAparta->registrarReservacionUsuario($pojo);
	echo "<script>location.href='ViajesUsers.php'</script>";
}
?>