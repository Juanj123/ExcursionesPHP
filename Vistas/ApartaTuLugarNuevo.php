<?php 
require_once("../Datos/DaoApartaTuLugar.php");
require_once("../Datos/DaoPromociones.php");
require_once("../Pojos/PojoApartaTuLugar.php");
session_start();
$objDaoAparta = new DaoApartaTuLugar();
$objDaoPromociones = new DaoPromociones();
$pojo = new PojoApartaTuLugar();
if (isset($_POST)) {
    $pojo-> totalPagar= $_COOKIE["Total"];
    $pojo-> idAutobus= $objDaoAparta->getTipoAutobus($_COOKIE["idViaje"]);
    $juanjo=$_SESSION['login'];
    echo "<script>alert('$juanjo');</script>";
    $pojo-> idUsuario= $objDaoAparta->getIdUsuario($_SESSION['login']);
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
    echo "<script>window.location.href='ViajesUsers.php'</script>";
}
?>