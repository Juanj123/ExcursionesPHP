<?php 
require_once "../Datos/DaoVideo.php";
require_once "../Pojos/PojoVideo.php";

$dao = new DaoVideo();

var_dump($_POST["nombre"]);
$pojo->idVideo = $dao->obtenerUno($pojo->url);
$pojo->idUsuario = $dao->obtenerIdUsuario($pojo->url);
print_r ("hola");

$j= $dao->editar($pojo);

echo $j;






 ?>