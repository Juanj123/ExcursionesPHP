<?php 
require_once "../Datos/DaoVideo.php";
require_once "../Pojos/PojoVideo.php";

$dao = new DaoVideo();

$pojo = new PojoVideo();
$pojo->nombre =$_POST['nombre'];
$pojo->estado =$_POST['estado'];
//echo $_POST['estado'];
$pojo->url = $_POST['url'];

$pojo->idVideo = $dao->obtenerUno($pojo->url);
$pojo->idUsuario = $dao->obtenerIdUsuario($pojo->url);
print_r ("hola");

$j= $dao->editar($pojo);

echo $j;






 ?>