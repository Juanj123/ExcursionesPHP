<?php 
require_once "../Datos/DaoVideo.php";
require_once "../Pojos/PojoVideo.php";
$pojo = new PojoVideo();
$dao = new DaoVideo();


$pojo->nombre =$_POST["nombre"];
$pojo->estado =$_POST["estado"];
$pojo->url =$_POST["url"];
$pojo->idVideo = $dao-> obtenerUno($pojo->url);
$pojo->idUsuario = $dao-> obtenerIdUsuario($pojo->url);


echo $dao-> editar($pojo);



print_r ("hola");

 ?>