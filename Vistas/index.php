<?php
$dbuser="root";
$dbpass="";
$dbname="viajesLore";
$chandle = new mysqli("localhost", $dbuser, $dbpass) or die("Error conectando a la BBDD");
echo "Conectado correctamente";
mysqli_select_db($chandle, $dbname) or die ($dbname . " Base de datos no encontrada." . $dbuser);
echo " Base de datos " . $dbname . " seleccionada";
mysqli_close($chandle);
?>