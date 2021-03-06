<?php 
require_once 'Conexion.php';
require_once '../Pojos/PojoGaleria.php';
class DatosGaleriaUsers{
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

       public function obtenerimgGaleria(){
  try
  {
    $this->conectar();

    $lista = array(); /*Se declara una variable de tipo  arreglo que almacenará los registros obtenidos de la BD*/

    $sentenciaSQL = $this->conexion->prepare("SELECT * FROM galeria"); /*Se arma la sentencia sql para seleccionar todos los registros de la base de datos*/

    $sentenciaSQL->execute();/*Se ejecuta la sentencia sql, retorna un cursor con todos los elementos*/

    /*Se recorre el cursor para obtener los datos*/
    foreach($sentenciaSQL->fetchAll(PDO::FETCH_OBJ) as $fila)
    {
      $obj = new PojoGaleria();
      $obj->idGaleria = $fila->idGaleria;
      $obj->idUsuario = $fila->idUsuario;
      $obj->titulo = $fila->titulo;
      $obj->img_galeria = $fila->img_galeria;
      $obj->destino = $fila->destino;
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
?>