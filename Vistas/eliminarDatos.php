<?php 

require_once "../Datos/DaoVideo.php";
require_once "../Datos/DaoViaje.php";
$dao = new DaoVideo();
$daoViaje = new DaoViaje();


$id = $_POST['id'];
$destino = $_POST[];
$url = $dao->obtenerUno($id);

echo $dao-> eliminar($url);
echo $daoViaje->eliminar($idViaje);

 ?>