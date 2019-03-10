<?php 

require_once "../Datos/DaoVideo.php";
$dao = new DaoVideo();
$id = $_POST['id'];
$destino = $_POST[];
$url = $dao->obtenerUno($id);
echo $dao-> eliminar($url);

 ?>