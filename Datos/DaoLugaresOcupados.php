<?php
require_once 'Conexion.php'; /*importa Conexion.php*/
require_once '../Pojos/PojoApartaTuLugar.php'; /*importa el modelo */
require_once '../Pojos/PojoUsuarios.php';
require_once '../Pojos/PojoViaje.php';
require_once '../Pojos/PojoAutobus.php';
require_once '../Pojos/asientos.php';
require_once '../Pojos/PojoLugaresOcupados.php';

class DaoLugaresOcupados
{
	private $conexion; /*Crea una variable conexion*/
	private function conectar()
  {
    try{
     $this->conexion = Conexion::abrirConexion(); /*inicializa la variable conexion, llamando el metodo abrirConexion(); de la clase Conexion por medio de una instancia*/
   }
   catch(Exception $e)
   {
     die($e->getMessage()); /*Si la conexion no se establece se cortara el flujo enviando un mensaje con el error*/
   }
 }
	public function getTotalViaje($idViaje)
{
 $concept;
 try
 {
  $this->conectar();

  $lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

  $sentenciaSQL = $this->conexion->prepare("SELECT sum(totalAPagar) as Total FROM reservacion where idViaje =  ?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/

  $sentenciaSQL->execute([$idViaje]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/

  /*Se recorre el cursor para obtener los datos*/
  foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
  {
   $obj = new PojoApartaTuLugar();
   $concept = $obj->totalPagar = $fila->Total;
 }
 return $concept;
}
catch(Exception $e)
{
  echo $e->getMessage();
  return null;
}
finally 
{
  Conexion::cerrarConexion();
}
}
public function GetDestino($idViaje)
{
	$concept;
  try
  {
    $this->conectar();

    $lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

    $sentenciaSQL = $this->conexion->prepare("SELECT destino FROM viajes where idViaje = ?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/

    $sentenciaSQL->execute([$idViaje]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/

    /*Se recorre el cursor para obtener los datos*/
    foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
    {

      $concept= $fila->destino;
   }

   return $concept;
 }
 catch(Exception $e){
  echo $e->getMessage();
  return null;
} finally {
  Conexion::cerrarConexion();
}
}
public function getDatosTabla($idViaje)
{
  try
  {
    $this->conectar();

    $lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

    $sentenciaSQL = $this->conexion->prepare("SELECT R.idReservacion, concat(U.nombres,' ', U.apellidos) as Nombre, R.nota, R.totalAPagar from reservacion R inner join reservacionusuario RU on R.idReservacion = RU.idReservacion
inner join usuarios U on RU.idUsuario = U.idUsuario where R.idViaje = ?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/

    $sentenciaSQL->execute([$idViaje]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/

    /*Se recorre el cursor para obtener los datos*/
    foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
    {
     $obj = new PojoLugaresOcupados();
     $obj->idReservacion = $fila->idReservacion;
     $obj->nombre = $fila->Nombre;
     $obj->nota = $fila->nota;
     $obj->totalPagar = $fila->totalAPagar;
     $lista[] = $obj;
   }
   return $lista;
 }
 catch(Exception $e){
  echo $e->getMessage();
  return null;
} finally {
  Conexion::cerrarConexion();
}
}

public function getNombreCompleto($idReservacion)
{
  try
  {
    $this->conectar();

    $lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

    $sentenciaSQL = $this->conexion->prepare("SELECT distinct concat(nombres,' ', apellidos) as nombre from usuarios U inner join reservacionusuario R on U.idUsuario = R.idUsuario where R.idReservacion = ?"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/

    $sentenciaSQL->execute([$idReservacion]);/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/

    /*Se recorre el cursor para obtener los datos*/
    foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
    {
     $obj = new PojoUsuarios();
     $obj->nombres = $fila->nombre;
     $lista[] = $obj;
   }
   return $lista;
 }
 catch(Exception $e){
  echo $e->getMessage();
  return null;
} finally {
  Conexion::cerrarConexion();
}
}

}